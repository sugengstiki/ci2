<?php
class Demo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
 
    function getAllCountry()
    {
        return $this->db->select('*')->from('default_countries')->get()->result_array();
    }
 
    function getCountryByCode($code)
    {
        return $this->db->select('*')->from('default_countries')->where('iso_2', $code)->or_where('iso_3', $code)->get()->row_array();
    }
}
?>