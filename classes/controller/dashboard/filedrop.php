<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard_Filedrop extends Controller_Template
{
	
	public $template = 'filedrop/template';
	
	public function action_index()
	{
		$this->template->page->content = View::factory('filedrop/dashboard/filedrop');
	}
	
	public function action_files()
	{
		$files = Mango::factory('resource');

	}
	
	public function action_sharing()
	{
		$this->template->action = View::factory('filedrop/dashboard/actions/sharing');
		
		
		
	}
	
	public function action_upload()
	{
		
	}
	
	public function before()
	{
		parent::before();

		if($this->auto_render)
		{
			$this->template->title = 'Filedrop Module v1.0';
			$this->template->nav = View::factory('filedrop/nav');
			$this->template->page = View::factory('filedrop/dashboard/page');
			$this->template->page->content = '';
			$this->template->scripts = array();
			$this->template->styles = array();
		}		
	}
	
	public function after()
	{
		if($this->auto_render)
		{
			$styles = array(
				'resources/css/style.css' => 'screen',
			);
			
			$scripts = array(
				'resources/js/scripts.js',
				'resources/js/jquery.filedrop.js',
				'http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js',
			);
			
			$this->template->scripts = array_reverse(array_merge($this->template->scripts, $scripts));
			$this->template->styles = array_reverse(array_merge($this->template->styles, $styles));	
		}
		
		parent::after();
	}

}