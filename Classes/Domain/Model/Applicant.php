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
class Tx_Jobseek_Domain_Model_Applicant extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name;

	/**
	 * Address
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $address;

	/**
	 * Zip code
	 *
	 * @var string
	 * @validate StringLength(minimum=4, maximum=4)
	 * @validate Integer
	 */
	protected $zip;

	/**
	 * City
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $city;

	/**
	 * Telephone
	 *
	 * @var string
	 * @validate StringLength(minimum=8)
	 * @validate Number
	 */
	protected $telephone;

	/**
	 * Mobile
	 *
	 * @var string
	 * @validate Number
	 */
	protected $mobile;

	/**
	 * Email address
	 *
	 * @var string
	 * @validate EmailAddress
	 */
	protected $email;

	/**
	 * Birthday
	 *
	 * @var string
	 * @validate RegularExpression(regularExpression=/^$|[0-9\-]/)
	 * @validate StringLength(minimum=10, maximum=11)
	 */
	protected $birthday;

	/**
	 * Candidacy passed
	 *
	 * @var boolean
	 */
	protected $candidacyPassed;

	/**
	 * Candidacy year
	 *
	 * @var integer
	 * @validate StringLength(minimum=0, maximum=4)
	 */
	protected $candidacyYear;

	/**
	 * Pedagogic exam passed
	 *
	 * @var boolean
	 */
	protected $pedagogicExamPassed;

	/**
	 * Birthday
	 *
	 * @var integer
	 * @validate RegularExpression(regularExpression=/^$|[0-9]/)
	 */
	protected $pedagogicExamYear;

	/**
	 * Birthday
	 *
	 * @var string
	 */
	protected $currentEmployment;

	/**
	 * Birthday
	 *
	 * @var integer
	 * @validate RegularExpression(regularExpression=/^$|[0-9]/)
	 */
	protected $currentEmploymentYear;

	/**
	 * Competences
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $competences;

	/**
	 * Experience
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $experience;

	/**
	 * @var string
	 * @validate Text
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $image;

	/**
	 * Files
	 *
	 * @var string
	 */
	protected $files;

	/**
	 * Main subject area
	 *
	 * @var Tx_Jobseek_Domain_Model_Subject
	 */
	protected $mainSubject;

	/**
	 * Secondary subject areas
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Subject>
	 */
	protected $secondarySubjects;

	/**
	 * Previous employments
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Employment>
	 */
	protected $employments;

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
		$this->secondarySubjects = new Tx_Extbase_Persistence_ObjectStorage();
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
	 * Returns the address
	 *
	 * @return string $address
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * Sets the address
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * Returns the zip
	 *
	 * @return string $zip
	 */
	public function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the zip
	 *
	 * @param string $zip
	 * @return void
	 */
	public function setZip($zip) {
		$this->zip = $zip;
	}

	/**
	 * Returns the city
	 *
	 * @return string $city
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * Sets the city
	 *
	 * @param string $city
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * Returns the telephone
	 *
	 * @return string $telephone
	 */
	public function getTelephone() {
		return $this->telephone;
	}

	/**
	 * Sets the telephone
	 *
	 * @param string $telephone
	 * @return void
	 */
	public function setTelephone($telephone) {
		$this->telephone = $telephone;
	}

	/**
	 * Returns the mobile
	 *
	 * @return string $mobile
	 */
	public function getMobile() {
		return $this->mobile;
	}

	/**
	 * Sets the mobile
	 *
	 * @param string $mobile
	 * @return void
	 */
	public function setMobile($mobile) {
		$this->mobile = $mobile;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the birthday
	 *
	 * @return string $birthday
	 */
	public function getBirthday() {
		return $this->birthday;
	}

	/**
	 * Sets the birthday
	 *
	 * @param string $birthday
	 * @return void
	 */
	public function setBirthday($birthday) {
		$this->birthday = $birthday;
	}

	/**
	 * Returns the candidacyPassed
	 *
	 * @return boolean $candidacyPassed
	 */
	public function getCandidacyPassed() {
		return $this->candidacyPassed;
	}

	/**
	 * Sets the candidacyPassed
	 *
	 * @param boolean $candidacyPassed
	 * @return void
	 */
	public function setCandidacyPassed($candidacyPassed) {
		$this->candidacyPassed = $candidacyPassed;
	}

	/**
	 * Returns the boolean state of candidacyPassed
	 *
	 * @return boolean
	 */
	public function isCandidacyPassed() {
		return $this->getCandidacyPassed();
	}

	/**
	 * Returns the candidacyYear
	 *
	 * @return integer $candidacyYear
	 */
	public function getCandidacyYear() {
		return $this->candidacyYear;
	}

	/**
	 * Sets the candidacyYear
	 *
	 * @param integer $candidacyYear
	 * @return void
	 */
	public function setCandidacyYear($candidacyYear) {
		$this->candidacyYear = $candidacyYear;
	}

	/**
	 * Returns the pedagogicExamPassed
	 *
	 * @return boolean $pedagogicExamPassed
	 */
	public function getPedagogicExamPassed() {
		return $this->pedagogicExamPassed;
	}

	/**
	 * Sets the pedagogicExamPassed
	 *
	 * @param boolean $pedagogicExamPassed
	 * @return void
	 */
	public function setPedagogicExamPassed($pedagogicExamPassed) {
		$this->pedagogicExamPassed = $pedagogicExamPassed;
	}

	/**
	 * Returns the boolean state of pedagogicExamPassed
	 *
	 * @return boolean
	 */
	public function isPedagogicExamPassed() {
		return $this->getPedagogicExamPassed();
	}

	/**
	 * Returns the pedagogicExamYear
	 *
	 * @return integer $pedagogicExamYear
	 */
	public function getPedagogicExamYear() {
		return $this->pedagogicExamYear;
	}

	/**
	 * Sets the pedagogicExamYear
	 *
	 * @param integer $pedagogicExamYear
	 * @return void
	 */
	public function setPedagogicExamYear($pedagogicExamYear) {
		$this->pedagogicExamYear = $pedagogicExamYear;
	}

	/**
	 * Returns the currentEmployment
	 *
	 * @return string $currentEmployment
	 */
	public function getCurrentEmployment() {
		return $this->currentEmployment;
	}

	/**
	 * Sets the currentEmployment
	 *
	 * @param string $currentEmployment
	 * @return void
	 */
	public function setCurrentEmployment($currentEmployment) {
		$this->currentEmployment = $currentEmployment;
	}

	/**
	 * Returns the currentEmploymentYear
	 *
	 * @return integer $currentEmploymentYear
	 */
	public function getCurrentEmploymentYear() {
		return $this->currentEmploymentYear;
	}

	/**
	 * Sets the currentEmploymentYear
	 *
	 * @param integer $currentEmploymentYear
	 * @return void
	 */
	public function setCurrentEmploymentYear($currentEmploymentYear) {
		$this->currentEmploymentYear = $currentEmploymentYear;
	}

	/**
	 * Returns the competences
	 *
	 * @return string $competences
	 */
	public function getCompetences() {
		return $this->competences;
	}

	/**
	 * Sets the competences
	 *
	 * @param string $competences
	 * @return void
	 */
	public function setCompetences($competences) {
		$this->competences = $competences;
	}

	/**
	 * Returns the experience
	 *
	 * @return string $experience
	 */
	public function getExperience() {
		return $this->experience;
	}

	/**
	 * Sets the experience
	 *
	 * @param string $experience
	 * @return void
	 */
	public function setExperience($experience) {
		$this->experience = $experience;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the files
	 *
	 * @return string $files
	 */
	public function getFiles() {
		return trim($this->files, ',');
	}

	/**
	 * Sets the files
	 *
	 * @param string $files
	 * @return void
	 */
	public function setFiles($files) {
		$this->files = $files;
	}

	/**
	 * @return string
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param string $image
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * Returns the mainSubject
	 *
	 * @return Tx_Jobseek_Domain_Model_Subject $mainSubject
	 */
	public function getMainSubject() {
		return $this->mainSubject;
	}

	/**
	 * Sets the mainSubject
	 *
	 * @param Tx_Jobseek_Domain_Model_Subject $mainSubject
	 * @return void
	 */
	public function setMainSubject(Tx_Jobseek_Domain_Model_Subject $mainSubject) {
		$this->mainSubject = $mainSubject;
	}

	/**
	 * Adds a Subject
	 *
	 * @param Tx_Jobseek_Domain_Model_Subject $secondarySubject
	 * @return void
	 */
	public function addSecondarySubject(Tx_Jobseek_Domain_Model_Subject $secondarySubject) {
		$this->secondarySubjects->attach($secondarySubject);
	}

	/**
	 * Removes a Subject
	 *
	 * @param Tx_Jobseek_Domain_Model_Subject $secondarySubjectToRemove The Subject to be removed
	 * @return void
	 */
	public function removeSecondarySubject(Tx_Jobseek_Domain_Model_Subject $secondarySubjectToRemove) {
		$this->secondarySubjects->detach($secondarySubjectToRemove);
	}

	/**
	 * Returns the secondarySubjects
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Subject> $secondarySubjects
	 */
	public function getSecondarySubjects() {
		return $this->secondarySubjects;
	}

	/**
	 * Sets the secondarySubjects
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Subject> $secondarySubjects
	 * @return void
	 */
	public function setSecondarySubjects(Tx_Extbase_Persistence_ObjectStorage $secondarySubjects) {
		$this->secondarySubjects = $secondarySubjects;
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Employment $employment
	 */
	public function addEmployment(Tx_Jobseek_Domain_Model_Employment $employment) {
		$this->employments->attach($employment);
	}

	/**
	 * @param Tx_Jobseek_Domain_Model_Employment $employment
	 */
	public function removeEmployment(Tx_Jobseek_Domain_Model_Employment $employment) {
		$this->employments->detach($employment);
	}

	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Employment>
	 */
	public function getEmployments() {
		return $this->employments;
	}

	/**
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Employment> $employments
	 */
	public function setEmployments(Tx_Extbase_Persistence_ObjectStorage $employments) {
		$this->employments = $employments;
	}

}
?>