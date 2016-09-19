<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property string $title
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $instructions
 * @property \Cake\I18n\Time $event_start_date
 * @property \Cake\I18n\Time $event_end_date
 * @property bool $public
 * @property string $module
 * @property int $module_id
 *
 * @property \App\Model\Entity\Operation $operation
 * @property \App\Model\Entity\Formation $formation
 * @property \App\Model\Entity\Material[] $materials
 * @property \App\Model\Entity\Team[] $teams
 * @property \App\Model\Entity\Vehicle[] $vehicles
 */
class Event extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
