<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProvidersSupplies Controller
 *
 * @property \App\Model\Table\ProvidersSuppliesTable $ProvidersSupplies
 */
class ProvidersSuppliesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Providers', 'Supplies']
        ];
        $providersSupplies = $this->paginate($this->ProvidersSupplies);

        $this->set(compact('providersSupplies'));
        $this->set('_serialize', ['providersSupplies']);
    }

    /**
     * View method
     *
     * @param string|null $id Providers Supply id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $providersSupply = $this->ProvidersSupplies->get($id, [
            'contain' => ['Providers', 'Supplies']
        ]);

        $this->set('providersSupply', $providersSupply);
        $this->set('_serialize', ['providersSupply']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $providersSupply = $this->ProvidersSupplies->newEntity();
        if ($this->request->is('post')) {
            $providersSupply = $this->ProvidersSupplies->patchEntity($providersSupply, $this->request->data);
            if ($this->ProvidersSupplies->save($providersSupply)) {
                $this->Flash->success(__('The providers supply has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The providers supply could not be saved. Please, try again.'));
            }
        }
        $providers = $this->ProvidersSupplies->Providers->find('list', ['limit' => 200]);
        $supplies = $this->ProvidersSupplies->Supplies->find('list', ['limit' => 200]);
        $this->set(compact('providersSupply', 'providers', 'supplies'));
        $this->set('_serialize', ['providersSupply']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Providers Supply id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $providersSupply = $this->ProvidersSupplies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $providersSupply = $this->ProvidersSupplies->patchEntity($providersSupply, $this->request->data);
            if ($this->ProvidersSupplies->save($providersSupply)) {
                $this->Flash->success(__('The providers supply has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The providers supply could not be saved. Please, try again.'));
            }
        }
        $providers = $this->ProvidersSupplies->Providers->find('list', ['limit' => 200]);
        $supplies = $this->ProvidersSupplies->Supplies->find('list', ['limit' => 200]);
        $this->set(compact('providersSupply', 'providers', 'supplies'));
        $this->set('_serialize', ['providersSupply']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Providers Supply id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $providersSupply = $this->ProvidersSupplies->get($id);
        if ($this->ProvidersSupplies->delete($providersSupply)) {
            $this->Flash->success(__('The providers supply has been deleted.'));
        } else {
            $this->Flash->error(__('The providers supply could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
