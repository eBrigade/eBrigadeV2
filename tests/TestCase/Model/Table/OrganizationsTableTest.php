<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrganizationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrganizationsTable Test Case
 */
class OrganizationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrganizationsTable
     */
    public $Organizations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.organizations',
        'app.cities',
        'app.barracks',
        'app.events',
        'app.bills',
        'app.event_types',
        'app.formations',
        'app.formation_types',
        'app.rescue_plans',
        'app.rescue_plan_activities',
        'app.rescue_plan_environments',
        'app.rescue_plan_delays',
        'app.rescue_plan_types',
        'app.rescue_plan_recommendations',
        'app.operation_types',
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
        'app.events_materials'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Organizations') ? [] : ['className' => 'App\Model\Table\OrganizationsTable'];
        $this->Organizations = TableRegistry::get('Organizations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Organizations);

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
