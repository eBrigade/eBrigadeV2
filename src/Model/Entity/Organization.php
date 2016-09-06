<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Organization Entity
 *
 * @property int $id
 * @property string $title
 * @property string $address1
 * @property string $address2
 * @property int $city_id
 * @property string $email
 * @property string $phone
 * @property string $cellphone
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Formation[] $formations
 * @property \App\Model\Entity\RescuePlan[] $rescue_plans
 */
class Organization extends Entity
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
