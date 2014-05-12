<?php 

class Pengumuman extends CI_Controller {
	var $message;
	var $file;
	var $path;
	private $nama_class = 'pengumuman';

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
		
		$this->load->model($this->nama_class.'_model');
		//$this->load->model('kategori_model');
		
	}
	public function index(){
		//halaman default
		$this->show();
	}
	
	public function form($edit = 0, $id = null)
	{	
		//$config['content_per_page'] = 5;
		//$data['content'] = $this->permohonan_model->getAll($config['content_per_page']);		
		
		$data['message']  = $this->session->flashdata('message');		
		if ($edit){		
			$data['id'] = $id;
			$data['data'] = $this->pengumuman_model->get($id);
		}
		$data['page_name'] = $edit?'koreksi':'tambah data';
		$data['main_content'] = "includes-bs/".$this->nama_class."/form";
		
//		add_css('bootstrap.css');
		add_js('jquery.min.js');
	//	add_js('bootstrap-typeahead.js');
		add_js('bootstrap.min.js');
	//	add_js('bootstrap-tab.js');

		
		$this->load->view('template',$data);					
	}
	
	public function edit($id){
		$this->form(1,$id);
	}
	
	public function delete($id){
		$data['message']  = $this->session->flashdata('message');		
		$data['id'] = $id;		
		$data['data'] = $this->pengumuman_model->get($id);
		$data['page_name'] = 'hapus';
		$data['main_content'] = "includes-bs/".$this->nama_class."/delete";
		
		$this->load->view('template',$data);
		
	}
	
	public function hapus() {
		if ($this->input->post('action') == 'Ok')
			$sukses = $this->pengumuman_model->hapus($this->input->post('id'));
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah dihapus.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		redirect('pengumuman/lists');
	}
	
	public function simpan($id = 0){
		//$id = $this->input->post('id');
		//if ($this->input->post('upload')) {			
		
	
		$this->pengumuman_model->do_upload();
			//$this->session->set_flashdata('message', 'Data telah tersimpan.');
		//}
		//$filename = isset($this->pengumuman_model->upload_filename) ? $this->pengumuman_model->upload_filename : $this->input->post('f');
		
		$filename = $this->pengumuman_model->upload_filename;
		$filename = empty($filename)?$this->input->post('f'):$filename;
		
		$data = array(			
			
			'pengumuman_title' => $this->input->post('title'),
			'pengumuman_kategori_id' => $this->input->post('kategori'),
			'pengumuman_image' => $filename,
			'pengumuman_tglupload' => date('Y-m-d'),
			'pengumuman_body' => $this->input->post('body')
		);
		if ($this->input->post('mode') == 'Simpan') {
			$sukses = $this->pengumuman_model->simpan($data);
		} else {
			$sukses = $this->pengumuman_model->koreksi($id,$data);
		}
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah tersimpan.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');

		//$this->index();
		redirect('pengumuman/lists');
	}

	public function lists(){
		//$config['content_per_page'] = 5;
		//$data['content'] = $this->permohonan_model->getAll($config['content_per_page']);	
		add_js('jquery.min.js');
		add_js('jquery.dataTables.min.js');
		
		$data['message']  = $this->session->flashdata('message');		
		$data['dataTablesource'] = $this->nama_class."/getdatatables";	
		$data['page_name'] = 'daftar';
		$data['main_content'] = "includes-bs/".$this->nama_class."/list";
		$this->load->view('template',$data);
	}
		
	public function show(){
		$config['content_per_page'] = 5;
		$data['content'] = $this->pengumuman_model->getAll($config['content_per_page'],0,"desc");		
		$data['message']  = $this->session->flashdata('message');		
		$data['page_name'] = 'terbaru';
		
		$data['main_content'] = 'includes-bs/pengumuman/unformated';
		$this->load->view('template',$data);
	}
	
	public function view($id){
		
		$data['brs'] = $this->pengumuman_model->get($id)	;		
		$data['message']  = $this->session->flashdata('message');	
		$data['page_name'] = 'detil';
		$data['main_content'] = 'includes-bs/pengumuman/view';
		$this->load->view('template',$data);
	}
	
	
	
	public function getdatatables(){
		
		echo $this->pengumuman_model->getdatatables();
	}

	
}
