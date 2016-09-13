<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProvidersSuppliesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProvidersSuppliesTable Test Case
 */
class ProvidersSuppliesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProvidersSuppliesTable
     */
    public $ProvidersSupplies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.providers_supplies',
        'app.providers',
        'app.orders',
        'app.users',
        'app.cities',
        'app.departments',
        'app.regions',
        'app.barracks',
        'app.events',
        'app.operations',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_recommendations',
        'app.organizations',
        'app.formations',
        'app.formation_types',
        'app.operation_types',
        'app.bills',
        'app.materials',
        'app.material_types',
        'app.barracks_materials',
        'app.user_materials',
        'app.events_materials',
        'app.teams',
        'app.events_teams',
        'app.materials_teams',
        'app.teams_users',
        'app.vehicles',
        'app.vehicle_types',
        'app.vehicle_models',
        'app.barracks_vehicles',
        'app.events_vehicles',
        'app.teams_vehicles',
        'app.users_vehicles',
        'app.barracks_users',
        'app.availabilities',
        'app.supplies',
        'app.orders_supplies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProvidersSupplies') ? [] : ['className' => 'App\Model\Table\ProvidersSuppliesTable'];
        $this->ProvidersSupplies = TableRegistry::get('ProvidersSupplies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProvidersSupplies);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
