<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formations Controller
 *
 * @property \App\Model\Table\FormationsTable $Formations
 */
class FormationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Organizations', 'Events']
        ];
        $formations = $this->paginate($this->Formations);


        $this->set(compact('formations', 'events'));
        $this->set('_serialize', ['formations']);
    }

    /**
     * View method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Events');
        $this->loadModel('Cities');
        $this->loadModel('Users');
        $this->loadModel('Barracks');
        $this->loadModel('EventsTeams');
        $this->loadModel('TeamsUsers');
        $this->loadModel('Users');
        $this->loadModel('Teams');

        $formation = $this->Formations->get($id, [
            'contain' => ['Organizations']
        ]);


        $event = $this->Events->findAllById($formation['event_id'])->toArray();
        $cities = $this->Cities->findAllById($event[0]['city_id'])->toArray();
        $barracks = $this->Barracks->findAllById($event[0]['barrack_id'])->toArray();


        $teamevents = $this->EventsTeams->find('all')->where(['event_id =' => $formation['event_id']]);

        foreach ($teamevents as $teamevent) {

            $teams = $this->Teams->findAllById($teamevent->team_id);

            foreach ($teams as $team) {

                $teamz[] = $team;
                $equipes = $this->TeamsUsers->find('all')->where(['team_id =' => $team->id])->toArray();

                foreach ($equipes as $equipe) {

                    $users = $this->Users->find('all')->where(['id =' => $equipe->user_id]);

                    foreach ($users as $user) {

                        $userz[] = $user;
                    }
                }
            }
        }
        $this->set(compact('formation', 'cities', 'Users', 'event', 'barracks', 'bills','teamz','userz'));
        $this->set('_serialize', ['formation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->loadModel('Cities');
        $this->loadModel('Barracks');
        $this->loadModel('EventTypes');

        $formation = $this->Formations->newEntity();

        if ($this->request->is('post')) {
            $formation = $this->Formations->patchEntity($formation, $this->request->data, ['associated' => [
                'Events',
                'Events.Formations'
            ]]);

            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The formation has been saved.'));

                /*                return $this->redirect(['action' => 'index']);*/
            } else {
                $this->Flash->error(__('The formation could not be saved. Please, try again.'));
            }
        }

        $organizations = $this->Formations->Organizations->find('list', ['valueField' => 'title']);
        $FormationTypes = $this->EventTypes->find('list', ['valueField' => 'title'])->where(['module =' => 'forma']);

        $cities = $this->Cities->find('list', ['valueField' => 'city']);
        $barracks = $this->Barracks->find('list', ['valueField' => 'name']);
        $events = $this->Formations->Events->find('list', ['limit' => 200]);

        $this->set(compact('formation', 'organizations', 'barracks', 'cities', 'FormationTypes','events'));
        $this->set('_serialize', ['formation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $this->loadModel('Cities');
        $this->loadModel('Barracks');
        $this->loadModel('Users');
        $this->loadModel('Events');

        $formation = $this->Formations->get($id, [
            'contain' => ['Events']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formation = $this->Formations->patchEntity($formation, $this->request->data, ['associated' => [
                'Events',
                'Events.Formations'
            ]]);
            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formation could not be saved. Please, try again.'));
            }
        }
        $organizations = $this->Formations->Organizations->find('list', ['valueField' => 'title']);
        $teachers = $this->Users->find('list', ['valueField' => 'firstname']);

        $cities = $this->Cities->find('list', ['valueField' => 'city']);
        $barracks = $this->Barracks->find('list', ['valueField' => 'name']);
        $event = $this->Events->findAllById($formation['event_id'])->toArray();


        $this->set(compact('formation', 'organizations', 'teachers', 'barracks', 'cities', 'event'));
        $this->set('_serialize', ['formation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadModel('Events');

        $this->request->allowMethod(['post', 'delete']);
        $formation = $this->Formations->get($id);

        $event = $this->Events->get($formation['event_id']);

        $this->Events->delete($event);

        if ($this->Formations->delete($formation)) {
            $this->Flash->success(__('The formation has been deleted.'));
        } else {
            $this->Flash->error(__('The formation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function addequipeformation($id = NULL){
        $this->loadModel('Teams');

        $formation_team = $this->Events->get($id, [
            'contain' => ['Events']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formation_team = $this->Events->patchEntity($formation_team, $this->request->data);
            if ($this->Events->save($formation_team)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'view',$id]);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }
        $teams = $this->Teams->find('list', ['limit' => 200]);
        $this->set(compact('teams','$formation_team'));
        $this->set('_serialize', ['$formation_team']);
    }

    public function filtre(){

        $array = [];

        if (!empty($this->request->data['event_type_id'])) {
            $type_ad_id = $this->request->data['event_type_id'];
            $type_ad_id_find = "event_type_id = " . $type_ad_id;
            array_push($array, $type_ad_id_find);
        }
        if (!empty($this->request->data['canceled'])) {
            $canceled = $this->request->data['canceled'];
            $canceled_find = "canceled = " . $canceled;
            array_push($array, $canceled_find);
        }
        if (!empty($this->request->data['barrack_id'])) {
            $barrack_id = $this->request->data['barrack_id'];
            $barrack_id_find = "barrack_id = " . $barrack_id;
            array_push($array, $barrack_id_find);
        }

        $this->paginate = [
            'contain' => ['Organizations', 'Events']
        ];
        $formations = $this->paginate($this->Formations);
            $sql = implode(" AND ", $array) . " ";
            $events = $this->Formations->Events->find('all', [
                'conditions' => ['is_active =' => 1,$sql]]) ;

        $typeEvents = $this->Formations->Events->EventTypes->find('list', ['ValueField' => 'type_name']);
        $typeEvents = $this->Formations->Events->EventTypes->find('list', ['ValueField' => 'type_name']);
        $typeEvents = $this->Formations->Events->EventTypes->find('list', ['ValueField' => 'type_name']);
        $this->set(compact('formations', 'events','typeEvents'));
        $this->set('_serialize', ['formations']);

    }
}
