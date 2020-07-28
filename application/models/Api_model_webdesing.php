<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_webdesing extends CI_Model 
{

	

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

}
