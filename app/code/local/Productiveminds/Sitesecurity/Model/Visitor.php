<?php
/**
 *  A Magento module by ProductiveMinds
 *
 * NOTICE OF LICENSE
 *
 * This code is the effort and copyright of Productive Minds Ltd, A UK registered company.
 * The copyright owner prohibit any fom of distribution of this code
 *
 * DISCLAIMER
 *
 * You are strongly advised to backup ALL your server files and database before installing and/or configuring
 * this Magento module. ProductiveMinds will not take any form of responsibility for any adverse effects that
 * may be cause directly or indirectly by using this software. As a usual practice with Software deployment,
 * the copyright owner recommended that you first install this software on a test server verify its appropriateness
 * before finally deploying it to a live server.
 *
 * @category   	Productiveminds
 * @package    	Productiveminds_Sitesecurity
 * @copyright   Copyright (c) 2010 - 2015 Productive Minds Ltd (http://www.productiveminds.com)
 * @license    	http://www.productiveminds.com/license/license.txt
 * @author     	ProductiveMinds <info@productiveminds.com>
 */

class Productiveminds_Sitesecurity_Model_Visitor extends Mage_Core_Model_Abstract
{
	const VISITOR_TYPE_CUSTOMER = 'c';
	const VISITOR_TYPE_VISITOR  = 'v';
	
	public function _construct()
	{
		parent::_construct();
		$this->_init('sitesecurity/visitor');
	}
	
	/* Add Filter by status
	*
	* @param int $visitor_id
	* @return Productiveminds_Sitesecurity_Model_Visitor
	*/
	public function addVisitorInfoFilter($visitor_id) {
		$this->getSelect()->where('main_table.visitor_id = ?', $visitor_id);
		return $this;
	}

}