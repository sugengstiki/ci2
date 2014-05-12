<?php

class Site extends CI_Controller {
	var $message;
	var $file;
	var $path;

	function __construct(){
		parent::__construct();
		//kalo harus login, remarknya dibuka dulu
		//$this->sudahlogin();

		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->helper('directory');
		$this->load->helper('url');
		$this->path = "application" . DIRECTORY_SEPARATOR . "test_files"
			 . DIRECTORY_SEPARATOR;
		$this->file = $this->path . "hello.txt";	
	}
	
	public function index()
	{	
		/* $config['base_url'] = site_url('site/index');					
		
		//buat pagination
		$this->load->library('pagination');
		$norec = $this->uri->segment(3);
		$config['total_rows'] = $this->user_model->jmlRec();
		$config['per_page'] = 4; 
		$config['prev_link'] = 'Previous';
		$config['next_link'] = 'Next';
		$config['cur_tag_open'] = '<a href="#" class="current">';
		$config['cur_tag_close'] = '</a>';
		$data['user'] = $this->user_model->getAll($config['per_page'],$norec);
		$this->pagination->initialize($config);	
		
		$data['message']  = $this->session->flashdata('message');
		
		$data['main_content'] = 'includes-bs/listuser';
		$data['footer'] = 'includes/footer'; */
		
		$this->load->view('boot');
		//$this->load->view('template',$data);					
	}
	function get_content(){
		if ($this->input->post('keyword') == 'a') {
			echo 'abc';
		} else {
			echo 'bukan a';
		}
		
	}
	function sudahlogin(){
		$sudah = $this->session->userdata('sudahlogin');
		if (!isset($sudah) || $sudah != true) {
			redirect('login');
			//echo 'sorry bro';
			//die();
		}
	}
	
	function logout(){
		$this->session->unset_userdata('sudahlogin',false);
		$this->session->unset_userdata('role_id',false);
		$this->session->unset_userdata('u',false);
		redirect('login');
	}
	
	public function gallery()
	{	
	//	die('tdst');
		$this->load->model('Gallery_model');
		if ($this->input->post('upload')) {			
			$this->Gallery_model->do_upload();
			//$this->session->set_flashdata('message', 'Data telah tersimpan.');
		}
		$data['images'] = $this->Gallery_model->get_images();
		$data['message']  = 'Data telah tersimpan.';
		//$data['message'] =  $this->message;//'Data telah sukses disimpan';
		$data['footer'] = 'includes/footer';
		$data['main_content'] = 'includes-bs/gallery/grid';
		$this->load->view('template',$data);		
		
		//$this->load->view('gallery');
		
	}

	public function create(){
		/* $this->load->model('user_model'); */
		
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$this->user_model->simpan($data);
		redirect('site');
	}	
	
	public function logins(){
		$data['main_content'] = 'includes-bs/login';
		$data['footer'] = 'includes/footer';
		$this->load->view('template',$data);
	}
	public function add(){
		$data['main_content'] = 'includes-bs/f_add';
		$data['footer'] = 'includes/footer';
		$this->load->view('template',$data);
	}
	
	public function edit($id){
		$data['id'] = $id; //$this->uri->segment(3);
		$data['main_content'] = 'includes-bs/edit';
		$this->load->view('template',$data); 		
		//$this->load->view('edit',$data);
	}
	
	public function simpanedit(){
		$id = $this->input->post('id');
		$data = array(			
			'name' => $this->input->post('name'),
			'gender' => $this->input->post('gender')
		);
		
		$this->user_model->koreksi($id,$data);
		$this->session->set_flashdata('message', 'Data telah tersimpan.');
		//$this->message = 'Data telah tersimpan';
		//$this->index();
		redirect('site');
	}
	
	public function simpanbaru(){
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
	
	public function view($id){
		//echo $id;
		//die();
		$data = $this->user_model->get($id);
		
		$this->load->view('view',$data);
	}
	
	public function sendmail(){
		$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.gmail.com',
		'smtp_port' => 465,
		'smtp_user' => 'sugengw@gmail.com',
		'smtp_pass' => '92110826');
		
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('sugengw@gmail.com','Sugeng');
		$this->email->to('sugeng@stiki.ac.id');
		$this->email->subject('this is an email test');
		$this->email->message('It is working.Great');
		
		if($this->email->send())
		{
			echo 'pesan terkirim';			
		} else
		{
			show_error($this->email->print_debugger());
		}
		
	}
	
	public function file()
	{				
			
	}
	
	function write_test() {
		$data = "Hello World";
		write_file($this->file,$data);
		echo "finished writing";
	}
	
	function read_test() {
		$string = read_file($this->file);
		echo $string;
	}
	
	function filenames_test() {
		$files = get_filenames($this->path, TRUE);
		print_r($files);
	}

	function dir_file_info_test() {
		$files = get_dir_file_info($this->path);
		print_r($files);
	}

	function file_info_test() {
		$info = get_file_info($this->file, 'date');
		print_r($info);
	}
	
	function mime_test() {
		//echo get_mime_by_extension($this->file);
		echo get_mime_by_extension('hello.png');
	}
	
	function download_test() {
		$string = "Hello";
		force_download('hello.txt',read_file($this->file));
	}
	
	function display() {
		
		$data['files'] = directory_map(BASEPATH."../application");
		echo BASEPATH;
		$this->load->view('files', $data);
	}
	
	function filexls() {				
		
		$this->load->model('Excel_model');
		if ($this->input->post('upload')) {			
			$this->Excel_model->do_upload();			
		}		
		$data['excels'] = $this->Excel_model->get_excels();
		//$data['main_content'] = 'includes-bs/listexcel';
		$data['main_content'] = 'includes-bs/form_sendsms';
		//$data['message']  = 'Data excel telah tersimpan.';
		$data['footer'] = 'includes/footer';
		$this->load->view('template',$data);
		
		
		//print_r($worksheet);
	}
	
	public function showmhs_($filename = ''){
		if (empty($filename)) {
			return 0;
		}
		//echo $filename;
		
		$this->load->model('Excel_model');
		$data['user'] = $this->Excel_model->read_excel('./uploads/'.$filename);
		$data['main_content'] = 'includes-bs/listmhs';
		//$data['message']  = 'Data excel telah tersimpan.';
		$this->load->view('template',$data);
		
	}
	
	public function showmhs($filename = ''){
		if (empty($filename)) {
			return 0;
		}
		//echo $filename;
		
		$this->load->model('Excel_model');
		$data['user'] = $this->Excel_model->read_excel_('./uploads/'.$filename);
		$data['main_content'] = 'includes-bs/listmhs';
		//$data['message']  = 'Data excel telah tersimpan.';
		$this->load->view('template',$data);
		
	}
	
	public function sendsms(){
		//$id = $this->input->post('id');
	
		$this->load->model('Excel_model');
		
		$phone = $this->input->post('chk');
		
		foreach ($phone as $hp){
			$data = array(			
			'DestinationNumber'=> $hp,
			'TextDecoded'=> $this->input->post('berita'),
			'CreatorID'=>'ci'			
			);		
		
			$this->Excel_model->simpan($data);
		}
		$this->session->set_flashdata('message', 'Data telah terkirim.');
		//$this->index();
		redirect('site/filexls');
	}
	
	public function sendbulksms(){
		
		$this->load->model('Excel_model');
		
		//simpan dokumen sms				
		if ($this->input->post('sendto')) {			
			$data['user'] = $this->input->post('sendto');			
		} else {
			if ($this->Excel_model->do_upload()){				
				$data['user'] = $this->Excel_model->read_excel();			
			}
		}		
		//print_r($data['user']);
		//die();
		$datasms = array(			
			'title'=> $this->input->post('title'),
			'sendto'=> $this->input->post('sendto'),
			'file'=> $this->Excel_model->file_data['file_name'],
			'berita' => $this->input->post('berita')
		);		
		
		$this->Excel_model->simpan($datasms);
		
		if (is_array($data['user'])){
			foreach ($data['user'] as $hp){
			
				$data = array(			
				'DestinationNumber'=> $hp[1],
				'TextDecoded'=> $this->input->post('berita'),
				'CreatorID'=>'ci'			
				);		
			
				$this->Excel_model->sendsms($data);
			}
		} else {
			
			$data['user'] = explode(",",$this->input->post('sendto'));
			foreach ($data['user'] as $hp){				
				$data = array(			
				'DestinationNumber'=> str_replace("'","",$hp),
				'TextDecoded'=> $this->input->post('berita'),
				'CreatorID'=>'ci'			
				);		
			
				$this->Excel_model->sendsms($data);
			}
			
		}
		$this->session->set_flashdata('message', 'Data telah terkirim.');
		//$this->index();
		redirect('site/filexls');
	}
	
	function datatables(){
	$data['main_content'] = 'includes-bs/post';
	$data['footer'] = 'includes/footer';
	$this->load->view('template',$data);
  
	}
	
	public function getdatatables(){
		$this->load->library('datatables');

		$this->datatables
		->select('id, name, gender, dob')
		->from('tbl_person')    
		
		->add_column('edit', '<a class="ico edit" href="' . base_url() . 'admin/profiles/edit/$1">Edit</a>', 'id')
		->add_column('delete', '<a class="ico del" href="' . base_url() . 'admin/profiles/delete/$1">Delete</a>', 'id')
		->edit_column('gender','$1','jk(gender)');

		echo $this->datatables->generate();
	}
	
	
	public function create_excel(){
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('test worksheet');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
		//change the font size
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
		//make the font become bold
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		//merge cell A1 until D1
		$this->excel->getActiveSheet()->mergeCells('A1:D1');
		//set aligment to center for that merged cell (A1 to D1)
		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		 
		$filename='just_some_random_name.xlsx'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
					 
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		//$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
	
	
}
