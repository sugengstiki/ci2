<?php

class Pengumuman extends CI_Controller {
	var $message;
	var $file;
	var $path;

	function __construct(){
		parent::__construct();
	
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->helper('directory');
		$this->load->helper('url');
		
		$this->load->model('pengumuman_model');
		//$this->load->model('kategori_model');
		
	}
	
	public function index()
	{	
		$config['content_per_page'] = 5;
		$data['content'] = $this->pengumuman_model->getAll($config['content_per_page']);		
		$data['message']  = $this->session->flashdata('message');		
		$data['main_content'] = 'includes-bs/pengumuman/list';
		$this->load->view('template',$data);					
	}
	
	
	
}
