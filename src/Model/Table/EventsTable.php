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
 * @property \Cake\ORM\Association\BelongsTo $Bills
 * @property \Cake\ORM\Association\BelongsTo $Barracks
 * @property \Cake\ORM\Association\BelongsTo $Modules
 * @property \Cake\ORM\Association\HasMany $Formations
 * @property \Cake\ORM\Association\BelongsToMany $Materials
 * @property \Cake\ORM\Association\BelongsToMany $Teams
 * @property \Cake\ORM\Association\BelongsToMany $Vehicles
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

        /*$this->addBehavior('Geocodable', [
            'addressColumn' => [
                'address',
                'ville'
            ]
        ]);*/


        $this->belongsTo('Operations', [
            'className' => 'Operations',
            'condition' => ['module' => 'operations'],
            'foreignKey' => 'module_id'
        ]);

        $this->belongsTo('Formations', [
            'className' => 'Formations',
            'condition' => ['module' => 'formations'],
            'foreignKey' => 'module_id'
        ]);

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->belongsTo('Bills', [
            'foreignKey' => 'bill_id'
        ]);
        $this->belongsTo('Barracks', [
            'foreignKey' => 'barrack_id'
        ]);


        $this->belongsToMany('Materials', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'material_id',
            'joinTable' => 'events_materials'
        ]);
        $this->belongsToMany('Teams', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'team_id',
            'joinTable' => 'events_teams'
        ]);
        $this->belongsToMany('Vehicles', [
            'foreignKey' => 'event_id',
            'targetForeignKey' => 'vehicle_id',
            'joinTable' => 'events_vehicles'
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
            ->allowEmpty('city_id');

        $validator
            ->allowEmpty('ville');

        $validator
            ->allowEmpty('barrack_id');

        $validator
            ->numeric('latitude')
            ->allowEmpty('latitude');

        $validator
            ->numeric('longitude')
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
            ->dateTime('event_start_date')
            ->allowEmpty('event_start_date');

        $validator
            ->dateTime('event_end_date')
            ->allowEmpty('event_end_date');

        $validator
            ->allowEmpty('horaires');

        $validator
            ->boolean('public')
            ->allowEmpty('public');

        $validator
            ->allowEmpty('module');

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
        $rules->add($rules->existsIn(['bill_id'], 'Bills'));
        $rules->add($rules->existsIn(['barrack_id'], 'Barracks'));
        /*$rules->add($rules->existsIn(['module_id'], 'Operations'));*/

        return $rules;
    }
}
