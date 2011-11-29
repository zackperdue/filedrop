<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Filedrop - File management module for Kohana PHP Framework
 * Based on Wouterrr's Mango and A1, and Bryan Galli's Contacts
 * 
 * @copyright	(c) 2011 Zack Perdue
 * @copyright	(c) 2011 Clay McIlrath
 * @license		MIT
 * 
 * @todo		Documentation
 */
abstract class Filedrop_Core
{
	protected $_name;
		
	/**
	 * Configuration of driver, paths and other settings
	 * 
	 * @var	array
	 */
	protected $_config;
	
	/**
	 * Multi-dimentional data array that gets sent to the view
	 *
	 * @var array
	 */
	public $data;

	/**
	 * The user id used throughout this class
	 *
	 * @var string
	 */
	protected $_uid;

	/**
	 * The view which is being called
	 *
	 * @var string
	 */
	protected $_view;

    
	/**
	 * Return a static instance of Filedrop
	 *
	 * @return  object
	 */
	public static function instance ($_name = 'filedrop')
	{
		static $_instances;

		if ( ! isset($_instances[$_name]))
		{
			$_config = Kohana::$config->load($_name);
			$_driver = isset($_config['driver']) ? $_config['driver'] : 'ORM';
			$_class  = 'Filedrop_'.ucfirst($_driver);

			$_instances[$_name] = new $_class($_name, $_config);
		}

		return $_instances[$_name];
	}
	
    public function __construct ($_name = 'filedrop', $config, $uid = null)
    {
    	$this->_name = $_name;
        $this->_uid = $uid;
		$this->_config = Kohana::$config->load($config); 
    }


	public static function factory ($config = null, $uid = null)
    {
    	if ( $uid )
        	return new Filedrop($uid);
		else 
			return new Filedrop;
    }
}