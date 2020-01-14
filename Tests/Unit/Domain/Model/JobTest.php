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
 * Test case for class Tx_Jobseek_Domain_Model_Job.
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
class Tx_Jobseek_Domain_Model_JobTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Jobseek_Domain_Model_Job
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Jobseek_Domain_Model_Job();
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
	public function getDescriptionReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription() { 
		$this->fixture->setDescription('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getDescription()
		);
	}
	
	/**
	 * @test
	 */
	public function getDeadlineReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setDeadlineForDateTimeSetsDeadline() { }
	
	/**
	 * @test
	 */
	public function getReceiptPageReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setReceiptPageForDateTimeSetsReceiptPage() { }
	
	/**
	 * @test
	 */
	public function getApplicationsReturnsInitialValueForObjectStorageContainingTx_Jobseek_Domain_Model_Application() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getApplications()
		);
	}

	/**
	 * @test
	 */
	public function setApplicationsForObjectStorageContainingTx_Jobseek_Domain_Model_ApplicationSetsApplications() { 
		$application = new Tx_Jobseek_Domain_Model_Application();
		$objectStorageHoldingExactlyOneApplications = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneApplications->attach($application);
		$this->fixture->setApplications($objectStorageHoldingExactlyOneApplications);

		$this->assertSame(
			$objectStorageHoldingExactlyOneApplications,
			$this->fixture->getApplications()
		);
	}
	
	/**
	 * @test
	 */
	public function addApplicationToObjectStorageHoldingApplications() {
		$application = new Tx_Jobseek_Domain_Model_Application();
		$objectStorageHoldingExactlyOneApplication = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneApplication->attach($application);
		$this->fixture->addApplication($application);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneApplication,
			$this->fixture->getApplications()
		);
	}

	/**
	 * @test
	 */
	public function removeApplicationFromObjectStorageHoldingApplications() {
		$application = new Tx_Jobseek_Domain_Model_Application();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($application);
		$localObjectStorage->detach($application);
		$this->fixture->addApplication($application);
		$this->fixture->removeApplication($application);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getApplications()
		);
	}
	
}
?>