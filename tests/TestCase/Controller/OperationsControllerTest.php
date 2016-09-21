<?php
namespace App\Test\TestCase\Controller;

use App\Controller\OperationsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\OperationsController Test Case
 */
class OperationsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.operations',
        'app.barracks',
        'app.cities',
        'app.departments',
        'app.regions',
        'app.organizations',
        'app.formations',
        'app.events',
        'app.teams',
        'app.events_teams',
        'app.materials',
        'app.material_types',
        'app.barracks_materials',
        'app.users',
        'app.availabilities',
        'app.barracks_users',
        'app.skills',
        'app.skills_users',
        'app.teams_users',
        'app.vehicles',
        'app.vehicle_types',
        'app.vehicle_models',
        'app.barracks_vehicles',
        'app.teams_vehicles',
        'app.users_vehicles',
        'app.material_stocks',
        'app.materials_teams',
        'app.formation_types',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_recommendations',
        'app.operation_types',
        'app.bills'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
