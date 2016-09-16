<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MaterialStock Entity
 *
 * @property int $id
 * @property int $material_id
 * @property int $stock
 * @property int $affectation_id
 *
 * @property \App\Model\Entity\Affectation $affectation
 * @property \App\Model\Entity\Material $material
 */
class MaterialStock extends Entity
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
