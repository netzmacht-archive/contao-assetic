<?php

/**
 * Assetic for Contao Open Source CMS
 *
 * Copyright (C) 2013 bit3 UG
 *
 * @package Assetic
 * @author  Tristan Lins <tristan.lins@bit3.de>
 * @link    http://bit3.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

namespace ContaoAssetic\Filter;

use Assetic\Asset\AssetInterface;
use Assetic\Filter\CompassFilter;
use Assetic\Filter\FilterInterface;

class ConfiguringCompassFilterWrapper implements FilterInterface
{
	/**
	 * @var CompassFilter
	 */
	protected $filter;

	function __construct(CompassFilter $filter)
	{
		$this->filter = $filter;
	}

	protected function configure(AssetInterface $asset)
	{
		$this->filter->setImagesDir($asset->getSourceDirectory());
		$this->filter->setFontsDir($asset->getSourceDirectory());
		$this->filter->setJavascriptsDir($asset->getSourceDirectory());

		$this->filter->setGeneratedImagesPath(TL_ROOT . '/assets/images');

		$this->filter->setHttpPath('.');
		$this->filter->setHttpImagesPath('.');
		$this->filter->setHttpFontsPath('.');
		$this->filter->setHttpJavascriptsPath('.');
		$this->filter->setHttpGeneratedImagesPath('assets/images');
	}

	/**
	 * Filters an asset after it has been loaded.
	 *
	 * @param AssetInterface $asset An asset
	 */
	public function filterLoad(AssetInterface $asset)
	{
		$this->configure($asset);
		$this->filter->filterLoad($asset);
	}

	/**
	 * Filters an asset just before it's dumped.
	 *
	 * @param AssetInterface $asset An asset
	 */
	public function filterDump(AssetInterface $asset)
	{
		$this->configure($asset);
		$this->filter->filterDump($asset);
	}
}