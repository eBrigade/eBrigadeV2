<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventTeam Entity
 *
 * @property int $team_id
 * @property int $user_id
 * @property int $event_id
 * @property string $team_chief_id
 *
 * @property \App\Model\Entity\Team $team
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Event $event
 * @property \App\Model\Entity\TeamChief $team_chief
 */
class EventTeam extends Entity
{

}
