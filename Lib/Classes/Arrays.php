<?php
declare(strict_types=1);

namespace K11\Classes;

/**
 * Class Array
 * @package K1ll1\Lib\Classes
 */
class Arrays
{
	/**
	 * Check associative array or not
	 *
	 * @param array $arr
	 *
	 * @return bool
	 */
	public static function isAssociative(array $arr): bool
	{
		return \array_keys($arr) !== \range(0, \count($arr) - 1);
	}

	/**
	 * @param array $arr
	 */
	public static function wrapIfAssociative(array &$arr)
	{

		if (self::isAssociative($arr)) {
			$midArr = $arr;
			$arr[0] = $midArr;
			\array_splice($arr, 0, \count($arr) - 1);

		}
	}
}