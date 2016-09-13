<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OperationDelays Controller
 *
 * @property \App\Model\Table\OperationDelaysTable $OperationDelays
 */
class OperationDelaysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $operationDelays = $this->paginate($this->OperationDelays);

        $this->set(compact('operationDelays'));
        $this->set('_serialize', ['operationDelays']);
    }

    /**
     * View method
     *
     * @param string|null $id Operation Delay id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operationDelay = $this->OperationDelays->get($id, [
            'contain' => ['Operations']
        ]);

        $this->set('operationDelay', $operationDelay);
        $this->set('_serialize', ['operationDelay']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operationDelay = $this->OperationDelays->newEntity();
        if ($this->request->is('post')) {
            $operationDelay = $this->OperationDelays->patchEntity($operationDelay, $this->request->data);
            if ($this->OperationDelays->save($operationDelay)) {
                $this->Flash->success(__('The operation delay has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation delay could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('operationDelay'));
        $this->set('_serialize', ['operationDelay']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Operation Delay id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operationDelay = $this->OperationDelays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operationDelay = $this->OperationDelays->patchEntity($operationDelay, $this->request->data);
            if ($this->OperationDelays->save($operationDelay)) {
                $this->Flash->success(__('The operation delay has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation delay could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('operationDelay'));
        $this->set('_serialize', ['operationDelay']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operation Delay id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operationDelay = $this->OperationDelays->get($id);
        if ($this->OperationDelays->delete($operationDelay)) {
            $this->Flash->success(__('The operation delay has been deleted.'));
        } else {
            $this->Flash->error(__('The operation delay could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
