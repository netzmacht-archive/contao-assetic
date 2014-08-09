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

namespace ContaoAssetic;

/**
 *
 */
interface FilterFactory
{
    /**
     * @abstract
     *
     * @param array $filterConfig The row with the filter configuration.
     *
     * @return \Assetic\Filter\FilterInterface
     */
    public function createFilter(array $filterConfig);
}
