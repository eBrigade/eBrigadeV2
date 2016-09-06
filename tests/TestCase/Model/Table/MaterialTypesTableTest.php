<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaterialTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaterialTypesTable Test Case
 */
class MaterialTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaterialTypesTable
     */
    public $MaterialTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.material_types',
        'app.materials',
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
        'app.user_materials',
        'app.barracks_users',
        'app.teams_users',
        'app.vehicles',
        'app.vehicle_types',
        'app.vehicle_models',
        'app.barracks_vehicles',
        'app.events_vehicles',
        'app.teams_vehicles',
        'app.users_vehicles',
        'app.barracks_materials'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MaterialTypes') ? [] : ['className' => 'App\Model\Table\MaterialTypesTable'];
        $this->MaterialTypes = TableRegistry::get('MaterialTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MaterialTypes);

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
