<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id = null)
    {
        if($id == null)
        {
            // filtrage
            $user = $this->Orders->Materials->Barracks->find()->innerJoinWith('Users',function($q){
                return $q->where(['Users.id' => $this->Auth->user('id')]);
            })->select(['Barracks.id'])->first();
            $id = $user->id; // id de la barrack
        }
        $orders = $this->Orders->find('all',[
            'contain' => ['Materials'],
        ])->innerJoinWith('Materials.Barracks')->where(['Barracks.id' => $id]);
        $orders = $this->paginate($orders);

        $this->set(compact('orders'));
        $this->set('_serialize', ['orders']);
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Materials']
        ]);

        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null,$material=null)
    {
        if($id == null)
        {
            // filtrage
            $user = $this->Orders->Materials->Barracks->find()->innerJoinWith('Users',function($q){
                return $q->where(['Users.id' => $this->Auth->user('id')]);
            })->select(['Barracks.id'])->first();
            $id = $user->id; // id de la barrack
        }
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->data);

            // envoyer un mail au responsable pour notifier de la demande de commande

            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        // matériel de la caserne
        $materials = $this->Orders->Materials->find('list', [
            'contain' => [
                'Barracks' => [
                    'conditions' => [
                        'Barracks.id' => $id
                    ]
                ]
            ]
        ]);
        if($material != null)
        {
            $this->set('selected',$material);
        }
        $this->set(compact('order', 'materials'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $materials = $this->Orders->Materials->find('list', ['limit' => 200]);
        $this->set(compact('order', 'materials'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    //fonction pour confirmer la commande
    public function confirm($id = null)
    {
        $materials = $this->Orders->Materials->get($id);
        // order_made à 1 = commandé
        $data = [
            'order_made' => 1
        ];
        $materials = $this->Orders->Materials->patchEntity($materials,$data);
        if($this->Orders->Materials->save($materials))
        {
            $this->Flash->success(__('The order has been confirmed.'));
        } else {
            $this->Flash->error(__('The order could not be confirmed. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    // Fonction pour confirmer la reception de la commande
    public function received($id = null)
    {
        $order = $this->Orders->get($id,[
            'contain' => ['Materials']
        ]);
        $barrack_id = $order->material->barrack_id;
        $materialStocks = $this->Orders->Materials->MaterialStocks->newEntity();
        $data = [
            'material_id' => $order->material_id,
            'stock' => $order->quantity,
            'affectation' => 'barracks',
            'affectation_id' => $barrack_id
        ];

        $materialStocks = $this->Orders->Materials->MaterialStocks->patchEntity($materialStocks,$data);
        if($this->Orders->Materials->MaterialStocks->save($materialStocks))
        {
            $this->Flash->success(__('The order has been labeled as received.'));

        } else {
            $this->Flash->error(__('Error. Please, try again.'));
        }

        return $this->redirect(['action' => 'index',$barrack_id]);
    }
}
