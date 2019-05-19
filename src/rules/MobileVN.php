<?php
/**
 * @link https://github.com/phpviet/validation
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\rules;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class MobileVN extends AbstractStaticRegexRule
{

    public static function pregFormat(): string
    {
        return strtr('/^(\+?84|0)(::head::)\d{7}$/', '::head::', implode('|', [
            '3[2-9]',
            '5[2689]',
            '7(0|[6-9])',
            '8[1-9]',
            '9[0-9]',
        ]));
    }

}
