<?php

/**
 * Assetic for Contao Open Source CMS
 *
 * @copyright 2014 bit3 UG <http://bit3.de>
 * @author    Tristan Lins <tristan.lins@bit3.de>
 * @package   bit3/contao-assetic
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPL-3.0+
 * @filesource
 */

namespace Bit3\Contao\Assetic\Model;

class FilterModel extends \Model
{

	/**
	 * Table name
	 *
	 * @var string
	 */
	protected static $strTable = 'tl_assetic_filter';

	public static function findActiveByPk($varValue, array $arrOptions = array())
	{
		$arrOptions['limit'] = 1;

		if (!isset($arrOptions['column'])) {
			$arrOptions['column'] = array();
		}
		else if (!is_array($arrOptions['column'])) {
			$arrOptions['column'] = array($arrOptions['column']);
		}
		$arrOptions['column'][] = static::$strTable . '.' . static::$strPk . '=?';
		$arrOptions['column'][] = static::$strTable . '.disabled=?';

		if (!isset($arrOptions['value'])) {
			$arrOptions['value'] = array();
		}
		else if (!is_array($arrOptions['value'])) {
			$arrOptions['value'] = array($arrOptions['value']);
		}
		$arrOptions['value'][] = $varValue;
		$arrOptions['value'][] = '';

		$arrOptions['return'] = 'Model';

		return static::find($arrOptions);
	}
}
