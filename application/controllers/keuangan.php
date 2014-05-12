<?php 

class Keuangan extends CI_Controller {
	var $message;
	var $file;
	var $path;
	private $nama_class = 'keuangan';

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
		$this->form();
	}
	
	public function form($edit = 0, $id = null)
	{	
		//$config['content_per_page'] = 5;
		//$data['content'] = $this->permohonan_model->getAll($config['content_per_page']);		
		$data['message']  = $this->session->flashdata('message');		
		if ($edit){		
			$data['id'] = $id;
			$data['data'] = $this->keuangan_model->get($id);
		}
		
		add_js('jquery.min.js');
		//add_js('jquery-1.9.1.js');
		//add_js('jquery.ui.core.js');
		//add_js('jquery.ui.widget.js');
		//add_js('jquery.ui.datepicker.js');
		
		//add_css('jquery.ui.all.css');
		//add_css('jquery.ui.datepicker.css'); 
		add_js('bootstrap-datepicker.js');
		add_css('datepicker.css');
		
		add_script("$('#tgl').datepicker({ dateFormat: 'dd/mm/yy' });");
		
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
		$data['data'] = $this->keuangan_model->get($id);
		$data['page_name'] = 'hapus';
		$data['main_content'] = "includes-bs/".$this->nama_class."/delete";
		
		$this->load->view('template',$data);
		
	}
	
	public function hapus() {
		if ($this->input->post('action') == 'Ok')
			$sukses = $this->keuangan_model->hapus($this->input->post('id'));
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah dihapus.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		redirect('keuangan/lists');
	}
	
	public function simpan($id = 0){
		$data = array();
		foreach ($this->input->post() as $key=>$value) {
			$data['keuangan_'.$key] = $value; 
		}
		$data['keuangan_tgl'] = date('Y/m/d',strtotime($data['keuangan_tgl']));
		unset($data['keuangan_mode']);
		
		if ($this->input->post('mode') == 'Simpan') {
			$sukses = $this->keuangan_model->simpan($data);
		} else {
			$sukses = $this->keuangan_model->koreksi($id,$data);
		}
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah tersimpan.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');

		//$this->index();
		redirect('keuangan/lists');
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
		$data['content'] = $this->keuangan_model->getAll($config['content_per_page'],0,"desc");		
		$data['message']  = $this->session->flashdata('message');		
		$data['page_name'] = 'terbaru';
		
		$data['main_content'] = 'includes-bs/keuangan/unformated';
		$this->load->view('template',$data);
	}
	
	public function view($id){
		
		$data['brs'] = $this->keuangan_model->get($id)	;		
		$data['message']  = $this->session->flashdata('message');	
		$data['page_name'] = 'detil';
		$data['main_content'] = 'includes-bs/keuangan/view';
		$this->load->view('template',$data);
	}
	
	
	
	public function getdatatables(){
		
		echo $this->keuangan_model->getdatatables();
	}

	
}
