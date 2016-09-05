<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RescuePlanEnvironments Model
 *
 * @property \Cake\ORM\Association\HasMany $RescuePlans
 *
 * @method \App\Model\Entity\RescuePlanEnvironment get($primaryKey, $options = [])
 * @method \App\Model\Entity\RescuePlanEnvironment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RescuePlanEnvironment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanEnvironment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RescuePlanEnvironment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanEnvironment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanEnvironment findOrCreate($search, callable $callback = null)
 */
class RescuePlanEnvironmentsTable extends Table
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

        $this->table('rescue_plan_environments');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('RescuePlans', [
            'foreignKey' => 'rescue_plan_environment_id'
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
            ->decimal('coefficient')
            ->allowEmpty('coefficient');

        $validator
            ->allowEmpty('title');

        return $validator;
    }
}
