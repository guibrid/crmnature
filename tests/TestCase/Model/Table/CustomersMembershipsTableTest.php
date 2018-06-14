<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CustomersMembershipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CustomersMembershipsTable Test Case
 */
class CustomersMembershipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CustomersMembershipsTable
     */
    public $CustomersMemberships;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.customers_memberships',
        'app.customers',
        'app.memberships'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CustomersMemberships') ? [] : ['className' => CustomersMembershipsTable::class];
        $this->CustomersMemberships = TableRegistry::getTableLocator()->get('CustomersMemberships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CustomersMemberships);

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
