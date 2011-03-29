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
	
	function __construct()
	{
		$this->_ci =& get_instance();
		
		log_message('debug', 'AWS FPS Get CBUI URL Initialized');
	}

	/**
	 * Get CBUI URL for SingleUse
	 * 
	 * @param array $params 
	 * @return string
	 * @author Kevin Smith
	 */
	function single(array $params)
	{
		return $this->get_cbui_url('SingleUse', $params);
	}
	
	/**
	 * Get CBUI URL for Recurring
	 * 
	 * @param array $params 
	 * @return string
	 * @author Kevin Smith
	 */
	function recurring(array $params)
	{
		return $this->get_cbui_url('Recurring', $params);
	}
	
	/**
	 * Get CBUI URL for Recipient
	 * 
	 * @param array $params 
	 * @return string
	 * @author Kevin Smith
	 */
	function recipient(array $params)
	{
		return $this->get_cbui_url('Recipient', $params);
	}
	
	/**
	 * Get CBUI URL for MultiUse
	 * 
	 * @param array $params 
	 * @return string
	 * @author Kevin Smith
	 */
	function multi(array $params)
	{
		return $this->get_cbui_url('MultiUse', $params);
	}
	
	/**
	 * Get CBUI URL for EditToken
	 * 
	 * @param array $params 
	 * @return string
	 * @author Kevin Smith
	 */
	function edit(array $params)
	{
		return $this->get_cbui_url('EditToken', $params);
	}
	
	/**
	 * Get CBUI URL
	 * 
	 * Returns a valid URL that, when visited, will allow 
	 * the end-user to authorize whatever action the page 
	 * requested.
	 *
	 * @param string $pipelineName 
	 * @param array $params 
	 * @return string
	 * @author Kevin Smith
	 */
	function get_cbui_url($pipelineName, array $params)
	{
		parent::Amazon_FPS_CBUIPipeline($pipelineName, $this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'));
		
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
	 * @author Amazon, heavily modified by Kevin Smith
	 */
	function validateParameters($parameters) {

		if ($parameters["pipelineName"] == 'SingleUse' AND !isset($parameters["transactionAmount"]))
		{
			throw new Exception("transactionAmount is missing in parameters.");
		}
		
		if ($parameters["pipelineName"] == 'Recurring')
		{
			if (!isset($parameters["transactionAmount"]))
			{
				throw new Exception("transactionAmount is missing in parameters.");
			}
		
			if (!isset($parameters["recurringPeriod"]))
			{
				throw new Exception("recurringPeriod is missing in parameters.");
			}
		}
		
		if ($parameters["pipelineName"] == 'Recipient')
		{
			if (!isset($parameters["maxFixedFee"]))
			{
				throw new Exception("maxFixedFee is missing in parameters.");
			}

			if (!isset($parameters["maxVariableFee"]))
			{
				throw new Exception("maxVariableFee is missing in parameters.");
			}

			if (!isset($parameters["recipientPaysFee"]))
			{
				throw new Exception("recipientPaysFee is missing in parameters.");
			}
		}
		
		if ($parameters["pipelineName"] == 'MultiUse')
		{
			//mandatory parameters for multi use pipeline
			if (!isset($parameters["globalAmountLimit"]))
			{
				throw new Exception("globalAmountLimit is missing in parameters.");
			}

			//conditional parameters for multi use pipeline
			if (isset($parameters["isRecipientCobranding"]) and !isset($parameters["recipientTokenList"]))
			{
				throw new Exception("recipientTokenList is missing in parameters.");
			}

			if (isset($parameters["usageLimitType1"]) and !isset($parameters["usageLimitValue1"]))
			{
				throw new Exception("usageLimitValue1 is missing in parameters.");
			}

			if (isset($parameters["usageLimitType2"]) and !isset($parameters["usageLimitValue2"]))
			{
				throw new Exception("usageLimitValue2 is missing in parameters.");
			}
		}
	
		if ($parameters["pipelineName"] == 'EditToken')
		{
			//mandatory parameters for single use pipeline
			if (!isset($parameters["tokenId"]))
			{
				throw new Exception("tokenId is missing in parameters.");
			}
			
		}
		
	}

}

/* End of file Aws_fps_get_cbui_url.php */
/* Location: ./application/libraries/Aws_fps/drivers/Aws_fps_get_cbui_url.php */