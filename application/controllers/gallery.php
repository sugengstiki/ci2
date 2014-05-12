<?php

class Gallery extends CI_Controller {
	var $message;
	var $file;
	var $path;
	private $nama_class = 'gallery';

	function __construct(){
		parent::__construct();
	
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->helper('directory');
		$this->load->helper('url');
		$this->load->helper('utility');
		
		//$this->load->model('permohonan_model');
		//$this->load->model('kategori_model');
		
	}
	public function index(){
		//halaman default
		$this->grid();
	}
	
	public function form($edit = 0)
	{	
		//$config['content_per_page'] = 5;
		//$data['content'] = $this->permohonan_model->getAll($config['content_per_page']);		
		$data['message']  = $this->session->flashdata('message');		
		if ($edit)
			$data['main_content'] = "includes-bs/".$this->nama_class."/form_edit";
		else
			$data['main_content'] = "includes-bs/".$this->nama_class."/form_add";
		$this->load->view('template',$data);					
	}
	
	public function simpan(){
		//$id = $this->input->post('id');
		$data = array(			
			'name' => $this->input->post('name'),
			'gender' => $this->input->post('gender')
		);
		
		$this->user_model->simpan($data);
		$this->session->set_flashdata('message', 'Data telah tersimpan.');
		//$this->index();
		redirect('site');
	}
	
	public function lists(){
		//$config['content_per_page'] = 5;
		//$data['content'] = $this->permohonan_model->getAll($config['content_per_page']);		
		$data['message']  = $this->session->flashdata('message');		
		$data['source'] = $this->nama_class."/getdatatables";	
		$data['main_content'] = "includes-bs/".$this->nama_class."/list";
		$this->load->view('template',$data);
	}
	
	public function grid(){
		//add_js('holder.js');
		$this->load->model('gallery_model');
		if ($this->input->post('upload')) {			
			$this->gallery_model->do_upload();
			//$this->session->set_flashdata('message', 'Data telah tersimpan.');
		}
		$data['images'] = $this->gallery_model->get_images();
		//$data['message']  = 'Data telah tersimpan.';
		//$data['message'] =  $this->message;//'Data telah sukses disimpan';
		$data['footer'] = 'includes/footer';
		$data['main_content'] = "includes-bs/".$this->nama_class."/grid";
		$this->load->view('template',$data);		
	}
	
	
	
	public function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('surat_id,surat_tgl, warga_nama, surat_untuk, surat_nomer, surat_disetujui')
		->from('surat')
		->join('warga','surat.surat_warga_id = warga.warga_id')		
		->add_column('edit', '<a class="ico edit" href="' . base_url() .$this->nama_class.'/edit/$1">Edit</a>', 'surat_id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . $this->nama_class.'/delete/$1">Delete</a>', 'surat_id')
		->unset_column('surat_id');
		
		

		echo $this->datatables->generate();
	}

	
}
