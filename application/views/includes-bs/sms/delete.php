<!-- Box -->
<div class="box">
	<!-- Box Head -->
	<div class="box-head">
		<h2>Hapus data RT</h2>
	</div>
	<!-- End Box Head -->
	<?php
		echo form_open_multipart('rt/hapus');		
		
	?>
		<!-- Form -->
		<div class="form">
			<div class="msg msg-error">
			<p><strong>Data RT dengan nama "<?php echo $data->rt_nama;?>" akan dihapus, apakah anda yakin?</strong></p>
			<?php echo form_hidden('id',$id); ?>
			</div>
		</div>
		<div class="buttons">
			<input type="submit" name="action" class="button" value="Cancel" />
			<input type="submit" name="action" class="button" value="Ok" />
		
		</div>

	</form>
</div>
<!-- End Box -->