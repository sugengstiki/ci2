<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">Presensi <small><?= isset($id)?" Ubah":" Tambah";?></small></h2>
</div>
<div class="panel-body">
				
<?php
	if (isset($id)){
		echo form_open_multipart("seminar/simpan_presensi/$id");	
	} else { //add 
		echo form_open_multipart('seminar/simpan_presensi/');	
	} //endif isset

	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		
		array(/* INPUT */
			'id' => 'noreg',		
			'label' => 'No Registrasi',
			'value' => isset($data->seminar_noreg)?$data->seminar_noreg:'',
			'placeholder' => 'No. Registrasi',        
			'help' => 'Isikan dengan no. registrasi'			
		),
		array(/* INPUT */
			'id' => 'nama',		
			'label' => 'Nama',
			'value' => isset($data->seminar_nama)?$data->seminar_nama:'',
			'placeholder' => 'Nama Peserta',        
			'help' => 'Akan ditampilkan nama peserta'			
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
	
	
	
</div><!-- end of panel body -->
</div>

