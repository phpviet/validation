<?php
/**
 * @link https://github.com/phpviet/validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation;

use Respect\Validation\Factory;
use Respect\Validation\Validator as BaseValidator;

/**
 * @method static Validator landLineVN()
 * @method static Validator mobileVN()
 * @method static Validator ipVN(?int $version = null)
 * @method static Validator idVN()
 *
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class Validator extends BaseValidator
{
    /**
     * @return Factory
     */
    protected static function getFactory()
    {
        if (! static::$factory instanceof Factory) {
            $factory = static::$factory = new Factory();
            $factory->prependRulePrefix('\\PHPViet\\Validation\\Rules\\');
        }

        return static::$factory;
    }

    /**
     * @param Factory $factory
     */
    public static function setFactory($factory)
    {
        $factory->prependRulePrefix('\\PHPViet\\Validation\\Rules\\');

        static::$factory = $factory;
    }
}
