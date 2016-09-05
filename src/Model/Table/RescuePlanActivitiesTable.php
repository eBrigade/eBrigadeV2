<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RescuePlanActivities Model
 *
 * @property \Cake\ORM\Association\HasMany $RescuePlans
 *
 * @method \App\Model\Entity\RescuePlanActivity get($primaryKey, $options = [])
 * @method \App\Model\Entity\RescuePlanActivity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RescuePlanActivity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanActivity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RescuePlanActivity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanActivity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanActivity findOrCreate($search, callable $callback = null)
 */
class RescuePlanActivitiesTable extends Table
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

        $this->table('rescue_plan_activities');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('RescuePlans', [
            'foreignKey' => 'rescue_plan_activity_id'
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
            ->allowEmpty('coefficient');

        $validator
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        return $validator;
    }
}
