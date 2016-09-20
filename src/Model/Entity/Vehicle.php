<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vehicle Entity
 *
 * @property int $id
 * @property string $matriculation
 * @property int $number_kilometer
 * @property bool $snow
 * @property bool $air_conditionner
 * @property int $vehicle_type_id
 * @property int $vehicle_model_id
 * @property \Cake\I18n\Time $bought
 * @property \Cake\I18n\Time $end_warranty
 * @property \Cake\I18n\Time $next_revision
 *
 * @property \App\Model\Entity\VehicleType $vehicle_type
 * @property \App\Model\Entity\VehicleModel $vehicle_model
 * @property \App\Model\Entity\Barrack[] $barracks
 * @property \App\Model\Entity\User[] $users
 */
class Vehicle extends Entity
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
