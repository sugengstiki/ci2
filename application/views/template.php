<?php
if (isset($dataTablesource)):
		
			add_script('$(\'#example\').dataTable( {
					"bProcessing": true,
					"bServerSide": true,
					"sPaginationType": "full_numbers",
					"sAjaxSource": "'.base_url().$dataTablesource.'",
					"sServerMethod": "POST",
				} ).rowGrouping({ iGroupingColumnIndex: 3,
									fnGroupLabelFormat: function(label) { return "Status : "+ label ; } ,
									bHideGroupingColumn: true,																		
								});');
		endif;
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sulfat Block</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
	<style type="text/css" title="currentStyle">
			
			@import "<?php echo base_url(); ?>css/demo_page.css";
			@import "<?php echo base_url(); ?>css/demo_table.css";
			
		</style>
    <link href="<?= base_url();?>css/bootstrap.css" rel="stylesheet"/>
	<?php echo put_headers(); ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style-bs.css" type="text/css" media="all" />	
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
<body data-offset="40">
<div class="container">
<header class="header">
<div class="row">
	<h1 class="col-md-6"><a href="index.php" title="bootstrap free business website template"><img src="<?= base_url();?>img/logo.gif" alt="bootstrap free business website template"/></a></h1>
	<div class="col-md-6"><div class="pull-right"><br/> <small> Email: kemahasiswaan@stiki.ac.id</small></a><strong><small> <br/>Call (20/5) :  +62341-560823 ext 15</small></strong></div></div>
</div>
</header>

  <!-- Navbar
    ================================================== -->
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="#">Kemahasiswaan</a>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
		<li class="<?php echo ($this->uri->segment(1) == ''  ? 'active':''); ?>"><a href="<?= base_url(); ?>">Home	</a></li>			
		<li class="<?php echo ($this->uri->segment(1) == 'acara'? 'active':''); ?>"><a href="<?php echo base_url(); ?>acara/" ><span>Acara</span></a></li>
			
		<?php /* <li><a href="<?php echo base_url(); ?>index.php/berita" class="<?php echo ($this->uri->segment(1) == 'berita' ? 'active':''); ?>"><span>Berita</span></a></li> */ ?>
		
		<li class="<?php echo ($this->uri->segment(1) == 'seminar' && $this->uri->segment(2) == '')? 'active':''; ?>"><a href="<?php echo base_url(); ?>seminar"><span>Pendaftaran</span></a></li>
		<li class="<?php echo ($this->uri->segment(1) == 'seminar' && $this->uri->segment(2) == 'presensi') ? 'active':''; ?>"><a href="<?php echo base_url(); ?>seminar/presensi" ><span>Presensi</span></a></li>
		<li class="<?php echo $this->uri->segment(1) == 'permission' ? 'active':''; ?>"><a href="<?php echo base_url(); ?>permission" ><span>Hak akses</span></a></li>			
			
		<li class="<?php echo $this->uri->segment(1) == 'sms' ? 'active':''; ?>"><a href="<?php echo base_url(); ?>sms" ><span>SMS Services</span></a></li>
		
		<?php
		$login = $this->session->userdata('role_id')?"logout":"login";			
		?>
			
		<li><a href="<?php echo base_url(); ?>site/<?php echo $login; ?>"><?php echo ucfirst($login); ?></a></li>
			
	</ul>
	<form class="navbar-form navbar-left" role="search">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
</nav>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        testing testing testing
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<?php if (!empty($message) ) : ?>
<div class="row">			
	<div class="col-md-12">
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?= $message; ?>
	</div>		
	</div>
</div>
<?php endif; ?>
<?php
		// siapkan halaman frontpage
	if (!$this->uri->segment(1) ) {
?>
<!-- ======================================================================================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" style="border-top:1px solid #222; border-bottom:1px solid #222; border-radius:4px;">
    <div class="item active">
      <img src="img/banner.jpg" alt="#" style="min-height:250px; min-width:100%"/>
		<div class="carousel-caption">
			<h3>We work for you </h3>
			<p>
			No matter how big and how small your business is. We are giving the best solution for your best value of money.
			</p>
		</div>
    </div>
    <div class="item">
		<img src="img/banner1.jpg" alt="#" style="min-height:250px; min-width:100%"/>
		<div class="carousel-caption">
			  <h3>We work for you </h3>
			  <p>
			  No matter how big and how small your business is. We are giving the best solution for your best value of money.
			  </p>
		</div>
		</div>
	<div class="item">
		<img src="img/banner2.jpg" alt="#" style="min-height:250px; min-width:100%"/>
		<div class="carousel-caption">
			  <h3>We work for you </h3>
			  <p>
			  No matter how big and how small your business is. We are giving the best solution for your best value of money.
			  </p>
		</div>
	</div>
</div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<!-- end carousel -->
	<?php } ?>
<div class="row text-center" >
	<div class="col-md-3">
		<div class="well well-sm well-info">
			<h4>Pendaftaran</h4>
			<a href="<?= base_url();?>seminar"><small>view details</small></a>
		</div>
	</div>

	<div class="col-md-3">
		<div class="well well-sm well-success">
			<h4>Gallery</h4>
			<a href="<?= base_url();?>gallery"><small>view details</small></a>
		</div>
	</div>
	<div class="col-md-3">
		<div class="well well-sm well-warning">
			<h4>Presensi</h4>
			<a href="<?= base_url();?>seminar/presensi"><small>view details</small></a>
		</div>
	</div>
	<div class="col-md-3">
		<div class="well well-sm well-danger">
			<h4>Peserta</h4>
			<a href="<?= base_url();?>seminar/lists"><small>view details</small></a>
		</div>
	</div>
</div>


<div class="row">
	<?php
		// siapkan halaman frontpage
	if (!$this->uri->segment(1) ) {
		?>
	<div class="col-md-9">
		<div class="well well-sm">
			<h3> Selamat Datang</h3>
			<p>membasmi memaksa memaku memakan menyapu menyakiti mencuci mendata menjadi menzalimi meninju mengesampingkan menghasilkan merupakan memberikan melarut melarikan memfasilitasi</p>
			<p>
			Seiring dengan semakin banyaknya kesibukan diantara warga, maka dengan adanya website ini maka kebutuhan informasi dilingkungan RT dapat didapatkan melalui fasilitas ini.<br/><br/> Selain itu, warga juga dapat memberikan kritik maupun saran yang membangun kepada pengurus RT.<br /><br />Selanjutnya kami berharap fasilitas ini dapat digunakan dengan sebaik-baiknya.<br/>
			</p>
		</div>
	</div>
	<div class="col-md-3">
	<div class="">
	
	<?php
		//$data_footer['right_sidebar'] = array('includes/menu-kanan','includes/pengumuman/berita_baru','includes/menu'); 		
		$CI =& get_instance();
		$CI->load->model('acara_model');
		$data_berita_baru['berita2'] = $CI->acara_model->getAll(5,0,"desc");
		$this->load->view('includes-bs/acara/berita_baru',$data_berita_baru);
		
	?>
		
	</div>
	</div>
			<?php
		
	} else { // siapkan halaman selain frontpage
	?>
	<div class="col-md-3">
		<div class="list-group">
			<?php
			
			$menu = $this->config->item('left_menu');
			//$menu[0]->permission_module
			if (is_array($menu))
			foreach($menu as $row){
				//untuk membuat overlay (form modal) tambahkan tulisan berikut pada elemen yg bisa diklik : data-toggle="modal" data-target="#myModal"
				?><a  href="<?php echo base_url().$row->permission_module."/".$row->permission_function; ?>" class="list-group-item <?php echo (($this->uri->segment(1).$this->uri->segment(2)) == ($row->permission_module.$row->permission_function) ? 'active':''); ?>"><span><?= ucfirst($row->permission_caption);?></span></a>
				<?php
			}
			?>
			
		</div>
	</div>
	
	<div class="col-md-9">
		<ul class="breadcrumb">
				<li><a href="<?php echo base_url();?>">Home</a> </li>
				<li class="active"><?= ucfirst($this->uri->segment(1));?></li>
		</ul>
		
			
			<?php
				$this->load->view('includes-bs/content',$main_content);
			?>
			
		
	</div>
	<?php
	}
		
	?>
	
	
	
	
</div>
<!-- Footer
      ================================================== -->
<hr class="soften"/>
<footer class="footer">

<hr class="soften"/>
<p>&copy; Copyright Kemahasiswaan <br/><br/></p>
 </footer>
</div><!-- /container -->

    
	<?php if (isset($script_foot)) echo $script_foot;?>
	<?php echo put_scripts(); ?>  
	
	<script src="js/bootstrap.min.js"></script>
	
	


<script type='text/javascript'><!--(function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://www.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({ c: 'b4cf11d5-e70a-48cb-a336-99fd706c1dfe', f: true }); done = true; } }; })(); --></script>


  </body>
</html>