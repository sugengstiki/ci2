<div class="panel panel-danger">
<div class="panel-heading">
<h2 class="panel-title">Hapus Saran &amp; Ide </h2>
</div>
<div class="panel-body">
	<?php
		echo form_open_multipart('saran/hapus');		
		
	?>
		<!-- Form -->
		<div class="form">
			<div class="msg msg-error">
			<p><strong>Data saran judul "<?php echo $data->saran_title;?>" akan dihapus, apakah anda yakin?</strong></p>
			<?php echo form_hidden('id',$id); ?>
			</div>
		</div>
		<div class="buttons">
			<input type="submit" name="action" class="button" value="Cancel" />
			<input type="submit" name="action" class="button" value="Ok" />
		
		</div>

	</form>
</div>
</div>
<!-- End Box -->