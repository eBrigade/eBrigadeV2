<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OperationTypes Controller
 *
 * @property \App\Model\Table\OperationTypesTable $OperationTypes
 */
class OperationTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $operationTypes = $this->paginate($this->OperationTypes);

        $this->set(compact('operationTypes'));
        $this->set('_serialize', ['operationTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Operation Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operationType = $this->OperationTypes->get($id, [
            'contain' => ['Operations']
        ]);

        $this->set('operationType', $operationType);
        $this->set('_serialize', ['operationType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operationType = $this->OperationTypes->newEntity();
        if ($this->request->is('post')) {
            $operationType = $this->OperationTypes->patchEntity($operationType, $this->request->data);
            if ($this->OperationTypes->save($operationType)) {
                $this->Flash->success(__('The operation type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('operationType'));
        $this->set('_serialize', ['operationType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Operation Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operationType = $this->OperationTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operationType = $this->OperationTypes->patchEntity($operationType, $this->request->data);
            if ($this->OperationTypes->save($operationType)) {
                $this->Flash->success(__('The operation type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('operationType'));
        $this->set('_serialize', ['operationType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operation Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operationType = $this->OperationTypes->get($id);
        if ($this->OperationTypes->delete($operationType)) {
            $this->Flash->success(__('The operation type has been deleted.'));
        } else {
            $this->Flash->error(__('The operation type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
