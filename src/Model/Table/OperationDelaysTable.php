<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OperationDelays Model
 *
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\OperationDelay get($primaryKey, $options = [])
 * @method \App\Model\Entity\OperationDelay newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OperationDelay[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OperationDelay|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OperationDelay patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OperationDelay[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OperationDelay findOrCreate($search, callable $callback = null)
 */
class OperationDelaysTable extends Table
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

        $this->table('operation_delays');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Operations', [
            'foreignKey' => 'operation_delay_id'
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
