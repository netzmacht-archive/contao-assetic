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

    public static function createFilterOrChain($id)
    {
        list($type, $id) = explode(':', $id);
        
        switch ($type)
        {
            case 'filter':
                return static::createFilterById($id);
            
            case 'chain':
                return static::createFilterChainById($id);
        }
        
        return null;
    }
    
    /**
     * @param int $id
     *
     * @return \Assetic\Filter\FilterInterface|null
     */
    public static function createFilterById($id)
    {
        $filter = \Database::getInstance()
            ->prepare('SELECT * FROM tl_assetic_filter WHERE id=? AND disabled=?')
            ->execute($id, '');

        if ($filter->next()) {
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
        foreach (static::filterFactories as $filterFactory)
        {
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
    public static function createFilterChainById($id)
    {
        $chain = \Database::getInstance()
            ->prepare('SELECT * FROM tl_assetic_filter_chain WHERE id=? AND disabled=?')
            ->execute($id, '');

        if ($chain->next()) {
            return static::createFilterChain($chain->row());
        }

        return null;
    }

    /**
     * @param array $filters
     *
     * @return \Assetic\Filter\FilterCollection|null
     */
    public static function createFilterChain(array $chainConfig)
    {
        $chainConfig['filters'] = deserialize($chainConfig['filters'], true);

        $filters = array();

        foreach ($chainConfig['filters'] as $id) {
            $filter = static::createFilterById($id);

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