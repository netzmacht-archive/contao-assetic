<?php

namespace InfinitySoft\Assetic\DataContainer;

class AsseticFilterChain
{
    /**
     * Singleton instance.
     *
     * @var \Assetic\DataContainer\AsseticFilterChain
     */
    protected static $objInstance = null;

    /**
     * Get singleton instance.
     *
     * @static
     * @return \Assetic\DataContainer\AsseticFilterChain
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

    public function getFilterOptions($dc)
    {
        $options = array();

        $objFilter = \Database::getInstance()
            ->query('SELECT * FROM tl_assetic_filter ORDER BY type');
        while ($objFilter->next()) {
            if (!in_array($objFilter->type, $GLOBALS['ASSETIC'][$dc->activeRecord->type])) {
                continue;
            }

            $label = $GLOBALS['TL_LANG']['assetic'][$objFilter->type] ?: $objFilter->type;

            if ($objFilter->note) {
                $label .= ' [' . $objFilter->note . ']';
            }

            $GLOBALS['TL_LANG']['assetic']['filter:' . $objFilter->id] = $label;

            $options[] = 'filter:' . $objFilter->id;
        }

        return $options;
    }
}
