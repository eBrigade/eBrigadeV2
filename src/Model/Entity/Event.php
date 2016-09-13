<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property int $city_id
 * @property int $bill_id
 * @property string $title
 * @property string $address
 * @property float $latitude
 * @property float $longitude
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $is_closed
 * @property \Cake\I18n\Time $closed
 * @property int $price
 * @property bool $canceled
 * @property string $canceled_detail
 * @property bool $is_active
 * @property string $instructions
 * @property string $details
 * @property int $barrack_id
 * @property \Cake\I18n\Time $event_start_date
 * @property \Cake\I18n\Time $event_end_date
 * @property string $horaires
 * @property bool $public
 * @property string $module
 * @property int $module_id
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Bill $bill
 * @property \App\Model\Entity\Barrack $barrack
 * @property \App\Model\Entity\EventType $event_type
 * @property \App\Model\Entity\Formation[] $formations
 * @property \App\Model\Entity\RescuePlan[] $rescue_plans
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
