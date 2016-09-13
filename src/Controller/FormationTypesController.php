<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FormationTypes Controller
 *
 * @property \App\Model\Table\FormationTypesTable $FormationTypes
 */
class FormationTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $formationTypes = $this->paginate($this->FormationTypes);

        $this->set(compact('formationTypes'));
        $this->set('_serialize', ['formationTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Formation Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $formationType = $this->FormationTypes->get($id, [
            'contain' => ['Formations']
        ]);

        $this->set('formationType', $formationType);
        $this->set('_serialize', ['formationType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $formationType = $this->FormationTypes->newEntity();
        if ($this->request->is('post')) {
            $formationType = $this->FormationTypes->patchEntity($formationType, $this->request->data);
            if ($this->FormationTypes->save($formationType)) {
                $this->Flash->success(__('The formation type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formation type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('formationType'));
        $this->set('_serialize', ['formationType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Formation Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $formationType = $this->FormationTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $formationType = $this->FormationTypes->patchEntity($formationType, $this->request->data);
            if ($this->FormationTypes->save($formationType)) {
                $this->Flash->success(__('The formation type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The formation type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('formationType'));
        $this->set('_serialize', ['formationType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Formation Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $formationType = $this->FormationTypes->get($id);
        if ($this->FormationTypes->delete($formationType)) {
            $this->Flash->success(__('The formation type has been deleted.'));
        } else {
            $this->Flash->error(__('The formation type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
