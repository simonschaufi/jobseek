<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'App',
	'Job application'
);

$pluginSignature = str_replace('_','',$_EXTKEY) . '_app';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
t3lib_extMgm::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForms/Jobseek.xml');






t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Job Listing and Application');


t3lib_extMgm::addLLrefForTCAdescr('tx_jobseek_domain_model_job', 'EXT:jobseek/Resources/Private/Language/locallang_csh_tx_jobseek_domain_model_job.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jobseek_domain_model_job');
$TCA['tx_jobseek_domain_model_job'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_job',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Job.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jobseek_domain_model_job.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jobseek_domain_model_applicant', 'EXT:jobseek/Resources/Private/Language/locallang_csh_tx_jobseek_domain_model_applicant.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jobseek_domain_model_applicant');
$TCA['tx_jobseek_domain_model_applicant'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_applicant',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Applicant.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jobseek_domain_model_applicant.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jobseek_domain_model_employment', 'EXT:jobseek/Resources/Private/Language/locallang_csh_tx_jobseek_domain_model_employment.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jobseek_domain_model_applicant');
$TCA['tx_jobseek_domain_model_employment'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_employment',
		'label' => 'employer',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Employment.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jobseek_domain_model_employment.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jobseek_domain_model_application', 'EXT:jobseek/Resources/Private/Language/locallang_csh_tx_jobseek_domain_model_application.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jobseek_domain_model_application');
$TCA['tx_jobseek_domain_model_application'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_application',
		'label' => 'rating',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Application.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jobseek_domain_model_application.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jobseek_domain_model_subject', 'EXT:jobseek/Resources/Private/Language/locallang_csh_tx_jobseek_domain_model_subject.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jobseek_domain_model_subject');
$TCA['tx_jobseek_domain_model_subject'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_subject',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Subject.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jobseek_domain_model_subject.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jobseek_domain_model_status', 'EXT:jobseek/Resources/Private/Language/locallang_csh_tx_jobseek_domain_model_status.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jobseek_domain_model_status');
$TCA['tx_jobseek_domain_model_status'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_status',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Status.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jobseek_domain_model_status.gif'
	),
);

t3lib_extMgm::addLLrefForTCAdescr('tx_jobseek_domain_model_comment', 'EXT:jobseek/Resources/Private/Language/locallang_csh_tx_jobseek_domain_model_comment.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_jobseek_domain_model_comment');
$TCA['tx_jobseek_domain_model_comment'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:jobseek/Resources/Private/Language/locallang_db.xml:tx_jobseek_domain_model_comment',
		'label' => 'author',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Comment.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_jobseek_domain_model_comment.gif'
	),
);

?>