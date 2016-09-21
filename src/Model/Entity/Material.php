<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Material Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $material_type_id
 * @property int $barrack_id
 * @property int $user_id
 * @property string $m_reference
 * @property bool $order_made
 *
 * @property \App\Model\Entity\MaterialType $material_type
 * @property \App\Model\Entity\Barrack $barrack
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\MaterialStock[] $material_stocks
 * @property \App\Model\Entity\Team[] $teams
 */
class Material extends Entity
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
