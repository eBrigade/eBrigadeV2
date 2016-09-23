<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;
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
        $ordered = $this->Materials->find('all',[
            'contain' => ['MaterialTypes','Barracks']
        ]);
        $to_order = $this->Materials->find('all',[
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
        // on cherche tous les materials qui ne sont pas en commande et qui sont dans les stocks
        $materials->where([
            'barrack_id' => $id,
            'order_made' => false,
            'Materials.id IN' => $this->Materials->MaterialStocks->find('all',['fields' => ['MaterialStocks.material_id']])
        ]);
        // on cherche tous les materials qui ne sont pas en commande et qui ne sont pas dans les stocks
        $to_order->where([
            'barrack_id' => $id,
            'order_made' => false,
            'Materials.id NOT IN' => $this->Materials->MaterialStocks->find('all',['fields' => ['MaterialStocks.material_id']])
        ]);
        // on cherche tous les materials qui sont en commande et qui ne sont pas dans les stocks
        $ordered->where([
            'barrack_id' => $id,
            'order_made' => true,
            'Materials.id NOT IN' => $this->Materials->MaterialStocks->find('all',['fields' => ['MaterialStocks.material_id']])
        ]);

        $materials = $this->paginate($materials);
        $ordered = $this->paginate($ordered);
        $this->set('id',$id);
        $barracks = $this->Materials->Barracks->find('treeList');
        $this->set('barracks',$barracks);
        $this->set(compact('materials','to_order','ordered'));
        $this->set('_serialize', ['materials','to_order','ordered']);
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
        $today = new \DateTime();
        $material = $this->Materials->get($id, [
            'contain' => ['MaterialTypes', 'Barracks', 'Teams', 'MaterialStocks']
        ]);
        $stocks = $this->Materials->MaterialStocks->find('all',[
            'fields' => [
                'material_id' => 'material_id',
                'sum' => 'sum(stock)'
            ],
            'conditions' => [
                'material_id' => $id,
                'OR' => [
                    ['affectation' => 'barracks'],
                    ['affectation' => 'users']
                ]
            ]
        ])->first();

        // essais sur le temporel -- affiche la quantité disponible au moment de la consultation
        $rented_today = $this->Materials->MaterialStocks->find('all',[
            'contain' => [
                'Teams'
            ],
            'conditions' => [
                'material_id' => $id
            ],
            'fields' => [
                'sum' => 'sum(stock)'
            ]
        ])->matching('Teams.Events',function($q)use($today){
            return $q->where([
                'event_start_date <= ' => $today,
                'event_end_date >= ' => $today
            ]);
        })->first();
        // afficher toutes les fois où le matériel est emprunté
        $all_dates = $this->Materials->MaterialStocks->find('all',[
            'conditions' => [
                'material_id' => $id
            ]
        ])->matching('Teams.Events');

        $this->set('today',$today);
        $this->set('stocks',$stocks);
        $this->set('rented_today',$rented_today);
        $this->set('all_dates',$all_dates);
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
