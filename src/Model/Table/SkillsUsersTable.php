<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SkillsUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Skills
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\SkillsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\SkillsUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SkillsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SkillsUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SkillsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SkillsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SkillsUser findOrCreate($search, callable $callback = null)
 */
class SkillsUsersTable extends Table
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

        $this->table('skills_users');
        $this->displayField('skill_id');
        $this->primaryKey(['skill_id', 'user_id']);

        $this->belongsTo('Skills', [
            'foreignKey' => 'skill_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->date('date_acquired')
            ->requirePresence('date_acquired', 'create')
            ->notEmpty('date_acquired');

        $validator
            ->date('validity_date')
            ->requirePresence('validity_date', 'create')
            ->notEmpty('validity_date');

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
        $rules->add($rules->existsIn(['skill_id'], 'Skills'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
