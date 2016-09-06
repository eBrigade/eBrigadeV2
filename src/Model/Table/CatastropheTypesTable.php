<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CatastropheTypes Model
 *
 * @method \App\Model\Entity\CatastropheType get($primaryKey, $options = [])
 * @method \App\Model\Entity\CatastropheType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CatastropheType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CatastropheType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CatastropheType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CatastropheType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CatastropheType findOrCreate($search, callable $callback = null)
 */
class CatastropheTypesTable extends Table
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

        $this->table('catastrophe_types');
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
            ->requirePresence('te_code', 'create')
            ->notEmpty('te_code');

        $validator
            ->allowEmpty('title');

        $validator
            ->requirePresence('cev_code', 'create')
            ->notEmpty('cev_code');

        return $validator;
    }
}
