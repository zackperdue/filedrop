<?php defined('SYSPATH') or die('No direct script access.');

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