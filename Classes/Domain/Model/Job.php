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
class Tx_Jobseek_Domain_Model_Job extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Job name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;
	
	/**
	 * @var string
	 */
	protected $subtitle;

	/**
	 * Job description
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * Application deadline
	 *
	 * @var DateTime
	 */
	protected $deadline;

	/**
	 * Page UID of receipt page
	 *
	 * @var integer
	 */
	protected $receiptPage;

	/**
	 * Job applications
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Application>
	 */
	protected $applications;
	
	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_FrontendUserGroup>
	 */
	protected $groups;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->applications = new Tx_Extbase_Persistence_ObjectStorage();
		$this->groups = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}
	
	/**
	 * @return string
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}
	
	/**
	 * @param string $subtitle 
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the deadline
	 *
	 * @return DateTime $deadline
	 */
	public function getDeadline() {
		return $this->deadline;
	}

	/**
	 * Sets the deadline
	 *
	 * @param DateTime $deadline
	 * @return void
	 */
	public function setDeadline($deadline) {
		$this->deadline = $deadline;
	}

	/**
	 * Returns the receiptPage
	 *
	 * @return integer $receiptPage
	 */
	public function getReceiptPage() {
		return $this->receiptPage;
	}

	/**
	 * Sets the receiptPage
	 *
	 * @param integer $receiptPage
	 * @return void
	 */
	public function setReceiptPage($receiptPage) {
		$this->receiptPage = $receiptPage;
	}

	/**
	 * Adds a Application
	 *
	 * @param Tx_Jobseek_Domain_Model_Application $application
	 * @return void
	 */
	public function addApplication(Tx_Jobseek_Domain_Model_Application $application) {
		$this->applications->attach($application);
	}

	/**
	 * Removes a Application
	 *
	 * @param Tx_Jobseek_Domain_Model_Application $applicationToRemove The Application to be removed
	 * @return void
	 */
	public function removeApplication(Tx_Jobseek_Domain_Model_Application $applicationToRemove) {
		$this->applications->detach($applicationToRemove);
	}

	/**
	 * Returns the applications
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Application> $applications
	 */
	public function getApplications() {
		return $this->applications;
	}

	/**
	 * Sets the applications
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Application> $applications
	 * @return void
	 */
	public function setApplications(Tx_Extbase_Persistence_ObjectStorage $applications) {
		$this->applications = $applications;
	}
	
	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_FrontendUserGroup>
	 */
	public function getGroups() {
		return $this->groups;
	}
	
	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Extbase_Domain_Model_FrontendUserGroup> $groups 
	 */
	public function setGroups(Tx_Extbase_Persistence_ObjectStorage $groups) {
		$this->groups = $groups;
	}

}
?>