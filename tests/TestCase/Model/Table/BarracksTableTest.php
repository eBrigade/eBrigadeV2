<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BarracksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BarracksTable Test Case
 */
class BarracksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BarracksTable
     */
    public $Barracks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.barracks',
        'app.cities',
        'app.barrack_users',
        'app.events',
        'app.materials'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Barracks') ? [] : ['className' => 'App\Model\Table\BarracksTable'];
        $this->Barracks = TableRegistry::get('Barracks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Barracks);

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
