<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * 
 * This CodeIgniter driver library consists of heavily modified versions
 * of Amazon's PHP library for use with Flexible Payments Service. Where
 * it has been modified, it has been properly documented.
 * 
 *  PHP Version 5
 *
 *  @category    Amazon
 *  @package     Amazon_FPS
 *  @copyright   Copyright 2008-2010 Amazon Technologies, Inc.
 *  @link        http://aws.amazon.com
 *  @license     http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *  @version     2008-09-17
 */
/******************************************************************************* 
 *    __  _    _  ___ 
 *   (  )( \/\/ )/ __)
 *   /__\ \    / \__ \
 *  (_)(_) \/\/  (___/
 * 
 *  Amazon FPS PHP5 Library
 *  Generated: Wed Sep 23 03:35:04 PDT 2009
 * 
 */

require_once str_replace('drivers', 'base', dirname(__FILE__)).'/CBUIPipeline.php';

/**
 * Get CBUI URL
 * 
 * Returns the properly formatted CBUI URL needed 
 * to get authorization before sending a
 * pay/reserve request.
 *
 * @package default
 * @author Kevin Smith
 */
class Aws_fps_get_cbui_url extends Amazon_FPS_CBUIPipeline {
	
	protected $_ci = '';
	
	public function __construct()
	{
		$this->_ci =& get_instance();
		
		log_message('debug', 'AWS FPS (Single Use) Initialized');
	}
	
	/**
	 * Single Use
	 * 
	 * Returns a CBUI URL to authorize a single-use transaction.
	 *
	 * @param array $params 
	 * @return string
	 * @author Kevin Smith
	 */
	function single(array $params) {
		parent::Amazon_FPS_CBUIPipeline("SingleUse", $this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'));
		
		foreach ($params as $key => $value)
		{
			$this->addParameter($key, $value);
		}
		
		return $this->getUrl();
		
    }
	
	/**
	 * Throws up an error if any of the parameters don't validate.
	 *
	 * @param string $parameters 
	 * @return void
	 * @author Amazon, modified by Kevin Smith
	 */
	function validateParameters($parameters) {
		//mandatory parameters for single use pipeline
		if (!isset($parameters["transactionAmount"])) {
			throw new Exception("transactionAmount is missing in parameters.");
		}
	}

}

/* End of file Aws_fps_get_cbui_url.php */
/* Location: ./application/libraries/Aws_fps/drivers/Aws_fps_get_cbui_url.php */