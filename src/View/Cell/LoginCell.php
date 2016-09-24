<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Login cell
 */
class LoginCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        if($this->request->session()->read('Auth.User.id') !== null)
        {
            $isConnected = true;
            $myId = $this->request->session()->read('Auth.User.id');
            $this->set('myId',$myId);
            $this->set('auth', $this->request->session()->read('Auth.User.lastname'));
        }
        else{
            $isConnected = false;
        }

        $this->set('isConnected',$isConnected);
    }
}
