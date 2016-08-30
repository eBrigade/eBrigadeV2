<?php
namespace App\Controller\Gateau;

use App\Controller\AppController;

/**
 * Vehicles Controller
 *
 * @property \App\Model\Table\VehiclesTable $Vehicles
 */
class VehiclesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TypeVehicles', 'ModelVehicles']
        ];
        $vehicles = $this->paginate($this->Vehicles);

        $this->set(compact('vehicles'));
        $this->set('_serialize', ['vehicles']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicle = $this->Vehicles->get($id, [
            'contain' => ['TypeVehicles', 'ModelVehicles', 'Users', 'EventVehicles']
        ]);

        $this->set('vehicle', $vehicle);
        $this->set('_serialize', ['vehicle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicle = $this->Vehicles->newEntity();
        if ($this->request->is('post')) {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->data);
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('The vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
            }
        }
        $typeVehicles = $this->Vehicles->TypeVehicles->find('list', ['limit' => 200]);
        $modelVehicles = $this->Vehicles->ModelVehicles->find('list', ['limit' => 200]);
        $users = $this->Vehicles->Users->find('list', ['limit' => 200]);
        $this->set(compact('vehicle', 'typeVehicles', 'modelVehicles', 'users'));
        $this->set('_serialize', ['vehicle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehicle = $this->Vehicles->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->data);
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('The vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
            }
        }
        $typeVehicles = $this->Vehicles->TypeVehicles->find('list', ['limit' => 200]);
        $modelVehicles = $this->Vehicles->ModelVehicles->find('list', ['limit' => 200]);
        $users = $this->Vehicles->Users->find('list', ['limit' => 200]);
        $this->set(compact('vehicle', 'typeVehicles', 'modelVehicles', 'users'));
        $this->set('_serialize', ['vehicle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicle = $this->Vehicles->get($id);
        if ($this->Vehicles->delete($vehicle)) {
            $this->Flash->success(__('The vehicle has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
