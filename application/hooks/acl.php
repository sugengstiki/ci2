<?php
/**
 * This class will be called by the post_controller_constructor hook and act as ACL
 * 
 * @author ChristianGaertner
 */
class ACL {
    
    /**
     * Array to hold the rules
     * Keys are the role_id and values arrays
     * In this second level arrays the key is the controller and value an array with key method and value boolean
     * @var Array 
     */
    private static $perms;
    /**
     * The field name, which holds the role_id
     * @var string 
     */
    private static $role_field;
    /**
     * Contstruct in order to set rules
     * @author ChristianGaertner
     */
    public function __construct() {
		$CI =& get_instance();
        $CI->load->model('permission_model');
		
		$this->role_field = 'role_id';
		$result = $CI->permission_model->getAll();
		foreach ($result as $brs){
			$this->perms[$brs->permission_type][$brs->permission_module][$brs->permission_function] = true;
		} 
				
    }
	
	private function check_role ($class, $method) {
		$ada = false;				
		foreach ($this->perms as $role) {
			if (isset($role[$class][$method])) $ada = true;
		}
		return $ada;	
	}
    /**
     * The main method, determines if the a user is allowed to view a site
     * @author ChristianGaertner
     * @return boolean
     */
	public function auth()
    {
        $CI =& get_instance();
        
        if (!isset($CI->session))
        { # Sessions are not loaded
            $CI->load->library('session');
        }
        
        if (!isset($CI->router))
        { # Router is not loaded
            $CI->load->library('router');
        }
        
        /* if (!isset($CI->url))
        { # Router is not loaded
            $CI->load->helper('url');
        } */
		
        $class = $CI->router->fetch_class();
        $method = $CI->router->fetch_method();
		$bypass = array("login","logout","validasi","simpan","hapus","getdatatables","get");
		
		$lolos = true;
		
		//if ($this->check_role($class,$method)){
			
			if ($CI->session->userdata($this->role_field) == 'admin' OR
				in_array($method,$bypass)) $lolos = true; 
			else
				if (isset($this->perms[$CI->session->userdata($this->role_field)][$class][$method]))
					$lolos = true;
			//if ($this->perms[$CI->session->userdata($this->role_field)][$class][$method]) $lolos = true;
		//} 
		
		if (!$lolos){
			$CI->session->set_flashdata('message', 'Maaf, Fasilitas tersebut tidak dapat digunakan.');
			redirect(base_url());
			//redirect(base_url().$CI->uri->segment(1));	
		}
		
		return $lolos;
    }
	
	
    public function auth3()
    {
        $CI =& get_instance();
        
        if (!isset($CI->session))
        { # Sessions are not loaded
            $CI->load->library('session');
        }
        
        if (!isset($CI->router))
        { # Router is not loaded
            $CI->load->library('router');
        }
        
        
        $class = $CI->router->fetch_class();
        $method = $CI->router->fetch_method();

        // Is rule defined?
        $is_ruled = false;
        foreach ($this->perms as $role)
        { # Loop through all rules
            if (isset($role[$class][$method]))
            { # For this role exists a rule for this route
                $is_ruled = true;
            }
        }
		
        if (!$is_ruled)
        { # No rule defined for this route
            // hak akses ditolak				
			$CI->session->set_flashdata('message', 'Maaf, Fasilitas tersebut tidak dapat digunakan.');
			redirect("site");			
            //return false;
		} 
        //die($this->role_field . "aaaa".$this->perms[$CI->session->userdata($this->role_field)][$class][$method]);
		if ($this->perms[0][$class][$method])
		{ # The user is allowed to enter the site
			return true;
		}
		else
		{ # The user does not have permissions
			//$CI->error->show(403);
			$CI->session->set_flashdata('message', 'Maaf, Fasilitas tersebut tidak dapat digunakan. Silahkan melakukan login terlebih dahulu');
			redirect("site/login");//show_error("does not have permissions");
		}
		
        if ($CI->session->userdata($this->role_field))
        { # Role_ID successfully determined ==> User is logged in
		
			//echo $CI->session->userdata($this->role_field);
            if ($this->perms[$CI->session->userdata($this->role_field)][$class][$method])
            { # The user is allowed to enter the site
                return true;
            }
            else
            { # The user does not have permissions
                //$CI->error->show(403);
				$CI->session->set_flashdata('message', 'Maaf, Fasilitas tersebut tidak dapat digunakan. Silahkan melakukan login terlebih dahulu');
				redirect("site/login");//show_error("does not have permissions");
            }
        }
        //else
        { # not logged in
			
            
        }

        
        
    }
	
	function auth2(){
  $local_CI =&get_instance();
  if (!isset($local_CI->session)){
        $local_CI->load->library('session');
  }
  $local_CI->load->library('router');
  $baseURL = $GLOBALS['CFG']->config['base_url'];
  require 'levels.php'; // this is where the permissions defined  
 
  $class = $this->router->fetch_class();
  $method = $this->router->fetch_method();
 
  if($noLogin[$class][$method] || $local_CI->session->userdata('usertype_id') == 1){ //admin always true
      return true;
    }
    else{
      if($local_CI->session->userdata('usertype_id')){
        if(!$privs[$local_CI->session->userdata('usertype_id')][$class][$method]){ //if not exists = allowed
          return true;
        }
        else{
         redirect($baseURL.'/index/not_allowed');  //redirect to not-authorized page
        }
      }
      else{
        redirect($baseURL.'/'); //redirect login page/index page
      }
    }
 }
}
