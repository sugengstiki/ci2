<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">Saran &amp; Ide <small><?= isset($id)?" Ubah Data Saran &amp; Ide":" Tambah Data Saran &amp; Ide";?></small></h2>
</div>
<div class="panel-body">
<?php
	if (isset($id)){
	
		echo form_open_multipart("saran/simpan/$id");
	
	} else { //add 
		echo form_open_multipart('saran/simpan/');
	
	} //endif isset
		
		echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		
		array(/* INPUT */
			'id' => 'title',
			'label' => 'Tentang',
			'value' => isset($data->saran_title)?$data->saran_title:'',
			'placeholder' => 'Judul saran atau ide',        
			'help' => 'Silahkan diisi dengan judul'			
		),
		array(/* INPUT */
			'id' => 'kategori',					
			'value' => isset($data->saran_kategori_id)?$data->saran_kategori_id:'',
			'placeholder' => 'kategori',        
			'help' => 'Isikan dengan kategori'			
		),
		array(/* TEXTAREA */
			'id' => 'desc', 
			'label' => 'Saran atau ide',
			'type' => 'textarea',			
			'value' => isset($data->saran_body)?html_entity_decode($data->saran_body):'',
			'help' => 'isikan saran atau ide anda'
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
