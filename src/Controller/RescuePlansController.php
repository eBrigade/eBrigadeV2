<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RescuePlans Controller
 *
 * @property \App\Model\Table\RescuePlansTable $RescuePlans
 */
class RescuePlansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Events', 'RescuePlanTypes']
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
            'contain' => ['Events', 'RescuePlanActivities', 'RescuePlanEnvironments', 'RescuePlanDelays', 'RescuePlanTypes', 'RescuePlanRecommendations']
        ]);

        $this->set('rescuePlan', $rescuePlan);
        $this->set('_serialize', ['rescuePlan']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rescuePlan = $this->RescuePlans->newEntity();
        if ($this->request->is('post')) {
            $rescuePlan = $this->RescuePlans->patchEntity($rescuePlan, $this->request->data, [
                'associated' => [
                    'Events'
                ]
            ]);
            if ($this->RescuePlans->save($rescuePlan)) {
                $this->Flash->success(__('The rescue plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rescue plan could not be saved. Please, try again.'));
            }
        }

        $cities = $this->RescuePlans->Events->Cities->find('list', ['limit' => 200]);
        $barracks = $this->RescuePlans->Barracks->find('list', ['limit' => 200]);
        $rescuePlanActivities = $this->RescuePlans->RescuePlanActivities->find('list', ['limit' => 200]);
        $rescuePlanEnvironments = $this->RescuePlans->RescuePlanEnvironments->find('list', ['limit' => 200]);
        $rescuePlanDelays = $this->RescuePlans->RescuePlanDelays->find('list', ['limit' => 200]);
        $rescuePlanTypes = $this->RescuePlans->RescuePlanTypes->find('list', ['limit' => 200]);
        $rescuePlanRecommendations = $this->RescuePlans->RescuePlanRecommendations->find('list', ['limit' => 200]);
        $organizations = $this->RescuePlans->Organizations->find('list', ['limit' => 200]);
        $this->set(compact('cities', 'rescuePlan', 'events', 'barracks', 'rescuePlanActivities', 'rescuePlanEnvironments', 'rescuePlanDelays', 'rescuePlanTypes', 'rescuePlanRecommendations', 'organizations'));
        $this->set('_serialize', ['rescuePlan']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Rescue Plan id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rescuePlan = $this->RescuePlans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rescuePlan = $this->RescuePlans->patchEntity($rescuePlan, $this->request->data);
            if ($this->RescuePlans->save($rescuePlan)) {
                $this->Flash->success(__('The rescue plan has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The rescue plan could not be saved. Please, try again.'));
            }
        }
        $events = $this->RescuePlans->Events->find('list', ['limit' => 200]);
        $barracks = $this->RescuePlans->Barracks->find('list', ['limit' => 200]);
        $rescuePlanActivities = $this->RescuePlans->RescuePlanActivities->find('list', ['limit' => 200]);
        $rescuePlanEnvironments = $this->RescuePlans->RescuePlanEnvironments->find('list', ['limit' => 200]);
        $rescuePlanDelays = $this->RescuePlans->RescuePlanDelays->find('list', ['limit' => 200]);
        $rescuePlanTypes = $this->RescuePlans->RescuePlanTypes->find('list', ['limit' => 200]);
        $rescuePlanRecommendations = $this->RescuePlans->RescuePlanRecommendations->find('list', ['limit' => 200]);
        $organizations = $this->RescuePlans->Organizations->find('list', ['limit' => 200]);
        $this->set(compact('rescuePlan', 'events', 'barracks', 'rescuePlanActivities', 'rescuePlanEnvironments', 'rescuePlanDelays', 'rescuePlanTypes', 'rescuePlanRecommendations', 'organizations'));
        $this->set('_serialize', ['rescuePlan']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Rescue Plan id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rescuePlan = $this->RescuePlans->get($id);
        if ($this->RescuePlans->delete($rescuePlan)) {
            $this->Flash->success(__('The rescue plan has been deleted.'));
        } else {
            $this->Flash->error(__('The rescue plan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
