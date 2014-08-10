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

namespace Bit3\Contao\Assetic\Event;

use Assetic\Filter\FilterInterface;
use Symfony\Component\EventDispatcher\Event;

class CreateFilterEvent extends Event
{

	/**
	 * The filter configuration.
	 *
	 * @var array
	 */
	protected $configuration;

	/**
	 * @var FilterInterface|null
	 */
	protected $filter;

	public function __construct(array $configuration)
	{
		$this->configuration = $configuration;
	}

	/**
	 * @return array
	 */
	public function getConfiguration()
	{
		return $this->configuration;
	}

	/**
	 * @param array $configuration
	 *
	 * @return static
	 */
	public function setConfiguration(array $configuration)
	{
		$this->configuration = $configuration;
		return $this;
	}

	/**
	 * @return FilterInterface|null
	 */
	public function getFilter()
	{
		return $this->filter;
	}

	/**
	 * @param FilterInterface $filter
	 *
	 * @return static
	 */
	public function setFilter(FilterInterface $filter)
	{
		$this->filter = $filter;
		return $this;
	}
}
