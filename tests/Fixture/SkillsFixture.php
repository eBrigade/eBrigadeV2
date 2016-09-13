<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SkillsFixture
 *
 */
class SkillsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'category' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'validity_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'category' => 'Lorem ipsum dolor sit amet',
            'validity_date' => '2016-09-13'
        ],
    ];
}
