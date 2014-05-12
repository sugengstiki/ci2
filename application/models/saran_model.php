<?php

class Saran_model extends CI_Model {
	function simpan($f) {		
		$this->db->insert('saran',$f);
		return $this->db->affected_rows();
	}
	
	function koreksi($id,$f) {		
		$this->db->where('saran_id',$id);
		$this->db->update('saran',$f);
		return $this->db->affected_rows();
	}
	
	function hapus($id) {		
		$this->db->where('saran_id',$id);
		$this->db->delete('saran');
		return $this->db->affected_rows();
	}
	
	function jmlRec(){
		return $this->db->count_all('saran');
	}

	function getAll($jml = 5,$start = 1) {
		//$this->load->database();
		//$q = $this->db->query("Select * from user");
		//$this->db->select('id_user','username')   
		// akan mengambil hanya id_user dan username saja
		
		$q = 
			$this->db->select('saran.*,warga.warga_nama')				
				->join('warga','saran.saran_warga_id = warga.warga_id')
				->where('saran.saran_isopen = 1')
				->get('saran',$jml,$start);
		//$q = $this->db->query("select * from saran limit $jml, $start");
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
		//$this->db->select()
		$this->db->from('saran');
		$this->db->join('warga','saran.saran_warga_id = warga.warga_id','left');
		$this->db->where(array('saran_id'=>$id));
		
		$q = $this->db->get();
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		
		
	}
	
	public function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('saran_id, saran_tanggal, saran_title, saran_body, warga_nama, saran_isopen')
		->from('saran')
		->join('warga','saran.saran_warga_id = warga.warga_id','left')		
		->add_column('edit', '<a class="ico edit" href="' . base_url() .'saran/edit/$1">Edit</a>', 'saran_id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'saran/delete/$1">Delete</a>', 'saran_id')
		->edit_column('saran_isopen','$1',"saran_status('saran_isopen')")
		->unset_column('saran_id');

		return $this->datatables->generate();
	}	
	
	
	
}