<?php

class Acara_model extends CI_Model {
	var $gallery_path;
	var $gallery_path_url;
	var $upload_filename;
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();		
		
		$this->gallery_path = realpath(APPPATH . '../images');
		$this->gallery_path_url = base_url().'images/'; 
		
    }
	
	function simpan($f) {		
		$this->db->insert('acara',$f);
		return $this->db->affected_rows();		
	}
	
	function do_upload(){
		$config = array(
			'allowed_types' => 'jpg|gif|png',
			'upload_path' => $this->gallery_path,
			'max_size' => 2000
		);
		
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload()) {
			 $this->upload->display_errors();
		}
		$image_data = $this->upload->data();		
		
		$this->upload_filename =   $image_data['file_name'];
		$config = array(
			'source_image' => $image_data['full_path'],
			'new_image' => $this->gallery_path . '/thumbs',
			'maintain_ratio' => true,
			'width' => 150,
			'height' => 100
		);

		$this->load->library('image_lib',$config);
		$this->image_lib->resize();
	}
	
	function koreksi($id,$f) {		
		$this->db->where('acara_id',$id);
		$this->db->update('acara',$f);
		return $this->db->affected_rows();
	}

	function hapus($id) {		
		$this->db->where('acara_id',$id);
		$this->db->delete('acara');
		return $this->db->affected_rows();
	}
	
	function jmlRec(){
		return $this->db->count_all('acara');
	}

	function getAll($jml = 5,$start = 1,$sort = "desc") {
		
		$this->db->order_by("acara_tglupload", $sort); 
		$q = 
			$this->db->get('acara',$jml,$start);
		
		if ($q->num_rows() > 0) {			
			return $q->result();
		}
	}
	
	function get($id) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('acara',
								  array('acara_id'=>$id));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		
		
	}	
	
	public function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('acara_id,acara_tglupload, acara_title, acara_body')
		->from('acara')	
		->add_column('edit', '<a class="ico edit" href="' . base_url() .'acara/edit/$1">Edit</a>', 'acara_id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'acara/delete/$1">Delete</a>', 'acara_id')
		->edit_column('acara_body','$1',"potong(acara_body)")
		->edit_column('acara_tglupload','$1',"atur_tgl('acara_tglupload')")
		->unset_column('acara_id');
		//->edit_column('acara_body','$1','potong(acara_body)')
		return $this->datatables->generate();
	}
	
	
	
}