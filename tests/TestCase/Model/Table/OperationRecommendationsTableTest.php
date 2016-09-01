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
        'app.barracks',
        'app.barrack_users',
        'app.materials',
        'app.list_materials',
        'app.type_materials',
        'app.users',
        'app.permissions',
        'app.grades',
        'app.roles',
        'app.availabilities',
        'app.event_teams',
        'app.orders',
        'app.providers',
        'app.orders_providers',
        'app.team_users',
        'app.users_materials',
        'app.vehicles',
        'app.type_vehicles',
        'app.model_vehicles',
        'app.event_vehicles',
        'app.users_vehicles',
        'app.organizations',
        'app.formations',
        'app.teachers',
        'app.creators',
        'app.bills',
        'app.responsibles',
        'app.event_equipments',
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
