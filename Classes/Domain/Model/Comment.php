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
class Tx_Jobseek_Domain_Model_Comment extends Tx_Extbase_DomainObject_AbstractEntity {
	
	/**
	 * @var string
	 */
	protected $author;
	
	/**
	 * @var integer
	 */
	protected $reviewRound;
	
	/**
	 * @var string
	 */
	protected $body;
	
	/**
	 * @return string
	 */
	public function getAuthor() {
		return $this->author;
	}
	
	/**
	 * @param string $author 
	 */
	public function setAuthor($author) {
		$this->author = $author;
	}
	
	/**
	 * @return string
	 */
	public function getReviewRound() {
		return $this->reviewRound;
	}
	
	/**
	 * @param string $reviewRound 
	 */
	public function setReviewRound($reviewRound) {
		$this->reviewRound = $reviewRound;
	}
	
	/**
	 * @return string
	 */
	public function getBody() {
		return $this->body;
	}
	
	/**
	 * @param string $body 
	 */
	public function setBody($body) {
		$this->body = $body;
	}
	
}

?>