<h3><?php echo $brs->acara_title; ?></h3>
<p><?php echo $brs->acara_tglupload; ?></p>
<div class="body"><?php 
		
		if (!empty($brs->acara_image)): ?>
			<figure class="boxholder imgl"><img src="<?php echo base_url();?>images/thumbs/<?php echo $brs->acara_image; ?>"></figure>			
		<?php endif; 
		echo "<p>$brs->acara_body</p>"; ?>
	  </div>
