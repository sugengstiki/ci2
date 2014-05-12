<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">Acara <small><?= isset($id)?" Ubah Acara ":" Tambah Acara ";?></small></h2>
</div>
<div class="panel-body">
				
<?php
	if (isset($id)){
	
		echo form_open_multipart("acara/simpan/$id");
	
	} else { //add 
		echo form_open_multipart('acara/simpan/');
	
	} //endif isset

	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		
		array(/* INPUT */
			'id' => 'title',		
			'label' => 'Judul',
			'value' => isset($data->acara_title)?$data->acara_title:'',
			'placeholder' => 'Judul Acara ',        
			'help' => 'Isikan dengan judul Acara '			
		),
		array(/* INPUT */
			'id' => 'kategori_id',		
			'label' => 'Kategori',
			'value' => isset($data->acara_kategori_id)?$data->acara_kategori_id:'',
			'placeholder' => 'Judul Acara ',        
			'help' => 'Isikan dengan judul Acara '			
		),
		
		array(/* TEXTAREA */
			'id' => 'body', 
			'label' => 'Keterangan',
			'type' => 'textarea',
			'placeholder' => 'Keterangan Acara',
			'value' => isset($data->acara_body)?html_entity_decode($data->acara_body):'',
			'help' => 'isikan keterangan'
		),
		
		array(/* INPUT */
			'id' => 'userfile',		
			'label' => 'File Pendukung ',
			'type' => 'upload',
			'value' => isset($data->acara_image)?$data->acara_image:'',			
			'help' => 'Isikan dengan file gambar bertipe : jpg, png, atau gif'			
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