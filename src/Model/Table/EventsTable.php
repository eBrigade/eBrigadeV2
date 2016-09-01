<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Events Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\BelongsTo $Creators
 * @property \Cake\ORM\Association\BelongsTo $Bills
 * @property \Cake\ORM\Association\BelongsTo $Responsibles
 * @property \Cake\ORM\Association\BelongsTo $Barracks
 * @property \Cake\ORM\Association\HasMany $EventEquipments
 * @property \Cake\ORM\Association\HasMany $EventTeams
 * @property \Cake\ORM\Association\HasMany $EventVehicles
 * @property \Cake\ORM\Association\HasMany $Formations
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\Event get($primaryKey, $options = [])
 * @method \App\Model\Entity\Event newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Event[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Event|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Event patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Event[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Event findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EventsTable extends Table
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

        $this->table('events');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->belongsTo('EventTypes', [
            'foreignKey' => 'event_type_id'
        ]);
        $this->belongsTo('Creators', [
            'className' => 'Users',
            'foreignKey' => 'creator_id'
        ]);
        $this->belongsTo('Bills', [
            'foreignKey' => 'bill_id'
        ]);
        $this->belongsTo('Responsibles', [
            'className' => 'Users',
            'foreignKey' => 'responsible_id'
        ]);
        $this->belongsTo('Barracks', [
            'foreignKey' => 'barrack_id'
        ]);
        $this->hasMany('EventEquipments', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('EventTeams', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('EventVehicles', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('Formations', [
            'foreignKey' => 'event_id'
        ]);
        $this->hasMany('Operations', [
            'foreignKey' => 'event_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('title');

        $validator
            ->allowEmpty('address');

        $validator
            ->integer('latitude')
            ->allowEmpty('latitude');

        $validator
            ->integer('longitude')
            ->allowEmpty('longitude');

        $validator
            ->boolean('is_closed')
            ->allowEmpty('is_closed');

        $validator
            ->date('closed')
            ->allowEmpty('closed');

        $validator
            ->integer('price')
            ->allowEmpty('price');

        $validator
            ->boolean('canceled')
            ->allowEmpty('canceled');

        $validator
            ->allowEmpty('canceled_detail');

        $validator
            ->boolean('is_active')
            ->allowEmpty('is_active');

        $validator
            ->allowEmpty('instructions');

        $validator
            ->allowEmpty('details');

        $validator
            ->date('event_start_date')
            ->allowEmpty('event_start_date');

        $validator
            ->date('event_end_date')
            ->allowEmpty('event_end_date');

        $validator
            ->allowEmpty('horaires');

        $validator
            ->boolean('public')
            ->allowEmpty('public');

        return $validator;
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
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        $rules->add($rules->existsIn(['creator_id'], 'Creators'));
        $rules->add($rules->existsIn(['bill_id'], 'Bills'));
        $rules->add($rules->existsIn(['responsible_id'], 'Responsibles'));
        $rules->add($rules->existsIn(['barrack_id'], 'Barracks'));

        return $rules;
    }
}
