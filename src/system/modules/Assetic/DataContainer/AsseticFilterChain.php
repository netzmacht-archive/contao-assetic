<?php

namespace InfinitySoft\Assetic\DataContainer;

use
\Assetic\Model\FilterModel;

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

        $filter = FilterModel::findAll(['order' => 'type']);

        if ($filter) {
            while ($filter->next()) {
                if (!in_array($filter->type,
                              $GLOBALS['ASSETIC'][$dc->activeRecord->type])
                ) {
                    continue;
                }

                $label = $GLOBALS['TL_LANG']['assetic'][$filter->type]
                    ? : $filter->type;

                if ($filter->note) {
                    $label .= ' [' . $filter->note . ']';
                }

                $GLOBALS['TL_LANG']['assetic']['filter:' . $filter->id] = $label;

                $options[] = 'filter:' . $filter->id;
            }
        }

        return $options;
    }
}
