<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2011 Claus Due <claus@wildside.dk>, Wildside A/S
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 *
 *
 * @package jobseek
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 *
 */
class Tx_Jobseek_Controller_JobController extends Tx_Fed_MVC_Controller_AbstractController {

	/**
	 * @var Tx_Jobseek_Domain_Repository_JobRepository
	 */
	protected $jobRepository;

	/**
	 * @var Tx_Jobseek_Domain_Repository_SubjectRepository
	 */
	protected $subjectRepository;

	/**
	 * @var Tx_Jobseek_Domain_Repository_ApplicantRepository
	 */
	protected $applicantRepository;

	/**
	 * @var Tx_Jobseek_Domain_Repository_ApplicationRepository
	 */
	protected $applicationRepository;

	/**
	 * @var Tx_Jobseek_Domain_Repository_StatusRepository
	 */
	protected $statusRepository;

	/**
	 * @var Tx_Jobseek_Domain_Repository_CommentRepository
	 */
	protected $commentRepository;

	/**
	 * @param Tx_Jobseek_Domain_Repository_JobRepository $jobRepository
	 */
	public function injectJobRepository(Tx_Jobseek_Domain_Repository_JobRepository $jobRepository) {
		$this->jobRepository = $jobRepository;
	}

	/**
	 * @param Tx_Jobseek_Domain_Repository_SubjectRepository $subjectRepository
	 */
	public function injectSubjectRepository(Tx_Jobseek_Domain_Repository_SubjectRepository $subjectRepository) {
		$this->subjectRepository = $subjectRepository;
	}

	/**
	 * @param Tx_Jobseek_Domain_Repository_ApplicantRepository $applicantRepository
	 */
	public function injectApplicantRepository(Tx_Jobseek_Domain_Repository_ApplicantRepository $applicantRepository) {
		$this->applicantRepository = $applicantRepository;
	}

	/**
	 * @param Tx_Jobseek_Domain_Repository_ApplicationRepository $applicationRepository
	 */
	public function injectApplicationRepository(Tx_Jobseek_Domain_Repository_ApplicationRepository $applicationRepository) {
		$this->applicationRepository = $applicationRepository;
	}

	/**
	 * @param Tx_Jobseek_Domain_Repository_StatusRepository $statusRepository
	 */
	public function injectStatusRepository(Tx_Jobseek_Domain_Repository_StatusRepository $statusRepository) {
		$this->statusRepository = $statusRepository;
	}

	/**
	 * @param Tx_Jobseek_Domain_Repository_CommentRepository $commentRepository
	 */
	public function injectCommentRepository(Tx_Jobseek_Domain_Repository_CommentRepository $commentRepository) {
		$this->commentRepository = $commentRepository;
	}

	/**
	 * @return void
	 */
	public function listAction() {
		$jobs = $this->jobRepository->findAll();
		$this->view->assign('jobs', $jobs);
	}

	/**
	 * @param $job
	 * @return void
	 */
	public function showAction(Tx_Jobseek_Domain_Model_Job $job) {
		$this->view->assign('job', $job);
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Job $job
	 * @param Tx_Jobseek_Domain_Model_Applicant $applicant
	 * @param array $secondarySubjects
	 * @dontvalidate $applicant
	 */
	public function applyAction(
			Tx_Jobseek_Domain_Model_Job $job,
			Tx_Jobseek_Domain_Model_Applicant $applicant=NULL,
			$secondarySubjects=array()) {
		if ($applicant === NULL) {
			$applicant = $this->objectManager->get('Tx_Jobseek_Domain_Model_Applicant');
		}
		if (!$secondarySubjects || count($secondarySubjects) == 0) {
			$secondarySubjects = array_fill(0, $this->settings['application']['form']['numberOfSecondarySubjects'], 0);
		}
		$this->view->assign('job', $job);
		$this->view->assign('subjects', $this->subjectRepository->findAll());
		$this->view->assign('secondarySubjects', $secondarySubjects);
		$this->view->assign('applicant', $applicant);
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Job $job
	 * @param Tx_Jobseek_Domain_Model_Applicant $applicant
	 * @param array $secondarySubjects
	 */
	public function sendAction(
			Tx_Jobseek_Domain_Model_Job $job,
			Tx_Jobseek_Domain_Model_Applicant $applicant,
			$secondarySubjects=array()) {
		foreach ($secondarySubjects as $subjectUid) {
			$subject = $this->subjectRepository->findOneByUid($subjectUid);
			$applicant->addSecondarySubject($subject);
		}
		$application = $this->objectManager->get('Tx_Jobseek_Domain_Model_Application');
		$application->setApplicant($applicant);
		$application->setStatus($this->statusRepository->findByUid($this->settings['flexform']['defaultStatus']));
		$job->addApplication($application);
		$this->jobRepository->update($job);
		if ($job->getReceiptPage() > 0) {
			$receiptPageUid = $job->getReceiptPage();
		} else {
			$receiptPageUid = $this->settings['flexform']['receiptPageUid'];
		}
		if ($this->settings['receiptEmailEnabled'] == 1) {
			$emailBody = sprintf($this->settings['receiptEmailBody'], $applicant->getName());
			$emailBody .= LF . LF;
			$emailBody .= $this->makePlaintextApplicantDetails($applicant);
			$emailBody .= LF . LF;
			$emailBody .= $this->settings['receiptEmailSignature'];
			$mail = $this->objectManager->get('t3lib_mail_Message');
			$mail->setTo(array($applicant->getEmail() => $applicant->getName()))
				->setSubject($this->settings['receiptEmailSubject'])
				->setBody($emailBody)
				->setFrom(array($this->settings['receiptEmailFrom']['email'] => $this->settings['receiptEmailFrom']['name']))
				->send();
		};
		$this->redirect(NULL, NULL, NULL, NULL, $receiptPageUid);
	}

	/**
	 * @return string
	 */
	public function reviewAction() {
		$userGroups = explode(',', $GLOBALS['TSFE']->fe_user->user['usergroup']);
		$jobs = $this->jobRepository->findAccessible($userGroups);
		$admin = in_array($this->settings['flexform']['managementFrontendGroup'], $userGroups) || !$this->settings['flexform']['managementFrontendGroup'];

		$this->view->assign('admin', $admin);
		$this->view->assign('jobs', $jobs);
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Job $job
	 * @param string $search
	 * @param string $property
	 * @return string
	 */
	public function reviewApplicationsAction(Tx_Jobseek_Domain_Model_Job $job, $search=NULL, $property=NULL) {
		session_start();
		if (is_string($search)) {
			$_SESSION[$this->request->getControllerName()]['search'] = $search;
		} else {
			$search = $_SESSION[$this->request->getControllerName()]['search'];
		}
		if (is_string($property) && isset($_SESSION[$this->request->getControllerName()]['property'])) {
			$_SESSION[$this->request->getControllerName()]['property'] = $property;
		} else {
			$property = $_SESSION[$this->request->getControllerName()]['property'];
		}
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->redirect('reviewApplications', NULL, NULL, array('job' => $job->getUid()));
		}

		$userGroups = explode(',', $GLOBALS['TSFE']->fe_user->user['usergroup']);
		$admin = in_array($this->settings['flexform']['managementFrontendGroup'], $userGroups) || !$this->settings['flexform']['managementFrontendGroup'];

		$temp = $this->objectManager->get('Tx_Extbase_Persistence_ObjectStorage');
		$applications = $job->getApplications();
		if (isset($_SESSION[$this->request->getControllerName()]['property']) && isset($_SESSION[$this->request->getControllerName()]['search'])) {
			foreach ($applications as $application) {
				if ($this->matchesReviewRoundAccess($application, $userGroups)) {
					if ($search == '' || $this->matchesFilter($application, $search, $property)) {
						$temp->attach($application);
					}
				}
			}
		} else {
			$temp = $applications;
		}
		$applications = $this->sortObjectStorage($temp, 'applicant.name', 'ASC');
		$this->setQueue($applications);

		$this->view->assign('admin', $admin);
		$this->view->assign('applications', $applications);
		$this->view->assign('firstApplication', $applications->current());
		$this->view->assign('queue', $applications);
		$this->view->assign('search', $search);
		$this->view->assign('property', $property);
		$this->view->assign('job', $job);
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Job $job
	 * @param Tx_Jobseek_Domain_Model_Application $application
	 * @return string
	 */
	public function reviewApplicationAction(Tx_Jobseek_Domain_Model_Job $job, Tx_Jobseek_Domain_Model_Application $application) {
		session_start();
		$userGroups = explode(',', $GLOBALS['TSFE']->fe_user->user['usergroup']);
		$admin = in_array($this->settings['flexform']['managementFrontendGroup'], $userGroups) || !$this->settings['flexform']['managementFrontendGroup'];
		$this->view->assign('admin', $admin);
		$this->view->assign('job', $job);
		$this->view->assign('application', $application);
		$this->view->assign('queue', $this->getQueue());
		$this->view->assign('statuses', $this->statusRepository->findAll());
		$this->view->assign('comment', $this->objectManager->get('Tx_Jobseek_Domain_Model_Comment'));
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Application $application
	 * @return string
	 * @dontverifyrequesthash
	 */
	public function updateApplicationAction(Tx_Jobseek_Domain_Model_Application $application) {
		$this->applicationRepository->update($application);
		$this->objectManager->get('Tx_Extbase_Persistence_Manager')->persistAll();
		echo '1';
		exit();
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Job $job
	 * @param Tx_Jobseek_Domain_Model_Application $application
	 * @param Tx_Jobseek_Domain_Model_Comment $comment
	 * @dontvalidate $job
	 * @dontvalidate $application
	 * @dontvalidate $comment
	 * @dontverifyrequesthash
	 */
	public function addCommentAction(Tx_Jobseek_Domain_Model_Job $job, Tx_Jobseek_Domain_Model_Application $application, Tx_Jobseek_Domain_Model_Comment $comment) {
		$name = $GLOBALS['TSFE']->fe_user->user['name'];
		if (!$name) {
			$name = 'No name';
		}
		$comment->setAuthor($name);
		$this->commentRepository->add($comment);
		$application->addComment($comment);
		$this->applicationRepository->update($application);
		$this->redirect('reviewApplication', NULL, NULL, array('job' => $job->getUid(), 'application' => $application->getUid()));
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Job $job
	 * @param Tx_Jobseek_Domain_Model_Application $application
	 * @return string
	 */
	public function printAction(Tx_Jobseek_Domain_Model_Job $job=NULL, Tx_Jobseek_Domain_Model_Application $application=NULL) {
		session_start();
		if ($application) {
			$list = array($application);
		} elseif ($job) {
			$list = $this->getQueue();
		}

		$userGroups = explode(',', $GLOBALS['TSFE']->fe_user->user['usergroup']);
		$admin = in_array($this->settings['flexform']['managementFrontendGroup'], $userGroups) || !$this->settings['flexform']['managementFrontendGroup'];
		$this->view->assign('admin', $admin);

		$this->view->assign('list', $list);
		$this->view->assign('statuses', $this->statusRepository->findAll());
	}

	/**
	 * Sends a bulk email to selected list of applicants, all job applicants for
	 * a particular job or a single applicant.
	 *
	 * @param Tx_Jobseek_Domain_Model_Job $job
	 * @param Tx_Jobseek_Domain_Model_Job $returnToJob
	 * @param Tx_Jobseek_Domain_Model_Application $application
	 * @param string $subject
	 * @param string $body
	 * @param boolean $send
	 */
	public function applicantEmailAction(
			Tx_Jobseek_Domain_Model_Job $job=NULL,
			Tx_Jobseek_Domain_Model_Job $returnToJob=NULL,
			Tx_Jobseek_Domain_Model_Application $application=NULL,
			$subject=NULL,
			$body=NULL,
			$send=FALSE) {
		session_start();
		$this->flashMessageContainer->getAllMessagesAndFlush();
		if ($job) {
			$list = $job->getApplications()->toArray();
		} else if ($application) {
			$list = array($application);
		} else {
			$list = $this->getQueue();
		}

		$userGroups = explode(',', $GLOBALS['TSFE']->fe_user->user['usergroup']);
		$admin = in_array($this->settings['flexform']['managementFrontendGroup'], $userGroups) || !$this->settings['flexform']['managementFrontendGroup'];
		if (!$admin) {
			return 'Access denied';
		}

		if ($send == 1) {
			foreach ($list as $listedApplication) {
				$applicant = $listedApplication->getApplicant();
				$name = $applicant->getName();
				$email = $applicant->getEmail();
				$emailSubject = $subject;
				$emailBody = str_replace('%s', $applicant->getName(), $body);

				$mail = $this->objectManager->get('t3lib_mail_Message');
				$mail->setFrom(array($this->settings['massEmailFrom']['email'] => $this->settings['massEmailFrom']['name']));
				$mail->setTo(array($email => $name));
				$mail->setSubject($emailSubject);
				$mail->setBody($emailBody);
				if (!$mail->send()) {
					$this->flashMessageContainer->add('Failed sending email to ' . $email);
				}
			}
			$this->view->assign('sent', TRUE);
			$this->view->assign('send', FALSE);
			$this->view->assign('list', $list);
		} else {
			$this->view->assign('list', $list);
			$this->view->assign('send', $send);
		}
		$this->view->assign('subject', $subject);
		$this->view->assign('body', $body);
		$this->view->assign('returnToJob', $returnToJob);
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	protected function getQueue() {
		return $_SESSION[$this->request->getControllerName()]['queue'];
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage $queue
	 */
	protected function setQueue(Tx_Extbase_Persistence_ObjectStorage $queue) {
		$_SESSION[$this->request->getControllerName()]['queue'] = $queue;
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Application $application
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	protected function addApplicationToQueue(Tx_Jobseek_Domain_Model_Application $application) {
		$queue = $this->getQueue();
		$queue->attach($application);
		$this->setQueue($queue);
		return $queue;
	}

	/**
	 * Sort a Tx_Extbase_Persistence_ObjectStorage instance
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage $storage
	 * @param string $sortBy
	 * @param string $sortDirection
	 * @return Tx_Extbase_Persistence_ObjectStorage
	 */
	protected function sortObjectStorage($storage, $sortBy, $sortDirection='ASC') {
		$sorted = array();
		foreach ($storage as $item) {
			$index = $this->getSortValue($item, $sortBy);
			while (isset($sorted[$index])) {
				$index .= '1';
			}
			$sorted[$index] = $item;
		}
		if ($sortDirection === 'ASC') {
			ksort($sorted);
		} else {
			krsort($sorted);
		}
		$storage = $this->objectManager->get('Tx_Extbase_Persistence_ObjectStorage');
		foreach ($sorted as $item) {
			$storage->attach($item);
		}
		return $storage;
	}

	/**
	 * Gets the value to use as sorting value from $object
	 *
	 * @param mixed $object
	 * @return mixed
	 */
	protected function getSortValue($object, $field) {
		if ($field) {
			$parts = explode('.', $field);
			while ($part = array_shift($parts)) {
				$getter = 'get' . ucfirst($part);
				if (method_exists($object, $getter)) {
					$object = $object->$getter();
				} else if (is_object ($object)) {
					$object = $object->$field;
				} else if (is_array($object)) {
					$object = $object[$field];
				}
			}
			$value = $object;
		}
		if ($value instanceof DateTime) {
			$value = $value->getTimestamp();
		} elseif ($value instanceof Tx_Extbase_Persistence_ObjectStorage) {
			$value = $value->count();
		} elseif (is_array($value)) {
			$value = count($value);
		}
		return $value;
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Application $application
	 * @param string $search
	 * @param string $property
	 * @return string
	 */
	protected function matchesFilter(Tx_Jobseek_Domain_Model_Application $application, $search=NULL, $property=NULL) {
		$search = strtolower($search);
		$path = explode('_', $property);
		$value = $application;
		while ($part = array_shift($path)) {
			$value = Tx_Extbase_Reflection_ObjectAccess::getProperty($value, $part);
		}
		if ($value instanceof Tx_Extbase_Persistence_ObjectStorage) {
			foreach ($value as $subject) {
				if ($this->hasNeedleInProperty($subject, $search, 'name')) {
					return TRUE;
				}
			}
		} elseif ($value instanceof Tx_Extbase_DomainObject_AbstractDomainObject) {
			return $this->hasNeedleInProperty($value, $search, 'name');
		} elseif ($value == $search) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Application $application
	 * @param array $userGroups
	 */
	protected function matchesReviewRoundAccess(Tx_Jobseek_Domain_Model_Application $application, $userGroups) {
		$applicationRound = $application->getReviewRound();
		$groupsWithAccess = explode(',', $this->settings['flexform']['reviewRoundAccess'][$applicationRound]);
		if (!$groupWithAccess || count($groupsWithAccess) == 0) {
			return TRUE;
		} else {
			return (array_intersect($groupWithAccess, $userGroups) > 0);
		}
	}

	/**
	 * @param Tx_Extbase_DomainObject_AbstractDomainObject $object
	 * @param string $needle
	 * @param string $property
	 */
	protected function hasNeedleInProperty(Tx_Extbase_DomainObject_AbstractDomainObject $object, $needle, $property) {
		$haystack = Tx_Extbase_Reflection_ObjectAccess::getProperty($object, $property);
		$haystack = strtolower($haystack);
		return (strpos($haystack, $needle) !== FALSE);
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Applicant $applicant
	 * @return string
	 */
	protected function makePlaintextApplicantDetails(Tx_Jobseek_Domain_Model_Applicant $applicant) {
		header("Content-type: text/plain");
		$properties = explode(',', $this->settings['receiptEmailApplicantProperties']);
		$languageKey = $GLOBALS['TSFE']->tmpl->setup['config.']['language'];
		if (!$languageKey) {
			$languageKey = 'default';
		}
		$language = t3lib_div::readLLXMLfile(t3lib_extMgm::extPath('jobseek', 'Resources/Private/Language/locallang.xml'), $languageKey);
		$language = $language[$languageKey];
		$labels = array();
		foreach ($properties as $propertyName) {
			$lowerCasedPropertyName = Tx_Extbase_Utility_Extension::convertCamelCaseToLowerCaseUnderscored($propertyName);
			$labels[$propertyName] = $language['tx_jobseek_domain_model_applicant.' . $lowerCasedPropertyName];
		}
		$maxLabelLength = 0;
		foreach ($labels as $propertyName=>$labelValue) {
			if (mb_strlen($labelValue) > $maxLabelLength) {
				$maxLabelLength = mb_strlen($labelValue);
			}
		}
		$maxLabelLength += 3;
		$plaintext = '';
		foreach ($labels as $propertyName=>$label) {
			$diff = mb_strlen($label) - strlen($label);
			$paddedLabel = str_pad($label, $maxLabelLength + $diff, ' ', STR_PAD_RIGHT);
			$objectPropertyValue = Tx_Extbase_Reflection_ObjectAccess::getPropertyPath($applicant, $propertyName);
			if (!is_object($objectPropertyValue)) {
				$plaintext .= ($paddedLabel . $objectPropertyValue . LF);
			}
		}
		return $plaintext;
	}


}
?>