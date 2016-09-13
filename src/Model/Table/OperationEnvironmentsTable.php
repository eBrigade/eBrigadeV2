<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OperationEnvironments Model
 *
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\OperationEnvironment get($primaryKey, $options = [])
 * @method \App\Model\Entity\OperationEnvironment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OperationEnvironment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OperationEnvironment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OperationEnvironment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OperationEnvironment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OperationEnvironment findOrCreate($search, callable $callback = null)
 */
class OperationEnvironmentsTable extends Table
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

        $this->table('operation_environments');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Operations', [
            'foreignKey' => 'operation_environment_id'
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
