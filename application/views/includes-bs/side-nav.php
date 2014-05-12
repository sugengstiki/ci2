<ul class="nav navbar-nav side-nav">
            <li class="<?php echo ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'pengumuman'? 'active':''); ?>"><a href="index.html"><i class="fa fa-dashboard"></i> Profil RT</a></li>
			<li class="<?= $this->uri->segment(1) == 'pengumuman' ? 'active':''; ?>"><a href="charts.html"><i class="fa fa-desktop"></i> Pengumuman</a></li>
            <li class="<?= $this->uri->segment(1) == 'permohonan' ? 'active':''; ?>"><a href="charts.html"><i class="fa fa-file"></i> Permohonan SK</a></li>
            <li class="<?= $this->uri->segment(1) == 'saran' ? 'active':''; ?>"><a href="tables.html"><i class="fa fa-comment"></i> Saran</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Warga <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class"fa fa-user"><a href="#">Pendaftaran</a></li>
                <li><a href="#">Daftar Warga</a></li>                
              </ul>
            </li>
            <li class="<?= $this->uri->segment(1) == 'keuangan' ? 'active':''; ?>"><a href="typography.html"><i class="fa fa-money"></i> Keuangan</a></li>
            <li class="<?= $this->uri->segment(1) == 'sms' ? 'active':''; ?>"><a href="bootstrap-elements.html"><i class="fa fa-envelope"></i> SMS</a></li>
            
          </ul>