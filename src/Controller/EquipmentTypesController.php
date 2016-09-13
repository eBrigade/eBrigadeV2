<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * EquipmentTypes Controller
 *
 * @property \App\Model\Table\EquipmentTypesTable $EquipmentTypes
 */
class EquipmentTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $equipmentTypes = $this->paginate($this->EquipmentTypes);

        $this->set(compact('equipmentTypes'));
        $this->set('_serialize', ['equipmentTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Equipment Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipmentType = $this->EquipmentTypes->get($id, [
            'contain' => []
        ]);

        $this->set('equipmentType', $equipmentType);
        $this->set('_serialize', ['equipmentType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipmentType = $this->EquipmentTypes->newEntity();
        if ($this->request->is('post')) {
            $equipmentType = $this->EquipmentTypes->patchEntity($equipmentType, $this->request->data);
            if ($this->EquipmentTypes->save($equipmentType)) {
                $this->Flash->success(__('The equipment type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The equipment type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('equipmentType'));
        $this->set('_serialize', ['equipmentType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipment Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipmentType = $this->EquipmentTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipmentType = $this->EquipmentTypes->patchEntity($equipmentType, $this->request->data);
            if ($this->EquipmentTypes->save($equipmentType)) {
                $this->Flash->success(__('The equipment type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The equipment type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('equipmentType'));
        $this->set('_serialize', ['equipmentType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipment Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipmentType = $this->EquipmentTypes->get($id);
        if ($this->EquipmentTypes->delete($equipmentType)) {
            $this->Flash->success(__('The equipment type has been deleted.'));
        } else {
            $this->Flash->error(__('The equipment type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
