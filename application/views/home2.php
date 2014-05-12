<html>
	<head>
	</head>	
	<body>
	<div>
		
		<?php		
			echo anchor('site/logout','keluar/logout');
			echo "<h1>Create User</h1>";
			echo form_open('site/create'); 
	// <form method="post" action="site/create">
	 
			echo '<div>'.form_label('id_user :','id_user');		
			echo form_input('id_user').'</div>';
	 //<input type="text"  name="id_user">		
	 
			echo '<div>'.form_label('Username :','username');
			echo form_input('username').'</div>';
			
			echo '<div>'.form_label('Password :','password');
			echo form_password('password').'</div>';
			
			echo '<div>'.form_submit('btnSimpan', 'Save');
			echo form_reset('btnReset', 'Clear').'</div>';
			echo form_close();
		?>
		
	</div>
	
		<p>Ini halaman web pertama</p>
		<p>Umur saudara adalah <?php echo $umur;?></p>
		<h2>Data User</h2>
		<?php //echo $user_table;	?>
		<?php 		
		echo $this->pagination->create_links();
		foreach($user as $brs) : ?>
			<div> 
<h1><?php echo anchor("site/edit/".$brs->id_user,$brs->id_user); ?>
</h1>
			<div><?php echo $brs->username; ?></div>
			<div><?php echo $brs->password; ?></div>
			<div><?php echo anchor("site/view/".$brs->id_user,"view");  ?></div>
			
			</div>
		<?php endforeach; 
		
		echo $this->pagination->create_links();
		?>
	</body>
</html>	