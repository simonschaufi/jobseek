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
 * Test case for class Tx_Jobseek_Domain_Model_Application.
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
class Tx_Jobseek_Domain_Model_ApplicationTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Jobseek_Domain_Model_Application
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Jobseek_Domain_Model_Application();
	}

	public function tearDown() {
		unset($this->fixture);
	}
	
	
	/**
	 * @test
	 */
	public function getRatingReturnsInitialValueForInteger() { 
		$this->assertSame(
			0,
			$this->fixture->getRating()
		);
	}

	/**
	 * @test
	 */
	public function setRatingForIntegerSetsRating() { 
		$this->fixture->setRating(12);

		$this->assertSame(
			12,
			$this->fixture->getRating()
		);
	}
	
	/**
	 * @test
	 */
	public function getReceivedReturnsInitialValueForDateTime() { }

	/**
	 * @test
	 */
	public function setReceivedForDateTimeSetsReceived() { }
	
	/**
	 * @test
	 */
	public function getApplicantReturnsInitialValueForTx_Jobseek_Domain_Model_Applicant() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getApplicant()
		);
	}

	/**
	 * @test
	 */
	public function setApplicantForTx_Jobseek_Domain_Model_ApplicantSetsApplicant() { 
		$dummyObject = new Tx_Jobseek_Domain_Model_Applicant();
		$this->fixture->setApplicant($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getApplicant()
		);
	}
	
	/**
	 * @test
	 */
	public function getStatusReturnsInitialValueForTx_Jobseek_Domain_Model_Status() { 
		$this->assertEquals(
			NULL,
			$this->fixture->getStatus()
		);
	}

	/**
	 * @test
	 */
	public function setStatusForTx_Jobseek_Domain_Model_StatusSetsStatus() { 
		$dummyObject = new Tx_Jobseek_Domain_Model_Status();
		$this->fixture->setStatus($dummyObject);

		$this->assertSame(
			$dummyObject,
			$this->fixture->getStatus()
		);
	}
	
}
?>