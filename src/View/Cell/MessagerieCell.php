<?php
namespace App\View\Cell;
use Cake\View\Cell;


// controleur pour le menu de la messagerie
class MessagerieCell extends Cell
{

    public function display($user)
    {
      $this->loadModel('Messages');

        $users = $user;
        $sendmp = $this->Messages->find()
            ->where(['from_user' => $users]) ;

        $sendmpcount = $sendmp->andWhere(['send' => 1])->count();
        $messages =
            $this->Messages->find()
                ->where(['to_user' => $users])
                ->andWhere(['send' => 0]);
        $recmpcount = $messages->count();

        $this->set(compact('sendmpcount'));
        $this->set(compact('recmpcount'));



    }

}