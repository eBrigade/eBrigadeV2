<?php
namespace App\View\Cell;
use Cake\View\Cell;


// controleur pour le menu de la messagerie
class BarrackgestionmenuCell extends Cell
{

    public function display($id = null)
    {
        $this->loadModel('Barracks');
        $barrack = $this->Barracks->get($id, [
            'contain' => [ 'Materials','Users',
                 'Vehicles','Formations','Operations'
            ]
        ]);

        $this->set(compact('barrack','id'));
    }

}