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
     * Singleton instance.
     *
     * @var Assetic\Contao\AsseticFactory
     */
    protected static $objInstance = null;

    /**
     * Get the singleton instance.
     *
     * @static
     * @return Assetic\Contao\AsseticFactory
     */
    public static function getInstance()
    {
        if (self::$objInstance === null) {
            self::$objInstance = new self;
        }
        return self::$objInstance;
    }

    /**
     * Registered filter factories.
     *
     * @var array
     */
    protected $filterFactories = array();

    function __construct()
    {
        $this->filterFactories[] = new DefaultFilterFactory();
    }


    /**
     * Register a filter factory.
     *
     * @param FilterFactory $filterFactory
     */
    public function registerFilterFactory(FilterFactory $filterFactory)
    {
        array_unshift($this->filterFactories, $filterFactory);
    }

    /**
     * @param int $id
     *
     * @return \Assetic\Filter\FilterInterface|null
     */
    public function createFilterById($id)
    {
        $filter = \Database::getInstance()
            ->prepare('SELECT * FROM tl_assetic_filter WHERE id=? AND disabled=?')
            ->execute($id, '');

        if ($filter->next()) {
            return $this->createFilter($filter->row());
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
        foreach ($this->filterFactories as $filterFactory)
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
    public function createFilterChainById($id)
    {
        $chain = \Database::getInstance()
            ->prepare('SELECT * FROM tl_assetic_filter_chain WHERE id=? AND disabled=?')
            ->execute($id, '');

        if ($chain->next()) {
            return $this->createFilterChain($chain->row());
        }

        return null;
    }

    /**
     * @param array $filters
     *
     * @return \Assetic\Filter\FilterCollection|null
     */
    public function createFilterChain(array $chainConfig)
    {
        $chainConfig['filters'] = deserialize($chainConfig['filters'], true);

        $filters = array();

        foreach ($chainConfig['filters'] as $id) {
            $filter = $this->createFilterById($id);

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