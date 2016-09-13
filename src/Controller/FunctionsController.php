<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Functions Controller
 *
 * @property \App\Model\Table\FunctionsTable $Functions
 */
class FunctionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $functions = $this->paginate($this->Functions);

        $this->set(compact('functions'));
        $this->set('_serialize', ['functions']);
    }

    /**
     * View method
     *
     * @param string|null $id Function id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $function = $this->Functions->get($id, [
            'contain' => []
        ]);

        $this->set('function', $function);
        $this->set('_serialize', ['function']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $function = $this->Functions->newEntity();
        if ($this->request->is('post')) {
            $function = $this->Functions->patchEntity($function, $this->request->data);
            if ($this->Functions->save($function)) {
                $this->Flash->success(__('The function has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The function could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('function'));
        $this->set('_serialize', ['function']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Function id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $function = $this->Functions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $function = $this->Functions->patchEntity($function, $this->request->data);
            if ($this->Functions->save($function)) {
                $this->Flash->success(__('The function has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The function could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('function'));
        $this->set('_serialize', ['function']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Function id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $function = $this->Functions->get($id);
        if ($this->Functions->delete($function)) {
            $this->Flash->success(__('The function has been deleted.'));
        } else {
            $this->Flash->error(__('The function could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
