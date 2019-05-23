<?php
/**
 * @link https://github.com/phpviet/validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class IpVNException extends ValidationException
{
    const STANDARD = 0;

    const VERSION = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => '{{name}} must be an IP address of Viet Nam',
            self::VERSION  => '{{name}} must be an IP address version {{version}} of Viet Nam',
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => '{{name}} must be an IP address of Viet Nam',
            self::VERSION  => '{{name}} must be an IP address version {{version}} of Viet Nam',
        ],
    ];

    public function chooseTemplate()
    {
        if (null !== $this->getParam('version')) {
            return static::VERSION;
        } else {
            return static::STANDARD;
        }
    }
}
