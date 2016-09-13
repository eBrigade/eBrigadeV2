<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Supplies Controller
 *
 * @property \App\Model\Table\SuppliesTable $Supplies
 */
class SuppliesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $supplies = $this->paginate($this->Supplies);

        $this->set(compact('supplies'));
        $this->set('_serialize', ['supplies']);
    }

    /**
     * View method
     *
     * @param string|null $id Supply id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supply = $this->Supplies->get($id, [
            'contain' => ['Orders', 'Providers']
        ]);

        $this->set('supply', $supply);
        $this->set('_serialize', ['supply']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supply = $this->Supplies->newEntity();
        if ($this->request->is('post')) {
            $supply = $this->Supplies->patchEntity($supply, $this->request->data);
            if ($this->Supplies->save($supply)) {
                $this->Flash->success(__('The supply has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supply could not be saved. Please, try again.'));
            }
        }
        $orders = $this->Supplies->Orders->find('list', ['limit' => 200]);
        $providers = $this->Supplies->Providers->find('list', ['limit' => 200]);
        $this->set(compact('supply', 'orders', 'providers'));
        $this->set('_serialize', ['supply']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supply id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supply = $this->Supplies->get($id, [
            'contain' => ['Orders', 'Providers']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supply = $this->Supplies->patchEntity($supply, $this->request->data);
            if ($this->Supplies->save($supply)) {
                $this->Flash->success(__('The supply has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supply could not be saved. Please, try again.'));
            }
        }
        $orders = $this->Supplies->Orders->find('list', ['limit' => 200]);
        $providers = $this->Supplies->Providers->find('list', ['limit' => 200]);
        $this->set(compact('supply', 'orders', 'providers'));
        $this->set('_serialize', ['supply']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supply id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supply = $this->Supplies->get($id);
        if ($this->Supplies->delete($supply)) {
            $this->Flash->success(__('The supply has been deleted.'));
        } else {
            $this->Flash->error(__('The supply could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
