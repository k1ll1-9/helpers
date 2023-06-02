<?php
declare(strict_types=1);

namespace K11\Classes;

Class Text{
    /**
     * @param $text
     * @param $shortcutLength
     * @return array
     */
    public static function getSplitShortcutText($text, $shortcutLength) : array
    {
        if (\strlen($text) <= $shortcutLength) {

            return [
                'shortcut' => $text
            ];

        } else {

            $string = \substr($text, 0, $shortcutLength);
            $end = \strlen(strrchr($string, ' '));
            $shortcut = \substr($string, 0, -$end);
            $extension = \substr($text, \strlen($shortcut));

            return [
                'shortcut' => $shortcut,
                'extension' => $extension
            ];

        }
    }
    /**
     * Склонение существительных после числительных.
     *
     * @param string $value Значение
     * @param array $words Массив вариантов, например: array('товар', 'товара', 'товаров')
     * @param bool $show Включает значение $value в результирующею строку
     * @return string
     */
    public static function declineNumeral(string $value, array $words,bool $show = true) : string
    {
        $num = $value % 100;
        if ($num > 19) {
            $num = $num % 10;
        }

        $out = ($show) ? $value . ' ' : '';
        switch ($num) {
            case 1:
                $out .= $words[0];
                break;
            case 2:
            case 3:
            case 4:
                $out .= $words[1];
                break;
            default:
                $out .= $words[2];
                break;
        }

        return $out;
    }
}
