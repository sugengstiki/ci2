<div class="panel panel-danger">
<div class="panel-heading">
<h2 class="panel-title">Hapus Permohonan </h2>
</div>
<div class="panel-body">
	<?php
		echo form_open_multipart('surat/hapus');		
		
	?>
		<!-- Form -->
		<div class="form">
			<div class="msg msg-error">
			<p><strong>Data permohonan "<?php echo "$data->warga_nama, $data->surat_untuk";?>" akan dihapus, apakah anda yakin?</strong></p>
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