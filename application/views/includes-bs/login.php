<div class="panel panel-primary">
<div class="panel-heading">
<h2 class="panel-title">Login</h2>
</div>
<div class="panel-body">
<?php 
	echo form_open('login/validasi');					
	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		array(/* INPUT */
			'id' => 'username1',
			'label' => 'Username',
			'placeholder' => 'Username',        
			'help' => 'Masukkan Username'			
		),
		array(/* INPUT */
			'id' => 'password1',
			'label' => 'Password',
			'type' => 'password',			
			'help' => 'Masukkan Password'			
		),
		array(
			'id' => 'mode',		
			'label' => 'Login',
			'type' => 'submit'
		)
	));
	
?>
</div>
</form>
</div>
</div>
