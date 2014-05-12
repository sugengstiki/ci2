<ul>
	
	<li><a href="<?php echo base_url(); ?>pengumuman/" class="<?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'pengumuman'? 'active':''); ?>"><span>Pengumuman</span></a></li>
	<?php /* <li><a href="<?php echo base_url(); ?>index.php/berita" class="<?php echo ($this->uri->segment(1) == 'berita' ? 'active':''); ?>"><span>Berita</span></a></li> */ ?>
	<li><a href="<?php echo base_url(); ?>surat" class="<?php echo $this->uri->segment(1) == 'surat' ? 'active':''; ?>"><span>Permohonan Surat</span></a></li>
	<li><a href="<?php echo base_url(); ?>saran" class="<?php echo $this->uri->segment(1) == 'saran' ? 'active':''; ?>"><span>Saran &amp; Ide</span></a></li>
	<li><a href="<?php echo base_url(); ?>gallery" class="<?php echo $this->uri->segment(1) == 'gallery' ? 'active':''; ?>"><span>Galeri Foto</span></a></li>
	<li><a href="<?php echo base_url(); ?>warga" class="<?php echo $this->uri->segment(1) == 'warga' ? 'active':''; ?>"><span>Daftar Warga</span></a></li>
	<li><a href="<?php echo base_url(); ?>sms" class="<?php echo $this->uri->segment(1) == 'sms' ? 'active':''; ?>"><span>SMS Services</span></a></li>
</ul>