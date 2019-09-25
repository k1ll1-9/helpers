<? /** @noinspection ALL */
declare(strict_types=1);

namespace K11\Bitrix;

use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Main\Loader;
use Bitrix\Main\SystemException;

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

	public static function propertyEnumXMLIDByID($ID, $iblockID = '')
	{
		$property = PropertyEnumerationTable::getList(
			[
				'filter' =>
					[
						'ID' => $ID,
						''
					]
				,
				'select' =>
					['XML_ID']
			])->fetch();

		return $property['XML_ID'];
	}

	public static function propertyByCodeAndXMLID($iblockID, $code, $XMLID)
	{
		$property = \CIBlockPropertyEnum::GetList(
			[],
			[
				"IBLOCK_ID" => $iblockID,
				'CODE' => $code,
				"XML_ID" => $XMLID
			]
		)->GetNext();

		return $property;
	}
}