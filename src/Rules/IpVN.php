<?php
/**
 * @link https://github.com/phpviet/validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Rules;

use IPLib\Address\AddressInterface as IpInterface;
use IPLib\Address\Type as IpType;
use IPLib\Factory as IpFactory;
use Respect\Validation\Rules\AbstractRule;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class IpVN extends AbstractRule
{
    const IPV4 = IpType::T_IPv4;

    const IPV6 = IpType::T_IPv6;

    public $version;

    public function __construct($version = null)
    {
        $this->version = $version;
    }

    public function validate($input)
    {
        if (!$ip = IpFactory::addressFromString($input)) {
            return false;
        }

        if (($version = $ip->getAddressType()) !== $this->version && null !== $this->version) {
            return false;
        }

        if (!$ranges = $this->getIpRanges($input, $version)) {
            return false;
        }

        return $this->validateIpInRange($ip, $ranges);
    }

    protected function getIpRanges(string $ip, int $version): ?array
    {
        if (self::IPV4 === $version) {
            $keys = explode('.', $ip);
            $map = static::getIpV4Range();
        } else {
            $keys = explode(':', $ip);
            $map = static::getIpV6Range();
        }

        while (!is_null($key = array_shift($keys))) {
            if (isset($map[$key])) {
                $map = $map[$key];

                continue;
            }

            if (isset($map['range'])) {
                return $map['range'];
            }

            return null;
        }
    }

    protected function validateIpInRange(IpInterface $ip, array $ranges)
    {
        foreach ($ranges as $range) {
            [$begin, $end] = $range;

            if (($subnet = IpFactory::rangeFromBoundaries($begin, $end)) && $subnet->contains($ip)) {
                return true;
            }
        }

        return false;
    }

    protected static function getIpV4Range(): array
    {
        static $range = null;

        if (null === $range) {
            $range = require __DIR__.'/../../resource/ip-v4-range.php';
        }

        return $range;
    }

    protected static function getIpV6Range(): array
    {
        static $range = null;

        if (null === $range) {
            $range = require __DIR__.'/../../resource/ip-v6-range.php';
        }

        return $range;
    }
}
