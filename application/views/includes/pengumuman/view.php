<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Pengumuman</h2>
						<div class="right">
							<label>Cari Pengumuman</label>
							<input type="text" class="field small-field" id="input_keyword"/>
							<input type="submit" class="button" value="search" />
						</div>
					</div>
					<!-- End Box Head -->	

					<div class="node">
						
						<section class="clear">
      <h2><?php echo $brs->pengumuman_title; ?></h2>
	  <p><?php echo $brs->pengumuman_tglupload; ?></p>
      <div class="body"><?php 
		
		if (!empty($brs->pengumuman_image)): ?>
			<figure class="boxholder imgl"><img src="<?php echo base_url();?>images/thumbs/<?php echo $brs->pengumuman_image; ?>"></figure>			
		<?php endif; 
		echo "<p>$brs->pengumuman_body</p>"; ?>
	  </div>
    </section>
						
						</div>
					
					
				</div>
				<!-- End Box -->
				
				