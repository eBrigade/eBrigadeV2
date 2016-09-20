<?php
namespace App\View\Cell;
use Cake\View\Cell;


// controleur pour le menu de la messagerie
class BarrackCell extends Cell
{

    public function display()
    {
        $this->loadModel('Cities');
        $tableregion = $this->Cities->Departments->Regions;
        $tabledpt = $this->Cities->Departments;
        $region = $tableregion->find('list', [
            'keyField' => 'id',
            'valueField' => 'region'
        ]);
        $dpt = $tabledpt->find('list', [
            'keyField' => 'id',
            'valueField' => 'dpt'
        ]);

        $this->set(compact('region','dpt'));
    }

}