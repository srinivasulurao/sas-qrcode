<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {

        error_reporting(~E_NOTICE); // Only serious errors are shown.
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('url');
        $this->load->library('table');
        $this->load->helper('sasqrcode');
        $this->load->model('adminModel','adminModel',true);

        if($this->session->userdata('username')=="" or $this->session->userdata('user_id')=="")
        {

            redirect('login'); //redirect to the login if he is not a legitimate user or he is logged out.
        }

    }



    public function index()
    {
        //debug($this->session->userdata);
        $authentication_result=array();
        $data['message']=$authentication_result['message'];
        $data['title']="Texas Tech -  Dashboard";
        $data['messageType']=$authentication_result['messageType'];
        $this->load->view('dashboard',$data);
    }

    public function family(){
        $data=array();
        $this->adminModel->createFamily();
        $this->adminModel->editFamily();
        $this->adminModel->deleteFamily();
        $result=$this->adminModel->getFamilies();
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['title']="SAS-List of family";
        $data['results']=$result;
        $this->load->view('family',$data);

    }


    public function emailQrCode(){
        $data=array();
        $family_id=$this->uri->segment(3,0);
        $qrCode=base64_decode($this->uri->segment(4,0));

        $result=$this->db->query("SELECT data FROM Family_Registrations WHERE family_id='$family_id'");
        $family_detail=$result->result_array();
        $family_data=unserialize(base64_decode($family_detail[0]['data']));

        $to = $family_data['email_address'];
        $subject = "Family QR Code by Health Collaborative SAS";

        $message = "Please find the attached QR Code<br><br>";
        $message.="<img src='http://qrickit.com/api/qr?d=$qrCode'><br><br>Thank You.";

// Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
        $headers .= 'From: Health Collaborative SAS <web@appddictionstudio.com>' . "\r\n";
        //$headers .= 'Cc: srinivasulu.rao@omkarsoft.com' . "\r\n";

        $newdata=array();

        if(mail($to,$subject,$message,$headers)) {

            $newdata['message'] = "Qr Code has been sent successfully";
            $newdata['messageType'] = "success";
        }
        else{
            $newdata['message'] = "Mail function not working for this server, please contact administrator to fix this!";
            $newdata['messageType'] = "danger";
        }

        $this->session->set_userdata($newdata);

        redirect("admin/family");


    }


    public function family_members(){

        $data=array();
        $this->adminModel->createFamilyMember();
        $this->adminModel->editFamilyMember();
        $this->adminModel->deleteFamilyMember();
        $data['families']=$this->adminModel->getFamilies();
        $result=$this->adminModel->getFamilyMembers();
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['title']="SAS-List of Family Members";
        $data['results']=$result;
        $this->load->view('familyMember',$data);

    }

    public function locations(){

        $data=array();
        $this->adminModel->createLocation();
        $this->adminModel->editLocation();
        $this->adminModel->deleteLocation();
        $result=$this->adminModel->getLocations();
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['title']="SAS-List of Locations";
        $data['results']=$result;
        $this->load->view('locations',$data);

    }

    public function family_info(){
        $family_id=$this->uri->segment(3,0);
        $data=array();
        $data['family_members']=$this->adminModel->getFamilyMembersByfamilyId($family_id);
        $this->adminModel->saveFamilyInfo($family_id);
        $result=$this->adminModel->getFamilyInfo($family_id);
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['title']="SAS-Family Registration Info";
        $data['result']=$result;
        $this->load->view('familyInfo',$data);

    }

    public function family_checkins(){

        $family_id=$this->uri->segment(3,0);
        $data=array();
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['title']="SAS-Family Checkins";
        $data['results']=$this->adminModel->getFamilies();
        $this->load->view('familyCheckin',$data);
    }

    public function view_family_tracklog(){

        $family_id=$this->uri->segment(3,0); // This is damn important.
        $data=array();
        $this->adminModel->saveFamilyTrackLog($family_id);
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['family_id']=$family_id;
        $data['track_log']=$this->adminModel->getFamilyTrackLog($family_id);
        $data['title']="SAS-View Family Track Log";
        //$data['checkins']=$this->getFamilyCheckins($family_id);
        $data['results']=$this->adminModel->getCheckinIntervals();
        $this->load->view('viewFamilyTracklog',$data);

    }

    public function view_family_checkins(){

        $family_id=$this->uri->segment(3,0); // This is damn important.
        $data=array();
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['family_id']=$family_id;
        $data['title']="SAS-View Family Checkin List";
        //$data['checkins']=$this->getFamilyCheckins($family_id);
        $data['results']=$this->adminModel->getFamilyCheckins($family_id);
        $this->load->view('viewFamilyCheckins',$data);

    }

    public function checkin_intervals(){

        $data=array();
        $this->adminModel->createCheckinInterval();
        $this->adminModel->editCheckinInterval();
        $this->adminModel->deleteCheckinInterval();
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['title']="SAS-Checkin Intervals";
        $data['results']=$this->adminModel->getCheckinIntervals();
        $this->load->view('checkinIntervals',$data);

    }

    public function post_survey(){

        $data=array();
        $result=$this->adminModel->getFamilies();
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['title']="SAS-List of Post Survey";
        $data['results']=$result;
        $this->load->view('postSurvey',$data);

    }

    public function view_post_survey(){

        $family_id=$this->uri->segment(3,0);

        $this->adminModel->updatePostSurvey($family_id);
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['title']="SAS-Family Post Survey";
        $data['result']=$this->adminModel->getPostSurvey($family_id);
        $this->load->view('view_post_survey',$data);

    }


    public function pre_survey(){

        $data=array();
        $result=$this->adminModel->getFamilies();
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['title']="SAS-List of Pre Survey";
        $data['results']=$result;
        $this->load->view('preSurvey',$data);

    }

    public function view_pre_survey(){

        $family_id=$this->uri->segment(3,0);

        $this->adminModel->updatePreSurvey($family_id);
        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['title']="SAS-Family Pre Survey";
        $data['result']=$this->adminModel->getPreSurvey($family_id);
        $this->load->view('view_pre_survey',$data);

    }

	
    public function social_media(){
        $data=array();
        $data['title']="Texas Tech -  Social Media";

        $this->adminModel->editSocialMedia();
        $this->adminModel->deleteSocialMedia();
        $this->adminModel->createSocialMedia();

        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['results']=$this->adminModel->getSocialMedia();


        $this->load->view('social_media',$data);
    }




    public function logout(){

        foreach($this->session->userdata as $sessKey=>$sessValue):
            $this->session->unset_userdata($sessKey);
        endforeach;
        redirect('login/index');
    }


    public function events(){

        $data=array();

        $data['title']="Texas Tech -  Events";

        $this->adminModel->editEventDetails();
        $this->adminModel->deleteEventDetails();
        $this->adminModel->createEventDetails();

        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['results']=$this->adminModel->getEvents();


        $this->load->view('events',$data);
    }

    public function resources(){

        $data=array();

        $data['title']="Texas Tech -  Resources";

        $this->adminModel->editResourceDetails();
        $this->adminModel->deleteResourceDetails();
        $this->adminModel->createResourceDetails();

        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['results']=$this->adminModel->getResources();


        $this->load->view('resources',$data);

    }
	
    public function mental_health_resources(){

        $data=array();

        $data['title']="Texas Tech -  Mental Health Resources";

        $this->adminModel->editMentalHealthDetails();
        $this->adminModel->deleteMentalHealthDetails();
        $this->adminModel->createMentalHealthDetails();

        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['results']=$this->adminModel->getMentalHealthResources();


        $this->load->view('mental_health_resources',$data);
    }	

     public function faculty_directory(){

        $data=array();

        $data['title']="Texas Tech -  Faculties Directory";

        $this->adminModel->createFacultyDirectory();
        $this->adminModel->deleteFacultyDirectory();
        $this->adminModel->editFacultyDirectory();

        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['results']=$this->adminModel->getFacultyDirectoryList();
        $data['campusList']=$this->adminModel->getCampusList();


        $this->load->view('facultyDirectory',$data);

    }


    public function campus_map(){

        $data=array();

        $data['title']="Texas Tech -  Faculties Directory";

        $this->adminModel->createCampusMap();
        $this->adminModel->deleteCampusMap();
        $this->adminModel->editCampusMap();

        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');
        $data['results']=$this->adminModel->getCampusMapList();
        $data['campusList']=$this->adminModel->getCampusList();

        $this->load->view('campusMap',$data);

    }

    public function home_screen(){

        $data=array();

        $data['title']="Texas Tech -  Home Screen";

        $this->adminModel->createHomeScreen();
        $this->adminModel->deleteHomeScreen();
        $this->adminModel->editHomeScreen();

        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');


        $data['deviceTypes']=$this->adminModel->getDeviceTypes();
        $data['deviceResolutions']=$this->adminModel->getDeviceResolutions();
        $data['results']=$this->adminModel->getHomeScreens();

        $this->load->view('homeScreens',$data);

    }

    public function login_screen(){

        $data=array();

        $data['title']="Texas Tech -  Faculties Directory";

        $this->adminModel->createLoginScreen();
        $this->adminModel->deleteLoginScreen();
        $this->adminModel->editLoginScreen();
       // $this->adminModel->sendPushNotification();
		$this->sendpush();

        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');


        $data['statusTypes']=$this->adminModel->getStatusTypes();
        $data['results']=$this->adminModel->getLoginScreens();

        $this->load->view('loginScreen',$data);
    }

public function virtual_tours(){

    //show_error("This functionality is under progress",500);
    $data['messageType']='danger';
    $data['message']="This page is under construction, see you soon!";
    $this->load->view('virtualTours');

}

    public function push_notification(){
        $data=array();

        $data['title']="Texas Tech -  Push Notification";
        // $this->adminModel->sendPushNotification();
        $this->sendpush();

        $data['message']=$this->session->userdata('message');
        $data['messageType']=$this->session->userdata('messageType');


        $data['statusTypes']=$this->adminModel->getStatusTypes();
        $data['results']=$this->adminModel->getLoginScreens();

    $this->load->view('pushNotification',$data);
    }

public function debug($arrayObject){
    echo"<pre>";
    print_r($arrayObject);
    echo"</pre>";
}

public function sendpush(){
  	if($this->input->post('sendPushNotification')){
		$userId=$this->session->userdata('user_id');
		$status_id=$_REQUEST['status_id'];
		$status_types_arr = $this->adminModel->get_status_types_by_id();
		$status_type = $status_types_arr[$status_id];
		
		$pushFor=$status_type;
		$pushId=$_REQUEST['pushId'];	
		$message=$_REQUEST['message'];
		$time=date('Y-m-d h:i:s');
		$insertPush=$this->adminModel->savePushMsg($userId,$message,$pushFor,$pushId,$time);
		$deviceId=$this->adminModel->getdeviceId($userId,$status_id,$pushId);
        //$this->debug($deviceId);
        //exit;
		if($deviceId)
		{
			$i=0;
			foreach($deviceId as $data)
			{
				if($data['deviceType']=="IPhone"){
					$test=$this->adminModel->sendpush_ios($data['deviceId'],$message);
				}else{
					$test=$this->adminModel->sendpush_andriod($data['deviceId'],$message);
				}
				
				if($test)
				{
					$i++;
				}
			}
			//echo '{"success":true, "result":"Push notification sent successfully"}';
				$this->session->set_userdata('messageType','success');
				$this->session->set_userdata('message',"Push Notification has been sent successfully !");		
			//return 1;
		}
		else
		{
			//echo '{"success":false,"error":"No device found"}';
				$this->session->set_userdata('messageType','Failure');
				$this->session->set_userdata('message',"Device Id not found !");		
			//return 0;
		}
	}
}

}//Controller ends here.
