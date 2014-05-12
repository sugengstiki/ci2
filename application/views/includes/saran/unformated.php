<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Saran & Ide</h2>
						<div class="right">
							<!--<label>Cari Saran</label>
							<input type="text" class="field small-field" id="input_keyword"/>
							<input type="submit" class="button" value="search" /> -->
						</div>
					</div>
					<!-- End Box Head -->	

					<div class="node">
						<?php
						
						if (empty($content)) {
							echo 'Tidak ada saran atau ide';
						} else {
							
							$odd = 0;
							foreach($content as $brs) : 
							?>
						<section class="clear">
      <h2><a href="<?php echo base_url()."pengumuman/view/".$brs->saran_id; ?>"><?php echo $brs->saran_title; ?></a></h2>
	  <p><?php echo atur_tgl($brs->saran_tanggal).' '.$brs->warga_nama; ?></p>
	  
      <p><?php echo potong($brs->saran_body,500); ?></p>
    </section>
						<?php endforeach;
						} ?>
						</div>
					
					
				</div>
				<!-- End Box -->
				
				