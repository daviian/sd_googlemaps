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
 * Styler
 */
class Styler extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity implements \JsonSerializable
{
	/**
	 * type
	 *
	 * @var string
	 */
	protected $type = '';

	/**
	 * styleOption
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $styleOption = '';

	/**
	 * stringValue
	 *
	 * @var string
	 */
	protected $stringValue = '';

	/**
	 * intValue
	 *
	 * @var int
	 */
	protected $intValue = 0;

	/**
	 * floatValue
	 *
	 * @var float
	 */
	protected $floatValue = 0.0;

	/**
	 * boolValue
	 *
	 * @var bool
	 */
	protected $boolValue = false;

	/**
	 * Serialization of object
	 */
	public function jsonSerialize()
	{
		switch ($this->type) {
			case 'string':
				$value = $this->stringValue;
				break;
			case 'int':
				$value = $this->intValue;
				break;
			case 'float':
				$value = $this->floatValue;
				break;
			case 'bool':
				$value = $this->boolValue;
				break;
			default:
				$value = '';
		}
		return [
			$this->styleOption => $value
		];
	}

	/**
	 * Returns the type
	 *
	 * @return string $type
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * Sets the type
	 *
	 * @param string $type
	 * @return void
	 */
	public function setType($type)
	{
		$this->type = $type;
	}

	/**
	 * Returns the styleOption
	 *
	 * @return string $styleOption
	 */
	public function getStyleOption()
	{
		return $this->styleOption;
	}

	/**
	 * Sets the styleOption
	 *
	 * @param string $styleOption
	 * @return void
	 */
	public function setStyleOption($styleOption)
	{
		$this->styleOption = $styleOption;
	}

	/**
	 * Returns the stringValue
	 *
	 * @return string $stringValue
	 */
	public function getStringValue()
	{
		return $this->stringValue;
	}

	/**
	 * Sets the stringValue
	 *
	 * @param string $stringValue
	 * @return void
	 */
	public function setStringValue($stringValue)
	{
		$this->stringValue = $stringValue;
	}

	/**
	 * Returns the intValue
	 *
	 * @return int $intValue
	 */
	public function getIntValue()
	{
		return $this->intValue;
	}

	/**
	 * Sets the intValue
	 *
	 * @param string $intValue
	 * @return void
	 */
	public function setIntValue($intValue)
	{
		$this->intValue = $intValue;
	}

	/**
	 * Returns the floatValue
	 *
	 * @return int $floatValue
	 */
	public function getFloatValue()
	{
		return $this->floatValue;
	}

	/**
	 * Sets the floatValue
	 *
	 * @param string $floatValue
	 * @return void
	 */
	public function setFloatValue($floatValue)
	{
		$this->floatValue = $floatValue;
	}

	/**
	 * Returns the boolValue
	 *
	 * @return int $boolValue
	 */
	public function getBoolValue()
	{
		return $this->boolValue;
	}

	/**
	 * Sets the boolValue
	 *
	 * @param string $boolValue
	 * @return void
	 */
	public function setBoolValue($boolValue)
	{
		$this->boolValue = $boolValue;
	}

	/**
	 * Returns the boolean state of boolValue
	 *
	 * @return bool
	 */
	public function isBoolValue()
	{
		return $this->boolValue;
	}
}
