<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Team Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $position_adresse
 * @property string $radio_indicatif
 * @property string $radio_frequence
 * @property float $latitude
 * @property float $longitude
 * @property string $horaires
 * @property string $consignes
 * @property float $prix
 *
 * @property \App\Model\Entity\Event[] $events
 * @property \App\Model\Entity\Material[] $materials
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Vehicle[] $vehicles
 */
class Team extends Entity
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
