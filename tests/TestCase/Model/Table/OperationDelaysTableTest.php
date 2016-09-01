<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperationDelaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperationDelaysTable Test Case
 */
class OperationDelaysTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OperationDelaysTable
     */
    public $OperationDelays;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.operation_delays',
        'app.operations',
        'app.events',
        'app.cities',
        'app.barracks',
        'app.barrack_users',
        'app.materials',
        'app.list_materials',
        'app.type_materials',
        'app.users',
        'app.permissions',
        'app.grades',
        'app.roles',
        'app.availabilities',
        'app.event_teams',
        'app.orders',
        'app.providers',
        'app.orders_providers',
        'app.team_users',
        'app.users_materials',
        'app.vehicles',
        'app.type_vehicles',
        'app.model_vehicles',
        'app.event_vehicles',
        'app.users_vehicles',
        'app.organizations',
        'app.formations',
        'app.teachers',
        'app.creators',
        'app.bills',
        'app.responsibles',
        'app.event_equipments',
        'app.operation_activities',
        'app.operation_environments',
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
        $config = TableRegistry::exists('OperationDelays') ? [] : ['className' => 'App\Model\Table\OperationDelaysTable'];
        $this->OperationDelays = TableRegistry::get('OperationDelays', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OperationDelays);

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
