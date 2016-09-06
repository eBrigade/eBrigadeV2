<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserMaterial Entity
 *
 * @property int $user_id
 * @property int $material_id
 * @property \Cake\I18n\Time $from_date
 * @property \Cake\I18n\Time $to_date
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Material $material
 */
class UserMaterial extends Entity
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
        'user_id' => false,
        'material_id' => false
    ];
}
