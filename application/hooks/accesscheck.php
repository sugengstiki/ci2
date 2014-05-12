<?php
session_start();	
class AccessCheck {
	public function index($param){
		require_once('permission.php');
		$baseURL = $GLOBALS['CFG']->config['base_url'];
		$index = $GLOBALS['CFG']->config['index_page'];
		$routing =& load_class('Router');
		$session =& load_library('Session');
		$class = $routing->fetch_class();
		$method = $routing->fetch_method();
		
		if (!empty($doesNotRequireLogin[$class][$method]) || isset($_POST['username1'])) {
			return true;
		} else {
			if (! $session->userdata('userType') && ! $_POST['username1']){
				//print_r($_SESSION);
				//die();
				//header("location:{$baseURL}common/login");
				header("location:{$baseURL}common/login");
				
				exit;
			} else { 
				if(empty($permissions[$session->userdata('userType')][$class][$method]) || $permissions[$session->userdata('userType')][$class][$method]!=true) { 
					header("location: {$baseURL}common/unauthorized"); 
					exit; 
				} else { return true; } 
			} 
		} 
		header("location: {$baseURL}common/unauthorized");	
	}
}