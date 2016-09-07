<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventsVehicle Entity
 *
 * @property int $event_id
 * @property int $vehicle_id
 *
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\Vehicle $vehicle
 */class EventsVehicle extends Entity
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
        'event_id' => false,
        'vehicle_id' => false
    ];
}
