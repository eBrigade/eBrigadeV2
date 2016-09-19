<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Event cell
 */
class EventCell extends Cell
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
    public function display($id = NULL)
    {
        // Charger le model event
		// Charger l'id correspondant
		// Récupérer le moddule
		// Si module formation :
		$this->loadModel('Formations');
        $formation = $this->Formations->get($id, [
            'contain' => ['Organizations', 'FormationTypes', 'Events', 'Events.Teams', 'Events.Teams.Users', 'Events.Teams.Vehicles', 'Events.Teams.Materials']
        ]);
		// Si module operations
		// Si module genreique
		
        $this->set('formation', $formation); // Utiliser une variable generique ? Ou personnaliser la variable en fonction.
        $this->set('_serialize', ['formation']);
		
		
    }
}
