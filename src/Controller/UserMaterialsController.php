<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserMaterials Controller
 *
 * @property \App\Model\Table\UserMaterialsTable $UserMaterials
 */
class UserMaterialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id=null)
    {
        $this->paginate = [
            'contain' => ['Users', 'Materials'],
            'conditions' => [
                'barrack_id' => $id
            ]
        ];
        $userMaterials = $this->paginate($this->UserMaterials);

        $this->set(compact('userMaterials'));
        $this->set('_serialize', ['userMaterials']);
        $this->set('barrack_id',$id);
    }

    /**
     * View method
     *
     * @param string|null $id User Material id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($user_id = null,$material_id = null)
    {
        $userMaterial = $this->UserMaterials->find('all', [
            'contain' => ['Users', 'Materials.MaterialTypes'],
            'conditions' => [
                'user_id' => $user_id,
                'material_id' => $material_id
            ]
        ])->first();

        $this->set('userMaterial', $userMaterial);
        $this->set('_serialize', ['userMaterial']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $userMaterial = $this->UserMaterials->newEntity();
        if ($this->request->is('post')) {
            $userMaterial->user_id = $this->request->data['user_id'];
            $userMaterial->material_id = $this->request->data['material_id'];
            $userMaterial->quantity = $this->request->data['quantity'];
            $userMaterial->from_date = $this->request->data['from_date'];
            $userMaterial->to_date = $this->request->data['to_date'];
            if ($this->UserMaterials->save($userMaterial)) {
                $this->Flash->success(__('The user material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user material could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserMaterials->Users->find('list',[
            'keyField' => 'id',
            'valueField' => function($q){
                return $q['firstname'] . ' ' . $q['lastname'];
            }
        ])->innerJoinWith('Barracks')->where(['Barracks.id' => $id]);
        $materials = $this->UserMaterials->Materials->find('list', [
            'contain' => ['MaterialTypes'],
            'fields' => [
                'id' => 'Materials.id',
                'name' => 'MaterialTypes.name'
            ],
            'keyField' => 'id',
            'valueField' => 'name'
        ])->innerJoinWith('Barracks')->where(['Barracks.id' => $id]);
        $this->set(compact('userMaterial', 'users', 'materials'));
        $this->set('_serialize', ['userMaterial']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Material id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($user_id = null,$material_id = null)
    {
        $userMaterial = $this->UserMaterials->find('all', [
            'contain' => [],
            'conditions' => [
                'user_id' => $user_id,
                'material_id' => $material_id
            ]
        ])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userMaterial = $this->UserMaterials->patchEntity($userMaterial, $this->request->data);
            if ($this->UserMaterials->save($userMaterial)) {
                $this->Flash->success(__('The user material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user material could not be saved. Please, try again.'));
            }
        }
        $users = $this->UserMaterials->Users->find('list', ['limit' => 200]);
        $materials = $this->UserMaterials->Materials->find('list', ['limit' => 200]);
        $this->set(compact('userMaterial', 'users', 'materials'));
        $this->set('_serialize', ['userMaterial']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Material id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($user_id = null, $material_id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userMaterial = $this->UserMaterials->find('all',[
                'conditions' => [
                    'user_id' => $user_id,
                    'material_id' => $material_id
                ]
            ]
        )->first();
        if ($this->UserMaterials->delete($userMaterial)) {
            $this->Flash->success(__('The user material has been deleted.'));
        } else {
            $this->Flash->error(__('The user material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function stock($id = null)
    {
        $material = $this->UserMaterials->Materials->findById($this->request->data['id']);
        $quantity = $this->UserMaterials->findByMaterialId($this->request->data['id'])->sumOf('quantity');
        $this->set('material',$material);
        $this->set('quantity',$quantity);
    }
}
