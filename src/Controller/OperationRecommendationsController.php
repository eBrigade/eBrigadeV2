<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OperationRecommendations Controller
 *
 * @property \App\Model\Table\OperationRecommendationsTable $OperationRecommendations
 */
class OperationRecommendationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $operationRecommendations = $this->paginate($this->OperationRecommendations);

        $this->set(compact('operationRecommendations'));
        $this->set('_serialize', ['operationRecommendations']);
    }

    /**
     * View method
     *
     * @param string|null $id Operation Recommendation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operationRecommendation = $this->OperationRecommendations->get($id, [
            'contain' => ['Operations']
        ]);

        $this->set('operationRecommendation', $operationRecommendation);
        $this->set('_serialize', ['operationRecommendation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operationRecommendation = $this->OperationRecommendations->newEntity();
        if ($this->request->is('post')) {
            $operationRecommendation = $this->OperationRecommendations->patchEntity($operationRecommendation, $this->request->data);
            if ($this->OperationRecommendations->save($operationRecommendation)) {
                $this->Flash->success(__('The operation recommendation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation recommendation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('operationRecommendation'));
        $this->set('_serialize', ['operationRecommendation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Operation Recommendation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operationRecommendation = $this->OperationRecommendations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operationRecommendation = $this->OperationRecommendations->patchEntity($operationRecommendation, $this->request->data);
            if ($this->OperationRecommendations->save($operationRecommendation)) {
                $this->Flash->success(__('The operation recommendation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation recommendation could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('operationRecommendation'));
        $this->set('_serialize', ['operationRecommendation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operation Recommendation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operationRecommendation = $this->OperationRecommendations->get($id);
        if ($this->OperationRecommendations->delete($operationRecommendation)) {
            $this->Flash->success(__('The operation recommendation has been deleted.'));
        } else {
            $this->Flash->error(__('The operation recommendation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
