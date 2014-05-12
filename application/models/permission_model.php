<?php
class Permission_model extends CI_Model {
	
	function simpan($f) {		
		$this->db->insert('permission',$f);
		return $this->db->affected_rows();
	}
	
	function koreksi($id,$f) {		
		$this->db->where('permission_id',$id);
		$this->db->update('permission',$f);
		return $this->db->affected_rows();
	}
	
	function hapus($id) {		
		$this->db->where('permission_id',$id);
		$this->db->delete('permission');
		return $this->db->affected_rows();
	}	
	
	function jmlRec(){
		return $this->db->count_all('permission');
	}

	function getAll() {
		$this->load->database();
		//$q = $this->db->query("Select * from user");
		//$this->db->select('id_user','username')   
		// akan mengambil hanya id_user dan username saja
		
		$q = 
			$this->db->get('permission');
		//$q = $this->db->query("select * from permission limit $jml, $start");
		if ($q->num_rows() > 0) {			
			return $q->result();
		}
	}
	
	function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('permission_id,permission_type, permission_module, permission_function')
		->from('permission')	
		->add_column('edit', '<a class="ico edit" href="' . base_url() .'permission/edit/$1">Edit</a>', 'permission_id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'permission/delete/$1">Delete</a>', 'permission_id')				
		->unset_column('permission_id');		
		return $this->datatables->generate();
	}
	
	function get($id) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('permission',
								  array('permission_id'=>$id));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		
		
	}
	
	function getmenu($type, $module) {
		//cari di table user where usernamenya sama dengan $username
		$this->db->where_not_in('permission_function',array("show","index","edit","delete","hapus","simpan","getdatatables","view"));
		$this->db->order_by('permission_id');
		$this->db->group_by('permission_module,permission_function');
		
		if ($type != 'admin')
			$q = $this->db->get_where('permission',
								  array('permission_type'=> (empty($type)?'0':$type),
										'permission_module'=>$module,
										'permission_function !='=>'index',	
										'permission_caption !=' => '' ,
								  ));
		else {
			$q = $this->db->get_where('permission',
			array('permission_module'=>$module,
				  'permission_caption !=' => '' ,
			));
		}
			
		if ($q->num_rows() >= 1) //jika ada
		{
			return $q->result(); //berikan datanya
		} else {
			return false;
		}
		
		
	}
	
	
	
}