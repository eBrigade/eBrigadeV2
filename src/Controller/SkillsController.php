<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Skills Controller
 *
 * @property \App\Model\Table\SkillsTable $Skills
 */
class SkillsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $skills = $this->paginate($this->Skills);

        $this->set(compact('skills'));
        $this->set('_serialize', ['skills']);
    }

    /**
     * View method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $skill = $this->Skills->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('skill', $skill);
        $this->set('_serialize', ['skill']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $skill = $this->Skills->newEntity();
        if ($this->request->is('post')) {
            $skill = $this->Skills->patchEntity($skill, $this->request->data);
            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skill could not be saved. Please, try again.'));
            }
        }
        $users = $this->Skills->Users->find('list', ['limit' => 200]);
        $this->set(compact('skill', 'users'));
        $this->set('_serialize', ['skill']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skill = $this->Skills->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $skill = $this->Skills->patchEntity($skill, $this->request->data);
            if ($this->Skills->save($skill)) {
                $this->Flash->success(__('The skill has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The skill could not be saved. Please, try again.'));
            }
        }
        $users = $this->Skills->Users->find('list', ['limit' => 200]);
        $this->set(compact('skill', 'users'));
        $this->set('_serialize', ['skill']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Skill id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skill = $this->Skills->get($id);
        if ($this->Skills->delete($skill)) {
            $this->Flash->success(__('The skill has been deleted.'));
        } else {
            $this->Flash->error(__('The skill could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function adduser($id = null)
    {
        $user = $this->Skills->Users->newEntity();
        if ($this->request->is('post')) {
            // calculer la date
            $until = $this->Skills->find('all',[
                'conditions' => [
                    'id' => $this->request->data['skill_id']
                ],
                'fields' => [
                    'validity_date'
                ]
            ])->first();
            $date = new Date($this->request->data['date_acquired']);
            $date->modify('+'.$until['validity_date'].' day');
            $date->format('Y-m-d');

            $data = [
                'skill_id' => $this->request->data['skill_id'],
                'user_id' => $this->request->data['user_id'],
                'date_acquired' => $this->request->data['date_acquired'],
                'validity_date' => $date->format('Y-m-d')
            ];
            debug($data);
        }

        $this->loadModel('Barracks');
        $barracks = $this->Barracks->find('list',[
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $skills = $this->Skills->find('list',[
            'keyField' => 'id',
            'valueField' => 'name'
        ]);
        $this->set(compact('user'));
        $this->set('barracks',$barracks);
        $this->set('skills',$skills);
    }

    public function getuser($id=null)
    {
        $users = $this->Skills->Users->find('list',[
            'keyField' => 'id',
            'valueField' => function($q){
                return $q['firstname'].' '.$q['lastname'];
            }
        ])->innerJoinWith('Barracks');
        $users->where(['Barracks.id' => $id]);

        $this->set('users',$users);
    }
}
