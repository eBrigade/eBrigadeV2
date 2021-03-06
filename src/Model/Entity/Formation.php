<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Formation Entity
 *
 * @property int $id
 * @property int $organization_id
 * @property int $event_id
 * @property string $diploma
 * @property string $skills
 * @property int $formation_type_id
 *
 * @property \App\Model\Entity\Organization $organization
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\FormationType $formation_type
 */
class Formation extends Entity
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
