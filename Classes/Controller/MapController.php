<?php
namespace SD\SdGooglemaps\Controller;

/***
 *
 * This file is part of the "Google Maps" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 David Schneiderbauer <david.schneiderbauer@dschneiderbauer.me>
 *
 ***/

/**
 * MapController
 */
class MapController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
	/**
	 * mapRepository
	 *
	 * @var \SD\SdGooglemaps\Domain\Repository\MapRepository
	 * @inject
	 */
	protected $mapRepository = null;

	/**
	 * emConfiguration
	 *
	 * @var \SD\SdGooglemaps\Domain\Model\Dto\EmConfiguration
	 */
	protected $emConfiguration = null;

	/**
	 * initialize show action
	 */
	public function initializeShowAction()
	{
		$this->emConfiguration = \SD\SdGooglemaps\Utility\EmConfiguration::getSettings();
	}

	/**
	 * action show
	 *
	 * @return void
	 */
	public function showAction()
	{
		$mapId = $this->settings['map'];
		$map = $this->mapRepository->findByUid($mapId);

		$options = $this->getMapOptions($map);
		$this->renderJsCss($options);

		$this->view->assign('map', $map);
	}

	/**
	 * Retrieve map options
	 *
	 * @param \SD\SdGooglemaps\Domain\Model\Map $map
	 * @return array
	 */
	protected function getMapOptions(\SD\SdGooglemaps\Domain\Model\Map $map)
	{
		$options = json_encode($map);
		$tmpOptions = json_decode($options, true);
		if ($this->emConfiguration->getEnableStyling()) {
			// Merge base settings from typoscript with styles from model
			$tmpOptions['styles'] = $this->mergeStyles($this->settings['styles'], $tmpOptions['styles']);
		} else {
			// Only use base settings from typoscript
			$tmpOptions['styles'] = $this->settings['styles'];
		}

		return [
			'options' => json_encode($tmpOptions),
			'markers' => json_encode($map->getMarkers()->toArray())
		];
	}

	/**
	 * Merges the second styles into the first styles
	 *
	 * @param array $stylesBase
	 * @param array $stylesToMerge
	 * @return array
	 */
	protected function mergeStyles(array $stylesBase, array $stylesToMerge)
	{
		foreach ($stylesToMerge as $style) {
			$merged = false;
			foreach ($stylesBase as $key => $baseStyle) {
				// If no elementType is set set it to the default value 'all'
				if ($baseStyle['elementType'] === null) {
					$baseStyle['elementType'] = 'all';
				}

				// If equal override value
				if ($baseStyle['featureType'] === $style['featureType'] &&
					$baseStyle['elementType'] === $style['elementType']) {

					$stylesBase[$key]['stylers'] = $this->mergeStylers($baseStyle['stylers'], $style['stylers']);
					$merged = true;
					break;
				}
			}

			// If not already merged add value to array
			if (!$merged) {
				$stylesBase[] = $style;
			}
		}

		return $stylesBase;
	}

	/**
	 * Merges the second stylers into the first stylers
	 *
	 * @param array $stylersBase
	 * @param array $stylersToMerge
	 * @return array
	 */
	protected function mergeStylers(array $stylersBase, array $stylersToMerge)
	{
		foreach ($stylersToMerge as $styler) {
			$merged = false;

			// Get key (styleOption)
			reset($styler);
			$styleOption = key($styler);
			foreach ($stylersBase as $key => $baseStyler) {
				// Get key (styleOption)
				reset($baseStyler);
				$baseStyleOption = key($baseStyler);

				// If equal override value
				if ($baseStyleOption === $styleOption) {
					$stylersBase[$key][$baseStyleOption] = $styler[$styleOption];
					$merged = true;
					break;
				}
			}

			// If not already merged add value to array
			if (!$merged) {
				$stylersBase[] = $styler;
			}
		}

		return $stylersBase;
	}

	protected function renderJsCss($options) {
		// Add option variabels for Google Maps
		$pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
		$pageRenderer->addJsInlineCode('sd_googlemaps-options',
			'sdGooglemaps = {};'.
			'sdGooglemaps.options = '. $options['options'] .';'.
			'sdGooglemaps.markers = '. $options['markers'] .';'
		);

		// Add initMap script
		$pageRenderer->addJsFile(
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath(
				$this->request->getControllerExtensionKey()
			) .'Resources/Public/JavaScript/script.js'
		);

		// Add Google Maps Library
		$googleMapsLibrary = $this->settings['googleMapsLibrary'];
		$googleMapsLibrary .= '?callback=initMap';
		if ($this->settings['apiKey']) {
			$googleMapsLibrary .= '&key='. $this->settings['apiKey'];
		}
		$pageRenderer->addJsFooterLibrary('sd_googlemaps-map',
			$googleMapsLibrary, 'text/javascript',
			false, false, '', true, '|', true
		);

		// Add basic style
		$pageRenderer->addCssFile(
			\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath(
				$this->request->getControllerExtensionKey()
			) .'Resources/Public/Css/styles.css'
		);
	}
}
