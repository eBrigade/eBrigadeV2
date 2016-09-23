<?php
namespace App\View\Cell;
use Cake\View\Cell;

// controleur pour le menu de la messagerie
class BarrackgestionmenuCell extends Cell
{
    public function display($id = null)
    {
        $this->loadModel('Barracks');
        $barrack = $this->Barracks->get($id)->name;

        $total_user = $this->Barracks->Users->find()->matching('Barracks',function($q)use($id){
            return $q->where(['Barracks.id' => $id]);
        })->count();
        $total_vehi = $this->Barracks->Vehicles->find()->matching('Barracks',function($q)use($id){
            return $q->where(['Barracks.id' => $id]);
        })->count();
        $total_mat = $this->Barracks->Materials->find()->matching('Barracks',function($q)use($id){
            return $q->where(['Barracks.id' => $id]);
        })->count();


        $total_operation = $this->Barracks->Operations->find('all',[
            'conditions' => ['barrack_id' => $id]
        ])->count();
        $total_formation = $this->Barracks->Formations->find('all',[
            'conditions' => ['barrack_id' => $id]
        ])->count();

        $total_event = $total_operation + $total_formation;
        $this->set(compact('total_user','total_event','total_vehi','total_mat','id','barrack'));
    }
}