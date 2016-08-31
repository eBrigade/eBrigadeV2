<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ListMaterials Model
 *
 * @property \Cake\ORM\Association\HasMany $Materials
 *
 * @method \App\Model\Entity\ListMaterial get($primaryKey, $options = [])
 * @method \App\Model\Entity\ListMaterial newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ListMaterial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ListMaterial|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListMaterial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ListMaterial[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ListMaterial findOrCreate($search, callable $callback = null)
 */
class ListMaterialsTable extends Table
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

        $this->table('list_materials');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Materials', [
            'foreignKey' => 'list_material_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['name']));

        return $rules;
    }
}
