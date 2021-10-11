<?php
declare(strict_types=1);

namespace K11\Classes;

Class Text{
    /**
     * @param $text
     * @param $shortcutLength
     * @return array
     */
    public static function getSplitShortcutText($text, $shortcutLength)
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
}