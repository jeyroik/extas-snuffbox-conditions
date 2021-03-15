<?php
namespace tests;

use Dotenv\Dotenv;
use extas\components\conditions\Condition;
use extas\components\conditions\ConditionRepository;
use extas\components\conditions\TSnuffConditions;
use extas\components\repositories\TSnuffRepositoryDynamic;
use extas\components\THasMagicClass;
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
    use TSnuffRepositoryDynamic;
    use THasMagicClass;

    protected IRepository $condRepo;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->createSnuffDynamicRepositories([
            ['conditions', 'name', Condition::class]
        ]);
        $this->condRepo = $this->getMagicClass('conditions');
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
