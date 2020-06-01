![tests](https://github.com/jeyroik/extas-snuffbox-conditions/workflows/PHP%20Composer/badge.svg?branch=master&event=push)
![codecov.io](https://codecov.io/gh/jeyroik/extas-snuffbox-conditions/coverage.svg?branch=master)
<a href="https://github.com/phpstan/phpstan"><img src="https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat" alt="PHPStan Enabled"></a>
<a href="https://codeclimate.com/github/jeyroik/extas-snuffbox-conditions/maintainability"><img src="https://api.codeclimate.com/v1/badges/8a1d3c3b0f512e519e3d/maintainability" /></a>

# Описание

Предоставляет инструмент для удобного управления установкой и удаления условий для использования в тестах.

# Использование

```php
use extas\components\conditions\TSnuffConditions;

class Test extends TestCase
{
    use TSnuffConditions;

    protected function tearDown()
    {
        $this->deleteSnuffConditions();
    }

    public function testSomething()
    {
        $this->createSnuffConditions(['equal', 'not_equal']);
    }
}
```
