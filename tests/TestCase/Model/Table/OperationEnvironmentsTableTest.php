<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperationEnvironmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperationEnvironmentsTable Test Case
 */
class OperationEnvironmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OperationEnvironmentsTable
     */
    public $OperationEnvironments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.operation_environments',
        'app.operations',
        'app.events',
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
        'app.orders',
        'app.providers',
        'app.supplies',
        'app.order_supplies',
        'app.providers_supplies',
        'app.organizations',
        'app.formations',
        'app.teachers',
        'app.creators',
        'app.bills',
        'app.responsibles',
        'app.event_equipments',
        'app.equipment',
        'app.operation_activities',
        'app.operation_delays',
        'app.operation_types',
        'app.operation_recommendations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OperationEnvironments') ? [] : ['className' => 'App\Model\Table\OperationEnvironmentsTable'];
        $this->OperationEnvironments = TableRegistry::get('OperationEnvironments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OperationEnvironments);

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
