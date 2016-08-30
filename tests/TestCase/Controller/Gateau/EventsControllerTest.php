<?php
namespace App\Test\TestCase\Controller\Gateau;

use App\Controller\Gateau\EventsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Gateau\EventsController Test Case
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
        'app.creators',
        'app.bills',
        'app.responsibles',
        'app.barracks',
        'app.barrack_users',
        'app.materials',
        'app.event_equipments',
        'app.event_teams',
        'app.event_vehicles',
        'app.operations',
        'app.casernes',
        'app.operation_activities',
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
