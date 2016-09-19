<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Team cell
 */
class TeamCell extends Cell
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
    public function display($id = NULL,$eve)
    {
        $this->loadModel('Formations');
        $formation = $this->Formations->get($id, [
            'contain' => ['Organizations', 'FormationTypes', 'Events', 'Events.Teams', 'Events.Teams.Users', 'Events.Teams.Vehicles', 'Events.Teams.Materials']
        ]);
        $this->set(compact('eve'));
        $this->set('formation', $formation);
        $this->set('_serialize', ['formation']);
    }
}
