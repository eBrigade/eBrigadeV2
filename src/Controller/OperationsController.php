<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Operations Controller
 *
 * @property \App\Model\Table\OperationsTable $Operations
 */
class OperationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Barracks', 'Cities', 'OperationActivities', 'OperationEnvironments', 'OperationDelays', 'OperationRecommendations', 'OperationTypes', 'Bills']
        ];
        $operations = $this->paginate($this->Operations);

        $this->set(compact('operations'));
        $this->set('_serialize', ['operations']);
    }

    /**
     * View method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => ['Barracks', 'Cities', 'OperationActivities', 'OperationEnvironments', 'OperationDelays', 'OperationRecommendations', 'Organizations', 'OperationTypes', 'Bills']
        ]);

        $this->set('operation', $operation);
        $this->set('_serialize', ['operation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $operation = $this->Operations->newEntity();
        if ($this->request->is('post')) {
            $operation = $this->Operations->patchEntity($operation, $this->request->data);
            if ($this->Operations->save($operation)) {
                $this->Flash->success(__('The operation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation could not be saved. Please, try again.'));
                debug($operation);
            }
        }
        $barracks = $this->Operations->Barracks->find('list', ['limit' => 200]);

        $operationActivities = $this->Operations->OperationActivities->find('list', ['limit' => 200]);
        $operationEnvironments = $this->Operations->OperationEnvironments->find('list', ['limit' => 200]);
        $operationDelays = $this->Operations->OperationDelays->find('list', ['limit' => 200]);
        $operationRecommendations = $this->Operations->OperationRecommendations->find('list', ['limit' => 200]);

        $operationTypes = $this->Operations->OperationTypes->find('list', ['limit' => 200]);
        $bills = $this->Operations->Bills->find('list', ['limit' => 200]);
        $this->set(compact('operation', 'barracks', 'operationActivities', 'operationEnvironments', 'operationDelays', 'operationRecommendations', 'operationTypes', 'bills'));
        $this->set('_serialize', ['operation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $operation = $this->Operations->patchEntity($operation, $this->request->data);
            if ($this->Operations->save($operation)) {
                $this->Flash->success(__('The operation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The operation could not be saved. Please, try again.'));
            }
        }
        $barracks = $this->Operations->Barracks->find('list', ['limit' => 200]);
        $cities = $this->Operations->Cities->find('list', ['limit' => 200]);
        $operationActivities = $this->Operations->OperationActivities->find('list', ['limit' => 200]);
        $operationEnvironments = $this->Operations->OperationEnvironments->find('list', ['limit' => 200]);
        $operationDelays = $this->Operations->OperationDelays->find('list', ['limit' => 200]);
        $operationRecommendations = $this->Operations->OperationRecommendations->find('list', ['limit' => 200]);
        $organizations = $this->Operations->Organizations->find('list', ['limit' => 200]);
        $operationTypes = $this->Operations->OperationTypes->find('list', ['limit' => 200]);
        $bills = $this->Operations->Bills->find('list', ['limit' => 200]);
        $this->set(compact('operation', 'barracks', 'cities', 'operationActivities', 'operationEnvironments', 'operationDelays', 'operationRecommendations', 'organizations', 'operationTypes', 'bills'));
        $this->set('_serialize', ['operation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Operation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $operation = $this->Operations->get($id);
        if ($this->Operations->delete($operation)) {
            $this->Flash->success(__('The operation has been deleted.'));
        } else {
            $this->Flash->error(__('The operation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function operationnel($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => ['Events', 'Cities',
                'Events.Teams.Users',
                'Events.Teams.Materials.MaterialTypes',
                'Events.Teams.Vehicles.VehicleTypes'
            ]
        ]);

        $teamsList = $this->Operations->Events->Teams->find('all');
        $usersList = $this->Operations->Events->Teams->Users->find('all');
        $materialsList = $this->Operations->Events->Teams->Materials->find('all');
        $vehiclesList = $this->Operations->Events->Teams->Vehicles->find('all', [
            'contain' => 'VehicleTypes'
        ]);

        $this->set(compact('teamsList', 'usersList', 'materialsList', 'vehiclesList'));
        $this->set('operation', $operation);
        $this->set('_serialize', ['operation']);
    }

    public function map($id = null)
    {
        $operation = $this->Operations->get($id, [
            'contain' => ['Events', 'Events.Teams', 'Barracks', 'Cities']
        ]);

        $this->set('operation', $operation);
        $this->set('_serialize', ['operation']);
    }

    public function savemap() {
        //todo:update multiple entities
        $this->autoRender = false;
        debug($_REQUEST);

    }


    public function gestion($id = null )
    {

        $table = $this->Operations;


        $operation = $table->get($id, [
            'contain' => ['Events', 'Cities',
                'Events.Teams.Users',
                'Events.Teams.Materials.MaterialTypes',
                'Events.Teams.Vehicles.VehicleTypes'
            ]
        ]);

        $this->set('operation', $operation);
        $this->set('_serialize', ['operation']);

    }

    public function filtertype()
    {

        $contentType = $this->request->data('contentType');

        $table = $this->Operations;

        $barracklist = $table->Barracks->find('all');

        $this->set(compact('barracklist', 'contentType'));

    }

    public function teamselect()
    {
        $eventID = $this->request->data('eventID');

        $table = $this->Operations;

        $event = $table->Events->get($eventID, [
            'contain' => 'Teams'
        ]);

        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    public function filterlist()
    {

        $table = $this->Operations;


        //gets data to filter
        $barrackID = $this->request->data('barrackID');
        $contentType = $this->request->data('contentType');

        //
        $source = $this->request->data('source');
        $event = $table->Events->get($source);
        $timestart = $event->event_start_date;
        $timeend = $event->event_end_date;

        switch ($contentType) {
            case 'Users':

                $this->paginate = [
                    'contain' => ['Barracks', 'Teams.Events']
                ];
                $itemlist = $table->Events->Teams->Users->find();
                // gets users that are not assigned in the same lapse of time

                $itemlist->distinct()->notMatching('Teams.Events', function ($q) use ($timestart, $timeend) {
                    return $q->where(
                        ['OR' => [
                            ['Users.id' => 'TeamsUsers.user_id'],
                            [function ($time) use ($timestart, $timeend) {
                                return $time->between('Events.event_end_date', $timestart, $timeend, 'datetime');
                            }],
                            [function ($time) use ($timestart, $timeend) {
                                return $time->between('Events.event_start_date', $timestart, $timeend, 'datetime');
                            }]
                        ]
                        ]
                    );
                });
                break;
            case 'Materials':
                $this->paginate = [
                    'contain' => ['Barracks', 'Teams']
                ];
                $itemlist = $table->Events->Teams->Materials->find();
                break;
            case 'Vehicles':
                $this->paginate = [
                    'contain' => ['Barracks', 'VehicleTypes', 'Teams']
                ];
                $itemlist = $table->Events->Teams->Vehicles->find();
                break;
        }


        if ($barrackID !== 'all') {


            $itemlist->matching('Barracks', function ($q) use ($barrackID) {
                return $q->where(['Barracks.id' => $barrackID]);
            });

        }

        $list = $this->paginate($itemlist);

        $this->set(compact('list', 'contentType'));
        $this->set('_serialize', ['list']);

    }

    public function addteam($id = null)
    {

        $table = $this->Operations;


        $eventID = $id;

        $team = $table->Events->Teams->newEntity();

        if ($this->request->is('post')) {
            $team = $table->Events->Teams->patchEntity($team, $this->request->data);
            $event = $this->request->data('eventID');
            if ($table->Events->Teams->save($team)) {
                $teamID = $team->id;
                $container = $table->Events->get($event, ['contain' => 'Teams']);
                $content = $table->Events->Teams->findById($teamID)->toArray();

                $table->Events->Teams->link($container, $content);

                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The team could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('team', 'eventID'));
        $this->set('_serialize', ['team']);
    }

    public function addevent($id = null)
    {
        $table = $this->Operations;

        $operation = $table->get($id);

        $event = $table->Events->newEntity();

        if ($this->request->is('post')) {
            $event = $table->Events->patchEntity($event, $this->request->data);
            $event->module_id = $id;
            $event->module = 'operations';
            if ($table->Events->save($event)) {

                $this->Flash->success(__('The event has been saved.'));
                return $this->redirect($this->referer());
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('event', 'operation'));
        $this->set('_serialize', ['event']);
    }

    //ajax version of joints function that manages add and remove for joint tables.
    public function ajoints()
    {
        $this->autoRender = false;

        //id of the container from where to add/remove
        $containerID = $this->request->data('containerID');

        //if of the content
        $contentID = $this->request->data('contentID');

        //id of the event or else that contains all the rest, allows url redirect to initial page
        $source = $this->request->data('source');

        //container and content types : to load model and contain and to determine switch cases for query objects
        $containerType = $this->request->data('containerType');
        $contentType = $this->request->data('contentType');

        //add or remove : link/unlink
        $action = $this->request->data('action');

        //loads container's model
        $this->loadModel($containerType);

        //cases to populate with joint table
        switch ($containerType . $contentType) {
            case 'TeamsUsers':
                $containerTable = $this->Teams;
                $contentTable = $this->Teams->Users;
                break;
            case 'TeamsMaterials':
                $containerTable = $this->Teams;
                $contentTable = $this->Teams->Materials;
                break;
            case 'TeamsVehicles':
                $containerTable = $this->Teams;
                $contentTable = $this->Teams->Vehicles;
                break;
            case 'EventsTeams':
                $containerTable = $this->Events;
                $contentTable = $this->Events->Teams;
                break;
        }

        //get container query object
        $container = $containerTable->get($containerID, ['contain' => [$contentType]]);
        //get content
        $content = $contentTable->findById($contentID)->toArray();

        //links or unlinks container and content
        if ($action == 'add') {
            $contentTable->link($container, $content);
        } elseif ($action == 'remove') {
            $contentTable->unlink($container, $content);
        }
    }



    //dynamic loading of lists
    //todo: part of incoming huge refactoring
    public function loadlist()
    {

        $table = $this->Operations;

        //gets context
        $source = $this->request->data('source');
        $containerID = $this->request->data('containerID');
        $containerType = $this->request->data('containerType');
        $contentType = $this->request->data('contentType');

        //loads model
        $this->loadModel($containerType);

        //cases to load container query object
        switch ($containerType) {
            case 'Teams':
                $containerTable = $this->Teams;
                break;
            case 'Events':
                $containerTable = $this->Events;
                break;
        }

        switch ($contentType) {
            case 'Users':
                $contain = $contentType;
                break;
            case 'Materials':
                $contain = [$contentType, 'Materials.MaterialTypes'];
                break;
            case 'Vehicles':
                $contain = [$contentType, 'Vehicles.VehicleTypes'];
                break;
            case 'Teams':
                $contain = [$contentType, 'Teams.Users', 'Teams.Materials', 'Teams.Vehicles.VehicleTypes'];
                //get container object with container id
                $content = $containerTable->get($containerID, [
                    'contain' => $contain
                ]);
                break;
        }


        //cases to load content tables
        switch ($contentType) {
            case 'Users':
                $users = $table->Events->Teams->Users->find();
                $users->matching('Teams', function ($q) use ($containerID) {
                    return $q->where(['Teams.id' => $containerID]);
                });
                $this->paginate = [
                    'contain' => ['Barracks']
                ];
                $list = $this->paginate($users);
                break;
            case 'Materials':
                $materials = $table->Events->Teams->Materials->find();
                $materials->matching('Teams', function ($q) use ($containerID) {
                    return $q->where(['Teams.id' => $containerID]);
                });
                $this->paginate = [
                    'contain' => ['Barracks']
                ];
                $list = $this->paginate($materials);
                break;
            case 'Vehicles':
                $vehicles = $table->Events->Teams->Vehicles->find();
                $vehicles->matching('Teams', function ($q) use ($containerID) {
                    return $q->where(['Teams.id' => $containerID]);
                });
                $this->paginate = [
                    'contain' => ['Barracks', 'VehicleTypes']
                ];
                $list = $this->paginate($vehicles);

                break;
            case 'Teams':
                $list = $content;
                break;
        }

        //sets vars
        $this->set('list', $list);
        $this->set(compact('containerID', 'source', 'contentType', 'containerType',
            'teamsList', 'usersList', 'materialsList', 'vehiclesList'));
        $this->set('_serialize', $list);
        if ($contentType == 'Teams') {
            $this->render('teamload');
        }
    }
}
