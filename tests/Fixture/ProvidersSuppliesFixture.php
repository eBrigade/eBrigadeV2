<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProvidersSuppliesFixture
 *
 */
class ProvidersSuppliesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'provider_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'supply_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'supply_id' => ['type' => 'index', 'columns' => ['supply_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['provider_id', 'supply_id'], 'length' => []],
            'providers_supplies_ibfk_1' => ['type' => 'foreign', 'columns' => ['provider_id'], 'references' => ['providers', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'providers_supplies_ibfk_2' => ['type' => 'foreign', 'columns' => ['supply_id'], 'references' => ['supplies', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'provider_id' => 1,
            'supply_id' => 1
        ],
    ];
}
