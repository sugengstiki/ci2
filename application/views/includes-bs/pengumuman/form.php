<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">Pengumuman <small><?= isset($id)?" Ubah pengumuman":" Tambah pengumuman";?></small></h2>
</div>
<div class="panel-body">
				
<?php
	if (isset($id)){
	
		echo form_open_multipart("pengumuman/simpan/$id");
	
	} else { //add 
		echo form_open_multipart('pengumuman/simpan/');
	
	} //endif isset

	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		
		array(/* INPUT */
			'id' => 'title',		
			'label' => 'Judul',
			'value' => isset($data->pengumuman_title)?$data->pengumuman_title:'',
			'placeholder' => 'Judul Pengumuman',        
			'help' => 'Isikan dengan judul pengumuman'			
		),
		array(/* INPUT */
			'id' => 'kategori_id',		
			'label' => 'Kategori',
			'value' => isset($data->pengumuman_kategori_id)?$data->pengumuman_kategori_id:'',
			'placeholder' => 'Judul Pengumuman',        
			'help' => 'Isikan dengan judul pengumuman'			
		),
		
		array(/* TEXTAREA */
			'id' => 'body', 
			'label' => 'Keterangan',
			'type' => 'textarea',
			'placeholder' => 'Keterangan transaksi',
			'value' => isset($data->pengumuman_body)?html_entity_decode($data->pengumuman_body):'',
			'help' => 'isikan keterangan'
		),
		
		array(/* INPUT */
			'id' => 'userfile',		
			'label' => 'File Pendukung ',
			'type' => 'upload',
			'value' => isset($data->pengumuman_image)?$data->pengumuman_image:'',			
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

