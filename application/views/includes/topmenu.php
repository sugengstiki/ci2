	<div id="top-navigation">
		Welcome <a href="#"><strong><?php echo $this->session->userdata('u'); ?></strong></a>
		<span>|</span>
		<a href="#">Help</a>
		<span>|</span>
		<?php 
if ($this->session->userdata('u')) :
		?>
		<a href="<?=base_url();?>rt/edit/<?php echo $this->session->userdata('rt_id'); ?>">Profile Settings</a>
		<?php 
		endif;
	?>
		<span>|</span>
		<?php
			$login = $this->session->userdata('role_id')?"logout":"login";
			/* if ()) {
				echo '<a href="'. base_url() . 'site/logout">'Logout</a>
			} else {
				echo '<a href="'. base_url() . 'site/login">'Login</a>
			} */
		?>
		<a href="<?php echo base_url(); ?>site/<?php echo $login; ?>"><?php echo ucfirst($login); ?></a>
	</div>
