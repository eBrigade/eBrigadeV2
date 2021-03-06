<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OperationRecommendationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OperationRecommendationsTable Test Case
 */
class OperationRecommendationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OperationRecommendationsTable
     */
    public $OperationRecommendations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.operation_recommendations',
        'app.operations',
        'app.events',
        'app.cities',
        'app.departments',
        'app.regions',
        'app.barracks',
        'app.materials',
        'app.material_types',
        'app.barracks_materials',
        'app.user_materials',
        'app.users',
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
        'app.events_materials',
        'app.organizations',
        'app.formations',
        'app.formation_types',
        'app.bills',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OperationRecommendations') ? [] : ['className' => 'App\Model\Table\OperationRecommendationsTable'];
        $this->OperationRecommendations = TableRegistry::get('OperationRecommendations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OperationRecommendations);

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
