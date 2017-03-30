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
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );

    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getZoomReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setZoomForIntSetsZoom()
    {
    }

    /**
     * @test
     */
    public function getMapTypeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMapType()
        );

    }

    /**
     * @test
     */
    public function setMapTypeForStringSetsMapType()
    {
        $this->subject->setMapType('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'mapType',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDisableDoubleClickZoomReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getDisableDoubleClickZoom()
        );

    }

    /**
     * @test
     */
    public function setDisableDoubleClickZoomForBoolSetsDisableDoubleClickZoom()
    {
        $this->subject->setDisableDoubleClickZoom(true);

        self::assertAttributeEquals(
            true,
            'disableDoubleClickZoom',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getDraggableReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getDraggable()
        );

    }

    /**
     * @test
     */
    public function setDraggableForBoolSetsDraggable()
    {
        $this->subject->setDraggable(true);

        self::assertAttributeEquals(
            true,
            'draggable',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getScrollwheelReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getScrollwheel()
        );

    }

    /**
     * @test
     */
    public function setScrollwheelForBoolSetsScrollwheel()
    {
        $this->subject->setScrollwheel(true);

        self::assertAttributeEquals(
            true,
            'scrollwheel',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getStreetViewControlReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getStreetViewControl()
        );

    }

    /**
     * @test
     */
    public function setStreetViewControlForBoolSetsStreetViewControl()
    {
        $this->subject->setStreetViewControl(true);

        self::assertAttributeEquals(
            true,
            'streetViewControl',
            $this->subject
        );

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

    /**
     * @test
     */
    public function getStylesReturnsInitialValueForStyle()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getStyles()
        );

    }

    /**
     * @test
     */
    public function setStylesForObjectStorageContainingStyleSetsStyles()
    {
        $style = new \SD\SdGooglemaps\Domain\Model\Style();
        $objectStorageHoldingExactlyOneStyles = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneStyles->attach($style);
        $this->subject->setStyles($objectStorageHoldingExactlyOneStyles);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneStyles,
            'styles',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addStyleToObjectStorageHoldingStyles()
    {
        $style = new \SD\SdGooglemaps\Domain\Model\Style();
        $stylesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $stylesObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($style));
        $this->inject($this->subject, 'styles', $stylesObjectStorageMock);

        $this->subject->addStyle($style);
    }

    /**
     * @test
     */
    public function removeStyleFromObjectStorageHoldingStyles()
    {
        $style = new \SD\SdGooglemaps\Domain\Model\Style();
        $stylesObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $stylesObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($style));
        $this->inject($this->subject, 'styles', $stylesObjectStorageMock);

        $this->subject->removeStyle($style);

    }
}
