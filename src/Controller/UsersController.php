<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities']
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Cities', 'Barracks', 'Skills', 'Teams', 'Vehicles', 'Availabilities']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            if($this->request->data['user_type'] == '0'){
                $this->request->data['alerte'] = 0;
                $this->request->data['is_provider'] = 0;
            }
            if($this->request->data['user_type'] == '1'){
                $this->request->data['is_provider'] = 1;
                $this->request->data['alerte'] = 0;
                $this->request->data['tuteur_legal'] = ' ';
                $this->request->data['personne_referente'] = ' ';
            }
            if($this->request->data['user_type'] == '2'){
                $this->request->data['is_provider'] = 0;
                $this->request->data['external'] = 1;
                $this->request->data['alerte'] = 0;
                $this->request->data['tuteur_legal'] = ' ';
                $this->request->data['personne_referente'] = ' ';
            }
            
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $barracks = $this->Users->Barracks->find('list', ['limit' => 200]);
        $skills = $this->Users->Skills->find('list', ['limit' => 200]);
        $teams = $this->Users->Teams->find('list', ['limit' => 200]);
        $vehicles = $this->Users->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities', 'barracks', 'skills', 'teams', 'vehicles','id'));
        $this->set('_serialize', ['user']);
    }

    public function ajaxcreateuser()
    {
        $object = $this->Users->newEntity();
        if ($this->request->is('post')) {
                $this->request->data['user_type'] = 0;
                $this->request->data['alerte'] = 0;
                $this->request->data['is_provider'] = 0;

            $object = $this->Users->patchEntity($object, $this->request->data);
            $this->Users->save($object);
        }

        $user = $this->Users->find('all', [
            'contain' => ['Cities']
        ])->where(['Users.id' => $object->id])->first();

        $this->set(compact('user'));
    }
    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Barracks', 'Skills', 'Teams', 'Vehicles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $barracks = $this->Users->Barracks->find('list', ['limit' => 200]);
        $skills = $this->Users->Skills->find('list', ['limit' => 200]);
        $teams = $this->Users->Teams->find('list', ['limit' => 200]);
        $vehicles = $this->Users->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities', 'barracks', 'skills', 'teams', 'vehicles'));
        $this->set('_serialize', ['user']);
    }

    public function profil($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Barracks', 'Skills', 'Teams', 'Vehicles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $cities = $this->Users->Cities->find('list', ['limit' => 200]);
        $barracks = $this->Users->Barracks->find('list', ['limit' => 200]);
        $skills = $this->Users->Skills->find('list', ['limit' => 200]);
        $teams = $this->Users->Teams->find('list', ['limit' => 200]);
        $vehicles = $this->Users->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'cities', 'barracks', 'skills', 'teams', 'vehicles'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function ajaxdelete($id = null)
    {
        $this->autoRender = false;
        if ($this->request->is(['post'])) {
            $this->autoRender = false;
            $id = $this->request->data['id'];
            $entity = $this->Users->get($id);
            $this->Users->delete($entity);
        }
    }

    public function ajaxadduser($id = null)
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['barrack_id'] = $id;
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Nouvel utilisateur ajouté.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Cet utilisateur n\'a pas pu être ajouté. Svp, réessayez.'));
            }
        }

        $barracks = $this->Users->Barracks->find('list');
        $getusers = $this->Users->find('list', ['limit' => 200,
            'keyField' => 'id',
            'valueField' => function ($e) {
                return $e->get('firstname'). ' ' . $e->get('lastname');
            }
        ]);
        $this->set(compact('barracks','getusers','id','user'));
    }
    
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}
