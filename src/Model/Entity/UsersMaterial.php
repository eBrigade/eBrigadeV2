<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersMaterial Entity
 *
 * @property int $user_id
 * @property int $material_id
 * @property int $quantity
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Material $material
 */
class UsersMaterial extends Entity
{

}
