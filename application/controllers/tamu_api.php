<?php
require_once APPPATH."libraries/REST_Controller.php";
 
class Tamu_api extends REST_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('tamu_model');
    }
	/*
	 * List Tamu
	 */
	function tamus_get()
	{
		$listTamu = $this->tamu_model->getListTamu();
		$this->response($listTamu, 200);
	}
	
	/*
     * Tamu Detail
     */
    function tamu_get()
    {
        if(!$this->get('id'))
        {
            $this->response(NULL, 400);
        }
 
        $detailTamu = $this->tamu_model->getDetailTamu($this->get('id'));
 
        if(!empty($detailTamu))
        {
            $this->response($detailTamu, 200);
        }
        else
        {
            $this->response(array('error' => 'tamu not found'), 404);
        }
    }
	
	/*
     * Save Tamu
     */
    function tamu_post()
    {
        $result = $this->tamu_model->saveTamu(array('nama' => $this->post('nama'), 'email' => $this->post('email'), 'pesan' => $this->post('pesan')));
 
        if(!empty($result))
        {
            $this->response(array('status' => 'success'));
        }
        else
        {
            $this->response(array('status' => 'failed'));
        }
    }
	
	/*
     * Delete Tamu
     */
    function tamu_delete()
    {
 
        $result = $this->tamu_model->deleteTamu($this->get('id'));
 
        if(!empty($result))
        {
            $this->response(array('status' => 'success'));
        }
        else
        {
            $this->response(array('status' => 'failed'));
        }
    }
	
	/*
     * Update Tamu
     */
     function tamu_put()
     {
        $result = $this->tamu_model->updateTamu(array('nama' => $this->put('nama'), 'email' => $this->put('email'), 'pesan' => $this->put('pesan')), $this->get('id'));
 
        if(!empty($result))
        {
            $this->response(array('status' => 'success'));
        }
        else
        {
            $this->response(array('status' => 'failed'));
        }
	}
		
}
?>