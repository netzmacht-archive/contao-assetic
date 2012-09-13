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


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['type']     = array('Anwendbar auf', 'Wählen Sie hier auf welche Assets diese Chain anwendbar sein soll.');
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['name']     = array('Name',
                                                                   'Geben Sie hier einen Namen für die Chain ein.');
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['filters']  = array('Filter',
                                                                   'Wählen Sie hier die aktiven Filter dieser Chain und ihre Reihenfolge aus.');
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['disabled'] = array('Deaktiviert',
                                                                   'Die Chain deaktivieren, damit wird er bei der Verarbeitung ignoriert ohne das man sie entfernen muss.');
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['tstamp']   = array('Änderungsdatum',
                                                                   'Datum und Uhrzeit der letzten Änderung');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['filter_legend'] = 'Filter';
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['chain_legend']  = 'Chain';


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['types']['css'] = 'CSS';
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['types']['js'] = 'JS';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['new']    = array('Neue Chain', 'Eine neue Chain anlegen');
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['show']   = array('Chaindetails', 'Details der Chain ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['edit']   = array('Chain bearbeiten', 'Chain ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_assetic_filter_chain']['delete'] = array('Chain löschen', 'Chain ID %s löschen');
