<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">Data Warga <small><?= isset($id)?"Perubahan data warga":"Pendaftaran warga baru";?></small></h2>
</div>
<div class="panel-body">
<?php
	if (isset($id)){
	
		echo form_open_multipart("warga/simpan/$id");
	
	} else { //add 
		echo form_open_multipart('warga/simpan/');
	
	} //endif isset
	
	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		
		array(/* INPUT */
			'id' => 'noktp',
			'label' => 'Nomer KTP',
			'value' => isset($data->warga_noktp)?$data->warga_noktp:'',
			'placeholder' => 'Nomer KTP',        
			'help' => 'diisi sesuai dokumen KTP'			
		),
		array(/* INPUT */
			'id' => 'nama',
			'label' => 'Nama',
			'value' => isset($data->warga_nama)?$data->warga_nama:'',
			'placeholder' => 'Nama Lengkap',        
			'help' => 'diisi sesuai ktp'			
		),
		array(/* INPUT */
			'id' => 'username',
			'label' => 'Username',
			'value' => isset($data->warga_username)?$data->warga_username:'',
			'placeholder' => 'Username',        
			'help' => 'sesuai perminataan'			
		),
		array(/* INPUT */
			'id' => 'password',
			'type' => 'password',
			'value' => isset($data->warga_password)?$data->warga_password:'',			   
			'help' => 'sesuai perminataan'			
		),
		
		array(/* INPUT */
			'id' => 'alamat',			
			'value' => isset($data->warga_alamat)?$data->warga_alamat:'',
			'placeholder' => 'Alamat Lengkap',        
			'help' => 'diisi sesuai KTP'			
		),
		array(/* INPUT */
			'id' => 'telp',
			'label' => 'Telpon',
			'value' => isset($data->warga_telp)?$data->warga_telp:'',
			'placeholder' => 'Nomer Telp',        
			'help' => 'yang dapat dihubungi'			
		),
		
		array(/* INPUT */
			'id' => 'ttl',
			'label' => 'Tempat/Tanggal lahir',
			'value' => isset($data->warga_ttl)?$data->warga_ttl:'',
			'placeholder' => 'Tempat, tanggal lahir',        
			'help' => 'Isikan Tempat dan tanggal lahir sesuai ktp'			
		),
		array(/* INPUT */
			'id' => 'agama',			
			'value' => isset($data->warga_agama)?$data->warga_agama:'',
			'placeholder' => 'Agama',        
			'help' => 'diisi sesuai ktp'			
		),
		array(/* INPUT */
			'id' => 'pendidikan',
			'label' => 'Pendidikan Tertinggi',
			'value' => isset($data->warga_pendidikan)?$data->warga_pendidikan:'',
			'placeholder' => 'Pendidikan tertinggi',        
			'help' => 'Sesuai ktp'			
		),
		array(/* INPUT */
			'id' => 'pekerjaan',			
			'value' => isset($data->warga_pekerjaan)?$data->warga_pekerjaan:'',
			'placeholder' => 'Pekerjaan',        
			'help' => 'Sesuai ktp'			
		),
		array(/* INPUT */
			'id' => 'nokk',
			'label' => 'Nomer KK',
			'value' => isset($data->warga_nokk)?$data->warga_nokk:'',
			'placeholder' => 'Nomer KK',        
			'help' => 'diisi sesuai ktp'			
		),
		array(/* INPUT */
			'id' => 'rtrw',
			'label' => 'RT',
			'data-provide' => 'typeahead',
			'autocomplete' => 'off',
			'value' => isset($data->warga_rt_id)?$data->warga_rt_id:'',
			'placeholder' => 'RT',        
			'help' => 'Sesuai ktp'			
		),

		array(/* DROP DOWN */
			'id' => 'jk',
			'label' => 'Jenis Kelamin',
			'type' => 'radiogroup',
			'options' => array(
				'1' => 'Laki-laki',
				'2' => 'Perempuan'
			),
			'value' => isset($data->warga_jk)?$data->warga_jk:'1',
			'help' => 'Pilih salah satu, sesuai ktp',
		),
		
		array(/* DROP DOWN */
			'id' => 'status',
			'type' => 'radiogroup',
			'options' => array(
				'1' => 'Belum Menikah',
				'2' => 'Sudah Menikah',
				'3' => 'Janda/Duda',
			),
			'value' => isset($data->warga_status)?$data->warga_status:'1',
			'help' => 'Pilih salah satu, sesuai ktp',
		),
		
		
		array(
			'id' => 'mode',		
			'label' => isset($id)?"Koreksi":"Simpan",
			'type' => 'submit'
		)
	));
				
		?>
</div>	
</form>

</div>
</div>