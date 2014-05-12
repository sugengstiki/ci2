<?php

class Permission extends CI_Controller {
	var $message;
	var $file;
	var $path;
	var $menu;
	private $nama_class = 'permission';

	function __construct(){
		parent::__construct();
	
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->helper('directory');
		$this->load->helper('url');
		$this->load->helper('utility');
		
		$this->load->library('form_builder');
		$this->load->library('javascript');
		$this->javascript->external();
		$this->javascript->compile();
		
		
		$this->load->model('permission_model');
		//$this->load->model('kategori_model');
		
	}
	
	public function index(){
		//halaman default
		$this->form();
	}

	public function form($edit = 0, $id = null)
	{	
		$data['message']  = $this->session->flashdata('message');		
		if ($edit){		
			$data['id'] = $id;
			$data['data'] = $this->permission_model->get($id);
		} 
		
		$data['main_content'] = "includes-bs/".$this->nama_class."/form";
		$this->load->view('template',$data);					
	}
	
	public function edit($id){
		$this->form(1,$id);
	}

	public function delete($id){
		$data['message']  = $this->session->flashdata('message');		
		$data['id'] = $id;		
		$data['data'] = $this->permission_model->get($id);
		$data['main_content'] = "includes-bs/".$this->nama_class."/delete";
		
		$this->load->view('template',$data);
		
	}
	
	public function hapus() {
		if ($this->input->post('action') == 'Ok')
			$sukses = $this->permission_model->hapus($this->input->post('id'));
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah dihapus.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		redirect('permission/lists');
	}
	
	public function simpan($id = 0){
		
		$data = array(			
			'permission_type' => $this->input->post('tipe'),
			'permission_module' => $this->input->post('modul'),
			'permission_function' => $this->input->post('function'),
			'permission_caption' =>  $this->input->post('caption'),
		);
		if ($this->input->post('mode') == 'Simpan') {
			$sukses = $this->permission_model->simpan($data);
		} else {
			$sukses = $this->permission_model->koreksi($id,$data);
		}
				
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah tersimpan.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');

		
		redirect('permission/lists');
	}
	
	public function lists(){	
		add_js('jquery.min.js');
		add_js('jquery.dataTables.min.js');
		
		$data['message']  = $this->session->flashdata('message');		
		$data['dataTablesource'] = $this->nama_class."/getdatatables";	
		
		$data['main_content'] = "includes-bs/".$this->nama_class."/list";
		$this->load->view('template',$data);
	}
	
	public function getdatatables(){		
		echo $this->permission_model->getdatatables();
	}
	
	public function getmenu() {
		$this->config->set_item('left_menu',
				$this->permission_model->getmenu($this->session->userdata('role_id'),$this->uri->segment(1)));
		//$menu = $this->permission_model->getmenu($this->session->userdata('role_id'),$this->uri->segment(1));		
	}
	
}
