<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserMaterials Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Materials
 *
 * @method \App\Model\Entity\UserMaterial get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserMaterial newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserMaterial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserMaterial|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserMaterial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserMaterial[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserMaterial findOrCreate($search, callable $callback = null)
 */
class UserMaterialsTable extends Table
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

        $this->table('user_materials');
        $this->displayField('user_id');
        $this->primaryKey(['user_id', 'material_id']);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Materials', [
            'foreignKey' => 'material_id',
            'joinType' => 'INNER'
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
            ->date('from')
            ->requirePresence('from', 'create')
            ->notEmpty('from');

        $validator
            ->date('to')
            ->allowEmpty('to');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['material_id'], 'Materials'));

        return $rules;
    }
}
