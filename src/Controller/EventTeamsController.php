<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventTeams Controller
 *
 * @property \App\Model\Table\EventTeamsTable $EventTeams
 */
class EventTeamsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teams', 'Users', 'Events']
        ];
        $eventTeams = $this->paginate($this->EventTeams);

        $this->set(compact('eventTeams'));
        $this->set('_serialize', ['eventTeams']);
    }

    /**
     * View method
     *
     * @param string|null $id Event Team id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventTeam = $this->EventTeams->get($id, [
            'contain' => ['Teams', 'Users', 'Events']
        ]);

        $this->set('eventTeam', $eventTeam);
        $this->set('_serialize', ['eventTeam']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventTeam = $this->EventTeams->newEntity();
        if ($this->request->is('post')) {
            $eventTeam = $this->EventTeams->patchEntity($eventTeam, $this->request->data);
            if ($this->EventTeams->save($eventTeam)) {
                $this->Flash->success(__('The event team has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event team could not be saved. Please, try again.'));
            }
        }
        $teams = $this->EventTeams->Teams->find('list', ['limit' => 200]);
        $users = $this->EventTeams->Users->find('list', ['limit' => 200]);
        $events = $this->EventTeams->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventTeam', 'teams', 'users', 'events'));
        $this->set('_serialize', ['eventTeam']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event Team id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventTeam = $this->EventTeams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventTeam = $this->EventTeams->patchEntity($eventTeam, $this->request->data);
            if ($this->EventTeams->save($eventTeam)) {
                $this->Flash->success(__('The event team has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event team could not be saved. Please, try again.'));
            }
        }
        $teams = $this->EventTeams->Teams->find('list', ['limit' => 200]);
        $users = $this->EventTeams->Users->find('list', ['limit' => 200]);
        $events = $this->EventTeams->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventTeam', 'teams', 'users', 'events'));
        $this->set('_serialize', ['eventTeam']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event Team id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventTeam = $this->EventTeams->get($id);
        if ($this->EventTeams->delete($eventTeam)) {
            $this->Flash->success(__('The event team has been deleted.'));
        } else {
            $this->Flash->error(__('The event team could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
