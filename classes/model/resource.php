<?php defined('SYSPATH') or die('No direct script access.');

class Model_Resource extends Mango
{
	
	public $_fields = array(
		'_id' => array(
			'type' => 'MongoId',
		),
		'path' => array(
			'type' => 'string',
		),
		'name' => array(
			'type' => 'string',
		),
		'extension' => array(
			'type' => 'string',
		),
		'mime' => array(
			'type' => 'string',
		),
		'type' => array(
			'type' => 'enum',
			'values' => array('file', 'directory'),
		),
		'dateCreated' => array(
			'type' => 'date',
		),
		'dateModified' => array(
			'type' => 'date',
		),
		'downloads' => array(
			'type' => 'counter',
		),
	);
	
}

?>