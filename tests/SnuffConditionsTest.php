<?php
namespace tests;

use Dotenv\Dotenv;
use extas\components\conditions\ConditionRepository;
use extas\components\conditions\TSnuffConditions;
use extas\interfaces\repositories\IRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class SnuffConditionsTest
 *
 * @package tests
 * @author jeyroik <jeyroik@gmail.com>
 */
class SnuffConditionsTest extends TestCase
{
    use TSnuffConditions;

    protected IRepository $condRepo;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->condRepo = new ConditionRepository();
        $this->condRepo->drop();
    }

    public function testSnuffbox()
    {
        $this->createSnuffConditions(['equal']);
        $cond = $this->condRepo->all([]);
        $this->assertCount(1, $cond);

        $this->deleteSnuffConditions();
        $cond = $this->condRepo->all([]);
        $this->assertEmpty($cond);
    }
}
