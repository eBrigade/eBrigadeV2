<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

// controleur pour voir / editer / ajouter des casernes

class BarracksController extends AppController
{

    public function index()
    {
        $this->paginate = [
            'contain' => ['Cities']
        ];
        $barracks = $this->paginate($this->Barracks);

        $this->set(compact('barracks'));
        $this->set('_serialize', ['barracks']);
    }

	// détail d'une caserne
    public function view($id = null)
    {
        $barrack = $this->Barracks->get($id, [
            'contain' => ['Cities', 'BarrackUsers', 'Events', 'Materials', 'Operations']
        ]);

        $this->set('barrack', $barrack);
        $this->set('_serialize', ['barrack']);
    }

    // ajouter une caserne
    public function add()
    {
        $barrack = $this->Barracks->newEntity();
		
        if ($this->request->is('post')) {

            $city = $this->Barracks->Cities->find()
											->select('id')
											->where(['city' => $this->request->data['city_name'] ])
											->first()
											->id;

            $this->request->data['city_id'] = (int) $city;
			
            $barrack = $this->Barracks->patchEntity($barrack, $this->request->data);

            if ($this->Barracks->save($barrack)) {
                $this->Flash->success(__('La caserne a bien été créée.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La caserne n\'a pas pu être sauvegardée. Svp, réessayez.'));
            }
        }
		
        $cities = $this->Barracks->Cities->find('list', ['limit' => 50,'keyField' => 'id','valueField' =>'city']);
		
        $this->set(compact('barrack', 'cities'));
        $this->set('_serialize', ['barrack']);
    }

	// editer une caserne
    public function edit($id = null)
    {
        $barrack = $this->Barracks->get($id, [
            'contain' => ['Cities']
        ]);

        if ($this->request->is('post')) {

            $city = $this->Barracks->Cities->find()
											->select('id')
											->where(['city' => $this->request->data['city_name'] ])
											->first()
											->id;

            $this->request->data['city_id'] = (int) $city;

            $barrack = $this->Barracks->patchEntity($barrack, $this->request->data);
			
            if ($this->Barracks->save($barrack)) {
                $this->Flash->success(__('La caserne a été éditée.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La caserne n\'a pas pu être éditée . Svp, réessayez.'));
            }
        }
		
        $cities = $this->Barracks->Cities->find('list', ['limit' => 50,'keyField' => 'id','valueField' =>'city']);
		
        $this->set(compact('barrack', 'cities'));
        $this->set('_serialize', ['barrack']);
    }

    // supprimer une caserne
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
		
        $barrack = $this->Barracks->get($id);
		
        if ($this->Barracks->delete($barrack)) {
            $this->Flash->success(__('The barrack has been deleted.'));
        } else {
            $this->Flash->error(__('The barrack could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
