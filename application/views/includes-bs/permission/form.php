<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">Hak Akses <small><?= isset($id)?" Ubah hak akses":" Tambah hak akses";?></small></h2>
</div>
<div class="panel-body">
				
<?php
	if (isset($id)){
	
		echo form_open_multipart("permission/simpan/$id");
	
	} else { //add 
		echo form_open_multipart('permission/simpan/');
	
	} //endif isset

	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		
		array(/* INPUT */
			'id' => 'tipe',		
			'label' => 'Jenis User',
			'value' => isset($data->permission_type)?$data->permission_type:'',
			'placeholder' => 'jenis user',        
			'help' => 'isikan dengan 0, warga, pengurus, admin'			
		),
		array(/* INPUT */
			'id' => 'modul',		
			'label' => 'Modul',
			'value' => isset($data->permission_module)?$data->permission_module:'',
			'placeholder' => 'Nama modul',        
			'help' => 'Isikan dengan nama modul yang dapat digunakan oleh jenis user diatas'			
		),
		
		array(
			'id' => 'function', 
			'label' => 'Fungsi ',			
			'placeholder' => 'Nama fungsi',
			'value' => isset($data->permission_function)?$data->permission_function:'',
			'help' => 'isikan nama fungsi dalam modul yang dapat digunakan'
		),
		
		array(
			'id' => 'caption', 
			'label' => 'Label ',			
			'placeholder' => 'Tulisan pada menu',
			'value' => isset($data->permission_caption)?$data->permission_caption:'',
			'help' => 'isikan Label yang dapat digunakan sebagai tulisan menu'
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