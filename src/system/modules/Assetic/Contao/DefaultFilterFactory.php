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

class DefaultFilterFactory
    implements FilterFactory
{
    public function createFilter(array $filterConfig)
    {
        $filter = null;

        switch ($filterConfig['type']) {
            case 'coffee':
                if ($filterConfig['coffeePath'] && $filterConfig['nodePath']) {
                    $filter = new \Assetic\Filter\CoffeeScriptFilter($filterConfig['coffeePath'], $filterConfig['nodePath']);
                }
                else if ($filterConfig['coffeePath']) {
                    $filter = new \Assetic\Filter\CoffeeScriptFilter($filterConfig['coffeePath']);
                }
                else {
                    $filter = new \Assetic\Filter\CoffeeScriptFilter();
                }
                break;

            case 'compass':
                if ($filterConfig['compassPath'] && $filterConfig['rubyPath']) {
                    $filter = new \Assetic\Filter\CompassFilter($filterConfig['compassPath'], $filterConfig['rubyPath']);
                }
                else if ($filterConfig['compassPath']) {
                    $filter = new \Assetic\Filter\CompassFilter($filterConfig['compassPath']);
                }
                else {
                    $filter = new \Assetic\Filter\CompassFilter();
                }
                break;

            case 'cssEmbed':
                if ($filterConfig['cssEmbedPath'] && $filterConfig['javaPath']) {
                    $filter = new \Assetic\Filter\CssEmbedFilter($filterConfig['cssEmbedPath'], $filterConfig['javaPath']);
                }
                else if ($filterConfig['cssEmbedPath']) {
                    $filter = new \Assetic\Filter\CssEmbedFilter($filterConfig['cssEmbedPath']);
                }
                break;

            case 'cssImport':
                $importFilter = null;

                if ($filterConfig['importFilter']) {
                    if (preg_match('#filter:(\d+)#', $filterConfig['importFilter'], $match)) {
                        $importFilter = AsseticFactory::getInstance()->createFilterById($match[1]);
                    }
                    else if (preg_match('#chain:(\d+)#', $filterConfig['importFilter'], $match)) {
                        $importFilter = AsseticFactory::getInstance()->createFilterChainById($match[1]);
                    }
                }
        }

        return $filter;
    }
}
