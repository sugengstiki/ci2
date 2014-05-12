<html>
<head>
<title>Input Data Karyawan</title>
<?php 
		$development_bundle = base_url().'assets/jquery_ui/development-bundle/';
?>
	<link rel="stylesheet" href="<?php echo $development_bundle; ?>themes/base/jquery.ui.all.css">
	<script src="<?php echo $development_bundle; ?>jquery-1.8.2.js"></script>
	<script src="<?php echo $development_bundle; ?>ui/jquery.ui.core.js"></script>
	<script src="<?php echo $development_bundle; ?>ui/jquery.ui.widget.js"></script> 
	<script src="<?php echo $development_bundle; ?>ui/jquery.ui.datepicker.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		$("#tanggal_lahir").datepicker({changeMonth: true,
			changeYear: true});
	    $("#Orientasi").datepicker({changeMonth: true,
			changeYear: true});
		$("#Berlaku1").datepicker({changeMonth: true,
			changeYear: true});
		$("#Berlaku2").datepicker({changeMonth: true,
			changeYear: true});
	});
	</script>

<style type="text/css">
<!--
.style1 {
	color: #3366FF;
	font-weight: bold;
	font-size: 24px;
}
body {
	background-color: #CCFF99;
}
body,td,th {
	color: #0000FF;
}
.style12 {color: #FF0000}
.style13 {color: #0000FF}
.style14 {
	color: #3366FF;
	font-weight: bold;
	font-size: 16px;
}

-->
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="right"><?php echo "Tanggal : ".date('d-m-Y');echo "<br>Jam : ".date('G:i:s');?></div>
<div align="center"><?php echo form_open('fkary/insert_data_kary'); ?><span class="style1"> DATA  KARYAWAN</span>

<table align="center" bgcolor="#99FF33">
	<tr>
		<td width="162"><span class="style13">KODE KARYAWAN</span></td>
		<td width="282"><input type="text" name="IDKary" value="<?php echo set_value('Kode Karyawan'); ?>" size="12" /></td>
		<td colspan="2"><span class="style12"><?php echo form_error('Kode Karyawan','<div style="color:red">','</div>'); ?></span></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><span class="style13">NAMA LENGKAP</span></td>
		<td colspan="3"><input type="text" name="NmLgkp" cols="80" value="<?php echo set_value('Nama Lengkap'); ?>"size="80"/></td>
		<td><?php echo form_error('Nama Lengkap','<div style="color:green">','</div>'); ?></td>
	</tr>
	<tr>
		<td><span class="style13">NAMA PANGGILAN</span></td>
		<td><input type="text" name="Panggil" value="<?php echo set_value('Nama Panggilan'); ?>" size="40" /></td>
		<td width="144">JENIS KELAMIN </td>
		<td width="193"><form name="JK" method="post" action="">
			<label></label>
			<label>
			 <input name="radiobutton" type="radio" value="radiobutton" checked>
			 Wanita</label>
			 <input name="radiobutton" type="radio" value="radiobutton">
			 Pria
			</form>
	  </td>
		<td><?php echo form_error('Nama Panggilan','<div style="color:green">','</div>'); ?></td>
	</tr>
	<tr>
		<td><span class="style13">TEMPAT LAHIR</span></td>
		<td><input type="text" name="tempat_lhr" size="30" /></td>
		<td>TANGGAL LAHIR </td>
		<td><select name="tgl" id="tgl"  onChange="bagofholding" autocomplete="on">
			<?php for ($tgl=1; $tgl < 32; $tgl++){?>
				<option value = "<?php echo (+$tgl);?>">
				<?php echo (+$tgl);?></option>
				<?php } ?>	
			</select>
			<select class="" id="bln" name="bln" onChange="bagofholding" autocomplete="on">
				<option value="1" selected>Januari</option>
				<option value="2">Februari</option>
				<option value="3">Maret</option>
				<option value="4">April</option>
				<option value="5">Mei</option>
				<option value="6">Juni</option>
				<option value="7">Juli</option>
				<option value="8">Agustus</option>
				<option value="9">September</option>
				<option value="10">Oktober</option>
				<option value="11">November</option>
				<option value="12">Desember</option>
			</select>
			<select name="thn" id="thn" onChange="bagofholding" autocomplete="off">
				<?php for ($thn=1; $thn < 100; $thn++){?>
				<option value = "<?php echo (1940+$thn);?>">
				<?php echo (1940+$thn);?></option>
				<?php } ?>
			</select>
				
		</td>
		<td width="201">&nbsp;</td>
	</tr>
	<tr>
		<td><span class="style13">NOMOR KTP / SIM</span></td>
		<td><input type="text" name="NoKTP" value="<?php echo set_value('Nomor KTP/SIM'); ?>" size="47" /></td>
		<td>UMUR</td>
		<td><input type="text" name="Umur" size="30" /></td>
		<td><?php echo form_error('Nomor KTP/SIM','<div style="color:green">','</div>'); ?></td>
	</tr>
	<tr>
		<td><span class="style13">ALAMAT KTP</span></td>
		<td colspan="3"><textarea name="AlmKTP" cols="90"><?php echo set_value('Alamat KTP/SIM'); ?></textarea></td>
		<td><?php echo form_error('Alamat KTP/SIM','<div style="color:green">','</div>'); ?></td>
	</tr>
	<tr>
  	    <td><span class="style13">ALAMAT TINGGAL</span></td>
	    <td colspan="3"><textarea name="AlmTgl" cols="90"><?php echo set_value('Alamat Tinggal'); ?></textarea></td>
	    <td><?php echo form_error('Alamat Tinggal','<div style="color:green">','</div>'); ?></td>
	</tr>
	<tr>
		<td>TANGGAL ORIENTASI </td>
		<td><input name="Text" type="Text" id="Orientasi" size="25" maxlength="25">
		  <a href="javascript:NewCssCal('demo31','ddmmyyyy','arrow')"><img src="<?php echo base_url().'datepicker/images/cal.gif';?>"           width="16" height="16" alt="Pick a date"></a></td>
		<td>TELP.</td>
		<td><textarea name="AlmTgl" cols="24"><?php echo set_value('Telp'); ?></textarea></td>
		<td><?php echo form_error('Telp','<div style="color:green">','</div>'); ?></td>
	</tr>
	<tr>
		<td>NO. SIPB / SIB </td>
		<td><input type="text" name="NoSIPB" size="30" /></td>
		<td>BERLAKU S/D </td>
		<td><input name="Text3" type="Text" id="Berlaku1" size="25" maxlength="25"></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>NO. SIPP / SIPB </td>
		<td><input type="text" name="NoSIPP" size="30" /></td>
		<td>BERLAKU S/D </td>
		<td><input name="Text4" type="Text" id="Berlaku2" size="25" maxlength="25"></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td>SERTIFIKAT 1 </td>
		<td><input type="text" name="Ser1" size="30" /></td>
		<td>JENIS SERTIFIKAT </td>
		<td><input name="JSer1" type="Text" id="Text" size="25" maxlength="25"></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td>SERTIFIKAT 2 </td>
		<td><input type="text" name="Ser2" size="30" /></td>
		<td>JENIS SERTIFIKAT </td>
		<td><input name="JSer2" type="Text" id="Text" size="25" maxlength="25"></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td>SERTIFIKAT 3 </td>
		<td><input type="text" name="Ser3" size="30" /></td>
		<td>JENIS SERTIFIKAT </td>
		<td><input name="JSer3" type="Text" id="Text" size="25" maxlength="25"></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td>KETERANGAN LAIN </td>
		<td colspan="3"><textarea name="KetKary" cols="80" rows="3"><?php echo set_value('Nama Lengkap'); ?></textarea></td>
		<td><?php echo form_error('Nama Lengkap','<div style="color:green">','</div>'); ?></td>
	</tr>
	<tr>
		<td colspan="5">&nbsp;</td>
	</tr>
</table>
<?php // seharusnya form_close ditulis diakhir form (setelah tombol submit) 
	//echo form_close(); ?>
<table width="1110" border="0" align="center">
	<tr>
		<td width="89"><input name="DataBaruKary" type="submit" class="style14" id="DataBaruKary" value="Tambah Data" /></td>
		<td width="91"><input name="SimpanKary" type="submit" class="style14" id="SimpanKary" value=" Simpan " /></td>
		<td width="81"><input name="EditKary" type="submit" class="style14" id="EditKary" value="    Edit    " /></td>
		<td width="120"><input name="HapusKary" type="submit" class="style14" id="HapusKary" value=" Hapus " /></td>
		<td width="503"><input name="BatalKary" type="reset" class="style14" id="BatalKary" value=" Batal " /></td>
		<td width="76"><div align="right"><input name="Exit" type="submit" class="style14" id="Exit" value="Keluar" />
		</div></td>
	</tr>
</table>
<?php echo form_close(); ?>
</div>
 
<h5>&nbsp;</h5>
</form>
</body>
</html>
