<?php
/**
 * @link https://github.com/phpviet/validation
 *
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Rules;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 *
 * @since 1.0.0
 */
class LandLineVN extends AbstractStaticRegexRule
{
    public static function pregFormat(): string
    {
        return strtr('~^(\+?84|0)(::head::)\d{7}$~', [
            '::head::' => implode('|', [
                '20[3-9]',
                '21[0-689]',
                '22[0-25-9]',
                '23[2-9]',
                '24[0-9]',
                '25[124-9]',
                '26[0-39]',
                '27[0-7]',
                '28[0-9]',
                '29[0-4679]',
            ]),
        ]);
    }
}
