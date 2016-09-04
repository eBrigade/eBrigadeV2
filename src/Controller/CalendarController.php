<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

// controleur pour le calendrier
class CalendarController extends AppController
{


    // affiche le calendrier
    public function index()
    {
        $events = TableRegistry::get('events');
        $event = $events->find();
        $now = Time::now();

        $this->set(compact('event'));
        $this->set(compact('now'));
    }

    // ajouter les disponibilités
    public function add()
    {
        $table = TableRegistry::get('availabilities');
        $now = Time::now();
        $user = $this->Auth->user('id');
        $availabilities = $table->find()->where(['user_id' => $user])->first();

        $this->set(compact('availabilities'));
        $this->set(compact('now'));
        $this->set(compact('user'));
    }

    // sauvegarde les disponibilités
    public function save()
    {
        $table = TableRegistry::get('availabilities');
        $user = $this->Auth->user('id');
        if ($this->request->data) {
            $availabilities = $table->find()->where(['user_id' => $user])->first();
            // si l'utilisateur a deja un calendrier le mettre a jour
            if ($availabilities->user_id == $user ) {
                $titre = $this->request->data['title'];
                $availabilities->result = $titre;
                $availabilities->user_id = $user;
                $table->save($availabilities);
            }
            // sinon créée une nouvelle entrée
            else{
            $titre = $this->request->data['title'];
            $value = $table->newEntity();
            $value->result = $titre;
           $value->user_id = $user;
            $table->save($value);
        }
    }


        $this->set(compact('availabilities'));
}
}