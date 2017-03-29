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
                title = LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_be.xlf:wizards.gm_plugin
                description = LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_be.xlf:wizards.gm_plugin.description
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
