<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HistoryMp Model
 *
 * @method \App\Model\Entity\HistoryMp get($primaryKey, $options = [])
 * @method \App\Model\Entity\HistoryMp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HistoryMp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HistoryMp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HistoryMp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HistoryMp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HistoryMp findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HistoryMpTable extends Table
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

        $this->table('history_mp');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('to_user')
            ->requirePresence('to_user', 'create')
            ->notEmpty('to_user');

        $validator
            ->integer('from_user')
            ->requirePresence('from_user', 'create')
            ->notEmpty('from_user');

        $validator
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->requirePresence('text', 'create')
            ->notEmpty('text');

        $validator
            ->boolean('send')
            ->requirePresence('send', 'create')
            ->notEmpty('send');

        $validator
            ->requirePresence('recipients', 'create')
            ->notEmpty('recipients');

        return $validator;
    }
}
