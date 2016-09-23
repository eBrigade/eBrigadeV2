<?php


namespace App\Controller;

use App\Controller\AppController;


class GestionController extends AppController
{

    public function gestion($module = null, $id = null )
    {


        if ($module == 'operations') {
            $this->loadModel('Operations');
            $table = $this->Operations;
        }
        if ($module == 'formations') {
            $this->loadModel('Formations');
            $table = $this->Formations;
        }

        $operation = $table->get($id, [
            'contain' => ['Events', 'Cities',
                'Events.Teams.Users',
                'Events.Teams.Materials.MaterialTypes',
                'Events.Teams.Vehicles.VehicleTypes'
            ]
        ]);

        $this->set('operation', $operation);
        $this->set(compact('module'));
        $this->set('_serialize', ['operation']);

    }

    public function filtertype()
    {
        $module = $this->request->data('module');
        $contentType = $this->request->data('contentType');


        if ($module == 'operations') {
            $this->loadModel('Operations');
            $table = $this->Operations;
        }
        if ($module == 'formations') {
            $this->loadModel('Formations');
            $table = $this->Formations;
        }

        $barracklist = $table->Barracks->find('all');

        $this->set(compact('barracklist', 'contentType'));

    }

    public function teamselect()
    {
        $module = $this->request->data('module');
        $eventID = $this->request->data('eventID');

        if ($module == 'operations') {
            $this->loadModel('Operations');
            $table = $this->Operations;
        }
        if ($module == 'formations') {
            $this->loadModel('Formations');
            $table = $this->Formations;
        }

        $event = $table->Events->get($eventID, [
            'contain' => 'Teams'
        ]);

        $this->set('event', $event);
        $this->set('_serialize', ['event']);
    }

    public function filterlist()
    {

        $module = $this->request->data('module');

        if ($module == 'operations') {
            $this->loadModel('Operations');
            $table = $this->Operations;
        }
        if ($module == 'formations') {
            $this->loadModel('Formations');
            $table = $this->Formations;
        }

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

    public function addteam($module = null, $id = null)
    {

        if ($module == 'operations') {
            $this->loadModel('Operations');
            $table = $this->Operations;
        }
        if ($module == 'formations') {
            $this->loadModel('Formations');
            $table = $this->Formations;
        }

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

    public function addevent($module = null, $id = null)
    {

        if ($module == 'operations') {
            $this->loadModel('Operations');
            $table = $this->Operations;
        }
        if ($module == 'formations') {
            $this->loadModel('Formations');
            $table = $this->Formations;
        }

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

        $module = $this->request->data('module');
        if ($module == 'operations') {
            $this->loadModel('Operations');
            $table = $this->Operations;
        }
        if ($module == 'formations') {
            $this->loadModel('Formations');
            $table = $this->Formations;
        }

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