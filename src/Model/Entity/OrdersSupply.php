<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrdersSupply Entity
 *
 * @property int $order_id
 * @property int $supply_id
 * @property int $quantity
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Supply $supply
 */
class OrdersSupply extends Entity
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
        'order_id' => false,
        'supply_id' => false
    ];
}
