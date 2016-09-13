<?php
namespace App\Controller;

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
    public function add()
    {
        $skillsUser = $this->SkillsUsers->newEntity();
        if ($this->request->is('post')) {
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
     * Edit method
     *
     * @param string|null $id Skills User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $skillsUser = $this->SkillsUsers->get($id, [
            'contain' => []
        ]);
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
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $skillsUser = $this->SkillsUsers->get($id);
        if ($this->SkillsUsers->delete($skillsUser)) {
            $this->Flash->success(__('The skills user has been deleted.'));
        } else {
            $this->Flash->error(__('The skills user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
