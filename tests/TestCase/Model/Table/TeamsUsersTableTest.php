<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeamsUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeamsUsersTable Test Case
 */
class TeamsUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TeamsUsersTable
     */
    public $TeamsUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.teams_users',
        'app.teams',
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
        'app.vehicles',
        'app.vehicle_types',
        'app.vehicle_models',
        'app.barracks_vehicles',
        'app.events_vehicles',
        'app.teams_vehicles',
        'app.users_vehicles',
        'app.events_materials',
        'app.materials_teams',
        'app.rescue_plans',
        'app.rescue_plan_activities',
        'app.rescue_plan_environments',
        'app.rescue_plan_delays',
        'app.rescue_plan_types',
        'app.rescue_plan_recommendations',
        'app.organizations',
        'app.formations',
        'app.bills',
        'app.events_teams'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TeamsUsers') ? [] : ['className' => 'App\Model\Table\TeamsUsersTable'];
        $this->TeamsUsers = TableRegistry::get('TeamsUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TeamsUsers);

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
