<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProvidersSupplies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Providers
 * @property \Cake\ORM\Association\BelongsTo $Supplies
 *
 * @method \App\Model\Entity\ProvidersSupply get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProvidersSupply newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProvidersSupply[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProvidersSupply|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProvidersSupply patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProvidersSupply[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProvidersSupply findOrCreate($search, callable $callback = null)
 */
class ProvidersSuppliesTable extends Table
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

        $this->table('providers_supplies');

        $this->belongsTo('Providers', [
            'foreignKey' => 'provider_id'
        ]);
        $this->belongsTo('Supplies', [
            'foreignKey' => 'supply_id'
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
        $rules->add($rules->existsIn(['provider_id'], 'Providers'));
        $rules->add($rules->existsIn(['supply_id'], 'Supplies'));

        return $rules;
    }
}
