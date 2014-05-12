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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi RT RW</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?= base_url();?>css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url();?>font-awesome/css/font-awesome.min.css">
	<?php echo put_headers(); ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style-bs.css" type="text/css" media="all" />	
    
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Sistem Informasi RT / RW</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <?= $this->load->view('includes-bs/side-nav');?>
		  <?= $this->load->view('includes-bs/top-nav');?>
          
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

      <?= $this->load->view('includes-bs/content',$main_content);?>


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<?php if (isset($script_foot)) echo $script_foot;?>
	<?php echo put_scripts(); ?>  
    

  </body>
</html>
