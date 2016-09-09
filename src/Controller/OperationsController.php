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

    public function gestion($id = null) {
        $this->loadModel('Events');
        $this->loadModel('Users');
        $event = $this->Events->get($id, [
            'contain' => [ 'Teams.Materials', 'Teams', 'Teams.Users', 'Teams.Vehicles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {


            /*$event = $this->Events->Teams->link($event, [$team]);*/
           $event = $this->Events->patchEntity($event, $this->request->data, [
               'associated' => ['Teams', 'Teams.Users']
           ]);
            if ($this->Events->save($event)) {
                $this->Flash->success(__('The event has been saved.'));

                return $this->redirect(['action' => 'gestion/'.$id.'']);
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


        $this->set('event', $event);
        $this->set(compact('userLists', 'team', 'users', 'cities', 'bills', 'barracks', 'eventTypes', 'materials', 'teams', 'vehicles'));
        $this->set('_serialize', ['event']);


    }

    public function addTeam() {

        $eventsTeams = TableRegistry::get('EventsTeams');
        $eventID = isset($this->request->query['eventID']) ? $this->request->query['eventID'] : null;
        $teamID = isset($this->request->query['teamID']) ? $this->request->query['teamID'] : null;
        $joinET = $eventsTeams->newEntity();
        $joinET->team_id = $teamID;
        $joinET->event_id = $eventID;
        $eventsTeams->save($joinET);
        return $this->redirect(['action' => 'gestion/'.$eventID.'']);

    }

    public function removeUser() {
       /* $teamsUsers = TableRegistry::get('Teams');*/
        $this->loadModel('Teams');
        $userID = isset($this->request->query['userID']) ? $this->request->query['userID'] : null;
        $teamID = isset($this->request->query['teamID']) ? $this->request->query['teamID'] : null;
        $eventID = isset($this->request->query['eventID']) ? $this->request->query['eventID'] : null;

        $team = $this->Teams->get($teamID, ['contain' => ['Users']]);
        $user = $this->Teams->Users->findById($userID)->toArray();
        $this->Teams->Users->unlink($team, $user);

        return $this->redirect(['action' => 'gestion/'.$eventID.'']);
    }
        public function addUser() {
        /* $teamsUsers = TableRegistry::get('Teams');*/
        $this->loadModel('Teams');
        $userID = isset($this->request->query['userID']) ? $this->request->query['userID'] : null;
        $teamID = isset($this->request->query['teamID']) ? $this->request->query['teamID'] : null;
        $eventID = isset($this->request->query['eventID']) ? $this->request->query['eventID'] : null;

        $team = $this->Teams->get($teamID, ['contain' => ['Users']]);
        $user = $this->Teams->Users->findById($userID)->toArray();
        $this->Teams->Users->link($team, $user);

        return $this->redirect(['action' => 'gestion/'.$eventID.'']);
    }



    /**
     * A
     */

}
