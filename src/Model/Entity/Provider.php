<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Provider Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $zipcode
 * @property string $city
 * @property string $phone
 * @property string $email
 * @property string $descritpion
 * @property string $website
 *
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\Supply[] $supplies
 */
class Provider extends Entity
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
