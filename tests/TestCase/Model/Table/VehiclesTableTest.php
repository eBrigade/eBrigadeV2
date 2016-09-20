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
        'app.departments',
        'app.regions',
        'app.operations',
        'app.events',
        'app.formations',
        'app.organizations',
        'app.formation_types',
        'app.teams',
        'app.events_teams',
        'app.materials',
        'app.material_types',
        'app.barracks_materials',
        'app.users',
        'app.availabilities',
        'app.barracks_users',
        'app.skills',
        'app.skills_users',
        'app.teams_users',
        'app.users_vehicles',
        'app.material_stocks',
        'app.materials_teams',
        'app.teams_vehicles',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_recommendations',
        'app.operation_types',
        'app.bills',
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
