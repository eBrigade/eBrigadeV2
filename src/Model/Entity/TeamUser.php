<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TeamUser Entity
 *
 * @property int $team_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\User $user
 */
class TeamUser extends Entity
{

}
