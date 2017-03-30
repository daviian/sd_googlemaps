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
 * Map
 */
class Map extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity implements \JsonSerializable
{
	/**
	 * name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name = '';

	/**
	 * zoom
	 *
	 * @var int
	 */
	protected $zoom = 0;

	/**
	 * mapType
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $mapType = '';

	/**
	 * disableDoubleClickZoom
	 *
	 * @var bool
	 */
	protected $disableDoubleClickZoom = false;

	/**
	 * draggable
	 *
	 * @var bool
	 */
	protected $draggable = true;

	/**
	 * scrollwheel
	 *
	 * @var bool
	 */
	protected $scrollwheel = true;

	/**
	 * streetViewControl
	 *
	 * @var bool
	 */
	protected $streetViewControl = false;

	/**
	 * center
	 *
	 * @var \SD\SdGooglemaps\Domain\Model\Coordinate
	 */
	protected $center = null;

	/**
	 * markers
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SD\SdGooglemaps\Domain\Model\Marker>
	 */
	protected $markers = null;

	/**
	 * styles
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SD\SdGooglemaps\Domain\Model\Style>
	 */
	protected $styles = null;

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
		$this->markers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->styles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Serialization of object
	 */
	public function jsonSerialize()
	{
		return [
			'center' => $this->center,
			'zoom' => $this->zoom,
			'maxZoom' => $this->zoom,
			'mapTypeId' => $this->mapType,
			'disableDoubleClickZoom' => $this->disableDoubleClickZoom,
			'draggable' => $this->draggable,
			'scrollwheel' => $this->scrollwheel,
			'streetViewControl' => $this->streetViewControl,
			'styles' => $this->styles->toArray()
		];
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * Returns the center
	 *
	 * @return \SD\SdGooglemaps\Domain\Model\Coordinate $center
	 */
	public function getCenter()
	{
		return $this->center;
	}

	/**
	 * Sets the center
	 *
	 * @param \SD\SdGooglemaps\Domain\Model\Coordinate $center
	 * @return void
	 */
	public function setCenter(\SD\SdGooglemaps\Domain\Model\Coordinate $center)
	{
		$this->center = $center;
	}

	/**
	 * Returns the zoom
	 *
	 * @return integer $zoom
	 */
	public function getZoom()
	{
		return $this->zoom;
	}

	/**
	 * Sets the zoom
	 *
	 * @param integer $zoom
	 * @return void
	 */
	public function setZoom($zoom)
	{
		$this->zoom = $zoom;
	}

	/**
	 * Adds a Marker
	 *
	 * @param \SD\SdGooglemaps\Domain\Model\Marker $marker
	 * @return void
	 */
	public function addMarker(\SD\SdGooglemaps\Domain\Model\Marker $marker)
	{
		$this->markers->attach($marker);
	}

	/**
	 * Removes a Marker
	 *
	 * @param \SD\SdGooglemaps\Domain\Model\Marker $markerToRemove The Marker to be removed
	 * @return void
	 */
	public function removeMarker(\SD\SdGooglemaps\Domain\Model\Marker $markerToRemove)
	{
		$this->markers->detach($markerToRemove);
	}

	/**
	 * Returns the markers
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SD\SdGooglemaps\Domain\Model\Marker> $markers
	 */
	public function getMarkers()
	{
		return $this->markers;
	}

	/**
	 * Sets the markers
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SD\SdGooglemaps\Domain\Model\Marker> $markers
	 * @return void
	 */
	public function setMarkers(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $markers)
	{
		$this->markers = $markers;
	}

	/**
	 * Returns the mapType
	 *
	 * @return string $mapType
	 */
	public function getMapType()
	{
		return $this->mapType;
	}

	/**
	 * Sets the mapType
	 *
	 * @param string $mapType
	 * @return void
	 */
	public function setMapType($mapType)
	{
		$this->mapType = $mapType;
	}

	/**
	 * Returns the disableDoubleClickZoom
	 *
	 * @return bool $disableDoubleClickZoom
	 */
	public function getDisableDoubleClickZoom()
	{
		return $this->disableDoubleClickZoom;
	}

	/**
	 * Sets the disableDoubleClickZoom
	 *
	 * @param bool $disableDoubleClickZoom
	 * @return void
	 */
	public function setDisableDoubleClickZoom($disableDoubleClickZoom)
	{
		$this->disableDoubleClickZoom = $disableDoubleClickZoom;
	}

	/**
	 * Returns the boolean state of disableDoubleClickZoom
	 *
	 * @return bool
	 */
	public function isDisableDoubleClickZoom()
	{
		return $this->disableDoubleClickZoom;
	}

	/**
	 * Returns the draggable
	 *
	 * @return bool $draggable
	 */
	public function getDraggable()
	{
		return $this->draggable;
	}

	/**
	 * Sets the draggable
	 *
	 * @param bool $draggable
	 * @return void
	 */
	public function setDraggable($draggable)
	{
		$this->draggable = $draggable;
	}

	/**
	 * Returns the boolean state of draggable
	 *
	 * @return bool
	 */
	public function isDraggable()
	{
		return $this->draggable;
	}

	/**
	 * Returns the scrollwheel
	 *
	 * @return bool $scrollwheel
	 */
	public function getScrollwheel()
	{
		return $this->scrollwheel;
	}

	/**
	 * Sets the scrollwheel
	 *
	 * @param bool $scrollwheel
	 * @return void
	 */
	public function setScrollwheel($scrollwheel)
	{
		$this->scrollwheel = $scrollwheel;
	}

	/**
	 * Returns the boolean state of scrollwheel
	 *
	 * @return bool
	 */
	public function isScrollwheel()
	{
		return $this->scrollwheel;
	}

	/**
	 * Returns the streetViewControl
	 *
	 * @return bool $streetViewControl
	 */
	public function getStreetViewControl()
	{
		return $this->streetViewControl;
	}

	/**
	 * Sets the streetViewControl
	 *
	 * @param bool $streetViewControl
	 * @return void
	 */
	public function setStreetViewControl($streetViewControl)
	{
		$this->streetViewControl = $streetViewControl;
	}

	/**
	 * Returns the boolean state of streetViewControl
	 *
	 * @return bool
	 */
	public function isStreetViewControl()
	{
		return $this->streetViewControl;
	}

	/**
	 * Adds a Style
	 *
	 * @param \SD\SdGooglemaps\Domain\Model\Style $style
	 * @return void
	 */
	public function addStyle(\SD\SdGooglemaps\Domain\Model\Style $style)
	{
		$this->styles->attach($style);
	}

	/**
	 * Removes a Style
	 *
	 * @param \SD\SdGooglemaps\Domain\Model\Style $styleToRemove The Style to be removed
	 * @return void
	 */
	public function removeStyle(\SD\SdGooglemaps\Domain\Model\Style $styleToRemove)
	{
		$this->styles->detach($styleToRemove);
	}

	/**
	 * Returns the styles
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SD\SdGooglemaps\Domain\Model\Style> $styles
	 */
	public function getStyles()
	{
		return $this->styles;
	}

	/**
	 * Sets the styles
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\SD\SdGooglemaps\Domain\Model\Style> $styles
	 * @return void
	 */
	public function setStyles(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $styles)
	{
		$this->styles = $styles;
	}
}
