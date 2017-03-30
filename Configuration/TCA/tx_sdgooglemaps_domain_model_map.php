<?php
return [
	'ctrl' => [
		'title' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_map',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'versioningWS' => true,
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		],
		'searchFields' => 'name,zoom,map_type,disable_double_click_zoom,draggable,scrollwheel,street_view_control,center,markers,styles',
		'iconfile' => 'EXT:sd_googlemaps/Resources/Public/Icons/tx_sdgooglemaps_domain_model_map.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, zoom, map_type, disable_double_click_zoom, draggable, scrollwheel, street_view_control, center, markers, styles',
	],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, --palette--;LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_be.xlf:palette.main_config;main_config, --palette--;LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_be.xlf:palette.additional_config;additional_config, markers, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
	],
	'palettes' => [
		'main_config' => ['showitem' => 'map_type, zoom, --linebreak--, center'],
		'additional_config' => ['showitem' => 'draggable, scrollwheel, disable_double_click_zoom, street_view_control, --linebreak--, styles'],
	],
	'columns' => [
		'sys_language_uid' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'special' => 'languages',
				'items' => [
					[
						'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
						-1,
						'flags-multiple'
					]
				],
				'default' => 0,
			],
		],
		'l10n_parent' => [
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['', 0],
				],
				'foreign_table' => 'tx_sdgooglemaps_domain_model_map',
				'foreign_table_where' => 'AND tx_sdgooglemaps_domain_model_map.pid=###CURRENT_PID### AND tx_sdgooglemaps_domain_model_map.sys_language_uid IN (-1,0)',
			],
		],
		'l10n_diffsource' => [
			'config' => [
				'type' => 'passthrough',
			],
		],
		't3ver_label' => [
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			],
		],
		'hidden' => [
			'exclude' => true,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => [
				'type' => 'check',
				'items' => [
					'1' => [
						'0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
					]
				],
			],
		],
		'starttime' => [
			'exclude' => true,
			'behavior' => [
				'allowLanguageSynchronization' => true,
			],
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'size' => 13,
				'eval' => 'datetime',
				'default' => 0,
			],
		],
		'endtime' => [
			'exclude' => true,
			'behavior' => [
				'allowLanguageSynchronization' => true,
			],
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => [
				'type' => 'input',
				'renderType' => 'inputDateTime',
				'size' => 13,
				'eval' => 'datetime',
				'default' => 0,
				'range' => [
					'upper' => mktime(0, 0, 0, 1, 1, 2038)
				],
			],
		],

		'name' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_map.name',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			],
		],
		'zoom' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_map.zoom',
			'config' => [
				'type' => 'input',
				'size' => 4,
				'eval' => 'trim,int,required',
				'range' => [
					'lower' => 0,
					'upper' => 20,
				],
				'default' => 0,
				'slider' => [
					'step' => 1,
					'width' => 200,
				],
			],
		],
		'map_type' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_map.map_type',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => [
					['Roadmap', 'roadmap'],
					['Hybrid', 'hybrid'],
					['Satellite', 'satellite'],
					['Terrain', 'terrain'],
				],
			],
		],
		'disable_double_click_zoom' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_map.disable_double_click_zoom',
			'config' => [
				'type' => 'check',
				'items' => [
					'1' => [
						'0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
					]
				],
				'default' => 0,
			]
		],
		'draggable' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_map.draggable',
			'config' => [
				'type' => 'check',
				'items' => [
					'1' => [
						'0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
					]
				],
				'default' => 1,
			]
		],
		'scrollwheel' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_map.scrollwheel',
			'config' => [
				'type' => 'check',
				'items' => [
					'1' => [
						'0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
					]
				],
				'default' => 1,
			]
		],
		'street_view_control' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_map.street_view_control',
			'config' => [
				'type' => 'check',
				'items' => [
					'1' => [
						'0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
					]
				],
				'default' => 0,
			]
		],
		'center' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_marker.position',
			'config' => [
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'tx_sdgooglemaps_domain_model_coordinate',
				'size' => 1,
				'minitems' => 0,
				'maxitems' => 1,
				'fieldControl' => [
					'addRecord' => [
						'disabled' => false,
						'pid' => '###CURRENT_PID###',
						'table' => 'tx_sdgooglemaps_domain_model_coordinate',
						'setValue' => 'set'
					],
					'listModule' => [
						'disabled' => false
					]
				],
				'fieldWizard' => [
					'recordsOverview' => [
						'disabled' => true
					],
					'tableList' => [
						'disabled' => true
					]
				]
			],
		],
		'markers' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_map.markers',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_sdgooglemaps_domain_model_marker',
				'MM' => 'tx_sdgooglemaps_map_marker_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => [
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => [
						'module' => [
							'name' => 'wizard_edit',
						],
						'type' => 'popup',
						'title' => 'Edit', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.edit
						'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					],
					'add' => [
						'module' => [
							'name' => 'wizard_add',
						],
						'type' => 'script',
						'title' => 'Create new', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.add
						'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
						'params' => [
							'table' => 'tx_sdgooglemaps_domain_model_marker',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						],
					],
				],
			],

		],
		'styles' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_map.styles',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_sdgooglemaps_domain_model_style',
				'MM' => 'tx_sdgooglemaps_map_style_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => [
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => [
						'module' => [
							'name' => 'wizard_edit',
						],
						'type' => 'popup',
						'title' => 'Edit', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.edit
						'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
					],
					'add' => [
						'module' => [
							'name' => 'wizard_add',
						],
						'type' => 'script',
						'title' => 'Create new', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.add
						'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
						'params' => [
							'table' => 'tx_sdgooglemaps_domain_model_style',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						],
					],
				],
			],

		],

	],
];
