<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Gallery</h2>
						
					</div>
					<!-- End Box Head -->	

					<!-- Table -->
					<div id="upload" class="table">
					
<div id="gallery">
	<?php 
if(isset($images) && count($images)) {
	foreach($images as $image) {
		?>
		<div class="thumb">
			<a href=     "<?php echo $image['url']; ?>">
				<img src="<?php echo $image['thumb_url']; ?>">
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
						
						
					
					</div>
					<!-- Table -->
					
				</div>
				<!-- End Box -->
				
				