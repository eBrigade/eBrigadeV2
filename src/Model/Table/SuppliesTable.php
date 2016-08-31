<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Supplies Model
 *
 * @property \Cake\ORM\Association\HasMany $OrderSupplies
 * @property \Cake\ORM\Association\BelongsToMany $Providers
 *
 * @method \App\Model\Entity\Supply get($primaryKey, $options = [])
 * @method \App\Model\Entity\Supply newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Supply[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Supply|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Supply patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Supply[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Supply findOrCreate($search, callable $callback = null)
 */
class SuppliesTable extends Table
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

        $this->table('supplies');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('OrderSupplies', [
            'foreignKey' => 'supply_id'
        ]);
        $this->belongsToMany('Providers', [
            'foreignKey' => 'supply_id',
            'targetForeignKey' => 'provider_id',
            'joinTable' => 'providers_supplies'
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
            ->allowEmpty('name');

        return $validator;
    }
}
