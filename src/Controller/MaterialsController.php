<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\I18n\Time;

/**
 * Materials Controller
 *
 * @property \App\Model\Table\MaterialsTable $Materials
 */
class MaterialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     // Penser à ajouter le filtrage par matéreil type également ;)
     // Filtrage par défaut sur les barracks id d'appartenance de l'utilisateur
    public function index($id=null)
    {
        $materials = $this->Materials->find('all',[
            'contain' => ['MaterialTypes','Barracks']
        ]);
        if($id == null)
        {
            // filtrage
            $user = $this->Materials->Barracks->find()->innerJoinWith('Users',function($q){
                return $q->where(['Users.id' => $this->Auth->user('id')]);
            })->select(['Barracks.id'])->first();
            $id = $user->id; // id de la barrack
        }

        $materials->where(['barrack_id' => $id]);
        $materials = $this->paginate($materials);
        $this->set('id',$id);
        $barracks = $this->Materials->Barracks->find('treeList');
        $this->set('barracks',$barracks);
        $this->set(compact('materials'));
        $this->set('_serialize', ['materials']);
    }

    /**
     * View method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $date = Time::now();
        $date = $date->format('Y-m-d H:i:s');
        $material = $this->Materials->get($id, [
            'contain' => ['MaterialTypes', 'Barracks', 'Teams', 'MaterialStocks']
        ]);
        $stocks = $this->Materials
            ->find('all',[
                'contain' => ['MaterialStocks'],
                'conditions' => [
                    'id' => $id
                ]
        ]);

        $this->set('date',$date);
        $this->set('stocks',$stocks);
        $this->set('material', $material);
        $this->set('_serialize', ['material']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $material = $this->Materials->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['order_made'] = 0;
            $material = $this->Materials->patchEntity($material, $this->request->data);
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material could not be saved. Please, try again.'));
            }
        }
        $materialTypes = $this->Materials->MaterialTypes->find('list', ['limit' => 200]);
        $barracks = $this->Materials->Barracks->find('list', ['limit' => 200]);
        $providers = $this->Materials->Users->find('list',[
            'keyField' => 'id',
            'valueField' => 'login',
            'conditions' => [
                'is_provider' => true
            ]
        ]);
        $this->set(compact('material', 'materialTypes', 'barracks'));
        $this->set('providers',$providers);
        $this->set('_serialize', ['material']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $material = $this->Materials->get($id, [
            'contain' => ['Barracks','MaterialTypes','MaterialStocks']
        ]);
        $materialStocks = $this->Materials->MaterialStocks->find('all',[
            'conditions' => [
                'affectation' => 'barracks',
                'material_id' => $id
            ]
        ])->first();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $material = $this->Materials->patchEntity($material, $this->request->data);
            if ($this->Materials->save($material)) {
                // éditer le stock
                $data = [
                    'material_id' => $id,
                    'stock' => $this->request->data['stock'],
                    'affectation' => 'barracks',
                    'affectation_id' => $this->request->data['barrack_id']
                ];

                $materialStocks = $this->Materials->MaterialStocks->patchEntity($materialStocks, $data);
                $this->Materials->MaterialStocks->save($materialStocks);
                $this->Flash->success(__('The material has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material could not be saved. Please, try again.'));
            }
        }
        $materialTypes = $this->Materials->MaterialTypes->find('list', ['limit' => 200]);
        $barracks = $this->Materials->Barracks->find('list', ['limit' => 200]);
        $stocks = $this->Materials->MaterialStocks->find('all',[
            'conditions' => [
                'affectation' => 'barracks'
            ],
            'order' => ['id' => 'asc']
        ])->where(['material_id' => $id])->first();
        $this->set('stocks',$stocks);
        $this->set(compact('material', 'materialTypes', 'barracks'));
        $this->set('_serialize', ['material']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $material = $this->Materials->get($id);
        if ($this->Materials->delete($material)) {
            $this->Flash->success(__('The material has been deleted.'));
        } else {
            $this->Flash->error(__('The material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
