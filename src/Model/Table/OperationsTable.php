<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Operations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Barracks
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\BelongsTo $OperationActivities
 * @property \Cake\ORM\Association\BelongsTo $OperationEnvironments
 * @property \Cake\ORM\Association\BelongsTo $OperationDelays
 * @property \Cake\ORM\Association\BelongsTo $OperationRecommendations

 * @property \Cake\ORM\Association\BelongsTo $OperationTypes
 * @property \Cake\ORM\Association\BelongsTo $Bills
 *
 * @method \App\Model\Entity\Operation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Operation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Operation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Operation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Operation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Operation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Operation findOrCreate($search, callable $callback = null)
 */
class OperationsTable extends Table
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

        $this->table('operations');
        $this->displayField('title');
        $this->primaryKey('id');


        $this->addBehavior('Geocodable', [
            'addressColumn' => [
                'address',
                'ville'
            ]
        ]);

        $this->hasMany('Events', [
            'className' => 'Events',
            'conditions' => ['module' => 'operations'],
            'foreignKey' => 'module_id',
            'dependent' => true
        ]);

        $this->belongsTo('Barracks', [
            'foreignKey' => 'barrack_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
        ]);
        $this->belongsTo('OperationActivities', [
            'foreignKey' => 'operation_activity_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OperationEnvironments', [
            'foreignKey' => 'operation_environment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OperationDelays', [
            'foreignKey' => 'operation_delay_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OperationRecommendations', [
            'foreignKey' => 'operation_recommendation_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('OperationTypes', [
            'foreignKey' => 'operation_type_id'
        ]);
        $this->belongsTo('Bills', [
            'foreignKey' => 'bill_id'
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
            ->allowEmpty('address');

        $validator
            ->integer('public_headcount')
            ->requirePresence('public_headcount', 'create')
            ->notEmpty('public_headcount');



        $validator
            ->requirePresence('public_reinforcement', 'create')
            ->notEmpty('public_reinforcement');

        $validator
            ->integer('public_total')
            ->requirePresence('public_total', 'create')
            ->notEmpty('public_total');

        $validator
            ->integer('actors_headcount')
            ->requirePresence('actors_headcount', 'create')
            ->notEmpty('actors_headcount');

        $validator
            ->integer('rescuers_total')
            ->requirePresence('rescuers_total', 'create')
            ->notEmpty('rescuers_total');

        $validator
            ->integer('headcount_total')
            ->requirePresence('headcount_total', 'create')
            ->notEmpty('headcount_total');

        $validator
            ->allowEmpty('actors_organization');

        $validator
            ->allowEmpty('general_organization');

        $validator
            ->allowEmpty('transport_organization');

        $validator
            ->allowEmpty('team_instructions');

        $validator
            ->integer('report_assisted')
            ->allowEmpty('report_assisted');

        $validator
            ->integer('report_slight')
            ->allowEmpty('report_slight');

        $validator
            ->integer('report_medicalized')
            ->allowEmpty('report_medicalized');

        $validator
            ->integer('report_reinforcement')
            ->allowEmpty('report_reinforcement');

        $validator
            ->integer('report_evacuated')
            ->allowEmpty('report_evacuated');

        $validator
            ->allowEmpty('report_bilan_notes');

        $validator
            ->integer('meals_morning')
            ->requirePresence('meals_morning', 'create')
            ->notEmpty('meals_morning');

        $validator
            ->integer('meals_lunch')
            ->requirePresence('meals_lunch', 'create')
            ->notEmpty('meals_lunch');

        $validator
            ->integer('meals_dinner')
            ->requirePresence('meals_dinner', 'create')
            ->notEmpty('meals_dinner');

        $validator
            ->integer('meals_unit_cost')
            ->requirePresence('meals_unit_cost', 'create')
            ->notEmpty('meals_unit_cost');

        $validator
            ->integer('meals_charge')
            ->requirePresence('meals_charge', 'create')
            ->notEmpty('meals_charge');

        $validator
            ->integer('meals_cost')
            ->requirePresence('meals_cost', 'create')
            ->notEmpty('meals_cost');

        $validator
            ->integer('cost_kilometers_vps')
            ->requirePresence('cost_kilometers_vps', 'create')
            ->notEmpty('cost_kilometers_vps');

        $validator
            ->integer('cost_kilometers_other')
            ->requirePresence('cost_kilometers_other', 'create')
            ->notEmpty('cost_kilometers_other');

        $validator
            ->integer('discount_percentage')
            ->requirePresence('discount_percentage', 'create')
            ->notEmpty('discount_percentage');

        $validator
            ->allowEmpty('discount_reason');

        $validator
            ->integer('cost_percentage_adpc')
            ->requirePresence('cost_percentage_adpc', 'create')
            ->notEmpty('cost_percentage_adpc');

        $validator
            ->integer('total_cost')
            ->requirePresence('total_cost', 'create')
            ->notEmpty('total_cost');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmpty('date');

        $validator
            ->numeric('latitude')
            ->allowEmpty('latitude');

        $validator
            ->numeric('longitude')
            ->allowEmpty('longitude');

        $validator
            ->allowEmpty('title');

        $validator
            ->integer('is_closed')
            ->allowEmpty('is_closed');

        $validator
            ->integer('canceled')
            ->allowEmpty('canceled');

        $validator
            ->allowEmpty('canceled_detail');

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
        $rules->add($rules->existsIn(['barrack_id'], 'Barracks'));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));
        $rules->add($rules->existsIn(['operation_activity_id'], 'OperationActivities'));
        $rules->add($rules->existsIn(['operation_environment_id'], 'OperationEnvironments'));
        $rules->add($rules->existsIn(['operation_delay_id'], 'OperationDelays'));
        $rules->add($rules->existsIn(['operation_recommendation_id'], 'OperationRecommendations'));
        $rules->add($rules->existsIn(['operation_type_id'], 'OperationTypes'));
        $rules->add($rules->existsIn(['bill_id'], 'Bills'));

        return $rules;
    }
}
