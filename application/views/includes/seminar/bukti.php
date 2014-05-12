<div class="header">Bukti Pendaftaran</div>
<div class="box">No : <?= $data->seminar_noreg; ?></div>
<p>Telah diterima dari <strong><?= $data->seminar_nama; ?></strong> <br />
<?php print_r($semua[0]->seminar_nama);?>
uang sebesar: Rp. 10.000,-</p>

<p>Terbilah : <span class="box">Sepuluh Ribu rupiah</span></p>
<p>Untuk pembayaran : Knowledge Sharing</p>
<div id="bcTarget">disini</div> 
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