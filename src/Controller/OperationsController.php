<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * RescuePlans Controller
 *
 * @property \App\Model\Table\RescuePlansTable $RescuePlans
 */
class OperationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    public $helpers = array('GoogleMap');

    public function gestion($id = null)
    {
        $this->loadModel('Events');
        $this->loadModel('Users');
        $this->loadModel('Materials');
        $this->loadModel('Vehicles');
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
        $userLists = $this->Users->find('all');
        $materialsList = $this->Materials->find('all');
        $vehiclesList = $this->Vehicles->find('all');
        $teamsList = $this->Teams->find('all');

        $this->set('event', $event);
        $this->set(compact('teamsList', 'vehiclesList', 'materialsList', 'userLists', 'team', 'users', 'cities', 'bills', 'barracks', 'eventTypes', 'materials', 'teams', 'vehicles'));
        $this->set('_serialize', ['event']);
    }


    public function megaJoints($containerID = null, $contentID = null, $source = null, $containerType = null, $contentType = null, $action= null)
    {

        //id of the container from where to add/remove
        $containerID = isset($this->request->data['containerID']) ? $this->request->data['containerID'] : null;
        $containerID = intval($containerID);

        //if of the content
        $contentID = isset($this->request->data['contentID']) ? $this->request->data['contentID'] : null;
        $contentID = intval($contentID);

        //id of the event or else that contains all the rest, allows url redirect to initial page
        $source = isset($this->request->data['source']) ? $this->request->data['source'] : null;
        $source = intval($source);

        //container and content types : to load model and contain and to determine switch cases for query objects
        $containerType = isset($this->request->data['containerType']) ? $this->request->data['containerType'] : null;
        $contentType = isset($this->request->data['contentType']) ? $this->request->data['contentType'] : null;

        //add or remove : link/unlink
        $action = isset($this->request->data['action']) ? $this->request->data['action'] : null;

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

        //redirect to event view
        return $this->redirect(['action' => 'gestion/' . $source . '']);
    }


    /**
     * A
     */

}
