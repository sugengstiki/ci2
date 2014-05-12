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
						<?php
						
						if (empty($content)) {
							echo 'Tidak ada pengumuman';
						} else {
							
							$odd = 0;
							foreach($content as $brs) : 
							?>
						<section class="clear">
      <h2><a href="<?php echo base_url()."pengumuman/view/".$brs->pengumuman_id; ?>"><?php echo $brs->pengumuman_title; ?></a></h2>
	  <p><?php echo $brs->pengumuman_tglupload; ?></p>
      <p><?php echo potong($brs->pengumuman_body,500); ?></p>
    </section>
						<?php endforeach;
						} ?>
						</div>
					
					
				</div>
				<!-- End Box -->
				
				