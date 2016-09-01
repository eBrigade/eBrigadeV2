<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Grades Model
 *
 * @property \Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Grade get($primaryKey, $options = [])
 * @method \App\Model\Entity\Grade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Grade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Grade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Grade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Grade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Grade findOrCreate($search, callable $callback = null)
 */
class GradesTable extends Table
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

        $this->table('grades');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Users', [
            'foreignKey' => 'grade_id'
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
