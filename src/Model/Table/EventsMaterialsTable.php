<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EventsMaterials Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Events
 * @property \Cake\ORM\Association\BelongsTo $Materials
 *
 * @method \App\Model\Entity\EventsMaterial get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventsMaterial newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EventsMaterial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventsMaterial|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventsMaterial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventsMaterial[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventsMaterial findOrCreate($search, callable $callback = null)
 */class EventsMaterialsTable extends Table
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

        $this->table('events_materials');
        $this->displayField('event_id');
        $this->primaryKey(['event_id', 'material_id']);

        $this->belongsTo('Events', [
            'foreignKey' => 'event_id',
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
        $rules->add($rules->existsIn(['event_id'], 'Events'));
        $rules->add($rules->existsIn(['material_id'], 'Materials'));

        return $rules;
    }
}
