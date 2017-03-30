<?php
namespace SD\SdGooglemaps\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author David Schneiderbauer <david.schneiderbauer@dschneiderbauer.me>
 */
class StyleTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SD\SdGooglemaps\Domain\Model\Style
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \SD\SdGooglemaps\Domain\Model\Style();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getFeatureTypeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getFeatureType()
        );

    }

    /**
     * @test
     */
    public function setFeatureTypeForStringSetsFeatureType()
    {
        $this->subject->setFeatureType('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'featureType',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getElementTypeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getElementType()
        );

    }

    /**
     * @test
     */
    public function setElementTypeForStringSetsElementType()
    {
        $this->subject->setElementType('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'elementType',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getStylersReturnsInitialValueForStyler()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getStylers()
        );

    }

    /**
     * @test
     */
    public function setStylersForObjectStorageContainingStylerSetsStylers()
    {
        $styler = new \SD\SdGooglemaps\Domain\Model\Styler();
        $objectStorageHoldingExactlyOneStylers = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneStylers->attach($styler);
        $this->subject->setStylers($objectStorageHoldingExactlyOneStylers);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneStylers,
            'stylers',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function addStylerToObjectStorageHoldingStylers()
    {
        $styler = new \SD\SdGooglemaps\Domain\Model\Styler();
        $stylersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $stylersObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($styler));
        $this->inject($this->subject, 'stylers', $stylersObjectStorageMock);

        $this->subject->addStyler($styler);
    }

    /**
     * @test
     */
    public function removeStylerFromObjectStorageHoldingStylers()
    {
        $styler = new \SD\SdGooglemaps\Domain\Model\Styler();
        $stylersObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $stylersObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($styler));
        $this->inject($this->subject, 'stylers', $stylersObjectStorageMock);

        $this->subject->removeStyler($styler);

    }
}
