<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;

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
                ->andWhere(['send' => 0])
        );
        $sendmp = $this->Messages->find()
                ->where(['from_user' => $user])
                ->andWhere(['send' => 1])
        ;
        $sendmpcount = $sendmp->count();
        $users = TableRegistry::get('users');
         $this->set(compact('sendmpcount'));
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
        $repondre = $this->Messages->newEntity();

        // répondre au message
        if ($this->request->is('post')) {
            $text = $this->request->data['text'];
            $user = $this->Auth->user('id');
            $repondre->from_user = $message->to_user;
            $repondre->to_user = $message->from_user;
            $repondre->subject = "re: $message->subject";
            $repondre->text = $text;
            $repondre->send = 0;
            $repondre->recipients = '';
            $this->Messages->save($repondre);
            $rec = [];
            if ($this->Messages->save($repondre)) {
                $sendmessage = $this->Messages->newEntity();
                $copy = $message->id;
                $clone = $this->Messages->find()->where(['id' => $copy])->first();
                array_push($rec, $clone->from_user);
                $sendmessage->from_user = $clone->to_user;
                $sendmessage->to_user = $clone->from_user;
                $sendmessage->subject =  "re: $clone->subject";
                $sendmessage->text =  $text;
                $sendmessage->send =  1;
                $sendmessage->recipients = serialize($rec);
                $this->Messages->save($sendmessage);
                // notification par email
                $recipient = $users->find()->select(['email'])->where(['id' => $clone->from_user])->first();
                var_dump($recipient->email);
                $email = new Email('default');
                $email->template('default', 'default')
                    ->emailFormat('html');
                $email->to($recipient->email)
                    ->subject('Vous avez reçu une réponse à votre message privé')
                    ->send($this->request->data['text']);
            }
            $this->Flash->success(__('Le message a été envoyé.'));
            return $this->redirect(['action' => 'index']);
        }

        $this->set('repondre', $repondre);
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
                ->andWhere(['send' => 1])
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
        $frommp = $users->find()->where(['id' => $user])->first();
        if ($this->request->is('post')) {
            $this->request->data['from_user']= $user;
            $too =  $this->request->data['to'];
            $to =  substr($too, 0 , -2);
            $extract = explode(",", $to);
            $rec = [];
            foreach ($extract as $exxx){
                $message = $this->Messages->newEntity();
                $extractf = explode(" ", $exxx);
                $touserid = $users->find()->select(['id'])->where(['firstname' => $extractf[0]])->andWhere(['lastname' => $extractf[1]])->first();
                array_push($rec, $touserid->id);
                $message->from_user = $user;
                $message->to_user = $touserid->id;
                $message->subject =  $this->request->data['subject'];
                $message->text =  $this->request->data['text'];
                $message->send =  0;
                $message->recipients =  '';
                $this->Messages->save($message);
                $messageInsertId = $message->id;

                // notification par email
                $recipient = $users->find()->select(['email'])->where(['id' => $touserid->id])->first();
                $email = new Email('default');
                $email->template('default', 'default')
                    ->emailFormat('html');
                $email->to($recipient->email)
                    ->subject("Vous avez reçu un message privé de $frommp->firstname $frommp->lastname")
                    ->send($this->request->data['text']);

            // notification sur le site
            $notifTable = TableRegistry::get('notifications');
            $notifSave = $notifTable->newEntity();
            $notifSave->source_id =  $messageInsertId;
            $notifSave->receiver = $touserid->id;
                $notifSave->type = 0;
            $notifTable->save($notifSave);

            }

            // copie l'entrée pour historique des messages envoyés
            if ($this->Messages->save($message)) {
                $sendmessage = $this->Messages->newEntity();
                $copy = $message->id;
                $clone = $this->Messages->find()->where(['id' => $copy])->first();
                $sendmessage->from_user = $clone->from_user;
                $sendmessage->to_user = $clone->to_user;
                $sendmessage->subject =  $clone->subject;
                $sendmessage->text =  $clone->text;
                $sendmessage->send =  1;
                $sendmessage->recipients = serialize($rec);
                $this->Messages->save($sendmessage);

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

//supprimer un message
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

    //supprimer une notification de mp
    public function deletenotif()
    {
        $this->loadModel('Notifications');
        $id = $this->request->data['id'];
        $entity = $this->Notifications->get($id);
        $this->Notifications->delete($entity);
    }


}