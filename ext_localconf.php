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

		// Register dataprovider for initial setup for TCA with extension manager configuration
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['formDataGroup']['tcaDatabaseRecord'][\SD\SdGooglemaps\Backend\FormDataProvider\MapRowInitialize::class] = [
			'depends' => [
				\TYPO3\CMS\Backend\Form\FormDataProvider\InitializeProcessedTca::class,
			],
			'before' => [
				\TYPO3\CMS\Backend\Form\FormDataProvider\TcaColumnsProcessShowitem::class,
			]
		];

		// Register positionPicker renderType
		$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][1491201013] = [
			'nodeName' => 'positionPicker',
			'priority' => 70,
			'class' => \SD\SdGooglemaps\Form\Element\PositionPickerElement::class
		];

	}
);
