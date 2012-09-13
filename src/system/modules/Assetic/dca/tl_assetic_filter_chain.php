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


\Controller::loadLanguageFile('assetic');


/**
 * Table tl_assetic_filter_chain
 */
$GLOBALS['TL_DCA']['tl_assetic_filter_chain'] = array
(

    // Config
    'config'       => array
    (
        'dataContainer'    => 'Table',
        'enableVersioning' => true,
        'sql'              => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        ),
    ),

    // List
    'list'         => array
    (
        'sorting'           => array
        (
            'mode'        => 2,
            'fields'      => array('name'),
            'flag'        => 1,
            'panelLayout' => 'filter;sort,search,limit'
        ),
        'label'             => array
        (
            'fields' => array('type', 'name'),
            'format' => '[%s] %s',
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations'        => array
        (
            'edit'   => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif'
            ),
            'delete' => array
            (
                'label'      => &$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show'   => array
            (
                'label'      => &$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['show'],
                'href'       => 'act=show',
                'icon'       => 'show.gif',
                'attributes' => 'style="margin-right:3px"'
            ),
        )
    ),

    // Palettes
    'palettes'     => array
    (
        '__selector__' => array('type'),
    ),

    'metapalettes' => array
    (
        'default'              => array(
            'filter' => array('type'),
        ),
        'css'                  => array(
            'filter' => array('type', 'name'),
            'chain'  => array('filters'),
            'status' => array('disabled'),
        ),
        'js'                   => array(
            'filter' => array('type', 'name'),
            'chain'  => array('filters'),
            'status' => array('disabled'),
        ),
    ),

    // Fields
    'fields'       => array
    (
        'id'                       => array
        (
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp'                   => array
        (
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'type'                     => array
        (
            'label'            => &$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['type'],
            'inputType'        => 'select',
            'exclude'          => true,
            'sorting'          => true,
            'flag'             => 1,
            'filter'           => true,
            'options'          => array('css', 'js'),
            'reference'        => &$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['types'],
            'eval'             => array('mandatory'          => true,
                                        'includeBlankOption' => true,
                                        'submitOnChange'     => true,
                                        'tl_class'           => 'w50'),
            'sql'              => "char(3) NOT NULL default ''"
        ),
        'name'                     => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['name'],
            'inputType' => 'text',
            'exclude'   => true,
            'flag'      => 1,
            'search'    => true,
            'eval'      => array('mandatory' => true,
                                 'maxlength' => 128,
                                 'tl_class'  => 'w50'),
            'sql'       => "varchar(128) NOT NULL default ''"
        ),
        'filters'                  => array
        (
            'label'            => &$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['filters'],
            'inputType'        => 'checkboxWizard',
            'exclude'          => true,
            'options_callback' => array('Assetic\DataContainer\AsseticFilterChain', 'getFilterOptions'),
            'reference'        => &$GLOBALS['TL_LANG']['assetic'],
            'eval'             => array('multiple' => true),
            'sql'              => "blob NULL"
        ),
        'disabled'                 => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['disabled'],
            'inputType' => 'checkbox',
            'exclude'   => true,
            'sorting'   => true,
            'flag'      => 1,
            'filter'    => true,
            'eval'      => array('tl_class'  => 'w50'),
            'sql'       => "char(1) NOT NULL default ''"
        ),
    )
);
