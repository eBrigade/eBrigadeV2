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
        $table = TableRegistry::get('users');
        $user= $this->Auth->user('id');

        $messages = $this->paginate(
            $this->Messages->find()
                ->where(['to_user' => $user])
                ->andWhere(['send' => 0])
                ->order(['created' => 'DESC']));

        $this->set(compact('table','user','messages'));
        $this->set('_serialize', ['messages']);
    }

// affiche le message selectionné
    public function view($id = null)
    {
        $users = TableRegistry::get('users');
        $user= $this->Auth->user('id');
        $message = $this->Messages->get($id);
        $repondre = $this->Messages->newEntity();

//historique des conversations
        $log = TableRegistry::get('HistoryMp');
        $get_history = $log->find('all')
            ->where(['to_user' =>$user])
            ->orWhere(['from_user' => $user])
            ->order(['created' => 'DESC'])
            ->limit(10)
            ->offset(1);


// répondre au message
        if ($this->request->is('post')) {
            $text = $this->request->data['text'];
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
// sauvegarde dans l'historique
                $log = TableRegistry::get('HistoryMp');
                $logs = $log->newEntity();
                $logs->from_user = $clone->to_user;
                $logs->to_user = $clone->from_user;
                $logs->subject =  "re: $clone->subject";
                $logs->text =  $text;
                $log->save($logs);

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

        $usert = $users->find()->where(['id' => $message->from_user])->first();

        $this->set(compact('usert','user','users','message','repondre','get_history'));
        $this->set('_serialize', ['message']);
    }

// affiche le message envoyé
    public function sendview($id = null)
    {
        $message = $this->Messages->get($id);
        $users = TableRegistry::get('users');
        $user= $this->Auth->user('id');
        $usert = $users->find()->where(['id' => $message->to_user]);


        $this->set(compact('users','usert','user','message'));
        $this->set('_serialize', ['message']);
    }

// affiche la liste des messages envoyés
    public function dispatch()
    {
        $users = TableRegistry::get('users');
        $user= $this->Auth->user('id');
        $messages = $this->paginate(
            $this->Messages->find()
                ->where(['from_user' => $user])
                ->andWhere(['send' => 1])
                ->order(['created' => 'DESC']));


        $this->set(compact('users','user','messages'));
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
            $extract = explode(",", $too);
            $rec = [];
            foreach ($extract as $exxx){
                $message = $this->Messages->newEntity();
                array_push($rec, $exxx);
                $message->from_user = $user;
                $message->to_user = $exxx;
                $message->subject =  $this->request->data['subject'];
                $message->text =  $this->request->data['text'];
                $message->send =  0;
                $message->recipients =  '';
                $this->Messages->save($message);
                $messageInsertId = $message->id;

// sauvegarde dans l'historique
                $log = TableRegistry::get('HistoryMp');
                $logs = $log->newEntity();
                $logs->from_user = $user;
                $logs->to_user = $exxx;
                $logs->subject =  $this->request->data['subject'];
                $logs->text =  $this->request->data['text'];
                $log->save($logs);

// notification par email
                $recipient = $users->find()->select(['email'])->where(['id' => $exxx])->first();
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
                $notifSave->receiver = $exxx;
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
            array_push($lists,'{value:"'.$listuser->id.'",label:"'.$listuser->firstname.' '.$listuser->lastname.'"},');
        }
        $this->set(compact('lists','user','message'));
        $this->set('_serialize', ['message']);
    }

//supprimer plusieurs messages
    public function deleteAll()
    {
        #  désactive le rendu de la vue
        $this->autoRender = false;
        # si la requête est de type AJAX
        if ($this->request->is('ajax')) {
            #  retourner le tableau des ID
            $elements = $this->request->data['id'];
            #  pour chaque id dans le tableau, la rechercher puis l'effacer
            foreach($elements as $element)
            {
                $ids = $this->Messages->get($element);
                $this->Messages->delete($ids);
            }
        }
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