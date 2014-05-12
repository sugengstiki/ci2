<?php

class Saran extends CI_Controller {
	var $message;
	var $file;
	var $path;
	private $nama_class = 'saran';

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
		
		$this->load->model('saran_model');
		
		
	}
	
	public function index(){
		//halaman default
		$this->show();//('saran/form');
	}

	public function form($edit = 0, $id = null)
	{	
		
		$data['message']  = $this->session->flashdata('message');		
		if ($edit){		
			$data['id'] = $id;
			$data['data'] = $this->saran_model->get($id);
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
		$data['data'] = $this->saran_model->get($id);
		$data['main_content'] = "includes-bs/".$this->nama_class."/delete";
		
		$this->load->view('template',$data);
		
	}
	
	public function hapus() {
		if ($this->input->post('action') == 'Ok')
			$sukses = $this->saran_model->hapus($this->input->post('id'));
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah dihapus.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		redirect('saran/lists');
	}
	
	public function simpan($id = 0){
		$this->load->model('warga_model');
		$data = array(			
			'saran_warga_id' => $this->warga_model->getbyusername($this->session->userdata('u'))->warga_id,
			'saran_tanggal' =>  date('Y-m-d'),			
			'saran_title' => $this->input->post('title'),
			'saran_body' => $this->input->post('body'),
			'saran_kategori_id' => $this->input->post('kategori'),
			'saran_isopen' => $this->input->post('isopen'),
		);
		if ($this->input->post('mode') == 'Simpan') {
			$sukses = $this->saran_model->simpan($data);
		} else {
			$sukses = $this->saran_model->koreksi($id,$data);
		}
		
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah tersimpan.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		
		
		redirect('saran/lists');
	}
	
	
	public function lists(){
		add_js('jquery.min.js');
		add_js('jquery.dataTables.min.js');
		
		//$config['content_per_page'] = 5;
		//$data['content'] = $this->permohonan_model->getAll($config['content_per_page']);		
		$data['message']  = $this->session->flashdata('message');		
		$data['dataTablesource'] = $this->nama_class."/getdatatables";	
		$data['main_content'] = "includes-bs/".$this->nama_class."/list";
		$this->load->view('template',$data);
	}
	
	public function show(){
		$config['content_per_page'] = 5;
		$data['content'] = $this->saran_model->getAll($config['content_per_page'],0,"desc");		
		$data['message']  = $this->session->flashdata('message');		
		$data['page_name'] = 'terbaru';
		
		$data['main_content'] = 'includes-bs/saran/unformated';
		$this->load->view('template',$data);
	}
	
	
	public function getdatatables(){
		echo $this->saran_model->getdatatables();
	}
	
}
