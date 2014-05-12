<?php
/**
 *  @file warga.php
 *  @brief Digunakan untuk mengelola request dari user yang berhubungan dengan data warga, seperti 
 *         	- permintaan untuk form isi dan edit data warga,
 *  		- permintaan daftar warga
 */
 
class Sms extends CI_Controller {
	var $message;
	var $file;
	var $path;
	
	/**
	* variable static yang digunakan untuk memudahkan pengenalan dalam coding
	* @var nama_class
	*/
	private $nama_class = 'sms';

	function __construct(){
		parent::__construct();
	
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->helper('directory');
		$this->load->helper('url');
		$this->load->helper('utility');
		
		$this->load->library('javascript');

		$this->javascript->external();
		$this->javascript->compile();
		
		$this->load->model('sms_model');				
	}
	
	/**
	 *  @brief Fungsi ini digunakan untuk mengarahkan user pada halaman default dari warga
	 *  
	 *  @return void
	 *  
	 *  @details Mengarahkan ke fungsi form
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function index(){
		//halaman default
		$this->form();
	}

	public function form($edit = 0, $id = null)
	{
		$data['message']  = $this->session->flashdata('message');
		
		if ($edit){					
			$data['id'] = $id;
			$data['data'] = $this->sms_model->get($id);
		} 
		
		add_js('jquery.min.js');
		add_js('jquery.tinylimiter.js');
	
		add_script('var elem = $("#char_count");$("#message").limiter(160, elem);');
	
		$data['main_content'] = "includes-bs/".$this->nama_class."/form";
		$this->load->view('template',$data);					
	}	

	
	public function edit($id){
		$this->form(1,$id);
	}

	/**
	 *  @brief Fungsi ini digunakan untuk menerima data yang akan disimpan
	 *  
	 *  @param [in] $id warga_id
	 *  @return Return_Description
	 *  
	 *  @details proses penyimpanan tergantung dari mode, jika tambah data (warga_id belum ada) maka diarahkan pada fungsi simpan di warga model, sedangkan jika mode koreksi (warga_id sudah ada) maka akan diarahkan pada fungsi koreksi di warga_model
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function simpan($id = 0){
		/*
			1. jika sendto ada isinya maka explode data sendto
			2. jika sendto tidak ada isinya maka baca excel
			3. simpan semua data pada tabel sms
		*/
		
		$data = array();
		foreach ($this->input->post() as $key=>$value) {
			$data['sms_'.$key] = $value; 
		}
		$data['sms_pengirim'] = $this->session->userdata('u');//isset($this->session->userdata('u'))?$this->session->userdata('u'):'-';
				
		//$data['warga_rt_id'] = $this->input->post('rtrw');
		//unset($data['warga_rtrw']);
		unset($data['sms_mode']);
		
		$this->load->model('excel_model');
		
		if ($this->input->post('sendto')) {				
			$penerima = explode(",",$this->input->post('sendto'));
		} else {			
			if ($this->excel_model->do_upload()){				
				$filename = $this->excel_model->file_data['file_name'];
				$penerima = $this->excel_model->read_excel_('./uploads/'.$filename);							
			}
		}
		
		foreach ($penerima as $hp){
			
			if(is_array($hp)){
				$data['sms_title'] = $this->input->post('title');//.date('Y-m-d G:i:s');
				$data['sms_sendto'] = $hp['B'];
				$data['sms_message']= $hp['C'];// . date('Y-m-d G:i:s');
				
			} else {				
				/* $data['sms_title'] = $this->input->post('title').date('Y-m-d G:i:s');
				$data['sms_sendto'] = $hp['B'];
				$data['sms_message']= $this->input->post('message') . date('Y-m-d G:i:s'); */
			}
				
			
			$dataSMS = array(			
			'DestinationNumber'=> (is_array($hp)?$hp['B']:$hp),
			'TextDecoded'=> $data['sms_message'],//$this->input->post('message'),
			'CreatorID'=>'ci'			
			);		
			

			if ($this->input->post('mode') == 'Kirim') {
				$sukses = $this->sms_model->simpan($data);
			} else {
				$sukses = $this->sms_model->koreksi($id,$data);
			}
			
			$this->sms_model->sendsms($dataSMS);
		}
		
		
		
		if ($sukses)			
			$this->session->set_flashdata('message', 'Data telah tersimpan, dan SMS telah diantrikan');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		
		redirect('sms/lists');
	}	
	
	public function delete($id){
		$data['message']  = $this->session->flashdata('message');		
		$data['id'] = $id;		
		$data['data'] = $this->rt_model->get($id);
		$data['main_content'] = "includes-bs/".$this->nama_class."/delete";
		
		$this->load->view('template',$data);
		
	}
	
	public function hapus() {
		if ($this->input->post('action') == 'Ok')
			$sukses = $this->rt_model->hapus($this->input->post('id'));
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah dihapus.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		redirect('rt/lists');
	}
	
	
	/**
	 *  @brief Menampilkan data warga dalam bentuk table
	 *  
	 *  @return void
	 *  
	 *  @details Menampilkan data dalam bentuk table
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function lists(){
		add_js('jquery.min.js');
		add_js('jquery.dataTables.min.js');
		add_js('jquery.dataTables.rowGrouping.js');
		/* add_css('jquery-ui.css');
		add_css('jquery-ui-1.7.2.custom.css');
		add_css('site_jui.ccss'); */
		
		$data['message']  = $this->session->flashdata('message');		
		$data['dataTablesource'] = $this->nama_class."/getdatatables";	
		$data['main_content'] = "includes-bs/".$this->nama_class."/list";
		$this->load->view('template',$data);
	}
	
	/**
	 *  @brief mengambil data warga untuk keperluan fungsi lists
	 *  
	 *  @return tulisan (text)
	 *  
	 *  @details menampilkan hasil dari fungsi getdatatables di warga_model
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function getdatatables(){		
		echo $this->sms_model->getdatatables();
	}

}
