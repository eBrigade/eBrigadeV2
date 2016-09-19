<?php
namespace App\Test\TestCase\View\Cell;

use App\View\Cell\EventCell;
use Cake\TestSuite\TestCase;

/**
 * App\View\Cell\EventCell Test Case
 */
class EventCellTest extends TestCase
{

    /**
     * Request mock     *
     * @var \Cake\Network\Request|\PHPUnit_Framework_MockObject_MockObject     */
    public $request;

    /**
     * Response mock     *
     * @var \Cake\Network\Response|\PHPUnit_Framework_MockObject_MockObject     */
    public $response;

    /**
     * Test subject     *
     * @var \App\View\Cell\EventCell     */
    public $Event;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->request = $this->getMockBuilder('Cake\Network\Request')->getMock();
        $this->response = $this->getMockBuilder('Cake\Network\Response')->getMock();        $this->Event = new EventCell($this->request, $this->response);    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Event);

        parent::tearDown();
    }

    /**
     * Test display method
     *
     * @return void
     */
    public function testDisplay()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
