<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AvailabilitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AvailabilitiesTable Test Case
 */
class AvailabilitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AvailabilitiesTable
     */
    public $Availabilities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.availabilities',
        'app.users',
        'app.permissions',
        'app.grades',
        'app.roles',
        'app.orders',
        'app.providers',
        'app.supplies',
        'app.orders_supplies',
        'app.providers_supplies',
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
        'app.barracks_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Availabilities') ? [] : ['className' => 'App\Model\Table\AvailabilitiesTable'];
        $this->Availabilities = TableRegistry::get('Availabilities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Availabilities);

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
