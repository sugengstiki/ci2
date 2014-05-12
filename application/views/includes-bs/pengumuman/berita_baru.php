<?php
if (!empty($berita2)) {
?>							

<h3>Berita Terbaru</h3>

<ul>
<?php
	$odd = 0;
	foreach($berita2 as $brs) : 
?>
	<li><a href="<?php echo base_url()."pengumuman/view/".$brs->pengumuman_id; ?>"><?php echo potong($brs->pengumuman_title,20); ?></a></li>							
<?php 
endforeach;
?>
</ul>
<?php 
}
?>
