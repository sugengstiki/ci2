<?php
/**
 *  @file seminar.php
 *  @brief Digunakan untuk mengelola request dari user yang berhubungan dengan data seminar, seperti 
 *         	- permintaan untuk form isi dan edit data seminar,
 *  		- permintaan daftar seminar
 */
 
class mhs extends CI_Controller {
	

	function __construct(){
		parent::__construct();
	}	
	
	public function index(){
		
		$data['main_content'] = 'form-mhs';
		$this->load->view('template',$data);
	}
}