<?php
return [
	'ctrl' => [
		'title' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_coordinate',
		'label' => 'latitude',
		'label_alt' => 'longitude',
		'label_alt_force' => 1,
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
		'searchFields' => 'latitude,longitude',
		'iconfile' => 'EXT:sd_googlemaps/Resources/Public/Icons/tx_sdgooglemaps_domain_model_coordinate.gif'
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, latitude, longitude',
	],
	'types' => [
		'1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, position_picker, --palette;LLL:EXT:frontend/Resources/Private/Language/locallang_be.xlf:palette.coordinates;coordinates, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
	],
	'palettes' => [
		'coordinates' => [
			'showitem' => 'latitude, longitude',
			'isHiddenPalette' => true
		]
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
				'foreign_table' => 'tx_sdgooglemaps_domain_model_coordinate',
				'foreign_table_where' => 'AND tx_sdgooglemaps_domain_model_coordinate.pid=###CURRENT_PID### AND tx_sdgooglemaps_domain_model_coordinate.sys_language_uid IN (-1,0)',
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

		'position_picker' => [
			'label' => 'LLL:EXDT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_coordinate.position_picker',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'renderType' => 'positionPicker'
			]
		],
		'latitude' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_coordinate.latitude',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'required'
			]
		],
		'longitude' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_coordinate.longitude',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'required'
			]
		],

	],
];
