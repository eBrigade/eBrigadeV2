<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatastropheTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatastropheTypesTable Test Case
 */
class CatastropheTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatastropheTypesTable
     */
    public $CatastropheTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.catastrophe_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatastropheTypes') ? [] : ['className' => 'App\Model\Table\CatastropheTypesTable'];
        $this->CatastropheTypes = TableRegistry::get('CatastropheTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatastropheTypes);

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
