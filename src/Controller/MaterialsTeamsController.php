<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MaterialsTeams Controller
 *
 * @property \App\Model\Table\MaterialsTeamsTable $MaterialsTeams
 */
class MaterialsTeamsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Teams', 'Materials']
        ];
        $materialsTeams = $this->paginate($this->MaterialsTeams);

        $this->set(compact('materialsTeams'));
        $this->set('_serialize', ['materialsTeams']);
    }

    /**
     * View method
     *
     * @param string|null $id Materials Team id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $materialsTeam = $this->MaterialsTeams->get($id, [
            'contain' => ['Teams', 'Materials']
        ]);

        $this->set('materialsTeam', $materialsTeam);
        $this->set('_serialize', ['materialsTeam']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $materialsTeam = $this->MaterialsTeams->newEntity();
        if ($this->request->is('post')) {
            $materialsTeam = $this->MaterialsTeams->patchEntity($materialsTeam, $this->request->data);
            if ($this->MaterialsTeams->save($materialsTeam)) {
                $this->Flash->success(__('The materials team has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The materials team could not be saved. Please, try again.'));
            }
        }
        $teams = $this->MaterialsTeams->Teams->find('list', ['limit' => 200]);
        $materials = $this->MaterialsTeams->Materials->find('list', ['limit' => 200]);
        $this->set(compact('materialsTeam', 'teams', 'materials'));
        $this->set('_serialize', ['materialsTeam']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Materials Team id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $materialsTeam = $this->MaterialsTeams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $materialsTeam = $this->MaterialsTeams->patchEntity($materialsTeam, $this->request->data);
            if ($this->MaterialsTeams->save($materialsTeam)) {
                $this->Flash->success(__('The materials team has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The materials team could not be saved. Please, try again.'));
            }
        }
        $teams = $this->MaterialsTeams->Teams->find('list', ['limit' => 200]);
        $materials = $this->MaterialsTeams->Materials->find('list', ['limit' => 200]);
        $this->set(compact('materialsTeam', 'teams', 'materials'));
        $this->set('_serialize', ['materialsTeam']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Materials Team id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $materialsTeam = $this->MaterialsTeams->get($id);
        if ($this->MaterialsTeams->delete($materialsTeam)) {
            $this->Flash->success(__('The materials team has been deleted.'));
        } else {
            $this->Flash->error(__('The materials team could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
