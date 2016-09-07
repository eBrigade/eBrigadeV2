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
 * UserMaterials Controller
 *
 * @property \App\Model\Table\UserMaterialsTable $UserMaterials
 */
class UserMaterialsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Materials.MaterialTypes']
        ];
        $userMaterials = $this->paginate($this->UserMaterials);
        $this->set(compact('userMaterials'));
        $this->set('_serialize', ['userMaterials']);
    }

    /**
     * View method
     *
     * @param string|null $id User Material id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userMaterial = $this->UserMaterials->get($id, [
            'contain' => [
                'Users',
                'Materials.MaterialTypes'
            ]
        ]);
        $this->set('userMaterial', $userMaterial);
        $this->set('_serialize', ['userMaterial']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $this->loadModel('Materials');
        // je configure la localisation de la date
        $today = Time::now();
        $today->timezone = 'Europe/Paris';

        // liste des matériels empruntés
        $rented = $this->UserMaterials->find('all', [
            'fields' => ['material_id']
        ]);

        // enregistrement du formulaire
        if($this->request->is('post'))
        {
            // je récupère la quantité pour savoir combien de fois je save
            $quantity = intval($this->request->data['quantity']);
            // je lance la boucle
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
                // je configure l'entitée
                $entity->user_id = $this->Auth->user('id');
                $entity->material_id = $materialId->id;
                $entity->from_date = $today->format('Y-m-d');
                // de base je défini la valeur de to_date à null au cas où il n'y a aucune
                // date renseignée, pour que la valeur reste null dans la db
                $entity->to_date = null;
                // on récupère la date limite si il y en a une
                if($this->request->data['day']['day'] != null && $this->request->data['month']['month'] != null && $this->request->data['year']['year'])
                {
                    $to = Time::now();
                    $to->setDate($this->request->data['year']['year'],$this->request->data['month']['month'],$this->request->data['day']['day']);
                    $entity->to_date = $to->format('Y-m-d');
                }
                // on sauvegarde
                $this->UserMaterials->save($entity);
                // on retire 1 à la quantité et on recommence si la quantité n'est pas à 0
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
                    'name' => 'identifier', // identifier pour que la valeur du champ s'affiche correctement et non pas juste le nom du champ
                    ' (',
                    $this->Materials->find()->func()->count('material_type_id'), // fonction pour concaténer le nombre d'items possédés
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

    /**
     * Edit method
     *
     * @param string|null $id User Material id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    /**
     * Delete method
     *
     * @param string|null $id User Material id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userMaterial = $this->UserMaterials->get($id);
        if ($this->UserMaterials->delete($userMaterial)) {
            $this->Flash->success(__('The user material has been deleted.'));
        } else {
            $this->Flash->error(__('The user material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function edit($id = null)
    {
        $this->loadModel('Materials');
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
