<?
declare(strict_types=1);

namespace K11\Bitrix;

use Bitrix\Iblock\IblockTable;
use Bitrix\Main\Loader;

class Iblock
{
	/**
	 * @param string $iblockCode
	 * @return int|null
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\LoaderException
	 */
	public static function iblockIdByCode(string $iblockCode)
	{
		Loader::includeModule('iblock');

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