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

        $this->renderJsCss($map);

        $this->view->assign('map', $map);
    }

    protected function renderJsCss($map) {
        // Add Variables for Google Map
        // Retrieve Map options
        $options = json_encode($map);
        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $pageRenderer->addJsInlineCode('sd_googlemaps-options',
            'sdGooglemaps = {};'.
            'sdGooglemaps.options = '. $options .';'.
            'sdGooglemaps.markers = '. json_encode($map->getMarkers()->toArray()) .';'
        );

        // Add initMap script
        $pageRenderer->addJsFile(
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath(
                $this->request->getControllerExtensionKey()
            ) .'Resources/Public/JavaScript/script.js'
        );

        // Add Google Maps Library
        $googleMapsLibrary = $this->settings['googleMapsLibrary'];
        $googleMapsLibrary .= '?callback=initMap';
        if ($this->settings['apiKey']) {
            $googleMapsLibrary .= '&key='. $this->settings['apiKey'];
        }
        $pageRenderer->addJsFooterLibrary('sd_googlemaps-map',
            $googleMapsLibrary, 'text/javascript',
            false, false, '', true, '|', true
        );

        // Add basic style
        $pageRenderer->addCssFile(
            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::siteRelPath(
                $this->request->getControllerExtensionKey()
            ) .'Resources/Public/Css/styles.css'
        );
    }
}
