<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RescuePlans Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Events
 * @property \Cake\ORM\Association\BelongsTo $Barracks
 * @property \Cake\ORM\Association\BelongsTo $RescuePlanActivities
 * @property \Cake\ORM\Association\BelongsTo $RescuePlanEnvironments
 * @property \Cake\ORM\Association\BelongsTo $RescuePlanDelays
 * @property \Cake\ORM\Association\BelongsTo $RescuePlanTypes
 * @property \Cake\ORM\Association\BelongsTo $RescuePlanRecommendations
 * @property \Cake\ORM\Association\BelongsTo $Organizations
 * @property \Cake\ORM\Association\BelongsTo $OperationTypes
 *
 * @method \App\Model\Entity\RescuePlan get($primaryKey, $options = [])
 * @method \App\Model\Entity\RescuePlan newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RescuePlan[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlan|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RescuePlan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlan[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlan findOrCreate($search, callable $callback = null)
 */
class RescuePlansTable extends Table
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

        $this->table('rescue_plans');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Barracks', [
            'foreignKey' => 'barrack_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RescuePlanActivities', [
            'foreignKey' => 'rescue_plan_activity_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RescuePlanEnvironments', [
            'foreignKey' => 'rescue_plan_environment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RescuePlanDelays', [
            'foreignKey' => 'rescue_plan_delay_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RescuePlanTypes', [
            'foreignKey' => 'rescue_plan_type_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('RescuePlanRecommendations', [
            'foreignKey' => 'rescue_plan_recommendation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Organizations', [
            'foreignKey' => 'organization_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('OperationTypes', [
            'foreignKey' => 'operation_type_id'
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
            ->integer('public_headcount')
            ->requirePresence('public_headcount', 'create')
            ->notEmpty('public_headcount');

        $validator
            ->numeric('public_ris')
            ->requirePresence('public_ris', 'create')
            ->notEmpty('public_ris');

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
        $rules->add($rules->existsIn(['event_id'], 'Events'));
        $rules->add($rules->existsIn(['barrack_id'], 'Barracks'));
        $rules->add($rules->existsIn(['rescue_plan_activity_id'], 'RescuePlanActivities'));
        $rules->add($rules->existsIn(['rescue_plan_environment_id'], 'RescuePlanEnvironments'));
        $rules->add($rules->existsIn(['rescue_plan_delay_id'], 'RescuePlanDelays'));
        $rules->add($rules->existsIn(['rescue_plan_type_id'], 'RescuePlanTypes'));
        $rules->add($rules->existsIn(['rescue_plan_recommendation_id'], 'RescuePlanRecommendations'));
        $rules->add($rules->existsIn(['organization_id'], 'Organizations'));
        $rules->add($rules->existsIn(['operation_type_id'], 'OperationTypes'));

        return $rules;
    }
}
