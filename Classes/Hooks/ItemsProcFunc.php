<?php
namespace SD\SdGooglemaps\Hooks;

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
 * ItemsProcFunc
 */
class ItemsProcFunc
{
	/**
	 * Modifies the selectbox of style options
	 *
	 * @param array &$config
	 */
	public function user_styleOptions(array &$config)
	{
		switch ($config['row']['type'][0]) {
			case 'string':
				$config['items'] = [
					['Hue', 'hue'],
					['Color', 'color'],
					['Visibility', 'visibility']
				];
				break;
			case 'int':
				$config['items'] = [
					['Lightness', 'lightness'],
					['Weight', 'weight']
				];
				break;
			case 'float':
				$config['items'] = [
					['Saturation', 'saturation'],
					['Gamma', 'gamma']
				];
				break;
			case 'bool':
				$config['items'] = [
					['Invert Lightness', 'invert_lightness']
				];
				break;
			default:
		}
	}
}
