<?php

/**
 * Assetic for Contao Open Source CMS
 *
 * Copyright (C) 2012 InfinitySoft
 *
 * @package Assetic
 * @author  Tristan Lins <tristan.lins@infinitysoft.de>
 * @link    http://www.infinitysoft.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

namespace InfinitySoft\Assetic\Contao;

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
