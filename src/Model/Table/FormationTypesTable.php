<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FormationTypes Model
 *
 * @property \Cake\ORM\Association\HasMany $Formations
 *
 * @method \App\Model\Entity\FormationType get($primaryKey, $options = [])
 * @method \App\Model\Entity\FormationType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FormationType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FormationType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FormationType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FormationType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FormationType findOrCreate($search, callable $callback = null)
 */
class FormationTypesTable extends Table
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

        $this->table('formation_types');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->hasMany('Formations', [
            'foreignKey' => 'formation_type_id'
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
            ->integer('name')
            ->allowEmpty('name');

        $validator
            ->allowEmpty('level');

        return $validator;
    }
}
