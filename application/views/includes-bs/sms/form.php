<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">SMS <small><?= isset($id)?" Resend SMS ":" Send SMS";?></small></h2>
</div>
<div class="panel-body">

<?php
	if (isset($id)){
	
		echo form_open_multipart("sms/simpan/$id");
	
	} else { //add 
		echo form_open_multipart('sms/simpan/');
	
	} //endif isset
	//define("chars", 160);
	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		
		array(/* INPUT */
			'id' => 'title',					
			'value' => isset($data->sms_title)?$data->sms_title:'',
			'placeholder' => 'Judul',        
			'help' => 'Silahkan diisi dengan judul dari SMS'			
		),
		array(/* INPUT */
			'id' => 'sendto',		
			'label' => 'Send To',
			'value' => isset($data->sms_sendto)?$data->sms_sendto:'',
			'placeholder' => 'Destination',        
			'help' => 'Isikan dengan nomer HP, dipisahkan dengan koma'			
		),
		array(/* INPUT */
			'id' => 'filename',		
			'value' => isset($data->sms_filename)?$data->sms_filename:'',
			'type' => 'hidden',			
		),
		array(/* INPUT */
			'id' => 'userfile',		
			'label' => 'Recipient File',			
			'type' => 'upload',
			'help' => 'Max 2 MB - Excel 2003 or Below (.xls)',
		),
		array(/* INPUT */
			'id' => 'message',					
			'type' => 'textarea',
			'rows' => '3',
			'cols' => '60',
			'maxlength' => 160,
			'value' => isset($data->sms_message)?$data->sms_message:'',
			'help' => 'Max 160 Character',
		),
		
		
		array(
			'id' => 'mode',		
			'label' => isset($id)?"Koreksi":"Simpan",
			'type' => 'submit'
		)
	));
				
		?>
	<span id="char_count" class="req">max 100 character</span>
</form>
</div> 
</div><!-- end of panel body -->
</div>
