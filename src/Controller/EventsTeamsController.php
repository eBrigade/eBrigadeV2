<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EventsTeams Controller
 *
 * @property \App\Model\Table\EventsTeamsTable $EventsTeams
 */
class EventsTeamsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teams', 'Events']
        ];
        $eventsTeams = $this->paginate($this->EventsTeams);

        $this->set(compact('eventsTeams'));
        $this->set('_serialize', ['eventsTeams']);
    }

    /**
     * View method
     *
     * @param string|null $id Events Team id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eventsTeam = $this->EventsTeams->get($id, [
            'contain' => ['Teams', 'Events']
        ]);

        $this->set('eventsTeam', $eventsTeam);
        $this->set('_serialize', ['eventsTeam']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $eventsTeam = $this->EventsTeams->newEntity();
        if ($this->request->is('post')) {
            $eventsTeam = $this->EventsTeams->patchEntity($eventsTeam, $this->request->data);
            if ($this->EventsTeams->save($eventsTeam)) {
                $this->Flash->success(__('The events team has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The events team could not be saved. Please, try again.'));
            }
        }
        $teams = $this->EventsTeams->Teams->find('list', ['limit' => 200]);
        $events = $this->EventsTeams->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventsTeam', 'teams', 'events'));
        $this->set('_serialize', ['eventsTeam']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Events Team id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eventsTeam = $this->EventsTeams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eventsTeam = $this->EventsTeams->patchEntity($eventsTeam, $this->request->data);
            if ($this->EventsTeams->save($eventsTeam)) {
                $this->Flash->success(__('The events team has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The events team could not be saved. Please, try again.'));
            }
        }
        $teams = $this->EventsTeams->Teams->find('list', ['limit' => 200]);
        $events = $this->EventsTeams->Events->find('list', ['limit' => 200]);
        $this->set(compact('eventsTeam', 'teams', 'events'));
        $this->set('_serialize', ['eventsTeam']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Events Team id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eventsTeam = $this->EventsTeams->get($id);
        if ($this->EventsTeams->delete($eventsTeam)) {
            $this->Flash->success(__('The events team has been deleted.'));
        } else {
            $this->Flash->error(__('The events team could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
