<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BarracksVehicles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Barracks
 * @property \Cake\ORM\Association\BelongsTo $Vehicles
 *
 * @method \App\Model\Entity\BarracksVehicle get($primaryKey, $options = [])
 * @method \App\Model\Entity\BarracksVehicle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BarracksVehicle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BarracksVehicle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BarracksVehicle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BarracksVehicle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BarracksVehicle findOrCreate($search, callable $callback = null)
 */
class BarracksVehiclesTable extends Table
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

        $this->table('barracks_vehicles');
        $this->displayField('barrack_id');
        $this->primaryKey(['barrack_id', 'vehicle_id']);

        $this->belongsTo('Barracks', [
            'foreignKey' => 'barrack_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id',
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
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));

        return $rules;
    }
}
