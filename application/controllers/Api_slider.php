<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_Slider extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->model('api_model_slider');
		$this->load->helper('url');
		$this->load->helper('text');
	}

	// Get Blog
	public function sliders()
	{
		header("Access-Control-Allow-Origin: *");

		$sliders = $this->api_model_slider->get_sliders($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($sliders)){
			foreach($sliders as $slider){


				$posts[] = array(
					'id' => $slider->id,
					'title' => $slider->title,
					'description' => $slider->description,
					'class' => $slider->class,
					'align' => $slider->align,
					'isActive' => $slider->isActive,
					'image' => base_url('media/images/slider/'.$slider->image),
					'createdAt' => $slider->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}


	public function slider($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$slider = $this->api_model_slider->get_slider($id);


		$post = array(
			'id' => $slider->id,
					'title' => $slider->title,
					'description' => $slider->description,
					'class' => $slider->class,
					'align' => $slider->align,
					'isActive' => $slider->isActive,
					'image' => base_url('media/images/slider/'.$slider->image),
					'createdAt' => $slider->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_sliders()
	{
		header("Access-Control-Allow-Origin: *");

		$sliders = $this->api_model_slider->get_sliders($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($sliders)){
			foreach($sliders as $slider){
				

				$posts[] = array(
					'id' => $slider->id,
					'title' => $slider->title,
					'description' => $slider->description,
					'class' => $slider->class,
					'align' => $slider->align,
					'isActive' => $slider->isActive,
					'image' => base_url('media/images/slider/'.$slider->image),
					'createdAt' => $slider->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//

	


	


	// Manage Blog

	public function adminSliders()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$sliders = $this->api_model_slider->get_admin_sliders();
			foreach($sliders as $slider) {
				$posts[] = array(
					'id' => $slider->id,
					'title' => $slider->title,
					'description' => $slider->description,
					'class' => $slider->class,
					'align' => $slider->align,
					'isActive' => $slider->isActive,
					'image' => base_url('media/images/slider/'.$slider->image),
					'createdAt' => $slider->createdAt
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminSlider($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$slider = $this->api_model_slider->get_admin_slider($id);

			$post = array(
				'id' => $slider->id,
					'title' => $slider->title,
					'description' => $slider->description,
					'class' => $slider->class,
					'align' => $slider->align,
					'isActive' => $slider->isActive,
					'image' => base_url('media/images/slider/'.$slider->image),
					'createdAt' => $slider->createdAt
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createSlider()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$class = $this->input->post('class');
			$align = $this->input->post('align');
			$isActive = $this->input->post('isActive');

			$filename = NULL;

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/slider/';
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
	        	$sliderData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'image' => $filename,
					'class' => $class,
					'align' => $align,
					'isActive' => $isActive,
					'createdAt' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model_slider->insertSlider($sliderData);

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

	public function updateSlider($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$slider = $this->api_model_slider->get_admin_slider($id);
			$filename = $slider->image;

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$class = $this->input->post('class');
			$align = $this->input->post('align');
			$isActive = $this->input->post('isActive');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/slider/';
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
	   
					if($slider->image && file_exists(FCPATH.'media/images/slider/'.$slider->image))
					{
						unlink(FCPATH.'media/images/'.$slider->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$sliderData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'image' => $filename,
					'class' => $class,
					'align' => $align,
					'isActive' => $isActive
				);

				$this->api_model_slider->updateSlider($id, $sliderData);

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

	public function deleteSlider($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$slider = $this->api_model_slider->get_admin_slider($id);

			if($blog->image && file_exists(FCPATH.'media/images/sliders'.$slider->image))
			{
				unlink(FCPATH.'media/images/slider'.$slider->image);
			}

			$this->api_model_slider->deleteSlider($id);

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
