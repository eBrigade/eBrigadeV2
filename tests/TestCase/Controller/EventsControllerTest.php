<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EventsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\EventsController Test Case
 */
class EventsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.operations',
        'app.operation_activities',
        'app.operation_environments',
        'app.operation_delays',
        'app.operation_types',
        'app.operation_recommendations'
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
