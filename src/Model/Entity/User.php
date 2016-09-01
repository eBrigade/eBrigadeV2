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
 * @property string $address
 * @property string $zipcode
 * @property string $city
 * @property \Cake\I18n\Time $birthday
 * @property string $birthplace
 * @property string $skype
 * @property bool $is_active
 * @property int $permission_id
 * @property int $grade_id
 * @property int $role_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $connected
 *
 * @property \App\Model\Entity\Permission $permission
 * @property \App\Model\Entity\Grade $grade
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Availability[] $availabilities
 * @property \App\Model\Entity\BarrackUser[] $barrack_users
 * @property \App\Model\Entity\EventTeam[] $event_teams
 * @property \App\Model\Entity\Order[] $orders
 * @property \App\Model\Entity\TeamUser[] $team_users
 * @property \App\Model\Entity\Material[] $materials
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