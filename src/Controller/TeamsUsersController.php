<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TeamsUsers Controller
 *
 * @property \App\Model\Table\TeamsUsersTable $TeamsUsers
 */
class TeamsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teams', 'Users']
        ];
        $teamsUsers = $this->paginate($this->TeamsUsers);

        $this->set(compact('teamsUsers'));
        $this->set('_serialize', ['teamsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Teams User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teamsUser = $this->TeamsUsers->get($id, [
            'contain' => ['Teams', 'Users']
        ]);

        $this->set('teamsUser', $teamsUser);
        $this->set('_serialize', ['teamsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teamsUser = $this->TeamsUsers->newEntity();
        if ($this->request->is('post')) {
            $teamsUser = $this->TeamsUsers->patchEntity($teamsUser, $this->request->data);
            if ($this->TeamsUsers->save($teamsUser)) {
                $this->Flash->success(__('The teams user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The teams user could not be saved. Please, try again.'));
            }
        }
        $teams = $this->TeamsUsers->Teams->find('list', ['limit' => 200]);
        $users = $this->TeamsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('teamsUser', 'teams', 'users'));
        $this->set('_serialize', ['teamsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Teams User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teamsUser = $this->TeamsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teamsUser = $this->TeamsUsers->patchEntity($teamsUser, $this->request->data);
            if ($this->TeamsUsers->save($teamsUser)) {
                $this->Flash->success(__('The teams user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The teams user could not be saved. Please, try again.'));
            }
        }
        $teams = $this->TeamsUsers->Teams->find('list', ['limit' => 200]);
        $users = $this->TeamsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('teamsUser', 'teams', 'users'));
        $this->set('_serialize', ['teamsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Teams User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teamsUser = $this->TeamsUsers->get($id);
        if ($this->TeamsUsers->delete($teamsUser)) {
            $this->Flash->success(__('The teams user has been deleted.'));
        } else {
            $this->Flash->error(__('The teams user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
