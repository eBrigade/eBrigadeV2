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
        $events = TableRegistry::get('events');
        $event = $events->find();
        $now = Time::now();

        $this->set(compact('event'));
        $this->set(compact('now'));
    }

    // sauvegarde les disponibilités
    public function save()
    {
        $table = TableRegistry::get('availabilities');
        if ($this->request->data) {
            $titre = $this->request->data['title'];
//            $date = $this->request->data['start'];
            $value = $table->newEntity();
            $value->result = $titre;
//            $value->date = $date;
            $table->save($value);
        }

        $availabilities = $table->find();
        $this->set(compact('availabilities'));

    }

}