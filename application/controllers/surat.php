<?php

class Surat extends CI_Controller {
	var $message;
	var $file;
	var $path;
	private $nama_class = 'surat';

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
		
		$this->load->model('surat_model');
		$this->load->model('warga_model');
		
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
			$data['surat'] = $this->surat_model->get($id);
		} else {
			if ($this->session->userdata('u')) {
				$this->load->model('warga_model');		
				$data['surat'] = $this->warga_model->getbyusername($this->session->userdata('u'));
				//$warga_id = $data['data']->warga_id;			
			}			
		}
		
		$this->javascript->blur('#noktp', "
			var noktp = $('#noktp').val();
			$.post('" . base_url(). "warga/get',{'noktp':noktp}, function(result) {
				$('#nama').val(result.warga_nama);
				$('#ttl').val(result.warga_ttl);
			},'json');");
		add_js('jquery.min.js');
		$this->javascript->external();
		$this->javascript->compile();
		
		$data['page_name'] = $edit?'koreksi':'tambah data';
		
		$data['main_content'] = "includes-bs/".$this->nama_class."/form";
		$this->load->view('template',$data);					
	}
		
	public function edit($id){
		$this->form(1,$id);
	}

	public function delete($id){
		$data['message']  = $this->session->flashdata('message');		
		$data['id'] = $id;		
		$data['data'] = $this->surat_model->get($id);
		$data['page_name'] = 'hapus';
		$data['main_content'] = "includes-bs/".$this->nama_class."/delete";
		
		$this->load->view('template',$data);
		
	}
	
	public function hapus() {
		if ($this->input->post('action') == 'Ok')
			$sukses = $this->surat_model->hapus($this->input->post('id'));
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah dihapus.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		redirect('surat/lists');
	}
	
	public function simpan($id = 0){
		
		$data = array(			
			
			'surat_warga_id' => $this->warga_model->getbyusername($this->session->userdata('u'))->warga_id,
			'surat_kategori_id' => $this->input->post('kategori'),
			'surat_untuk' => $this->input->post('keterangan'),			
			'surat_tglupload' => date('Y-m-d'),
			'surat_nomer' => $this->input->post('nosurat')
		);
		if ($this->input->post('mode') == 'Simpan') {
			$sukses = $this->surat_model->simpan($data);
		} else {
			$sukses = $this->surat_model->koreksi($id,$data);
		}
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah tersimpan.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');

		//$this->index();
		redirect('surat/lists');
	}	
	
	public function lists(){
		add_js('jquery.min.js');
		add_js('jquery.dataTables.min.js');
		
		//$config['content_per_page'] = 5;
		//$data['content'] = $this->surat_model->getAll($config['content_per_page']);		
		$data['message']  = $this->session->flashdata('message');		
		$data['dataTablesource'] = $this->nama_class."/getdatatables";	
		$data['page_name'] = 'daftar';
		$data['main_content'] = "includes-bs/".$this->nama_class."/list";
		$this->load->view('template',$data);
	}
	
	
	
	public function getdatatables(){
		echo $this->surat_model->getdatatables();
	}

	
	
}
