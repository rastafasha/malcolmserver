<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_blog extends CI_Model 
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

}
