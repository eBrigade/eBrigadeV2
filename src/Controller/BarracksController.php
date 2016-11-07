<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Department;
use App\Model\Entity\Formation;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Cake\View\Helper\PaginatorHelper;

/**
 * Barracks Controller
 *
 * @property \App\Model\Table\BarracksTable $Barracks
 */
class BarracksController extends AppController
{
    public $paginate = [
        'limit' => 25,
        'order' => [
            'Barracks.id' => 'asc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function tree()
    {
        $categories = $this->Barracks->find('threaded', array(
                'order' => array('parent_id'))
        );
        $this->set('categories', $categories);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function index()
    {
        // recherche multi-critere
        if ($this->request->is('post')) {
            $array = [];
            if (!empty($this->request->data['region'])) {
                $push = $this->request->data['region'];
                $pushall = "region_id = '$push'";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['departement'])) {
                $push = $this->request->data['departement'];
                $pushall = "dpt_id = '$push'";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['nom'])) {
                $push = $this->request->data['nom'];
                $pushall = "name LIKE '%$push%'";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['parent'])) {
                $push = $this->request->data['parent'];
                $pushall = "parent_id IS NULL";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['enfant'])) {
                $push = $this->request->data['enfant'];
                $pushall = "parent_id IS NOT NULL";
                array_push($array, $pushall);
            }

            $barracks = $this->paginate($this->Barracks->find('all', array(
                'order' => array('lft'),
                'contain' => ['Cities.Departments', 'Users', 'Vehicles', 'MaterialStocks']
            ))->where(['lft >' => 0, $array]));
        } else {
            $barracks = $this->Barracks->find('all', array(
                'order' => array('lft'),
                'contain' => ['Users', 'Vehicles', 'MaterialStocks']
            ));
        }


        $this->loadModel('MaterialStocks');

        $barracks_tree = $this->Barracks->find('treelist', array(
                'order' => array('parent_id', 'lft'))
        )->toArray();


        $this->set(compact('barracks', 'barracks_tree'));
    }

    public function getdpt()
    {
        if ($this->request->is('ajax')) {
            $id = $this->request->data('id');
            $status = $this->Barracks->Cities->Departments->find('')->where(['region_id' => $id]);
        }

        $this->set(compact('status'));
        $this->set('_serialize', ['status']);
    }

    public function carte()
    {

        // recherche multi-critere
        if ($this->request->is('post')) {
            $array = [];
            if (!empty($this->request->data['region'])) {
                $push = $this->request->data['region'];
                $pushall = "region_id = '$push'";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['departement'])) {
                $push = $this->request->data['departement'];
                $pushall = "dpt_id = '$push'";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['nom'])) {
                $push = $this->request->data['nom'];
                $pushall = "name LIKE '%$push%'";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['parent'])) {
                $push = $this->request->data['parent'];
                $pushall = "parent_id IS NULL";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['enfant'])) {
                $push = $this->request->data['enfant'];
                $pushall = "parent_id IS NOT NULL";
                array_push($array, $pushall);
            }

            $barracks = $this->paginate($this->Barracks->find('all', array(
                'order' => array('lft'),
                'contain' => ['Cities.Departments']
            ))->where(['lft >' => 0, $array]));
        } else {
            $barracks = $this->Barracks->find('all', array(
                'order' => array('lft'),
                'contain' => ['Cities']
            ));
        }

        $this->set('barracks', $barracks);
    }

    public function annuaire()
    {

        // recherche multi-critere
        if ($this->request->is('post')) {
            $array = [];
            if (!empty($this->request->data['region'])) {
                $push = $this->request->data['region'];
                $pushall = "region_id = '$push'";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['departement'])) {
                $push = $this->request->data['departement'];
                $pushall = "dpt_id = '$push'";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['nom'])) {
                $push = $this->request->data['nom'];
                $pushall = "name LIKE '%$push%'";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['parent'])) {
                $push = $this->request->data['parent'];
                $pushall = "parent_id IS NULL";
                array_push($array, $pushall);
            }
            if (!empty($this->request->data['enfant'])) {
                $push = $this->request->data['enfant'];
                $pushall = "parent_id IS NOT NULL";
                array_push($array, $pushall);
            }

            $barracks = $this->paginate($this->Barracks->find('all', array(
                'order' => array('lft'),
                'contain' => ['Cities.Departments']
            ))->where(['lft >' => 0, $array]));
        } else {
            $barracks = $this->paginate($this->Barracks->find('all', array(
                'order' => array('lft'),
                'contain' => ['Cities']
            )));
        }

        $parentBarracks = $this->Barracks->find('treeList');
        $this->set(compact('barracks', 'parentBarracks'));
    }

    /**
     * View method
     *
     * @param string|null $id Barrack id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null , $name = null)
    {
        $this->loadModel('MaterialStocks');
        $barrack = $this->Barracks->get($id, [
            'contain' => ['Cities.Departments.Regions', 'Materials.MaterialTypes', 'Users.Cities',
                'Users', 'Vehicles.VehicleTypes', 'Formations.Cities', 'Operations.Cities'
            ]
        ]);

        $barrack_mat = $this->MaterialStocks->find('all', [
            'contain' => ['Materials.MaterialTypes']])
            ->where(['affectation' => 'barracks'])
            ->andwhere(['affectation_id' => $id]);

        $user_mat = $this->MaterialStocks->find('all', [
            'contain' => ['Materials.MaterialTypes', 'Users']])
            ->where(['affectation' => 'users'])
            ->andwhere(['affectation_id' => $id]);


        $c_barrack_mat = $barrack_mat->count();
        $c_user_mat = $user_mat->count();

        $this->set(compact('barrack', 'barrack_mat', 'c_barrack_mat', 'c_user_mat', 'user_mat'));
        $this->set('_serialize', ['barrack']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $barrack = $this->Barracks->newEntity();
        if ($this->request->is('post')) {
            $barrack = $this->Barracks->patchEntity($barrack, $this->request->data);
            if ($this->Barracks->save($barrack)) {
                $this->Flash->success(__('The barrack has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barrack could not be saved. Please, try again.'));
            }
        }
        $parentBarracks = $this->Barracks->find('treeList');

        $this->set(compact('barrack', 'cities', 'parentBarracks'));
        $cities = $this->Barracks->Cities->find('list', ['limit' => 200]);
        $materials = $this->Barracks->Materials->find('list', ['limit' => 200]);
        $users = $this->Barracks->Users->find('list', ['limit' => 200]);
        $vehicles = $this->Barracks->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('barrack', 'cities', 'materials', 'users', 'vehicles'));
        $this->set('_serialize', ['barrack']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Barrack id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null , $name = null)
    {
        $barrack = $this->Barracks->get($id, [
            'contain' => ['Materials', 'Users', 'Vehicles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $barrack = $this->Barracks->patchEntity($barrack, $this->request->data);
            if ($this->Barracks->save($barrack)) {
                $this->Flash->success(__('The barrack has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The barrack could not be saved. Please, try again.'));
            }
        }
        $parentBarracks = $this->Barracks->find('treeList');

        $this->set(compact('barrack', 'cities', 'parentBarracks'));

        $cities = $this->Barracks->Cities->find('list', ['limit' => 200]);
        $materials = $this->Barracks->Materials->find('list', ['limit' => 200]);
        $users = $this->Barracks->Users->find('list', ['limit' => 200]);
        $vehicles = $this->Barracks->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('barrack', 'cities', 'materials', 'users', 'vehicles'));
        $this->set('_serialize', ['barrack']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Barrack id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $barrack = $this->Barracks->get($id);
        if ($this->Barracks->delete($barrack)) {
            $this->Flash->success(__('La caserne a été supprimé.'));
        } else {
            $this->Flash->error(__('La caserne n\'a pas plus être effacé. Svp, Réessayez.'));
        }

        return $this->redirect($this->referer());
    }

    public function availabilities($id = null, $date = null)
    {
        ($date == null) ? $date = date('Y-m-d') : '';
        $barrack = $this->Barracks->get($id, [
            'contain' => ['Materials.MaterialTypes', 'Materials.UserMaterials.Users', 'Users.Teams.Events', 'Users.Cities', 'Vehicles.VehicleTypes', 'Events']
        ]);
        $users = $this->Barracks->Users->find('all');
        $materials = $this->Barracks->Materials->find('all');

        $this->set('barrack', $barrack);
        $this->set('date', $date);

    }


    public function moveUp($id = null)
    {
        $this->request->allowMethod(['post', 'put', 'get']);
        $barrack = $this->Barracks->get($id);
        if ($this->Barracks->moveUp($barrack)) {
            $this->Flash->success('The barrack has been moved Up.');
        } else {
            $this->Flash->error('The barrack could not be moved up. Please, try again.');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }

    public function moveDown($id = null)
    {
        $this->request->allowMethod(['post', 'put', 'get']);
        $barrack = $this->Barracks->get($id);
        if ($this->Barracks->moveDown($barrack)) {
            $this->Flash->success('The barrack has been moved down.');
        } else {
            $this->Flash->error('The barrack could not be moved down. Please, try again.');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }


    public function gestionuser($id = null, $name = null)
    {
        $users = $this->Barracks->Users->find('all', [
            'contain' => ['Cities']
        ])->matching('Barracks', function ($q) use ($id) {
            return $q->where(['Barracks.id' => $id]);
        });

        $this->set('users', $this->paginate($users));
        $this->set(compact('id', 'name'));
    }

    public function gestionevent($id = null, $name = null)
    {
        $operations = $this->Barracks->Operations->find('all', [
            'contain' => ['Cities']
        ])->matching('Barracks', function ($q) use ($id) {
            return $q->where(['Barracks.id' => $id]);
        });
        $formations = $this->Barracks->Formations->find('all', [
            'contain' => ['Cities']
        ])->matching('Barracks', function ($q) use ($id) {
            return $q->where(['Barracks.id' => $id]);
        });

        $this->set('operations', $this->paginate($operations));
        $this->set('formations', $this->paginate($formations));
        $this->set(compact('barrack', 'id','name'));

    }

    public function gestionvehi($id = null, $name = null)
    {
        $vehicules = $this->Barracks->Vehicles->find('all', [
            'contain' => ['VehicleTypes']
        ])->matching('Barracks', function ($q) use ($id) {
            return $q->where(['Barracks.id' => $id]);
        });

        $this->set('vehicules', $this->paginate($vehicules));
        $this->set(compact('barrack', 'id','name'));
    }

    public function gestionmat($id = null, $name = null)
    {
        $this->loadModel('MaterialStocks');
        $barrack_mat = $this->MaterialStocks->find('all', [
            'contain' => ['Materials.MaterialTypes']])
            ->where(['affectation' => 'barracks'])
            ->andwhere(['affectation_id' => $id]);

        $user_mat = $this->MaterialStocks->find('all', [
            'contain' => ['Materials.MaterialTypes', 'Users']])
            ->where(['affectation' => 'users'])
            ->andwhere(['affectation_id' => $id]);

        $this->set(compact('barrack_mat', 'user_mat', 'id','name'));
    }
}
