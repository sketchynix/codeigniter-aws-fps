<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Driver Library for AWS FPS
 *
 * @package AWS_FPS
 * @author Kevin Smith
 */
class Aws_fps extends CI_Driver_Library {
	
	// Codeigniter superobject
	protected $_ci;
	
	function __construct()
	{
		$this->_ci = get_instance();
		
		// Load the config
		$this->_ci->load->config('aws_fps');
		
		// Get valid drivers
		foreach ($this->_ci->config->item('valid_drivers') AS $driver)
		{
		    $this->valid_drivers[] = strtolower(__CLASS__).'_'.$driver;
		}
		
	}
	
}

/* End of file Aws_fps.php */
/* Location: ./application/libraries/Aws_fps/Aws_fps.php */