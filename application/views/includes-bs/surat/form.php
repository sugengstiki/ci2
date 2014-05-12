<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">Permohonan Surat Keterangan <small><?= isset($id)?"Perubahan permohonan Surat Keterangan":"Permohonan baru";?></small></h2>
</div>
<div class="panel-body">					
<?php
	if (isset($id)){
	
		echo form_open_multipart("surat/simpan/$id");
	
	} else { //add 
		echo form_open_multipart('surat/simpan/');
	
	} //endif isset
	define("chars", 160);
	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		
		array(/* INPUT */
			'id' => 'nomer',
			'label' => 'Nomer Surat',
			'value' => isset($data->surat_nomer)?$data->surat_nomer:'',
			'placeholder' => 'Nomer surat',        
			'help' => 'format: no/RT 3 RW 12/bulan/tahun'			
		),
		array(/* INPUT */
			'id' => 'noktp',
			'label' => 'Nomer KTP',
			'value' => isset($data->warga_noktp)?$data->warga_noktp:'',
			'placeholder' => 'Nomer ktp',        
			'help' => 'diisi sesuai ktp'			
		),
		array(/* INPUT */
			'id' => 'nama',
			'label' => 'Nama',
			'value' => isset($data->warga_nama)?$data->warga_nama:'',
			'placeholder' => 'Nama',        
			'help' => 'Nama sesuai ktp'			
		),
		array(/* INPUT */
			'id' => 'ttl',
			'label' => 'Tanggal lahir',
			'value' => isset($data->warga_ttl)?$data->warga_ttl:'',
			'placeholder' => 'Tempat, tanggal lahir',        
			'help' => 'Isikan Tempat dan tanggal lahir sesuai ktp'			
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
		array(/* INPUT */
			'id' => 'pekerjaan',
			'label' => 'Pekerjaan',
			'value' => isset($data->warga_pekerjaan)?$data->warga_pekerjaan:'',
			'placeholder' => 'Pekerjaan',        
			'help' => 'diisi sesuai ktp'			
		),
		array(/* INPUT */
			'id' => 'agama',			
			'value' => isset($data->warga_agama)?$data->warga_agama:'',
			'placeholder' => 'Agama',        
			'help' => 'diisi sesuai ktp'			
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
		array(/* INPUT */
			'id' => 'pendidikan',
			'label' => 'Pendidikan Tertinggi',
			'value' => isset($data->warga_pendidikan)?$data->warga_pendidikan:'',
			'placeholder' => 'Pendidikan tertinggi',        
			'help' => 'Sesuai ktp'			
		),

		array(/* TEXTAREA */
			'id' => 'desc', 
			'label' => 'Peruntukan',
			'placeholder' => 'Isikan dengan keterangan peruntukan surat',
			'value' => isset($data->surat_untuk)?html_entity_decode($data->surat_untuk):'',
			'help' => 'isikan dengan peruntukan surat'
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
