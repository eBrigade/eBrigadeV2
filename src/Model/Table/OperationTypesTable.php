<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OperationTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\OperationType get($primaryKey, $options = [])
 * @method \App\Model\Entity\OperationType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OperationType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OperationType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OperationType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OperationType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OperationType findOrCreate($search, callable $callback = null)
 */
class OperationTypesTable extends Table
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

        $this->table('operation_types');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Operations', [
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
