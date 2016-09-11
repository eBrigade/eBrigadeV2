<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BarracksVehicles Controller
 *
 * @property \App\Model\Table\BarracksVehiclesTable $BarracksVehicles
 */
class BarracksVehiclesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Barracks', 'Vehicles']
        ];
        $barracksVehicles = $this->paginate($this->BarracksVehicles);

        $this->set(compact('barracksVehicles'));
        $this->set('_serialize', ['barracksVehicles']);
    }

    /**
     * View method
     *
     * @param string|null $id Barracks Vehicle id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $barracksVehicle = $this->BarracksVehicles->get($id, [
            'contain' => ['Barracks', 'Vehicles']
        ]);

        $this->set('barracksVehicle', $barracksVehicle);
        $this->set('_serialize', ['barracksVehicle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $barracksVehicle = $this->BarracksVehicles->newEntity();
        if ($this->request->is('post')) {
            $barracksVehicle = $this->BarracksVehicles->patchEntity($barracksVehicle, $this->request->data);
            if ($this->BarracksVehicles->save($barracksVehicle)) {
                $this->Flash->success(__('The barracks vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barracks vehicle could not be saved. Please, try again.'));
            }
        }
        $barracks = $this->BarracksVehicles->Barracks->find('list', ['limit' => 200]);
        $vehicles = $this->BarracksVehicles->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('barracksVehicle', 'barracks', 'vehicles'));
        $this->set('_serialize', ['barracksVehicle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Barracks Vehicle id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $barracksVehicle = $this->BarracksVehicles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $barracksVehicle = $this->BarracksVehicles->patchEntity($barracksVehicle, $this->request->data);
            if ($this->BarracksVehicles->save($barracksVehicle)) {
                $this->Flash->success(__('The barracks vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barracks vehicle could not be saved. Please, try again.'));
            }
        }
        $barracks = $this->BarracksVehicles->Barracks->find('list', ['limit' => 200]);
        $vehicles = $this->BarracksVehicles->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('barracksVehicle', 'barracks', 'vehicles'));
        $this->set('_serialize', ['barracksVehicle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Barracks Vehicle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $barracksVehicle = $this->BarracksVehicles->get($id);
        if ($this->BarracksVehicles->delete($barracksVehicle)) {
            $this->Flash->success(__('The barracks vehicle has been deleted.'));
        } else {
            $this->Flash->error(__('The barracks vehicle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteliaison()
    {
        $this->autoRender = false;
        $id = $this->request->data['id'];
        $vid = $this->request->data['vid'];
        if ($this->request->is('post')) {
            $this->BarracksVehicles->deleteAll(
                [
                    'vehicle_id' => $vid,
                    'barrack_id' => $id
                ], false);
        }
    }
}
