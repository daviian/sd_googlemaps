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
 * Coordinate
 */
class Coordinate extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity implements \JsonSerializable
{
    /**
     * Latitude of coordinate
     *
     * @var float
     * @validate NotEmpty
     */
    protected $latitude = 0.0;

    /**
     * Longitude of coordinate
     *
     * @var float
     * @validate NotEmpty
     */
    protected $longitude = 0.0;

    /**
     * Serialization of object
     */
    public function jsonSerialize()
    {
        return [
            'lat' => $this->latitude,
            'lng' => $this->longitude
        ];
    }

    /**
     * Returns the latitude
     *
     * @return float $latitude
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the latitude
     *
     * @param float $latitude
     * @return void
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * Returns the longitude
     *
     * @return float $longitude
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the longitude
     *
     * @param float $longitude
     * @return void
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }
}
