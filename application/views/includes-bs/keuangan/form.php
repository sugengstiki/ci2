<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Keuangan <small><?= isset($id)?"Ubah data Keuangan":"Tambah Data Keuangan";?></small></h2>
</div>
<div class="panel-body">
<?php
	if (isset($id)){

		echo form_open_multipart("keuangan/simpan/$id",array('role' => 'form','autocomplete'=>'off'));

	} else { //add 
		echo form_open_multipart('keuangan/simpan/',array('role' => 'form','autocomplete'=>'off'));

	} //endif isset

	echo '<div class="col-md-8">';
	echo $this->form_builder->build_form_horizontal(
	array(
		
		array(/* INPUT */
			'id' => 'tgl',		
			'label' => 'Tanggal',
			'value' => isset($data->keuangan_tgl)?$data->keuangan_tgl:'',
			'placeholder' => 'Tanggal transaksi',        
			'help' => 'Isikan dengan tanggal transaksi'			
		),
		array(/* DROP DOWN */
			'id' => 'debit_kredit',
			'type' => 'radiogroup',
			'options' => array(
				'1' => 'Debit',
				'2' => 'Kredit'
			),
			'value' => isset($data->keuangan_debit_kredit)?$data->keuangan_debit_kredit:'1',
			'help' => 'Pilih salah satu',
		),
		array(/* INPUT */
			'id' => 'jml',
			'value' => isset($data->keuangan_jml)?$data->keuangan_jml:'',
			'label' => 'Jumlah',
			'placeholder' => 'Jumlah Uang',        
			'input_addons' => array(
				'pre' => 'Rp.',
				'post' => ',00'
			),
			'help' => 'Isikan dengan jumlah uang transaksi'
		),
		array(/* TEXTAREA */
			'id' => 'desc', 
			'label' => 'Keterangan',
			'placeholder' => 'Keterangan transaksi',
			'value' => isset($data->keuangan_desc)?html_entity_decode($data->keuangan_desc):'',
			'help' => 'isikan keterangan'
		),
		
		array(
			'id' => 'mode',		
			'label' => isset($id)?"Koreksi":"Simpan",
			'type' => 'submit'
		)
	));
				
		?>
	</div>
</form>
    
</div><!-- end of panel body -->
</div>