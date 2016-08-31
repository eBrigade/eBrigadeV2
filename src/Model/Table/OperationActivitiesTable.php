<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OperationActivities Model
 *
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\OperationActivity get($primaryKey, $options = [])
 * @method \App\Model\Entity\OperationActivity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OperationActivity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OperationActivity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OperationActivity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OperationActivity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OperationActivity findOrCreate($search, callable $callback = null)
 */
class OperationActivitiesTable extends Table
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

        $this->table('operation_activities');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Operations', [
            'foreignKey' => 'operation_activity_id'
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
