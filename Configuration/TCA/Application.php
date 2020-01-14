<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_jobseek_domain_model_application'] = array(
	'ctrl' => $TCA['tx_jobseek_domain_model_application']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, rating, review_round, received, applicant, status, notes, comments',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, rating, review_round, received, applicant, status, notes, comments,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_jobseek_domain_model_application',
				'foreign_table_where' => 'AND tx_jobseek_domain_model_application.pid=###CURRENT_PID### AND tx_jobseek_domain_model_application.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'rating' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_application.rating',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'review_round' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_application.review_round',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'received' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_application.received',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'applicant' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_application.applicant',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_jobseek_domain_model_applicant',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'status' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_application.status',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_jobseek_domain_model_status',
				'minitems' => 0,
				'maxitems' => 1,
				'size' => 1
			),
		),
		'notes' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_application.notes',
			'config' => array(
				'type' => 'text',
			),
		),
		'job' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		'comments' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_application.comments',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_jobseek_domain_model_comment',
				'foreign_field' => 'application',
				'minitems' => 0,
				'maxitems' => 1000,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
	),
);
?>