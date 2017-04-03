<?php
namespace SD\SdGooglemaps\Form\Element;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

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
 * PositionPickerElement
 */
class PositionPickerElement extends \TYPO3\CMS\Backend\Form\Element\AbstractFormElement
{
	public function render()
	{
		$resultArray = $this->initializeResultArray();
		$this->init();

		$objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
		$configurationManager = $objectManager->get('TYPO3\CMS\Extbase\Configuration\ConfigurationManager');

		$settings = $configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT);
		$googleMapsLibrary = $settings['plugin.']['tx_sdgooglemaps_gm.']['settings.']['googleMapsLibrary'];
		$apiKey = $settings['plugin.']['tx_sdgooglemaps_gm.']['settings.']['apiKey'];

		if ($apiKey) {
			$googleMapsLibrary .= '?key='. $apiKey;
		}

		$center = $settings['plugin.']['tx_sdgooglemaps_gm.']['settings.']['backend.']['center'];
		$zoom = $settings['plugin.']['tx_sdgooglemaps_gm.']['settings.']['backend.']['zoom'];

		$html = [];
		$html[] = '<div id="map"';
		$html[] =       ' data-library="'. $googleMapsLibrary .'"';
		$html[] =       ' data-center="'. json_encode($center) .'"';
		$html[] =       ' data-zoom="'. json_encode($zoom) .'"';
		$html[] =       ' style="height: 400px;"';
		$html[] = '></div>';

		$resultArray['html'] = implode('', $html);
		$resultArray['requireJsModules'][] = 'TYPO3/CMS/SdGooglemaps/GoogleMapsPicker';
		return $resultArray;
	}

	/**
	 * Initialize google maps from existing coordinates
	 */
	protected function init()
	{

	}
}
