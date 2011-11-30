<?php defined('SYSPATH') or die('No direct script access.');

return array(
	
	// ideally will eventually support orm/jelly/mango/sprig, but for now just mango
	'driver'	=> 'mango', 
	
	// absolute server path to your upload folder
	'base_dir'	=> '/var/www/uploads',
	
	// allowed file types () 		
	'allowed'	=> array('gif', 'jpg', 'jpeg', 'png'),
	
);