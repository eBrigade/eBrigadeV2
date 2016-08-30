<?php
namespace App\Controller;

use App\Controller\AppController;

// controlleur pour la messagerie privé
class MessagesController extends AppController
{

// affiche la liste des messages recus
    public function index()
    {
        $messages = $this->paginate($this->Messages);

        $this->set(compact('messages'));
        $this->set('_serialize', ['messages']);
    }

    // affiche le message selectionné
    public function view($id = null)
    {
        $message = $this->Messages->get($id, [
            'contain' => []
        ]);

        $this->set('message', $message);
        $this->set('_serialize', ['message']);
    }
// envoyer un message
    public function send()
    {
        $message = $this->Messages->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['from_user']= 1;
            $message = $this->Messages->patchEntity($message, $this->request->data);
            if ($this->Messages->save($message)) {
                $this->Flash->success(__('Le message a été envoyé.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Le message n\'a pas pu être envoyé. Svp, réessayez.'));
            }
        }
        $this->set(compact('message'));
        $this->set('_serialize', ['message']);
    }

// supprimer un message
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $message = $this->Messages->get($id);
        if ($this->Messages->delete($message)) {
            $this->Flash->success(__('The message has been deleted.'));
        } else {
            $this->Flash->error(__('The message could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
