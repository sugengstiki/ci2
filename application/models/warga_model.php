<?php

class Warga_model extends CI_Model {
	function simpan($f) {		
		$this->db->insert('warga',$f);
		return $this->db->affected_rows();
	}
	
	function koreksi($id,$f) {		
		$this->db->where('warga_id',$id);
		$this->db->update('warga',$f);
		return $this->db->affected_rows();
	}
	
	function hapus($id) {		
		$this->db->where('warga_id',$id);
		$this->db->delete('warga');
		return $this->db->affected_rows();
	}
	
	function jmlRec(){
		return $this->db->count_all('warga');
	}

	function getAll() {
		$q = 
			$this->db->get('warga');
		
		if ($q->num_rows() > 0) {
			
			
			return $q->result();
		}
	}
	
	function getbynoktp($noktp) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('warga',
								  array('warga_noktp'=>$noktp));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 		
	}

	function get($id) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('warga',
								  array('warga_id'=>$id));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 		
	}
	
	function getbyusername($username) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('warga',
								  array('warga_username'=>"$username"));
		if ($q->num_rows()) //jika ada
		{			
			return $q->row(); //berikan datanya
				
		} 
		else return '';
		
		
	}
	
	function getpassword($username,$password) {
		//cari di table user where usernamenya sama dengan $username
		$q = $this->db->get_where('warga',
								  array('warga_username'=>$username,
										'warga_password'=>$password
								  ));
							  
		if ($q->num_rows() == 1) //jika ada
		{
			
			return $q->row()->warga_tipe; //berikan datanya
		} else {
			
			return false;
		}
		
		
	}
	
	public function getdatatables($rt_id){
		$this->load->library('datatables');
		
		$this->datatables
		->select('warga_id,warga_noktp,warga_nama, warga_alamat, warga_telp')
		->from('warga')				
		->add_column('edit', '<a class="ico edit" href="' . base_url() .'warga/edit/$1">Edit</a>', 'warga_id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'warga/delete/$1">Delete</a>', 'warga_id')
		->unset_column('warga_id');
	
		if (!empty($rt_id))	$this->datatables->where('warga_rt_id',$rt_id);
		return $this->datatables->generate();
	}
	
	
	
}