<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VehicleModels Controller
 *
 * @property \App\Model\Table\VehicleModelsTable $VehicleModels
 */
class VehicleModelsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $vehicleModels = $this->paginate($this->VehicleModels);

        $this->set(compact('vehicleModels'));
        $this->set('_serialize', ['vehicleModels']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehicle Model id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicleModel = $this->VehicleModels->get($id, [
            'contain' => ['Vehicles']
        ]);

        $this->set('vehicleModel', $vehicleModel);
        $this->set('_serialize', ['vehicleModel']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicleModel = $this->VehicleModels->newEntity();
        if ($this->request->is('post')) {
            $vehicleModel = $this->VehicleModels->patchEntity($vehicleModel, $this->request->data);
            if ($this->VehicleModels->save($vehicleModel)) {
                $this->Flash->success(__('The vehicle model has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicle model could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vehicleModel'));
        $this->set('_serialize', ['vehicleModel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicle Model id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehicleModel = $this->VehicleModels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicleModel = $this->VehicleModels->patchEntity($vehicleModel, $this->request->data);
            if ($this->VehicleModels->save($vehicleModel)) {
                $this->Flash->success(__('The vehicle model has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The vehicle model could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('vehicleModel'));
        $this->set('_serialize', ['vehicleModel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicle Model id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicleModel = $this->VehicleModels->get($id);
        if ($this->VehicleModels->delete($vehicleModel)) {
            $this->Flash->success(__('The vehicle model has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicle model could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
