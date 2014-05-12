<?php

class Surat_model extends CI_Model {
	function simpan($f) {		
		$this->db->insert('surat',$f);
		return $this->db->affected_rows();
	}
	
	function koreksi($id,$f) {		
		$this->db->where('surat_id',$id);
		$this->db->update('surat',$f);
		return $this->db->affected_rows();
	}

	function hapus($id) {		
		$this->db->where('surat_id',$id);
		$this->db->delete('surat');
		return $this->db->affected_rows();
	}
	
	function jmlRec(){
		return $this->db->count_all('surat');
	}

	function getAll($jml = 5,$start = 1) {		
		
		$q = 
			$this->db->get('surat',$jml,$start);
		
		if ($q->num_rows() > 0) {			
			return $q->result();
		}
	}
	
	function get($id) {
		//cari di table user where id_usernya sama dengan $id
		
		$this->db->from('surat');
		$this->db->join('warga','surat.surat_warga_id = warga.warga_id');
		$this->db->where(array('surat_id'=>$id));
		
		$q = $this->db->get();
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		
		
	}
	
	public function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('surat_id,surat_tglupload, warga_nama, surat_untuk, surat_nomer, surat_disetujui')
		->from('surat')
		->join('warga','surat.surat_warga_id = warga.warga_id')		
		->add_column('edit', '<a class="ico edit" href="' . base_url() .'surat/edit/$1">Edit</a>', 'surat_id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'surat/delete/$1">Delete</a>', 'surat_id')
		->unset_column('surat_id');
		
		

		return $this->datatables->generate();
	}
}