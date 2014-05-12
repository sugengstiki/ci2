<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">Seminar <small><?= isset($id)?"Perubahan data peserta":"Pendaftaran peserta";?></small></h2>
</div>
<div class="panel-body">					
<?php
	if (isset($id)){
	
		echo form_open_multipart("seminar/simpan/$id");
	
	} else { //add 
		echo form_open_multipart('seminar/simpan/');
	
	} //endif isset
	define("chars", 160);
	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		array(/* INPUT */
			'id' => 'id',
			'label' => 'Kode Acara',
			'value' => isset($data->seminar_id)?$data->seminar_id:'',
			'placeholder' => 'Kode Acara',        
			'help' => 'Diisi dengan Kode Acara yang akan diikuti'
		),
		array(/* INPUT */
			'id' => 'nrp',
			'label' => 'NRP',
			'value' => isset($data->seminar_nrp)?$data->seminar_nrp:'',
			'placeholder' => 'NRP',        
			'help' => 'Diisi dengan NRP peserta'			
		),		
		array(/* INPUT */
			'id' => 'nama',
			'label' => 'Nama',
			'value' => isset($data->seminar_nama)?$data->seminar_nama:'',
			'placeholder' => 'Nama Mahasiswa',        
			'help' => 'Nama mahasiswa'			
		),
		
		array(/* Option button */
			'id' => 'status',
			'label' => 'Status Bayar',
			'type' => 'radiogroup',
			'options' => array(
				'1' => 'Sudah',
				'2' => 'Belum'
			),
			'value' => isset($data->seminar_status)?$data->seminar_status:'1',
			'help' => 'Pilih salah satu, sesuai status pembayaran',
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
</div>    
</div><!-- end of panel body -->
