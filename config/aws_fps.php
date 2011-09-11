<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Valid Drivers
|--------------------------------------------------------------------------
|
| Make sure you list each driver WITHOUT the prefix 'Aws_fps'.
|
|
*/
$config['valid_drivers'] = array('api', 'get_cbui_url', 'validate_request');

/*
|--------------------------------------------------------------------------
| AWS Keys
|--------------------------------------------------------------------------
|
| Get these from your account management page on http://aws.amazon.com
|
|
*/
$config['aws_access_key_id'] = '';

$config['aws_secret_access_key'] = '';

/*
|--------------------------------------------------------------------------
| Using Sandbox?
|--------------------------------------------------------------------------
|
| If this is in a development environment, you'll most likely set this to 
| TRUE. If not using the Payments Sandbox, set to FALSE.
|
*/
$config['sandbox']	= TRUE;


// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Autoloader
|--------------------------------------------------------------------------
|
| PHP only allows one __autoload function at a time, so if you already have
| CodeIgniter using this function elsewhere, you'll have to incorporate this
| into your existing __autoload function. Otherwise...
| 
| DO NOT EDIT THIS!
|
*/
// if(!function_exists('__autoload'))
// {
// 	log_message('debug', 'Autoload started.');
// 	function __autoload($className){
// 		
// 		echo "Autoload: Want to load $className.\n";
// 		
// 		if (stripos($className, 'Amazon_FPS_'))
// 		{
// 			$fileName = str_replace('Amazon_FPS_', '', $className);
// 			$fileName = str_replace('_', DIRECTORY_SEPARATOR, $fileName) . '.php';
// 			include_once APPPATH . 'libraries/Aws_fps/base/' . $fileName;			
// 		}
// 		
// 		log_message('debug', 'Autoload completed.');
// 		return;
// 	}
// }



/* End of file aws_fps.php */
/* Location: ./application/config/aws_fps.php */