<?php
return [
	'ctrl' => [
		'type' => 'type',
		'title' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_styler',
		'label' => 'style_option',
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
		'searchFields' => 'style_option,string_value,int_value,float_value,bool_value',
		'iconfile' => 'EXT:sd_googlemaps/Resources/Public/Icons/tx_sdgooglemaps_domain_model_styler.gif',
		''
	],
	'interface' => [
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, style_option, string_value, int_value, float_value, bool_value',
	],
	'types' => [
		'0' => ['showitem' => 'type, sys_language_uid, l10n_parent, l10n_diffsource, hidden, style_option, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
		'string' => ['showitem' => 'type, sys_language_uid, l10n_parent, l10n_diffsource, hidden, style_option, string_value, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
		'int' => ['showitem' => 'type, sys_language_uid, l10n_parent, l10n_diffsource, hidden, style_option, int_value, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
		'float' => ['showitem' => 'type, sys_language_uid, l10n_parent, l10n_diffsource, hidden, style_option, float_value, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
		'bool' => ['showitem' => 'type, sys_language_uid, l10n_parent, l10n_diffsource, hidden, style_option, bool_value, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
				'foreign_table' => 'tx_sdgooglemaps_domain_model_styler',
				'foreign_table_where' => 'AND tx_sdgooglemaps_domain_model_styler.pid=###CURRENT_PID### AND tx_sdgooglemaps_domain_model_styler.sys_language_uid IN (-1,0)',
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

		'type' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_styler.type',
			'config' => [
				'type' => 'select',
				'renderType' => 'selectSingle',
				'eval' => 'trim,required',
				'items' => [
					['Default', ''],
					['String', 'string'],
					['Integer', 'int'],
					['Float', 'float'],
					['Boolean', 'bool']
				],
			],
		],
		'style_option' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_styler.style_option',
			'config' => [
				'type' => 'select',
				'eval' => 'trim,required',
				'itemsProcFunc' => 'SD\SdGooglemaps\Hooks\ItemsProcFunc->user_styleOptions'
			],
		],
		'string_value' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_styler.string_value',
			'config' => [
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			],
		],
		'int_value' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_styler.int_value',
			'config' => [
				'type' => 'input',
				'size' => 4,
				'eval' => 'int,required'
			]
		],
		'float_value' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_styler.float_value',
			'config' => [
				'type' => 'input',
				'size' => 4,
				'eval' => 'double2,required'
			]
		],
		'bool_value' => [
			'exclude' => true,
			'label' => 'LLL:EXT:sd_googlemaps/Resources/Private/Language/locallang_db.xlf:tx_sdgooglemaps_domain_model_styler.bool_value',
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

	],
];
