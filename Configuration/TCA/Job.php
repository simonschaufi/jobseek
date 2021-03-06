<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_jobseek_domain_model_job'] = array(
	'ctrl' => $TCA['tx_jobseek_domain_model_job']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, subtitle, description, deadline, receipt_page, groups, applications',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, subtitle, description;;;richtext[cut|copy|paste|bold|orderedlist|unorderedlist]:rte_transform[mode=ts_css], deadline, receipt_page, groups, applications,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_jobseek_domain_model_job',
				'foreign_table_where' => 'AND tx_jobseek_domain_model_job.pid=###CURRENT_PID### AND tx_jobseek_domain_model_job.sys_language_uid IN (-1,0)',
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
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_job.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_job.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'subtitle' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_job.subtitle',
			"defaultExtras" => "richtext[cut|copy|paste|bold|orderedlist|unorderedlist]:rte_transform[flag=rte_enabled|mode=ts_css]",
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_job.description',
			"defaultExtras" => "richtext[cut|copy|paste|bold|orderedlist|unorderedlist]:rte_transform[flag=rte_enabled|mode=ts_css]",
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'deadline' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_job.deadline',
			'config' => array(
				'type' => 'input',
				'size' => 12,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 1,
				'default' => time()
			),
		),
		'receipt_page' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_job.receipt_page',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'pages',
				'foreign_table' => 'pages',
				'size' => 1,
			),
		),
		'applications' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_job.applications',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_jobseek_domain_model_application',
				'foreign_field' => 'job',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapse' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'groups' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_job.groups',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'db',
				'allowed' => 'fe_groups',
				'foreign_table' => 'fe_groups',
				'MM' => 'tx_jobseek_job_group_mm',
				'maxitems'      => 9999,
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