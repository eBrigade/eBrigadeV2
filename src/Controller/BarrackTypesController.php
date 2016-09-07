<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BarrackTypes Controller
 *
 * @property \App\Model\Table\BarrackTypesTable $BarrackTypes
 */
class BarrackTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $barrackTypes = $this->paginate($this->BarrackTypes);

        $this->set(compact('barrackTypes'));
        $this->set('_serialize', ['barrackTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Barrack Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $barrackType = $this->BarrackTypes->get($id, [
            'contain' => []
        ]);

        $this->set('barrackType', $barrackType);
        $this->set('_serialize', ['barrackType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $barrackType = $this->BarrackTypes->newEntity();
        if ($this->request->is('post')) {
            $barrackType = $this->BarrackTypes->patchEntity($barrackType, $this->request->data);
            if ($this->BarrackTypes->save($barrackType)) {
                $this->Flash->success(__('The barrack type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barrack type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('barrackType'));
        $this->set('_serialize', ['barrackType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Barrack Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $barrackType = $this->BarrackTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $barrackType = $this->BarrackTypes->patchEntity($barrackType, $this->request->data);
            if ($this->BarrackTypes->save($barrackType)) {
                $this->Flash->success(__('The barrack type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barrack type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('barrackType'));
        $this->set('_serialize', ['barrackType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Barrack Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $barrackType = $this->BarrackTypes->get($id);
        if ($this->BarrackTypes->delete($barrackType)) {
            $this->Flash->success(__('The barrack type has been deleted.'));
        } else {
            $this->Flash->error(__('The barrack type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
