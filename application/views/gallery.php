<div id="gallery">
	<?php 
if(isset($images) && count($images)) {
	foreach($images as $image) {
		?>
		<div class="thumbs">
			<a href=     "<?php echo $image['url']; ?>">
				<img src="<?php echo $image['thumbs_url']; ?>">
			</a>				
		</div>						
		<?php
	} 
}else { 
		echo "<div id='blank_gallery'>Please Upload an images</div>";
} ?>
</div>
<?php
	//buka file autoload.php
	//$autoload['helper'] = array('url','form','file');
	
	echo form_open_multipart('site');
	echo form_upload('namafile');
	echo form_submit('upload','Kirim');
	echo form_close();
?>
