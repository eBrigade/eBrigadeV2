<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UsersVehicles Controller
 *
 * @property \App\Model\Table\UsersVehiclesTable $UsersVehicles
 */
class UsersVehiclesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Vehicles']
        ];
        $usersVehicles = $this->paginate($this->UsersVehicles);

        $this->set(compact('usersVehicles'));
        $this->set('_serialize', ['usersVehicles']);
    }

    /**
     * View method
     *
     * @param string|null $id Users Vehicle id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersVehicle = $this->UsersVehicles->get($id, [
            'contain' => ['Users', 'Vehicles']
        ]);

        $this->set('usersVehicle', $usersVehicle);
        $this->set('_serialize', ['usersVehicle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usersVehicle = $this->UsersVehicles->newEntity();
        if ($this->request->is('post')) {
            $usersVehicle = $this->UsersVehicles->patchEntity($usersVehicle, $this->request->data);
            if ($this->UsersVehicles->save($usersVehicle)) {
                $this->Flash->success(__('The users vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users vehicle could not be saved. Please, try again.'));
            }
        }
        $users = $this->UsersVehicles->Users->find('list', ['limit' => 200]);
        $vehicles = $this->UsersVehicles->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('usersVehicle', 'users', 'vehicles'));
        $this->set('_serialize', ['usersVehicle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Users Vehicle id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usersVehicle = $this->UsersVehicles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usersVehicle = $this->UsersVehicles->patchEntity($usersVehicle, $this->request->data);
            if ($this->UsersVehicles->save($usersVehicle)) {
                $this->Flash->success(__('The users vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The users vehicle could not be saved. Please, try again.'));
            }
        }
        $users = $this->UsersVehicles->Users->find('list', ['limit' => 200]);
        $vehicles = $this->UsersVehicles->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('usersVehicle', 'users', 'vehicles'));
        $this->set('_serialize', ['usersVehicle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Vehicle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersVehicle = $this->UsersVehicles->get($id);
        if ($this->UsersVehicles->delete($usersVehicle)) {
            $this->Flash->success(__('The users vehicle has been deleted.'));
        } else {
            $this->Flash->error(__('The users vehicle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
