<div class="header">Bukti Pendaftaran</div>
<div class="box">No : <?= $data->seminar_noreg; ?></div>
<p>Telah diterima dari <strong><?= $data->seminar_nama; ?></strong> <br />
<?php //print_r($semua[0]->seminar_nama);?>
uang sebesar: Rp. 50.000,-</p>

<p>Terbilang : <span class="box">Lima Puluh Ribu rupiah</span></p>
<p>Untuk pembayaran : LKMM (Latihan Ketrampilan Manajemen Mahasiswa)</p>
<div id="bcTarget">disini</div> 
<div id="qrcodeholder"> </div>
<script type="text/javascript" charset="utf-8">
var settings = {
          output:"css",
          bgColor: "#FFFFFF",
          color: "#000",
          barWidth: "2",
          barHeight: "50",
          
        };
$("#bcTarget").html("").show().barcode("<?= $data->seminar_noreg; ?>", "code128",settings); 
</script>

<script type="text/javascript">
//Wrap it within $(document).ready() to invoke the function after DOM loads.

$(document).ready(function(){

$('#qrcodeholder').qrcode({
		text	: "<?= $data->seminar_noreg; ?>",
		render	: "canvas",  // 'canvas' or 'table'. Default value is 'canvas'
		background : "#ffffff",
		foreground : "#000000",
		width : 150,
		height: 150
	});

});

</script>
