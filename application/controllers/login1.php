<?php
//session_start();
class Login extends CI_Controller {
	
	public function index() {
			$this->load->view('login');
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
		$ada = $this->user_model->getpassword($u,$p);
		//print_r($_SESSION);
		//die();
		if ($ada) {
			$data = array(
				'u' => $u,
				'sudahlogin' => true,
				'role_id' => '1'
			);			
			$this->session->set_userdata($data);
			//$_SESSION['userType'] = 'member';
			
			redirect('site');
		} else {
			$this->index();
		}
	}
}
