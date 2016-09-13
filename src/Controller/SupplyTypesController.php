<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SupplyTypes Controller
 *
 * @property \App\Model\Table\SupplyTypesTable $SupplyTypes
 */
class SupplyTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $supplyTypes = $this->paginate($this->SupplyTypes);

        $this->set(compact('supplyTypes'));
        $this->set('_serialize', ['supplyTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Supply Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $supplyType = $this->SupplyTypes->get($id, [
            'contain' => []
        ]);

        $this->set('supplyType', $supplyType);
        $this->set('_serialize', ['supplyType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $supplyType = $this->SupplyTypes->newEntity();
        if ($this->request->is('post')) {
            $supplyType = $this->SupplyTypes->patchEntity($supplyType, $this->request->data);
            if ($this->SupplyTypes->save($supplyType)) {
                $this->Flash->success(__('The supply type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supply type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('supplyType'));
        $this->set('_serialize', ['supplyType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supply Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $supplyType = $this->SupplyTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $supplyType = $this->SupplyTypes->patchEntity($supplyType, $this->request->data);
            if ($this->SupplyTypes->save($supplyType)) {
                $this->Flash->success(__('The supply type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The supply type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('supplyType'));
        $this->set('_serialize', ['supplyType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supply Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $supplyType = $this->SupplyTypes->get($id);
        if ($this->SupplyTypes->delete($supplyType)) {
            $this->Flash->success(__('The supply type has been deleted.'));
        } else {
            $this->Flash->error(__('The supply type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
