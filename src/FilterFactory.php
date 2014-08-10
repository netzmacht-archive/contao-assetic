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

namespace Bit3\Contao\Assetic;

use Assetic\Filter\CoffeeScriptFilter;
use Assetic\Filter\CompassFilter;
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
use Bit3\Contao\Assetic\Event\CreateFilterEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FilterFactory implements EventSubscriberInterface
{
	/**
	 * {@inheritdoc}
	 */
	public static function getSubscribedEvents()
	{
		return array(
			AsseticEvents::CREATE_FILTER => array(
				array('createCssEmbedFilter'),
				array('createCssImportFilter'),
				array('createCssMinFilter'),
				array('createCssRewriteFilter'),
				array('createClosureApiFilter'),
				array('createClosureJarFilter'),
				array('createCoffeeFilter'),
				array('createCompassFilter'),
				array('createDartFilter'),
				array('createGssFilter'),
				array('createHandlebarsFilter'),
				array('createJsMinFilter'),
				array('createJsMinPlusFilter'),
				array('createLessFilter'),
				array('createLessPhpFilter'),
				array('createPackagerFilter'),
				array('createPackerFilter'),
				array('createPhpCssEmbedFilter'),
				array('createSassFilter'),
				array('createScssFilter'),
				array('createScssPhpFilter'),
				array('createStylusFilter'),
				array('createUglifyCssFilter'),
				array('createUglifyJsFilter'),
				array('createYuiCssFilter'),
				array('createYuiJsFilter'),
			),
		);
	}

	public function createCssEmbedFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'cssEmbed') {
			return;
		}

		if ($configuration['javaPath']) {
			$filter = new CssEmbedFilter($configuration['cssEmbedPath'], $configuration['javaPath']);
		}
		else {
			$filter = new CssEmbedFilter($configuration['cssEmbedPath']);
		}

		$event->setFilter($filter);
	}

	public function createCssImportFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'cssImport') {
			return;
		}

		$importFilter = null;

		if ($configuration['importFilter']) {
			/** @var AsseticFactory $factory */
			$factory = $GLOBALS['container']['assetic.factory'];

			if (preg_match('#filter:(\d+)#', $configuration['importFilter'], $match)) {
				$importFilter = $factory->createFilterById($match[1]);
			}
			else if (preg_match('#chain:(\d+)#', $configuration['importFilter'], $match)) {
				$importFilter = $factory->createFilterChainById($match[1]);
			}
		}

		$filter = new CssImportFilter($importFilter);

		$event->setFilter($filter);
	}

	public function createCssMinFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'cssMin') {
			return;
		}

		$filter = new CssMinFilter();

		$event->setFilter($filter);
	}

	public function createCssRewriteFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'cssRewrite') {
			return;
		}

		$filter = new CssRewriteFilter();

		$event->setFilter($filter);
	}

	public function createClosureApiFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'closureApi') {
			return;
		}

		$filter = new CompilerApiFilter();

		$event->setFilter($filter);
	}

	public function createClosureJarFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'closureJar') {
			return;
		}

		if ($configuration['javaPath']) {
			$filter = new CompilerJarFilter($configuration['closurePath'], $configuration['javaPath']);
		}
		else {
			$filter = new CompilerJarFilter($configuration['closurePath']);
		}

		$event->setFilter($filter);
	}

	public function createCoffeeFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'coffee') {
			return;
		}

		if ($configuration['coffeePath'] && $configuration['nodePath']) {
			$filter = new CoffeeScriptFilter($configuration['coffeePath'], $configuration['nodePath']);
		}
		else if ($configuration['coffeePath']) {
			$filter = new CoffeeScriptFilter($configuration['coffeePath']);
		}
		else {
			$filter = new CoffeeScriptFilter();
		}

		$event->setFilter($filter);
	}

	public function createCompassFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'compass') {
			return;
		}

		if ($configuration['compassPath'] && $configuration['rubyPath']) {
			$filter = new CompassFilter($configuration['compassPath'], $configuration['rubyPath']);
		}
		else if ($configuration['compassPath']) {
			$filter = new CompassFilter($configuration['compassPath']);
		}
		else {
			$filter = new CompassFilter();
		}

		if (method_exists($filter, 'setDefaultEncoding')) {
			$filter->setDefaultEncoding('utf-8');
		}
		if (method_exists($filter, 'setExternalEncoding')) {
			$filter->setExternalEncoding('utf-8');
		}

		$filter->setImagesDir(TL_ROOT);
		$filter->setFontsDir(TL_ROOT);
		$filter->setJavascriptsDir(TL_ROOT);

		// $filter->setGeneratedImagesPath(TL_ROOT . '/assets/images');
		$filter->setGeneratedImagesPath(TL_ROOT . '/');

		$filter->setHttpPath('/' . \Environment::get('path') . 'assets/images/');
		$filter->setHttpImagesPath('/' . \Environment::get('path') . 'assets/images/');
		$filter->setHttpFontsPath('/' . \Environment::get('path') . 'assets/fonts/');
		$filter->setHttpJavascriptsPath('/' . \Environment::get('path') . 'assets/js/');
		// $filter->setHttpGeneratedImagesPath('/' . \Environment::get('path') . 'assets/images/');
		$filter->setHttpGeneratedImagesPath('/' . \Environment::get('path'));

		if (method_exists($filter, 'setRelativeAssets')) {
			$filter->setRelativeAssets(true);
		}

		$event->setFilter($filter);
	}

	public function createDartFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'dart') {
			return;
		}

		if ($configuration['dartPath']) {
			$filter = new DartFilter($configuration['dartPath']);
		}
		else {
			$filter = new DartFilter();
		}

		$event->setFilter($filter);
	}

	public function createGssFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'gss') {
			return;
		}

		if ($configuration['javaPath']) {
			$filter = new GssFilter($configuration['gssPath'], $configuration['javaPath']);
		}
		else {
			$filter = new GssFilter($configuration['gssPath']);
		}

		$event->setFilter($filter);
	}

	public function createHandlebarsFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'handlebars') {
			return;
		}

		if ($configuration['handlebarsPath'] && $configuration['nodePath']) {
			$filter = new HandlebarsFilter($configuration['handlebarsPath'], $configuration['nodePath']);
		}
		else if ($configuration['handlebarsPath']) {
			$filter = new HandlebarsFilter($configuration['handlebarsPath']);
		}
		else {
			$filter = new HandlebarsFilter();
		}

		$event->setFilter($filter);
	}

	public function createJsMinFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'jsMin') {
			return;
		}

		$filter = new JSMinFilter();

		$event->setFilter($filter);
	}

	public function createJsMinPlusFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'jsMinPlus') {
			return;
		}

		$filter = new JSMinPlusFilter();

		$event->setFilter($filter);
	}

	public function createLessFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'less') {
			return;
		}

		if ($configuration['nodePath']) {
			$filter = new LessFilter($configuration['nodePath']);
		}
		else {
			$filter = new LessFilter();
		}

		$paths = deserialize($configuration['nodePaths']);
		if (is_array($paths) && count($paths)) {
			$temp = array();
			foreach ($paths as $path) {
				$temp[] = $path['path'];
			}
			$filter->setNodePaths($temp);
		}

		$event->setFilter($filter);
	}

	public function createLessPhpFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'lessphp') {
			return;
		}

		$filter = new LessphpFilter();

		$event->setFilter($filter);
	}

	public function createPackagerFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'packager') {
			return;
		}

		$filter = new PackagerFilter();

		$event->setFilter($filter);
	}

	public function createPackerFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'packer') {
			return;
		}

		$filter = new PackerFilter();

		$event->setFilter($filter);
	}

	public function createPhpCssEmbedFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'phpCssEmbed') {
			return;
		}

		$filter = new PhpCssEmbedFilter();

		$event->setFilter($filter);
	}

	public function createSassFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'sass') {
			return;
		}

		if ($configuration['sassPath'] && $configuration['rubyPath']) {
			$filter = new SassFilter($configuration['sassPath'], $configuration['rubyPath']);
		}
		else if ($configuration['sassPath']) {
			$filter = new SassFilter($configuration['sassPath']);
		}
		else {
			$filter = new SassFilter();
		}

		$event->setFilter($filter);
	}

	public function createScssFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'scss') {
			return;
		}

		if ($configuration['sassPath'] && $configuration['rubyPath']) {
			$filter = new ScssFilter($configuration['sassPath'], $configuration['rubyPath']);
		}
		else if ($configuration['sassPath']) {
			$filter = new ScssFilter($configuration['sassPath']);
		}
		else {
			$filter = new ScssFilter();
		}

		$event->setFilter($filter);
	}

	public function createScssPhpFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'scssphp') {
			return;
		}

		$filter = new ScssphpFilter();

		$event->setFilter($filter);
	}

	public function createStylusFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'stylus') {
			return;
		}

		if ($configuration['nodePath']) {
			$filter = new StylusFilter($configuration['nodePath']);
		}
		else {
			$filter = new StylusFilter();
		}

		$paths = deserialize($configuration['nodePaths']);
		if (is_array($paths) && count($paths)) {
			$temp = array();
			foreach ($paths as $path) {
				$temp[] = $path['path'];
			}
			$filter->setNodePaths($temp);
		}

		$event->setFilter($filter);
	}

	public function createUglifyCssFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'uglifyCss') {
			return;
		}

		if ($configuration['nodePath']) {
			$filter = new UglifyCssFilter($configuration['uglifyCssPath'], $configuration['nodePath']);
		}
		else {
			$filter = new UglifyCssFilter($configuration['uglifyCssPath']);
		}

		$event->setFilter($filter);
	}

	public function createUglifyJsFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'uglifyJs') {
			return;
		}

		if ($configuration['nodePath']) {
			$filter = new UglifyJsFilter($configuration['uglifyJsPath'], $configuration['nodePath']);
		}
		else {
			$filter = new UglifyJsFilter($configuration['uglifyJsPath']);
		}

		$event->setFilter($filter);
	}

	public function createYuiCssFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'yuiCss') {
			return;
		}

		if ($configuration['javaPath']) {
			$filter = new CssCompressorFilter($configuration['yuiPath'], $configuration['javaPath']);
		}
		else {
			$filter = new CssCompressorFilter($configuration['yuiPath']);
		}

		$event->setFilter($filter);
	}

	public function createYuiJsFilter(CreateFilterEvent $event)
	{
		// filter is already created
		if ($event->getFilter()) {
			return;
		}

		$configuration = $event->getConfiguration();

		// skip other filter types
		if ($configuration['type'] != 'yuiJs') {
			return;
		}

		if ($configuration['javaPath']) {
			$filter = new JsCompressorFilter($configuration['yuiPath'], $configuration['javaPath']);
		}
		else {
			$filter = new JsCompressorFilter($configuration['yuiPath']);
		}

		$event->setFilter($filter);
	}
}
