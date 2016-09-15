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
            'contain' => ['Organizations', 'FormationTypes','Events']
        ];
        $formations = $this->paginate($this->Formations);

        $this->set(compact('formations'));
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
        $formation = $this->Formations->get($id, [
            'contain' => ['Organizations', 'FormationTypes','Events','Events.Teams','Events.Teams.Users','Events.Teams.Vehicles','Events.Teams.Materials']
        ]);

        $this->set('formation', $formation);
        $this->set('_serialize', ['formation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formation = $this->Formations->newEntity();
        if ($this->request->is('post')) {
            $formation = $this->Formations->patchEntity($formation, $this->request->data);
            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formation could not be saved. Please, try again.'));
            }
        }
        $organizations = $this->Formations->Organizations->find('list', ['limit' => 200]);
        $events = $this->Formations->Events->find('list', ['limit' => 200]);
        $formationTypes = $this->Formations->FormationTypes->find('list', ['limit' => 200]);
        $this->set(compact('formation', 'organizations', 'events', 'formationTypes'));
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
        $formation = $this->Formations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formation = $this->Formations->patchEntity($formation, $this->request->data);
            if ($this->Formations->save($formation)) {
                $this->Flash->success(__('The formation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formation could not be saved. Please, try again.'));
            }
        }
        $organizations = $this->Formations->Organizations->find('list', ['limit' => 200]);
        $events = $this->Formations->Events->find('list', ['limit' => 200]);
        $formationTypes = $this->Formations->FormationTypes->find('list', ['limit' => 200]);
        $this->set(compact('formation', 'organizations', 'events', 'formationTypes'));
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
        $this->request->allowMethod(['post', 'delete']);
        $formation = $this->Formations->get($id);
        if ($this->Formations->delete($formation)) {
            $this->Flash->success(__('The formation has been deleted.'));
        } else {
            $this->Flash->error(__('The formation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function addevent($id = NULL){


        $formation_event = $this->Formations->Events->newEntity();
        if ($this->request->is('post')) {
            $formation_event = $this->Formations->Events->patchEntity($formation_event, $this->request->data);
            $formation_event->module_id = $id;
            $formation_event->module = 'formations';
            if ($this->Formations->Events->save($formation_event)) {
                $this->Flash->success(__('The formation has been saved.'));

                return $this->redirect(['action' => 'view',$id]);
            } else {
                $this->Flash->error(__('The formation could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Formations->Events->Cities->find('list', ['ValueField' => 'city']);
        $bills = $this->Formations->Events->Bills->find('list', ['limit' => 200]);
        $barracks = $this->Formations->Events->Barracks->find('list', ['limit' => 200]);
        $this->set(compact('formation_event', 'organizations', 'events', 'formationTypes', 'cities', 'bills', 'barracks'));
        $this->set('_serialize', ['formation_event']);
    }



    public function adduserteam($id = NULL){

        $barracks_users = $this->Formations->Events->Barracks->find('all')->where(['Barracks.id'=>'1'])->matching('Users');
 $array = [] ;
 foreach ($barracks_users as $users):
    foreach ($users->_matchingData as $test):
        if (!empty($test->id)) {
            $type_ad_id_find = "ads.type_ad_id = " . $test->id;
            array_push($array, $type_ad_id_find);
        }
        debug($array) ;

     endforeach;
 endforeach;



        $formation_event_user_team = $this->Formations->Events->newEntity();
        if ($this->request->is('post')) {
            $formation_event_user_team = $this->Formations->Events->patchEntity($formation_event_user_team, $this->request->data);
            if ($this->Formations->Events->save($formation_event_user_team)) {
                $this->Flash->success(__('The formation has been saved.'));

                return $this->redirect(['action' => 'view',$id]);
            } else {
                $this->Flash->error(__('The formation could not be saved. Please, try again.'));
            }
        }

        $barracks = $this->Formations->Events->Barracks->find('list', ['limit' => 200]);
        $users = $this->Formations->Events->Teams->Users->find('list');


        $this->set(compact('formation_event_user_team','barracks','users','barracks_users'));
        $this->set('_serialize', ['formation_event']);
    }
}
