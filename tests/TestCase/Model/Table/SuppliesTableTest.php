<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuppliesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuppliesTable Test Case
 */
class SuppliesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SuppliesTable
     */
    public $Supplies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.supplies',
        'app.orders',
        'app.providers',
        'app.providers_supplies',
        'app.users',
        'app.permissions',
        'app.grades',
        'app.roles',
        'app.availabilities',
        'app.user_materials',
        'app.materials',
        'app.material_types',
        'app.barracks',
        'app.cities',
        'app.events',
        'app.bills',
        'app.formations',
        'app.organizations',
        'app.rescue_plans',
        'app.rescue_plan_activities',
        'app.rescue_plan_environments',
        'app.rescue_plan_delays',
        'app.rescue_plan_types',
        'app.rescue_plan_recommendations',
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
        'app.barracks_materials',
        'app.barracks_users',
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
        $config = TableRegistry::exists('Supplies') ? [] : ['className' => 'App\Model\Table\SuppliesTable'];
        $this->Supplies = TableRegistry::get('Supplies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Supplies);

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
