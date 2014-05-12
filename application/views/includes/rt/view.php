<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Data RT</h2>
						
					</div>
					<!-- End Box Head -->	

					<div class="node">
						
						<section class="clear">
	<?php
if (!empty($brs)) :
	?>
      <h2>Nama RT : <?php echo $brs->rt_nama; ?></h2>
	  <p><?php echo $brs->rt_desc; ?></p>
      <div class="body"> 		
		<?php  
		echo "<p>RT / RW : $brs->rt_rt / $brs->rt_rw</p>"; 
		echo "<p>Kecamatan : $brs->rt_kecamatan</p>";
		echo "<p>Kelurahan : $brs->rt_kelurahan</p>";
		echo "<p>Kecamatan : $brs->rt_kecamatan</p>";
		echo "<p>Kota : $brs->rt_kota</p>";
		echo "<p>Propinsi : $brs->rt_propinsi</p>";
		echo "<p>Email : $brs->rt_email</p>";
		echo "<p>Telp : $brs->rt_telp</p>";
		?>
	  </div>
	  <?php
else : echo "data tidak ada";
	  endif;
	  ?>
    </section>
						
						</div>
					
					
				</div>
				<!-- End Box -->
				
				