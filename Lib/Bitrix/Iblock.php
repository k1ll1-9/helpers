<?
declare(strict_types=1);

namespace K1ll1\Bitrix;

use Bitrix\Iblock\IblockTable;

class Iblock
{
	/**
	 * @return mixed|string
	 */
	public static function switchLanguage()
	{
		global $APPLICATION;

		$url = $APPLICATION->GetCurPage(false);
		if (LANGUAGE_ID === 'ru') {
			return \str_replace('/ru/', '/', $url);
		} else {
			return '/ru' . $url;
		}
	}

	/**
	 * @param string $iblockCode
	 * @return int|null
	 * @throws \Bitrix\Main\ArgumentException
	 */
	public static function iblockIdByCode(string $iblockCode)
	{

		$iblock = IblockTable::getList(
			[
				'filter' =>
					['CODE' => $iblockCode]
				,
				'select' =>
					['ID']
			])->fetch()['ID'];

		return (int)$iblock['ID'];
	}
}