<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />	
	<?php echo put_headers(); ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/print.css" type="text/css" media="all" />	
	<style type="text/css">
	#qrcodeholder {
		position: absolute;
		top: 24px;
		right: 19px;
	}
	</style>
</head>
<body>
<?php 
$this->load->view($main_content);

