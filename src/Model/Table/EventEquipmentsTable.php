<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EventEquipments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Events
 * @property \Cake\ORM\Association\BelongsTo $Equipment
 *
 * @method \App\Model\Entity\EventEquipment get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventEquipment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EventEquipment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventEquipment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventEquipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventEquipment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventEquipment findOrCreate($search, callable $callback = null)
 */
class EventEquipmentsTable extends Table
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

        $this->table('event_equipments');

        $this->belongsTo('Events', [
            'foreignKey' => 'event_id'
        ]);
        $this->belongsTo('Equipment', [
            'foreignKey' => 'equipment_id'
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
        $rules->add($rules->existsIn(['event_id'], 'Events'));
        $rules->add($rules->existsIn(['equipment_id'], 'Equipment'));

        return $rules;
    }
}
