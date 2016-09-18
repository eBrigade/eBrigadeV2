<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public function index()
    {
        $this->paginate = [
            'contain' => ['MaterialTypes','Barracks']
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
            'contain' => ['MaterialTypes', 'Barracks', 'Events', 'Teams', 'MaterialStocks']
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
            $data = [
                'name' => $this->request->data['name'],
                'description' => $this->request->data['description'],
                'material_type_id' => $this->request->data['material_type_id'],
                'barrack_id' => $this->request->data['barrack_id'],
                'barracks' => [
                    '_ids' => [$this->request->data['barrack_id']]
                    ]
            ];

            $material = $this->Materials->patchEntity($material, $data);

            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));
                // j'ajoute une entrée dans MaterialsStocks pour éviter
                // de refaire des clics en trop
                $LastId = $material->id;
                $materialStocks = $this->Materials->MaterialStocks->newEntity();
                $data = [
                    'material_id' => $LastId,
                    'stock' => $this->request->data['stock'],
                    'affectation' => 'barracks',
                    'affectation_id' => $this->request->data['barrack_id']
                ];
                $this->Materials->MaterialStocks->patchEntity($materialStocks,$data);
                $this->Materials->MaterialStocks->save($materialStocks);
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
     * Edit method
     *
     * @param string|null $id Material id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $material = $this->Materials->get($id, [
            'contain' => ['Barracks']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = [
                'name' => $this->request->data['name'],
                'description' => $this->request->data['description'],
                'material_type_id' => $this->request->data['material_type_id'],
                'barrack_id' => $this->request->data['barrack_id'],
                'barracks' => [
                    '_ids' => [$this->request->data['barrack_id']]
                ]
            ];
            $material = $this->Materials->patchEntity($material, $data);
            if ($this->Materials->save($material)) {

                $materialStocks = $this->Materials->MaterialStocks->find('all',[
                    'conditions' => [
                        'affectation' => 'barracks',
                        'material_id' => $id
                    ]
                ])->first();
                $data = [
                    'material_id' => $id,
                    'stock' => $this->request->data['stock'],
                    'affectation' => 'barracks',
                    'affectation_id' => $this->request->data['barrack_id']
                ];

                $material = $this->Materials->patchEntity($material, $data);

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

    public function ajaxdelete($id = null)
    {
        if ($this->request->is(['post'])) {
            $this->autoRender = false;
            $id = $this->request->data['id'];
            $entity = $this->Materials->get($id);
            $this->Materials->delete($entity);
        }
    }

    public function ajaxedit()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $this->Materials->updateAll(
                ['matriculation' => $this->request->data['matriculation'],
                    'number_kilometer' => $this->request->data['number_kilometer'],
                    'bought' => $this->request->data['bought'],
                    'end_warranty' =>  $this->request->data['end_warranty'],
                    'next_revision' => $this->request->data['next_revision']],
                ['id' => $this->request->data['id']]);
        }
    }
}
