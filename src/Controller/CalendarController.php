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


    }

}