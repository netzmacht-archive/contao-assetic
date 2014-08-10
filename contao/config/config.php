<?php

/**
 * Assetic for Contao Open Source CMS
 *
 * @copyright 2014 bit3 UG <http://bit3.de>
 * @author    Tristan Lins <tristan.lins@bit3.de>
 * @package   bit3/contao-assetic
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPL-3.0+
 * @filesource
 */

/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_assetic_filter']       = 'Bit3\Contao\Assetic\Model\FilterModel';
$GLOBALS['TL_MODELS']['tl_assetic_filter_chain'] = 'Bit3\Contao\Assetic\Model\FilterChainModel';

/**
 * Back end modules
 */
$GLOBALS['BE_MOD']['system']['assetic']        = array(
	'icon' => 'system/modules/assetic/assets/images/assetic.png',
);
$GLOBALS['BE_MOD']['system']['assetic_filter'] = array(
	'nested'     => 'assetic',
	'tables'     => array('tl_assetic_filter'),
	'icon'       => 'system/modules/assetic/assets/images/filter.png',
	'stylesheet' => 'system/modules/assetic/assets/css/backend.css',
);
$GLOBALS['BE_MOD']['system']['assetic_chain'] = array(
	'nested' => 'assetic',
	'tables' => array('tl_assetic_filter_chain'),
	'icon'   => 'system/modules/assetic/assets/images/chain.png',
);

/**
 * Assetic compiler filter
 */
$GLOBALS['ASSETIC']['compiler']['coffee']          = 'Assetic\Filter\CoffeeScriptFilter';
$GLOBALS['ASSETIC']['compiler']['compass']         = 'Assetic\Filter\CompassFilter';
$GLOBALS['ASSETIC']['compiler']['cssEmbed']        = 'Assetic\Filter\CssEmbedFilter';
$GLOBALS['ASSETIC']['compiler']['cssImport']       = 'Assetic\Filter\CssImportFilter';
$GLOBALS['ASSETIC']['compiler']['jsImport']        = 'Bit3\Contao\Assetic\Filter\JsImportFilter';
$GLOBALS['ASSETIC']['compiler']['cssRewrite']      = 'Assetic\Filter\CssRewriteFilter';
$GLOBALS['ASSETIC']['compiler']['dart']            = 'Assetic\Filter\DartFilter';
$GLOBALS['ASSETIC']['compiler']['gss']             = 'Assetic\Filter\GssFilter';
// $GLOBALS['ASSETIC']['compiler']['handlebars']      = 'Assetic\Filter\HandlebarsFilter';
$GLOBALS['ASSETIC']['compiler']['less']            = 'Assetic\Filter\LessFilter';
$GLOBALS['ASSETIC']['compiler']['lessphp']         = 'Assetic\Filter\LessphpFilter';
// $GLOBALS['ASSETIC']['compiler']['phpCssEmbed']     = 'Assetic\Filter\PhpCssEmbedFilter';
$GLOBALS['ASSETIC']['compiler']['scssphp']         = 'Assetic\Filter\ScssphpFilter';
$GLOBALS['ASSETIC']['compiler']['stylus']          = 'Assetic\Filter\StylusFilter';
$GLOBALS['ASSETIC']['compiler']['sass']            = 'Assetic\Filter\Sass\SassFilter';
$GLOBALS['ASSETIC']['compiler']['scss']            = 'Assetic\Filter\Sass\ScssFilter';

/**
 * Assetic minimizer filter
 */
$GLOBALS['ASSETIC']['minimizer']['cssMin']     = 'Assetic\Filter\CssMinFilter';
$GLOBALS['ASSETIC']['minimizer']['jsMin']      = 'Assetic\Filter\JSMinFilter';
$GLOBALS['ASSETIC']['minimizer']['jsMinPlus']  = 'Assetic\Filter\JSMinPlusFilter';
$GLOBALS['ASSETIC']['minimizer']['packager']   = 'Assetic\Filter\PackagerFilter';
// $GLOBALS['ASSETIC']['minimizer']['packer']     = 'Assetic\Filter\PackerFilter';
$GLOBALS['ASSETIC']['minimizer']['uglifyCss']  = 'Assetic\Filter\UglifyCssFilter';
$GLOBALS['ASSETIC']['minimizer']['uglifyJs']   = 'Assetic\Filter\UglifyJsFilter';
$GLOBALS['ASSETIC']['minimizer']['closureApi'] = 'Assetic\Filter\GoogleClosure\CompilerApiFilter';
$GLOBALS['ASSETIC']['minimizer']['closureJar'] = 'Assetic\Filter\GoogleClosure\CompilerJarFilter';
$GLOBALS['ASSETIC']['minimizer']['yuiCss']     = 'Assetic\Filter\Yui\CssCompressorFilter';
$GLOBALS['ASSETIC']['minimizer']['yuiJs']      = 'Assetic\Filter\Yui\JsCompressorFilter';

/**
 * Assetic css compatible filters
 */
$GLOBALS['ASSETIC']['css'][] = 'compass';
$GLOBALS['ASSETIC']['css'][] = 'cssEmbed';
$GLOBALS['ASSETIC']['css'][] = 'cssImport';
$GLOBALS['ASSETIC']['css'][] = 'cssMin';
$GLOBALS['ASSETIC']['css'][] = 'cssRewrite';
$GLOBALS['ASSETIC']['css'][] = 'gss';
$GLOBALS['ASSETIC']['css'][] = 'less';
$GLOBALS['ASSETIC']['css'][] = 'lessphp';
// $GLOBALS['ASSETIC']['css'][] = 'phpCssEmbed';
$GLOBALS['ASSETIC']['css'][] = 'scssphp';
$GLOBALS['ASSETIC']['css'][] = 'stylus';
$GLOBALS['ASSETIC']['css'][] = 'uglifyCss';
$GLOBALS['ASSETIC']['css'][] = 'sass';
$GLOBALS['ASSETIC']['css'][] = 'scss';
$GLOBALS['ASSETIC']['css'][] = 'yuiCss';

/**
 * Assetic js compatible filters
 */
$GLOBALS['ASSETIC']['js'][] = 'jsImport';
$GLOBALS['ASSETIC']['js'][] = 'coffee';
$GLOBALS['ASSETIC']['js'][] = 'dart';
// $GLOBALS['ASSETIC']['js'][] = 'handlebars';
$GLOBALS['ASSETIC']['js'][] = 'jsMin';
$GLOBALS['ASSETIC']['js'][] = 'jsMinPlus';
$GLOBALS['ASSETIC']['js'][] = 'packager';
// $GLOBALS['ASSETIC']['js'][] = 'packer';
$GLOBALS['ASSETIC']['js'][] = 'uglifyJs';
$GLOBALS['ASSETIC']['js'][] = 'closureApi';
$GLOBALS['ASSETIC']['js'][] = 'closureJar';
$GLOBALS['ASSETIC']['js'][] = 'yuiJs';


/**
 * Assetic Images filter (currently not used)
 */
/*
$GLOBALS['ASSETIC']['IMG']['jpegoptim'] = 'Assetic\Filter\JpegoptimFilter';
$GLOBALS['ASSETIC']['IMG']['jpegtran']  = 'Assetic\Filter\JpegtranFilter';
$GLOBALS['ASSETIC']['IMG']['optiPng']   = 'Assetic\Filter\OptiPngFilter';
$GLOBALS['ASSETIC']['IMG']['pngout']    = 'Assetic\Filter\PngoutFilter';
*/

/**
 * Event subscriber
 */
$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'Bit3\Contao\Assetic\FilterFactory';
