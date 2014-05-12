<?php
						if (!empty($berita2)) {
?>							
<!-- Box -->
				<div class="box">
					
					<!-- Box Head -->
					<div class="box-head">
						<h2>Berita Terbaru</h2>
					</div>
					<!-- End Box Head-->
					
					<div class="box-content">
						<!-- Sort -->
						<ul>
						<?php
							$odd = 0;
							foreach($berita2 as $brs) : 
						?>
							<li><a href="<?php echo base_url()."pengumuman/view/".$brs->pengumuman_id; ?>"><?php echo potong($brs->pengumuman_title,20); ?></a></li>							
						<?php endforeach;
						} ?>
						</ul>
						<!-- End Sort -->
						
					</div>
				</div>
				<!-- End Box -->