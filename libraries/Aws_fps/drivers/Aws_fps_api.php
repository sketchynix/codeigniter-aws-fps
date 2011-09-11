<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model.php';
require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Client.php';
require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/Amount.php';

/**
 * The API driver for the AWS FPS Driver Library
 * 
 * This driver contains all the methods necessary once registration 
 * and authorization for a transaction has occurred.
 *
 * @package AWS_FPS
 * @author Kevin Smith
 */
class Aws_fps_api extends Amazon_FPS_Model {
	
	protected $_ci = '';
   
	function __construct($data = NULL)
	{
		$this->_ci =& get_instance();
		
		log_message('debug', 'AWS FPS Pay Initialized');
	}
	
	/**
	 * Pay method
	 * 
	 * Use this method to interact with the FPS API's Pay action. 
	 * More information at the link.
	 *
	 * @link http://docs.amazonwebservices.com/AmazonFPS/latest/FPSAdvancedGuide/Pay.html
	 * @param array $data 
	 * @return object
	 * @author Kevin Smith
	 */
	function pay(array $data = NULL)
	{	
		require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/PayRequest.php';

		$service = new Amazon_FPS_Client($this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'), NULL, $this->_ci->config->item('sandbox'));
	
		$request =	new Amazon_FPS_Model_PayRequest();
		$request->setSenderTokenId($data['SenderTokenId']);
		if ($data['RecipientTokenId'])
			$request->setRecipientTokenId($data['RecipientTokenId']);
		$amount = new Amazon_FPS_Model_Amount();
		$amount->setCurrencyCode($data['CurrencyCode']);
		$amount->setValue($data['Value']);
		$request->setTransactionAmount($amount);
		$request->setCallerReference($data['CallerReference']);
			
		return $service->pay($request);
	}
	
	/**
	 * Reserve method
	 * 
	 * Use this method to interact with the FPS API's Reserve action. 
	 * More information at the link.
	 *
	 * @link http://docs.amazonwebservices.com/AmazonFPS/latest/FPSAdvancedGuide/Reserve.html
	 * @param array $data 
	 * @return object
	 * @author Kevin Smith
	 */
	function reserve($data = NULL)
	{
		require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/ReserveRequest.php';
		
		$service = new Amazon_FPS_Client($this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'), NULL, $this->_ci->config->item('sandbox'));
	
		$request =	new Amazon_FPS_Model_ReserveRequest();
		$request->setSenderTokenId($data['SenderTokenId']);
		$amount = new Amazon_FPS_Model_Amount();
		$amount->setCurrencyCode($data['CurrencyCode']);
		$amount->setValue($data['Value']);
		$request->setTransactionAmount($amount);
		$request->setCallerReference($data['CallerReference']);
		
		return $service->reserve($request);
	}

	/**
	 * Settle method
	 * 
	 * Use this method to interact with the FPS API's Settle action. 
	 * More information at the link.
	 *
	 * @link http://docs.amazonwebservices.com/AmazonFPS/latest/FPSAdvancedGuide/Settle.html
	 * @param array $data 
	 * @return object
	 * @author Kevin Smith
	 */
	function settle($data = NULL)
	{
		require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/SettleRequest.php';
		
		$service = new Amazon_FPS_Client($this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'), NULL, $this->_ci->config->item('sandbox'));
	
		$request =	new Amazon_FPS_Model_SettleRequest();
		$request->setReserveTransactionId($data['ReserveTransactionId']);
		$amount = new Amazon_FPS_Model_Amount();
		$amount->setCurrencyCode($data['CurrencyCode']);
		$amount->setValue($data['Value']);
		$request->setTransactionAmount($amount);
		
		$response = $service->settle($request);
		
		return $response;
	}

	/**
	 * Cancel method
	 * 
	 * Use this method to interact with the FPS API's Cancel action. 
	 * More information at the link.
	 *
	 * @link http://docs.amazonwebservices.com/AmazonFPS/latest/FPSAdvancedGuide/Cancel.html
	 * @param array $data 
	 * @return object
	 * @author Kevin Smith
	 */
	function cancel($data = NULL)
	{
		require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/CancelRequest.php';
		
		$service = new Amazon_FPS_Client($this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'), NULL, $this->_ci->config->item('sandbox'));
	
		$request =	new Amazon_FPS_Model_CancelRequest();
		$request->setTransactionId($data['TransactionId']);
		
		return $service->cancel($request);
	}

	/**
	 * Cancel Token method
	 * 
	 * Use this method to interact with the FPS API's CancelToken action. 
	 * More information at the link.
	 *
	 * @link http://docs.amazonwebservices.com/AmazonFPS/latest/FPSAdvancedGuide/CancelToken.html
	 * @param array $data 
	 * @return object
	 * @author Kevin Smith
	 */
	function canceltoken($data = NULL)
	{
		require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/CancelTokenRequest.php';
		
		$service = new Amazon_FPS_Client($this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'), NULL, $this->_ci->config->item('sandbox'));
	
		$request =	new Amazon_FPS_Model_CancelTokenRequest();
		$request->setTokenId($data['TokenId']);
		
		return $service->cancelToken($request);
	}
	
	/**
	 * Get Transaction Status method
	 * 
	 * Use this method to interact with the FPS API's GetTransactionStatus action. 
	 * More information at the link.
	 *
	 * @link http://docs.amazonwebservices.com/AmazonFPS/latest/FPSAdvancedGuide/GetTransactionStatus.html
	 * @param array $data 
	 * @return object
	 * @author Kevin Smith
	 */
	function gettransactionstatus($data = NULL)
	{
		require_once str_replace('drivers', 'base', dirname(__FILE__)).'/Model/GetTransactionStatusRequest.php';

		$service = new Amazon_FPS_Client($this->_ci->config->item('aws_access_key_id'), $this->_ci->config->item('aws_secret_access_key'), NULL, $this->_ci->config->item('sandbox'));
		
		$request =  new Amazon_FPS_Model_GetTransactionStatusRequest();
		$request->setTransactionId($data['TransactionId']);

		return $service->GetTransactionStatus($request);
		
	}

}

/* End of file Aws_fps_api.php */
/* Location: ./application/libraries/Aws_fps/drivers/Aws_fps_api.php */