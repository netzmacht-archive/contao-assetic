<?php

namespace InfinitySoft\Assetic\DataContainer;

use \Assetic\Model\FilterChainModel;

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

        foreach (array('compiler', 'minimizer') as $group) {
            foreach ($GLOBALS['ASSETIC'][$group] as $name => $class) {
                $options[$group][] = $name;
            }
        }

        return $options;
    }

    public function getImportFilterOptions($dc)
    {
        $options = array();

        $filterChain = FilterChainModel::findBy('type',
                                                'css',
                                                array('order' => 'type'));
        while ($filterChain->next()) {
            $label = '[';
            $label .= $GLOBALS['TL_LANG']['tl_assetic_filter_chain']['types'][$filterChain->type]
                ? : $filterChain->type;
            $label .= '] ';
            $label .= $filterChain->name;

            $GLOBALS['TL_LANG']['assetic']['chain:' . $filterChain->id] = $label;

            $options['chain'][] = 'chain:' . $filterChain->id;
        }

        $filter = \Database::getInstance()
            ->prepare('SELECT * FROM tl_assetic_filter WHERE id!=? ORDER BY type')
            ->execute($dc->id);
        while ($filter->next()) {
            if (!in_array($filter->type,
                          $GLOBALS['ASSETIC']['css'])
            ) {
                continue;
            }

            $label = $GLOBALS['TL_LANG']['assetic'][$filter->type]
                ? : $filter->type;

            if ($filter->note) {
                $label .= ' [' . $filter->note . ']';
            }

            $GLOBALS['TL_LANG']['assetic']['filter:' . $filter->id] = $label;

            $options['filter'][] = 'filter:' . $filter->id;
        }

        return $options;
    }

    public function filterLabel($row, $label, $dc, $fields)
    {
        if (!empty($fields[1])) {
            $label .= sprintf(
                ' [%s]',
                $fields[1]
            );
        }
        return $label;
    }

	public function getCssCrushPlugins()
	{
		$options = array();

		$path = __DIR__ . '/../../css-crush/vendor/css-crush/plugins';
		if (is_dir($path)) {
			$files = scandir($path);
			foreach ($files as $file) {
				if (preg_match('#^(.*)\.php$#', $file, $match)) {
					$options[$match[1]] = $match[1];
				}
			}
		}

		return $options;
	}
}
