<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TypeVehicles
 * @property \Cake\ORM\Association\BelongsTo $ModelVehicles
 * @property \Cake\ORM\Association\HasMany $EventVehicles
 * @property \Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Vehicle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehicle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicle findOrCreate($search, callable $callback = null)
 */
class VehiclesTable extends Table
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

        $this->table('vehicles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('TypeVehicles', [
            'foreignKey' => 'type_vehicle_id'
        ]);
        $this->belongsTo('ModelVehicles', [
            'foreignKey' => 'model_vehicle_id'
        ]);
        $this->hasMany('EventVehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'vehicle_id',
            'targetForeignKey' => 'user_id',
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
            ->allowEmpty('matriculation');

        $validator
            ->integer('number_kilometer')
            ->allowEmpty('number_kilometer');

        $validator
            ->boolean('snow')
            ->allowEmpty('snow');

        $validator
            ->boolean('air_conditionner')
            ->allowEmpty('air_conditionner');

        $validator
            ->date('bought')
            ->allowEmpty('bought');

        $validator
            ->date('end_warranty')
            ->allowEmpty('end_warranty');

        $validator
            ->date('next_revision')
            ->allowEmpty('next_revision');

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
        $rules->add($rules->existsIn(['type_vehicle_id'], 'TypeVehicles'));
        $rules->add($rules->existsIn(['model_vehicle_id'], 'ModelVehicles'));

        return $rules;
    }
}
