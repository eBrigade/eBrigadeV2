<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EquipmentTypes Model
 *
 * @method \App\Model\Entity\EquipmentType get($primaryKey, $options = [])
 * @method \App\Model\Entity\EquipmentType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EquipmentType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EquipmentType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EquipmentType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EquipmentType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EquipmentType findOrCreate($search, callable $callback = null)
 */
class EquipmentTypesTable extends Table
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

        $this->table('equipment_types');
        $this->displayField('title');
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        return $validator;
    }
}
