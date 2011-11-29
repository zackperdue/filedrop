<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Ajax Interactions
 * 
 * @todo	Documentation
 */
class Controller_Ajax_Filedrop extends Controller
{	
	public $auto_render = false;
	
	public $config;
	
	public function action_index()
	{
		$this->response->body('hello');	
	}
	
	public function action_upload()
	{
		
		$file = Validation::factory($_FILES)
					->rule('file', 'Upload::not_empty', array(':value'))
					->rule('file', 'Upload::valid', array(':value'))
					->rule('file', 'Upload::type', array(':value', $this->config['allowed']));
					
					
		if ( $file->check() )
		{
			$status = 'success';
			$uploaded = Upload::save($file['file']);
		}
		else
		{
			$errors = $file->errors();
			$data = array(
				'status' => 'failed',
				'errors' => $errors,
			);
		}
		
		$data = array(
			'status' => $status,
			'uploaded' => $uploaded,
			'errors' => false,
		);
		
		$this->response->body(json_encode($data));
		
	}
	
	public function list_resources()
	{
		if ( $_POST )
		{
			
		}
	}
	
	public function action_create_directory()
	{
		$data = array(
			'status' => 'failed',
			'message' => '',
			'errors' => false,
		);
		
		if ( $_POST )
		{
			$post = Validation::factory($_POST)->rule('dirname', 'Valid::alpha_dash');
			
			if ( $post->check() )
			{
				$location = $this->config['base_dir'].$post['dirname'];
				$data['location'] = $location;
				
				if ( ! is_dir($location) )
				{				
					if ( mkdir($location, 0777, false) )
					{
						$data['status'] = 'success';
						$data['message'] = 'Your directory was created.';	
					}
					else
					{
						$data['status'] = 'failed';
						$data['message'] = 'Could not create directory.';
					}
				}
				else
				{
					$data['status'] = 'failed';
					$data['message'] = 'Directory already exists.';
				}
			}
			else
			{
				$errors = $post->errors('filedrop');
				$data['errors'] = $errors;
			}			
						
		}
		
		$this->response->body(json_encode($data));
	}
		
	public function before()
	{
		parent::before();
		
		$this->config = Kohana::$config->load('filedrop');
		
		$this->auto_render = false;
	}
	
	public function after()
	{
		parent::after();
	}
}