<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MaterialStocksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MaterialStocksTable Test Case
 */
class MaterialStocksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MaterialStocksTable
     */
    public $MaterialStocks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.material_stocks',
        'app.materials',
        'app.material_types',
        'app.barracks',
        'app.cities',
        'app.departments',
        'app.regions',
        'app.events',
        'app.operations',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_recommendations',
        'app.organizations',
        'app.formations',
        'app.formation_types',
        'app.operation_types',
        'app.bills',
        'app.events_materials',
        'app.teams',
        'app.events_teams',
        'app.materials_teams',
        'app.users',
        'app.availabilities',
        'app.orders',
        'app.providers',
        'app.supplies',
        'app.orders_supplies',
        'app.providers_supplies',
        'app.user_materials',
        'app.barracks_users',
        'app.skills',
        'app.skills_users',
        'app.teams_users',
        'app.vehicles',
        'app.vehicle_types',
        'app.vehicle_models',
        'app.barracks_vehicles',
        'app.events_vehicles',
        'app.teams_vehicles',
        'app.users_vehicles',
        'app.barracks_materials',
        'app.affectations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MaterialStocks') ? [] : ['className' => 'App\Model\Table\MaterialStocksTable'];
        $this->MaterialStocks = TableRegistry::get('MaterialStocks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MaterialStocks);

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
