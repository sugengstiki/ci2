<?php
class Tamu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	
	function getDetailTamu($id)
    {
        return $this->db->select('*')->from('tamu')->where('id', $id)->get()->row_array();
    }
 
    function getListTamu()
    {
        return $this->db->select('*')->from('tamu')->get()->result_array();
    }
	
	function saveTamu($data)
    {
        $this->db->insert('tamu', $data);
        return $this->db->affected_rows();
    }
	
	function deleteTamu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tamu');
        return $this->db->affected_rows();
    }
	
	function updateTamu($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tamu', $data);
        return $this->db->affected_rows();
    }
}
?>