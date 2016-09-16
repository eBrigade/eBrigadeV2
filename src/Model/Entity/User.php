<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $birthname
 * @property string $email
 * @property string $login
 * @property string $password
 * @property string $phone
 * @property string $cellphone
 * @property string $workphone
 * @property string $address
 * @property string $address_complement
 * @property string $zipcode
 * @property int $city_id
 * @property \Cake\I18n\Time $birthday
 * @property string $birthplace
 * @property string $skype
 * @property bool $is_active
 * @property bool $external
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $connected
 * @property string $personne_referente
 * @property string $tuteur_legal
 * @property int $alerte
 *
 * @property \App\Model\Entity\City $city
 * @property \App\Model\Entity\Availability[] $availabilities
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\UserMaterial[] $user_materials
 * @property \App\Model\Entity\Barrack[] $barracks
 * @property \App\Model\Entity\Skill[] $skills
 * @property \App\Model\Entity\Team[] $teams
 * @property \App\Model\Entity\Vehicle[] $vehicles
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
