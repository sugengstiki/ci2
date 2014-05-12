<?php
// put this on /application/models/blog_model.php
class Fkary_model extends CI_Model {
	function get_data(){
		$this->load->database();
		$query = $this->db->get('temply');
		return $query->result();
	}
	function insert_data_kary($IDKary, $NmLgkp, $Panggil)
	{
		$this->load->database();
		$data = array(
		'IdKary' => $IDKary,
		'NmLgkp' => $NmLgkp,
		'NmPng' => $Panggil,
		);
		$query = $this->db->insert('temply', $data);
	}
}
?>