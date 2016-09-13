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
        'app.operations',
        'app.barracks',
        'app.cities',
        'app.departments',
        'app.regions',
        'app.organizations',
        'app.formations',
        'app.formation_types',
        'app.users',
        'app.availabilities',
        'app.orders',
        'app.providers',
        'app.supplies',
        'app.orders_supplies',
        'app.providers_supplies',
        'app.user_materials',
        'app.materials',
        'app.material_types',
        'app.barracks_materials',
        'app.events_materials',
        'app.materials_teams',
        'app.barracks_users',
        'app.teams_users',
        'app.vehicles',
        'app.vehicle_types',
        'app.vehicle_models',
        'app.barracks_vehicles',
        'app.events_vehicles',
        'app.teams_vehicles',
        'app.users_vehicles',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_recommendations',
        'app.operation_types',
        'app.bills'
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
