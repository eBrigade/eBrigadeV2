<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public function index()
    {

        $this->loadModel('RescuePlans');
        $this->paginate = [
            'contain' => ['Events', 'RescuePlanActivities', 'RescuePlanEnvironments', 'RescuePlanDelays', 'RescuePlanTypes', 'RescuePlanRecommendations', 'Organizations']
        ];
        $rescuePlans = $this->paginate($this->RescuePlans);

        $this->set(compact('rescuePlans'));
        $this->set('_serialize', ['rescuePlans']);
    }

    /**
     * View method
     *
     * @param string|null $id Rescue Plan id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rescuePlan = $this->RescuePlans->get($id, [
            'contain' => ['Events', 'Barracks', 'RescuePlanActivities', 'RescuePlanEnvironments', 'RescuePlanDelays', 'RescuePlanTypes', 'RescuePlanRecommendations', 'Organizations']
        ]);

        $this->set('rescuePlan', $rescuePlan);
        $this->set('_serialize', ['rescuePlan']);
    }

    /**
     * A
     */

}
