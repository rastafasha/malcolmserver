<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Grafico extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->model('api_model_grafico');
		$this->load->helper('url');
		$this->load->helper('text');
	}

	

	// Get Grafico
	public function graficos()
	{
		header("Access-Control-Allow-Origin: *");

		$graficos = $this->api_model_grafico->get_graficos($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($graficos)){
			foreach($graficos as $grafico){

				$short_desc = strip_tags(character_limiter($grafico->description, 70));
				$author = $grafico->firstName.' '.$grafico->lastName;

				$posts[] = array(
					'id' => $grafico->id,
					'title' => $grafico->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $grafico->description,
					'clasName' => $grafico->clasName,
					'technology' => $grafico->technology,
					'popup' => $grafico->popup,
					'url' => $grafico->url,
					'author' => $author,
					'image' => base_url('media/images/grafico/'.$grafico->image),
					'createdAt' => $grafico->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_graficos()
	{
		header("Access-Control-Allow-Origin: *");

		$graficos = $this->api_model_grafico->get_graficos($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($graficos)){
			foreach($graficos as $grafico){
				
				$short_desc = strip_tags(character_limiter($grafico->description, 70));
				$author = $grafico->firstName.' '.$grafico->lastName;

				$posts[] = array(
					'id' => $grafico->id,
					'title' => $grafico->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $grafico->description,
					'clasName' => $grafico->clasName,
					'popup' => $grafico->popup,
					'technology' => $grafico->technology,
					'url' => $grafico->url,
					'author' => $author,
					'image' => base_url('media/images/grafico/'.$grafico->image),
					'createdAt' => $grafico->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function grafico($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$grafico = $this->api_model_grafico->get_grafico($id);

		$author = $grafico->firstName.' '.$grafico->lastName;

		$post = array(
			'id' => $grafico->id,
			'title' => $grafico->title,
			'description' => $grafico->description,
			'clasName' => $grafico->clasName,
			'popup' => $grafico->popup,
			'technology' => $grafico->technology,
			'url' => $grafico->url,
			'author' => $author,
			'image' => base_url('media/images/grafico/'.$grafico->image),
			'createdAt' => $grafico->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_graficos()
	{
		header("Access-Control-Allow-Origin: *");

		$graficos = $this->api_model_grafico->get_graficos($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($graficos)){
			foreach($graficos as $grafico){
				
				$short_desc = strip_tags(character_limiter($grafico->description, 70));
				$author = $grafico->firstName.' '.$grafico->lastName;

				$posts[] = array(
					'id' => $grafico->id,
					'title' => $grafico->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $grafico->description,
					'clasName' => $grafico->clasName,
					'popup' => $grafico->popup,
					'technology' => $grafico->technology,
					'url' => $grafico->url,
					'author' => $author,
					'image' => base_url('media/images/grafico/'.$grafico->image),
					'createdAt' => $grafico->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//

	// Manage Grafico

	public function adminGraficos()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$graficos = $this->api_model_grafico->get_admin_graficos();
			foreach($graficos as $grafico) {
				$posts[] = array(
					'id' => $grafico->id,
					'title' => $grafico->title,
					'description' => $grafico->description,
					'clasName' => $grafico->clasName,
					'popup' => $grafico->popup,
					'technology' => $grafico->technology,
					'url' => $grafico->url,
					'image' => base_url('media/images/grafico/'.$grafico->image),
					'createdAt' => $grafico->createdAt
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminGrafico($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$grafico = $this->api_model_grafico->get_admin_grafico($id);

			$post = array(
				'id' => $grafico->id,
				'title' => $grafico->title,
				'description' => $grafico->description,
				'clasName' => $grafico->clasName,
				'popup' => $grafico->popup,
				'technology' => $grafico->technology,
				'url' => $grafico->url,
				'image' => base_url('media/images/grafico/'.$grafico->image),
				'isFeatured' => $grafico->isFeatured,
				'isActive' => $grafico->isActive
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createGrafico()
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

				$config['upload_path']          = './media/images/grafico/';
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
	        	$graficoData = array(
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

				$id = $this->api_model_grafico->insertGrafico($graficoData);

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

	public function updateGrafico($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$grafico = $this->api_model_grafico->get_admin_grafico($id);
			$filename = $grafico->image;

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

				$config['upload_path']          = './media/images/grafico/';
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
	   
					if($grafico->image && file_exists(FCPATH.'media/images/grafico/'.$grafico->image))
					{
						unlink(FCPATH.'media/images/grafico/'.$grafico->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$graficoData = array(
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

				$this->api_model_grafico->updateGrafico($id, $graficoData);

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

	public function deleteGrafico($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$grafico = $this->api_model_grafico->get_admin_grafico($id);

			if($grafico->image && file_exists(FCPATH.'media/images/grafico/'.$grafico->image))
			{
				unlink(FCPATH.'media/images/grafico/'.$grafico->image);
			}

			$this->api_model_grafico->deleteGrafico($id);

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
