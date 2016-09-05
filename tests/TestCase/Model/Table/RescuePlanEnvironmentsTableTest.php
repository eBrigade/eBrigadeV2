<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RescuePlanEnvironmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RescuePlanEnvironmentsTable Test Case
 */
class RescuePlanEnvironmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RescuePlanEnvironmentsTable
     */
    public $RescuePlanEnvironments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rescue_plan_environments',
        'app.rescue_plans'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RescuePlanEnvironments') ? [] : ['className' => 'App\Model\Table\RescuePlanEnvironmentsTable'];
        $this->RescuePlanEnvironments = TableRegistry::get('RescuePlanEnvironments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RescuePlanEnvironments);

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
