<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Availabilities Controller
 *
 * @property \App\Model\Table\AvailabilitiesTable $Availabilities
 */
class AvailabilitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $availabilities = $this->paginate($this->Availabilities);

        $this->set(compact('availabilities'));
        $this->set('_serialize', ['availabilities']);
    }

    /**
     * View method
     *
     * @param string|null $id Availability id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $availability = $this->Availabilities->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('availability', $availability);
        $this->set('_serialize', ['availability']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $availability = $this->Availabilities->newEntity();
        if ($this->request->is('post')) {
            $availability = $this->Availabilities->patchEntity($availability, $this->request->data);
            if ($this->Availabilities->save($availability)) {
                $this->Flash->success(__('The availability has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The availability could not be saved. Please, try again.'));
            }
        }
        $users = $this->Availabilities->Users->find('list', ['limit' => 200]);
        $this->set(compact('availability', 'users'));
        $this->set('_serialize', ['availability']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Availability id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $availability = $this->Availabilities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $availability = $this->Availabilities->patchEntity($availability, $this->request->data);
            if ($this->Availabilities->save($availability)) {
                $this->Flash->success(__('The availability has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The availability could not be saved. Please, try again.'));
            }
        }
        $users = $this->Availabilities->Users->find('list', ['limit' => 200]);
        $this->set(compact('availability', 'users'));
        $this->set('_serialize', ['availability']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Availability id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $availability = $this->Availabilities->get($id);
        if ($this->Availabilities->delete($availability)) {
            $this->Flash->success(__('The availability has been deleted.'));
        } else {
            $this->Flash->error(__('The availability could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
