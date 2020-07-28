<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_slider extends CI_Model 
{

	// get blog
	public function get_sliders($featured, $recentpost)
	{
		$this->db->select('slider.*');
		$this->db->from('sliders slider');
		$this->db->where('slider.isActive', 1);

		if($featured) {
			$this->db->where('slider.isFeatured', 1);
		}
		if($recentpost){
			$this->db->order_by('slider.createdAt', 'desc');
			$this->db->limit($recentpost);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function get_slider($id)
	{
		$this->db->select('slider.*');
		$this->db->from('sliders slider');
		$this->db->where('slider.isActive', 1);
		$this->db->where('slider.id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//


	// manage blog
	public function get_admin_sliders()
	{
		$this->db->select('slider.*');
		$this->db->from('sliders slider');
		$this->db->order_by('slider.createdAt', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin_slider($id)
	{
		$this->db->select('slider.*');
		$this->db->from('sliders slider');
		$this->db->where('slider.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	//


	// crud blog

	public function insertSlider($sliderData)
	{
		$this->db->insert('sliders', $sliderData);
		return $this->db->insert_id();
	}

	public function updateSlider($id, $sliderData)
	{
		$this->db->where('id', $id);
		$this->db->update('sliders', $sliderData);
	}

	public function deleteSlider($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('sliders');
	}

	//

}
