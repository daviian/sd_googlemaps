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
 * Marker
 */
class Marker extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity implements \JsonSerializable
{
	/**
	 * title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title = '';

	/**
	 * bodytext
	 *
	 * @var string
	 */
	protected $bodytext = '';

	/**
	 * icon
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 * @cascade remove
	 */
	protected $icon = null;

	/**
	 * position
	 *
	 * @var \SD\SdGooglemaps\Domain\Model\Coordinate
	 */
	protected $position = null;

	/**
	 * Serialization of object
	 */
	public function jsonSerialize()
	{
		return [
			'title' => $this->title,
			'bodytext' => $this->bodytext,
			'icon' => $this->icon ? $this->icon->getPublicUrl() : '',
			'position' => $this->position
		];
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * Returns the bodytext
	 *
	 * @return string $bodytext
	 */
	public function getBodytext()
	{
		return $this->bodytext;
	}

	/**
	 * Sets the bodytext
	 *
	 * @param string $bodytext
	 * @return void
	 */
	public function setBodytext($bodytext)
	{
		$this->bodytext = $bodytext;
	}

	/**
	 * Returns the position
	 *
	 * @return \SD\SdGooglemaps\Domain\Model\Coordinate $position
	 */
	public function getPosition()
	{
		return $this->position;
	}

	/**
	 * Sets the position
	 *
	 * @param \SD\SdGooglemaps\Domain\Model\Coordinate $position
	 * @return void
	 */
	public function setPosition(\SD\SdGooglemaps\Domain\Model\Coordinate $position)
	{
		$this->position = $position;
	}

	/**
	 * Returns the icon
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference icon
	 */
	public function getIcon()
	{
		return $this->icon;
	}

	/**
	 * Sets the icon
	 *
	 * @param string $icon
	 * @return void
	 */
	public function setIcon($icon)
	{
		$this->icon = $icon;
	}
}
