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
class Map extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
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
     * @cascade remove
     */
    protected $markers = null;

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
}
