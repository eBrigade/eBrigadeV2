<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BarrackTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BarrackTypesTable Test Case
 */
class BarrackTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BarrackTypesTable
     */
    public $BarrackTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.barrack_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BarrackTypes') ? [] : ['className' => 'App\Model\Table\BarrackTypesTable'];
        $this->BarrackTypes = TableRegistry::get('BarrackTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BarrackTypes);

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
