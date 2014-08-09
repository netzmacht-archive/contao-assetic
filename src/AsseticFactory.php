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

use ContaoAssetic\Model\FilterModel;
use ContaoAssetic\Model\FilterChainModel;
use Assetic\Filter\FilterCollection;

class AsseticFactory
{
    /**
     * Registered filter factories.
     *
     * @var array
     */
    protected static $filterFactories = array();

    /**
     * Register a filter factory.
     *
     * @param FilterFactory $filterFactory
     */
    public static function registerFilterFactory(FilterFactory $filterFactory)
    {
        static::$filterFactories[] = $filterFactory;
    }

    public static function getFilterFactories()
    {
        if (!count(static::$filterFactories)) {
            static::$filterFactories[] = new DefaultFilterFactory();
        }

        return static::$filterFactories;
    }

    public static function createFilterOrChain($id, $debug = null)
    {
        list($type, $id) = explode(':',
                                   $id);

        switch ($type) {
            case 'filter':
                $filter = static::createFilterById($id,
                                                   $debug);
                if ($filter) {
                    return new FilterCollection(array($filter));
                }
                break;

            case 'chain':
                $chain = static::createFilterChainById($id,
                                                       $debug);
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
    public static function createFilterById($id, $debug = null)
    {
        if ($debug === null) {
            $debug = $GLOBALS['TL_CONFIG']['debugMode'];
        }

        $options = array();
        if ($debug) {
            $options['column'] = 'notInDebug=?';
            $options['value']  = '';
        }

        $filter = FilterModel::findActiveByPk($id,
                                              $options);

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
    public static function createFilter(array $filterConfig)
    {
        foreach (static::getFilterFactories() as $filterFactory) {
            $filter = $filterFactory->createFilter($filterConfig);

            if ($filter) {
                return $filter;
            }
        }

        return null;
    }

    /**
     * @param int $id
     *
     * @return \Assetic\Filter\FilterCollection|null
     */
    public static function createFilterChainById($id, $debug = null)
    {
        $chain = FilterChainModel::findActiveByPk($id);

        if ($chain) {
            return static::createFilterChain($chain->row(),
                                             $debug);
        }

        return null;
    }

    /**
     * @param array $filters
     *
     * @return \Assetic\Filter\FilterCollection|null
     */
    public static function createFilterChain(array $chainConfig, $debug = null)
    {
        $chainConfig['filters'] = deserialize($chainConfig['filters'],
                                              true);

        $filters = array();

        foreach ($chainConfig['filters'] as $id) {
            $filter = static::createFilterOrChain($id,
                                                  $debug);

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