<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommentsBilletTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommentsBilletTable Test Case
 */
class CommentsBilletTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CommentsBilletTable
     */
    public $CommentsBillet;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.comments_billet',
        'app.billets',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CommentsBillet') ? [] : ['className' => CommentsBilletTable::class];
        $this->CommentsBillet = TableRegistry::getTableLocator()->get('CommentsBillet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CommentsBillet);

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
