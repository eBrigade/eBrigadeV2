<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MaterialsTeams Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Teams
 * @property \Cake\ORM\Association\BelongsTo $Materials
 *
 * @method \App\Model\Entity\MaterialsTeam get($primaryKey, $options = [])
 * @method \App\Model\Entity\MaterialsTeam newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MaterialsTeam[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MaterialsTeam|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MaterialsTeam patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MaterialsTeam[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MaterialsTeam findOrCreate($search, callable $callback = null)
 */
class MaterialsTeamsTable extends Table
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

        $this->table('materials_teams');
        $this->displayField('team_id');
        $this->primaryKey(['team_id', 'material_id']);

        $this->belongsTo('Teams', [
            'foreignKey' => 'team_id',
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
        $rules->add($rules->existsIn(['team_id'], 'Teams'));
        $rules->add($rules->existsIn(['material_id'], 'Materials'));

        return $rules;
    }
}
