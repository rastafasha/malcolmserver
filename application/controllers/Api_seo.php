<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Seo extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->model('api_model_seo');
		$this->load->helper('url');
		$this->load->helper('text');
	}


	// Get SEO

	public function seos()
	{
		header("Access-Control-Allow-Origin: *");

		$seos = $this->api_model_seo->get_seos($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($seos)){
			foreach($seos as $seo){


				$posts[] = array(
					'id' => $seo->id,
					'title' => $seo->title,
					'description' => $seo->description,
					'keywords' => $seo->keywords,
					'copyright' => $seo->copyright,
					'image' => base_url('media/images/seo/'.$seo->image),
					'createdAt' => $seo->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_seos()
	{
		header("Access-Control-Allow-Origin: *");

		$seos = $this->api_model_seo->get_seos($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($seos)){
			foreach($seos as $seo){
				

				$posts[] = array(
					'id' => $seo->id,
					'title' => $seo->title,
					'description' => $seo->description,
					'keywords' => $seo->keywords,
					'copyright' => $seo->copyright,
					'image' => base_url('media/images/seo/'.$seo->image),
					'createdAt' => $seo->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function seo($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$seo = $this->api_model_seo->get_seo($id);

		$author = $seo->firstName.' '.$seo->lastName;

		$post = array(
			'id' => $seo->id,
			'title' => $seo->title,
			'description' => $seo->description,
			'keywords' => $seo->keywords,
			'copyright' => $seo->copyright,
			'image' => base_url('media/images/seo/'.$seo->image),
			'createdAt' => $seo->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_seos()
	{
		header("Access-Control-Allow-Origin: *");

		$seos = $this->api_model_seo->get_seos($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($seos)){
			foreach($seos as $seo){
				

				$posts[] = array(
					'id' => $seo->id,
					'title' => $seo->title,
					'description' => $seo->description,
					'keywords' => $seo->keywords,
					'copyright' => $seo->copyright,
					'image' => base_url('media/images/seo/'.$seo->image),
					'createdAt' => $seo->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}
	//


	// Manage Seo

	public function adminSeos()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$seos = $this->api_model_seo->get_admin_seos();
			foreach($seos as $seo) {
				$posts[] = array(
					'id' => $seo->id,
					'title' => $seo->title,
					'description' => $seo->description,
					'keywords' => $seo->keywords,
					'copyright' => $seo->copyright,
					'image' => base_url('media/images/seo/'.$seo->image),
					'createdAt' => $seo->createdAt
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminSeo($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$seo = $this->api_model_seo->get_admin_seo($id);

			$post = array(
				'id' => $seo->id,
					'title' => $seo->title,
					'description' => $seo->description,
					'keywords' => $seo->keywords,
					'copyright' => $seo->copyright,
					'image' => base_url('media/images/seo/'.$seo->image),
					'createdAt' => $seo->createdAt
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createSeo()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$keywords = $this->input->post('keywords');
			$copyright = $this->input->post('copyright');

			$filename = NULL;

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/seo/';
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
	        	$seoData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'keywords' => $keywords,
					'copyright' => $copyright,
					'image' => $filename,
					'createdAt' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model_seo->insertSeo($seoData);

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

	public function updateSeo($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$seo = $this->api_model_seo->get_admin_seo($id);
			$filename = $seo->image;

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$keywords = $this->input->post('keywords');
			$copyright = $this->input->post('copyright');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/seo/';
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
	   
					if($seo->image && file_exists(FCPATH.'media/images/seo/'.$seo->image))
					{
						unlink(FCPATH.'media/images/seo/'.$seo->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$seoData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'keywords' => $keywords,
					'copyright' => $copyright,
					'image' => $filename,
				);

				$this->api_model_seo->updateSeo($id, $seoData);

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

	public function deleteSeo($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$seo = $this->api_model_seo->get_admin_seo($id);

			if($seo->image && file_exists(FCPATH.'media/images/seo/'.$seo->image))
			{
				unlink(FCPATH.'media/images/seo/'.$seo->image);
			}

			$this->api_model_seo->deleteSeo($id);

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
