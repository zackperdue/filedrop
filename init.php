<?php

Route::set('ajax', 'ajax/<action>')
	->defaults(array(
		'directory' => 'ajax',
		'controller' => 'filedrop',
		'action' => 'index',
	));

Route::set('filedrop', 'dashboard/filedrop(/<action>)')
	->defaults(array(
		'directory' => 'dashboard',
		'controller' => 'filedrop',
		'action' => 'index',
	));