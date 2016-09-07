<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formations Controller
 *
 * @property \App\Model\Table\FormationsTable $Formations */
class FormationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        // Pourquoi faire un loadModel de Events alors qu'il est associé par table normalement ?
        $this->loadModel('Events');
        $this->paginate = [
            'contain' => ['Organizations','Events']
        ];
        $formations = $this->paginate($this->Formations);


        $this->set(compact('formations','events'));
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
        $formation = $this->Formations->get($id, [
            'contain' => ['Organizations']
        ]);


        $event = $this->Events->findAllById($formation['event_id'])->toArray();

        $cities = $this->Cities->findAllById($event[0]['city_id'])->toArray();
        $Users = $this->Users->findAllById($event[0]['creator_id'])->toArray();
        $barracks = $this->Barracks->findAllById($event[0]['barrack_id'])->toArray();



        $this->set(compact('formation', 'cities','Users','event','barracks','bills'));
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

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formation could not be saved. Please, try again.'));
            }
        }

                $organizations = $this->Formations->Organizations->find('list', ['valueField' => 'title']);
                $FormationTypes = $this->EventTypes->find('list',['valueField'=> 'title'])->where(['module ='=>'forma']);

        $cities = $this->Cities->find('list', ['valueField' => 'city']);
        $barracks = $this->Barracks->find('list', ['valueField' => 'name']);

        $this->set(compact('formation', 'organizations','barracks','cities','FormationTypes'));
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
            $formation = $this->Formations->patchEntity($formation, $this->request->data,['associated' => [
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
        $materials = $this->Events->Materials->MaterialTypes->find('list', ['valueField' => 'name']);
        $teams = $this->Events->Teams->find('list', ['valueField' => 'name']);
        $vehicles = $this->Events->Vehicles->find('list', ['valueField' => 'matriculation']);

        $cities = $this->Cities->find('list', ['valueField' => 'city']);
        $barracks = $this->Barracks->find('list', ['valueField' => 'name']);
        $event = $this->Events->findAllById($formation['event_id'])->toArray();



        $this->set(compact('formation', 'organizations', 'teachers','barracks','cities','event','materials','teams','vehicles'));
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
}
