<div class="row">
  <div class="col-lg-12">
	<h1>Keuangan <small><?= isset($id)?"Ubah data Keuangan":"Tambah Data Keuangan";?></small></h1>
	<ol class="breadcrumb">
        <li><a href="<?= base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-edit"></i> Forms</li>
    </ol>	
  </div>
</div><!-- /.row -->

<?php if (!empty($message) ) : ?>
<div class="row">			
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?= $message; ?>
	</div>		
</div>
<?php endif; ?>

<div class="row">
	<div class="col-lg-7">
		
			<?php
			if (isset($id)){

				echo form_open_multipart("keuangan/simpan/$id",array('role' => 'form'));

			} else { //add 
				echo form_open_multipart('keuangan/simpan/',array('role' => 'form'));

			} //endif isset


echo $this->form_builder->build_form_horizontal(
array(
    
    array(/* INPUT */
        'id' => 'tanggal',		
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

</form>
</div><!-- /.row -->
				