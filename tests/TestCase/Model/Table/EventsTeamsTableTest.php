<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventsTeamsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventsTeamsTable Test Case
 */
class EventsTeamsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventsTeamsTable
     */
    public $EventsTeams;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.events_teams',
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
        'app.teams_users',
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
        'app.formation_types',
        'app.operation_types',
        'app.bills',
        'app.event_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EventsTeams') ? [] : ['className' => 'App\Model\Table\EventsTeamsTable'];
        $this->EventsTeams = TableRegistry::get('EventsTeams', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventsTeams);

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
