<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_webdesing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->model('api_model_webdesing');
		$this->load->helper('url');
		$this->load->helper('text');
	}


	// Get webdesing
	public function webdesings()
	{
		header("Access-Control-Allow-Origin: *");

		$webdesings = $this->api_model_webdesing->get_webdesings($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($webdesings)){
			foreach($webdesings as $webdesing){

				$short_desc = strip_tags(character_limiter($webdesing->description, 70));
				$author = $webdesing->firstName.' '.$webdesing->lastName;

				$posts[] = array(
					'id' => $webdesing->id,
					'title' => $webdesing->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $webdesing->description,
					'clasName' => $webdesing->clasName,
					'technology' => $webdesing->technology,
					'popup' => $webdesing->popup,
					'url' => $webdesing->url,
					'author' => $author,
					'image' => base_url('media/images/webdesing/'.$webdesing->image),
					'createdAt' => $webdesing->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_webdesings()
	{
		header("Access-Control-Allow-Origin: *");

		$webdesings = $this->api_model_webdesing->get_webdesings($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($webdesings)){
			foreach($webdesings as $webdesing){
				
				$short_desc = strip_tags(character_limiter($webdesing->description, 70));
				$author = $webdesing->firstName.' '.$webdesing->lastName;

				$posts[] = array(
					'id' => $webdesing->id,
					'title' => $webdesing->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $webdesing->description,
					'clasName' => $webdesing->clasName,
					'popup' => $webdesing->popup,
					'technology' => $webdesing->technology,
					'url' => $webdesing->url,
					'author' => $author,
					'image' => base_url('media/images/webdesing/'.$webdesing->image),
					'createdAt' => $webdesing->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function webdesing($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$webdesing = $this->api_model_webdesing->get_webdesing($id);

		$author = $webdesing->firstName.' '.$webdesing->lastName;

		$post = array(
			'id' => $webdesing->id,
			'title' => $webdesing->title,
			'description' => $webdesing->description,
			'clasName' => $webdesing->clasName,
			'popup' => $webdesing->popup,
			'technology' => $webdesing->technology,
			'url' => $webdesing->url,
			'author' => $author,
			'image' => base_url('media/images/webdesing/'.$webdesing->image),
			'createdAt' => $webdesing->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_webdesings()
	{
		header("Access-Control-Allow-Origin: *");

		$webdesings = $this->api_model_webdesing->get_webdesings($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($webdesings)){
			foreach($webdesings as $webdesing){
				
				$short_desc = strip_tags(character_limiter($webdesing->description, 70));
				$author = $webdesing->firstName.' '.$webdesing->lastName;

				$posts[] = array(
					'id' => $webdesing->id,
					'title' => $webdesing->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $webdesing->description,
					'clasName' => $webdesing->clasName,
					'popup' => $webdesing->popup,
					'technology' => $webdesing->technology,
					'url' => $webdesing->url,
					'author' => $author,
					'image' => base_url('media/images/webdesing/'.$webdesing->image),
					'createdAt' => $webdesing->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//


	// Manage webdesing

	public function adminWebdesings()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$webdesings = $this->api_model_webdesing->get_admin_webdesings();
			foreach($webdesings as $webdesing) {
				$posts[] = array(
					'id' => $webdesing->id,
					'title' => $webdesing->title,
					'description' => $webdesing->description,
					'clasName' => $webdesing->clasName,
					'popup' => $webdesing->popup,
					'technology' => $webdesing->technology,
					'url' => $webdesing->url,
					'image' => base_url('media/images/webdesing/'.$webdesing->image),
					'createdAt' => $webdesing->createdAt
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminWebdesing($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$webdesing = $this->api_model_webdesing->get_admin_webdesing($id);

			$post = array(
				'id' => $webdesing->id,
				'title' => $webdesing->title,
				'description' => $webdesing->description,
				'clasName' => $webdesing->clasName,
				'popup' => $webdesing->popup,
				'technology' => $webdesing->technology,
				'url' => $webdesing->url,
				'image' => base_url('media/images/webdesing/'.$webdesing->image),
				'isFeatured' => $webdesing->isFeatured,
				'isActive' => $webdesing->isActive
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createWebdesing()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$clasName = $this->input->post('clasName');
			$popup = $this->input->post('popup');
			$technology = $this->input->post('technology');
			$url = $this->input->post('url');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$filename = NULL;

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/webdesing/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 500;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('image')) {

	            	$isUploadError = TRUE;

					$response = array(
						'status' => 'error',
						'message' => $this->upload->display_errors()
					);
	            }
	            else {
	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$webdesingData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'clasName' => $clasName,
					'popup' => $popup,
					'technology' => $technology,
					'url' => $url,
					'image' => $filename,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive,
					'createdAt' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model_webdesing->insertWebdesing($webdesingData);

				$response = array(
					'status' => 'success'
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
		}
	}

	public function updateWebdesing($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$webdesing = $this->api_model_webdesing->get_admin_webdesing($id);
			$filename = $webdesing->image;

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$clasName = $this->input->post('clasName');
			$popup = $this->input->post('popup');
			$technology = $this->input->post('technology');
			$url = $this->input->post('url');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/webdesing/';
	            $config['allowed_types']        = 'gif|jpg|png|jpeg';
	            $config['max_size']             = 500;

	            $this->load->library('upload', $config);
	            if ( ! $this->upload->do_upload('image')) {

	            	$isUploadError = TRUE;

					$response = array(
						'status' => 'error',
						'message' => $this->upload->display_errors()
					);
	            }
	            else {
	   
					if($webdesing->image && file_exists(FCPATH.'media/images/webdesing/'.$webdesing->image))
					{
						unlink(FCPATH.'media/images/webdesing/'.$webdesing->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$webdesingData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'clasName' => $clasName,
					'popup' => $popup,
					'technology' => $technology,
					'url' => $url,
					'image' => $filename,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive
				);

				$this->api_model_webdesing->updateWebdesing($id, $webdesingData);

				$response = array(
					'status' => 'success'
				);
           	}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
		}
	}

	public function deleteWebdesing($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$webdesing = $this->api_model_webdesing->get_admin_webdesing($id);

			if($webdesing->image && file_exists(FCPATH.'media/images/webdesing/'.$webdesing->image))
			{
				unlink(FCPATH.'media/images/webdesing/'.$webdesing->image);
			}

			$this->api_model_webdesing->deleteWebdesing($id);

			$response = array(
				'status' => 'success'
			);

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
		}
	}

	//





}
