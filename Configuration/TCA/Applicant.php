<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_jobseek_domain_model_applicant'] = array(
	'ctrl' => $TCA['tx_jobseek_domain_model_applicant']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, address, zip, city, telephone, mobile, email, birthday, image, candidacy_passed, candidacy_year, pedagogic_exam_passed, pedagogic_exam_year, competences, experience, files, main_subject, secondary_subjects, description, employments',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, address, zip, city, telephone, mobile, email, image, birthday, candidacy_passed, candidacy_year, pedagogic_exam_passed, pedagogic_exam_year, competences, experience, files, main_subject, secondary_subjects, description, employments,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
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
				'foreign_table' => 'tx_jobseek_domain_model_applicant',
				'foreign_table_where' => 'AND tx_jobseek_domain_model_applicant.pid=###CURRENT_PID### AND tx_jobseek_domain_model_applicant.sys_language_uid IN (-1,0)',
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
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'address' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.address',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'zip' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.zip',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'city' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.city',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'telephone' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.telephone',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'mobile' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.mobile',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'birthday' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.birthday',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'candidacy_passed' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.candidacy_passed',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'candidacy_year' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.candidacy_year',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'pedagogic_exam_passed' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.pedagogic_exam_passed',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'pedagogic_exam_year' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.pedagogic_exam_year',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'current_employment' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.current_employment',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'current_employment_year' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.current_employment_year',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			),
		),
		'competences' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.competences',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'experience' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.experience',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'files' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.files',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_jobseek',
				'allowed' => '*',
				'disallowed' => 'php',
				'size' => 5,
			),
		),
		'image' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.image',
			'config' => array(
				'type' => 'group',
				'internal_type' => 'file',
				'uploadfolder' => 'uploads/tx_jobseek',
				'allowed' => 'jpg,jpeg,gif,png',
				'size' => 1,
			),
		),
		'main_subject' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.main_subject',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_jobseek_domain_model_subject',
				'minitems' => 0,
				'maxitems' => 1,
				'size' => 1,
			),
		),
		'secondary_subjects' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.secondary_subjects',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'tx_jobseek_domain_model_subject',
				'MM' => 'tx_jobseek_applicant_subject_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'type' => 'popup',
						'title' => 'Edit',
						'script' => 'wizard_edit.php',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_jobseek_domain_model_subject',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
							),
						'script' => 'wizard_add.php',
					),
				),
			),
		),
		'description' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim'
			),
		),
		'employments' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant.employments',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_jobseek_domain_model_employment',
				'foreign_field' => 'applicant',
				'maxitems' => 9999,
				'multiple' => 0,
			),
		),
	),
);
?>