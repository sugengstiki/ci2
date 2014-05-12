<?php
	$nrp = substr($data[0]->nrp,2,2);
	if($nrp == 22)
	{
		$skban = "No. 011/BAN-PT/Ak-XII/Dpl-III/VI/2012, tertanggal 15 Juni 2012";
	} 
	elseif($nrp == 11 OR $nrp == 17)
	{
		$skban = "No. 025/BAN-PT/Ak-XIII/S1/XI/2010, tertanggal 12 November 2010";
	}
?>
<div class="header">Bukti Pendaftaran</div>
<div class="header-add">No : . . . ./BAAK/10/STIKI.K/. . . ./ . . . .</div>
<p>Yang bertanda tangan dibawah ini :</p>
<table class="table-info">			
			<tr>
				<td width="200"> Nama </td> 
				<td> : Evy Poerbaningtyas, S.Si., MT.</td>
			</tr>
			
			<tr>
				<td> Jabatan </td>
				<td> : Pembantu Ketua I</td>
			</tr>
			
			<tr>
				<td> Pada Sekolah Tinggi </td>
				<td> : Sekolah Tinggi Informatika & Komputer Indonesia (STIKI) Malang</td>
			</tr>
					
			<tr>
				<td> Status Sekolah </td>
				<td> : Terakreditasi berdasarkan SK. BAN PT Depdiknas RI <?php echo $skban; ?></td>
			</tr>
			
			<tr>
				<td colspan="2">Dengan ini menyatakan sesungguhnya bahwa : </td>
			</tr>
							
			<tr>
				<td> Nama </td>
				<td> : <strong><?php echo $data[0]->namamhs ; ?></strong> </td>
			</tr>		
										
			<tr>
				<td> NRP </td>
				<td>  : <?php echo $data[0]->nrp ; ?> </td>
			</tr>
										
			<tr>
				<td> Tempat lahir </td>
				<td> : <?php echo $data[0]->tmplhr; ?> </td>
			</tr>
					
			<tr>
				<td> Tanggal Lahir </td>
				<td> : <?php echo $data[0]->tgllhr ; ?> </td>
			</tr>
					
			<tr>
				<td> Alamat </td>
				<td> : <?php echo $data[0]->alamat ; ?> </td>
			</tr>
					
			<tr>
				<td colspan="2">Adalah benar - benar mahasiswa Sekolah Tinggi Informatika & Komputer Indonesia (STIKI)</td>
			</tr>
					
			</table>
					<p> Demikian surat keterangan ini kami buat untuk dipergunakan sebagaimana mestinya. </p>
			<table class="table-info">
				<tr>
					<td>Malang, <?php echo $data[0]->tgl_pengajuan ; ?></td>
				</tr>
				<tr>
					<td>Pembantu Ketua I</td>
				</tr>	
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td>Evy Poerbaningtyas, S.Si., MT.</td>					
				</tr>
			</table>