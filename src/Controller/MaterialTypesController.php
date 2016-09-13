<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MaterialTypes Controller
 *
 * @property \App\Model\Table\MaterialTypesTable $MaterialTypes
 */
class MaterialTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $materialTypes = $this->paginate($this->MaterialTypes);

        $this->set(compact('materialTypes'));
        $this->set('_serialize', ['materialTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Material Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materialType = $this->MaterialTypes->get($id, [
            'contain' => ['Materials']
        ]);

        $this->set('materialType', $materialType);
        $this->set('_serialize', ['materialType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materialType = $this->MaterialTypes->newEntity();
        if ($this->request->is('post')) {
            $materialType = $this->MaterialTypes->patchEntity($materialType, $this->request->data);
            if ($this->MaterialTypes->save($materialType)) {
                $this->Flash->success(__('The material type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('materialType'));
        $this->set('_serialize', ['materialType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Material Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materialType = $this->MaterialTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materialType = $this->MaterialTypes->patchEntity($materialType, $this->request->data);
            if ($this->MaterialTypes->save($materialType)) {
                $this->Flash->success(__('The material type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The material type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('materialType'));
        $this->set('_serialize', ['materialType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Material Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materialType = $this->MaterialTypes->get($id);
        if ($this->MaterialTypes->delete($materialType)) {
            $this->Flash->success(__('The material type has been deleted.'));
        } else {
            $this->Flash->error(__('The material type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
