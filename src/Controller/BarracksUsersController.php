<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BarracksUsers Controller
 *
 * @property \App\Model\Table\BarracksUsersTable $BarracksUsers
 */
class BarracksUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Barracks']
        ];
        $barracksUsers = $this->paginate($this->BarracksUsers);

        $this->set(compact('barracksUsers'));
        $this->set('_serialize', ['barracksUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Barracks User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $barracksUser = $this->BarracksUsers->get($id, [
            'contain' => ['Users', 'Barracks']
        ]);

        $this->set('barracksUser', $barracksUser);
        $this->set('_serialize', ['barracksUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $barracksUser = $this->BarracksUsers->newEntity();
        if ($this->request->is('post')) {
            $barracksUser = $this->BarracksUsers->patchEntity($barracksUser, $this->request->data);
            if ($this->BarracksUsers->save($barracksUser)) {
                $this->Flash->success(__('The barracks user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barracks user could not be saved. Please, try again.'));
            }
        }
        $users = $this->BarracksUsers->Users->find('list', ['limit' => 200]);
        $barracks = $this->BarracksUsers->Barracks->find('list', ['limit' => 200]);
        $this->set(compact('barracksUser', 'users', 'barracks'));
        $this->set('_serialize', ['barracksUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Barracks User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $barracksUser = $this->BarracksUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $barracksUser = $this->BarracksUsers->patchEntity($barracksUser, $this->request->data);
            if ($this->BarracksUsers->save($barracksUser)) {
                $this->Flash->success(__('The barracks user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barracks user could not be saved. Please, try again.'));
            }
        }
        $users = $this->BarracksUsers->Users->find('list', ['limit' => 200]);
        $barracks = $this->BarracksUsers->Barracks->find('list', ['limit' => 200]);
        $this->set(compact('barracksUser', 'users', 'barracks'));
        $this->set('_serialize', ['barracksUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Barracks User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $barracksUser = $this->BarracksUsers->get($id);
        if ($this->BarracksUsers->delete($barracksUser)) {
            $this->Flash->success(__('The barracks user has been deleted.'));
        } else {
            $this->Flash->error(__('The barracks user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
