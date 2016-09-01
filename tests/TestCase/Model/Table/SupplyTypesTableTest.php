<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SupplyTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SupplyTypesTable Test Case
 */
class SupplyTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SupplyTypesTable
     */
    public $SupplyTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supply_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SupplyTypes') ? [] : ['className' => 'App\Model\Table\SupplyTypesTable'];
        $this->SupplyTypes = TableRegistry::get('SupplyTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SupplyTypes);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
