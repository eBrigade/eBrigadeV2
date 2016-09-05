<?php
namespace App\View\Cell;
use Cake\View\Cell;
use Cake\ORM\TableRegistry;

 // controleur pour le systeme de notification
class NotificationsCell extends Cell
{

    protected $_validCellOptions = [];

    public function display()
    {

        $notifTable = TableRegistry::get('notifications');
        $messageTable = TableRegistry::get('messages');
        $user= $this->request->session()->read('Auth.User.id');

        // compter le nbr de notifications
        $check = $notifTable->find()->where(['to_user' => $user]);
        $notifCount = $check->count();

        // récupérer l'id du message recu
        $mpid = $messageTable->find()->where(['to_user' => $user]);


        $this->set(compact('notifCount'));
        $this->set(compact('check'));
    }
}
