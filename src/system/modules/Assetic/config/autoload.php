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
	'Assetic\Cache\ConfigCache'                                     => 'system/modules/Assetic/vendor/assetic/src/Assetic/Cache/ConfigCache.php',
	'Assetic\Cache\FilesystemCache'                                 => 'system/modules/Assetic/vendor/assetic/src/Assetic/Cache/FilesystemCache.php',
	'Assetic\Cache\ExpiringCache'                                   => 'system/modules/Assetic/vendor/assetic/src/Assetic/Cache/ExpiringCache.php',
	'Assetic\Cache\CacheInterface'                                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Cache/CacheInterface.php',
	'Assetic\Filter\LessphpFilter'                                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/LessphpFilter.php',
	'Assetic\Filter\Sass\ScssFilter'                                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/Sass/ScssFilter.php',
	'Assetic\Filter\Sass\SassFilter'                                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/Sass/SassFilter.php',
	'Assetic\Filter\CssEmbedFilter'                                 => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CssEmbedFilter.php',
	'Assetic\Filter\PackagerFilter'                                 => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/PackagerFilter.php',
	'Assetic\Filter\BaseCssFilter'                                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/BaseCssFilter.php',
	'Assetic\Filter\GoogleClosure\BaseCompilerFilter'               => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/GoogleClosure/BaseCompilerFilter.php',
	'Assetic\Filter\GoogleClosure\CompilerJarFilter'                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/GoogleClosure/CompilerJarFilter.php',
	'Assetic\Filter\GoogleClosure\CompilerApiFilter'                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/GoogleClosure/CompilerApiFilter.php',
	'Assetic\Filter\JpegoptimFilter'                                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/JpegoptimFilter.php',
	'Assetic\Filter\OptiPngFilter'                                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/OptiPngFilter.php',
	'Assetic\Filter\CompassFilter'                                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CompassFilter.php',
	'Assetic\Filter\Yui\JsCompressorFilter'                         => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/Yui/JsCompressorFilter.php',
	'Assetic\Filter\Yui\BaseCompressorFilter'                       => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/Yui/BaseCompressorFilter.php',
	'Assetic\Filter\Yui\CssCompressorFilter'                        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/Yui/CssCompressorFilter.php',
	'Assetic\Filter\CssRewriteFilter'                               => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CssRewriteFilter.php',
	'Assetic\Filter\JpegtranFilter'                                 => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/JpegtranFilter.php',
	'Assetic\Filter\CssImportFilter'                                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CssImportFilter.php',
	'Assetic\Filter\LessFilter'                                     => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/LessFilter.php',
	'Assetic\Filter\FilterInterface'                                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/FilterInterface.php',
	'Assetic\Filter\CallablesFilter'                                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CallablesFilter.php',
	'Assetic\Filter\SprocketsFilter'                                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/SprocketsFilter.php',
	'Assetic\Filter\CoffeeScriptFilter'                             => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CoffeeScriptFilter.php',
	'Assetic\Filter\PngoutFilter'                                   => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/PngoutFilter.php',
	'Assetic\Filter\FilterCollection'                               => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/FilterCollection.php',
	'Assetic\Filter\CssMinFilter'                                   => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/CssMinFilter.php',
	'Assetic\Filter\StylusFilter'                                   => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/StylusFilter.php',
	'Assetic\Filter\HashableInterface'                              => 'system/modules/Assetic/vendor/assetic/src/Assetic/Filter/HashableInterface.php',
	'Assetic\AssetManager'                                          => 'system/modules/Assetic/vendor/assetic/src/Assetic/AssetManager.php',
	'Assetic\FilterManager'                                         => 'system/modules/Assetic/vendor/assetic/src/Assetic/FilterManager.php',
	'Assetic\Util\ProcessBuilder'                                   => 'system/modules/Assetic/vendor/assetic/src/Assetic/Util/ProcessBuilder.php',
	'Assetic\Util\Process'                                          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Util/Process.php',
	'Assetic\Util\TraversableString'                                => 'system/modules/Assetic/vendor/assetic/src/Assetic/Util/TraversableString.php',
	'Assetic\Extension\Twig\AsseticNode'                            => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/AsseticNode.php',
	'Assetic\Extension\Twig\AsseticFilterFunction'                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/AsseticFilterFunction.php',
	'Assetic\Extension\Twig\AsseticTokenParser'                     => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/AsseticTokenParser.php',
	'Assetic\Extension\Twig\TwigFormulaLoader'                      => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/TwigFormulaLoader.php',
	'Assetic\Extension\Twig\AsseticFilterInvoker'                   => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/AsseticFilterInvoker.php',
	'Assetic\Extension\Twig\AsseticExtension'                       => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/AsseticExtension.php',
	'Assetic\Extension\Twig\TwigResource'                           => 'system/modules/Assetic/vendor/assetic/src/Assetic/Extension/Twig/TwigResource.php',
	'Assetic\Asset\AssetInterface'                                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/AssetInterface.php',
	'Assetic\Asset\AssetReference'                                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/AssetReference.php',
	'Assetic\Asset\AssetCache'                                      => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/AssetCache.php',
	'Assetic\Asset\AssetCollection'                                 => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/AssetCollection.php',
	'Assetic\Asset\FileAsset'                                       => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/FileAsset.php',
	'Assetic\Asset\HttpAsset'                                       => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/HttpAsset.php',
	'Assetic\Asset\StringAsset'                                     => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/StringAsset.php',
	'Assetic\Asset\BaseAsset'                                       => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/BaseAsset.php',
	'Assetic\Asset\GlobAsset'                                       => 'system/modules/Assetic/vendor/assetic/src/Assetic/Asset/GlobAsset.php',
	'Assetic\Factory\Worker\EnsureFilterWorker'                     => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Worker/EnsureFilterWorker.php',
	'Assetic\Factory\Worker\WorkerInterface'                        => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Worker/WorkerInterface.php',
	'Assetic\Factory\LazyAssetManager'                              => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/LazyAssetManager.php',
	'Assetic\Factory\AssetFactory'                                  => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/AssetFactory.php',
	'Assetic\Factory\Resource\IteratorResourceInterface'            => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Resource/IteratorResourceInterface.php',
	'Assetic\Factory\Resource\ResourceInterface'                    => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Resource/ResourceInterface.php',
	'Assetic\Factory\Resource\DirectoryResource'                    => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Resource/DirectoryResource.php',
	'Assetic\Factory\Resource\FileResource'                         => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Resource/FileResource.php',
	'Assetic\Factory\Resource\CoalescingDirectoryResource'          => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Resource/CoalescingDirectoryResource.php',
	'Assetic\Factory\Loader\FormulaLoaderInterface'                 => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Loader/FormulaLoaderInterface.php',
	'Assetic\Factory\Loader\CachedFormulaLoader'                    => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Loader/CachedFormulaLoader.php',
	'Assetic\Factory\Loader\BasePhpFormulaLoader'                   => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Loader/BasePhpFormulaLoader.php',
	'Assetic\Factory\Loader\FunctionCallsFormulaLoader'             => 'system/modules/Assetic/vendor/assetic/src/Assetic/Factory/Loader/FunctionCallsFormulaLoader.php',
	'Assetic\AssetWriter'                                           => 'system/modules/Assetic/vendor/assetic/src/Assetic/AssetWriter.php',
	'Assetic\Test\FilterManagerTest'                                => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/FilterManagerTest.php',
	'Assetic\Test\AssetManagerTest'                                 => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/AssetManagerTest.php',
	'Assetic\Test\AssetWriterTest'                                  => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/AssetWriterTest.php',
	'Assetic\Test\Cache\FilesystemCacheTest'                        => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Cache/FilesystemCacheTest.php',
	'Assetic\Test\Cache\ConfigCacheTest'                            => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Cache/ConfigCacheTest.php',
	'Assetic\Test\Cache\ExpiringCacheTest'                          => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Cache/ExpiringCacheTest.php',
	'Assetic\Test\Filter\LessphpFilterTest'                         => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/LessphpFilterTest.php',
	'Assetic\Test\Filter\Sass\SassFilterTest'                       => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/Sass/SassFilterTest.php',
	'Assetic\Test\Filter\Sass\ScssFilterTest'                       => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/Sass/ScssFilterTest.php',
	'Assetic\Test\Filter\SprocketsFilterTest'                       => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/SprocketsFilterTest.php',
	'Assetic\Test\Filter\CssEmbedFilterTest'                        => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/CssEmbedFilterTest.php',
	'Assetic\Test\Filter\GoogleClosure\CompilerApiFilterTest'       => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/GoogleClosure/CompilerApiFilterTest.php',
	'Assetic\Test\Filter\GoogleClosure\CompilerJarFilterTest'       => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/GoogleClosure/CompilerJarFilterTest.php',
	'Assetic\Test\Filter\CallablesFilterTest'                       => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/CallablesFilterTest.php',
	'Assetic\Test\Filter\LessFilterTest'                            => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/LessFilterTest.php',
	'Assetic\Test\Filter\Yui\JsCompressorFilterTest'                => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/Yui/JsCompressorFilterTest.php',
	'Assetic\Test\Filter\Yui\CssCompressorFilterTest'               => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/Yui/CssCompressorFilterTest.php',
	'Assetic\Test\Filter\Yui\BaseCompressorFilterTest'              => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/Yui/BaseCompressorFilterTest.php',
	'Assetic\Test\Filter\CssImportFilterTest'                       => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/CssImportFilterTest.php',
	'Assetic\Test\Filter\StylusFilterTest'                          => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/StylusFilterTest.php',
	'Assetic\Test\Filter\CompassFilterTest'                         => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/CompassFilterTest.php',
	'Assetic\Test\Filter\PackagerFilterTest'                        => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/PackagerFilterTest.php',
	'Assetic\Test\Filter\JpegoptimFilterTest'                       => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/JpegoptimFilterTest.php',
	'Assetic\Test\Filter\CoffeeScriptFilterTest'                    => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/CoffeeScriptFilterTest.php',
	'Assetic\Test\Filter\CssRewriteFilterTest'                      => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/CssRewriteFilterTest.php',
	'Assetic\Test\Filter\OptiPngFilterTest'                         => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/OptiPngFilterTest.php',
	'Assetic\Test\Filter\BaseImageFilterTest'                       => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/BaseImageFilterTest.php',
	'Assetic\Test\Filter\PngoutFilterTest'                          => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/PngoutFilterTest.php',
	'Assetic\Test\Filter\CssMinFilterTest'                          => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/CssMinFilterTest.php',
	'Assetic\Test\Filter\FilterCollectionTest'                      => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/FilterCollectionTest.php',
	'Assetic\Test\Filter\JpegtranFilterTest'                        => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Filter/JpegtranFilterTest.php',
	'Assetic\Test\Util\TraversableStringTest'                       => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Util/TraversableStringTest.php',
	'Assetic\Test\Util\ProcessBuilderTest'                          => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Util/ProcessBuilderTest.php',
	'Assetic\Test\Extension\Twig\TwigFormulaLoaderTest'             => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Extension/Twig/TwigFormulaLoaderTest.php',
	'Assetic\Test\Extension\Twig\TwigResourceTest'                  => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Extension/Twig/TwigResourceTest.php',
	'Assetic\Test\Extension\Twig\AsseticExtensionTest'              => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Extension/Twig/AsseticExtensionTest.php',
	'Assetic\Test\Asset\HttpAssetTest'                              => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Asset/HttpAssetTest.php',
	'Assetic\Test\Asset\AssetReferenceTest'                         => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Asset/AssetReferenceTest.php',
	'Assetic\Test\Asset\AssetCacheTest'                             => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Asset/AssetCacheTest.php',
	'Assetic\Test\Asset\FileAssetTest'                              => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Asset/FileAssetTest.php',
	'Assetic\Test\Asset\GlobAssetTest'                              => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Asset/GlobAssetTest.php',
	'Assetic\Test\Asset\StringAssetTest'                            => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Asset/StringAssetTest.php',
	'Assetic\Test\Asset\AssetCollectionTest'                        => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Asset/AssetCollectionTest.php',
	'Assetic\Test\Factory\Worker\EnsureFilterWorkerTest'            => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Factory/Worker/EnsureFilterWorkerTest.php',
	'Assetic\Test\Factory\AssetFactoryTest'                         => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Factory/AssetFactoryTest.php',
	'Assetic\Test\Factory\LazyAssetManagerTest'                     => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Factory/LazyAssetManagerTest.php',
	'Assetic\Test\Factory\Resource\DirectoryResourceTest'           => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Factory/Resource/DirectoryResourceTest.php',
	'Assetic\Test\Factory\Resource\FileResourceTest'                => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Factory/Resource/FileResourceTest.php',
	'Assetic\Test\Factory\Resource\CoalescingDirectoryResourceTest' => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Factory/Resource/CoalescingDirectoryResourceTest.php',
	'Assetic\Test\Factory\Loader\FunctionCallsFormulaLoaderTest'    => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Factory/Loader/FunctionCallsFormulaLoaderTest.php',
	'Assetic\Test\Factory\Loader\CachedFormulaLoaderTest'           => 'system/modules/Assetic/vendor/assetic/tests/Assetic/Test/Factory/Loader/CachedFormulaLoaderTest.php',

	// DataContainer
	'InfinitySoft\Assetic\DataContainer\AsseticFilter'              => 'system/modules/Assetic/DataContainer/AsseticFilter.php',
	'InfinitySoft\Assetic\DataContainer\AsseticFilterChain'         => 'system/modules/Assetic/DataContainer/AsseticFilterChain.php',

	// Contao
	'InfinitySoft\Assetic\Contao\FilterFactory'                     => 'system/modules/Assetic/Contao/FilterFactory.php',
	'InfinitySoft\Assetic\Contao\AsseticConfigModule'               => 'system/modules/Assetic/Contao/AsseticConfigModule.php',
	'InfinitySoft\Assetic\Contao\AsseticFactory'                    => 'system/modules/Assetic/Contao/AsseticFactory.php',
	'InfinitySoft\Assetic\Contao\DefaultFilterFactory'              => 'system/modules/Assetic/Contao/DefaultFilterFactory.php',

	// Model
	'InfinitySoft\Assetic\Model\FilterModel'                        => 'system/modules/Assetic/Model/FilterModel.php',
	'InfinitySoft\Assetic\Model\FilterChainModel'                   => 'system/modules/Assetic/Model/FilterChainModel.php',
));
