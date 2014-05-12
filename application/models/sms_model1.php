<?php

class Sms_model extends CI_Model {
	var $gammu_db;
	var $default_db;
	
	function __construct(){
		parent::__construct();
		$this->default_db = $this->load->database('default',TRUE);
	}
		
	function simpan($f) {				
		$this->default_db->insert('sms',$f);
		return $this->default_db->insert_id();
	}
	
	function koreksi($id,$f) {		
		$this->db->where('sms_id',$id);
		$this->db->update('sms',$f);
		return $this->db->affected_rows();
	}
	
	function hapus($id) {		
		$this->db->where('sms_id',$id);
		$this->db->delete('sms');
		return $this->db->affected_rows();
	}
	
	function jmlRec(){
		return $this->db->count_all('sms');
	}

	function getAll() {
		$q = 
			$this->db->get('sms');
		
		if ($q->num_rows() > 0) {
			return $q->result();
		}
	}
	
	function getbynama($nama) {
		$q = 
			$this->db->select('rt_nama as nama')->like('rt_nama',$nama)->get('sms');
		
		if ($q->num_rows() > 0) {
			foreach ($q->result() as $row)
				$array[] = $row->nama;
			return $array;
		//return array_values($q->result_array());
		}
		return 0;
	}
		
	function getbynoktp($noktp) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('sms',
								  array('rt_noktp'=>$noktp));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		}
 		return 0;
	}

	function get($id) {
		//cari di table user where id_usernya sama dengan $id
					  
		$q = $this->db->where(array('sms_id'=>$id))
					  ->get('sms');					  
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		return 0;
	}
	
	function getbyusername($username) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('sms',
								  array('sms_pengirim'=>"$username"));
		if ($q->num_rows()) //jika ada
		{			
			return $q->row(); //berikan datanya
		} 
		else return '';
		
		
	}
		
	public function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('sms_id,sms_tgl,sms_title,sms_sendto,sms_status')
		->from('sms')
		->group_by('sms_title')
		->add_column('edit', '<a class="ico edit" href="' . base_url() .'sms/edit/$1">Edit</a>', 'sms_id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'sms/delete/$1">Delete</a>', 'sms_id')
		->edit_column('sms_tgl','$1',"atur_tgl('sms_tgl')")
		->edit_column('sms_status','$1',"sms_status('sms_status')")
		->edit_column('sms_title','<a class="ico view" href="' . base_url() . 'sms/edit/$1">$2</a>','sms_id, sms_title')
		->unset_column('sms_id');
		return $this->datatables->generate();
	}
	
	function sendsms($f) {	
		$this->gammu_db = $this->load->database('gammu', TRUE);
		$this->gammu_db->insert('outbox',$f);
	}
	
	
}