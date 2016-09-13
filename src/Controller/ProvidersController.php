<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Providers Controller
 *
 * @property \App\Model\Table\ProvidersTable $Providers
 */
class ProvidersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $providers = $this->paginate($this->Providers);

        $this->set(compact('providers'));
        $this->set('_serialize', ['providers']);
    }

    /**
     * View method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $provider = $this->Providers->get($id, [
            'contain' => ['Supplies', 'Orders']
        ]);

        $this->set('provider', $provider);
        $this->set('_serialize', ['provider']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $provider = $this->Providers->newEntity();
        if ($this->request->is('post')) {
            $provider = $this->Providers->patchEntity($provider, $this->request->data);
            if ($this->Providers->save($provider)) {
                $this->Flash->success(__('The provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The provider could not be saved. Please, try again.'));
            }
        }
        $supplies = $this->Providers->Supplies->find('list', ['limit' => 200]);
        $this->set(compact('provider', 'supplies'));
        $this->set('_serialize', ['provider']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $provider = $this->Providers->get($id, [
            'contain' => ['Supplies']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $provider = $this->Providers->patchEntity($provider, $this->request->data);
            if ($this->Providers->save($provider)) {
                $this->Flash->success(__('The provider has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The provider could not be saved. Please, try again.'));
            }
        }
        $supplies = $this->Providers->Supplies->find('list', ['limit' => 200]);
        $this->set(compact('provider', 'supplies'));
        $this->set('_serialize', ['provider']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Provider id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $provider = $this->Providers->get($id);
        if ($this->Providers->delete($provider)) {
            $this->Flash->success(__('The provider has been deleted.'));
        } else {
            $this->Flash->error(__('The provider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
