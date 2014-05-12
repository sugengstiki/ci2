<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email extends CI_Controller {	
	public function index()
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'sugengw@gmail.com',
			'smtp_pass' => '02110826');
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		$this->email->from('sugengw@gmail.com', 'Sugeng Wid');
		$this->email->to('sugeng@stiki.ac.id'); 
		//$this->email->cc('another@another-example.com'); 
		//$this->email->bcc('them@their-example.com'); 

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');	

		if($this->email->send()){
			echo 'Your email was sent';
		}

		echo $this->email->print_debugger();

		//$this->load->view('awal');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */