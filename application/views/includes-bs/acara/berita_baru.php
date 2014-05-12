<?php
if (!empty($berita2)) {
?>							

<h3>Daftar Acara </h3>

<ul>
<?php
	$odd = 0;
	foreach($berita2 as $brs) : 
?>
	<li><a href="<?php echo base_url()."acara/view/".$brs->acara_id; ?>"><?php echo potong($brs->acara_title,20); ?></a></li>							
<?php 
endforeach;
?>
</ul>
<?php 
}
?>
