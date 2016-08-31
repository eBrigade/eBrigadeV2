<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

// controleur pour la messagerie privé
class MessagesController extends AppController
{

// affiche la liste des messages recus
    public function index()
    {

        $user= $this->Auth->user('id');
        $messages = $this->paginate(
            $this->Messages->find()
                ->where(['to_user' => $user])
        );
        $users = TableRegistry::get('users');
        $this->set(compact('users'));
        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);
    }

    // affiche le message selectionné
    public function view($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => []
        ]);
        $users = TableRegistry::get('users');
        $this->set(compact('users'));
        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }

    // affiche le message envoyé
    public function sendview($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => []
        ]);
        $users = TableRegistry::get('users');
        $this->set(compact('users'));
        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }

    // affiche la liste des messages envoyés
    public function dispatch()
    {
        $user= $this->Auth->user('id');
        $messages = $this->paginate(
            $this->Messages->find()
                ->where(['from_user' => $user])
        );
        $users = TableRegistry::get('users');
        $this->set(compact('users'));
        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);
    }

// envoyer un message
    public function send()
    {
        $users = TableRegistry::get('users');
        $message = $this->Messages->newEntity();
        $user= $this->Auth->user('id');
        if ($this->request->is('post')) {
            $this->request->data['from_user']= $user;
            $to =  $this->request->data['to'];
            $exto = explode(" ", $to);
            $touserid = $users->find()->select(['id'])->where(['firstname' => $exto[0]])->andWhere(['lastname' => $exto[1]])->first();
            $this->request->data['to_user']= $touserid->id;
            $message = $this->Messages->patchEntity($message, $this->request->data);
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('Le message a été envoyé.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le message n\'a pas pu être envoyé. Svp, réessayez.'));
            }
        }

        $listusers = $users->find();
$lists = [];
foreach ($listusers as $listuser) {
    array_push($lists, $listuser->firstname.' '.$listuser->lastname);
}
            $this->set(compact('lists'));
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }

// supprimer un message
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('Le message a été supprimé.'));
        } else {
            $this->Flash->error(__('Le message n\'a pas pu être supprimé. Svp, réessayez.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}
