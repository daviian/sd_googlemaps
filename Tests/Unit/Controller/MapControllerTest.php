<?php
namespace SD\SdGooglemaps\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author David Schneiderbauer <david.schneiderbauer@dschneiderbauer.me>
 */
class MapControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \SD\SdGooglemaps\Controller\MapController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\SD\SdGooglemaps\Controller\MapController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMapToView()
    {
        $map = new \SD\SdGooglemaps\Domain\Model\Map();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('map', $map);

        $this->subject->showAction($map);
    }
}
