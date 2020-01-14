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
class Tx_Jobseek_Domain_Model_Application extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Application relevancy rating
	 *
	 * @var integer
	 */
	protected $rating;
	
	/**
	 * @var integer
	 */
	protected $reviewRound;

	/**
	 * Received date
	 *
	 * @var DateTime
	 */
	protected $received;

	/**
	 * Job applicant
	 *
	 * @var Tx_Jobseek_Domain_Model_Applicant
	 */
	protected $applicant;

	/**
	 * Application status
	 *
	 * @var Tx_Jobseek_Domain_Model_Status
	 */
	protected $status;

	/**
	 * @var string
	 */
	protected $notes;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Comment>
	 */
	protected $comments;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		$this->comments = t3lib_div::makeInstance('Tx_Extbase_Persistence_ObjectStorage');
	}

	/**
	 * Returns the rating
	 *
	 * @return integer $rating
	 */
	public function getRating() {
		return $this->rating;
	}

	/**
	 * Sets the rating
	 *
	 * @param integer $rating
	 * @return void
	 */
	public function setRating($rating) {
		$this->rating = $rating;
	}
	
	/**
	 * @return integer
	 */
	public function getReviewRound() {
		return $this->reviewRound;
	}
	
	/**
	 * @param integer $reviewRound 
	 */
	public function setReviewRound($reviewRound) {
		$this->reviewRound = $reviewRound;
	}

	/**
	 * Returns the received
	 *
	 * @return DateTime $received
	 */
	public function getReceived() {
		return $this->received;
	}

	/**
	 * Sets the received
	 *
	 * @param DateTime $received
	 * @return void
	 */
	public function setReceived($received) {
		$this->received = $received;
	}

	/**
	 * Returns the applicant
	 *
	 * @return Tx_Jobseek_Domain_Model_Applicant $applicant
	 */
	public function getApplicant() {
		return $this->applicant;
	}

	/**
	 * Sets the applicant
	 *
	 * @param Tx_Jobseek_Domain_Model_Applicant $applicant
	 * @return void
	 */
	public function setApplicant(Tx_Jobseek_Domain_Model_Applicant $applicant) {
		$this->applicant = $applicant;
	}

	/**
	 * Returns the status
	 *
	 * @return Tx_Jobseek_Domain_Model_Status $status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * Sets the status
	 *
	 * @param Tx_Jobseek_Domain_Model_Status $status
	 * @return void
	 */
	public function setStatus(Tx_Jobseek_Domain_Model_Status $status) {
		$this->status = $status;
	}

	/**
	 * @return string
	 */
	public function getNotes() {
		return $this->notes;
	}

	/**
	 * @param string $notes
	 */
	public function setNotes($notes) {
		$this->notes = $notes;
	}
	
	/**
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Jobseek_Domain_Model_Comment>
	 */
	public function getComments() {
		return $this->comments;
	}
	
	/**
	 * @param Tx_Extbase_Persitence_objectStorage $comments 
	 */
	public function setComments(Tx_Extbase_Persitence_objectStorage $comments) {
		$this->comments = $comments;
	}
	
	/**
	 * @param Tx_Jobseek_Domain_Model_Comment $comment 
	 */
	public function addComment(Tx_Jobseek_Domain_Model_Comment $comment) {
		$this->comments->attach($comment);
	}
	
	/**
	 * @param Tx_Jobseek_Domain_Model_Comment $comment 
	 */
	public function removeComment(Tx_Jobseek_Domain_Model_Comment $comment) {
		$this->comments->detach($comment);
	}

}
?>