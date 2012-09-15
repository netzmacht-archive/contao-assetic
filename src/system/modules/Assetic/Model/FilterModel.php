<?php

/**
 * Theme+ - Theme extension for the Contao Open Source CMS
 *
 * Copyright (C) 2012 InfinitySoft <http://www.infinitysoft.de>
 *
 * @package    Theme+
 * @author     Tristan Lins <tristan.lins@infinitysoft.de>
 * @link       http://www.themeplus.de
 * @license    http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

namespace InfinitySoft\Assetic\Model;

/**
 * Class FilterModel
 */
class FilterModel extends \Model
{

	/**
	 * Table name
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
