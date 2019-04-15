<?
declare(strict_types=1);

namespace K11\Bitrix;

use Bitrix\Main\Loader;
use Bitrix\Main\SystemException;
use K11\Lib\Classes\Debug;

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

		$res = \CIBlock::getList(
			[],
			[
				'CODE' => $iblockCode,
				'SITE_ID' => SITE_ID
			]
		);

		$i = 0;
		while ($row = $res->Fetch()) {
			if ($i >= 1) {
				throw new SystemException('More than 1 iblock with same code');
			}
			$iblockID = $row['ID'];
			$i++;
		}
		return (int)$iblockID;
	}
}