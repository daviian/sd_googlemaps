<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'SD.SdGooglemaps',
            'Gm',
            'Google Maps'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('sd_googlemaps', 'Configuration/TypoScript', 'Google Maps');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdgooglemaps_domain_model_marker');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_sdgooglemaps_domain_model_map', 'EXT:sd_googlemaps/Resources/Private/Language/locallang_csh_tx_sdgooglemaps_domain_model_map.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdgooglemaps_domain_model_map');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_sdgooglemaps_domain_model_coordinate');

        // Add Flexform
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['sdgooglemaps_gm']='pi_flexform';
        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['sdgooglemaps_gm']='recursive,pages';
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('sdgooglemaps_gm', 'FILE:EXT:sd_googlemaps/Configuration/FlexForms/flexform_gm.xml');
    }
);
