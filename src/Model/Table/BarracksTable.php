<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Barracks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cities
 * @property \Cake\ORM\Association\HasMany $BarrackUsers
 * @property \Cake\ORM\Association\HasMany $Events
 * @property \Cake\ORM\Association\HasMany $Materials
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\Barrack get($primaryKey, $options = [])
 * @method \App\Model\Entity\Barrack newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Barrack[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Barrack|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Barrack patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Barrack[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Barrack findOrCreate($search, callable $callback = null)
 */
class BarracksTable extends Table
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

        $this->table('barracks');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('BarrackUsers', [
            'foreignKey' => 'barrack_id'
        ]);
        $this->hasMany('Events', [
            'foreignKey' => 'barrack_id'
        ]);
        $this->hasMany('Materials', [
            'foreignKey' => 'barrack_id'
        ]);
        $this->hasMany('Operations', [
            'foreignKey' => 'barrack_id'
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
            ->notEmpty('name');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

        $validator
            ->requirePresence('fax', 'create')
            ->notEmpty('fax');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('website_url', 'create')
            ->notEmpty('website_url');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['city_id'], 'Cities'));

        return $rules;
    }
}
