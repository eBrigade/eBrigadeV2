<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VehiclesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VehiclesTable Test Case
 */
class VehiclesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VehiclesTable
     */
    public $Vehicles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehicles',
        'app.vehicle_types',
        'app.vehicle_models',
        'app.barracks',
        'app.cities',
        'app.events',
        'app.bills',
        'app.event_types',
        'app.formations',
        'app.organizations',
        'app.rescue_plans',
        'app.rescue_plan_activities',
        'app.rescue_plan_environments',
        'app.rescue_plan_delays',
        'app.rescue_plan_types',
        'app.rescue_plan_recommendations',
        'app.operation_types',
        'app.formation_types',
        'app.materials',
        'app.material_types',
        'app.barracks_materials',
        'app.user_materials',
        'app.users',
        'app.permissions',
        'app.grades',
        'app.roles',
        'app.availabilities',
        'app.orders',
        'app.providers',
        'app.supplies',
        'app.orders_supplies',
        'app.providers_supplies',
        'app.barracks_users',
        'app.teams',
        'app.events_teams',
        'app.materials_teams',
        'app.teams_users',
        'app.teams_vehicles',
        'app.users_vehicles',
        'app.events_materials',
        'app.events_vehicles',
        'app.barracks_vehicles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Vehicles') ? [] : ['className' => 'App\Model\Table\VehiclesTable'];
        $this->Vehicles = TableRegistry::get('Vehicles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vehicles);

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
