<?php
/**
 * @link https://github.com/phpviet/validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Tests\Rules;

use PHPUnit\Framework\TestCase;
use PHPViet\Validation\Rules\IdVN;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class IdVNTest extends TestCase
{
    /**
     * @var IdVN
     */
    protected $validator;

    protected function setUp()
    {
        $this->validator = new IdVN();
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
        $this->expectException('\PHPViet\Validation\Exceptions\IdVNException');
        $this->assertFalse($this->validator->__invoke($input));
        $this->assertFalse($this->validator->assert($input));
    }

    public function providerValid()
    {
        return [
            ['006487975'],
            ['116487952'],
            ['290649784'],
            ['356497220'],
            ['090649752'],
            ['231649700'],
            ['245697911'],
            ['285649733'],
            ['006448799975'],
            ['116448722952'],
            ['290646975584'],
            ['356499722047'],
            ['090764975265'],
            ['231864970011'],
            ['245069791197'],
            ['285264973388'],
            ['086497542199'],
            ['106497006444'],
            ['223131316790'],
            ['316498797104'],
            ['499797976410'],
            ['526499998877'],
            ['649879870111'],
            ['776464646777'],
            ['866646777797'],
            ['964646497971'],
        ];
    }

    public function providerInvalid()
    {
        return [
            ['0064 87975'],
            ['11648!7952'],
            ['2906a49784'],
            ['35649f7220'],
            ['a231649700'],
            [' 245697911'],
            ['@285649733'],
            ['0964487975'],
            ['3964997220'],
            ['0967649752'],
            ['2470697911'],
            ['096497542199'],
            ['439797976410'],
            ['596499998877'],
            ['699879870111'],
            ['856646777797'],
            ['994646497971'],
        ];
    }
}
