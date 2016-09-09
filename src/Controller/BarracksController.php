<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Barracks Controller
 *
 * @property \App\Model\Table\BarracksTable $Barracks
 */
class BarracksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities']
        ];
        $barracks = $this->paginate($this->Barracks);

        $this->set(compact('barracks'));
        $this->set('_serialize', ['barracks']);
    }

    /**
     * View method
     *
     * @param string|null $id Barrack id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $barrack = $this->Barracks->get($id, [
            'contain' => ['Cities', 'Materials.MaterialTypes', 'Users', 'Vehicles.VehicleTypes', 'Events', 'RescuePlans']
        ]);

        $this->set('barrack', $barrack);
        $this->set('_serialize', ['barrack']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $barrack = $this->Barracks->newEntity();
        if ($this->request->is('post')) {
            $barrack = $this->Barracks->patchEntity($barrack, $this->request->data);
            if ($this->Barracks->save($barrack)) {
                $this->Flash->success(__('The barrack has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barrack could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Barracks->Cities->find('list', ['limit' => 200]);
        $materials = $this->Barracks->Materials->find('list', ['limit' => 200]);
        $users = $this->Barracks->Users->find('list', ['limit' => 200]);
        $vehicles = $this->Barracks->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('barrack', 'cities', 'materials', 'users', 'vehicles'));
        $this->set('_serialize', ['barrack']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Barrack id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $barrack = $this->Barracks->get($id, [
            'contain' => ['Materials', 'Users', 'Vehicles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $barrack = $this->Barracks->patchEntity($barrack, $this->request->data);
            if ($this->Barracks->save($barrack)) {
                $this->Flash->success(__('The barrack has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barrack could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Barracks->Cities->find('list', ['limit' => 200]);
        $materials = $this->Barracks->Materials->find('list', ['limit' => 200]);
        $users = $this->Barracks->Users->find('list', ['limit' => 200]);
        $vehicles = $this->Barracks->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('barrack', 'cities', 'materials', 'users', 'vehicles'));
        $this->set('_serialize', ['barrack']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Barrack id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $barrack = $this->Barracks->get($id);
        if ($this->Barracks->delete($barrack)) {
            $this->Flash->success(__('The barrack has been deleted.'));
        } else {
            $this->Flash->error(__('The barrack could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
