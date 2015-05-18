<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkin extends CI_Controller {

    public function __construct() {

        error_reporting(~E_NOTICE); // Only serious errors are shown.
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->helper('url');
        $this->load->library('table');
        $this->load->helper('sasqrcode');
        $this->load->model('adminModel','adminModel',true);



    }

    public function family()
    {
        //debug($this->session->userdata);
        $family_id=base64_decode($this->uri->segment(3,0));
        $save_checkin=$this->adminModel->saveCheckin();
        $data['family']=$this->adminModel->getFamilyWithMembers($family_id);
        $data['locations']=$this->adminModel->getLocations();
        $data['message']=$save_checkin['message'];
        $data['title']="Appddiction Studio SAS - Checking";
        $data['messageType']=$save_checkin['messageType'];
        $this->load->view('checkin',$data);
    }



}//Controller ends here.
