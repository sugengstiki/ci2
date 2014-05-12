<?php
/**
 *  @file seminar.php
 *  @brief Digunakan untuk mengelola request dari user yang berhubungan dengan data seminar, seperti 
 *         	- permintaan untuk form isi dan edit data seminar,
 *  		- permintaan daftar seminar
 */
 
class Seminar extends CI_Controller {
	var $message;
	var $file;
	var $path;
	
	/**
	* variable static yang digunakan untuk memudahkan pengenalan dalam coding
	* @var nama_class
	*/
	private $nama_class = 'seminar';

	function __construct(){
		parent::__construct();
	
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->helper('directory');
		$this->load->helper('url');
		$this->load->helper('utility');
		$this->load->library('form_builder');
		
		$this->load->library('javascript');
		//$this->javascript->external();
		
		
		$this->load->model('seminar_model');
		$this->load->model('rt_model');
		
	}
	
	/**
	 *  @brief Fungsi ini digunakan untuk mengarahkan user pada halaman default dari seminar
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
	
	/**
	 *  @brief Fungsi edit seminar
	 *  
	 *  @param [in] $id seminar_id
	 *  @return void
	 *  
	 *  @details fungsi ini akan memanggil fungsi form dalam mode edit (1), beserta seminar_id
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function edit($id){
		$this->form(1,$id);
	}

	public function delete($id){
		$data['message']  = $this->session->flashdata('message');		
		$data['id'] = $id;		
		$data['data'] = $this->seminar_model->get($id);
		$data['main_content'] = "includes-bs/".$this->nama_class."/delete";
		
		$this->load->view('template',$data);
		
	}
	
	public function hapus() {
		if ($this->input->post('action') == 'Ok')
			$sukses = $this->seminar_model->hapus($this->input->post('id'));
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah dihapus.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		redirect('seminar/lists');
	}
	
	/**
	 *  @brief menampilkan form edit sesuai mode (tambah/edit)
	 *  
	 *  @param [in] $edit Mode tambah/edit
	 *  @param [in] $id diisi dengan seminar_id 
	 *  @return void
	 *  
	 *  @details fungsi ini akan menampilkan form seminar sesuai mode, jika mode edit (1) maka form akan disertakan dengan data pendukung
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function form($edit = 0, $id = null)
	{
	
		$data['message']  = $this->session->flashdata('message');
		
		if ($edit){					
			$data['id'] = $id;
			$data['data'] = $this->seminar_model->get($id);
		} 
		
		$this->javascript->blur('#nrp', "
			var nrp = $('#nrp').val();
			$.post('" . base_url(). "seminar/get',{'id':nrp}, function(result) {
				$('#nama').val(result.namamhs);				
			},'json');");
		
		$this->javascript->compile();
				
		add_js('jquery.min.js');
		
		
		$data['main_content'] = "includes-bs/".$this->nama_class."/form";
		$this->load->view('template',$data);					
	}
	
	public function presensi()
	{
	
		$data['message']  = $this->session->flashdata('message');
		add_script("
$('#noreg').keyup(function(){
	if ($('#noreg').val().length == 12) {
		$('#nama').focus(); 		
	}
});			

/* $('form').keypress(function(e) {
	if (!$('#nama').val() && e.which == 13) {
		return false;
	} 
}); */");
		
		$this->javascript->blur('#noreg', "
			var noreg = $('#noreg').val();
			$.post('" . base_url(). "seminar/get_peserta',{'id':noreg}, function(result) {
				$('#nama').val(result.seminar_nama);				
			},'json');");
		
		$this->javascript->compile();
				
		add_js('jquery.min.js');
		
		
		$data['main_content'] = "includes-bs/".$this->nama_class."/form_presensi";
		$this->load->view('template',$data);					
	}

	/**
	 *  @brief Fungsi ini digunakan untuk menerima data yang akan disimpan
	 *  
	 *  @param [in] $id seminar_id
	 *  @return Return_Description
	 *  
	 *  @details proses penyimpanan tergantung dari mode, jika tambah data (seminar_id belum ada) maka diarahkan pada fungsi simpan di seminar model, sedangkan jika mode koreksi (seminar_id sudah ada) maka akan diarahkan pada fungsi koreksi di seminar_model
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function simpan($id = 0){
				
		$data = array();
		foreach ($this->input->post() as $key=>$value) {
			$data['seminar_'.$key] = $value; 
		}
		//$data['seminar_rt_id'] = $this->input->post('rtrw');
		//print_r($data);
		//print_r($this->input->post());
		//die();
		$data['seminar_noreg'] = date('md').$data['seminar_id'].substr($data['seminar_nrp'],strlen($data['seminar_nrp']) - 4,4).str_pad($this->seminar_model->jmlRec(), 3, "0", STR_PAD_LEFT);
		
		unset($data['seminar_mode']);
			
		//$data['seminar_id'] = $this->seminar_model->getbyusername($this->session->userdata('u'))->seminar_id
			
		if ($this->input->post('mode') == 'Simpan') {
			$sukses = $this->seminar_model->simpan($data);
		} else {
			$sukses = $this->seminar_model->koreksi($id,$data);
		}
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah tersimpan.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		//$this->index();
		
		redirect('seminar/cetak/'.$data['seminar_nrp']);
	}
	
	public function simpan_presensi($id = 0){
				
		$data = array();
		foreach ($this->input->post() as $key=>$value) {
			$data['seminar_'.$key] = $value; 
		}
		//$data['seminar_rt_id'] = $this->input->post('rtrw');
		unset($data['seminar_nama']);
		unset($data['seminar_mode']);
			
		//$data['seminar_id'] = $this->seminar_model->getbyusername($this->session->userdata('u'))->seminar_id
			
		//if ($this->input->post('mode') == 'Simpan') {
		//	$sukses = $this->seminar_model->simpan($data);
		//} else {
		
		//periksa keberadaan pendaftaran
		
		if (!$this->seminar_model->get_noreg($data['seminar_noreg']))
			$this->session->set_flashdata('message', 'Peserta belum terdaftar');			
		else {
			
			$id = $data['seminar_noreg'];
			$data['seminar_status'] = 3;
			$sukses = $this->seminar_model->koreksi($id,$data);
			//}
			if ($sukses)
				$this->session->set_flashdata('message', 'Data telah tersimpan.');
			else
				$this->session->set_flashdata('message', 'Peserta sudah melakukan Presensi');			
		}
		//$this->index();
		redirect('seminar/presensi');
	}
	
	/**
	 *  @brief Menampilkan data seminar dalam bentuk table
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
		
		$data['message']  = $this->session->flashdata('message');		
		$data['dataTablesource'] = $this->nama_class."/getdatatables";	
		$data['main_content'] = "includes-bs/".$this->nama_class."/list";
		$this->load->view('template',$data);
	}
	
	/**
	 *  @brief mengambil data seminar untuk keperluan fungsi lists
	 *  
	 *  @return tulisan (text)
	 *  
	 *  @details menampilkan hasil dari fungsi getdatatables di seminar_model
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function getdatatables(){		
		echo $this->seminar_model->getdatatables();
	}

	/**
	 *  @brief mengambil data seminar
	 *  
	 *  @return tulisan (data seminar)
	 *  
	 *  @details Mengambil data seminar untuk keperluan otomasi setelah dimasukkan noktp, parameter ini menggunakan method post
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function get(){		
		$nrp = $this->input->post('id');
		echo json_encode($this->seminar_model->get_nama($nrp));
	}
	
	public function get_peserta(){		
		$noreg = $this->input->post('id');
		echo json_encode($this->seminar_model->get_nama_peserta($noreg));
	}
	
	public function cetak($nrp)
	{
		
				
		add_js('jquery.min.js');
		add_js('jquery-barcode.min.js');
		add_js('jquery.qrcode.min.js');
		
		$data['data'] = $this->seminar_model->get($nrp);
		//$data['semua'] = $this->seminar_model->getAll();
		$data['main_content'] = "includes-bs/".$this->nama_class."/bukti";
		$this->load->view('print',$data);
		
	}
}
