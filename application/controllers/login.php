<?php
//session_start();
class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->helper('directory');
		$this->load->helper('url');
		$this->load->helper('utility');
		
		$this->load->library('form_builder');
		$this->load->model('warga_model');
		//$this->load->model('kategori_model');
		
	}
	
	public function index() {
		$data['main_content'] = 'includes-bs/login';
		$data['footer'] = 'includes/footer';
		$data['message']  = $this->session->flashdata('message');
		$this->load->view('template',$data);
			//$this->load->view('login');
	}
	
	public function validasi(){
		//ambil data username dan password dari form login
		//ambil data user dr database berdasarkan username yang diisi oleh user
		//bandingkan data password dari database dengan password yang diisi oleh user
		//jika benar dicatat di session pakai perintah set_userdata($data)
		//teruskan/redirect ke site/
		//die();
		$u = $this->input->post('username1');
		$p = $this->input->post('password1');
		
		$ada = $this->warga_model->getpassword($u,$p);
		//print_r($_SESSION);
		//die($ada);
		if ($ada) {
			
			$data = array(
				'u' => $u,
				'sudahlogin' => true,
				'role_id' => $ada,
				'rt_id' => $this->warga_model->getbyusername($u)->warga_rt_id
			);			
			$this->session->set_userdata($data);
			//$_SESSION['userType'] = 'member';
			
			redirect('pengumuman');
		} else {
			/* $data = array(			
				'role_id' => 0
			);			
			$this->session->set_userdata($data); */
				//die($username . $password);
			$this->index();
		}
	}
	
	function logout(){
		$this->session->unset_userdata('sudahlogin',false);
		$this->session->unset_userdata('role_id',false);
		$this->session->unset_userdata('u',false);
		redirect('login');
	}
}
