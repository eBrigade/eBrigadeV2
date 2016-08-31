<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BarrackUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Barracks
 *
 * @method \App\Model\Entity\BarrackUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\BarrackUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BarrackUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BarrackUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BarrackUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BarrackUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BarrackUser findOrCreate($search, callable $callback = null)
 */
class BarrackUsersTable extends Table
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

        $this->table('barrack_users');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Barracks', [
            'foreignKey' => 'barrack_id'
        ]);
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
        $rules->add($rules->existsIn(['barrack_id'], 'Barracks'));

        return $rules;
    }
}
