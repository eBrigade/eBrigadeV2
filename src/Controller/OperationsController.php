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


    public function megaJoints()
    {

        //id of the container from where to add/remove
        $containerID = isset($this->request->query['containerID']) ? $this->request->query['containerID'] : null;

        //if of the content
        $contentID = isset($this->request->query['contentID']) ? $this->request->query['contentID'] : null;

        //id of the event or else that contains all the rest, allows url redirect to initial page
        $source = isset($this->request->query['source']) ? $this->request->query['source'] : null;

        //container and content types : to load model and contain and to determine switch cases for query objects
        $containerType = isset($this->request->query['containerType']) ? $this->request->query['containerType'] : null;
        $contentType = isset($this->request->query['contentType']) ? $this->request->query['contentType'] : null;

        //add or remove : link/unlink
        $action = isset($this->request->query['action']) ? $this->request->query['action'] : null;

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
