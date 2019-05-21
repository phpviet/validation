<?php
/**
 * @link https://github.com/phpviet/validation
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Rules;

use IPLib\Factory as IpFactory;
use IPLib\Address\Type as IpType;
use IPLib\Address\AddressInterface as IpInterface;
use Respect\Validation\Rules\AbstractRule;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class IpVN extends AbstractRule
{

    public function validate($input)
    {
        if (!$ip = IpFactory::addressFromString($input)) {

            return false;
        }

        if (!$ranges = $this->getIpRanges($input, $ip->getAddressType())) {

            return false;
        }

        return $this->validateIpInRange($ip, $ranges);
    }

    protected function getIpRanges(string $ip, int $type): ?array
    {
        if ($type === IpType::T_IPv4) {
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

        if ($range === null) {
            $range = require(__DIR__ . '/../../resource/ip-v4-range.php');
        }

        return $range;
    }

    protected static function getIpV6Range(): array
    {
        static $range = null;

        if ($range === null) {
            $range = require(__DIR__ . '/../../resource/ip-v6-range.php');
        }

        return $range;
    }

}
