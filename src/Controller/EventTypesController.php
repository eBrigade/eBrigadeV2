<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventTypes Controller
 *
 * @property \App\Model\Table\EventTypesTable $EventTypes
 */
class EventTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $eventTypes = $this->paginate($this->EventTypes);

        $this->set(compact('eventTypes'));
        $this->set('_serialize', ['eventTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Event Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventType = $this->EventTypes->get($id, [
            'contain' => ['Events']
        ]);

        $this->set('eventType', $eventType);
        $this->set('_serialize', ['eventType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventType = $this->EventTypes->newEntity();
        if ($this->request->is('post')) {
            $eventType = $this->EventTypes->patchEntity($eventType, $this->request->data);
            if ($this->EventTypes->save($eventType)) {
                $this->Flash->success(__('The event type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('eventType'));
        $this->set('_serialize', ['eventType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventType = $this->EventTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventType = $this->EventTypes->patchEntity($eventType, $this->request->data);
            if ($this->EventTypes->save($eventType)) {
                $this->Flash->success(__('The event type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('eventType'));
        $this->set('_serialize', ['eventType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventType = $this->EventTypes->get($id);
        if ($this->EventTypes->delete($eventType)) {
            $this->Flash->success(__('The event type has been deleted.'));
        } else {
            $this->Flash->error(__('The event type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
