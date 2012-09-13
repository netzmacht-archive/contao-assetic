<?php

namespace InfinitySoft\Assetic\DataContainer;

class AsseticFilter
{
    /**
     * Singleton instance.
     *
     * @var \Assetic\DataContainer\AsseticFilter
     */
    protected static $objInstance = null;

    /**
     * Get singleton instance.
     *
     * @static
     * @return \Assetic\DataContainer\AsseticFilter
     */
    public static function getInstance()
    {
        if (self::$objInstance === null) {
            self::$objInstance = new self;
        }
        return self::$objInstance;
    }

    /**
     * Singleton constructor
     */
    protected function __construct()
    {
    }

    public function getFilterTypeOptions()
    {
        $options = array();

        foreach (array('compiler', 'minimizer') as $group)
        {
            foreach ($GLOBALS['ASSETIC'][$group] as $name => $class)
            {
                $options[$group][] = $name;
            }
        }

        return $options;
    }

    public function getImportFilterOptions($dc)
    {
        $options = array();

        $objFilterChain = \Database::getInstance()
            ->query('SELECT * FROM tl_assetic_filter_chain WHERE type=\'css\' ORDER BY type');
        while ($objFilterChain->next()) {
            $label = '[';
            $label .= $GLOBALS['TL_LANG']['tl_assetic_filter_chain']['types'][$objFilterChain->type] ?: $objFilterChain->type;
            $label .= '] ';
            $label .= $objFilterChain->name;

            $GLOBALS['TL_LANG']['assetic']['chain:' . $objFilterChain->id] = $label;

            $options['chain']['chain:' . $objFilterChain->id] = $label;
        }

        $objFilter = \Database::getInstance()
            ->prepare('SELECT * FROM tl_assetic_filter WHERE id!=? ORDER BY type')
            ->execute($dc->id);
        while ($objFilter->next()) {
            if (!in_array($objFilter->type, $GLOBALS['ASSETIC']['css'])) {
                continue;
            }

            $label = $GLOBALS['TL_LANG']['assetic'][$objFilter->type] ?: $objFilter->type;

            if ($objFilter->note) {
                $label .= ' [' . $objFilter->note . ']';
            }

            $GLOBALS['TL_LANG']['assetic']['filter:' . $objFilter->id] = $label;

            $options['filter'][] = 'filter:' . $objFilter->id;
        }

        return $options;
    }
}
