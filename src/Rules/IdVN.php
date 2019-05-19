<?php
/**
 * @link https://github.com/phpviet/validation
 * @copyright (c) PHP Viet
 * @license [MIT](https://opensource.org/licenses/MIT)
 */

namespace PHPViet\Validation\Rules;

/**
 * @author Vuong Minh <vuongxuongminh@gmail.com>
 * @since 1.0.0
 */
class IdVN extends AbstractStaticRegexRule
{

    public static function pregFormat(): string
    {
        $id = self::idPregFormatPart(false);
        $oldId = self::idPregFormatPart(true);
        $cId = self::cIdPregFormatPart();

        return '~^(' . implode(')|(', [$id, $oldId, $cId]) . ')$~';
    }

    private static function idPregFormatPart(bool $old): string
    {
        if ($old) {
            [$range1, $range2] = [7, 6];
        } else {
            [$range1, $range2] = [10, 9];
        }

        return strtr('((::head1::)\d{::range1::})|((::head2::)\d{::range2::})', [
            '::head1::' => implode('|', [
                '0[0-8]',
                '1[0-9]',
                '2[0-9]',
                '3[0-8]'
            ]),
            '::head2::' => implode('|', [
                '09[015]',
                '23[01]',
                '245',
                '28[015]'
            ]),
            '::range1::' => $range1,
            '::range2::' => $range2
        ]);
    }

    private static function cIdPregFormatPart(): string
    {
        return strtr('(::head::)\d{10}', '::head::', implode('|', [
            '0[012468]',
            '1[0124579]',
            '2[024-7]',
            '3[013-8]',
            '4[0245689]',
            '5[12468]',
            '6[024678]',
            '7[024579]',
            '8[0234679]',
            '9[1-6]'
        ]));
    }
}
