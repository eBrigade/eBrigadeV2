<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OperationActivities Controller
 *
 * @property \App\Model\Table\OperationActivitiesTable $OperationActivities
 */
class OperationActivitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $operationActivities = $this->paginate($this->OperationActivities);

        $this->set(compact('operationActivities'));
        $this->set('_serialize', ['operationActivities']);
    }

    /**
     * View method
     *
     * @param string|null $id Operation Activity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operationActivity = $this->OperationActivities->get($id, [
            'contain' => ['Operations']
        ]);

        $this->set('operationActivity', $operationActivity);
        $this->set('_serialize', ['operationActivity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operationActivity = $this->OperationActivities->newEntity();
        if ($this->request->is('post')) {
            $operationActivity = $this->OperationActivities->patchEntity($operationActivity, $this->request->data);
            if ($this->OperationActivities->save($operationActivity)) {
                $this->Flash->success(__('The operation activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation activity could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('operationActivity'));
        $this->set('_serialize', ['operationActivity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Operation Activity id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operationActivity = $this->OperationActivities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operationActivity = $this->OperationActivities->patchEntity($operationActivity, $this->request->data);
            if ($this->OperationActivities->save($operationActivity)) {
                $this->Flash->success(__('The operation activity has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation activity could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('operationActivity'));
        $this->set('_serialize', ['operationActivity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operation Activity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operationActivity = $this->OperationActivities->get($id);
        if ($this->OperationActivities->delete($operationActivity)) {
            $this->Flash->success(__('The operation activity has been deleted.'));
        } else {
            $this->Flash->error(__('The operation activity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
