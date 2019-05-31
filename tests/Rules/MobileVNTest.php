<?php
/**
 * @link https://github.com/phpviet/validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Tests\Rules;

use PHPUnit\Framework\TestCase;
use PHPViet\Validation\Rules\MobileVN;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class MobileVNTest extends TestCase
{
    /**
     * @var MobileVN
     */
    protected $validator;

    protected function setUp()
    {
        $this->validator = new MobileVN();
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
        $this->expectException('\PHPViet\Validation\Exceptions\MobileVNException');
        $this->assertFalse($this->validator->__invoke($input));
        $this->assertFalse($this->validator->assert($input));
    }

    public function providerValid()
    {
        return [
            ['84982527982'],
            ['84973776072'],
            ['+84917749254'],
            ['84904770053'],
        ];
    }

    public function providerInvalid()
    {
        return [
            ['asdasdasdasd1231a'],
            ['!@#!@#1123123..123'],
            ['09091139111'],
            ['016485754635'],
            ['0603366854'],
            ['070336685a'],
            ['+842838564399'],
            [' 02838564399'],
            ['@842838564399'],
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
}
