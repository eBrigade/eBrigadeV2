<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HistoryMp Entity
 *
 * @property int $id
 * @property int $to_user
 * @property int $from_user
 * @property string $subject
 * @property string $text
 * @property \Cake\I18n\Time $created
 * @property bool $send
 * @property string $recipients
 */
class HistoryMp extends Entity
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
