<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Utility
	================================================
    Dibuat 			: Sugeng Widodo
    Tgl Pembuatan 	: 18 April 2013
    Tgl Revisi		: - 
    Pertanyaan		: sugeng@stiki.ac.id
*/
if ( ! function_exists('potong'))
{
	function potong($content,$length = 200,$filter = "<strong><b><p><em><i>") 
	{		
		$content = strip_tags($content,$filter);
		if(strlen($content) > $length )
		{
			 return substr($content,0,strpos($content,' ',$length)).' ...';             //strpos to find ‘ ‘ after 30 characters.
		}
		else {
			 return $content;
		}
	}
}


if ( ! function_exists('sms_status'))
{
	function sms_status($kode) 
	{		
		if ($kode)
		{
			return 'Sudah diproses';
		} else return 'Belum diproses';
		
	}
}

if ( ! function_exists('status_bayar'))
{
	function status_bayar($kode) 
	{		
		return $kode?'Sudah bayar':'Belum bayar';
	}
}

if ( ! function_exists('saran_status'))
{
	function saran_status($kode) 
	{		
		return $kode?'Tampil':'Tidak tampil';
	}
}

if ( ! function_exists('atur_tgl'))
{
	function atur_tgl($date)
	{	
		return date("d/m/Y", strtotime($date));	
	}

}
	
if(!function_exists('add_js')){
    function add_js($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_js  = $ci->config->item('header_js');
 
        if(empty($file)){
            return;
        }
 
        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){
                $header_js[] = $item;
            }
            $ci->config->set_item('header_js',$header_js);
        }else{
            $str = $file;
            $header_js[] = $str;
            $ci->config->set_item('header_js',$header_js);
        }
    }
}
 
//Dynamically add CSS files to header page
if(!function_exists('add_css')){
    function add_css($file='')
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
 
        if(empty($file)){
            return;
        }
 
        if(is_array($file)){
            if(!is_array($file) && count($file) <= 0){
                return;
            }
            foreach($file AS $item){   
                $header_css[] = $item;
            }
            $ci->config->set_item('header_css',$header_css);
        }else{
            $str = $file;
            $header_css[] = $str;
            $ci->config->set_item('header_css',$header_css);
        }
    }
}
 
if(!function_exists('put_headers')){
    function put_headers()
    {
        $str = '';
        $ci = &get_instance();
        $header_css = $ci->config->item('header_css');
        $header_js  = $ci->config->item('header_js');
		
        if (!empty($header_css))
		foreach($header_css AS $item){
            $str .= '<link rel="stylesheet" href="'.base_url().'css/'.$item.'" type="text/css" />'."\n";
        }
		
		if (!empty($header_js))
        foreach($header_js AS $item){
            $str .= '<script type="text/javascript" src="'.base_url().'js/'.$item.'"></script>'."\n";
        }
 
        return $str;
    }
}

if(!function_exists('add_script')){
    function add_script($script='')
    {
        $str = '';
        $ci = &get_instance();
        $header_script = $ci->config->item('header_script');
 
        if(empty($script)){
            return;
        }
 
        if(is_array($script)){
            if(!is_array($script) && count($script) <= 0){
                return;
            }
            foreach($script AS $item){   
                $header_script[] = $item;
            }
            $ci->config->set_item('header_script',$header_script);
        }else{
            $str = $script;
            $header_script[] = $str;
            $ci->config->set_item('header_script',$header_script);
        }
    }
}
 
if(!function_exists('put_scripts')){
    function put_scripts()
    {
        $str = '<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {'."\n";
        $ci = &get_instance();
        $header_script = $ci->config->item('header_script');        
		
        if (!empty($header_script))
		foreach($header_script AS $item){
            $str .= $item."\n";
        }		
 
        return $str . '} );
</script>'."\n";
    }
}
/* End of file utility.php */