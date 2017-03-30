<?php
namespace SD\SdGooglemaps\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author David Schneiderbauer <david.schneiderbauer@dschneiderbauer.me>
 */
class StylerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SD\SdGooglemaps\Domain\Model\Styler
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \SD\SdGooglemaps\Domain\Model\Styler();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getStyleOptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStyleOption()
        );

    }

    /**
     * @test
     */
    public function setStyleOptionForStringSetsStyleOption()
    {
        $this->subject->setStyleOption('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'styleOption',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getStringValueReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStringValue()
        );

    }

    /**
     * @test
     */
    public function setStringValueForStringSetsStringValue()
    {
        $this->subject->setStringValue('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'stringValue',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getIntValueReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setIntValueForIntSetsIntValue()
    {
    }
}
