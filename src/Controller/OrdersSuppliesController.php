<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OrdersSupplies Controller
 *
 * @property \App\Model\Table\OrdersSuppliesTable $OrdersSupplies
 */
class OrdersSuppliesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders', 'Supplies']
        ];
        $ordersSupplies = $this->paginate($this->OrdersSupplies);

        $this->set(compact('ordersSupplies'));
        $this->set('_serialize', ['ordersSupplies']);
    }

    /**
     * View method
     *
     * @param string|null $id Orders Supply id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordersSupply = $this->OrdersSupplies->get($id, [
            'contain' => ['Orders', 'Supplies']
        ]);

        $this->set('ordersSupply', $ordersSupply);
        $this->set('_serialize', ['ordersSupply']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordersSupply = $this->OrdersSupplies->newEntity();
        if ($this->request->is('post')) {
            $ordersSupply = $this->OrdersSupplies->patchEntity($ordersSupply, $this->request->data);
            if ($this->OrdersSupplies->save($ordersSupply)) {
                $this->Flash->success(__('The orders supply has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orders supply could not be saved. Please, try again.'));
            }
        }
        $orders = $this->OrdersSupplies->Orders->find('list', ['limit' => 200]);
        $supplies = $this->OrdersSupplies->Supplies->find('list', ['limit' => 200]);
        $this->set(compact('ordersSupply', 'orders', 'supplies'));
        $this->set('_serialize', ['ordersSupply']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Orders Supply id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordersSupply = $this->OrdersSupplies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordersSupply = $this->OrdersSupplies->patchEntity($ordersSupply, $this->request->data);
            if ($this->OrdersSupplies->save($ordersSupply)) {
                $this->Flash->success(__('The orders supply has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The orders supply could not be saved. Please, try again.'));
            }
        }
        $orders = $this->OrdersSupplies->Orders->find('list', ['limit' => 200]);
        $supplies = $this->OrdersSupplies->Supplies->find('list', ['limit' => 200]);
        $this->set(compact('ordersSupply', 'orders', 'supplies'));
        $this->set('_serialize', ['ordersSupply']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Orders Supply id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordersSupply = $this->OrdersSupplies->get($id);
        if ($this->OrdersSupplies->delete($ordersSupply)) {
            $this->Flash->success(__('The orders supply has been deleted.'));
        } else {
            $this->Flash->error(__('The orders supply could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
