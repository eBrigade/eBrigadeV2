<?php
namespace App\View\Cell;
use Cake\View\Cell;

 // controleur pour le systeme de notification
class NotificationsCell extends Cell
{

    protected $_validCellOptions = [];

    public function display()
    {
        $this->loadModel('Notifications');
        $user= $this->request->session()->read('Auth.User.id');

        // compter le nbr de notifications
        $check = $this->Notifications->find()->where(['receiver' => $user])->contain(['Messages.Users']);
        $notifCount = $check->count();


        $this->set(compact('notifCount'));
        $this->set(compact('check'));
    }

}
