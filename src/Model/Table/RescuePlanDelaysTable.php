<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RescuePlanDelays Model
 *
 * @property \Cake\ORM\Association\HasMany $RescuePlans
 *
 * @method \App\Model\Entity\RescuePlanDelay get($primaryKey, $options = [])
 * @method \App\Model\Entity\RescuePlanDelay newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RescuePlanDelay[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanDelay|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RescuePlanDelay patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanDelay[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RescuePlanDelay findOrCreate($search, callable $callback = null)
 */
class RescuePlanDelaysTable extends Table
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

        $this->table('rescue_plan_delays');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('RescuePlans', [
            'foreignKey' => 'rescue_plan_delay_id'
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
