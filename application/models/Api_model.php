<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model 
{

	// get blog
	public function get_blogs($featured, $recentpost)
	{
		$this->db->select('blog.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('blogs blog');
		$this->db->join('users u', 'u.id=blog.userId');
		$this->db->join('categories cat', 'cat.id=blog.categoryId', 'left');
		$this->db->where('blog.isActive', 1);

		if($featured) {
			$this->db->where('blog.isFeatured', 1);
		}
		if($recentpost){
			$this->db->order_by('blog.createdAt', 'desc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_blog($id)
	{
		$this->db->select('blog.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('blogs blog');
		$this->db->join('users u', 'u.id=blog.userId');
		$this->db->join('categories cat', 'cat.id=blog.categoryId', 'left');
		$this->db->where('blog.isActive', 1);
		$this->db->where('blog.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//

	// get contact

	public function get_contact($id)
	{
		$this->db->select('contact.*');
		$this->db->from('contacts contact');
		$this->db->where('contact.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//

	// get Web
	public function get_webdesings($featured, $recentpost)
	{
		$this->db->select('webdesing.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('webdesings webdesing');
		$this->db->join('users u', 'u.id=webdesing.userId');
		$this->db->join('categories cat', 'cat.id=webdesing.categoryId', 'left');
		$this->db->where('webdesing.isActive', 1);

		if($featured) {
			$this->db->where('webdesing.isFeatured', 1);
		}
		if($recentpost){
			$this->db->order_by('webdesing.createdAt', 'desc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_webdesing($id)
	{
		$this->db->select('webdesing.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('webdesings webdesing');
		$this->db->join('users u', 'u.id=webdesing.userId');
		$this->db->join('categories cat', 'cat.id=webdesing.categoryId', 'left');
		$this->db->where('webdesing.isActive', 1);
		$this->db->where('webdesing.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//

	// get Grafico
	public function get_graficos($featured, $recentpost)
	{
		$this->db->select('grafico.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('graficos grafico');
		$this->db->join('users u', 'u.id=grafico.userId');
		$this->db->join('categories cat', 'cat.id=grafico.categoryId', 'left');
		$this->db->where('grafico.isActive', 1);

		if($featured) {
			$this->db->where('grafico.isFeatured', 1);
		}
		if($recentpost){
			$this->db->order_by('grafico.createdAt', 'desc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_grafico($id)
	{
		$this->db->select('grafico.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('graficos grafico');
		$this->db->join('users u', 'u.id=grafico.userId');
		$this->db->join('categories cat', 'cat.id=grafico.categoryId', 'left');
		$this->db->where('grafico.isActive', 1);
		$this->db->where('grafico.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//

	// get multimedia
	public function get_videofolios($featured, $recentpost)
	{
		$this->db->select('videofolio.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('videofolios videofolio');
		$this->db->join('users u', 'u.id=videofolio.userId');
		$this->db->join('categories cat', 'cat.id=videofolio.categoryId', 'left');
		$this->db->where('videofolio.isActive', 1);

		if($featured) {
			$this->db->where('videofolio.isFeatured', 1);
		}
		if($recentpost){
			$this->db->order_by('videofolio.createdAt', 'desc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_videofolio($id)
	{
		$this->db->select('videofolio.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('videofolios videofolio');
		$this->db->join('users u', 'u.id=videofolio.userId');
		$this->db->join('categories cat', 'cat.id=videofolio.categoryId', 'left');
		$this->db->where('videofolio.isActive', 1);
		$this->db->where('videofolio.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//

	// get Seo
	public function get_seos($featured, $recentpost)
	{
		$this->db->select('seo.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('seos seo');
		$this->db->join('users u', 'u.id=seo.userId');
		$this->db->join('categories cat', 'cat.id=seo.categoryId', 'left');
		$this->db->where('seo.isActive', 1);

		if($featured) {
			$this->db->where('seo.isFeatured', 1);
		}
		if($recentpost){
			$this->db->order_by('seo.createdAt', 'desc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_seo($id)
	{
		$this->db->select('seo.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('seos seo');
		$this->db->join('users u', 'u.id=seo.userId');
		$this->db->join('categories cat', 'cat.id=seo.categoryId', 'left');
		$this->db->where('seo.isActive', 1);
		$this->db->where('seo.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//

	// Get Users

	public function get_users($featured, $recentpost)
	{
		$this->db->select('user.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('users user');
		$this->db->join('users u', 'u.id=user.userId');
		$this->db->where('user.isActive', 1);

		if($featured) {
			$this->db->where('user.isFeatured', 1);
		}
		if($recentpost){
			$this->db->order_by('user.createdAt', 'desc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_user($id)
	{
		$this->db->select('user.*, cat.category_name, u.firstName, u.lastName');
		$this->db->from('users user');
		$this->db->where('user.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//



	public function get_categories()
	{
		$query = $this->db->get('categories');
		return $query->result();
	}

	public function get_page($slug)
	{
		$this->db->where('slug', $slug);
		$query = $this->db->get('pages');
		return $query->row();
	}

	

	

	public function login($username, $password) 
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get('users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}

	// manage blog
	public function get_admin_blogs()
	{
		$this->db->select('blog.*, u.firstName, u.lastName');
		$this->db->from('blogs blog');
		$this->db->join('users u', 'u.id=blog.userId');
		$this->db->order_by('blog.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_blog($id)
	{
		$this->db->select('blog.*, u.firstName, u.lastName');
		$this->db->from('blogs blog');
		$this->db->join('users u', 'u.id=blog.userId');
		$this->db->where('blog.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//
	// manage contact
	public function get_admin_contacts()
	{
		$this->db->select('contact.*');
		$this->db->from('contacts contact');
		$this->db->order_by('contact.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_contact($id)
	{
		$this->db->select('contact.*');
		$this->db->from('contacts contact');
		$this->db->where('contact.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//

	

	// manage webdesing
	public function get_admin_webdesings()
	{
		$this->db->select('webdesing.*, u.firstName, u.lastName');
		$this->db->from('webdesings webdesing');
		$this->db->join('users u', 'u.id=webdesing.userId');
		$this->db->order_by('webdesing.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_webdesing($id)
	{
		$this->db->select('webdesing.*, u.firstName, u.lastName');
		$this->db->from('webdesings webdesing');
		$this->db->join('users u', 'u.id=webdesing.userId');
		$this->db->where('webdesing.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//

	// manage Grafico
	public function get_admin_graficos()
	{
		$this->db->select('grafico.*, u.firstName, u.lastName');
		$this->db->from('graficos grafico');
		$this->db->join('users u', 'u.id=grafico.userId');
		$this->db->order_by('grafico.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_grafico($id)
	{
		$this->db->select('grafico.*, u.firstName, u.lastName');
		$this->db->from('graficos grafico');
		$this->db->join('users u', 'u.id=grafico.userId');
		$this->db->where('grafico.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//

	// manage Video
	public function get_admin_videofolios()
	{
		$this->db->select('videofolio.*, u.firstName, u.lastName');
		$this->db->from('videofolios videofolio');
		$this->db->join('users u', 'u.id=videofolio.userId');
		$this->db->order_by('videofolio.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_videofolio($id)
	{
		$this->db->select('videofolio.*, u.firstName, u.lastName');
		$this->db->from('videofolios videofolio');
		$this->db->join('users u', 'u.id=videofolio.userId');
		$this->db->where('videofolio.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//

	// manage Seo
	public function get_admin_seos()
	{
		$this->db->select('seo.*, u.firstName, u.lastName');
		$this->db->from('seos seo');
		$this->db->join('users u', 'u.id=seo.userId');
		$this->db->order_by('seo.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_seo($id)
	{
		$this->db->select('seo.*, u.firstName, u.lastName');
		$this->db->from('seos seo');
		$this->db->join('users u', 'u.id=seo.userId');
		$this->db->where('seo.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//

	// Manage User

public function get_admin_users()
{
	$this->db->select('user.*, u.firstName, u.lastName');
	$this->db->from('users user');
	$this->db->join('users u', 'u.id=user.id');
	$this->db->order_by('user.createdAt', 'desc');
	$query = $this->db->get();
	return $query->result();
}

public function get_admin_user($id)
{
	$this->db->select('user.*, u.firstName, u.lastName');
	$this->db->from('users user');
	$this->db->join('users u', 'u.id=user.id');
	$this->db->where('user.id', $id);
	$query = $this->db->get();
	return $query->row();
}
//

	public function checkToken($token)
	{
		$this->db->where('token', $token);
		$query = $this->db->get('users');

		if($query->num_rows() == 1) {
			return true;
		}
		return false;
	}

	// crud Contact

	public function insert_contact($contactData)
	{
		$this->db->insert('contacts', $contactData);
		return $this->db->insert_id();
	}

	public function insertContact($contactData)
	{
		$this->db->insert('contacts', $contactData);
		return $this->db->insert_id();
	}
	public function deleteContact($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('contacts');
	}

	//

	// crud blog

	public function insertBlog($blogData)
	{
		$this->db->insert('blogs', $blogData);
		return $this->db->insert_id();
	}

	public function updateBlog($id, $blogData)
	{
		$this->db->where('id', $id);
		$this->db->update('blogs', $blogData);
	}

	public function deleteBlog($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('blogs');
	}

	//

	// crud Web

	public function insertWebdesing($webdesingData)
	{
		$this->db->insert('webdesings', $webdesingData);
		return $this->db->insert_id();
	}

	public function updateWebdesing($id, $webdesingData)
	{
		$this->db->where('id', $id);
		$this->db->update('webdesings', $webdesingData);
	}

	public function deleteWebdesing($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('webdesings');
	}

	//

	// crud Grafico

	public function insertGrafico($graficoData)
	{
		$this->db->insert('graficos', $graficoData);
		return $this->db->insert_id();
	}

	public function updateGrafico($id, $graficoData)
	{
		$this->db->where('id', $id);
		$this->db->update('graficos', $graficoData);
	}

	public function deleteGrafico($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('graficos');
	}

	//

	// crud Multimedia

	public function insertVideofolio($videofolioData)
	{
		$this->db->insert('videofolios', $videofolioData);
		return $this->db->insert_id();
	}

	public function updateVideofolio($id, $videofolioData)
	{
		$this->db->where('id', $id);
		$this->db->update('videofolios', $videofolioData);
	}

	public function deleteVideofolio($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('videofolios');
	}

	//

	// crud Seo

	public function insertSeo($seoData)
	{
		$this->db->insert('seos', $seoData);
		return $this->db->insert_id();
	}

	public function updateSeo($id, $seoData)
	{
		$this->db->where('id', $id);
		$this->db->update('seos', $seoData);
	}

	public function deleteSeo($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('seos');
	}

	//

	// Crud User
	public function insertUser($userData)
	{
		$this->db->insert('users', $userData);
		return $this->db->insert_id();
	}

	public function updateUser($id, $userData)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $userData);
	}

	public function deleteUser($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('users');
	}
	//
}
