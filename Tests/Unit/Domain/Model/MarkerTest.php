<?php
namespace SD\SdGooglemaps\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author David Schneiderbauer <david.schneiderbauer@dschneiderbauer.me>
 */
class MarkerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SD\SdGooglemaps\Domain\Model\Marker
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \SD\SdGooglemaps\Domain\Model\Marker();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );

    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getBodytextReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getBodytext()
        );

    }

    /**
     * @test
     */
    public function setBodytextForStringSetsBodytext()
    {
        $this->subject->setBodytext('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'bodytext',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getIconReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getIcon()
        );

    }

    /**
     * @test
     */
    public function setIconForFileReferenceSetsIcon()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setIcon($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'icon',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getPositionReturnsInitialValueForCoordinate()
    {
        self::assertEquals(
            null,
            $this->subject->getPosition()
        );

    }

    /**
     * @test
     */
    public function setPositionForCoordinateSetsPosition()
    {
        $positionFixture = new \SD\SdGooglemaps\Domain\Model\Coordinate();
        $this->subject->setPosition($positionFixture);

        self::assertAttributeEquals(
            $positionFixture,
            'position',
            $this->subject
        );

    }
}
