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
class FilterChainModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_assetic_filter_chain';

    public static function findActiveByPk($varValue, array $arrOptions = array())
    {
        $arrOptions['limit'] = 1;
        $arrOptions['column'][] = static::$strTable . '.' . static::$strPk . '=?';
        $arrOptions['column'][] = static::$strTable . '.disabled=?';
        $arrOptions['value'][] = $varValue;
        $arrOptions['value'][] = '';
        $arrOptions['return'] = 'Model';

		return static::find($arrOptions);
    }

}
