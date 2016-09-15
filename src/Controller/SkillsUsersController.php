<?php
namespace App\Controller;
use Cake\ORM\Query;
use Cake\I18n\Time;
use Cake\I18n\Date;

use App\Controller\AppController;

/**
 * SkillsUsers Controller
 *
 * @property \App\Model\Table\SkillsUsersTable $SkillsUsers
 */
class SkillsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Skills', 'Users']
        ];
        $skillsUsers = $this->paginate($this->SkillsUsers);

        $this->set(compact('skillsUsers'));
        $this->set('_serialize', ['skillsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Skills User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skillsUser = $this->SkillsUsers->get($id, [
            'contain' => ['Skills', 'Users']
        ]);

        $this->set('skillsUser', $skillsUser);
        $this->set('_serialize', ['skillsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $skillsUser = $this->SkillsUsers->newEntity();
        if ($this->request->is('post')) {
            // calculer la date
            $until = $this->SkillsUsers->Skills->find('all',[
                'conditions' => [
                    'id' => $this->request->data['skill_id']
                ],
                'fields' => [
                    'validity_date'
                ]
            ])->first();
            $date = new Date($this->request->data['date_acquired']);
            $date->modify('+'.$until['validity_date'].' day');

            $skillsUser->skill_id = $this->request->data['skill_id'];
            $skillsUser->user_id = $this->request->data['user_id'];
            $skillsUser->date_acquired = $this->request->data['date_acquired'];
            $skillsUser->validity_date = $date->format('Y-m-d');
            if ($this->SkillsUsers->save($skillsUser)) {
                $this->Flash->success(__('The skills user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skills user could not be saved. Please, try again.'));
            }
        }

        $this->loadModel('Barracks');
        $barracks = $this->Barracks->find('list',[
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $skills = $this->SkillsUsers->Skills->find('list',[
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $this->set(compact('user'));
        $this->set('barracks',$barracks);
        $this->set('skills',$skills);
    }

    /**
     * Edit method
     *
     * @param string|null $id Skills User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($skill_id = null,$user_id = null)
    {
        $skillsUser = $this->SkillsUsers->find('all', [
            'contain' => [],
            'conditions' => [
                'skill_id' => $skill_id,
                'user_id' => $user_id
            ]
        ])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skillsUser = $this->SkillsUsers->patchEntity($skillsUser, $this->request->data);
            if ($this->SkillsUsers->save($skillsUser)) {
                $this->Flash->success(__('The skills user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skills user could not be saved. Please, try again.'));
            }
        }
        $skills = $this->SkillsUsers->Skills->find('list', ['limit' => 200]);
        $users = $this->SkillsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('skillsUser', 'skills', 'users'));
        $this->set('_serialize', ['skillsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Skills User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($skill_id = null,$user_id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skillsUser = $this->SkillsUsers->find('all',[
            'conditions' => [
                'skill_id' => $skill_id,
                'user_id' => $user_id
            ]
        ])->first();
        if ($this->SkillsUsers->delete($skillsUser)) {
            $this->Flash->success(__('The skills user has been deleted.'));
        } else {
            $this->Flash->error(__('The skills user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getuser($id=null)
    {
        $users = $this->SkillsUsers->Users->find('list',[
            'keyField' => 'id',
            'valueField' => function($q){
                return $q['firstname'].' '.$q['lastname'];
            }
        ])->innerJoinWith('Barracks');
        $users->where(['Barracks.id' => $id]);

        $this->set('users',$users);
    }
}
