<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * RescuePlans Controller
 *
 * @property \App\Model\Table\RescuePlansTable $RescuePlans
 */
class OperaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public $helpers = array('GoogleMap');

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }


    public function gestion($id = null)
    {
        $this->loadModel('Events');
        $this->loadModel('Teams');

        $event = $this->Events->get($id, [
            'contain' => ['Teams.Materials', 'Teams', 'Teams.Users', 'Teams.Vehicles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $event = $this->Events->patchEntity($event, $this->request->data, [
                'associated' => ['Teams', 'Teams.Users']
            ]);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'gestion/' . $id . '']);
            } else {
                $this->Flash->error(__('The event could not be saved. Please, try again.'));
            }
        }

        $cities = $this->Events->Cities->find('list', ['limit' => 200]);
        $barracks = $this->Events->Barracks->find('list', ['limit' => 200]);
        $materials = $this->Events->Materials->find('list', ['limit' => 200]);
        $teams = $this->Events->Teams->find('list', ['limit' => 200]);
        $vehicles = $this->Events->Vehicles->find('list', ['limit' => 200]);
        $users = $this->Events->Teams->Users->find('list', ['limit' => 200]);
        $teamsList = $this->Teams->find('all');


        $this->set('event', $event);
        $this->set(compact( 'teamsList', 'users', 'cities', 'bills', 'barracks', 'eventTypes', 'materials', 'teams', 'vehicles'));
        $this->set('_serialize', ['event']);
    }

    public function loadteams() {

        $this->loadModel('Events');
        $this->loadModel('Users');
        $this->loadModel('Materials');
        $this->loadModel('Vehicles');
        $this->loadModel('Teams');

        $eventID = $this->request->data('eventID');

        $event = $this->Events->get($eventID, [
            'contain' => ['Teams']
        ]);

        $userLists = $this->Users->find('all');
        $materialsList = $this->Materials->find('all');
        $vehiclesList = $this->Vehicles->find('all');
        $teamsList = $this->Teams->find('all');

        $this->set('event', $event);
        $this->set(compact('teamsList', 'vehiclesList', 'materialsList', 'userLists'));
        $this->set('_serialize', ['event']);

    }


    //dynamic loading of lists
    public function loadlist() {

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

        //get container object with container id
        $content = $containerTable->get($containerID, [
            'contain' => $contentType
        ]);

        //cases to load content tables
        switch ($contentType) {
            case 'Users':
                $list = $content->users;
                break;
            case 'Materials':
                $list = $content->materials;
                break;
            case 'Vehicles':
                $list = $content->vehicles;
                break;
            case 'Teams':
                $list = $content->teams;
                break;
        }

        //sets vars
        $this->set('list', $list);
        $this->set(compact('containerID', 'source', 'contentType', 'containerType'));
        $this->set('_serialize', [$list]);
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
}
