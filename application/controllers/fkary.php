<?php

class Fkary extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        
        $this->load->helper(array('form', 'url'));

		$this->load->library(array('form_validation','cart'));
    }
	function insert_form()	{
		$this->load->view('karyawan', $data);
	}
	function insert_data_kary()
	{
		$IDKary = $this->input->post('IdKary');
		$NmLgkp = $this->input->post('NmLgkp');
		$Panggil = $this->input->post('NmPng');
		$this->load->model('fkary_model');
		$this->fkary_model->insert_data_kary($IDKary, $NmLgkp, $Panggil);
	}
	function index()
	{
		$this->load->model('fkary_model');
		$data = array('temply' => $this->fkary_model->get_data());
		$this->load->view('karyawan', $data);
	
		/* perintah dibawah ini kan untuk ngambil data dan nyimpan yang seharusnya da di function simpan (insert data kary)
		**********************************
		$IDKary = $this->input->post('IdKary');
		$NmLgkp = $this->input->post('NmLgkp');
		$Panggil = $this->input->post('NmPng');
		$this->fkary_model->insert_data_kary($IDKary,$NmLgkp,$Panggil); */

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
      
		/*
        $this->form_validation->set_message('required', '%s harus diisikan');
        $this->form_validation->set_error_delimiters('<div style="color:red;">', '</div>'); 
        $this->form_validation->set_rules('Kode Karyawan', 'Kode Karyawan', 'required');
		$this->form_validation->set_rules('Nama Lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('Nama Panggilan', 'Nama Panggilan', 'required');
		$this->form_validation->set_rules('Nomor KTP/SIM', 'Nomor KTP/SIM', 'required');
		$this->form_validation->set_rules('Alamat KTP/SIM', 'Alamat KTP/SIM', 'required');
		$this->form_validation->set_rules('Alamat Tinggal', 'Alamat Tinggal', 'required');
        $this->form_validation->set_rules('Tgl Orientasi', 'Tgl Orientasi', 'required');
        $this->form_validation->set_rules('Telp', 'Telp', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('karyawan');
		}
		else
		{
			$this->load->view('formsuccess');
		}
		*/
	}
/*    
    function username_check($str)
	{
		if ($str == 'test')
		{
			$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
*/
} 
?>
