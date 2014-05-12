<h2>Gallery</h2>
<hr class="soften"/>
<div class="row">
<?php 
if(isset($images) && count($images)) {
	foreach($images as $image) {
		?>
  <div class="col-xs-6 col-md-3">
    <a href="<?php echo $image['url']; ?>" class="thumbnail">
      <img src="<?php echo $image['thumb_url']; ?>" alt="">
    </a>
  </div>
  <?php
	} 
}else { 
		echo "<div id='blank_gallery'>Please Upload an images</div>";
} ?>
  
</div>

<?php
echo form_open_multipart('site/gallery');
?>
<div class="form">
								<p>
									<span class="req">jpg or gif or png</span>
									<label>Nama File <span>(Required Field)</span></label>
									<?php 										
										$data = array(
													'name'        => 'userfile',
													'class'       => 'field size1');
										echo form_upload($data);
									?>
									
									
								</p>
									
							<div class="buttons">
							<?php
							$data = array(
								'name'        => 'upload',
								'value'		=> 'Kirim',
								'class'          => 'button',              
								);
							echo form_submit($data);
							?>
							
						</div>
						</div>
<?php
	//buka file autoload.php
	//$autoload['helper'] = array('url','form','file');
	
	
	
	
	echo form_close();
?>

				
				