<html>
	<head>
	</head>	
	<body>
	<div>
		<?php		
			echo "<h1>Edit User</h1>";
			echo form_open('site/simpanedit'); 
	// <form method="post" action="site/create">
	 
			echo '<div>'.form_label('id_user :','id_user');		
			echo $id_user.'</div>';
//	 <input type="text"  name="id_user" value=1>		
			//$data = $this->user_model->get($id);
			echo '<div>'.form_label('Username :','username');
			echo $username.'</div>';
			
			echo '<div>'.form_label('Password :','password');
			echo $password.'</div>';
			
			echo '<div>'.form_submit('btnSimpan', 'Save');
			echo form_reset('btnReset', 'Clear').'</div>';
			echo form_close();
		?>
		
	</div>
</body>
</html>