<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BarracksVehiclesFixture
 *
 */
class BarracksVehiclesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'barrack_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'vehicle_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'vehicle_id' => ['type' => 'index', 'columns' => ['vehicle_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['barrack_id', 'vehicle_id'], 'length' => []],
            'barracks_vehicles_ibfk_1' => ['type' => 'foreign', 'columns' => ['barrack_id'], 'references' => ['barracks', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'barracks_vehicles_ibfk_2' => ['type' => 'foreign', 'columns' => ['vehicle_id'], 'references' => ['vehicles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'vehicle_id' => 1
        ],
    ];
}
