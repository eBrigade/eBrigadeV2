<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EquipmentTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EquipmentTypesTable Test Case
 */
class EquipmentTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EquipmentTypesTable
     */
    public $EquipmentTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.equipment_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EquipmentTypes') ? [] : ['className' => 'App\Model\Table\EquipmentTypesTable'];
        $this->EquipmentTypes = TableRegistry::get('EquipmentTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EquipmentTypes);

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
