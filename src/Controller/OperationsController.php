<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Operations Controller
 *
 * @property \App\Model\Table\OperationsTable $Operations
 */
class OperationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'Barracks', 'Cities', 'OperationActivities', 'OperationEnvironments', 'OperationDelays', 'OperationRecommendations', 'Organizations', 'OperationTypes']
        ];
        $operations = $this->paginate($this->Operations);

        $this->set(compact('operations'));
        $this->set('_serialize', ['operations']);
    }

    /**
     * View method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => ['Events', 'Barracks', 'Cities', 'OperationActivities', 'OperationEnvironments', 'OperationDelays', 'OperationRecommendations', 'Organizations', 'OperationTypes']
        ]);

        $this->set('operation', $operation);
        $this->set('_serialize', ['operation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operation = $this->Operations->newEntity();
        if ($this->request->is('post')) {
            $operation = $this->Operations->patchEntity($operation, $this->request->data);
            if ($this->Operations->save($operation)) {
                $this->Flash->success(__('The operation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation could not be saved. Please, try again.'));
            }
        }
        $events = $this->Operations->Events->find('list', ['limit' => 200]);
        $barracks = $this->Operations->Barracks->find('list', ['limit' => 200]);
        $cities = $this->Operations->Cities->find('list', ['limit' => 200]);
        $operationActivities = $this->Operations->OperationActivities->find('list', ['limit' => 200]);
        $operationEnvironments = $this->Operations->OperationEnvironments->find('list', ['limit' => 200]);
        $operationDelays = $this->Operations->OperationDelays->find('list', ['limit' => 200]);
        $operationRecommendations = $this->Operations->OperationRecommendations->find('list', ['limit' => 200]);
        $organizations = $this->Operations->Organizations->find('list', ['limit' => 200]);
        $operationTypes = $this->Operations->OperationTypes->find('list', ['limit' => 200]);
        $this->set(compact('operation', 'events', 'barracks', 'cities', 'operationActivities', 'operationEnvironments', 'operationDelays', 'operationRecommendations', 'organizations', 'operationTypes'));
        $this->set('_serialize', ['operation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operation = $this->Operations->patchEntity($operation, $this->request->data);
            if ($this->Operations->save($operation)) {
                $this->Flash->success(__('The operation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation could not be saved. Please, try again.'));
            }
        }
        $events = $this->Operations->Events->find('list', ['limit' => 200]);
        $barracks = $this->Operations->Barracks->find('list', ['limit' => 200]);
        $cities = $this->Operations->Cities->find('list', ['limit' => 200]);
        $operationActivities = $this->Operations->OperationActivities->find('list', ['limit' => 200]);
        $operationEnvironments = $this->Operations->OperationEnvironments->find('list', ['limit' => 200]);
        $operationDelays = $this->Operations->OperationDelays->find('list', ['limit' => 200]);
        $operationRecommendations = $this->Operations->OperationRecommendations->find('list', ['limit' => 200]);
        $organizations = $this->Operations->Organizations->find('list', ['limit' => 200]);
        $operationTypes = $this->Operations->OperationTypes->find('list', ['limit' => 200]);
        $this->set(compact('operation', 'events', 'barracks', 'cities', 'operationActivities', 'operationEnvironments', 'operationDelays', 'operationRecommendations', 'organizations', 'operationTypes'));
        $this->set('_serialize', ['operation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operation = $this->Operations->get($id);
        if ($this->Operations->delete($operation)) {
            $this->Flash->success(__('The operation has been deleted.'));
        } else {
            $this->Flash->error(__('The operation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
