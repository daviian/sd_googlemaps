<?php
namespace SD\SdGooglemaps\Domain\Model;

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
 * Styke
 */
class Style extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity implements \JsonSerializable
{
	/**
	 * featureType
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $featureType = '';

	/**
	 * elementType
	 *
	 * @var string
	 */
	protected $elementType = '';

	/**
	 * stylers
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SD\SdGooglemaps\Domain\Model\Styler>
	 */
	protected $stylers = null;

	/**
	 * __construct
	 */
	public function __construct()
	{
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects()
	{
		$this->stylers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Serialization of object
	 */
	public function jsonSerialize()
	{
		return [
			'featureType' => $this->featureType,
			'elementType' => $this->elementType,
			'stylers' => $this->stylers->toArray()
		];
	}

	/**
	 * Returns the featureType
	 *
	 * @return string $featureType
	 */
	public function getFeatureType()
	{
		return $this->featureType;
	}

	/**
	 * Sets the featureType
	 *
	 * @param string $featureType
	 * @return void
	 */
	public function setFeatureType($featureType)
	{
		$this->featureType = $featureType;
	}

	/**
	 * Returns the elementType
	 *
	 * @return string $elementType
	 */
	public function getElementType()
	{
		return $this->elementType;
	}

	/**
	 * Sets the elementType
	 *
	 * @param string $elementType
	 * @return void
	 */
	public function setElementType($elementType)
	{
		$this->elementType = $elementType;
	}

	/**
	 * Adds a Styler
	 *
	 * @param \SD\SdGooglemaps\Domain\Model\Styler $styler
	 * @return void
	 */
	public function addStyler(\SD\SdGooglemaps\Domain\Model\Styler $styler)
	{
		$this->stylers->attach($styler);
	}

	/**
	 * Removes a Styler
	 *
	 * @param \SD\SdGooglemaps\Domain\Model\Styler $stylerToRemove The Styler to be removed
	 * @return void
	 */
	public function removeStyler(\SD\SdGooglemaps\Domain\Model\Styler $stylerToRemove)
	{
		$this->stylers->detach($stylerToRemove);
	}

	/**
	 * Returns the stylers
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SD\SdGooglemaps\Domain\Model\Styler> $stylers
	 */
	public function getStylers()
	{
		return $this->stylers;
	}

	/**
	 * Sets the stylers
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SD\SdGooglemaps\Domain\Model\Styler> $stylers
	 * @return void
	 */
	public function setStylers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $stylers)
	{
		$this->stylers = $stylers;
	}
}
