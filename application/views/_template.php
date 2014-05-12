<?php 
$this->load->view('includes/header');
$this->load->view($main_content);

$CI =& get_instance();
$CI->load->model('pengumuman_model');

$data_footer['right_sidebar'] = array('includes/menu-kanan','includes/pengumuman/berita_baru','includes/menu');
$data_footer['berita2'] = $CI->pengumuman_model->getAll(5,0,"desc");

if (isset($footer)){
$this->load->view($footer,$data_footer);
} else {
$this->load->view('includes/footer',$data_footer);
}

