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
$GLOBALS['TL_LANG']['tl_assetic_filter']['type']           = array('Typ', 'Wählen Sie hier den Filter Typ aus.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['note']           = array('Notiz',
                                                                   'Geben Sie hier eine kurze Notiz ein, damit Sie den Filter hinterher leichter identifizieren können.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['disabled']       = array('Deaktiviert',
                                                                   'Den Filter deaktivieren, damit wird er bei der Verarbeitung ignoriert ohne das man ihn aus der Chain entfernen muss.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['notInDebug']     = array('nicht im Debug Modus',
                                                                   'Der Filter wird im Debug Modus deaktiviert.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['nodePath']       = array('node Executeable',
                                                                   'Geben Sie hier den Pfad zur <code>node</code> Executeable an (Standard: /usr/bin/node).');
$GLOBALS['TL_LANG']['tl_assetic_filter']['nodePaths']      = array('Node Include Pfade',
                                                                   'Geben Sie hier ein oder mehrere Node Include Pfade an.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['rubyPath']       = array('ruby Executeable',
                                                                   'Geben Sie hier den Pfad zur <code>ruby</code> Executeable an (Standard: null).');
$GLOBALS['TL_LANG']['tl_assetic_filter']['javaPath']       = array('java Executeable',
                                                                   'Geben Sie hier den Pfad zur <code>java</code> Executeable an (Standard: /usr/bin/java).');
$GLOBALS['TL_LANG']['tl_assetic_filter']['coffeePath']     = array('CoffeScript Executeable',
                                                                   'Geben Sie hier den Pfad zur <code>coffee</code> Executeable an (Standard: /usr/bin/coffee).');
$GLOBALS['TL_LANG']['tl_assetic_filter']['compassPath']    = array('compass Executeable',
                                                                   'Geben Sie hier den Pfad zur <code>compass</code> Executeable an (Standard: /usr/bin/compass).');
$GLOBALS['TL_LANG']['tl_assetic_filter']['cssEmbedPath']   = array('CssEmbed JAR',
                                                                   'Geben Sie hier den Pfad zur CssEmbed JAR Datei an.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['importFilter']   = array('Import Filter',
                                                                   'Wählen Sie hier einen Filter der beim Importieren angewendet werden soll (Standard: CSS Rewrite Filter).');
$GLOBALS['TL_LANG']['tl_assetic_filter']['gssPath']        = array('GSS JAR',
                                                                   'Geben Sie hier den Pfad zur GSS JAR Datei an.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['handlebarsPath'] = array('Handlebars Executeable',
                                                                   'Geben Sie hier den Pfad zur <code>compass</code> Executeable an (Standard: /usr/bin/handlebars).');
$GLOBALS['TL_LANG']['tl_assetic_filter']['uglifyCssPath']  = array('UglifyCSS Executeable',
                                                                   'Geben Sie hier den Pfad zur <code>uglifycss</code> Executeable an.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['uglifyJsPath']   = array('UglifyJS Executeable',
                                                                   'Geben Sie hier den Pfad zur <code>uglifyjs</code> Executeable an.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['yuiPath']        = array('YUI JAR',
                                                                   'Geben Sie hier den Pfad zur YUI JAR Datei an.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['sassPath']       = array('SASS Executeable',
                                                                   'Geben Sie hier den Pfad zur <code>sass</code> Executeable an (Standard: /usr/bin/sass).');
$GLOBALS['TL_LANG']['tl_assetic_filter']['closurePath']    = array('Closure JAR',
                                                                   'Geben Sie hier den Pfad zur Closure JAR Datei an.');
$GLOBALS['TL_LANG']['tl_assetic_filter']['tstamp']         = array('Änderungsdatum',
                                                                   'Datum und Uhrzeit der letzten Änderung');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_assetic_filter']['filter_legend']     = 'Filter';
$GLOBALS['TL_LANG']['tl_assetic_filter']['coffee_legend']     = 'CoffeeScript';
$GLOBALS['TL_LANG']['tl_assetic_filter']['compass_legend']    = 'Compass';
$GLOBALS['TL_LANG']['tl_assetic_filter']['cssEmbed_legend']   = 'CssEmbed';
$GLOBALS['TL_LANG']['tl_assetic_filter']['cssImport_legend']  = 'CssImport';
$GLOBALS['TL_LANG']['tl_assetic_filter']['gss_legend']        = 'GSS';
$GLOBALS['TL_LANG']['tl_assetic_filter']['less_legend']       = 'Less';
$GLOBALS['TL_LANG']['tl_assetic_filter']['stylus_legend']     = 'Stylus';
$GLOBALS['TL_LANG']['tl_assetic_filter']['uglifyCss_legend']  = 'UglifyCSS';
$GLOBALS['TL_LANG']['tl_assetic_filter']['handlebars_legend'] = 'Handlebars';
$GLOBALS['TL_LANG']['tl_assetic_filter']['uglifyJs_legend']   = 'UglifyJS';
$GLOBALS['TL_LANG']['tl_assetic_filter']['status_legend']     = 'Status';


/**
 * References
 */
$GLOBALS['TL_LANG']['tl_assetic_filter']['theme_imported']   = 'Das Theme "%s" wurde importiert.';
$GLOBALS['TL_LANG']['tl_assetic_filter']['checking_theme']   = 'Die Theme-Daten werden überprüft';
$GLOBALS['TL_LANG']['tl_assetic_filter']['tables_fields']    = 'Tabellen und Felder';
$GLOBALS['TL_LANG']['tl_assetic_filter']['missing_field']    = 'Das Feld <strong>%s</strong> fehlt in der Datenbank und wird daher nicht importiert.';
$GLOBALS['TL_LANG']['tl_assetic_filter']['tables_ok']        = 'Die Prüfung der Tabellen war erfolgreich.';
$GLOBALS['TL_LANG']['tl_assetic_filter']['custom_sections']  = 'Eigene Layoutbereiche';
$GLOBALS['TL_LANG']['tl_assetic_filter']['missing_section']  = 'Der Layoutbereich <strong>%s</strong> ist in den Backend-Einstellungen nicht definiert.';
$GLOBALS['TL_LANG']['tl_assetic_filter']['sections_ok']      = 'Die Prüfung der Layoutbereiche war erfolgreich.';
$GLOBALS['TL_LANG']['tl_assetic_filter']['missing_xml']      = 'Das Theme "%s" ist fehlerhaft und kann nicht importiert werden.';
$GLOBALS['TL_LANG']['tl_assetic_filter']['custom_templates'] = 'Eigene Templates';
$GLOBALS['TL_LANG']['tl_assetic_filter']['template_exists']  = 'Das Template <strong>"%s"</strong> existiert bereits und wird überschrieben.';
$GLOBALS['TL_LANG']['tl_assetic_filter']['templates_ok']     = 'Keine Konflikte festgestellt.';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_assetic_filter']['new']    = array('Neuer Filter', 'Einen neuen Filter anlegen');
$GLOBALS['TL_LANG']['tl_assetic_filter']['show']   = array('Filterdetails', 'Details des Filters ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_assetic_filter']['edit']   = array('Filter bearbeiten', 'Filter ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_assetic_filter']['delete'] = array('Filter löschen', 'Filter ID %s löschen');
