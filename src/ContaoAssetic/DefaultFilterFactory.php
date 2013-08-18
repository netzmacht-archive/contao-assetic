<?php

/**
 * Assetic for Contao Open Source CMS
 *
 * Copyright (C) 2013 bit3 UG
 *
 * @package Assetic
 * @author  Tristan Lins <tristan.lins@bit3.de>
 * @link    http://bit3.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

namespace ContaoAssetic;

use Assetic\Filter\CoffeeScriptFilter;
use Assetic\Filter\CompassFilter;
use Assetic\Filter\CssCrushFilter;
use Assetic\Filter\CssEmbedFilter;
use Assetic\Filter\CssImportFilter;
use Assetic\Filter\CssMinFilter;
use Assetic\Filter\CssRewriteFilter;
use Assetic\Filter\DartFilter;
use Assetic\Filter\GssFilter;
use Assetic\Filter\HandlebarsFilter;
use Assetic\Filter\JSMinFilter;
use Assetic\Filter\JSMinPlusFilter;
use Assetic\Filter\LessFilter;
use Assetic\Filter\LessphpFilter;
use Assetic\Filter\PackagerFilter;
use Assetic\Filter\PackerFilter;
use Assetic\Filter\PhpCssEmbedFilter;
use Assetic\Filter\ScssphpFilter;
use Assetic\Filter\StylusFilter;
use Assetic\Filter\UglifyCssFilter;
use Assetic\Filter\UglifyJsFilter;
use Assetic\Filter\GoogleClosure\CompilerApiFilter;
use Assetic\Filter\GoogleClosure\CompilerJarFilter;
use Assetic\Filter\Sass\SassFilter;
use Assetic\Filter\Sass\ScssFilter;
use Assetic\Filter\Yui\CssCompressorFilter;
use Assetic\Filter\Yui\JsCompressorFilter;
use ContaoAssetic\Filter\JsImportFilter;
use ContaoAssetic\Filter\NoOpFilter;
use ContaoAssetic\Filter\MrclayCssMinFilter;

class DefaultFilterFactory
    implements FilterFactory
{
    public function createFilter(array $filterConfig)
    {
        $filter = null;

        switch ($filterConfig['type']) {
            case 'coffee':
                if ($filterConfig['coffeePath'] && $filterConfig['nodePath']) {
                    $filter = new CoffeeScriptFilter($filterConfig['coffeePath'], $filterConfig['nodePath']);
                }
                else if ($filterConfig['coffeePath']) {
                    $filter = new CoffeeScriptFilter($filterConfig['coffeePath']);
                }
                else {
                    $filter = new CoffeeScriptFilter();
                }
                break;

            case 'compass':
                if ($filterConfig['compassPath'] && $filterConfig['rubyPath']) {
                    $filter = new CompassFilter($filterConfig['compassPath'], $filterConfig['rubyPath']);
                }
                else if ($filterConfig['compassPath']) {
                    $filter = new CompassFilter($filterConfig['compassPath']);
                }
                else {
                    $filter = new CompassFilter();
                }
                break;

	        case 'cssCrush':
		        $plugins = deserialize($filterConfig['cssCrushPlugins'], true);

		        $filter = new CssCrushFilter();
		        $filter->setDebug(true);
		        $filter->setPlugins($plugins);
		        break;

            case 'cssEmbed':
                if ($filterConfig['cssEmbedPath'] && $filterConfig['javaPath']) {
                    $filter = new CssEmbedFilter($filterConfig['cssEmbedPath'], $filterConfig['javaPath']);
                }
                else if ($filterConfig['cssEmbedPath']) {
                    $filter = new CssEmbedFilter($filterConfig['cssEmbedPath']);
                }
                break;

            case 'cssImport':
                $importFilter = null;

                if ($filterConfig['importFilter']) {
                    if (preg_match('#filter:(\d+)#', $filterConfig['importFilter'], $match)) {
                        $importFilter = AsseticFactory::getInstance()->createFilterById($match[1]);
                    }
                    else if (preg_match('#chain:(\d+)#', $filterConfig['importFilter'], $match)) {
                        $importFilter = AsseticFactory::getInstance()->createFilterChainById($match[1]);
                    }
                }

                $filter = new CssImportFilter($importFilter);
                break;

            case 'cssMin':
                if(class_exists("cssmin"))
                {
                    if(file_exists(TL_ROOT . '/composer/vendor/mrclay/minify/min/lib/CSSmin.php'))
                    {
                        $filter = new MrclayCssMinFilter();
                    }
                    else if(class_exists("CssMin"))
                    {
                        $filter = new CssMinFilter();
                    }
                }
                break;

            case 'cssRewrite':
                $filter = new CssRewriteFilter();
                break;

            case 'dart':
                if ($filterConfig['dartPath']) {
                    $filter = new DartFilter($filterConfig['dartPath']);
                }
                else {
                    $filter = new DartFilter();
                }
                break;

            case 'gss':
                if ($filterConfig['gssPath'] && $filterConfig['javaPath']) {
                    $filter = new GssFilter($filterConfig['gssPath'], $filterConfig['javaPath']);
                }
                else if ($filterConfig['gssPath']) {
                    $filter = new GssFilter($filterConfig['gssPath']);
                }
                break;

            case 'handlebars':
                if ($filterConfig['handlebarsPath'] && $filterConfig['nodePath']) {
                    $filter = new HandlebarsFilter($filterConfig['handlebarsPath'], $filterConfig['nodePath']);
                }
                else if ($filterConfig['handlebarsPath']) {
                    $filter = new HandlebarsFilter($filterConfig['handlebarsPath']);
                }
                else {
                    $filter = new HandlebarsFilter();
                }
                break;

            case 'jsImport':
                $importFilterJs = null;

                if ($filterConfig['importFilterJs']) {
                    if (preg_match('#filter:(\d+)#', $filterConfig['importFilterJs'], $match)) {
                        $importFilterJs = AsseticFactory::getInstance()->createFilterById($match[1]);
                    }
                    else if (preg_match('#chain:(\d+)#', $filterConfig['importFilterJs'], $match)) {
                        $importFilterJs = AsseticFactory::getInstance()->createFilterChainById($match[1]);
                    }
                }
				if (empty($importFilterJs)) {
					$importFilterJs = new NoOpFilter();
				}

                $filter = new JsImportFilter($importFilterJs);
                break;

            case 'jsMin':
                $filter = new JSMinFilter();
                break;

            case 'jsMinPlus':
                $filter = new JSMinPlusFilter();
                break;

            case 'less':
                if ($filterConfig['nodePath']) {
                    $filter = new LessFilter($filterConfig['nodePath']);
                }
                else {
                    $filter = new LessFilter();
				}

				$paths = deserialize($filterConfig['nodePaths']);
				if (is_array($paths) && count($paths)) {
					$temp = array();
					foreach ($paths as $path) {
						$temp[] = $path['path'];
					}
					$filter->setNodePaths($temp);
				}
                break;

            case 'lessphp':
                $filter = new LessphpFilter();
                break;

            case 'packager':
                $filter = new PackagerFilter();
                break;

            case 'packer':
                $filter = new PackerFilter();
                break;

            case 'phpCssEmbed':
                $filter = new PhpCssEmbedFilter();
                break;

            case 'scssphp':
                $filter = new ScssphpFilter();
				if ($filterConfig['scssphpCompass']) {
					$filter->enableCompass(true);
				}
                break;

            case 'stylus':
                if ($filterConfig['nodePath']) {
                    $filter = new StylusFilter($filterConfig['nodePath']);
                }
                else {
                    $filter = new StylusFilter();
                }

				$paths = deserialize($filterConfig['nodePaths']);
				if (is_array($paths) && count($paths)) {
					$temp = array();
					foreach ($paths as $path) {
						$temp[] = $path['path'];
					}
					$filter->setNodePaths($temp);
				}
                break;

            case 'uglifyCss':
                if ($filterConfig['uglifyCssPath'] && $filterConfig['nodePath']) {
                    $filter = new UglifyCssFilter($filterConfig['uglifyCssPath'], $filterConfig['nodePath']);
                }
                else if ($filterConfig['uglifyCssPath']) {
                    $filter = new UglifyCssFilter($filterConfig['uglifyCssPath']);
                }
                break;

            case 'uglifyJs':
                if ($filterConfig['uglifyJsPath'] && $filterConfig['nodePath']) {
                    $filter = new UglifyJsFilter($filterConfig['uglifyJsPath'], $filterConfig['nodePath']);
                }
                else if ($filterConfig['uglifyJsPath']) {
                    $filter = new UglifyJsFilter($filterConfig['uglifyJsPath']);
                }
                break;

            case 'closureApi':
                $filter = new CompilerApiFilter();
                break;

            case 'closureJar':
                if ($filterConfig['closurePath'] && $filterConfig['javaPath']) {
                    $filter = new CompilerJarFilter($filterConfig['closurePath'], $filterConfig['javaPath']);
                }
                else if ($filterConfig['closurePath']) {
                    $filter = new CompilerJarFilter($filterConfig['closurePath']);
                }
                break;

            case 'sass':
                if ($filterConfig['sassPath'] && $filterConfig['rubyPath']) {
                    $filter = new SassFilter($filterConfig['sassPath'], $filterConfig['rubyPath']);
                }
                else if ($filterConfig['sassPath']) {
                    $filter = new SassFilter($filterConfig['sassPath']);
                }
                else {
                    $filter = new SassFilter();
                }
                break;

            case 'scss':
                if ($filterConfig['sassPath'] && $filterConfig['rubyPath']) {
                    $filter = new ScssFilter($filterConfig['sassPath'], $filterConfig['rubyPath']);
                }
                else if ($filterConfig['sassPath']) {
                    $filter = new ScssFilter($filterConfig['sassPath']);
                }
                else {
                    $filter = new ScssFilter();
                }
                break;

            case 'yuiCss':
                if ($filterConfig['yuiPath'] && $filterConfig['javaPath']) {
                    $filter = new CssCompressorFilter($filterConfig['yuiPath'], $filterConfig['javaPath']);
                }
                else if ($filterConfig['yuiPath']) {
                    $filter = new CssCompressorFilter($filterConfig['yuiPath']);
                }
                break;

            case 'yuiJs':
                if ($filterConfig['yuiPath'] && $filterConfig['javaPath']) {
                    $filter = new JsCompressorFilter($filterConfig['yuiPath'], $filterConfig['javaPath']);
                }
                else if ($filterConfig['yuiPath']) {
                    $filter = new JsCompressorFilter($filterConfig['yuiPath']);
                }
                break;
        }

        return $filter;
    }
}
