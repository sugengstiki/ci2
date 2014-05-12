<?php

class Pengumuman_model extends CI_Model {
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
		$this->db->insert('pengumuman',$f);
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
		$this->db->where('pengumuman_id',$id);
		$this->db->update('pengumuman',$f);
		return $this->db->affected_rows();
	}

	function hapus($id) {		
		$this->db->where('pengumuman_id',$id);
		$this->db->delete('pengumuman');
		return $this->db->affected_rows();
	}
	
	function jmlRec(){
		return $this->db->count_all('pengumuman');
	}

	function getAll($jml = 5,$start = 1,$sort = "desc") {
		
		$this->db->order_by("pengumuman_tglupload", $sort); 
		$q = 
			$this->db->get('pengumuman',$jml,$start);
		
		if ($q->num_rows() > 0) {			
			return $q->result();
		}
	}
	
	function get($id) {
		//cari di table user where id_usernya sama dengan $id
		$q = $this->db->get_where('pengumuman',
								  array('pengumuman_id'=>$id));
		if ($q->num_rows()) //jika ada
		{
			return $q->row(); //berikan datanya
		} 
		
		
	}	
	
	public function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('pengumuman_id,pengumuman_tglupload, pengumuman_title, pengumuman_body')
		->from('pengumuman')	
		->add_column('edit', '<a class="ico edit" href="' . base_url() .'pengumuman/edit/$1">Edit</a>', 'pengumuman_id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'pengumuman/delete/$1">Delete</a>', 'pengumuman_id')
		->edit_column('pengumuman_body','$1',"potong(pengumuman_body)")
		->edit_column('pengumuman_tglupload','$1',"atur_tgl('pengumuman_tglupload')")
		->unset_column('pengumuman_id');
		//->edit_column('pengumuman_body','$1','potong(pengumuman_body)')
		return $this->datatables->generate();
	}
	
	
	
}