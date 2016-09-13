<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Barrack Entity
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $address
 * @property string $address_complement
 * @property int $city_id
 * @property string $phone
 * @property string $fax
 * @property string $email
 * @property string $website_url
 * @property string $ordre
 * @property string $rib
 * @property int $lft
 * @property int $rght
 *
 * @property \App\Model\Entity\Barrack $parent_barrack
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Barrack[] $child_barracks
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\Material[] $materials
 * @property \App\Model\Entity\Operation[] $operations
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Vehicle[] $vehicles
 */
class Barrack extends Entity
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
