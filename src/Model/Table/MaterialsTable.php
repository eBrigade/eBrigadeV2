<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Materials Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MaterialTypes
 * @property \Cake\ORM\Association\BelongsTo $Barracks
 * @property \Cake\ORM\Association\HasMany $UserMaterials
 * @property \Cake\ORM\Association\BelongsToMany 
 * @property \Cake\ORM\Association\BelongsToMany $Events
 * @property \Cake\ORM\Association\BelongsToMany $Teams
 *
 * @method \App\Model\Entity\Material get($primaryKey, $options = [])
 * @method \App\Model\Entity\Material newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Material[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Material|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Material patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Material[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Material findOrCreate($search, callable $callback = null)
 */
class MaterialsTable extends Table
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

        $this->table('materials');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('MaterialTypes', [
            'foreignKey' => 'material_type_id'
        ]);
        $this->belongsTo('Barracks', [
            'foreignKey' => 'barrack_id'
        ]);
        $this->hasMany('UserMaterials', [
            'foreignKey' => 'material_id'
        ]);
        $this->belongsToMany('Barracks', [
            'foreignKey' => 'material_id',
            'targetForeignKey' => 'barrack_id',
            'joinTable' => 'barracks_materials'
        ]);
        $this->belongsToMany('Events', [
            'foreignKey' => 'material_id',
            'targetForeignKey' => 'event_id',
            'joinTable' => 'events_materials'
        ]);
        $this->belongsToMany('Teams', [
            'foreignKey' => 'material_id',
            'targetForeignKey' => 'team_id',
            'joinTable' => 'materials_teams'
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
            ->allowEmpty('stock');

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
        $rules->add($rules->existsIn(['material_type_id'], 'MaterialTypes'));
        $rules->add($rules->existsIn(['barrack_id'], 'Barracks'));

        return $rules;
    }
}
