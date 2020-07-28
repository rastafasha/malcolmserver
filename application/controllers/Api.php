<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('api_model');
		$this->load->helper('url');
		$this->load->helper('text');
	}

	// Get Blog
	public function blogs()
	{
		header("Access-Control-Allow-Origin: *");

		$blogs = $this->api_model->get_blogs($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($blogs)){
			foreach($blogs as $blog){

				$short_desc = strip_tags(character_limiter($blog->description, 70));
				$author = $blog->firstName.' '.$blog->lastName;

				$posts[] = array(
					'id' => $blog->id,
					'title' => $blog->title,
					'short_desc' => html_entity_decode($short_desc),
					'author' => $author,
					'image' => base_url('media/images/'.$blog->image),
					'createdAt' => $blog->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function featured_blogs()
	{
		header("Access-Control-Allow-Origin: *");

		$blogs = $this->api_model->get_blogs($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($blogs)){
			foreach($blogs as $blog){
				
				$short_desc = strip_tags(character_limiter($blog->description, 70));
				$author = $blog->firstName.' '.$blog->lastName;

				$posts[] = array(
					'id' => $blog->id,
					'title' => $blog->title,
					'short_desc' => html_entity_decode($short_desc),
					'author' => $author,
					'image' => base_url('media/images/'.$blog->image),
					'createdAt' => $blog->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	public function blog($id)
	{
		header("Access-Control-Allow-Origin: *");
		
		$blog = $this->api_model->get_blog($id);

		$author = $blog->firstName.' '.$blog->lastName;

		$post = array(
			'id' => $blog->id,
			'title' => $blog->title,
			'description' => $blog->description,
			'author' => $author,
			'image' => base_url('media/images/'.$blog->image),
			'createdAt' => $blog->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_blogs()
	{
		header("Access-Control-Allow-Origin: *");

		$blogs = $this->api_model->get_blogs($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($blogs)){
			foreach($blogs as $blog){
				
				$short_desc = strip_tags(character_limiter($blog->description, 70));
				$author = $blog->firstName.' '.$blog->lastName;

				$posts[] = array(
					'id' => $blog->id,
					'title' => $blog->title,
					'short_desc' => html_entity_decode($short_desc),
					'author' => $author,
					'image' => base_url('media/images/'.$blog->image),
					'createdAt' => $blog->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//

	// Get webdesing
	public function webdesings()
	{
		header("Access-Control-Allow-Origin: *");

		$webdesings = $this->api_model->get_webdesings($featured=false, $recentpost=false);

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

		$webdesings = $this->api_model->get_webdesings($featured=true, $recentpost=false);

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
		
		$webdesing = $this->api_model->get_webdesing($id);

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

		$webdesings = $this->api_model->get_webdesings($featured=false, $recentpost=5);

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


	// Get Grafico
	public function graficos()
	{
		header("Access-Control-Allow-Origin: *");

		$graficos = $this->api_model->get_graficos($featured=false, $recentpost=false);

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

		$graficos = $this->api_model->get_graficos($featured=true, $recentpost=false);

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
		
		$grafico = $this->api_model->get_grafico($id);

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

		$graficos = $this->api_model->get_graficos($featured=false, $recentpost=5);

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

	// Get multimedia
	public function videofolios()
	{
		header("Access-Control-Allow-Origin: *");

		$videofolios = $this->api_model->get_videofolios($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($videofolios)){
			foreach($videofolios as $videofolio){

				$short_desc = strip_tags(character_limiter($videofolio->description, 70));
				$author = $videofolio->firstName.' '.$videofolio->lastName;

				$posts[] = array(
					'id' => $videofolio->id,
					'title' => $videofolio->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $videofolio->description,
					'clasName' => $videofolio->clasName,
					'technology' => $videofolio->technology,
					'popup' => $videofolio->popup,
					'url' => $videofolio->url,
					'author' => $author,
					'image' => base_url('media/images/multimedia/'.$videofolio->image),
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

		$videofolios = $this->api_model->get_videofolios($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($videofolios)){
			foreach($videofolios as $videofolio){
				
				$short_desc = strip_tags(character_limiter($videofolio->description, 70));
				$author = $videofolio->firstName.' '.$videofolio->lastName;

				$posts[] = array(
					'id' => $videofolio->id,
					'title' => $videofolio->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $videofolio->description,
					'clasName' => $videofolio->clasName,
					'popup' => $videofolio->popup,
					'technology' => $videofolio->technology,
					'url' => $videofolio->url,
					'author' => $author,
					'image' => base_url('media/images/multimedia/'.$videofolio->image),
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
		
		$videofolio = $this->api_model->get_videofolio($id);

		$author = $videofolio->firstName.' '.$videofolio->lastName;

		$post = array(
			'id' => $videofolio->id,
			'title' => $videofolio->title,
			'description' => $videofolio->description,
			'clasName' => $videofolio->clasName,
			'popup' => $videofolio->popup,
			'technology' => $videofolio->technology,
			'url' => $videofolio->url,
			'author' => $author,
			'image' => base_url('media/images/multimedia/'.$videofolio->image),
			'createdAt' => $videofolio->createdAt
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($post));
	}

	public function recent_videofolios()
	{
		header("Access-Control-Allow-Origin: *");

		$videofolios = $this->api_model->get_videofolios($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($videofolios)){
			foreach($videofolios as $videofolio){
				
				$short_desc = strip_tags(character_limiter($videofolio->description, 70));
				$author = $videofolio->firstName.' '.$videofolio->lastName;

				$posts[] = array(
					'id' => $videofolio->id,
					'title' => $videofolio->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $videofolio->description,
					'clasName' => $videofolio->clasName,
					'popup' => $videofolio->popup,
					'technology' => $videofolio->technology,
					'url' => $videofolio->url,
					'author' => $author,
					'image' => base_url('media/images/multimedia/'.$videofolio->image),
					'createdAt' => $videofolio->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}

	//


	// Get SEO

	public function seos()
	{
		header("Access-Control-Allow-Origin: *");

		$seos = $this->api_model->get_seos($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($seos)){
			foreach($seos as $seo){

				$short_desc = strip_tags(character_limiter($seo->description, 70));
				$author = $seo->firstName.' '.$seo->lastName;

				$posts[] = array(
					'id' => $seo->id,
					'title' => $seo->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $seo->description,
					'keywords' => $seo->keywords,
					'copyright' => $seo->copyright,
					'author' => $author,
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

		$seos = $this->api_model->get_seos($featured=true, $recentpost=false);

		$posts = array();
		if(!empty($seos)){
			foreach($seos as $seo){
				
				$short_desc = strip_tags(character_limiter($seo->description, 70));
				$author = $seo->firstName.' '.$seo->lastName;

				$posts[] = array(
					'id' => $seo->id,
					'title' => $seo->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $seo->description,
					'keywords' => $seo->keywords,
					'copyright' => $seo->copyright,
					'author' => $author,
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
		
		$seo = $this->api_model->get_seo($id);

		$author = $seo->firstName.' '.$seo->lastName;

		$post = array(
			'id' => $seo->id,
			'title' => $seo->title,
			'short_desc' => html_entity_decode($short_desc),
			'description' => $seo->description,
			'keywords' => $seo->keywords,
			'copyright' => $seo->copyright,
			'author' => $author,
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

		$seos = $this->api_model->get_seos($featured=false, $recentpost=5);

		$posts = array();
		if(!empty($seos)){
			foreach($seos as $seo){
				
				$short_desc = strip_tags(character_limiter($seo->description, 70));
				$author = $seo->firstName.' '.$seo->lastName;

				$posts[] = array(
					'id' => $seo->id,
					'title' => $seo->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $seo->description,
					'keywords' => $seo->keywords,
					'copyright' => $seo->copyright,
					'author' => $author,
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

	// Get Users 

public function users()
{
	header("Access-Control-Allow-Origin: *");

	$users = $this->api_model->get_users($featured=false, $recentpost=false);

	$posts = array();
	if(!empty($users)){
		foreach($users as $user){

			$short_desc = strip_tags(character_limiter($user->description, 70));
			$author = $user->firstName.' '.$user->lastName;

			$posts[] = array(
				'id' => $user->id,
				'username' => $user->username,
				'password' => $user->password,
				'firstName' => $user->firstName,
				'lastName' => $user->lastName,
				'image' => base_url('media/images/user/'.$user->image),
				'createdAt' => $user->createdAt
			);
		}
	}

	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($posts));
}


public function user($id)
{
	header("Access-Control-Allow-Origin: *");
	
	$user = $this->api_model->get_user($id);

	$author = $user->firstName.' '.$user->lastName;

	$post = array(
		'id' => $user->id,
		'username' => $user->username,
		'password' => $user->password,
		'firstName' => $user->firstName,
		'lastName' => $user->lastName,
		'image' => base_url('media/images/user/'.$user->image),
		'createdAt' => $user->createdAt
	);
	
	$this->output
		->set_content_type('application/json')
		->set_output(json_encode($post));
}
//




	// Categories

	public function categories()
	{
		header("Access-Control-Allow-Origin: *");

		$categories = $this->api_model->get_categories();

		$category = array();
		if(!empty($categories)){
			foreach($categories as $cate){
				$category[] = array(
					'id' => $cate->id,
					'name' => $cate->category_name
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($category));
	}

	// Pages

	public function page($slug)
	{
		header("Access-Control-Allow-Origin: *");
		
		$page = $this->api_model->get_page($slug);

		$pagedata = array(
			'id' => $page->id,
			'title' => $page->title,
			'description' => $page->description
		);
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($pagedata));
	}

	// Contact

	public function contact()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type');

		$formdata = json_decode(file_get_contents('php://input'), true);

		if( ! empty($formdata)) {

			$name = $formdata['name'];
			$email = $formdata['email'];
			$phone = $formdata['phone'];
			$message = $formdata['message'];

			$contactData = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'message' => $message,
				'createdAt' => date('Y-m-d H:i:s', time())
			);
			
			$id = $this->api_model->insert_contact($contactData);

			$this->sendemail($contactData);
			
			$response = array('id' => $id);
		}
		else {
			$response = array('id' => '');
		}
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

	public function sendemail($contactData)
	{
		$message = '<p>Hi, <br />Alguien ha escrito desde Malcolm web.</p>';
		$message .= '<p><strong>Nombre: </strong>'.$contactData['name'].'</p>';
		$message .= '<p><strong>Apellido: </strong>'.$contactData['lastname'].'</p>';
		$message .= '<p><strong>Email: </strong>'.$contactData['email'].'</p>';
		$message .= '<p><strong>Teléfono: </strong>'.$contactData['phone'].'</p>';
		$message .= '<p><strong>Mensaje: </strong>'.$contactData['message'].'</p>';
		$message .= '<br />Gracias!';

		$this->load->library('email');

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';

		$this->email->initialize($config);

		$this->email->from('mercadocreativo@gmail.com', 'MalcolmCordova');
		$this->email->to('mercadocreativo@gmail.com');
		$this->email->cc('mercadocreativo@hotmail.com');
		// $this->email->bcc('mercadocreativo@gmail.com');

		$this->email->subject('Contact Form');
		$this->email->message($message);

		$this->email->send();
	}
	//

	// Get contact
	public function contacts()
	{
		header("Access-Control-Allow-Origin: *");

		$contacts = $this->api_model->get_contacts($featured=false, $recentpost=false);

		$posts = array();
		if(!empty($contacts)){
			foreach($contacts as $contact){

				$posts[] = array(
					'id' => $contact->id,
					'name' => $contact->name,
					'lastname' => $contact->lastname,
					'message' => $contact->message,
					'email' => $contact->email,
					'createdAt' => $contact->createdAt
				);
			}
		}

		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($posts));
	}
	//


// login
	public function login() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type');

		$formdata = json_decode(file_get_contents('php://input'), true);

		$username = $formdata['username'];
		$password = $formdata['password'];

		$user = $this->api_model->login($username, $password);

		if($user) {
			$response = array(
				'userId' => $user->id,
				'firstName' => $user->firstName,
				'lastName' => $user->lastName,
				'token' => $user->token
			);
		}
		else {
			$response = array();
		}

		$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}
	//

// Manage contact

public function adminContacts()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	$posts = array();
	if($isValidToken) {
		$contacts = $this->api_model->get_admin_contacts();
		foreach($contacts as $contact) {
			$posts[] = array(
				'id' => $contact->id,
				'name' => $contact->name,
				'lastname' => $contact->lastname,
				'message' => $contact->message,
				'email' => $contact->email,
				'createdAt' => $contact->createdAt
			);
		}

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($posts)); 
	}
}

public function adminContact($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$contact = $this->api_model->get_admin_contact($id);

		$post = array(
			'id' => $contact->id,
			'name' => $contact->name,
			'lastname' => $contact->lastname,
			'message' => $contact->message,
			'email' => $contact->email,
			'createdAt' => $contact->createdAt
		);
		

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($post)); 
	}
}


public function deleteContact($id)
{
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$contact = $this->api_model->get_admin_contact($id);


		$this->api_model->deleteContact($id);

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


	// Manage Blog

	public function adminBlogs()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$blogs = $this->api_model->get_admin_blogs();
			foreach($blogs as $blog) {
				$posts[] = array(
					'id' => $blog->id,
					'title' => $blog->title,
					'image' => base_url('media/images/'.$blog->image),
					'createdAt' => $blog->createdAt
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		}
	}

	public function adminBlog($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$blog = $this->api_model->get_admin_blog($id);

			$post = array(
				'id' => $blog->id,
				'title' => $blog->title,
				'description' => $blog->description,
				'image' => base_url('media/images/'.$blog->image),
				'isFeatured' => $blog->isFeatured,
				'isActive' => $blog->isActive
			);
			

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($post)); 
		}
	}

	public function createBlog()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$filename = NULL;

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/';
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
	        	$blogData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'image' => $filename,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive,
					'createdAt' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model->insertBlog($blogData);

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

	public function updateBlog($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$blog = $this->api_model->get_admin_blog($id);
			$filename = $blog->image;

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/';
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
	   
					if($blog->image && file_exists(FCPATH.'media/images/'.$blog->image))
					{
						unlink(FCPATH.'media/images/'.$blog->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$blogData = array(
					'title' => $title,
					'userId' => 1,
					'description' => $description,
					'image' => $filename,
					'isFeatured' => $isFeatured,
					'isActive' => $isActive
				);

				$this->api_model->updateBlog($id, $blogData);

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

	public function deleteBlog($id)
	{
		header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		if($isValidToken) {

			$blog = $this->api_model->get_admin_blog($id);

			if($blog->image && file_exists(FCPATH.'media/images/'.$blog->image))
			{
				unlink(FCPATH.'media/images/'.$blog->image);
			}

			$this->api_model->deleteBlog($id);

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

	// Manage webdesing

	public function adminWebdesings()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$webdesings = $this->api_model->get_admin_webdesings();
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

			$webdesing = $this->api_model->get_admin_webdesing($id);

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

				$id = $this->api_model->insertWebdesing($webdesingData);

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

			$webdesing = $this->api_model->get_admin_webdesing($id);
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

				$this->api_model->updateWebdesing($id, $webdesingData);

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

			$webdesing = $this->api_model->get_admin_webdesing($id);

			if($webdesing->image && file_exists(FCPATH.'media/images/webdesing/'.$webdesing->image))
			{
				unlink(FCPATH.'media/images/webdesing/'.$webdesing->image);
			}

			$this->api_model->deleteWebdesing($id);

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

	// Manage Grafico

	public function adminGraficos()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$graficos = $this->api_model->get_admin_graficos();
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

			$grafico = $this->api_model->get_admin_grafico($id);

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

				$id = $this->api_model->insertGrafico($graficoData);

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

			$grafico = $this->api_model->get_admin_grafico($id);
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

				$this->api_model->updateGrafico($id, $graficoData);

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

			$grafico = $this->api_model->get_admin_grafico($id);

			if($grafico->image && file_exists(FCPATH.'media/images/grafico/'.$grafico->image))
			{
				unlink(FCPATH.'media/images/grafico/'.$grafico->image);
			}

			$this->api_model->deleteGrafico($id);

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

	// Manage multimedia

	public function adminVideofolios()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$videofolios = $this->api_model->get_admin_videofolios();
			foreach($videofolios as $videofolio) {
				$posts[] = array(
					'id' => $videofolio->id,
					'title' => $videofolio->title,
					'description' => $videofolio->description,
					'clasName' => $videofolio->clasName,
					'popup' => $videofolio->popup,
					'technology' => $videofolio->technology,
					'url' => $videofolio->url,
					'image' => base_url('media/images/multimedia/'.$videofolio->image),
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

			$videofolio = $this->api_model->get_admin_videofolio($id);

			$post = array(
				'id' => $videofolio->id,
				'title' => $videofolio->title,
				'description' => $videofolio->description,
				'clasName' => $videofolio->clasName,
				'popup' => $videofolio->popup,
				'technology' => $videofolio->technology,
				'url' => $videofolio->url,
				'image' => base_url('media/images/multimedia/'.$videofolio->image),
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
			$clasName = $this->input->post('clasName');
			$popup = $this->input->post('popup');
			$technology = $this->input->post('technology');
			$url = $this->input->post('url');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

			$filename = NULL;

			$isUploadError = FALSE;

			if ($_FILES && $_FILES['image']['name']) {

				$config['upload_path']          = './media/images/multimedia/';
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
	        	$videofolioData = array(
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

			$videofolio = $this->api_model->get_admin_videofolio($id);
			$filename = $videofolio->image;

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

				$config['upload_path']          = './media/images/multimedia/';
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
	   
					if($videofolio->image && file_exists(FCPATH.'media/images/multimedia/'.$videofolio->image))
					{
						unlink(FCPATH.'media/images/multimedia/'.$videofolio->image);
					}

	            	$uploadData = $this->upload->data();
            		$filename = $uploadData['file_name'];
	            }
			}

			if( ! $isUploadError) {
	        	$videofolioData = array(
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

				$this->api_model->updateVideofolio($id, $videofolioData);

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

			$videofolio = $this->api_model->get_admin_videofolio($id);

			if($videofolio->image && file_exists(FCPATH.'media/images/multimedia/'.$videofolio->image))
			{
				unlink(FCPATH.'media/images/multimedia/'.$videofolio->image);
			}

			$this->api_model->deleteVideofolio($id);

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


	// Manage Seo

	public function adminSeos()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: authorization, Content-Type");

		$token = $this->input->get_request_header('Authorization');

		$isValidToken = $this->api_model->checkToken($token);

		$posts = array();
		if($isValidToken) {
			$seos = $this->api_model->get_admin_seos();
			foreach($seos as $seo) {
				$posts[] = array(
					'id' => $seo->id,
					'title' => $seo->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $seo->description,
					'keywords' => $seo->keywords,
					'copyright' => $seo->copyright,
					'author' => $author,
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

			$seo = $this->api_model->get_admin_seo($id);

			$post = array(
				'id' => $seo->id,
					'title' => $seo->title,
					'short_desc' => html_entity_decode($short_desc),
					'description' => $seo->description,
					'keywords' => $seo->keywords,
					'copyright' => $seo->copyright,
					'author' => $author,
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
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

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
					'isFeatured' => $isFeatured,
					'isActive' => $isActive,
					'createdAt' => date('Y-m-d H:i:s', time())
				);

				$id = $this->api_model->insertSeo($seoData);

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

			$seo = $this->api_model->get_admin_seo($id);
			$filename = $seo->image;

			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$keywords = $this->input->post('keywords');
			$copyright = $this->input->post('copyright');
			$isFeatured = $this->input->post('isFeatured');
			$isActive = $this->input->post('isActive');

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
					'isFeatured' => $isFeatured,
					'isActive' => $isActive,
				);

				$this->api_model->updateSeo($id, $seoData);

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

			$seo = $this->api_model->get_admin_seo($id);

			if($seo->image && file_exists(FCPATH.'media/images/seo/'.$seo->image))
			{
				unlink(FCPATH.'media/images/seo/'.$seo->image);
			}

			$this->api_model->deleteSeo($id);

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

	// Manage Users

public function adminUsers()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	$posts = array();
	if($isValidToken) {
		$users = $this->api_model->get_admin_users();
		foreach($users as $user) {
			$posts[] = array(
				'id' => $user->id,
				'username' => $user->username,
				'password' => $user->password,
				'firstName' => $user->firstName,
				'lastName' => $user->lastName,
				'image' => base_url('media/images/user/'.$user->image),
				'createdAt' => $user->createdAt
			);
		}

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($posts)); 
	}
}

public function adminUser($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$user = $this->api_model->get_admin_user($id);

		$post = array(
			'id' => $user->id,
			'username' => $user->username,
			'password' => $user->password,
			'firstName' => $user->firstName,
			'lastName' => $user->lastName,
			'image' => base_url('media/images/user/'.$user->image),
			'isFeatured' => $user->isFeatured,
			'isActive' => $user->isActive
		);
		

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($post)); 
	}
}

public function createUser()
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$isFeatured = $this->input->post('isFeatured');
		$isActive = $this->input->post('isActive');

		$filename = NULL;

		$isUploadError = FALSE;

		if ($_FILES && $_FILES['image']['name']) {

			$config['upload_path']          = './media/images/user/';
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
			$userData = array(
				'username' => $username,
				'password' => $password,
				'firstName' => $firstName,
				'lastName' => $lastName,
				'image' => $filename,
				'isFeatured' => $isFeatured,
				'isActive' => $isActive,
				'createdAt' => date('Y-m-d H:i:s', time())
			);

			$id = $this->api_model->insertUser($userData);

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

public function updateUser($id)
{
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: authorization, Content-Type");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$user = $this->api_model->get_admin_user($id);
		$filename = $user->image;

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$isFeatured = $this->input->post('isFeatured');
		$isActive = $this->input->post('isActive');

		$isUploadError = FALSE;

		if ($_FILES && $_FILES['image']['name']) {

			$config['upload_path']          = './media/images/user/';
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
   
				if($user->image && file_exists(FCPATH.'media/images/user/'.$wax->image))
				{
					unlink(FCPATH.'media/images/servicios/user/'.$user->image);
				}

				$uploadData = $this->upload->data();
				$filename = $uploadData['file_name'];
			}
		}

		if( ! $isUploadError) {
			$userData = array(
				'username' => $username,
				'password' => $password,
				'firstName' => $firstName,
				'lastName' => $lastName,
				'button' => $button,
				'image' => $filename,
				'isFeatured' => $isFeatured,
				'isActive' => $isActive
			);

			$this->api_model->updateUser($id, $userData);

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

public function deleteUser($id)
{
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	header("Access-Control-Allow-Headers: authorization, Content-Type");

	$token = $this->input->get_request_header('Authorization');

	$isValidToken = $this->api_model->checkToken($token);

	if($isValidToken) {

		$user = $this->api_model->get_admin_user($id);

		if($user->image && file_exists(FCPATH.'media/images/user/'.$user->image))
		{
			unlink(FCPATH.'media/images/user/'.$user->image);
		}

		$this->api_model->deleteUser($id);

		$response = array(
			'status' => 'success'
		);

		$this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode($response)); 
	}
}


}
