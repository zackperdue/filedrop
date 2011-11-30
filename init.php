<?php defined('SYSPATH') or die('No direct script access.');

// Static file serving (CSS, JS, images)
Route::set('filedrop/media', 'media/filedrop(/<file>)', array('file' => '.+'))
	->defaults(array(
		'controller' => 'filedrop',
		'action'     => 'media',
		'file'       => NULL,
	));

Route::set('ajax', 'ajax/<action>')
	->defaults(array(
		'directory' => 'ajax',
		'controller' => 'filedrop',
		'action' => 'index',
	));

Route::set('filedrop', 'filedrop(/<action>)')
	->defaults(array(
		'controller' => 'filedrop',
		'action' => 'index',
	));