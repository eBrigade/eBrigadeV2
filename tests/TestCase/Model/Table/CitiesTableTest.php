<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CitiesTable Test Case
 */
class CitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CitiesTable
     */
    public $Cities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cities',
        'app.barracks',
        'app.barrack_users',
        'app.users',
        'app.permissions',
        'app.grades',
        'app.roles',
        'app.availabilities',
        'app.borrowed_materials',
        'app.materials',
        'app.list_materials',
        'app.material_types',
        'app.events',
        'app.creators',
        'app.bills',
        'app.responsibles',
        'app.borrowed_vehicles',
        'app.vehicles',
        'app.type_vehicles',
        'app.model_vehicles',
        'app.event_vehicles',
        'app.users_vehicles',
        'app.event_equipments',
        'app.equipment',
        'app.event_teams',
        'app.teams',
        'app.team_users',
        'app.team_chieves',
        'app.formations',
        'app.organizations',
        'app.operations',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_types',
        'app.operation_recommendations',
        'app.teachers',
        'app.orders',
        'app.providers',
        'app.supplies',
        'app.order_supplies',
        'app.providers_supplies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cities') ? [] : ['className' => 'App\Model\Table\CitiesTable'];
        $this->Cities = TableRegistry::get('Cities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cities);

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
