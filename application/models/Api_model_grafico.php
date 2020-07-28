<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model_grafico extends CI_Model 
{


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

}
