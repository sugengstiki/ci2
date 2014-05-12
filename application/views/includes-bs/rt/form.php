<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">Data RT <small><?= isset($id)?" Ubah Data RT":" Tambah Data RT";?></small></h2>
</div>
<div class="panel-body">
				
<?php
	if (isset($id)){
	
		echo form_open_multipart("rt/simpan/$id");
	
	} else { //add 
		echo form_open_multipart('rt/simpan/');
	
	} //endif isset

	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		
		array(/* INPUT */
			'id' => 'nama',					
			'value' => isset($data->rt_nama)?$data->rt_nama:'',
			'placeholder' => 'Nama RT',        
			'help' => 'Silahkan diisi dengan nama unik dari RT'			
		),
		array(/* INPUT */
			'id' => 'desc',		
			'label' => 'Keterangan Tambahan',
			'value' => isset($data->rt_desc)?$data->rt_desc:'',
			'placeholder' => 'Keterangan',        
			'help' => 'Isikan dengan keterangan tambahan untuk RT'			
		),
		array(/* INPUT */
			'id' => 'telp',		
			'label' => 'Nomer Telpon',
			'value' => isset($data->rt_telp)?$data->rt_telp:'',
			'placeholder' => 'No Telp',        
			'help' => 'Isikan dengan no telp pengurus yang dapat dihubungi'			
		),
		array(/* INPUT */
			'id' => 'email',		
			'label' => 'Keterangan Tambahan',
			'value' => isset($data->rt_desc)?$data->rt_desc:'',
			'placeholder' => 'Keterangan',        
			'help' => 'Isikan dengan keterangan tambahan untuk RT'			
		),
		array(/* INPUT */
			'id' => 'rt',		
			'label' => 'RT/RW',
			'value' => isset($data->rt_rt)?$data->rt_rt:'',
			'placeholder' => 'No RT',        
			'help' => 'Isikan dengan angka yang mewakili RT'			
		),
		
		array(
			'id' => 'rw', 			
			'label' => ' ',
			'placeholder' => 'RW',
			'value' => isset($data->rt_rw)?$data->rt_rw:'',
			'help' => 'isikan dengan angka yang mewakili RW'
		),
		array(/* INPUT */
			'id' => 'kelurahan',					
			'value' => isset($data->rt_kelurahan)?$data->rt_kelurahan:'',
			'placeholder' => 'Nama Kelurahan',        
			'help' => 'Isikan dengan nama kelurahan'			
		),
		array(/* INPUT */
			'id' => 'kecamatan',		
			
			'value' => isset($data->rt_desc)?$data->rt_desc:'',
			'placeholder' => 'Nama Kecamatan',        
			'help' => 'Isikan dengan keterangan tambahan untuk RT'			
		),
		array(/* INPUT */
			'id' => 'kota',					
			'value' => isset($data->rt_kota)?$data->rt_kota:'',
			'placeholder' => 'No RT',        
			'help' => 'Isikan dengan angka yang mewakili RT'			
		),
		
		array(/* INPUT */
			'id' => 'propinsi',					
			'value' => isset($data->rt_propinsi)?$data->rt_propinsi:'',
			'placeholder' => 'Nama Propinsi',        
			'help' => 'Isikan dengan nama Propinsi'			
		),
		array(/* INPUT */
			'id' => 'username',		
			'label' => 'Username Admin',
			'value' => isset($data->rt_username)?$data->rt_username:'',
			'placeholder' => 'username',        
			'help' => 'Isikan dengan username dari admin'			
		),
		array(/* INPUT */
			'id' => 'password',					
			'label' => 'Password Admin',
			'value' => isset($data->rt_password)?$data->rt_password:'',			      
			'help' => 'Isikan dengan password admin'			
		),
		
		
		array(
			'id' => 'mode',		
			'label' => isset($id)?"Koreksi":"Simpan",
			'type' => 'submit'
		)
	));
				
		?>
	
</form>
</div> 
</div><!-- end of panel body -->
</div>
