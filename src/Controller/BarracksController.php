<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Barracks Controller
 *
 * @property \App\Model\Table\BarracksTable $Barracks
 */
class BarracksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public function index()
    {
        $categories = $this->Barracks->find('threaded', array(
                'order' => array('parent_id'))
        );
        $this->set('categories', $categories);
    }

    public function carte()
    {
        $barracks = $this->Barracks->find('all',[
        'contain' => ['Cities']]);
        
        $this->set('barracks', $barracks);
    }
    
    public function annuaire()
    {
        $this->paginate = [
            'contain' => [ 'Cities']
        ];
        $barracks = $this->paginate($this->Barracks);
        $parentBarracks = $this->Barracks->find('treeList');
        $this->set(compact('barracks','parentBarracks'));
    }

    /**
     * View method
     *
     * @param string|null $id Barrack id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('MaterialStocks');
        $barrack = $this->Barracks->get($id, [
            'contain' => ['Cities.Departments.Regions', 'Materials.MaterialTypes','Users.Cities',
                'Users', 'Vehicles.VehicleTypes', 'Events.Operations.Cities',
                'Formations.Cities'
                ]
        ]);

        $barrack_mat = $this->MaterialStocks->find('all',[
       'contain' => ['Materials.MaterialTypes']])
            ->where(['affectation' => 'barracks']) ;

        $user_mat = $this->MaterialStocks->find('all',[
            'contain' => ['Materials.MaterialTypes','Users']])
            ->where(['affectation' => 'users']) ;


        $c_barrack_mat = $barrack_mat->count();
       $c_user_mat = $user_mat->count();
        $this->set(compact('barrack', 'barrack_mat','c_barrack_mat','c_user_mat','user_mat'));
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

        $this->set(compact('barrack', 'cities','parentBarracks'));
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
    public function edit($id = null)
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

        $this->set(compact('barrack', 'cities','parentBarracks'));
        $parentBarracks = $this->Barracks->ParentBarracks->find('list', ['limit' => 200]);
        $cities = $this->Barracks->Cities->find('list', ['limit' => 200]);
        $materials = $this->Barracks->Materials->find('list', ['limit' => 200]);
        $users = $this->Barracks->Users->find('list', ['limit' => 200]);
        $vehicles = $this->Barracks->Vehicles->find('list', ['limit' => 200]);
        $this->set(compact('barrack', 'parentBarracks', 'cities', 'materials', 'users', 'vehicles'));
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
            $this->Flash->success(__('The barrack has been deleted.'));
        } else {
            $this->Flash->error(__('The barrack could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function availabilities($id=null,$date=null)
    {
        ($date == null) ? $date = date('Y-m-d') : '';
        $barrack = $this->Barracks->get($id, [
            'contain' => ['Materials.MaterialTypes', 'Materials.UserMaterials.Users','Users.Teams.Events','Users.Cities', 'Vehicles.VehicleTypes', 'Events']
        ]);
        $users = $this->Barracks->Users->find('all');
        $materials = $this->Barracks->Materials->find('all');

        $this->set('barrack',$barrack);
        $this->set('date',$date);

    }
}
