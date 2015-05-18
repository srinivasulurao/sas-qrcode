<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventModel extends CI_Model
{
public function __construct()
{
//error_reporting(0);
parent::__construct();
$this->load->database();

}

public function debug($arrayObject){

    echo "<pre>";
    print_r($arrayObject);
    echo"</pre>";

}

public function storeEventAttenderDetails(){

    if($this->input->post('storeSurvey')):
        $insert=array();
        $insert['first_name']=$this->input->post('first_name');
        $insert['last_name']=$this->input->post('last_name');
        $insert['email']=$this->input->post('email');
        $insert['role']=$this->input->post('role');
        $insert['event_id']=base64_decode($this->input->post('event_id'));

        if($this->input->post('role')==1): // If the user is a student.
        $insert['program']=$this->input->post('program');
        $insert['graduation_mm']=$this->input->post('graduation_mm');
        $insert['graduation_yy']=$this->input->post('graduation_yy');
        endif;

        $this->db->insert('eventsurveydata',$insert);
        $message['message']='Thank you for Checking-In!';
        $message['messageType']='success';
        return $message;



    endif;
}


public function statusTypes(){
    $result=$this->db->get('status_types');
    return $result->result_array();
}

public function Programs(){
    $result=$this->db->get('Programs');
    return $result->result_array();

}

} // Model Class ends here.
?>