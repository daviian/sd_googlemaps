<?php
namespace SD\SdGooglemaps\Backend\FormDataProvider;

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
 * MapRowInitialize
 */
class MapRowInitialize implements \TYPO3\CMS\Backend\Form\FormDataProviderInterface
{
	/**
	 * emConfiguration
	 *
	 * @var
	 */
	protected $emConfiguration;

	public function __construct()
	{
		$this->emConfiguration = \SD\SdGooglemaps\Utility\EmConfiguration::getSettings();
	}

	/**
	 * @param array $result
	 * @return array
	 */
	public function addData(array $result)
	{
		if ($result['tableName'] !== 'tx_sdgooglemaps_domain_model_map') {
			return $result;
		}

		$result = $this->setStylesField($result);

		return $result;
	}

	/**
	 * Hide Styles if configured
	 *
	 * @param array $result
	 * @return array
	 */
	protected function setStylesField(array $result)
	{
		$recordTypeValue = $result['recordTypeValue'];

		if (!$this->emConfiguration->getEnableStyling()) {
			$showitem = str_replace(', styles', '', $result['processedTca']['palettes']['additional_config']['showitem']);
			$result['processedTca']['palettes']['additional_config']['showitem'] = $showitem;
		}

		return $result;
	}
}
