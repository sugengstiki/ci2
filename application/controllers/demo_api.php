<?php
 
require_once APPPATH."libraries/REST_Controller.php";
 
class Demo_api extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('demo_model');
    }
 
    function country_get()
    {
        if(!$this->get('code'))
        {
            $this->response(NULL, 400);
        }
 
        $country = $this->demo_model->getCountryByCode($this->get('code'));
 
        if(!empty($country))
        {
            $this->response($country, 200);
        }
        else
        {
            $this->response(array('error' => 'could found'), 404);
        }
    }
 
    function countrys_get()
    {
        $country = $this->demo_model->getAllCountry();
        $this->response($country, 200);
    }
}
?>