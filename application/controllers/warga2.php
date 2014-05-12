<?php

class Warga extends CI_Controller {
	var $message;
	var $file;
	var $path;

	function __construct(){
		parent::__construct();
	
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->helper('directory');
		$this->load->helper('url');
		
		//$this->load->model('warga_model');
		//$this->load->model('kategori_model');
		
	}
	
	public function index()
	{	
		//$config['content_per_page'] = 5;
		//$data['content'] = $this->permohonan_model->getAll($config['content_per_page']);		
		$data['message']  = $this->session->flashdata('message');		
		$data['main_content'] = 'includes-bs/warga/list';
		$this->load->view('template',$data);					
	}
	
	function datatables(){
	$data['main_content'] = 'includes-bs/post';
	$data['footer'] = 'includes/footer';
	$this->load->view('template',$data);
  
	}
	
	public function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('id, name, gender, dob')
		->from('tbl_person')    
		
		->add_column('edit', '<a class="ico edit" href="' . base_url() . 'admin/profiles/edit/$1">Edit</a>', 'id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'admin/profiles/delete/$1">Delete</a>', 'id')
		->edit_column('gender','$1','jk(gender)');

		echo $this->datatables->generate();
	}

	
	
	
}
