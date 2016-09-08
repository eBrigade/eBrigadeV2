<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Materials Controller
 *
 * @property \App\Model\Table\MaterialsTable $Materials
 */
class MaterialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MaterialTypes']
        ];
        $materials = $this->paginate($this->Materials);

        $this->set(compact('materials'));
        $this->set('_serialize', ['materials']);
    }

    /**
     * View method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $material = $this->Materials->get($id, [
            'contain' => ['MaterialTypes', 'Barracks', 'Events', 'Teams', 'UserMaterials']
        ]);

        $this->set('material', $material);
        $this->set('_serialize', ['material']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $material = $this->Materials->newEntity();
        if ($this->request->is('post')) {
            $material = $this->Materials->patchEntity($material, $this->request->data);
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material could not be saved. Please, try again.'));
            }
        }
        $materialTypes = $this->Materials->MaterialTypes->find('list', ['limit' => 200]);
        $barracks = $this->Materials->Barracks->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'limit' => 200]);
        $events = $this->Materials->Events->find('list', ['limit' => 200]);
        $teams = $this->Materials->Teams->find('list', ['limit' => 200]);
        $this->set(compact('material', 'materialTypes', 'barracks', 'events', 'teams'));
        $this->set('_serialize', ['material']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $material = $this->Materials->get($id, [
            'contain' => ['Barracks', 'Events', 'Teams']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $material = $this->Materials->patchEntity($material, $this->request->data);
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material could not be saved. Please, try again.'));
            }
        }
        $materialTypes = $this->Materials->MaterialTypes->find('list', ['limit' => 200]);
        $barracks = $this->Materials->Barracks->find('list', ['limit' => 200]);
        $events = $this->Materials->Events->find('list', ['limit' => 200]);
        $teams = $this->Materials->Teams->find('list', ['limit' => 200]);
        $this->set(compact('material', 'materialTypes', 'barracks', 'events', 'teams'));
        $this->set('_serialize', ['material']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $material = $this->Materials->get($id);
        if ($this->Materials->delete($material)) {
            $this->Flash->success(__('The material has been deleted.'));
        } else {
            $this->Flash->error(__('The material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function ajaxaddmaterial($id=null)
    {
        $material = $this->Materials->newEntity();
        if ($this->request->is('post')) {
            $material = $this->Materials->patchEntity($material, $this->request->data);
            $material->barrack_id = $id;
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material could not be saved. Please, try again.'));
            }
        }
        $materialTypes = $this->Materials->MaterialTypes->find('list', ['limit' => 200]);
        $barracks = $this->Materials->Barracks->find('list', [
            'keyField' => 'id',
            'valueField' => 'name',
            'limit' => 200]);
        $events = $this->Materials->Events->find('list', ['limit' => 200]);
        $teams = $this->Materials->Teams->find('list', ['limit' => 200]);
        $this->set(compact('material', 'materialTypes', 'barracks', 'events', 'teams'));
        $this->set('_serialize', ['material']);
    }

}
