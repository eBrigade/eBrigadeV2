<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TeamsVehicles Controller
 *
 * @property \App\Model\Table\TeamsVehiclesTable $TeamsVehicles
 */
class TeamsVehiclesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teams', 'Vehicles']
        ];
        $teamsVehicles = $this->paginate($this->TeamsVehicles);

        $this->set(compact('teamsVehicles'));
        $this->set('_serialize', ['teamsVehicles']);
    }

    /**
     * View method
     *
     * @param string|null $id Teams Vehicle id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teamsVehicle = $this->TeamsVehicles->get($id, [
            'contain' => ['Teams', 'Vehicles']
        ]);

        $this->set('teamsVehicle', $teamsVehicle);
        $this->set('_serialize', ['teamsVehicle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teamsVehicle = $this->TeamsVehicles->newEntity();
        if ($this->request->is('post')) {
            $teamsVehicle = $this->TeamsVehicles->patchEntity($teamsVehicle, $this->request->data);
            if ($this->TeamsVehicles->save($teamsVehicle)) {
                $this->Flash->success(__('The teams vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The teams vehicle could not be saved. Please, try again.'));
            }
        }
        $teams = $this->TeamsVehicles->Teams->find('list', ['limit' => 200]);
        $vehicles = $this->TeamsVehicles->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('teamsVehicle', 'teams', 'vehicles'));
        $this->set('_serialize', ['teamsVehicle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Teams Vehicle id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teamsVehicle = $this->TeamsVehicles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teamsVehicle = $this->TeamsVehicles->patchEntity($teamsVehicle, $this->request->data);
            if ($this->TeamsVehicles->save($teamsVehicle)) {
                $this->Flash->success(__('The teams vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The teams vehicle could not be saved. Please, try again.'));
            }
        }
        $teams = $this->TeamsVehicles->Teams->find('list', ['limit' => 200]);
        $vehicles = $this->TeamsVehicles->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('teamsVehicle', 'teams', 'vehicles'));
        $this->set('_serialize', ['teamsVehicle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Teams Vehicle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teamsVehicle = $this->TeamsVehicles->get($id);
        if ($this->TeamsVehicles->delete($teamsVehicle)) {
            $this->Flash->success(__('The teams vehicle has been deleted.'));
        } else {
            $this->Flash->error(__('The teams vehicle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
