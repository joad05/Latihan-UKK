<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ComplaintsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ComplaintsTable Test Case
 */
class ComplaintsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ComplaintsTable
     */
    protected $Complaints;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Complaints',
        'app.Officers',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Complaints') ? [] : ['className' => ComplaintsTable::class];
        $this->Complaints = $this->getTableLocator()->get('Complaints', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Complaints);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ComplaintsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ComplaintsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
