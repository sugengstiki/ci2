<?php

class seminar_model extends CI_Model {
	var $kemahasiswaan_db;
	
	function simpan($f) {		
		$orig = $this->db->db_debug;
		$this->db->db_debug = false;
		$this->db->insert('seminar',$f);
		$this->db->db_debug = $orig;
		return $this->db->affected_rows();
	}
	
	function koreksi($id,$f) {		
		$this->db->where('seminar_noreg',$id);
		$this->db->update('seminar',$f);
		return $this->db->affected_rows();
	}
	
	function hapus($id) {		
		$this->db->where('seminar_nrp',$id);
		$this->db->delete('seminar');
		return $this->db->affected_rows();
	}
	
	function jmlRec(){
		return $this->db->count_all('seminar');
	}

	function getAll() {
		$q = 
			$this->db->get('seminar');
		
		if ($q->num_rows() > 0) {
			
			
			return $q->result();
		}
	}

	function get($id) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('seminar',
								  array('seminar_nrp'=>$id));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 		
	}
	
	public function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('seminar_noreg,seminar_nrp,seminar_nama, seminar_status')
		->from('seminar')		
		->add_column('edit', '<a class="ico edit" href="' . base_url() .'seminar/edit/$1">Edit</a>', 'seminar_nrp')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'seminar/delete/$1">Delete</a>', 'seminar_nrp')
		->edit_column('seminar_status','$1',"status_bayar('seminar_status')");
		
		return $this->datatables->generate();
	}
	
	function get_nama($id) {	
		$this->kemahasiswaan_db = $this->load->database('kemahasiswaan', TRUE);
		$q = $this->kemahasiswaan_db->get_where('mahasiswa',
								  array('nrp'=>$id));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		return false;
	}
	
	function get_nama_peserta($noreg) {	
		//$this->kemahasiswaan_db = $this->load->database('kemahasiswaan', TRUE);
		$q = $this->db->get_where('seminar',
								  array('seminar_noreg'=>$noreg));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		return false;
	}
	
	function get_noreg($id) {			
		$q = $this->db->get_where('seminar',
								  array('seminar_noreg'=>$id));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		return false;
	}
	
	
}