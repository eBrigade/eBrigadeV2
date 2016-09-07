<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Database\Schema\Table;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Datasource\EntityInterface;

/**
 * Materials Controller
 *
 * @property \App\Model\Table\MaterialsTable $Materials
 * @property \App\Model\Table\MaterialTypesTable $MaterialTypes
 * @property \App\Model\Table\UserMaterialsTable $UserMaterials
 * @property \App\Model\Table\Users $Users
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
        $today = Time::now();
        $today->timezone = 'Europe/Paris';

        $this->loadModel('UserMaterials');
        // liste des matériels empruntés
        $rented = $this->UserMaterials->find('all', [
            'fields' => ['material_id']
        ]);

        // enregistrement du formulaire
        if($this->request->is('post'))
        {
            // je récupère la quantité pour savoir combien de fois je save
            $quantity = intval($this->request->data['quantity']);
            while($quantity>0)
            {
                // je crée l'entitée
                $entity = $this->UserMaterials->newEntity();
                // je récup l'id du matériel pour le stocker dans material_type_id
                $materialId = $this->Materials->find('all',[
                    'field' => 'id',
                    'contain' => [
                        'MaterialTypes',
                        'UserMaterials'
                    ],
                    'conditions' => [
                        'Materials.material_type_id' => $this->request->data['material_id'],
                        'Materials.id NOT IN' => $rented
                    ]
                ])->first();

                $entity->user_id = $this->Auth->user('id');
                $entity->material_id = $materialId->id;
                $entity->from_date = $today->format('Y-m-d');
                $entity->to_date = null;
                // on récupère la date limite si il y en a une
                if($this->request->data['day']['day'] != null && $this->request->data['month']['month'] != null && $this->request->data['year']['year'])
                {
                    $to = Time::now();
                    $to->setDate($this->request->data['year']['year'],$this->request->data['month']['month'],$this->request->data['day']['day']);
                    $entity->to_date = $to->format('Y-m-d');
                }
                // on sauvegarde

                if($this->UserMaterials->save($entity))
                    $quantity--;
            }
        }
        // Listes
        // affiche les items de l'inventaire avec leur quantité
        $materials = $this->Materials->find('list',[
            'valueField' => 'conc',
            'keyField' => 'type_id',
            'contain' => [
                'MaterialTypes',
                'UserMaterials'
            ],
            'fields' => [
                'name' => 'name',
                'material_count' => $this->Materials->find()->func()->count('material_type_id'),
                'conc' => $this->Materials->find()->func()->concat([
                    'name' => 'identifier', // identifier pour que la valeur s'affiche correctement
                    ' (',
                    $this->Materials->find()->func()->count('material_type_id'), // fonction pour concaténer
                    ')'
                ]),
                'type_id' => 'Materials.material_type_id'
            ],
            'conditions' => [
                'barrack_id' => $id,
                'Materials.id NOT IN' => $rented
            ],
            'group' => 'material_type_id',
            'having' => [
                'material_count >' => '0'
            ]
        ]);
        // quantitées
        // stocker les infos de l'user qui a emprunté tel matériel
        $this->loadModel('MaterialTypes');
        $this->loadModel('Users');
        $users = $this->UserMaterials->find('all',[
            'contain' => [
                'Users',
                'Materials.MaterialTypes' // -> jointure entre les deux tables
            ],
            'fields' => [
                'id' => 'Materials.id',
                'user_id' => 'user_id',
                'complete_name' => $this->Users->find()->func()->concat([
                    'firstname' => 'identifier',
                    ' ',
                    'lastname' => 'identifier'
                ]),
                'name' => 'name',
                'material_type_id' => 'material_type_id',
                'nb' => $this->MaterialTypes->find()->func()->count('material_type_id'),
                'from_date' => 'from_date',
                'to_date' => 'to_date'
            ],
            'conditions' => [
                'barrack_id' => $id
            ],
            'group' => 'complete_name,material_type_id,from_date,to_date'
        ]);
        // Liste des catégories
        $this->set('userId',$this->Auth->user('id'));
        $this->set('barrack',$this->Materials->Barracks->get($id));
        $this->set('users',$users);
        $this->set('materials',$materials);
    }

    public function back($id = null)
    {
        $this->loadModel('UserMaterials');
        $this->loadModel('MaterialTypes');
        // les empruntés
        $rented = $this->UserMaterials->find('all',[
            'fields' => ['material_id']
        ]);
        // action du formulaire
        if($this->request->is('post'))
        {
            $quantity = intval($this->request->data['quantity']);
            while($quantity>0)
            {
                $type = explode('*',$this->request->data['material']);
                // je configure $type[1] pour s'adapter à la requête
                ($type[1] != 'null') ? $type[1] = 'LIKE "'.$type[1].'"' : $type[1] = 'IS NULL';
                debug($type[1]);
                $materialId = $this->UserMaterials->find('all',[
                    'contain' => [
                        'Materials.MaterialTypes'
                    ],
                    'fields' => [
                        'id' => 'UserMaterials.material_id'
                    ],
                    'conditions' => [
                        'UserMaterials.user_id' => $id,
                        'MaterialTypes.id' => $type[0],
                        'UserMaterials.to_date ' . $type[1]
                    ]
                ])->first();
                $query = $this->UserMaterials->query();
                $query->delete()
                    ->where([
                        'material_id' => $materialId->id
                    ])
                    ->execute();
                $quantity--;
            }
        }
        // la liste du matériel possédé
        $materials = $this->UserMaterials->find('list',[
            'contain' => [
                'Users',
                'Materials.MaterialTypes'
            ],
            'fields' => [
                'material_type_id' => 'material_type_id',
                'name' => 'MaterialTypes.name',
                'count' => $this->Materials->find()->func()->count('material_type_id'),
                'date' => 'to_date'
            ],
            'keyField' => function ($row) {
                ($row['date'] != '') ? '' : $row['date'] = 'null';
                return $row['material_type_id'] . '*' . $row['date'];
            },
            'valueField' => function ($row) {
                return $row['name'] . ' (' . $row['count'] . ') Limite : ' . $row['date'];
            },
            'conditions' => [
                'user_id' => $id
            ],
            'group' => 'name,date'
        ]);
        $this->set('materials',$materials);
    }

}
