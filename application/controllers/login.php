<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {


        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('sasqrcode');
        $this->load->model('loginModel','loginModel',true);
        if($this->session->userdata('username') and $this->session->userdata('user_id'))
        {
            redirect('admin'); //redirect to the dashboard if he is a legitimate user.
        }

    }

    public function index()
    {
        $authentication_result=$this->loginModel->authenticateLoginCredentials();
        $data['message']=$authentication_result['message'];
        $data['title']="Login to TexasTech";
        $data['messageType']=$authentication_result['messageType'];
        $this->load->view('login',$data);
    }





}//Controller ends here.
