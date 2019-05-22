<?php
/**
 * @link https://github.com/phpviet/validation
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Tests\Rules;

use PHPUnit\Framework\TestCase;
use PHPViet\Validation\Rules\LandLineVN;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class LandLineVNTest extends TestCase
{
    /**
     * @var LandLineVN
     */
    protected $validator;

    protected function setUp()
    {
        $this->validator = new LandLineVN;
    }

    /**
     * @dataProvider providerValid
     */
    public function testValidShouldReturnTrue($input)
    {
        $this->assertTrue($this->validator->__invoke($input));
        $this->assertTrue($this->validator->assert($input));
        $this->assertTrue($this->validator->check($input));
    }

    /**
     * @dataProvider providerInvalid
     */
    public function testInvalidShouldThrowException($input)
    {
        $this->expectException('\PHPViet\Validation\Exceptions\LandLineVNException');
        $this->assertFalse($this->validator->__invoke($input));
        $this->assertFalse($this->validator->assert($input));
    }

    public function providerValid()
    {
        return [
            ['+842838564399'],
            ['02838564399'],
            ['842838564399'],
            ['02038364399'],
            ['02168964399'],
            ['02258864399'],
            ['02398764399'],
            ['02428569399'],
            ['02598566399'],
            ['02608565499'],
            ['02778564599'],
            ['02898564299'],
            ['02942564799'],
        ];
    }

    public function providerInvalid()
    {
        return [
            ['+8428385643099'],
            ['028385643199'],
            ['8428385644399'],
            ['02038364399a'],
            ['02168964399!'],
            ['02258 864399'],
            ['02318764399'],
            ['02538566399'],
            ['02678565499'],
            ['02798564599'],
            ['02952564799'],
        ];
    }
}
