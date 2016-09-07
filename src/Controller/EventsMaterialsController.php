<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventsMaterials Controller
 *
 * @property \App\Model\Table\EventsMaterialsTable $EventsMaterials */
class EventsMaterialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Materials']
        ];
        $eventsMaterials = $this->paginate($this->EventsMaterials);

        $this->set(compact('eventsMaterials'));
        $this->set('_serialize', ['eventsMaterials']);
    }

    /**
     * View method
     *
     * @param string|null $id Events Material id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsMaterial = $this->EventsMaterials->get($id, [
            'contain' => ['Events', 'Materials']
        ]);

        $this->set('eventsMaterial', $eventsMaterial);
        $this->set('_serialize', ['eventsMaterial']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsMaterial = $this->EventsMaterials->newEntity();
        if ($this->request->is('post')) {
            $eventsMaterial = $this->EventsMaterials->patchEntity($eventsMaterial, $this->request->data);
            if ($this->EventsMaterials->save($eventsMaterial)) {
                $this->Flash->success(__('The events material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The events material could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventsMaterials->Events->find('list', ['limit' => 200]);
        $materials = $this->EventsMaterials->Materials->find('list', ['limit' => 200]);
        $this->set(compact('eventsMaterial', 'events', 'materials'));
        $this->set('_serialize', ['eventsMaterial']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Material id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsMaterial = $this->EventsMaterials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsMaterial = $this->EventsMaterials->patchEntity($eventsMaterial, $this->request->data);
            if ($this->EventsMaterials->save($eventsMaterial)) {
                $this->Flash->success(__('The events material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The events material could not be saved. Please, try again.'));
            }
        }
        $events = $this->EventsMaterials->Events->find('list', ['limit' => 200]);
        $materials = $this->EventsMaterials->Materials->find('list', ['limit' => 200]);
        $this->set(compact('eventsMaterial', 'events', 'materials'));
        $this->set('_serialize', ['eventsMaterial']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Material id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsMaterial = $this->EventsMaterials->get($id);
        if ($this->EventsMaterials->delete($eventsMaterial)) {
            $this->Flash->success(__('The events material has been deleted.'));
        } else {
            $this->Flash->error(__('The events material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
