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
        'app.type_vehicles',
        'app.model_vehicles',
        'app.borrowed_materials',
        'app.materials',
        'app.list_materials',
        'app.material_types',
        'app.barracks',
        'app.cities',
        'app.events',
        'app.creators',
        'app.bills',
        'app.responsibles',
        'app.borrowed_vehicles',
        'app.users',
        'app.permissions',
        'app.grades',
        'app.roles',
        'app.availabilities',
        'app.barrack_users',
        'app.event_teams',
        'app.teams',
        'app.team_users',
        'app.team_chieves',
        'app.orders',
        'app.providers',
        'app.supplies',
        'app.order_supplies',
        'app.providers_supplies',
        'app.users_vehicles',
        'app.event_equipments',
        'app.equipment',
        'app.event_vehicles',
        'app.formations',
        'app.organizations',
        'app.operations',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_types',
        'app.operation_recommendations',
        'app.teachers'
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
