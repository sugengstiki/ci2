<div class="panel panel-danger">
<div class="panel-heading">
<h2 class="panel-title">Hapus Hak Akses </h2>
</div>
<div class="panel-body">
<?php
		echo form_open_multipart('permission/hapus');		
		
?>
<div class="form">
			<div class="msg msg-error">
			<p><strong>Data permission "<?php echo "$data->permission_type, $data->permission_module, $data->permission_function";?>" akan dihapus, apakah anda yakin?</strong></p>
			<?php echo form_hidden('id',$id); ?>
			</div>
		</div>
		<div class="buttons">
			<input type="submit" name="action" class="button" value="Cancel" />
			<input type="submit" name="action" class="button" value="Ok" />
		
		</div>

	</form>
</div>

   
</div><!-- end of panel body -->
</div>