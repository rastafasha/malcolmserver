<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_videofolio extends CI_Model 
{

	// get multimedia
	public function get_videofolios($featured, $recentpost)
	{
		$this->db->select('videofolio.*');
		$this->db->from('videofolios videofolio');
		$this->db->join('users u', 'u.id=videofolio.userId');
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
		$this->db->select('videofolio.*');
		$this->db->from('videofolios videofolio');
		$this->db->join('users u', 'u.id=videofolio.userId');
		$this->db->join('categories cat', 'cat.id=videofolio.categoryId', 'left');
		$this->db->where('videofolio.isActive', 1);
		$this->db->where('videofolio.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//


	// manage Video
	public function get_admin_videofolios()
	{
		$this->db->select('videofolio.*');
		$this->db->from('videofolios videofolio');
		$this->db->join('users u', 'u.id=videofolio.userId');
		$this->db->order_by('videofolio.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_videofolio($id)
	{
		$this->db->select('videofolio.*');
		$this->db->from('videofolios videofolio');
		$this->db->join('users u', 'u.id=videofolio.userId');
		$this->db->where('videofolio.id', $id);
		$query = $this->db->get();
		return $query->row();
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

}
