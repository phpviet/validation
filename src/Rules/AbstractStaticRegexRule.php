<?php
/**
 * @link https://github.com/phpviet/validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Rules;

use Respect\Validation\Rules\AbstractRegexRule;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
abstract class AbstractStaticRegexRule extends AbstractRegexRule
{
    protected function getPregFormat()
    {
        return static::pregFormat();
    }

    abstract public static function pregFormat(): string;
}
