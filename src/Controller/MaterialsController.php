<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

/**
 * Materials Controller
 *
 * @property \App\Model\Table\MaterialsTable $Materials
 * @property \App\Model\Table\MaterialTypesTable $MaterialTypes
 */
class MaterialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MaterialTypes', 'Barracks']
        ];
        $materials = $this->paginate($this->Materials);

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
        $material = $this->Materials->get($id, [
            'contain' => ['MaterialTypes', 'Barracks', 'UserMaterials']
        ]);

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
            $quantity = $this->request->data['quantity'];
            unset($this->request->data['mtype']);
            unset($this->request->data['description']);
            unset($this->request->data['quantity']);

            while($quantity>0){
                $query = $this->Materials->query();
                $query->insert(['material_type_id','barrack_id'])
                    ->values($this->request->data())
                    ->execute();
                $quantity--;
            }
            $this->redirect(['action' => 'index']);
        }
        $materialTypes = $this->Materials->MaterialTypes->find('list', ['limit' => 200]);
        $barracks = $this->Materials->Barracks->find('list', ['limit' => 200]);
        $types = $this->Materials->MaterialTypes->find('all')->toArray();
        $this->set('types',$types);
        $this->set(compact('material', 'materialTypes', 'barracks','types'));
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
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
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

    public function inventory($id = null)
    {
        $materials = $this->Materials->find('all',[
            'contain' => [
                'MaterialTypes',
                'UserMaterials'
            ],
            'fields' => [
                'name' => 'name',
                'material_count' => $this->Materials->find()->func()->count('material_type_id')
            ],
            'conditions' => [
                'barrack_id' => $id,
                'Materials.id NOT IN' => 'UserMaterials.material_id'
            ],
            'group' => 'material_type_id'
        ]);
        $this->set('barrack',$this->Materials->Barracks->get($id));
        $this->set('materials',$materials);
    }

    public function rent($id = null)
    {
        $materials = $this->Materials->find('list',[
            'valueField' => 'name2',
            'keyField' => 'id',
            'contain' => [
                'MaterialTypes',
                'UserMaterials'
            ],
            'fields' => [
                'name' => 'name',
                'material_count' => $this->Materials->find()->func()->count('material_type_id'),
                'name2' => $this->Materials->find()->func()->concat([
                    'name' => 'identifier',
                    ' (',
                    $this->Materials->find()->func()->count('material_type_id'),
                    ')'
                ])
            ],
            'conditions' => [
                'barrack_id' => $id,
                'Materials.id NOT IN' => 'UserMaterials.material_id'
            ],
            'group' => 'material_type_id',
            'having' => [
                'material_count >' => '0'
            ]
        ]);
        $this->set('barrack',$this->Materials->Barracks->get($id));
        $this->set('materials',$materials);
    }



}
