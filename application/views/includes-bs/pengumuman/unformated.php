<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title"> Pengumuman </h2>
</div>
<div class="panel-body">
		
		<?php
						
						if (empty($content)) {
							echo 'Tidak ada pengumuman';
						} else {
							
							$odd = 0;
							foreach($content as $brs) : 
							?>
						
      <h5><a href="<?php echo base_url()."pengumuman/view/".$brs->pengumuman_id; ?>"><?php echo $brs->pengumuman_title; ?></a></h5>
	  <p><?php echo atur_tgl($brs->pengumuman_tglupload); ?></p>
      <p><?php echo potong($brs->pengumuman_body,500); ?></p>
	  <hr />
    
						<?php endforeach;
						} ?>
</div>							
</div>