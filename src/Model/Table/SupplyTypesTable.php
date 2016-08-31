<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SupplyTypes Model
 *
 * @method \App\Model\Entity\SupplyType get($primaryKey, $options = [])
 * @method \App\Model\Entity\SupplyType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SupplyType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SupplyType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SupplyType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SupplyType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SupplyType findOrCreate($search, callable $callback = null)
 */
class SupplyTypesTable extends Table
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

        $this->table('supply_types');
        $this->displayField('name');
        $this->primaryKey('id');
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
            ->requirePresence('code', 'create')
            ->notEmpty('code');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('measure_unit', 'create')
            ->notEmpty('measure_unit');

        $validator
            ->numeric('quantity_per_unit')
            ->requirePresence('quantity_per_unit', 'create')
            ->notEmpty('quantity_per_unit');

        return $validator;
    }
}
