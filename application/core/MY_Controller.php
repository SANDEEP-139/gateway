<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_Controller extends CI_Controller
{
 
  function __construct()
  {
    parent::__construct();
	
	
  }
  public function sendtext($to,$msg){
			
      $url = 'uname=qassess';
      $url.= '&pwd=qes_2016';
      $url.= '&senderid=QESEXM';
      $url.= '&to='.$to;
      $url.= '&msg='.urlencode($msg);
	  $url.= '&route=T';
      $urltouse =  'http://api.sms2support.com/sendsms?'.$url;
		//echo var_dump($urltouse); exit;
		$response = file_get_contents($urltouse);
		
		return $response;
		
	}
}
 
class Admin_controller extends MY_controller
{
public $layout;
  function __construct()
  {
    parent::__construct();
	$this->layout	= 'backend/layout/main';
  }
}
 
class Public_controller extends MY_controller
{
	public $layout;
  function __construct()
  {
    parent::__construct();
	$this->layout	= 'layout/main';

  }
}