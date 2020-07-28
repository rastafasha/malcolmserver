<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_seo extends CI_Model 
{


	// get Seo
	public function get_seos($featured, $recentpost)
	{
		$this->db->select('seo.*');
		$this->db->from('seos seo');
		$this->db->join('users u', 'u.id=seo.userId');

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
		$this->db->select('seo.*');
		$this->db->from('seos seo');
		$this->db->join('users u', 'u.id=seo.userId');
		$this->db->where('seo.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//


	// manage Seo
	public function get_admin_seos()
	{
		$this->db->select('seo.*');
		$this->db->from('seos seo');
		$this->db->join('users u', 'u.id=seo.userId');
		$this->db->order_by('seo.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_seo($id)
	{
		$this->db->select('seo.*');
		$this->db->from('seos seo');
		$this->db->join('users u', 'u.id=seo.userId');
		$this->db->where('seo.id', $id);
		$query = $this->db->get();
		return $query->row();
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

}
