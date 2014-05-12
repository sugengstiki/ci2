<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title"> Acara </h2>
</div>
<div class="panel-body">
		
		<?php
						
						if (empty($content)) {
							echo 'Tidak ada acara';
						} else {
							
							$odd = 0;
							foreach($content as $brs) : 
							?>
						
      <h5><a href="<?php echo base_url()."acara/view/".$brs->acara_id; ?>"><?php echo $brs->acara_title; ?></a></h5>
	  <p><?php echo atur_tgl($brs->acara_tglupload); ?></p>
      <p><?php echo potong($brs->acara_body,500); ?></p>
	  <p>Daftar</p>
	  <hr />
    
						<?php endforeach;
						} ?>
</div>							
</div>