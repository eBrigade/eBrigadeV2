<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperationActivitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperationActivitiesTable Test Case
 */
class OperationActivitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OperationActivitiesTable
     */
    public $OperationActivities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.operation_activities',
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
        'app.operation_environments',
        'app.operation_delays',
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
        $config = TableRegistry::exists('OperationActivities') ? [] : ['className' => 'App\Model\Table\OperationActivitiesTable'];
        $this->OperationActivities = TableRegistry::get('OperationActivities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OperationActivities);

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
