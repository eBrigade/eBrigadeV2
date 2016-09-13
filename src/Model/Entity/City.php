<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int $id
 * @property string $dpt_id
 * @property string $city
 * @property string $zipcode
 * @property float $longitude
 * @property float $latitude
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Barrack[] $barracks
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\Organization[] $organizations
 * @property \App\Model\Entity\User[] $users
 */
class City extends Entity
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
