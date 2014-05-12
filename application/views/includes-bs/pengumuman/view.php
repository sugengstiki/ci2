<h3><?php echo $brs->pengumuman_title; ?></h3>
<p><?php echo $brs->pengumuman_tglupload; ?></p>
<div class="body"><?php 
		
		if (!empty($brs->pengumuman_image)): ?>
			<figure class="boxholder imgl"><img src="<?php echo base_url();?>images/thumbs/<?php echo $brs->pengumuman_image; ?>"></figure>			
		<?php endif; 
		echo "<p>$brs->pengumuman_body</p>"; ?>
	  </div>
