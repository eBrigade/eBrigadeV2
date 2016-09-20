<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Events Controller
 *
 * @property \App\Model\Table\EventsTable $Events
 */
class EventsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities', 'Bills', 'Barracks']
        ];
        $events = $this->paginate($this->Events);

        $this->set(compact('events'));
        $this->set('_serialize', ['events']);
    }

    /**
     * View method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Cities', 'Bills', 'Barracks', 'Materials', 'Teams', 'Vehicles', 'Formations']
        ]);

        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $event = $this->Events->newEntity();
        if ($this->request->is('post')) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Events->Cities->find('list', ['limit' => 200]);
        $bills = $this->Events->Bills->find('list', ['limit' => 200]);
        $barracks = $this->Events->Barracks->find('list', ['limit' => 200]);
        $materials = $this->Events->Materials->find('list', ['limit' => 200]);
        $teams = $this->Events->Teams->find('list', ['limit' => 200]);
        $vehicles = $this->Events->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('event', 'cities', 'bills', 'barracks', 'modules', 'materials', 'teams', 'vehicles'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $event = $this->Events->get($id, [
            'contain' => ['Materials', 'Teams', 'Vehicles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->data);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Events->Cities->find('list', ['limit' => 200]);
        $bills = $this->Events->Bills->find('list', ['limit' => 200]);
        $barracks = $this->Events->Barracks->find('list', ['limit' => 200]);
        $materials = $this->Events->Materials->find('list', ['limit' => 200]);
        $teams = $this->Events->Teams->find('list', ['limit' => 200]);
        $vehicles = $this->Events->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('event', 'cities', 'bills', 'barracks', 'modules', 'materials', 'teams', 'vehicles'));
        $this->set('_serialize', ['event']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Event id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $event = $this->Events->get($id);
        if ($this->Events->delete($event)) {
            $this->Flash->success(__('The event has been deleted.'));
            return $this->redirect($this->referer());
        } else {
            $this->Flash->error(__('The event could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->referer());
    }

    public function addteam($id = NULL)
    {
        $event_team = $this->Events->Teams->newEntity();
        if ($this->request->is('post')) {
            $event_team = $this->Events->Teams->patchEntity($event_team, $this->request->data);
            if ($this->Events->Teams->save($event_team)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $ids = $id;
        $materials = $this->Events->Materials->find('list', ['limit' => 200]);
        $vehicles = $this->Events->Vehicles->find('list', ['valueField' => 'name']);
        $users = $this->Events->Teams->Users->find('list');
        $event = $this->Events->find('list');
        $events = $this->Events->find('all')->where(['id'=>$id]);
        $this->set(compact('event_team', 'materials', 'vehicles','users','event','ids','events'));
        $this->set('_serialize', ['event_team']);
    }

}
