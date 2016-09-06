<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RescuePlanTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RescuePlanTypesTable Test Case
 */
class RescuePlanTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RescuePlanTypesTable
     */
    public $RescuePlanTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rescue_plan_types',
        'app.rescue_plans',
        'app.events',
        'app.cities',
        'app.barracks',
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
        'app.vehicles',
        'app.vehicle_types',
        'app.vehicle_models',
        'app.barracks_vehicles',
        'app.events_vehicles',
        'app.teams_vehicles',
        'app.users_vehicles',
        'app.events_materials',
        'app.organizations',
        'app.formations',
        'app.bills',
        'app.rescue_plan_activities',
        'app.rescue_plan_environments',
        'app.rescue_plan_delays',
        'app.rescue_plan_recommendations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RescuePlanTypes') ? [] : ['className' => 'App\Model\Table\RescuePlanTypesTable'];
        $this->RescuePlanTypes = TableRegistry::get('RescuePlanTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RescuePlanTypes);

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
