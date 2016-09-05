<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BarracksMaterials Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Barracks
 * @property \Cake\ORM\Association\BelongsTo $Materials
 *
 * @method \App\Model\Entity\BarracksMaterial get($primaryKey, $options = [])
 * @method \App\Model\Entity\BarracksMaterial newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BarracksMaterial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BarracksMaterial|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BarracksMaterial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BarracksMaterial[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BarracksMaterial findOrCreate($search, callable $callback = null)
 */
class BarracksMaterialsTable extends Table
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

        $this->table('barracks_materials');
        $this->displayField('barrack_id');
        $this->primaryKey(['barrack_id', 'material_id']);

        $this->belongsTo('Barracks', [
            'foreignKey' => 'barrack_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Materials', [
            'foreignKey' => 'material_id',
            'joinType' => 'INNER'
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
        $rules->add($rules->existsIn(['barrack_id'], 'Barracks'));
        $rules->add($rules->existsIn(['material_id'], 'Materials'));

        return $rules;
    }
}
