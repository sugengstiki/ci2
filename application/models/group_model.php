<?php

class group_model extends CI_Model {
	var $group_id = '';
	var $group_desc = '';
	    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get($id)
    {
		if (empty($id)) {
			$query = $this->db->get('group');	
		} else {
			$q = $this->db->get_where('group',array('id'=>$id));
		}
		
        
        return $query->result();
    }
	
}
