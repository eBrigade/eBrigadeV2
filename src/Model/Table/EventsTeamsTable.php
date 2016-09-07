<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EventsTeams Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Teams
 * @property \Cake\ORM\Association\BelongsTo $Events
 *
 * @method \App\Model\Entity\EventsTeam get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventsTeam newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EventsTeam[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventsTeam|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsTeam patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventsTeam[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventsTeam findOrCreate($search, callable $callback = null)
 */class EventsTeamsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('events_teams');
        $this->displayField('team_id');
        $this->primaryKey(['team_id', 'event_id']);

        $this->belongsTo('Teams', [
            'foreignKey' => 'team_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['team_id'], 'Teams'));
        $rules->add($rules->existsIn(['event_id'], 'Events'));

        return $rules;
    }
}
