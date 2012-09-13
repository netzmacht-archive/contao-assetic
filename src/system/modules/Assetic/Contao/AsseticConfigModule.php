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

class AsseticConfigModule extends \TwigBackendModule
{
    protected $strTemplate = 'be_assetic_config';

    public function generate()
    {
        if ($this->objDc->table) {
            $act = $this->Input->get('act');

            if (!strlen($act) || $act == 'paste' || $act == 'select') {
                $act = ($this->objDc instanceof \listable)
                    ? 'showAll'
                    : 'edit';
            }

            switch ($act) {
                case 'delete':
                case 'show':
                case 'showAll':
                case 'undo':
                    if (!$this->objDc instanceof \listable) {
                        $this->log('Data container ' . $this->objDc->table . ' is not listable',
                                   'Backend getBackendModule()',
                                   TL_ERROR);
                        trigger_error('The current data container is not listable',
                                      E_USER_ERROR);
                    }
                    break;

                case 'create':
                case 'cut':
                case 'cutAll':
                case 'copy':
                case 'copyAll':
                case 'move':
                case 'edit':
                    if (!$this->objDc instanceof \editable) {
                        $this->log('Data container ' . $this->objDc->table . ' is not editable',
                                   'Backend getBackendModule()',
                                   TL_ERROR);
                        trigger_error('The current data container is not editable',
                                      E_USER_ERROR);
                    }
                    break;
            }

            return $this->objDc->$act();
        }

        return parent::generate();
    }

    /**
     * Compile the current element
     */
    protected function compile()
    {
        \Controller::loadLanguageFile('tl_assetic_config');
    }
}
