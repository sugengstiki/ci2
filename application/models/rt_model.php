<?php

class Rt_model extends CI_Model {
	function simpan($f) {		
		$this->db->insert('rt',$f);
		return $this->db->insert_id();
	}
	
	function koreksi($id,$f) {		
		$this->db->where('rt_id',$id);
		$this->db->update('rt',$f);
		return $this->db->affected_rows();
	}
	
	function hapus($id) {		
		$this->db->where('rt_id',$id);
		$this->db->delete('rt');
		return $this->db->affected_rows();
	}
	
	function jmlRec(){
		return $this->db->count_all('rt');
	}

	function getAll() {
		$q = 
			$this->db->get('rt');
		
		if ($q->num_rows() > 0) {
			
			
			return $q->result();
		}
	}
	
	function getbynama($nama) {
		$q = 
			$this->db->select('rt_nama as nama')->like('rt_nama',$nama)->get('rt');
		
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
		$q = $this->db->get_where('rt',
								  array('rt_noktp'=>$noktp));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		}
 		return 0;
	}

	function get($id) {
		//cari di table user where id_usernya sama dengan $id
		
		/* $q = $this->db->select('*,upper(rt_nama) as name')
					  ->from('rt')
					  ->join('warga','warga.warga_rt_id = rt.rt_id','left')
					  ->where(array('rt_id'=>$id,'warga_tipe'=>'admin'))
					  ->get(); */
					  
		$q = $this->db->select('*,upper(rt_nama) as name')
					  ->from('rt')
					  ->join('warga','warga.warga_rt_id = rt.rt_id','left')
					  ->where(array('rt_id'=>$id))
					  ->get();					  
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		return 0;
	}
	
	function getbyusername($username) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('rt',
								  array('rt_username'=>"$username"));
		if ($q->num_rows()) //jika ada
		{			
			return $q->row(); //berikan datanya
				
		} 
		else return '';
		
		
	}
	
	function getpassword($username,$password) {
		//cari di table user where usernamenya sama dengan $username
		$q = $this->db->get_where('rt',
								  array('rt_username'=>$username,
										'rt_password'=>$password
								  ));
							  
		if ($q->num_rows() == 1) //jika ada
		{
			
			return $q->row()->rt_tipe; //berikan datanya
		} else {
			
			return false;
		}
		
		
	}
	
	public function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('rt_id,rt_nama,concat_ws(" ",rt_rt, rt_rw,rt_kelurahan,rt_kecamatan,rt_kota,rt_propinsi ) as alamat, rt_email')
		->from('rt')		
		->add_column('edit', '<a class="ico edit" href="' . base_url() .'rt/edit/$1">Edit</a>', 'rt_id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'rt/delete/$1">Delete</a>', 'rt_id')
		->edit_column('rt_nama','<a class="ico view" href="' . base_url() . 'rt/view/$1">$2</a>','rt_id, rt_nama')
		->unset_column('rt_id');
		return $this->datatables->generate();
	}
	
	
	
}