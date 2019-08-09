<?
declare(strict_types=1);

namespace K11\Bitrix;

class Common
{
	/**
	 * @return mixed|string
	 */
	public static function switchLanguage($secondaryLangFolder = 'ru')
	{
		global $APPLICATION;

		$url = $APPLICATION->GetCurPage(false);

		if (LANGUAGE_ID === $secondaryLangFolder) {
			return \str_replace('/'.$secondaryLangFolder.'/', '/', $url);
		} else {
			return '/'.$secondaryLangFolder . $url;
		}
	}


	/**
	 * @param array $arResult
	 * @return array
	 */
	public static function getOrderedMultilevelMenu(array $arResult): array
	{
		$menuList = [];
		$lvl = 0;
		$lastInd = 0;
		$parents = [];
		$i = 0;
		foreach ($arResult as $arItem) {

			$lvl = $arItem['DEPTH_LEVEL'];

			if ($arItem['IS_PARENT']) {
				$arItem['CHILDREN'] = [];
			}

			if ($lvl == 1) {
				$menuList[] = $arItem;
				$lastInd = \count($menuList) - 1;
				$parents[1] = &$menuList[$lastInd];
			} else {
				$parents[$lvl - 1]['CHILDREN'][] = $arItem;
				$lastInd = \count($parents[$lvl - 1]['CHILDREN']) - 1;
				$parents[$lvl] = &$parents[$lvl - 1]['CHILDREN'][$lastInd];
			}
			$i++;
		}
		return $menuList;
	}
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
	/**
	 * @param $text
	 * @param $shortcutLength
	 * @return string
	 */
	public static function getSimpleShortcutText($text, $shortcutLength)
	{
		if (\strlen($text) <= $shortcutLength) {

			return  $text;

		} else {

			$string = \substr($text, 0, $shortcutLength);
			$end = \strlen(strrchr($string, ' '));
			$shortcut = \substr($string, 0, -$end);

			return $shortcut;

		}
	}
}