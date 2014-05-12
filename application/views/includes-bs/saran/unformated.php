<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title"> Saran & Ide </h2>
</div>
<div class="panel-body">
<?php
						
	if (empty($content)) {
		echo 'Tidak ada saran atau ide';
	} else {
		
		$odd = 0;
		foreach($content as $brs) : 
?>
      <h2><a href="<?php echo base_url()."pengumuman/view/".$brs->saran_id; ?>"><?php echo $brs->saran_title; ?></a></h2>
	  <p><?php echo atur_tgl($brs->saran_tanggal).' '.$brs->warga_nama; ?></p>
	  
      <p><?php echo potong($brs->saran_body,500); ?></p>
<?php endforeach;
	} ?>
</div>
</div>

				
				