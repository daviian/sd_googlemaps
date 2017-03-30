<?php
return [
	'ctrl' => [
		'title' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_style',
		'label' => 'feature_type',
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
		'searchFields' => 'feature_type,element_type,stylers',
		'iconfile' => 'EXT:sd_googlemaps/Resources/Public/Icons/tx_sdgooglemaps_domain_model_style.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, feature_type, element_type, stylers',
	],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, feature_type, element_type, stylers, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
				'foreign_table' => 'tx_sdgooglemaps_domain_model_style',
				'foreign_table_where' => 'AND tx_sdgooglemaps_domain_model_style.pid=###CURRENT_PID### AND tx_sdgooglemaps_domain_model_style.sys_language_uid IN (-1,0)',
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
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => [
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime',
				'default' => 0,
			],
		],
		'endtime' => [
			'exclude' => true,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => [
				'type' => 'input',
				'size' => 13,
				'eval' => 'datetime',
				'default' => 0,
				'range' => [
					'upper' => mktime(0, 0, 0, 1, 1, 2038)
				],
			],
		],

		'feature_type' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_style.feature_type',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'eval' => 'trim,required',
				'items' => [
					['All', 'all'],
					['Administrative Areas', '--div--'],
					['All Administrative Areas', 'administrative'],
					['Country', 'administrative.country'],
					['Land Parcel', 'administrative.land_parcel'],
					['Locality', 'administrative.locality'],
					['Neighborhood', 'administrative.neighborhood'],
					['Province', 'administrative.province'],
					['Landscapes', '--div--'],
					['All Landscapes', 'lanscapes'],
					['Man Made', 'lanscapes.man_made'],
					['Natural', 'lanscapes.natural'],
					['Landcover', 'lanscapes.natural.landcover'],
					['Terrain', 'lanscapes.natural.terrain'],
					['POI', '--div--'],
					['All POI', 'poi'],
					['Attractions', 'poi.attactions'],
					['Businesses', 'poi.business'],
					['Government Buildings', 'poi.government'],
					['Medical Services', 'poi.medical'],
					['Parks', 'poi.park'],
					['Places of Worship', 'poi.place_of_worship'],
					['Schools', 'poi.school'],
					['Sport Complexes', 'poi.sports_complex'],
					['Roads', '--div--'],
					['All Roads', 'road'],
					['Arterial', 'road.arterial'],
					['Highways', 'road.highway'],
					['Highways with controlled Access', 'road.highway.controlled_access'],
					['Local', 'road.local'],
					['Transit Stations', '--div--'],
					['All Transit Stations', 'transit'],
					['Lines', 'transit.line'],
					['Stations', 'transit.station'],
					['Airports', 'transit.station.airport'],
					['Bus Stops', 'transit.station.bus'],
					['Rail', 'transit.station.rail'],
					['Water', 'water']
				]
			],
		],
		'element_type' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_style.element_type',
			'config' => [
				'type' => 'input',
				'renderType' => 'selectSingle',
				'eval' => 'trim',
				'items' => [
					['All', 'all'],
					['All Geometric Elements', 'geometry'],
					['Fill of Geometric Elements', 'geometry.fill'],
					['Stroke of Geometric Elements', 'geometry.stroke'],
					['All Labels', 'labels'],
					['Icon', 'labels.icon'],
					['Text', 'labels.text'],
					['Fill of Text', 'labels.text.fill'],
					['Stroke of Text', 'labels.text.stroke']
				]
			],
		],
		'stylers' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_style.stylers',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_sdgooglemaps_domain_model_styler',
				'MM' => 'tx_sdgooglemaps_style_styler_mm',
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
							'table' => 'tx_sdgooglemaps_domain_model_styler',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						],
					],
				],
			],

		],

	],
];
