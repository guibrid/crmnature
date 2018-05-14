<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DurationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DurationsTable Test Case
 */
class DurationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DurationsTable
     */
    public $Durations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.durations',
        'app.treatments',
        'app.cares',
        'app.prices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Durations') ? [] : ['className' => DurationsTable::class];
        $this->Durations = TableRegistry::get('Durations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Durations);

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
