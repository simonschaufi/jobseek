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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Jobseek_Domain_Model_Applicant.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Job Listing and Application
 *
 * @author Claus Due <claus@wildside.dk>
 */
class Tx_Jobseek_Domain_Model_ApplicantTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Jobseek_Domain_Model_Applicant
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Jobseek_Domain_Model_Applicant();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameForStringSetsName() { 
		$this->fixture->setName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getName()
		);
	}
	
	/**
	 * @test
	 */
	public function getAddressReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setAddressForStringSetsAddress() { 
		$this->fixture->setAddress('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getAddress()
		);
	}
	
	/**
	 * @test
	 */
	public function getZipReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setZipForStringSetsZip() { 
		$this->fixture->setZip('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getZip()
		);
	}
	
	/**
	 * @test
	 */
	public function getCityReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCityForStringSetsCity() { 
		$this->fixture->setCity('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCity()
		);
	}
	
	/**
	 * @test
	 */
	public function getTelephoneReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTelephoneForStringSetsTelephone() { 
		$this->fixture->setTelephone('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTelephone()
		);
	}
	
	/**
	 * @test
	 */
	public function getMobileReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setMobileForStringSetsMobile() { 
		$this->fixture->setMobile('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getMobile()
		);
	}
	
	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail() { 
		$this->fixture->setEmail('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getEmail()
		);
	}
	
	/**
	 * @test
	 */
	public function getBirthdayReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setBirthdayForStringSetsBirthday() { 
		$this->fixture->setBirthday('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getBirthday()
		);
	}
	
	/**
	 * @test
	 */
	public function getCandidacyPassedReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getCandidacyPassed()
		);
	}

	/**
	 * @test
	 */
	public function setCandidacyPassedForBooleanSetsCandidacyPassed() { 
		$this->fixture->setCandidacyPassed(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getCandidacyPassed()
		);
	}
	
	/**
	 * @test
	 */
	public function getCandidacyYearReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getCandidacyYear()
		);
	}

	/**
	 * @test
	 */
	public function setCandidacyYearForIntegerSetsCandidacyYear() { 
		$this->fixture->setCandidacyYear(12);

		$this->assertSame(
			12,
			$this->fixture->getCandidacyYear()
		);
	}
	
	/**
	 * @test
	 */
	public function getPedagogicExamPassedReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getPedagogicExamPassed()
		);
	}

	/**
	 * @test
	 */
	public function setPedagogicExamPassedForBooleanSetsPedagogicExamPassed() { 
		$this->fixture->setPedagogicExamPassed(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getPedagogicExamPassed()
		);
	}
	
	/**
	 * @test
	 */
	public function getPedagogicExamYearReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getPedagogicExamYear()
		);
	}

	/**
	 * @test
	 */
	public function setPedagogicExamYearForIntegerSetsPedagogicExamYear() { 
		$this->fixture->setPedagogicExamYear(12);

		$this->assertSame(
			12,
			$this->fixture->getPedagogicExamYear()
		);
	}
	
	/**
	 * @test
	 */
	public function getCurrentEmploymentReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCurrentEmploymentForStringSetsCurrentEmployment() { 
		$this->fixture->setCurrentEmployment('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCurrentEmployment()
		);
	}
	
	/**
	 * @test
	 */
	public function getCurrentEmploymentYearReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getCurrentEmploymentYear()
		);
	}

	/**
	 * @test
	 */
	public function setCurrentEmploymentYearForIntegerSetsCurrentEmploymentYear() { 
		$this->fixture->setCurrentEmploymentYear(12);

		$this->assertSame(
			12,
			$this->fixture->getCurrentEmploymentYear()
		);
	}
	
	/**
	 * @test
	 */
	public function getCompetencesReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setCompetencesForStringSetsCompetences() { 
		$this->fixture->setCompetences('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getCompetences()
		);
	}
	
	/**
	 * @test
	 */
	public function getExperienceReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setExperienceForStringSetsExperience() { 
		$this->fixture->setExperience('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getExperience()
		);
	}
	
	/**
	 * @test
	 */
	public function getFilesReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setFilesForStringSetsFiles() { 
		$this->fixture->setFiles('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getFiles()
		);
	}
	
	/**
	 * @test
	 */
	public function getMainSubjectReturnsInitialValueForTx_Jobseek_Domain_Model_Subject() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getMainSubject()
		);
	}

	/**
	 * @test
	 */
	public function setMainSubjectForTx_Jobseek_Domain_Model_SubjectSetsMainSubject() { 
		$dummyObject = new Tx_Jobseek_Domain_Model_Subject();
		$this->fixture->setMainSubject($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getMainSubject()
		);
	}
	
	/**
	 * @test
	 */
	public function getSecondarySubjectsReturnsInitialValueForObjectStorageContainingTx_Jobseek_Domain_Model_Subject() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getSecondarySubjects()
		);
	}

	/**
	 * @test
	 */
	public function setSecondarySubjectsForObjectStorageContainingTx_Jobseek_Domain_Model_SubjectSetsSecondarySubjects() { 
		$secondarySubject = new Tx_Jobseek_Domain_Model_Subject();
		$objectStorageHoldingExactlyOneSecondarySubjects = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneSecondarySubjects->attach($secondarySubject);
		$this->fixture->setSecondarySubjects($objectStorageHoldingExactlyOneSecondarySubjects);

		$this->assertSame(
			$objectStorageHoldingExactlyOneSecondarySubjects,
			$this->fixture->getSecondarySubjects()
		);
	}
	
	/**
	 * @test
	 */
	public function addSecondarySubjectToObjectStorageHoldingSecondarySubjects() {
		$secondarySubject = new Tx_Jobseek_Domain_Model_Subject();
		$objectStorageHoldingExactlyOneSecondarySubject = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneSecondarySubject->attach($secondarySubject);
		$this->fixture->addSecondarySubject($secondarySubject);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneSecondarySubject,
			$this->fixture->getSecondarySubjects()
		);
	}

	/**
	 * @test
	 */
	public function removeSecondarySubjectFromObjectStorageHoldingSecondarySubjects() {
		$secondarySubject = new Tx_Jobseek_Domain_Model_Subject();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($secondarySubject);
		$localObjectStorage->detach($secondarySubject);
		$this->fixture->addSecondarySubject($secondarySubject);
		$this->fixture->removeSecondarySubject($secondarySubject);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getSecondarySubjects()
		);
	}
	
}
?>