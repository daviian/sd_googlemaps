<?php
namespace SD\SdGooglemaps\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author David Schneiderbauer <david.schneiderbauer@dschneiderbauer.me>
 */
class MapTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SD\SdGooglemaps\Domain\Model\Map
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \SD\SdGooglemaps\Domain\Model\Map();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getCenterReturnsInitialValueForCoordinate()
    {
        self::assertEquals(
            null,
            $this->subject->getCenter()
        );

    }

    /**
     * @test
     */
    public function setCenterForCoordinateSetsCenter()
    {
        $centerFixture = new \SD\SdGooglemaps\Domain\Model\Coordinate();
        $this->subject->setCenter($centerFixture);

        self::assertAttributeEquals(
            $centerFixture,
            'center',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getMarkersReturnsInitialValueForMarker()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getMarkers()
        );

    }

    /**
     * @test
     */
    public function setMarkersForObjectStorageContainingMarkerSetsMarkers()
    {
        $marker = new \SD\SdGooglemaps\Domain\Model\Marker();
        $objectStorageHoldingExactlyOneMarkers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneMarkers->attach($marker);
        $this->subject->setMarkers($objectStorageHoldingExactlyOneMarkers);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneMarkers,
            'markers',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addMarkerToObjectStorageHoldingMarkers()
    {
        $marker = new \SD\SdGooglemaps\Domain\Model\Marker();
        $markersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $markersObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($marker));
        $this->inject($this->subject, 'markers', $markersObjectStorageMock);

        $this->subject->addMarker($marker);
    }

    /**
     * @test
     */
    public function removeMarkerFromObjectStorageHoldingMarkers()
    {
        $marker = new \SD\SdGooglemaps\Domain\Model\Marker();
        $markersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $markersObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($marker));
        $this->inject($this->subject, 'markers', $markersObjectStorageMock);

        $this->subject->removeMarker($marker);

    }
}
