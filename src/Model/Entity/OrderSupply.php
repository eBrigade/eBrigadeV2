<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderSupply Entity
 *
 * @property int $order_id
 * @property int $supply_id
 * @property int $quantity
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Supply $supply
 */
class OrderSupply extends Entity
{

}
