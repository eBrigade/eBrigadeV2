<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MaterialStocks Controller
 *
 * @property \App\Model\Table\MaterialStocksTable $MaterialStocks
 */
class MaterialStocksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Materials']
        ];
        $materialStocks = $this->paginate($this->MaterialStocks);

        $this->set(compact('materialStocks'));
        $this->set('_serialize', ['materialStocks']);
    }

    /**
     * View method
     *
     * @param string|null $id Material Stock id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materialStock = $this->MaterialStocks->get($id, [
            'contain' => ['Materials']
        ]);

        $this->set('materialStock', $materialStock);
        $this->set('_serialize', ['materialStock']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($barrack_id = null, $affectation = 'barracks')
    {
        $materialStock = $this->MaterialStocks->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['stock'] = -$this->request->data['stock'];
            $materialStock = $this->MaterialStocks->patchEntity($materialStock, $this->request->data);
            if ($this->MaterialStocks->save($materialStock)) {
                $this->Flash->success(__('The material stock has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material stock could not be saved. Please, try again.'));
            }
        }
        $materials = $this->MaterialStocks->Materials->find('list', ['limit' => 200]);
        $material_list = $this->MaterialStocks->Materials->find('list',[
            'fields' => [
                'id' => 'Materials.id',
                'val' => 'SUM(MaterialStocks.stock)',
                'name' => 'Materials.name'
            ],
            'keyField' => 'id',
            'valueField' => function($q){
                return $q['name']. ' (' .$q['val'].')';
            },
            'group' => [
                'name'
            ]
        ])->innerJoinWith('MaterialStocks')->innerJoinWith('Barracks')->where(['Barracks.id' => $barrack_id]);

        $affectations = [
            'barracks' => 'Caserne',
            'users' => 'Utilisateurs',
            'teams' => 'Equipes',
            'vehicles' => 'Vehicules'
        ];
        switch ($affectation){
            case 'barracks':
                $this->loadModel('Barracks');
                $list = $this->Barracks->find('list',[
                    'keyField' => 'id',
                    'valueField' => 'name'
                ]);
                break;
            case 'users':
                $this->loadModel('Users');
                $list = $this->Users->find('list',[
                    'keyField' => 'id',
                    'valueField' => function($q){
                        return $q['firstname'].' '.$q['lastname'];
                    }
                ])->innerJoinWith('Barracks')->where(['Barracks.id' => $barrack_id]);
                break;
            case 'teams':
                $this->loadModel('Teams');
                $list = $this->Teams->find('list',[
                    'keyField' => 'id',
                    'valueField' => 'name'
                ])->innerJoinWith('Users.Barracks')->where(['Barracks.id' => $barrack_id]);
                break;
            case 'vehicles':
                $this->loadModel('Vehicles');
                $list = $this->Vehicles->find('list',[
                    'keyField' => 'id',
                    'valueField' => 'matriculation'
                ])->innerJoinWith('Barracks')->where(['Barracks.id' => $barrack_id]);
                break;
        }
        $this->set(compact('materialStock', 'materials'));
        $this->set('material_list',$material_list);
        $this->set('affectation_list',$affectations);
        $this->set('list',$list);
        $this->set('id',$barrack_id);
        $this->set('affect',$affectation);
        $this->set('_serialize', ['materialStock']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Material Stock id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materialStock = $this->MaterialStocks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materialStock = $this->MaterialStocks->patchEntity($materialStock, $this->request->data);
            if ($this->MaterialStocks->save($materialStock)) {
                $this->Flash->success(__('The material stock has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material stock could not be saved. Please, try again.'));
            }
        }
        $materials = $this->MaterialStocks->Materials->find('list', ['limit' => 200]);
        $this->set(compact('materialStock', 'materials'));
        $this->set('_serialize', ['materialStock']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Material Stock id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materialStock = $this->MaterialStocks->get($id);
        if ($this->MaterialStocks->delete($materialStock)) {
            $this->Flash->success(__('The material stock has been deleted.'));
        } else {
            $this->Flash->error(__('The material stock could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function ajaxedit()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $this->MaterialStocks->updateAll(
                ['stock' => $this->request->data['stock']],
                ['id' => $this->request->data['id']]);
        }
    }

}
