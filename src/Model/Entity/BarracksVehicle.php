<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BarracksVehicle Entity
 *
 * @property int $barrack_id
 * @property int $vehicle_id
 *
 * @property \App\Model\Entity\Barrack $barrack
 * @property \App\Model\Entity\Vehicle $vehicle
 */
class BarracksVehicle extends Entity
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
        'barrack_id' => false,
        'vehicle_id' => false
    ];
}
