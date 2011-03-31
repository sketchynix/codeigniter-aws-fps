<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model.php';
require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Client.php';
require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/Amount.php';

class Aws_fps_api extends Amazon_FPS_Model {
	
	protected $_ci = '';
   
	function __construct($data = null)
	{
	
		$this->_ci =& get_instance();
		
		log_message('debug', 'AWS FPS Pay Initialized');
	}
	
	function pay($data = null)
	{	
		require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/PayRequest.php';

		$service = new Amazon_FPS_Client($this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'));
	
		$request =	new Amazon_FPS_Model_PayRequest();
		$request->setSenderTokenId($data['SenderTokenId']);
		$amount = new Amazon_FPS_Model_Amount();
		$amount->setCurrencyCode($data['CurrencyCode']);
		$amount->setValue($data['Value']);
		$request->setTransactionAmount($amount);
		$request->setCallerReference($data['CallerReference']);
		
		$response = $service->pay($request);
		
		return $response;
	}
	
	function reserve($data = null)
	{
		require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/ReserveRequest.php';
		
		$service = new Amazon_FPS_Client($this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'));
	
		$request =	new Amazon_FPS_Model_ReserveRequest();
		$request->setSenderTokenId($data['SenderTokenId']);
		$amount = new Amazon_FPS_Model_Amount();
		$amount->setCurrencyCode($data['CurrencyCode']);
		$amount->setValue($data['Value']);
		$request->setTransactionAmount($amount);
		$request->setCallerReference($data['CallerReference']);
		
		$response = $service->reserve($request);
		
		return $response;
	}

	function settle($data = null)
	{
		require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/SettleRequest.php';
		
		$service = new Amazon_FPS_Client($this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'));
	
		$request =	new Amazon_FPS_Model_SettleRequest();
		$request->setReserveTransactionId($data['ReserveTransactionId']);
		$amount = new Amazon_FPS_Model_Amount();
		$amount->setCurrencyCode($data['CurrencyCode']);
		$amount->setValue($data['Value']);
		$request->setTransactionAmount($amount);
		
		$response = $service->settle($request);
		
		return $response;
	}

}

/* End of file Aws_fps_api.php */
/* Location: ./application/libraries/Aws_fps/drivers/Aws_fps_api.php */