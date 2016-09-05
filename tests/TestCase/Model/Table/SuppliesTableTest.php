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
        'app.order_supplies',
        'app.orders',
        'app.providers',
        'app.providers_supplies',
        'app.users',
        'app.permissions',
        'app.grades',
        'app.roles',
        'app.availabilities',
        'app.barrack_users',
        'app.barracks',
        'app.cities',
        'app.events',
        'app.event_types',
        'app.creators',
        'app.borrowed_materials',
        'app.materials',
        'app.material_types',
        'app.user_materials',
        'app.vehicles',
        'app.type_vehicles',
        'app.model_vehicles',
        'app.borrowed_vehicles',
        'app.event_vehicles',
        'app.users_vehicles',
        'app.event_teams',
        'app.teams',
        'app.team_users',
        'app.team_chieves',
        'app.bills',
        'app.responsibles',
        'app.event_equipments',
        'app.equipment',
        'app.formations',
        'app.organizations',
        'app.operations',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_types',
        'app.operation_recommendations',
        'app.teachers'
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
