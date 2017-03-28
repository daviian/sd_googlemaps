<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'SD.SdGooglemaps',
            'Gm',
            [
                'Map' => 'show'
            ],
            // non-cacheable actions
            [
                'Map' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    gm {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('sd_googlemaps') . 'Resources/Public/Icons/user_plugin_gm.svg
                        title = LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sd_googlemaps_domain_model_gm
                        description = LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sd_googlemaps_domain_model_gm.description
                        tt_content_defValues {
                            CType = list
                            list_type = sdgooglemaps_gm
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
