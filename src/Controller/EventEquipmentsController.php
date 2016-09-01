<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventEquipments Controller
 *
 * @property \App\Model\Table\EventEquipmentsTable $EventEquipments
 */
class EventEquipmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Equipment']
        ];
        $eventEquipments = $this->paginate($this->EventEquipments);

        $this->set(compact('eventEquipments'));
        $this->set('_serialize', ['eventEquipments']);
    }

    /**
     * View method
     *
     * @param string|null $id Event Equipment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventEquipment = $this->EventEquipments->get($id, [
            'contain' => ['Events', 'Equipment']
        ]);

        $this->set('eventEquipment', $eventEquipment);
        $this->set('_serialize', ['eventEquipment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventEquipment = $this->EventEquipments->newEntity();
        if ($this->request->is('post')) {
            $eventEquipment = $this->EventEquipments->patchEntity($eventEquipment, $this->request->data);
            if ($this->EventEquipments->save($eventEquipment)) {
                $this->Flash->success(__('The event equipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event equipment could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventEquipments->Events->find('list', ['limit' => 200]);
        $equipment = $this->EventEquipments->Equipment->find('list', ['limit' => 200]);
        $this->set(compact('eventEquipment', 'events', 'equipment'));
        $this->set('_serialize', ['eventEquipment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event Equipment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventEquipment = $this->EventEquipments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventEquipment = $this->EventEquipments->patchEntity($eventEquipment, $this->request->data);
            if ($this->EventEquipments->save($eventEquipment)) {
                $this->Flash->success(__('The event equipment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event equipment could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventEquipments->Events->find('list', ['limit' => 200]);
        $equipment = $this->EventEquipments->Equipment->find('list', ['limit' => 200]);
        $this->set(compact('eventEquipment', 'events', 'equipment'));
        $this->set('_serialize', ['eventEquipment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event Equipment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventEquipment = $this->EventEquipments->get($id);
        if ($this->EventEquipments->delete($eventEquipment)) {
            $this->Flash->success(__('The event equipment has been deleted.'));
        } else {
            $this->Flash->error(__('The event equipment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
