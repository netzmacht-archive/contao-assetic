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

/** @var \Pimple $container */

$container['assetic.factory'] = $container->share(
	function() {
		return new \Bit3\Contao\Assetic\AsseticFactory();
	}
);
