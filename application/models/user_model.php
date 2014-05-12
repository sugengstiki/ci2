<?php
function jk($jenis){
		return strtoupper($jenis) == 'F' ? 'Perempuan' : 'Laki-laki';
}
class User_model extends CI_Model {
	function simpan($f) {		
		$this->db->insert('tbl_person',$f);
	}
	
	function koreksi($id,$f) {		
		$this->db->where('id',$id);
		$this->db->update('tbl_person',$f);
	}
	
	function jmlRec(){
		return $this->db->count_all('tbl_person');
	}

	function getAll($jml,$start) {
		//$this->load->database();
		//$q = $this->db->query("Select * from user");
		//$this->db->select('id_user','username')   
		// akan mengambil hanya id_user dan username saja
		
		$q = 
			$this->db->get('tbl_person',$jml,$start);
		//$q = $this->db->query("select * from tbl_person limit $jml, $start");
		if ($q->num_rows() > 0) {
			foreach($q->result() as $row) {
				$data[] = $row;
			}

			//print_r($q->result())
			return $data;
		}
	}
	
	function get($id) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('tbl_person',
								  array('id'=>$id));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		
		
	}
	
	function getpassword($username,$password) {
		//cari di table user where usernamenya sama dengan $username
		$q = $this->db->get_where('user',
								  array('username'=>$username,
										'password'=>$password
								  ));
		if ($q->num_rows() == 1) //jika ada
		{
			return $q->row()->type; //berikan datanya
		} else {
			return false;
		}
		
		
	}
	
	
	
}