<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class LoginModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function debug($arrayObject){

        echo "<pre>";
        print_r($arrayObject);
        echo"</pre>";

    }

    public function authenticateLoginCredentials(){
        $result_array=array();

        // Some more security features to be added.
        if(!$this->input->post('username') or !$this->input->post('password')):
            $result_array['']="Please enter username & password before submitting the login form !";
            $result_array['messageType']="warning";
            return $result_array;
        endif;
        //codeigniter way of fetching the post values.
        if($this->input->post('username') && $this->input->post('password')):
                $this->db->where('username',$this->input->post('username'));
                $this->db->where('password',$this->input->post('password'));
                $query=$this->db->get('admin_info');

                   //the user is a authenticated user.
                   if($query->num_rows()){
                       $user=$query->result();

                       $userinfo=array("user_id"=>$user[0]->id,
                           "firstName"=>$user[0]->firstName,
                           "lastName"=>$user[0]->lastName,
                           "phone"=>$user[0]->phone,
                           "email"=>$user[0]->email,
                           "username"=>$user[0]->username,
                           "password"=>md5($user[0]->password)
                       );

                       $this->session->set_userdata($userinfo);
                   $this->saveCookiesForLoginCredentials();
                   $result_array['message']="Login Successfull, redirecting to the admin dashboard !";
                   $result_array['messageType']="success";
                       redirect('admin');
                   }

                   else{

                       //Remove the values from the session if there are any.
                       $userinfo=array("user_id"=>"",
                           "firstName"=>"",
                           "lastName"=>"",
                           "phone"=>"",
                           "email"=>"",
                           "username"=>"",
                           "password"=>""
                        );

                       $this->session->set_userdata($userinfo);
                       foreach($this->session->userdata as $sessKey=>$sessValue):
                           unset($this->session->userdata[$sessKey]);
                       endforeach;
                       $result_array['message']="Username and password do not match or you do not have an account yet.";
                       $result_array['messageType']="danger"; //the bootstrap Class.
                   }
        endif;

        //$this->debug($this->session->userdata);

        return $result_array;
    }
    // Keep Writting the methods from here onwards.

    private function saveCookiesForLoginCredentials(){
         if($this->input->post('remember-me')) {
             $expire=time()+(3600*24*1000); //give Positive time value.
         }
        else{
            $expire=time()-1000;//give negative time value to cookie to expire.
        }

        setcookie('username',$this->input->post('username'),$expire);
        setcookie('password',$this->input->post('password'),$expire);
        setcookie('remember-me',"checked='checked'",$expire);
    }

} //Controller ends here