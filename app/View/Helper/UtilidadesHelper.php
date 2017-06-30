<?php 

App::uses('CakeTime', 'Utility');

class UtilidadesHelper extends AppHelper
{
	public $helpers = array('Time');

	function __construct()
	{
		// App::import("Model","User");	
		// $this->User = new User();
		// App::import("Model","Activity");	
		// $this->Activity = new Activity();
		// App::import("Model","Blog");	
		// $this->Blog = new Blog();	
	}

	public function getSessionVar($var_name){
		return CakeSession::read($var_name);
	}

}
?>