<?php
/**
 *  @file warga.php
 *  @brief Digunakan untuk mengelola request dari user yang berhubungan dengan data warga, seperti 
 *         	- permintaan untuk form isi dan edit data warga,
 *  		- permintaan daftar warga
 */
 
class Warga extends CI_Controller {
	var $message;
	var $file;
	var $path;
	
	/**
	* variable static yang digunakan untuk memudahkan pengenalan dalam coding
	* @var nama_class
	*/
	private $nama_class = 'warga';

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
		
		
		$this->load->model('warga_model');
		$this->load->model('rt_model');
		
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
		$this->lists();
	}
	
	/**
	 *  @brief Fungsi edit warga
	 *  
	 *  @param [in] $id warga_id
	 *  @return void
	 *  
	 *  @details fungsi ini akan memanggil fungsi form dalam mode edit (1), beserta warga_id
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function edit($id){
		$this->form(1,$id);
	}

	public function delete($id){
		$data['message']  = $this->session->flashdata('message');		
		$data['id'] = $id;		
		$data['data'] = $this->warga_model->get($id);
		$data['main_content'] = "includes-bs/".$this->nama_class."/delete";
		
		$this->load->view('template',$data);
		
	}
	
	public function hapus() {
		if ($this->input->post('action') == 'Ok')
			$sukses = $this->warga_model->hapus($this->input->post('id'));
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah dihapus.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		redirect('warga/lists');
	}
	
	/**
	 *  @brief menampilkan form edit sesuai mode (tambah/edit)
	 *  
	 *  @param [in] $edit Mode tambah/edit
	 *  @param [in] $id diisi dengan warga_id 
	 *  @return void
	 *  
	 *  @details fungsi ini akan menampilkan form warga sesuai mode, jika mode edit (1) maka form akan disertakan dengan data pendukung
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function form($edit = 0, $id = null)
	{
	
		$data['message']  = $this->session->flashdata('message');
		
		if ($edit){					
			$data['id'] = $id;
			$data['data'] = $this->warga_model->get($id);
		} 
		
		$this->javascript->blur('#rtrw', "
			var rtrw = $('#rtrw').val();
			$.post('" . base_url(). "rt/get',{'id':rtrw}, function(result) {
				$('#nama').html('Nama : ' + result.name);				
			},'json');");
		
		$this->javascript->compile();
		
		add_css('bootstrap.css');
		add_js('jquery.min.js');
		add_js('bootstrap-typeahead.js');
		add_js('bootstrap.min.js');
		add_js('bootstrap-tab.js');
		
		add_script("$('#rtrw').typeahead({
					source : function(query,process){
						$.ajax({ 
							url:'http://localhost/ci2/rt/getRT',
							type:'POST',
							data:'query=' + query,
							dataType:'JSON',
							async:false,
							success:function(data){
								process(data);
							}
						});	
					}
					
				});");
		
		$data['main_content'] = "includes-bs/".$this->nama_class."/form";
		$this->load->view('template',$data);					
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
		
		/* $data = array(			
			
			'warga_noktp' => $this->input->post('noktp'),
			'warga_nama' => $this->input->post('nama'),
			'warga_alamat' => $this->input->post('alamat'),
			'warga_telp' => $this->input->post('telp'),
			'warga_ttl' => $this->input->post('ttl'),
			'warga_agama' => $this->input->post('agama'),
			'warga_pendidikan' => $this->input->post('pendidikan'),
			'warga_pekerjaan' => $this->input->post('pekerjaan'),
			'warga_nokk' => $this->input->post('nokk'),
			'warga_rt_id' => $this->input->post('rtrw'),
			'warga_jk' => $this->input->post('jk'),
			'warga_status' => $this->input->post('status'),
			'warga_username' => $this->input->post('username'),
			'warga_password' => $this->input->post('password'),
			
		); */
		$data = array();
		foreach ($this->input->post() as $key=>$value) {
			$data['warga_'.$key] = $value; 
		}
		$data['warga_rt_id'] = $this->input->post('rtrw');
		unset($data['warga_rtrw']);
		unset($data['warga_mode']);
			
		//$data['warga_id'] = $this->warga_model->getbyusername($this->session->userdata('u'))->warga_id
			
		if ($this->input->post('mode') == 'Simpan') {
			$sukses = $this->warga_model->simpan($data);
		} else {
			$sukses = $this->warga_model->koreksi($id,$data);
		}
		if ($sukses)
			$this->session->set_flashdata('message', 'Data telah tersimpan.');
		else
			$this->session->set_flashdata('message', 'Proses tidak berhasil.');
		//$this->index();
		redirect('warga/lists');
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
		echo $this->warga_model->getdatatables($this->session->userdata('role_id')=='admin'?'':$this->session->userdata('rt_id'));
	}

	/**
	 *  @brief mengambil data warga
	 *  
	 *  @return tulisan (data warga)
	 *  
	 *  @details Mengambil data warga untuk keperluan otomasi setelah dimasukkan noktp, parameter ini menggunakan method post
	 *  
	 *  @author Sugeng Widodo <sugeng@stiki.ac.id>
	 */
	public function get(){		
		$noktp = $this->input->post('noktp');
		echo json_encode($this->warga_model->getbynoktp($noktp));
	}
}
