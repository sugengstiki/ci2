<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Sulfat Block</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css">
	
	<style type="text/css" title="currentStyle">
			
			@import "<?php echo base_url(); ?>css/demo_page.css";
			@import "<?php echo base_url(); ?>css/demo_table.css";
			
		</style>
	<?php echo put_headers(); ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" media="all" />	
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
			/* .rowGrouping({ iGroupingColumnIndex: 1,
									fnGroupLabelFormat: function(label) { return "Subject : "+ label ; } ,
									bHideGroupingColumn: true,																		
								}) */	
		endif;
	?>
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="<?php echo base_url(); ?>index.php/site">Sulfat Block</a></h1>
		<?php
			$this->load->view('includes/topmenu');
		?>
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<?php
				$this->load->view('includes/mainnav');
			?>
			
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->

<!-- Container -->
<div id="container">
	<div class="shell">
		
		<!-- Small Nav -->
		<div class="small-nav">
			<a href="<?php echo base_url().$this->uri->segment(1);?>"><?php echo ucfirst($this->uri->segment(1));?></a>
			<?php
echo isset($page_name)? '<span>&gt;</span>'.ucfirst($page_name):'';
?>
			
			
		</div>
		<!-- End Small Nav -->
		
		<!-- Message OK -->
		<?php if (!empty($message) ) : ?>
		<div class="msg msg-ok">
			<p><strong><?php echo $message; ?></strong></p>
			<a href="#" class="close">close</a>
		</div>
		<?php endif; ?>
		<!-- End Message OK -->		
		
		<!-- Message Error -->
		<?php if (!empty($message_err) ) : ?>
		<div class="msg msg-error">
			<p><strong>You must select a file to upload first!</strong></p>
			<a href="#" class="close">close</a>
			
		</div>
		<?php endif; ?>
		<!-- End Message Error -->
		<br />
		<!-- Main -->
		<div id="main">
			<div class="cl">&nbsp;</div>
			<div id="result"><?php //echo $this->session->userdata('u'); ?></div>
			<!-- Content -->
			<div id="content">