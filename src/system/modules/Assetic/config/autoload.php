<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package Assetic
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'InfinitySoft',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Vendor
	'Assetic\Cache\ConfigCache'                             => 'system/modules/Assetic/vendor/assetic/src/Assetic/Cache/ConfigCache.php',
	'Assetic\Cache\FilesystemCache'                         => 'system/modules/Assetic/vendor/assetic/src/Assetic/Cache/FilesystemCache.php',
	'Assetic\Cache\ExpiringCache'                           => 'system/modules/Assetic/vendor/assetic/src/Assetic/Cache/ExpiringCache.php',
	'Assetic\Cache\CacheInterface'                          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Cache/CacheInterface.php',
	'Assetic\Filter\LessphpFilter'                          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/LessphpFilter.php',
	'Assetic\Filter\Sass\ScssFilter'                        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/Sass/ScssFilter.php',
	'Assetic\Filter\Sass\SassFilter'                        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/Sass/SassFilter.php',
	'Assetic\Filter\CssEmbedFilter'                         => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CssEmbedFilter.php',
	'Assetic\Filter\PackagerFilter'                         => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/PackagerFilter.php',
	'Assetic\Filter\BaseCssFilter'                          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/BaseCssFilter.php',
	'Assetic\Filter\GoogleClosure\BaseCompilerFilter'       => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/GoogleClosure/BaseCompilerFilter.php',
	'Assetic\Filter\GoogleClosure\CompilerJarFilter'        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/GoogleClosure/CompilerJarFilter.php',
	'Assetic\Filter\GoogleClosure\CompilerApiFilter'        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/GoogleClosure/CompilerApiFilter.php',
	'Assetic\Filter\JpegoptimFilter'                        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/JpegoptimFilter.php',
	'Assetic\Filter\OptiPngFilter'                          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/OptiPngFilter.php',
	'Assetic\Filter\CompassFilter'                          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CompassFilter.php',
	'Assetic\Filter\Yui\JsCompressorFilter'                 => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/Yui/JsCompressorFilter.php',
	'Assetic\Filter\Yui\BaseCompressorFilter'               => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/Yui/BaseCompressorFilter.php',
	'Assetic\Filter\Yui\CssCompressorFilter'                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/Yui/CssCompressorFilter.php',
	'Assetic\Filter\CssRewriteFilter'                       => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CssRewriteFilter.php',
	'Assetic\Filter\JpegtranFilter'                         => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/JpegtranFilter.php',
	'Assetic\Filter\CssImportFilter'                        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CssImportFilter.php',
	'Assetic\Filter\LessFilter'                             => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/LessFilter.php',
	'Assetic\Filter\FilterInterface'                        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/FilterInterface.php',
	'Assetic\Filter\CallablesFilter'                        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CallablesFilter.php',
	'Assetic\Filter\SprocketsFilter'                        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/SprocketsFilter.php',
	'Assetic\Filter\CoffeeScriptFilter'                     => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CoffeeScriptFilter.php',
	'Assetic\Filter\PngoutFilter'                           => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/PngoutFilter.php',
	'Assetic\Filter\FilterCollection'                       => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/FilterCollection.php',
	'Assetic\Filter\CssMinFilter'                           => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CssMinFilter.php',
	'Assetic\Filter\StylusFilter'                           => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/StylusFilter.php',
	'Assetic\Filter\HashableInterface'                      => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/HashableInterface.php',
	'Assetic\AssetManager'                                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/AssetManager.php',
	'Assetic\FilterManager'                                 => 'system/modules/Assetic/vendor/assetic/src/Assetic/FilterManager.php',
	'Assetic\Util\ProcessBuilder'                           => 'system/modules/Assetic/vendor/assetic/src/Assetic/Util/ProcessBuilder.php',
	'Assetic\Util\Process'                                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Util/Process.php',
	'Assetic\Util\TraversableString'                        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Util/TraversableString.php',
	'Assetic\Extension\Twig\AsseticNode'                    => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/AsseticNode.php',
	'Assetic\Extension\Twig\AsseticFilterFunction'          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/AsseticFilterFunction.php',
	'Assetic\Extension\Twig\AsseticTokenParser'             => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/AsseticTokenParser.php',
	'Assetic\Extension\Twig\TwigFormulaLoader'              => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/TwigFormulaLoader.php',
	'Assetic\Extension\Twig\AsseticFilterInvoker'           => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/AsseticFilterInvoker.php',
	'Assetic\Extension\Twig\AsseticExtension'               => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/AsseticExtension.php',
	'Assetic\Extension\Twig\TwigResource'                   => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/TwigResource.php',
	'Assetic\Asset\AssetInterface'                          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/AssetInterface.php',
	'Assetic\Asset\AssetReference'                          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/AssetReference.php',
	'Assetic\Asset\AssetCache'                              => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/AssetCache.php',
	'Assetic\Asset\AssetCollection'                         => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/AssetCollection.php',
	'Assetic\Asset\FileAsset'                               => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/FileAsset.php',
	'Assetic\Asset\HttpAsset'                               => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/HttpAsset.php',
	'Assetic\Asset\StringAsset'                             => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/StringAsset.php',
	'Assetic\Asset\BaseAsset'                               => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/BaseAsset.php',
	'Assetic\Asset\GlobAsset'                               => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/GlobAsset.php',
	'Assetic\Factory\Worker\EnsureFilterWorker'             => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Worker/EnsureFilterWorker.php',
	'Assetic\Factory\Worker\WorkerInterface'                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Worker/WorkerInterface.php',
	'Assetic\Factory\LazyAssetManager'                      => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/LazyAssetManager.php',
	'Assetic\Factory\AssetFactory'                          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/AssetFactory.php',
	'Assetic\Factory\Resource\IteratorResourceInterface'    => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Resource/IteratorResourceInterface.php',
	'Assetic\Factory\Resource\ResourceInterface'            => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Resource/ResourceInterface.php',
	'Assetic\Factory\Resource\DirectoryResource'            => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Resource/DirectoryResource.php',
	'Assetic\Factory\Resource\FileResource'                 => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Resource/FileResource.php',
	'Assetic\Factory\Resource\CoalescingDirectoryResource'  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Resource/CoalescingDirectoryResource.php',
	'Assetic\Factory\Loader\FormulaLoaderInterface'         => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Loader/FormulaLoaderInterface.php',
	'Assetic\Factory\Loader\CachedFormulaLoader'            => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Loader/CachedFormulaLoader.php',
	'Assetic\Factory\Loader\BasePhpFormulaLoader'           => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Loader/BasePhpFormulaLoader.php',
	'Assetic\Factory\Loader\FunctionCallsFormulaLoader'     => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Loader/FunctionCallsFormulaLoader.php',
	'Assetic\AssetWriter'                                   => 'system/modules/Assetic/vendor/assetic/src/Assetic/AssetWriter.php',

	// Contao
	'InfinitySoft\Assetic\Contao\AsseticConfigModule'       => 'system/modules/Assetic/Contao/AsseticConfigModule.php',
	'InfinitySoft\Assetic\DataContainer\AsseticFilter'      => 'system/modules/Assetic/DataContainer/AsseticFilter.php',
	'InfinitySoft\Assetic\DataContainer\AsseticFilterChain' => 'system/modules/Assetic/DataContainer/AsseticFilterChain.php',
));
