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

namespace Bit3\Contao\Assetic\DataContainer;

use Bit3\Contao\Assetic\Model\FilterModel;

class AsseticFilterChain
{

	/**
	 * Singleton instance.
	 *
	 * @var AsseticFilterChain
	 */
	protected static $objInstance = null;

	/**
	 * Get singleton instance.
	 *
	 * @static
	 * @return AsseticFilterChain
	 */
	public static function getInstance()
	{
		if (self::$objInstance === null) {
			self::$objInstance = new self;
		}
		return self::$objInstance;
	}

	/**
	 * Singleton constructor
	 */
	protected function __construct()
	{
	}

	public function listChain($row, $label, $dc, $fields)
	{
		$label .= '<br>&nbsp;&nbsp;&nbsp;';

		$filters = deserialize($row['filters'], true);

		foreach ($filters as $key) {
			list($type, $id) = explode(':', $key, 2);
			$filter = FilterModel::findByPk($id);
			if ($filter) {
				$label .= '&rarr; ';
				$label .= $GLOBALS['TL_LANG']['assetic'][$filter->type]
					?: $filter->type;
				if ($filter->note) {
					$label .= ' [' . $filter->note . ']';
				}
				$label .= ' ';
			}
		}

		$label = '<div style="padding: 4px 0;">' . $label . '</div>';

		return $label;
	}

	public function getFilterOptions($dc)
	{
		$options = array();

		$filter = FilterModel::findAll(array('order' => 'type'));

		if ($filter) {
			while ($filter->next()) {
				if (!in_array(
					$filter->type,
					$GLOBALS['ASSETIC'][$dc->activeRecord->type]
				)
				) {
					continue;
				}

				$label = $GLOBALS['TL_LANG']['assetic'][$filter->type]
					?: $filter->type;

				if ($filter->note) {
					$label .= ' [' . $filter->note . ']';
				}

				$GLOBALS['TL_LANG']['assetic']['filter:' . $filter->id] = $label;

				$options[] = 'filter:' . $filter->id;
			}
		}

		return $options;
	}
}
