<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SkillsUser Entity
 *
 * @property int $skill_id
 * @property int $user_id
 * @property \Cake\I18n\Time $date_acquired
 * @property \Cake\I18n\Time $validity_date
 *
 * @property \App\Model\Entity\Skill $skill
 * @property \App\Model\Entity\User $user
 */
class SkillsUser extends Entity
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
        'skill_id' => false,
        'user_id' => false
    ];
}
