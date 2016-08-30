<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperationsTable Test Case
 */
class OperationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OperationsTable
     */
    public $Operations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.operations',
        'app.events',
        'app.casernes',
        'app.operation_activities',
        'app.operation_types',
        'app.operation_recommendations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Operations') ? [] : ['className' => 'App\Model\Table\OperationsTable'];
        $this->Operations = TableRegistry::get('Operations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Operations);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
