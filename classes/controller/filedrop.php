<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Filedrop - Render Views and Routes for interacting with Filedrop
 * 
 * @todo	Documentation
 */
class Controller_Filedrop extends Controller_Template
{

	public $template = 'filedrop/template';
	
	public function action_index ()
	{
		//var_dump(Filedrop::instance());
		$this->template->page->content = View::factory('filedrop/filedrop');
	}
	
	public function action_files ()
	{
		$files = Mango::factory('resource');

	}
	
	public function action_sharing ()
	{
		$this->template->action = View::factory('filedrop/actions/sharing');
	}
	
	public function action_upload ()
	{
		
	}
	
	//Statif File Serving
	public function action_media()
	{
		// Get the file path from the request
		$file = $this->request->param('file');

		// Find the file extension
		$ext = pathinfo($file, PATHINFO_EXTENSION);

		// Remove the extension from the filename
		$file = substr($file, 0, -(strlen($ext) + 1));

		if ($file = Kohana::find_file('media/filedrop', $file, $ext))
		{
			// Check if the browser sent an "if-none-match: <etag>" header, and tell if the file hasn't changed
			$this->response->check_cache(sha1($this->request->uri()).filemtime($file), $this->request);
			
			// Send the file content as the response
			$this->response->body(file_get_contents($file));

			// Set the proper headers to allow caching
			$this->response->headers('content-type',  File::mime_by_ext($ext));
			$this->response->headers('last-modified', date('r', filemtime($file)));
		}
		else
		{
			// Return a 404 status
			$this->response->status(404);
		}
	}
	
	public function before ()
	{
		parent::before();

		if ( $this->auto_render )
		{
			$this->template->title = 'Filedrop Module v1.0';
			$this->template->nav = View::factory('filedrop/nav');
			$this->template->page = View::factory('filedrop/page');
			$this->template->page->content = '';
			$this->template->scripts = array();
			$this->template->styles = array();
		}
	}
	
	public function after ()
	{
		if ( $this->auto_render )
		{
			$styles = array(
				'media/filedrop/css/style.css' => 'screen',
			);
			
			$scripts = array(
				'media/filedrop/js/scripts.js',
				'media/filedrop/jquery.filedrop.js',
				'http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js',
			);
			
			$this->template->scripts = array_reverse(array_merge($this->template->scripts, $scripts));
			$this->template->styles = array_reverse(array_merge($this->template->styles, $styles));	
		}
		
		parent::after();
	}

}