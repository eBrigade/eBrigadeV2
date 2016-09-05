<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RescuePlanTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $RescuePlans
 *
 * @method \App\Model\Entity\RescuePlanType get($primaryKey, $options = [])
 * @method \App\Model\Entity\RescuePlanType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RescuePlanType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RescuePlanType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanType findOrCreate($search, callable $callback = null)
 */
class RescuePlanTypesTable extends Table
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

        $this->table('rescue_plan_types');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('RescuePlans', [
            'foreignKey' => 'rescue_plan_type_id'
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
            ->integer('min')
            ->allowEmpty('min');

        $validator
            ->integer('max')
            ->allowEmpty('max');

        return $validator;
    }
}
