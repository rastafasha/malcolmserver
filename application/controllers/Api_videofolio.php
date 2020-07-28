<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Videofolio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->model('api_model_videofolio');
		$this->load->helper('url');
		$this->load->helper('text');
	}

	// Get multimedia
	public function videofolios()
	{
		header("Access-Control-Allow-Origin: *");

		$videofolios = $this->api_model_videofolio->get_videofolios($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($videofolios)){
			foreach($videofolios as $videofolio){


				$posts[] = array(
					'id' => $videofolio->id,
					'title' => $videofolio->title,
					'description' => $videofolio->description,
					'technology' => $videofolio->technology,
					'url' => $videofolio->url,
					'createdAt' => $videofolio->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_videofolios()
	{
		header("Access-Control-Allow-Origin: *");

		$videofolios = $this->api_model_videofolio->get_videofolios($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($videofolios)){
			foreach($videofolios as $videofolio){
				

				$posts[] = array(
					'id' => $videofolio->id,
					'title' => $videofolio->title,
					'description' => $videofolio->description,
					'technology' => $videofolio->technology,
					'url' => $videofolio->url,
					'createdAt' => $videofolio->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function videofolio($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$videofolio = $this->api_model_videofolio->get_videofolio($id);

		$author = $videofolio->firstName.' '.$videofolio->lastName;

		$post = array(
			'id' => $videofolio->id,
					'title' => $videofolio->title,
					'description' => $videofolio->description,
					'technology' => $videofolio->technology,
					'url' => $videofolio->url,
					'createdAt' => $videofolio->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_videofolios()
	{
		header("Access-Control-Allow-Origin: *");

		$videofolios = $this->api_model_videofolio->get_videofolios($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($videofolios)){
			foreach($videofolios as $videofolio){
				

				$posts[] = array(
					'id' => $videofolio->id,
					'title' => $videofolio->title,
					'description' => $videofolio->description,
					'technology' => $videofolio->technology,
					'url' => $videofolio->url,
					'createdAt' => $videofolio->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//

	// Manage multimedia

	public function adminVideofolios()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$videofolios = $this->api_model_videofolio->get_admin_videofolios();
			foreach($videofolios as $videofolio) {
				$posts[] = array(
					'id' => $videofolio->id,
					'title' => $videofolio->title,
					'description' => $videofolio->description,
					'technology' => $videofolio->technology,
					'url' => $videofolio->url,
					'createdAt' => $videofolio->createdAt
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminVideofolio($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$videofolio = $this->api_model_videofolio->get_admin_videofolio($id);

			$post = array(
				'id' => $videofolio->id,
				'title' => $videofolio->title,
				'description' => $videofolio->description,
				'technology' => $videofolio->technology,
				'isFeatured' => $videofolio->isFeatured,
				'isActive' => $videofolio->isActive
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createVideofolio()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$technology = $this->input->post('technology');
			$url = $this->input->post('url');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$filename = NULL;

			$isUploadError = FALSE;

			if( ! $isUploadError) {
	        	$videofolioData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'technology' => $technology,
					'url' => $url,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive,
					'createdAt' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model->insertVideofolio($videofolioData);

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

	public function updateVideofolio($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$videofolio = $this->api_model_videofolio->get_admin_videofolio($id);

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$technology = $this->input->post('technology');
			$url = $this->input->post('url');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$isUploadError = FALSE;

			

			if( ! $isUploadError) {
	        	$videofolioData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'technology' => $technology,
					'url' => $url,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive
				);

				$this->api_model_videofolio->updateVideofolio($id, $videofolioData);

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

	public function deleteVideofolio($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$videofolio = $this->api_model_videofolio->get_admin_videofolio($id);

			

			$this->api_model_videofolio->deleteVideofolio($id);

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
