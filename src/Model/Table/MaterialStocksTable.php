<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MaterialStocks Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Materials
 * @property \Cake\ORM\Association\BelongsTo $Affectations
 *
 * @method \App\Model\Entity\MaterialStock get($primaryKey, $options = [])
 * @method \App\Model\Entity\MaterialStock newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MaterialStock[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MaterialStock|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MaterialStock patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MaterialStock[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MaterialStock findOrCreate($search, callable $callback = null)
 */
class MaterialStocksTable extends Table
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

        $this->table('material_stocks');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Materials', [
            'foreignKey' => 'material_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Barracks', [
            'className' => 'Barracks',
            'condition' => ['affectation' => 'barracks'],
            'foreignKey' => 'affectation_id'
        ]);

        $this->belongsTo('Teams', [
            'className' => 'Teams',
            'condition' => ['affectation' => 'teams'],
            'foreignKey' => 'affectation_id'
        ]);

        $this->belongsTo('Users', [
            'className' => 'Users',
            'condition' => ['affectation' => 'users'],
            'foreignKey' => 'affectation_id',
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
            ->integer('stock')
            ->requirePresence('stock', 'create')
            ->notEmpty('stock');

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
        $rules->add($rules->existsIn(['material_id'], 'Materials'));

        return $rules;
    }
}
