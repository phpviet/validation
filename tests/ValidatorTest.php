<?php
/**
 * @link https://github.com/phpviet/validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Tests;

use PHPUnit\Framework\TestCase;
use PHPViet\Validation\Validator;
use Respect\Validation\Factory;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class ValidatorTest extends TestCase
{
    public function testSetFactoryHavePrefixRules()
    {
        $factory = new Factory();
        $this->assertNotContains('\\PHPViet\\Validation\\Rules\\', $factory->getRulePrefixes());
        Validator::setFactory($factory);
        $this->assertContains('\\PHPViet\\Validation\\Rules\\', $factory->getRulePrefixes());
    }
}
