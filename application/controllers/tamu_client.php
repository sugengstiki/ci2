<?php
class Tamu_client extends CI_Controller
{
    public $username = '';
    public $password = '';
    public $data;
 
    function __construct()
    {
        parent::__construct();
        $this->username = 'admin';
        $this->password = '1234';
        $this->load->helper('url');
    }
 
	function tamuList()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/ci2/tamu_api/tamus/format/json');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_USERPWD, $this->username.':'.$this->password);
 
        $exec = curl_exec($curl);
        curl_close($curl);
        $this->data['getTamu'] = json_decode($exec);
 
        $this->load->view('tamu_client_list_view.php', $this->data);
 
    }
	
	function form()
    {
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('captcha','url'));
        $config = array(
                    array('field' => 'nama', 'label' =>'Nama', 'rules' => 'required|trim|xss_clean'),
                    array('field' => 'email', 'label' =>'Email', 'rules' =>'required|valid_email|trim|xss_clean'),
                    array('field' => 'pesan', 'label' =>'Pesan', 'rules' => 'required|trim|xss_clean'),
                    array('field' => 'captcha','label' =>'Captcha' ,'rules' =>'required|trim|xss_clean|callback_validate_captcha')
                    );
        $this->form_validation->set_rules($config);
 
        if($this->form_validation->run() == FALSE)
        {
            $original_string = array_merge(range(0,9), range('a','z'));
            $original_string = implode("", $original_string);
            $captchaWord = substr(str_shuffle($original_string), 0, 2);
            $vals = array(
                'word' => $captchaWord,
                'img_path' => './images/captcha/',
                'img_url' => base_url().'images/captcha/',
                'font_path' => BASEPATH.'fonts/texb.ttf',
                'img_width' => '150',
                'img_height' => 30,
                'expiration' => 7200
                );
            $cap = create_captcha($vals);
            $this->data['captcha'] = $cap['image'];
 
            if(file_exists(BASEPATH."../images/captcha/".$this->session->userdata('image_captcha')))
             {
                @unlink(BASEPATH."../images/captcha/".$this->session->userdata('image_captcha'));
             }
 
            $this->session->set_userdata(array('captcha'=>$captchaWord, 'image_captcha' => $cap['time'].'.jpg'));
            $this->load->view('tamu_client_form_view', $this->data);
        }
        else
        {
            $post = $this->input->post();
 
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://localhost/ci/tamu_api/tamu/format/json');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($curl, CURLOPT_POST,1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, array('nama'=>$post['nama'], 'email'=>$post['email'], 'pesan'=>$post['pesan']));
            curl_setopt($curl, CURLOPT_USERPWD, $this->username.':'.$this->password);
 
            $exec = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($exec);
 
            if(isset($result->status) && $result->status=='success')
            {
                redirect('tamu_client/tamuList');
            }
            else
            {
                echo 'failed';
            }
 
        }
 
    }
 
    function validate_captcha(){
        if($this->input->post('captcha') != $this->session->userdata('captcha'))
        {
            $this->form_validation->set_message('validate_captcha', 'Wrong captcha code');
            return false;
        }else{
            return true;
        }
    }
	
	
	
	function delete()
    {
        $tamuId = $this->uri->segment(3);
 
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/ci/tamu_api/tamu/id/'.$tamuId.'/format/json');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_USERPWD, $this->username.':'.$this->password);
 
        $exec = curl_exec($curl);
 
        curl_close($curl);
        $result = json_decode($exec);
 
        if(isset($result->status) && $result->status=='success')
        {
            redirect('tamu_client/tamuList');
        }
        else
        {
            echo 'failed';
        }
 
    }

	function edit()
    {
        $tamuId = $this->uri->segment(3);
$this->load->library(array('form_validation','session'));
        $this->load->helper(array('captcha','url'));
        $config = array(
                    array('field' => 'nama', 'label' =>'Nama', 'rules' => 'required|trim|xss_clean'),
                    array('field' => 'email', 'label' =>'Email', 'rules' =>'required|valid_email|trim|xss_clean'),
                    array('field' => 'pesan', 'label' =>'Pesan', 'rules' => 'required|trim|xss_clean'),
                    );
        $this->form_validation->set_rules($config);
        if($this->form_validation->run() == FALSE)
        {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://localhost/ci/tamu_api/tamu/id/'.$tamuId.'/format/json');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($curl, CURLOPT_USERPWD, $this->username.':'.$this->password);
            $exec = curl_exec($curl);
            curl_close($curl);
            $this->data['detailTamu'] = json_decode($exec);
            $this->load->view('tamu_client_edit_view', $this->data);
 
        }
        else
        {
            $post = $this->input->post();
            $tamuId = $this->uri->segment(3);
 
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://localhost/ci/tamu_api/tamu/id/'.$post['id'].'/format/json');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('nama'=>$post['nama'], 'email'=>$post['email'], 'pesan'=>$post['pesan'])));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($curl, CURLOPT_USERPWD, $this->username.':'.$this->password);
 
            $exec = curl_exec($curl);
 
            print_r($exec);
            curl_close($curl);
            $result = json_decode($exec);
            redirect('tamu_client/tamuList');
        }
 
    }
	
	
}
?>