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

use Bit3\Contao\Assetic\Model\FilterChainModel;

class AsseticFilter
{

	/**
	 * Singleton instance.
	 *
	 * @var AsseticFilter
	 */
	protected static $objInstance = null;

	/**
	 * Get singleton instance.
	 *
	 * @static
	 * @return AsseticFilter
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

	public function getFilterTypeOptions()
	{
		$options = array();

		foreach (array('compiler', 'minimizer') as $group) {
			foreach ($GLOBALS['ASSETIC'][$group] as $name => $class) {
				$options[$group][] = $name;
			}
		}

		return $options;
	}

	public function getImportFilterOptions($dc)
	{
		$options = array();

		$filterChain = FilterChainModel::findBy(
			'type',
			'css',
			array('order' => 'type')
		);

		while ($filterChain->next()) {
			$label = '[';
			$label .= $GLOBALS['TL_LANG']['tl_assetic_filter_chain']['types'][$filterChain->type]
				?: $filterChain->type;
			$label .= '] ';
			$label .= $filterChain->name;

			$GLOBALS['TL_LANG']['assetic']['chain:' . $filterChain->id] = $label;

			$options['chain'][] = 'chain:' . $filterChain->id;
		}

		$filter = \Database::getInstance()
			->prepare('SELECT * FROM tl_assetic_filter WHERE id!=? ORDER BY type')
			->execute($dc->id);
		while ($filter->next()) {
			if (!in_array(
				$filter->type,
				$GLOBALS['ASSETIC']['css']
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

			$options['filter'][] = 'filter:' . $filter->id;
		}

		return $options;
	}

	public function getImportFilterJsOptions($dc)
	{
		$options = array();

		$filterChain = FilterChainModel::findBy(
			'type',
			'js',
			array('order' => 'type')
		);
		while ($filterChain->next()) {
			$label = '[';
			$label .= $GLOBALS['TL_LANG']['tl_assetic_filter_chain']['types'][$filterChain->type]
				?: $filterChain->type;
			$label .= '] ';
			$label .= $filterChain->name;

			$GLOBALS['TL_LANG']['assetic']['chain:' . $filterChain->id] = $label;

			$options['chain'][] = 'chain:' . $filterChain->id;
		}

		$filter = \Database::getInstance()
			->prepare('SELECT * FROM tl_assetic_filter WHERE id!=? ORDER BY type')
			->execute($dc->id);
		while ($filter->next()) {
			if (!in_array(
				$filter->type,
				$GLOBALS['ASSETIC']['css']
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

			$options['filter'][] = 'filter:' . $filter->id;
		}

		return $options;
	}

	public function filterLabel($row, $label, $dc, $fields)
	{
		if (!empty($fields[1])) {
			$label .= sprintf(
				' [%s]',
				$fields[1]
			);
		}
		return $label;
	}

}
