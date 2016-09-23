<?php
namespace App\Controller;

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
            'contain' => ['VehicleTypes', 'VehicleModels']
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
            'contain' => ['VehicleTypes', 'VehicleModels', 'Barracks', 'Teams', 'Users']
        ]);

        $this->set('vehicle', $vehicle);
        $this->set('_serialize', ['vehicle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $vehicle = $this->Vehicles->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['barrack_id'] = $id;
            $vehicle = $this->Vehicles->patchEntity($vehicle, $this->request->data);
            if ($this->Vehicles->save($vehicle)) {
                $this->Flash->success(__('The vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicle could not be saved. Please, try again.'));
            }
        }
        $vehicleTypes = $this->Vehicles->VehicleTypes->find('list', ['limit' => 200]);
        $vehicleModels = $this->Vehicles->VehicleModels->find('list', ['limit' => 200]);
        $barracks = $this->Vehicles->Barracks->find('list', ['limit' => 200]);
        $teams = $this->Vehicles->Teams->find('list', ['limit' => 200]);
        $users = $this->Vehicles->Users->find('list', ['limit' => 200]);
        $this->set(compact('vehicle', 'vehicleTypes', 'vehicleModels', 'barracks', 'teams', 'users'));
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
            'contain' => ['Barracks', 'Events', 'Teams', 'Users']
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
        $vehicleTypes = $this->Vehicles->VehicleTypes->find('list', ['limit' => 200]);
        $vehicleModels = $this->Vehicles->VehicleModels->find('list', ['limit' => 200]);
        $barracks = $this->Vehicles->Barracks->find('list', ['limit' => 200]);
        $events = $this->Vehicles->Events->find('list', ['limit' => 200]);
        $teams = $this->Vehicles->Teams->find('list', ['limit' => 200]);
        $users = $this->Vehicles->Users->find('list', ['limit' => 200]);
        $this->set(compact('vehicle', 'vehicleTypes', 'vehicleModels', 'barracks', 'events', 'teams', 'users'));
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

    public function ajaxdelete($id = null)
    {
        if ($this->request->is(['post'])) {
        $this->autoRender = false;
        $id = $this->request->data['id'];
        $entity = $this->Vehicles->get($id);
        $this->Vehicles->delete($entity);
    }
    }

    public function ajaxedit()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $this->Vehicles->updateAll(
                ['matriculation' => $this->request->data['matriculation'],
                    'number_kilometer' => $this->request->data['number_kilometer'],
                    'bought' => $this->request->data['bought'],
                    'end_warranty' =>  $this->request->data['end_warranty'],
                    'next_revision' => $this->request->data['next_revision']],
                ['id' => $this->request->data['id']]);
        }
    }

}
