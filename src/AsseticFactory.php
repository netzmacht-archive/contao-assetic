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

namespace Bit3\Contao\Assetic;

use Bit3\Contao\Assetic\Event\CreateFilterEvent;
use Bit3\Contao\Assetic\Model\FilterModel;
use Bit3\Contao\Assetic\Model\FilterChainModel;
use Assetic\Filter\FilterCollection;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class AsseticFactory
{
	public function createFilterOrChain($id, $debug = null)
	{
		list($type, $id) = explode(':', $id);

		switch ($type) {
			case 'filter':
				$filter = static::createFilterById(
					$id,
					$debug
				);
				if ($filter) {
					return new FilterCollection(array($filter));
				}
				break;

			case 'chain':
				$chain = static::createFilterChainById(
					$id,
					$debug
				);
				if ($chain) {
					return $chain;
				}
				break;
		}

		return new FilterCollection();
	}

	/**
	 * @param int $id
	 *
	 * @return \Assetic\Filter\FilterInterface|null
	 */
	public function createFilterById($id, $debug = null)
	{
		if ($debug === null) {
			$debug = $GLOBALS['TL_CONFIG']['debugMode'];
		}

		$options = array();
		if ($debug) {
			$options['column'] = 'notInDebug=?';
			$options['value']  = '';
		}

		$filter = FilterModel::findActiveByPk($id, $options);

		if ($filter) {
			return static::createFilter($filter->row());
		}

		return null;
	}

	/**
	 * @param array $filterConfig
	 *
	 * @return \Assetic\Filter\FilterInterface|null
	 */
	public function createFilter(array $filterConfig)
	{
		$event = new CreateFilterEvent($filterConfig);

		/** @var EventDispatcherInterface $eventDispatcher */
		$eventDispatcher = $GLOBALS['container']['event-dispatcher'];
		$eventDispatcher->dispatch(AsseticEvents::CREATE_FILTER, $event);

		return $event->getFilter();
	}

	/**
	 * @param int $id
	 *
	 * @return \Assetic\Filter\FilterCollection|null
	 */
	public function createFilterChainById($id, $debug = null)
	{
		$chain = FilterChainModel::findActiveByPk($id);

		if ($chain) {
			return static::createFilterChain(
				$chain->row(),
				$debug
			);
		}

		return null;
	}

	/**
	 * @param array $filters
	 *
	 * @return \Assetic\Filter\FilterCollection|null
	 */
	public function createFilterChain(array $chainConfig, $debug = null)
	{
		$chainConfig['filters'] = deserialize(
			$chainConfig['filters'],
			true
		);

		$filters = array();

		foreach ($chainConfig['filters'] as $id) {
			$filter = static::createFilterOrChain(
				$id,
				$debug
			);

			if ($filter) {
				$filters[] = $filter;
			}
		}

		if (count($filters)) {
			return new \Assetic\Filter\FilterCollection($filters);
		}

		return null;
	}
}