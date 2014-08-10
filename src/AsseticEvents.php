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

class AsseticEvents
{
	/**
	 * The CREATE_FILTER event occurs when a filter get created from a database configuration.
	 *
	 * The event listener method receives a Bit3\Contao\Assetic\Event\CreateFilterEvent instance.
	 *
	 * @var string
	 *
	 * @api
	 */
	const CREATE_FILTER = 'contao-assetic.create-filter';

	/**
	 * The CREATE_CHAIN event occurs when a chain get created from a database configuration.
	 *
	 * The event listener method receives a Bit3\Contao\Assetic\Event\CreateChainEvent instance.
	 *
	 * @var string
	 *
	 * @api
	 */
	const CREATE_CHAIN = 'contao-assetic.create-chain';
}
