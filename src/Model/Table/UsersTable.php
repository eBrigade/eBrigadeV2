<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Availabilities
 * @property \Cake\ORM\Association\HasMany $Orders
 * @property \Cake\ORM\Association\HasMany $UserMaterials
 * @property \Cake\ORM\Association\BelongsToMany $Barracks
 * @property \Cake\ORM\Association\BelongsToMany $Teams
 * @property \Cake\ORM\Association\BelongsToMany $Vehicles
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Availabilities', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Orders', [
            'foreignKey' => 'user_id'
        ]);
         $this->belongsTo('Cities', [
                    'foreignKey' => 'city_id',
                    'joinType' => 'INNER'
                ]);
        $this->hasMany('UserMaterials', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Barracks', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'barrack_id',
            'joinTable' => 'barracks_users'
        ]);
        $this->belongsToMany('Teams', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'team_id',
            'joinTable' => 'teams_users'
        ]);
        $this->belongsToMany('Vehicles', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'vehicle_id',
            'joinTable' => 'users_vehicles'
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
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->requirePresence('lastname', 'create')
            ->notEmpty('lastname');

        $validator
            ->allowEmpty('birthname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('login', 'create')
            ->notEmpty('login')
            ->add('login', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('cellphone');

        $validator
            ->allowEmpty('workphone');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->requirePresence('address_complement', 'create')
            ->notEmpty('address_complement');

        $validator
            ->allowEmpty('zipcode');

        $validator
            ->allowEmpty('city');

        $validator
            ->date('birthday')
            ->allowEmpty('birthday');

        $validator
            ->allowEmpty('birthplace');

        $validator
            ->allowEmpty('skype');

        $validator
            ->boolean('is_active')
            ->allowEmpty('is_active');

        $validator
            ->boolean('external')
            ->allowEmpty('external');

        $validator
            ->date('connected')
            ->allowEmpty('connected');

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
        $rules->add($rules->isUnique(['login']));

        return $rules;
    }
}
