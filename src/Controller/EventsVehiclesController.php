<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventsVehicles Controller
 *
 * @property \App\Model\Table\EventsVehiclesTable $EventsVehicles */
class EventsVehiclesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Vehicles']
        ];
        $eventsVehicles = $this->paginate($this->EventsVehicles);

        $this->set(compact('eventsVehicles'));
        $this->set('_serialize', ['eventsVehicles']);
    }

    /**
     * View method
     *
     * @param string|null $id Events Vehicle id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsVehicle = $this->EventsVehicles->get($id, [
            'contain' => ['Events', 'Vehicles']
        ]);

        $this->set('eventsVehicle', $eventsVehicle);
        $this->set('_serialize', ['eventsVehicle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsVehicle = $this->EventsVehicles->newEntity();
        if ($this->request->is('post')) {
            $eventsVehicle = $this->EventsVehicles->patchEntity($eventsVehicle, $this->request->data);
            if ($this->EventsVehicles->save($eventsVehicle)) {
                $this->Flash->success(__('The events vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The events vehicle could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventsVehicles->Events->find('list', ['limit' => 200]);
        $vehicles = $this->EventsVehicles->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('eventsVehicle', 'events', 'vehicles'));
        $this->set('_serialize', ['eventsVehicle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Vehicle id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsVehicle = $this->EventsVehicles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsVehicle = $this->EventsVehicles->patchEntity($eventsVehicle, $this->request->data);
            if ($this->EventsVehicles->save($eventsVehicle)) {
                $this->Flash->success(__('The events vehicle has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The events vehicle could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventsVehicles->Events->find('list', ['limit' => 200]);
        $vehicles = $this->EventsVehicles->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('eventsVehicle', 'events', 'vehicles'));
        $this->set('_serialize', ['eventsVehicle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Vehicle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsVehicle = $this->EventsVehicles->get($id);
        if ($this->EventsVehicles->delete($eventsVehicle)) {
            $this->Flash->success(__('The events vehicle has been deleted.'));
        } else {
            $this->Flash->error(__('The events vehicle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
