<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OperationRecommendations Model
 *
 * @property \Cake\ORM\Association\HasMany $Operations
 *
 * @method \App\Model\Entity\OperationRecommendation get($primaryKey, $options = [])
 * @method \App\Model\Entity\OperationRecommendation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OperationRecommendation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OperationRecommendation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OperationRecommendation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OperationRecommendation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OperationRecommendation findOrCreate($search, callable $callback = null)
 */
class OperationRecommendationsTable extends Table
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

        $this->table('operation_recommendations');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Operations', [
            'foreignKey' => 'operation_recommendation_id'
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
            ->integer('coefficient')
            ->allowEmpty('coefficient');

        $validator
            ->allowEmpty('title');

        return $validator;
    }
}
