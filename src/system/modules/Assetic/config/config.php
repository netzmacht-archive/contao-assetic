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
 * Back end modules
 */
$GLOBALS['BE_MOD']['system']['assetic_config'] = array(
    'tables'     => array('', 'tl_assetic_filter', 'tl_assetic_filter_chain'),
    'callback'   => 'Assetic\Contao\AsseticConfigModule',
    'icon'       => 'system/modules/Assetic/assets/images/assetic.png',
    'stylesheet' => 'system/modules/Assetic/assets/css/backend.css',
);

/**
 * Include assetic functions
 */
require_once(TL_ROOT . '/system/modules/Assetic/vendor/Assetic/functions.php');

/**
 * Assetic compiler filter
 */
$GLOBALS['ASSETIC']['compiler']['coffee']      = 'Assetic\Filter\CoffeeScriptFilter';
$GLOBALS['ASSETIC']['compiler']['compass']     = 'Assetic\Filter\CompassFilter';
$GLOBALS['ASSETIC']['compiler']['cssEmbed']    = 'Assetic\Filter\CssEmbedFilter';
$GLOBALS['ASSETIC']['compiler']['cssImport']   = 'Assetic\Filter\CssImportFilter';
$GLOBALS['ASSETIC']['compiler']['cssRewrite']  = 'Assetic\Filter\CssRewriteFilter';
$GLOBALS['ASSETIC']['compiler']['gss']         = 'Assetic\Filter\GssFilter';
$GLOBALS['ASSETIC']['compiler']['less']        = 'Assetic\Filter\LessFilter';
$GLOBALS['ASSETIC']['compiler']['lessphp']     = 'Assetic\Filter\LessphpFilter';
$GLOBALS['ASSETIC']['compiler']['phpCssEmbed'] = 'Assetic\Filter\PhpCssEmbedFilter';
$GLOBALS['ASSETIC']['compiler']['scssphp']     = 'Assetic\Filter\ScssphpFilter';
$GLOBALS['ASSETIC']['compiler']['stylus']      = 'Assetic\Filter\StylusFilter';
$GLOBALS['ASSETIC']['compiler']['sass']        = 'Assetic\Filter\Sass\SassFilter';
$GLOBALS['ASSETIC']['compiler']['scss']        = 'Assetic\Filter\Sass\ScssFilter';
$GLOBALS['ASSETIC']['compiler']['handlebars']  = 'Assetic\Filter\HandlebarsFilter';

/**
 * Assetic minimizer filter
 */
$GLOBALS['ASSETIC']['minimizer']['cssMin']     = 'Assetic\Filter\CssMinFilter';
$GLOBALS['ASSETIC']['minimizer']['packager']   = 'Assetic\Filter\PackagerFilter';
$GLOBALS['ASSETIC']['minimizer']['uglifyCss']  = 'Assetic\Filter\UglifyCssFilter';
$GLOBALS['ASSETIC']['minimizer']['jsMin']      = 'Assetic\Filter\JSMinFilter';
$GLOBALS['ASSETIC']['minimizer']['jsMinPlus']  = 'Assetic\Filter\JSMinPlusFilter';
$GLOBALS['ASSETIC']['minimizer']['packer']     = 'Assetic\Filter\PackerFilter';
$GLOBALS['ASSETIC']['minimizer']['uglifyJs']   = 'Assetic\Filter\UglifyJsFilter';
$GLOBALS['ASSETIC']['minimizer']['yuiCss']        = 'Assetic\Filter\Yui\CssCompressorFilter';
$GLOBALS['ASSETIC']['minimizer']['yuiJs']        = 'Assetic\Filter\Yui\JsCompressorFilter';
$GLOBALS['ASSETIC']['minimizer']['closureApi'] = 'Assetic\Filter\GoogleClosure\CompilerApiFilter';
$GLOBALS['ASSETIC']['minimizer']['closureJar'] = 'Assetic\Filter\GoogleClosure\CompilerJarFilter';

/**
 * Assetic css compatible filters
 */
$GLOBALS['ASSETIC']['css'][] = 'coffee';
$GLOBALS['ASSETIC']['css'][] = 'compass';
$GLOBALS['ASSETIC']['css'][] = 'cssEmbed';
$GLOBALS['ASSETIC']['css'][] = 'cssImport';
$GLOBALS['ASSETIC']['css'][] = 'cssRewrite';
$GLOBALS['ASSETIC']['css'][] = 'gss';
$GLOBALS['ASSETIC']['css'][] = 'less';
$GLOBALS['ASSETIC']['css'][] = 'lessphp';
$GLOBALS['ASSETIC']['css'][] = 'phpCssEmbed';
$GLOBALS['ASSETIC']['css'][] = 'scssphp';
$GLOBALS['ASSETIC']['css'][] = 'stylus';
$GLOBALS['ASSETIC']['css'][] = 'sass';
$GLOBALS['ASSETIC']['css'][] = 'scss';
$GLOBALS['ASSETIC']['css'][] = 'cssMin';
$GLOBALS['ASSETIC']['css'][] = 'uglifyCss';
$GLOBALS['ASSETIC']['css'][] = 'yuiCss';

/**
 * Assetic js compatible filters
 */
$GLOBALS['ASSETIC']['js'][] = 'handlebars';
$GLOBALS['ASSETIC']['js'][] = 'packager';
$GLOBALS['ASSETIC']['js'][] = 'jsMin';
$GLOBALS['ASSETIC']['js'][] = 'jsMinPlus';
$GLOBALS['ASSETIC']['js'][] = 'packer';
$GLOBALS['ASSETIC']['js'][] = 'uglifyJs';
$GLOBALS['ASSETIC']['js'][] = 'yuiJs';
$GLOBALS['ASSETIC']['js'][] = 'closureApi';
$GLOBALS['ASSETIC']['js'][] = 'closureJar';


/**
 * Assetic Images filter (currently not used)
 */
/*
$GLOBALS['ASSETIC']['IMG']['jpegoptim'] = 'Assetic\Filter\JpegoptimFilter';
$GLOBALS['ASSETIC']['IMG']['jpegtran']  = 'Assetic\Filter\JpegtranFilter';
$GLOBALS['ASSETIC']['IMG']['optiPng']   = 'Assetic\Filter\OptiPngFilter';
$GLOBALS['ASSETIC']['IMG']['pngout']    = 'Assetic\Filter\PngoutFilter';
*/
