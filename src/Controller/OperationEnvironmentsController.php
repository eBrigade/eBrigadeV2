<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OperationEnvironments Controller
 *
 * @property \App\Model\Table\OperationEnvironmentsTable $OperationEnvironments
 */
class OperationEnvironmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $operationEnvironments = $this->paginate($this->OperationEnvironments);

        $this->set(compact('operationEnvironments'));
        $this->set('_serialize', ['operationEnvironments']);
    }

    /**
     * View method
     *
     * @param string|null $id Operation Environment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operationEnvironment = $this->OperationEnvironments->get($id, [
            'contain' => ['Operations']
        ]);

        $this->set('operationEnvironment', $operationEnvironment);
        $this->set('_serialize', ['operationEnvironment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operationEnvironment = $this->OperationEnvironments->newEntity();
        if ($this->request->is('post')) {
            $operationEnvironment = $this->OperationEnvironments->patchEntity($operationEnvironment, $this->request->data);
            if ($this->OperationEnvironments->save($operationEnvironment)) {
                $this->Flash->success(__('The operation environment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation environment could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('operationEnvironment'));
        $this->set('_serialize', ['operationEnvironment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Operation Environment id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operationEnvironment = $this->OperationEnvironments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operationEnvironment = $this->OperationEnvironments->patchEntity($operationEnvironment, $this->request->data);
            if ($this->OperationEnvironments->save($operationEnvironment)) {
                $this->Flash->success(__('The operation environment has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation environment could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('operationEnvironment'));
        $this->set('_serialize', ['operationEnvironment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operation Environment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operationEnvironment = $this->OperationEnvironments->get($id);
        if ($this->OperationEnvironments->delete($operationEnvironment)) {
            $this->Flash->success(__('The operation environment has been deleted.'));
        } else {
            $this->Flash->error(__('The operation environment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
