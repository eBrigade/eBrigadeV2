<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TeamUsers Controller
 *
 * @property \App\Model\Table\TeamUsersTable $TeamUsers
 */
class TeamUsersController extends AppController
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
        $teamUsers = $this->paginate($this->TeamUsers);

        $this->set(compact('teamUsers'));
        $this->set('_serialize', ['teamUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Team User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teamUser = $this->TeamUsers->get($id, [
            'contain' => ['Teams', 'Users']
        ]);

        $this->set('teamUser', $teamUser);
        $this->set('_serialize', ['teamUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teamUser = $this->TeamUsers->newEntity();
        if ($this->request->is('post')) {
            $teamUser = $this->TeamUsers->patchEntity($teamUser, $this->request->data);
            if ($this->TeamUsers->save($teamUser)) {
                $this->Flash->success(__('The team user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The team user could not be saved. Please, try again.'));
            }
        }
        $teams = $this->TeamUsers->Teams->find('list', ['limit' => 200]);
        $users = $this->TeamUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('teamUser', 'teams', 'users'));
        $this->set('_serialize', ['teamUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Team User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teamUser = $this->TeamUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teamUser = $this->TeamUsers->patchEntity($teamUser, $this->request->data);
            if ($this->TeamUsers->save($teamUser)) {
                $this->Flash->success(__('The team user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The team user could not be saved. Please, try again.'));
            }
        }
        $teams = $this->TeamUsers->Teams->find('list', ['limit' => 200]);
        $users = $this->TeamUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('teamUser', 'teams', 'users'));
        $this->set('_serialize', ['teamUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Team User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teamUser = $this->TeamUsers->get($id);
        if ($this->TeamUsers->delete($teamUser)) {
            $this->Flash->success(__('The team user has been deleted.'));
        } else {
            $this->Flash->error(__('The team user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
