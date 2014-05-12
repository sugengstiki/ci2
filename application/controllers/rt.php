<?php
/**
 *  @file rt.php
 *  @brief Digunakan untuk mengelola request dari user yang berhubungan dengan data rt, seperti 
 *         	- permintaan untuk form isi dan edit data rt,
 *  		- permintaan daftar/list rt
 */
 
class Rt extends CI_Controller {
	var $message;
	var $file;
	var $path;
	
	/**
	* variable static yang digunakan untuk memudahkan pengenalan dalam coding
	* @var nama_class
	*/
	private $nama_class = 'rt';

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
		
		$this->load->model('rt_model');
		//$this->load->model('kategori_model');
		
	}
	
	/**
	 *  @brief Fungsi ini digunakan untuk mengarahkan user pada halaman default dari rt
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
	 *  @brief Fungsi edit rt
	 *  
	 *  @param [in] $id rt_id
	 *  @return void
	 *  
	 *  @details fungsi ini akan memanggil fungsi form dalam mode edit (1), beserta rt_id
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function edit($id){
		$this->form(1,$id);
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
	 *  @brief menampilkan form edit sesuai mode (tambah/edit)
	 *  
	 *  @param [in] $edit Mode tambah/edit
	 *  @param [in] $id diisi dengan rt_id 
	 *  @return void
	 *  
	 *  @details fungsi ini akan menampilkan form rt sesuai mode, jika mode edit (1) maka form akan disertakan dengan data pendukung
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function form($edit = 0, $id = null)
	{	
		$data['message']  = $this->session->flashdata('message');
		
		if ($edit){					
			$data['id'] = $id;
			$data['data'] = $this->rt_model->get($id);
		} 
				
		
		$data['main_content'] = "includes-bs/".$this->nama_class."/form";
		$this->load->view('template',$data);					
	}	
	
	public function view($id){		

		$data['brs'] = $this->rt_model->get($id);		
		$data['message']  = $this->session->flashdata('message');		
		$data['main_content'] = 'includes-bs/rt/view';
				
		$this->load->view('template',$data);
	}

	/**
	 *  @brief Fungsi ini digunakan untuk menerima data yang akan disimpan
	 *  
	 *  @param [in] $id rt_id
	 *  @return Return_Description
	 *  
	 *  @details proses penyimpanan tergantung dari mode, jika tambah data (rt_id belum ada) maka diarahkan pada fungsi simpan di rt model, sedangkan jika mode koreksi (rt_id sudah ada) maka akan diarahkan pada fungsi koreksi di rt_model
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function simpan($id = 0){
				
		$data = array();
		foreach ($this->input->post() as $key=>$value) {
			$data['rt_'.$key] = $value; 
		}
		/* $data['warga_rt_id'] = $this->input->post('rtrw');*/
		unset($data['rt_username']);
		unset($data['rt_password']);
		unset($data['rt_mode']); 
			
		//$data['warga_id'] = $this->warga_model->getbyusername($this->session->userdata('u'))->warga_id
		$this->load->model('warga_model');
		if ($this->input->post('mode') == 'Simpan') {
			$id = $this->rt_model->simpan($data);
			
			$data_admin = array(			
			'warga_username' => $this->input->post('username'),
			'warga_password' => $this->input->post('password'),
			'warga_rt_id' => $id,
			'warga_tipe' => 'admin'
			);
		
			$sukses = $this->warga_model->simpan($data_admin);
		} else {
			$sukses = $this->rt_model->koreksi($id,$data);
		}
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah tersimpan.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		//$this->index();
		redirect('rt');
	}	
	
	/**
	 *  @brief Menampilkan data rt dalam bentuk table
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
	 *  @brief mengambil data rt untuk keperluan fungsi lists
	 *  
	 *  @return tulisan (text)
	 *  
	 *  @details menampilkan hasil dari fungsi getdatatables di rt_model
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function getdatatables(){		
		echo $this->rt_model->getdatatables();
	}

	/**
	 *  @brief mengambil data rt
	 *  
	 *  @return tulisan (data rt)
	 *  
	 *  @details Mengambil data rt untuk keperluan otomasi setelah dimasukkan noktp, parameter ini menggunakan method post
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function getRT(){
		$query = $this->input->post('query');				
		echo json_encode($this->rt_model->getbynama($query));
	}
	
	public function get(){		
		$id = $this->input->post('id');
		echo json_encode($this->rt_model->get($id));
	}
}
