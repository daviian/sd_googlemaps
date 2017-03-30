<?php
namespace SD\SdGooglemaps\Domain\Model\Dto;

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
	 * enableStyling
	 *
	 * @var bool
	 */
	protected $enableStyling = false;

	/**
	 * Fill the properties properly
	 *
	 * @param array $configuration em configuration
	 */
	public function __construct(array $configuration)
	{
		foreach($configuration as $key => $value) {
			if (property_exists(__CLASS__, $key)) {
				$this->$key = $value;
			}
		}
	}

	/**
	 * Returns the enableStyling
	 *
	 * @return bool $enableStyling
	 */
	public function getEnableStyling()
	{
		return $this->enableStyling;
	}
}
