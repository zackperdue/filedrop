<?php defined('SYSPATH') or die('No direct script access.');

abstract class Filedrop_Core
{
	
	private $_config;
	
	public function __construct($config)
	{
		
		$this->_config = Kohana::$config->load($config); 
		
	}
	
	public static function factory($config = NULL)
	{
			
	}
		
	
}

?>