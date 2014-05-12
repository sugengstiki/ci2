<?php 
	$doesNotRequireLogin = array(); 
	$permissions = array(); 
	$doesNotRequireLogin['common']['index'] = true; 
	$doesNotRequireLogin['common']['login'] = true; 
	$doesNotRequireLogin['common']['dologin'] = true; 
	$doesNotRequireLogin['common']['unauthorized'] = true; 
	$doesNotRequireLogin['common']['message'] = true; 
	$doesNotRequireLogin['common']['forgotpassword'] = true;
	$doesNotRequireLogin['login']['index'] = true;
	$doesNotRequireLogin['site']['logout'] = true;
	$permissions['member']['blog']['post'] = true; 
	$permissions['member']['blog']['view'] = true; 
	$permissions['member']['blog']['save'] = true; 
	$permissions['member']['blog']['rating'] = true; 
	$permissions['guest']['blog']['view'] = true;
	$permissions['member']['site']['index'] = true; 