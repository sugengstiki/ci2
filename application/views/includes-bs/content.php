<?php 
if (isset($main_content)){

	if (is_array($main_content)){
		foreach ($main_content as $box){
			$this->load->view($box);
		}
	} else	$this->load->view($main_content);
}
?>
