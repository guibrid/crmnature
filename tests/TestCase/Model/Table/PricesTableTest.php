<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PricesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PricesTable Test Case
 */
class PricesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PricesTable
     */
    public $Prices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.prices',
        'app.treatments',
        'app.durations',
        'app.cares'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Prices') ? [] : ['className' => PricesTable::class];
        $this->Prices = TableRegistry::get('Prices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Prices);

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
