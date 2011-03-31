<?php defined('BASEPATH') OR exit('No direct script access allowed');

/** 
 * 
 * This CodeIgniter driver library consists of heavily modified versions
 * of Amazon's PHP library for use with Flexible Payments Service. Where
 * it has been modified, it has been properly documented.
 * 
 *	PHP Version 5
 *
 *	@category	 Amazon
 *	@package	 Amazon_FPS
 *	@copyright	 Copyright 2008-2010 Amazon Technologies, Inc.
 *	@link		 http://aws.amazon.com
 *	@license	 http://aws.amazon.com/apache2.0  Apache License, Version 2.0
 *	@version	 2008-09-17
 */
/******************************************************************************* 
 *	  __  _	   _  ___ 
 *	 (	)( \/\/ )/ __)
 *	 /__\ \	   / \__ \
 *	(_)(_) \/\/	 (___/
 * 
 *	Amazon FPS PHP5 Library
 *	Generated: Wed Sep 23 03:35:04 PDT 2009
 * 
 */

require_once str_replace('drivers', 'base', dirname(__FILE__)).'/SignatureUtilsForOutbound.php';

/**
 * Validates a Return URL or IPN
 *
 * @package AWS_FPS
 * @author Kevin Smith
 */
class Aws_fps_validate_request extends Amazon_FPS_SignatureUtilsForOutbound {
	
	protected $_ci = '';
	
	function __construct()
	{
		$this->_ci =& get_instance();
		
		log_message('debug', 'AWS FPS Validates Request Initialized');
	}

	/**
	 * Validates a return URL
	 * 
	 * @param array $params 
	 * @return string
	 * @author Kevin Smith
	 */
	function return_url(array $params, $urlEndPoint)
	{
		return $this->validateRequest($params, $urlEndPoint, "GET");
	}

}

/* End of file Aws_fps_validate_request.php */
/* Location: ./application/libraries/Aws_fps/drivers/Aws_fps_validate_request.php */