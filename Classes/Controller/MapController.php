<?php
namespace SD\SdGooglemaps\Controller;

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
 * MapController
 */
class MapController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * mapRepository
     *
     * @var \SD\SdGooglemaps\Domain\Repository\MapRepository
     * @inject
     */
    protected $mapRepository = null;

    /**
     * action show
     *
     * @return void
     */
    public function showAction()
    {
        $mapId = $this->settings['map'];
        $map = $this->mapRepository->findByUid($mapId);
        $this->view->assign('map', $map);
    }
}
