<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FormationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FormationsTable Test Case
 */
class FormationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FormationsTable
     */
    public $Formations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.formations',
        'app.organizations',
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
        'app.operations',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_types',
        'app.operation_recommendations',
        'app.orders',
        'app.providers',
        'app.supplies',
        'app.order_supplies',
        'app.providers_supplies',
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
        $config = TableRegistry::exists('Formations') ? [] : ['className' => 'App\Model\Table\FormationsTable'];
        $this->Formations = TableRegistry::get('Formations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Formations);

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
