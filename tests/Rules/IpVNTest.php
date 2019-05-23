<?php
/**
 * @link https://github.com/phpviet/validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Tests\Rules;

use PHPUnit\Framework\TestCase;
use PHPViet\Validation\Rules\IpVN;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class IpVNTest extends TestCase
{
    /**
     * @var IpVN
     */
    protected $validator;

    /**
     * @var IpVN
     */
    protected $validatorV4;

    /**
     * @var IpVN
     */
    protected $validatorV6;

    protected function setUp()
    {
        $this->validator = new IpVN();
        $this->validatorV4 = new IpVN(IpVN::IPV4);
        $this->validatorV6 = new IpVN(IpVN::IPV6);
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
     * @dataProvider providerValidV4
     */
    public function testValidV4ShouldReturnTrue($input)
    {
        $this->assertTrue($this->validatorV4->__invoke($input));
        $this->assertTrue($this->validatorV4->assert($input));
        $this->assertTrue($this->validatorV4->check($input));
    }

    /**
     * @dataProvider providerValidV6
     */
    public function testValidV6ShouldReturnTrue($input)
    {
        $this->assertTrue($this->validatorV6->__invoke($input));
        $this->assertTrue($this->validatorV6->assert($input));
        $this->assertTrue($this->validatorV6->check($input));
    }

    public function testInvalidVersionShouldThrowException()
    {
        $this->expectException('\Respect\Validation\Exceptions\ComponentException');
        new IpVN(100);
    }

    /**
     * @dataProvider providerInvalid
     */
    public function testInvalidShouldThrowException($input)
    {
        $this->expectException('\PHPViet\Validation\Exceptions\IpVNException');
        $this->assertFalse($this->validator->__invoke($input));
        $this->assertFalse($this->validator->assert($input));
    }

    /**
     * @dataProvider providerInvalidV4
     */
    public function testInvalidV4ShouldThrowException($input)
    {
        $this->expectException('\PHPViet\Validation\Exceptions\IpVNException');
        $this->expectExceptionMessageRegExp('/version 4/');
        $this->assertFalse($this->validatorV4->__invoke($input));
        $this->assertFalse($this->validatorV4->assert($input));
    }

    /**
     * @dataProvider providerInvalidV6
     */
    public function testInvalidV6ShouldThrowException($input)
    {
        $this->expectException('\PHPViet\Validation\Exceptions\IpVNException');
        $this->expectExceptionMessageRegExp('/version 6/');
        $this->assertFalse($this->validatorV6->__invoke($input));
        $this->assertFalse($this->validatorV6->assert($input));
    }

    public function providerValid()
    {
        return [
            ['42.115.62.26'],
            ['118.70.185.14'],
            ['118.70.185.14'],
            ['27.79.207.130'],
            ['117.2.17.21'],
            ['117.2.155.16'],
            ['117.2.121.203'],
            ['180.148.4.194'],
            ['2405:4800:102:1::3'],
            ['2001:df0:66:40::16'],
            ['2406:9c80::6000:66'],
            ['2405:9d80:4::32'],
        ];
    }

    public function providerValidV4()
    {
        return [
            ['42.115.62.26'],
            ['118.70.185.14'],
            ['118.70.185.14'],
            ['27.79.207.130'],
            ['117.2.17.21'],
            ['117.2.155.16'],
            ['117.2.121.203'],
            ['180.148.4.194'],
        ];
    }

    public function providerValidV6()
    {
        return [
            ['2405:4800:102:1::3'],
            ['2001:df0:66:40::16'],
            ['2406:9c80::6000:66'],
            ['2405:9d80:4::32'],
        ];
    }

    public function providerInvalid()
    {
        return [
            ['2606:4700:30::681b:8c4e'],
            ['2606:4700:31::681f:abe'],
            ['2a03:2880:f111:83:face:b00c:0:25de'],
            ['2a03:2880:f111:83:face:b00c:0:25de'],
            ['2607:f8b0:4004:815::200e'],
            ['173.194.207.26'],
            ['69.171.251.251'],
            ['204.141.42.121'],
            ['216.52.72.121'],
        ];
    }

    public function providerInvalidV4()
    {
        return [
            ['2606:4700:30::681b:8c4e'],
            ['2606:4700:31::681f:abe'],
            ['2a03:2880:f111:83:face:b00c:0:25de'],
            ['2a03:2880:f111:83:face:b00c:0:25de'],
            ['2607:f8b0:4004:815::200e'],
            ['2405:4800:102:1::3'],
            ['2001:df0:66:40::16'],
            ['2406:9c80::6000:66'],
            ['2405:9d80:4::32'],
        ];
    }

    public function providerInvalidV6()
    {
        return [
            ['173.194.207.26'],
            ['69.171.251.251'],
            ['204.141.42.121'],
            ['216.52.72.121'],
            ['42.115.62.26'],
            ['118.70.185.14'],
            ['118.70.185.14'],
            ['27.79.207.130'],
            ['117.2.17.21'],
            ['117.2.155.16'],
            ['117.2.121.203'],
            ['180.148.4.194'],
        ];
    }
}
