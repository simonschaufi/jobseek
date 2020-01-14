<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'App',
	array(
		'Job' => 'list, show, apply, validate, upload, print, review, reviewApplication, updateApplication, applicantEmail, addComment',

	),
	// non-cacheable actions
	array(
		'Job' => 'apply, validate, upload, print, review, reviewApplication, reviewApplications, updateApplication, applicantEmail, addComment',

	)
);

?>