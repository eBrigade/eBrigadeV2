<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HistoryMp Controller
 *
 * @property \App\Model\Table\HistoryMpTable $HistoryMp
 */
class HistoryMpController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $historyMp = $this->paginate($this->HistoryMp);

        $this->set(compact('historyMp'));
        $this->set('_serialize', ['historyMp']);
    }

    /**
     * View method
     *
     * @param string|null $id History Mp id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historyMp = $this->HistoryMp->get($id, [
            'contain' => []
        ]);

        $this->set('historyMp', $historyMp);
        $this->set('_serialize', ['historyMp']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historyMp = $this->HistoryMp->newEntity();
        if ($this->request->is('post')) {
            $historyMp = $this->HistoryMp->patchEntity($historyMp, $this->request->data);
            if ($this->HistoryMp->save($historyMp)) {
                $this->Flash->success(__('The history mp has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The history mp could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('historyMp'));
        $this->set('_serialize', ['historyMp']);
    }

    /**
     * Edit method
     *
     * @param string|null $id History Mp id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historyMp = $this->HistoryMp->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historyMp = $this->HistoryMp->patchEntity($historyMp, $this->request->data);
            if ($this->HistoryMp->save($historyMp)) {
                $this->Flash->success(__('The history mp has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The history mp could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('historyMp'));
        $this->set('_serialize', ['historyMp']);
    }

    /**
     * Delete method
     *
     * @param string|null $id History Mp id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historyMp = $this->HistoryMp->get($id);
        if ($this->HistoryMp->delete($historyMp)) {
            $this->Flash->success(__('The history mp has been deleted.'));
        } else {
            $this->Flash->error(__('The history mp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
