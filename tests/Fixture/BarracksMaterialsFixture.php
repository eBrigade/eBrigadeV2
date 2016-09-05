<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BarracksMaterialsFixture
 *
 */
class BarracksMaterialsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'barrack_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'material_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'material_id' => ['type' => 'index', 'columns' => ['material_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['barrack_id', 'material_id'], 'length' => []],
            'barracks_materials_ibfk_1' => ['type' => 'foreign', 'columns' => ['barrack_id'], 'references' => ['barracks', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'barracks_materials_ibfk_2' => ['type' => 'foreign', 'columns' => ['material_id'], 'references' => ['materials', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'barrack_id' => 1,
            'material_id' => 1
        ],
    ];
}
