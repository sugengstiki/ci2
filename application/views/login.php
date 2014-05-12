<html>
	<head>
	</head>	
	<body>
	<div>
		<?php		
			echo "<h1>Login</h1>";
			echo form_open('login/validasi'); 
	// <form method="post" action="site/create">
	
			echo '<div>'.form_label('Username :','username');
			echo form_input('username1').'</div>';
			
			echo '<div>'.form_label('Password :','password');
			echo form_password('password1').'</div>';
			
			echo '<div>'.form_submit('btnSimpan', 'Save');
			echo form_reset('btnReset', 'Clear').'</div>';
			echo form_close();
		?>
		
	</div>
	</body>
	</html>