<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

// controleur pour voir / editer / ajouter des casernes

class BarracksController extends AppController
{
    // liste des casernes
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
            'contain' => ['Cities', 'BarrackUsers', 'Events', 'Materials']
        ]);

        $this->set('barrack', $barrack);
        $this->set('_serialize', ['barrack']);
    }

   // ajouter une caserne
    public function add()
    {
        $barrack = $this->Barracks->newEntity();
        $getTable = TableRegistry::get('Barracks');
        $cities = TableRegistry::get('Cities');
        if ($this->request->is('post')) {
            $cit = $this->request->data['city_name'];
            $city = $cities->find()->select(['id'])->where(['city' => $cit])->first();
            $id_city =$city['id'];
            $barrack->name = $this->request->data['name'];
            $barrack->address = $this->request->data['address'];
            $barrack->city_id = $id_city;
            $barrack->phone = $this->request->data['phone'];
            $barrack->fax = $this->request->data['fax'];
            $barrack->email = $this->request->data['email'];
            $barrack->website_url = $this->request->data['website_url'];
            $getTable->save($barrack);
            if ($getTable->save($barrack)) {
                $this->Flash->success(__('La caserne a bien été créée.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La caserne n\'a pas pu être sauvegardée. Svp, réessayez.'));
            }
        }

        $this->set(compact('barrack'));
        $this->set('_serialize', ['barrack']);
    }

// editer une caserne
    public function edit($id = null)
    {
        $barrack = $this->Barracks->get($id, [
            'contain' => []
        ]);
        $cities = TableRegistry::get('Cities');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cit = $this->request->data['city_name'];
            $city = $cities->find()->select(['id'])->where(['city' => $cit])->first();
            $id_city =$city['id'];
            $this->request->data['city_id']= $id_city;
            $barrack = $this->Barracks->patchEntity($barrack, $this->request->data);
            if ($this->Barracks->save($barrack)) {
                $this->Flash->success(__('La caserne a été éditée.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La caserne n\'a pas pu être éditée . Svp, réessayez.'));
            }
        }
        $cities = $this->Barracks->Cities->find('list', ['limit' => 200]);
        $this->set(compact('barrack', 'cities'));
        $this->set('_serialize', ['barrack']);
    }

// supprimer une caserne
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $barrack = $this->Barracks->get($id);
        if ($this->Barracks->delete($barrack)) {
            $this->Flash->success(__('La caserne a été supprimée.'));
        } else {
            $this->Flash->error(__('La caserne ne peut pas être supprimée. Svp, réessayez.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
