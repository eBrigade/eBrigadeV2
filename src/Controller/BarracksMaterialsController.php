<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BarracksMaterials Controller
 *
 * @property \App\Model\Table\BarracksMaterialsTable $BarracksMaterials
 */
class BarracksMaterialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Barracks', 'Materials']
        ];
        $barracksMaterials = $this->paginate($this->BarracksMaterials);

        $this->set(compact('barracksMaterials'));
        $this->set('_serialize', ['barracksMaterials']);
    }

    /**
     * View method
     *
     * @param string|null $id Barracks Material id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $barracksMaterial = $this->BarracksMaterials->get($id, [
            'contain' => ['Barracks', 'Materials']
        ]);

        $this->set('barracksMaterial', $barracksMaterial);
        $this->set('_serialize', ['barracksMaterial']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $barracksMaterial = $this->BarracksMaterials->newEntity();
        if ($this->request->is('post')) {
            $barracksMaterial = $this->BarracksMaterials->patchEntity($barracksMaterial, $this->request->data);
            if ($this->BarracksMaterials->save($barracksMaterial)) {
                $this->Flash->success(__('The barracks material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barracks material could not be saved. Please, try again.'));
            }
        }
        $barracks = $this->BarracksMaterials->Barracks->find('list', ['limit' => 200]);
        $materials = $this->BarracksMaterials->Materials->find('list', ['limit' => 200]);
        $this->set(compact('barracksMaterial', 'barracks', 'materials'));
        $this->set('_serialize', ['barracksMaterial']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Barracks Material id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $barracksMaterial = $this->BarracksMaterials->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $barracksMaterial = $this->BarracksMaterials->patchEntity($barracksMaterial, $this->request->data);
            if ($this->BarracksMaterials->save($barracksMaterial)) {
                $this->Flash->success(__('The barracks material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barracks material could not be saved. Please, try again.'));
            }
        }
        $barracks = $this->BarracksMaterials->Barracks->find('list', ['limit' => 200]);
        $materials = $this->BarracksMaterials->Materials->find('list', ['limit' => 200]);
        $this->set(compact('barracksMaterial', 'barracks', 'materials'));
        $this->set('_serialize', ['barracksMaterial']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Barracks Material id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $barracksMaterial = $this->BarracksMaterials->get($id);
        if ($this->BarracksMaterials->delete($barracksMaterial)) {
            $this->Flash->success(__('The barracks material has been deleted.'));
        } else {
            $this->Flash->error(__('The barracks material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
