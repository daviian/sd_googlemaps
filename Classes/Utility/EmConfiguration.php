<?php
namespace SD\SdGooglemaps\Utility;

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
 * EmConfiguration
 */
class EmConfiguration
{
	/**
	 * Parses the extension settings.
	 *
	 * @return \SD\SdGooglemaps\Domain\Model\Dto\EmConfiguration
	 * @throws \Expection If the configuration is invalid.
	 */
	public static function getSettings()
	{
		$configuration = self::parseSettings();
		$settings = new \SD\SdGooglemaps\Domain\Model\Dto\EmConfiguration($configuration);
		return $settings;
	}

	/**
	 * Parse settings and return it as array
	 *
	 * @return array unserialized extconf settings
	 */
	public static function parseSettings()
	{
		$settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['sd_googlemaps']);

		if (!is_array($settings)) {
			$settings = [];
		}
		return $settings;
	}
}
