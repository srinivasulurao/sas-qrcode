<?php
if ( ! defined('BASEPATH')){ exit('No direct script access allowed');}

class Web_Model extends CI_Model 
{
 function __construct() 
 {
        parent::__construct();
 }
 

//--------------------------------- Functions ---------------------------------//	

public function model_insertDevice()
{
	$result=array("isRegister"=>false);
	
	$deviceToken=str_replace(" ","",$_GET['deviceToken']);
	$deviceToken=str_replace("<","",$deviceToken);
	$deviceToken=str_replace(">","",$deviceToken);
	
	$deviceId=str_replace(" ","",$_GET['deviceId']);
	$deviceId=str_replace("<","",$deviceId);
	$deviceId=str_replace(">","",$deviceId);
	
	$qchl=$this->db->get_where('device_info',array('deviceToken'=>$deviceToken,'deviceId'=>$deviceId,"deviceType"=>$_GET['deviceType']));
	
	if($qchl->num_rows()>0){
			
		$result=array(
				"isRegister"=>true,
				"message"=>"Device Already registered",
				"record"=>$qchl->result_array()
			);
	
	}else{
		$info=array(
						'deviceToken'=>$deviceToken,
						'deviceId'=>$deviceId,
						'deviceType'=>$_GET['deviceType'],
						'isActive'=>'1',
						'createdDate'=>date('Y-m-d h:i:s'),
						'modifiedDate'=>date('Y-m-d h:i:s')
					);
		$query=$this->db->insert('device_info',$info);
		if($this->db->insert_id()){
			$recID=$this->db->insert_id();
			$query=$this->db->get_where('device_info',array('id'=>$recID));
			$result=array(
				"isRegister"=>true,
				"message"=>"Device registered successfully",
				"record"=>$query->result_array()
			);
			
			
		}
	}
	return $result;
	
}


//--------------------------------- SignIn/Register (Copied from Kuuzazz) ---------------------------------//
  //-------------- SignIn -------------------//
  public function SignIn_model()
  {
	$email='';
	if(isset($_GET['email']) && $_GET['email']!='')
	{
	  $email=$_GET['email'];	
	}
	$password='';
	if(isset($_GET['password']) && $_GET['password']!='')
	{
	  $password=$_GET['password'];	
	}
	
	  if($email!='' && $password!='')
	  {
		//$data=array('Email'=>$email,
		//			  'Password'=>$password
		//			  );
		//$query=$this->db->query("select * from Accounts where Email='$email' and Password='$password'");	
		//$query=$this->db->get_where('Accounts',$data); 
		$query=$this->db->query("select * from Accounts where (Email='$email' or ScreenName='$email') and BINARY Password='$password'");	
		 if($query->num_rows()>0)
		 {
		   $result=$query->row_array();
		 }
		 else
		 { $result=false;
		 }
	  }else
	  { $result=false;
	  }
	 return $result; 
  }
  
  //-------------- Forgetpassword -------------------//
  public function Forgetpassword_model()
  {
	$email='';
	if(isset($_REQUEST['email']) && $_REQUEST['email']!='')
	{
	  $email=$_REQUEST['email'];	
	}
	 if($email!='')
	 {
	   $this->db->where('Email',$email);
	   $query=$this->db->get('Accounts'); 
		 if($query->num_rows()>0)
		 {
		   $result=$query->row_array();
		   
		   $message="Your email has been sent:";
		   $message.=$result['Password']; 
		   $subject="Kuuzazz: Forget Password";	
		   $headers  = 'MIME-Version: 1.0' . "\r\n";
		   $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";		
		   $headers .='From:Admin <admin@kuuzazz.com>'. "\r\n";	
		   $emailsend=@mail($result['Email'],$subject,$message,$headers);
		   
		   $result=array("Success"=>true,"result"=>"Password has been sent.");
		 }
		 else
		 { $result=array("Success"=>false,"result"=>"Invalid Email ID !");
		 }
     }else
	 { $result=array("Success"=>false,"result"=>"Enter Your Email ID !");
	 }
	 return $result;
  }
  
  public function save_Password_byAccountID_Model()
  {
	$AccountID='';
	if(isset($_REQUEST['AccountID']) && $_REQUEST['AccountID']!='')
	{
		$AccountID=$_REQUEST['AccountID'];	
	}  
	$CurrentPassword='';
	if(isset($_REQUEST['CurrentPassword']) && $_REQUEST['CurrentPassword']!='')
	{
		$CurrentPassword=$_REQUEST['CurrentPassword'];	
	}  
	$NewPassword='';
	if(isset($_REQUEST['NewPassword']) && $_REQUEST['NewPassword']!='')
	{
		$NewPassword=$_REQUEST['NewPassword'];	
	}  
	
	if($AccountID!='')
	{
		
		// check if exists then run update
		$query=$this->db->query("SELECT * FROM Accounts WHERE ID = ".$AccountID." AND Password = '".$CurrentPassword."' ");
	   if($query->num_rows()>0)
	   {
			$data=array('Password'=>$NewPassword);
			$this->db->where('ID', $AccountID);
			$this->db->update('Accounts',$data);
			if($this->db->affected_rows() > 0)
			{ 
				$result=array("Success"=>true,"Result"=>$this->db->affected_rows());
			}
			else
			{ 
				$result=array("Success"=>false,"Result"=>"Update error");
			}
	  
		}
		else
		{ 
			$result=array("Success"=>false,"Result"=>"Current password may be incorrect, try again."); 
		}
	}
	else
	{
		$result=array("Success"=>false,"Result"=>"Some fields are blank"); 
	}
    return $result;
  }
  
  // -------- Save Device Token ----------
  public function save_Device_Model()
{
	
	$AccountID='';
	if(isset($_REQUEST['AccountID']) && $_REQUEST['AccountID']!='')
	{
	$AccountID=$_REQUEST['AccountID'];	
	}  
	$deviceToken='';
	if(isset($_REQUEST['deviceToken']) && $_REQUEST['deviceToken']!='')
	{
	$deviceToken=$_REQUEST['deviceToken'];	
	}  
	$deviceId='';
	if(isset($_REQUEST['deviceId']) && $_REQUEST['deviceId']!='')
	{
	$deviceId=$_REQUEST['deviceId'];	
	}  
	$deviceType='';
	if(isset($_REQUEST['deviceType']) && $_REQUEST['deviceType']!='')
	{
	$deviceType=$_REQUEST['deviceType'];	
	}  
	
	if($AccountID!='' &&  $deviceToken!='' &&  $deviceType!='')
	{ 
		// check if exists then run update
		$query=$this->db->query("SELECT * FROM Account_Devices WHERE AccountID = ".$AccountID." AND deviceToken = '".$deviceToken."' ");
	   if($query->num_rows()>0)
	   {
			$result=array("Success"=>true,"Result"=>"Device Already Registered"); 
	   }
	   else
	   {
			$info=array(
						'AccountID'=>$AccountID,
						'deviceToken'=>$deviceToken,
						'deviceId'=>$deviceId,
						'deviceType'=>$deviceType,
						'isActive'=>'1',
						'createdDate'=>date('Y-m-d h:i:s'),
						'modifiedDate'=>date('Y-m-d h:i:s')
					);
			$query=$this->db->insert('Account_Devices',$info);
			if($this->db->insert_id())
			{ 
				$result=array("Success"=>true,"Result"=>$this->db->insert_id());
			}
			else
			{ 
				$result=array("Success"=>false,"Result"=>"Insert error");
			}
		}
	}
	else
	{ 
		$result=array("Success"=>false,"Result"=>"Some fields are blank"); 
	}
    return $result;
}
  
  
   //--------------- Convert HexaDecimal To Image -----------------//
  public function HexaDecimalToImage($haxaString)
 {			
	$destFolderName="./uploads/images";			
	$destFileName = $destFolderName."/".uniqid() . '.png';			
	$hex =  preg_replace('/[\s\W]+/','',$haxaString);
	$binary = @pack("H*", $hex);
	$success = file_put_contents($destFileName, $binary);
	//if($success===false){
	//	@unlink($destFileName);
	//	return false;
	//}else{
	//	return $destFileName;
	//}	
	if($success===false){
		@unlink($destFileName);
		return false;
	}else{
		$fullImageURL = str_replace('./uploads/', 'http://appddictionstudio.biz/kuuzazz/uploads/', $destFileName);
		return $fullImageURL;
		//return $destFileName;
	}	
  
 }
 
 //-------------- SignUp -------------------//
  public function SignUp_model()
  {
  
		if(isset($_POST) && $_POST!='')
		{
			$FirstName 	= $_POST['FirstName'];
			$LastName 	= $_POST['LastName'];
			$ScreenName = $_POST['ScreenName'];
			$About		= $_POST['About'];
			$Email 		= $_POST['Email'];
			$Password 	= $_POST['Password'];
			$DOB 		= $_POST['DOB'];
			
			 
			$ShippingZip='';
			if(isset($_REQUEST['ShippingZip']) && $_REQUEST['ShippingZip']!='')
			{
			$ShippingZip=$_REQUEST['ShippingZip'];	
			}  
			
			//$data=array('Email'=>$Email,'Password'=>$Password);
			/*$data=array('Email'=>$Email);
			$query=$this->db->get_where('Accounts',$data); */
			$this->db->where("(Email='$Email' OR ScreenName='$ScreenName' )", NULL, FALSE);
			$query = $this->db->get('Accounts');
			
			if($query->num_rows()<1)
			{
				
				$data5=array('ScreenName'=>$ScreenName);
				$query5=$this->db->get_where('Accounts',$data);
			
				if($query5->num_rows()<1)
				{
					$r1='/[A-Z]/';  //Uppercase
					$r2='/[a-z]/';  //lowercase
					$r3='/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
					$r4='/[0-9]/';  //numbers

					if(!preg_match($r1,$Password))
					{
						$result=array("Success"=>false,"Result"=>"Password does not meet uppercase requirements !");
					}
					else if(!preg_match($r2,$Password))
					{
						$result=array("Success"=>false,"Result"=>"Password does not meet lowercase requirements !");
					}
					//else if(preg_match_all($r3,$Password, $o)<2) 
					//{
					//	$result=array("Success"=>false,"Result"=>"Password does not meet requirements !");
					//}
					else if(!preg_match($r4,$Password))
					{
						$result=array("Success"=>false,"Result"=>"Password does not meet numeric requirements !");
					}
					else if(strlen($Password)<8)
					{
						$result=array("Success"=>false,"Result"=>"Password does not meet length requirements !");
					}
					else
					{
						
						$User_image_URL='';
						
						//$itemarray = stripslashes($_REQUEST['image']);
		
						// converts the string into an Associative array
						//$arr = json_decode($itemarray, true);
						
						//foreach($arr['image'] as $item)
						
						//foreach($_REQUEST['image'] as $item) //foreach element in $arr
						//foreach($arr['heximage'] as $item)
						//{
						//
						//	if(isset($item) && $item!='')
						//	{
						//		$image=$this->HexaDecimalToImage_saveItem($item);
						//		if($image!=false){
						//			$User_image_URL=$image;
						//		   }	
						//	}
						//}
				
						//if(isset($_REQUEST['image']) && $_REQUEST['image']!='')
						//{
						//	$image=$this->HexaDecimalToImage_saveItem($_REQUEST['image']);
						//	if($image!=false){
						//		$User_image_URL=$image;
						//	}	
						//}
			
						$info=array(
							'FirstName'=>$FirstName,
							'LastName'=>$LastName,
							'ScreenName'=>$ScreenName,
							'About'=>$About,
							'Email'=>$Email,
							'Password'=>$Password,
							'DOB'=>$DOB,
							'User_image_URL'=>$User_image_URL,
							// 'ShippingAddress1'=>$ShippingAddress1,
// 							'ShippingAddress2'=>$ShippingAddress2,
// 							'ShippingCity'=>$ShippingCity,
// 							'ShippingState'=>$ShippingState,
// 							'ShippingZip'=>$ShippingZip
						);
													
						$query=$this->db->insert('Accounts',$info);
						
						if($this->db->insert_id())
						{ 
							
							$query=$this->db->query("SELECT * FROM Accounts where id=".$this->db->insert_id());
							$datas=$query->result_array(); 
							$result=array("Success"=>true,"Result"=>$datas);
						}
						else
						{ 
							$result=array("Success"=>false,"Result"=>"Insert error");
						}
						
					}
				
				} else {
				$result=array("Success"=>false,"Result"=>"Screen Name already exists");
				}
				
			} else {
				$result=array("Success"=>false,"Result"=>"Email already exists");
			}
			
		} else {
			$result=array("Success"=>false,"Result"=>"No Data");
		}
		
		return $result;
  }
  
  public function save_AccountInfo_byAccountID_Model()
  {
	$AccountID='';
	if(isset($_REQUEST['AccountID']) && $_REQUEST['AccountID']!='')
	{
		$AccountID=$_REQUEST['AccountID'];	
	}  
	$FirstName='';
	if(isset($_REQUEST['FirstName']) && $_REQUEST['FirstName']!='')
	{
		$FirstName=$_REQUEST['FirstName'];	
	}  
	$LastName='';
	if(isset($_REQUEST['LastName']) && $_REQUEST['LastName']!='')
	{
		$LastName=$_REQUEST['LastName'];	
	}  
	$Email='';
	if(isset($_REQUEST['Email']) && $_REQUEST['Email']!='')
	{
		$Email=$_REQUEST['Email'];	
	}  
	$About='';
	if(isset($_REQUEST['About']) && $_REQUEST['About']!='')
	{
		$About=$_REQUEST['About'];	
	}  
	$DOB='';
	if(isset($_REQUEST['DOB']) && $_REQUEST['DOB']!='')
	{
		$DOB=$_REQUEST['DOB'];	
	}  
	
	if($AccountID!='')
	{
		
		
		$query1=$this->db->query("SELECT * FROM Accounts WHERE ID != ".$AccountID." AND Email = '".$Email."' ");	
		
		if($query1->num_rows()<1)
		{
			
			
	
			// check if exists then run update
			$query=$this->db->query("SELECT * FROM Accounts WHERE ID = ".$AccountID." ");
		   if($query->num_rows()>0)
		   {
				$data=array('FirstName'=>$FirstName,
						  'LastName'=>$LastName,
						  'Email'=>$Email,
						  'About'=>$About,
						  'DOB'=>$DOB);
				$this->db->where('ID', $AccountID);
				$this->db->update('Accounts',$data);
				if($this->db->affected_rows() > 0)
				{ 
					$result=array("Success"=>true,"Result"=>$this->db->affected_rows());
				}
				else
				{ 
					$query1=$this->db->query("SELECT * FROM Accounts WHERE ID = ".$AccountID."  ");
					if($query1->num_rows()>0)
					{
						$result=array("Success"=>true,"Result"=>"'".$query1->result_array()."'");
					}
					else
					{ 
						$result=array("Success"=>false,"Result"=>"Update error");
					}
				}
		  
			}
			else
			{ 
				$result=array("Success"=>false,"Result"=>"Some fields are blank"); 
			}
	
	
	
		} 
		else 
		{
			$result=array("Success"=>false,"Result"=>"Email already exists");
		}
		
		
		
		
	}
	else
	{
		$result=array("Success"=>false,"Result"=>"Some fields are blank"); 
	}
    return $result;
  }
  
  public function get_AccountInfo_byAccountID_Model()
	{
		$AccountID='';
		if(isset($_REQUEST['AccountID']) && $_REQUEST['AccountID']!='')
		{
			$AccountID=$_REQUEST['AccountID'];	
		}  

		if($AccountID!='')
		{ 
			$query=$this->db->query("SELECT ScreenName, FirstName, LastName, Email, About, DOB, User_image_URL FROM Accounts WHERE ID = ".$AccountID."  ");
			if($query->num_rows()>0)
			{
				$result=$query->result_array(); 
			}
			else
			{ 
				$result=false; 
			}
		}
		else
		{
			$result=false;
			//$result=array("Success"=>false,"Result"=>"Some fields are blank"); 
		}
		return $result;
	}
	
  
  
	
  

  //--------------- Account_setup -----------------//
  public function Account_setup_model()
  {
   $Email='';
	if(isset($_REQUEST['Email']) && $_REQUEST['Email']!='')
	{
	  $Email=$_REQUEST['Email'];	
	}
   $Password='';
	if(isset($_REQUEST['Password']) && $_REQUEST['Password']!='')
	{
	  $Password=$_REQUEST['Password'];	
	}
	$FirstName='';
	if(isset($_REQUEST['FirstName']) && $_REQUEST['FirstName']!='')
	{
	  $FirstName=$_REQUEST['FirstName'];	
	}
	$LastName='';
	if(isset($_REQUEST['LastName']) && $_REQUEST['LastName']!='')
	{
	  $LastName=$_REQUEST['LastName'];	
	}
	$ScreenName='';
	if(isset($_REQUEST['ScreenName']) && $_REQUEST['ScreenName']!='')
	{
	  $ScreenName=$_REQUEST['ScreenName'];	
	}
	$DOB='';
	if(isset($_REQUEST['DOB']) && $_REQUEST['DOB']!='')
	{
	  $DOB=$_REQUEST['DOB'];	
	}
	
	$User_image_URL='';
	if(isset($_REQUEST['image']) && $_REQUEST['image']!='')
	{
		$image=$this->HexaDecimalToImage($_REQUEST['image']);
		if($image!=false){
			$User_image_URL=$image;
		   }	
	}
	 if($Email!='' &&  $Password!='' && $FirstName!='' && $LastName!='' && $ScreenName!='')
	 {
		$r1='/[A-Z]/';  //Uppercase
		$r2='/[a-z]/';  //lowercase
		$r3='/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
		$r4='/[0-9]/';  //numbers

		if(!preg_match($r1,$Password))
		{
			$result=array("Success"=>false,"Result"=>"Password does not meet uppercase requirements !");
		}
		else if(!preg_match($r2,$Password))
		{
			$result=array("Success"=>false,"Result"=>"Password does not meet lowercase requirements !");
		}
		//else if(preg_match_all($r3,$Password, $o)<2) 
		//{
		//	$result=array("Success"=>false,"Result"=>"Password does not meet requirements !");
		//}
		else if(!preg_match($r4,$Password))
		{
			$result=array("Success"=>false,"Result"=>"Password does not meet numeric requirements !");
		}
		else if(strlen($Password)<8)
		{
			$result=array("Success"=>false,"Result"=>"Password does not meet length requirements !");
		}
		else
		{
			// check if  values exist
			$query1=$this->db->query("SELECT * FROM Accounts WHERE Email = ".$Email." ");
			if($query1->num_rows()>0)
			{
				$result=array("Success"=>false,"Result"=>"Email already exists !"); 
			}
			else
			{			
				$query2=$this->db->query("SELECT * FROM Accounts WHERE ScreenName = ".$ScreenName." ");
				if($query2->num_rows()>0)
				{
					$result=array("Success"=>false,"Result"=>"Screen Name already exists !"); 
				}
				else
				{
					$data=array('Email'=>$Email,
								'Password'=>$Password,
								'FirstName'=>$FirstName,
								'LastName'=>$LastName,
								'ScreenName'=>$ScreenName,
								'DOB'=>$DOB,
								'User_image_URL'=>$User_image_URL
								);
					$this->db->insert('Accounts',$data);
					if($this->db->insert_id())
					{ $result=array("Success"=>true,"Result"=>$this->db->insert_id());
					}
					else
					{ $result=array("Success"=>false,"Result"=>"Data do not insert !");
					}
				}
			}
		}
		
	 }
	 else
	 { $result=array("Success"=>false,"Result"=>"Some field are blank !"); 
	 }
	 return $result;
  }
  







//--------------------------------- Other Functions---------------------------------------
    public function getSplashScreens(){

        $result=$this->db->query("SELECT *,dt.id as dt_id,dr.id as dr_id FROM splashscreens as s INNER JOIN device_type as dt ON s.deviceType=dt.id INNER JOIN device_resolutions as dr ON s.deviceResolution=dr.id");
        return $result->result_array();
    }

    public function getContacts(){
        $result=$this->db->query('select contacts.*,campus.ID as campus_id, campus.Name as campus_name from contacts LEFT JOIN campus ON contacts.Campus=campus.ID');
        return $result->result_array();
    }

    public function getFacultyDirectoryList(){

        $result=$this->db->query('SELECT fd.*,c.Name as campus_name, c.ID as campus_id from facultydirectory as fd INNER JOIN campus as c ON fd.Campus=c.ID');
        return $result->result_array();
    }



function getHomeScreen()
{
	$this->db->order_by("SortOrder", "asc"); 
	$query = $this->db->get("apps_homescreens");
	if($query->num_rows>0)
	return $query->result_array();
}


function getCampusMaps()
{
	$result=$this->db->query('SELECT cp.*, c.Name as Campus_Name FROM campus_maps cp JOIN campus c on cp.campus_id = c.ID');
        return $result->result_array();
	}


function getEvents()
{
	$query = $this->db->get("events");
	if($query->num_rows>0)
	return $query->result_array();
	}


function getResources()
{
	$query = $this->db->get("resources");
	if($query->num_rows>0)
	return $query->result_array();
	}

function getSocialMedia()
{
	$query = $this->db->get("socialmedia");
	if($query->num_rows>0)
	return $query->result_array();
	}

function getMentalHealth()
{
	$query = $this->db->get("mentalhealth");
	if($query->num_rows>0)
	return $query->result_array();
	}


function getLoginScreen()
{
	$this->db->order_by("ID", "desc"); 
	$query = $this->db->get("Accounts");
	if($query->num_rows>0)
	return $query->result_array();
}

function getPrograms()
{
	$this->db->order_by("Title", "asc"); 
	$query = $this->db->get("Programs");
	if($query->num_rows>0)
	return $query->result_array();
}




//-----------------------------
public function hello()
{
	return "this is new webservice for Texas Tech App";
}
public function setFolderNameForReport($StdID)
{
	$this->db->where('id',$StdID);	
	$query=$this->db->get("student");	
	if($query->num_rows()>0){
		$res=$query->row_array();
		$folderName = $res['first_name']." ".$res['last_name'];
		if($res['first_name']!="" && $res['last_name']!="" && $res['campus_id']!=""){
			$arr1 = str_split($res['first_name']);
			$arr2 = str_replace(" ","",$res['last_name']);
			$arr3 = $res['campus_id'];
			$folderName = $arr1[0].$arr2.$arr3;
		}else{
			$folderName = "Std".$StdID;
		}
		
	}else{
		$folderName = uniqid();
	}
return $folderName;
}

  public function save_signup_create_account()
  {

	$Username='';
	if(isset($_REQUEST['Username']) && $_REQUEST['Username']!='')
	{
		$Username=$_REQUEST['Username'];	
	} 
	
	$Password='';
	if(isset($_REQUEST['Password']) && $_REQUEST['Password']!='')
	{
		$Password=$_REQUEST['Password'];	
	} 	

	$FirstName='';
	if(isset($_REQUEST['FirstName']) && $_REQUEST['FirstName']!='')
	{
		$FirstName=$_REQUEST['FirstName'];	
	}  
	$LastName='';
	if(isset($_REQUEST['LastName']) && $_REQUEST['LastName']!='')
	{
		$LastName=$_REQUEST['LastName'];	
	}  
	$Email='';
	if(isset($_REQUEST['Email']) && $_REQUEST['Email']!='')
	{
		$Email=$_REQUEST['Email'];	
	}  
	$RN_No='';
	if(isset($_REQUEST['RN_No']) && $_REQUEST['RN_No']!='')
	{
		$RN_No=$_REQUEST['RN_No'];	
	}  
	$status_id='';
	if(isset($_REQUEST['status_id']) && $_REQUEST['status_id']!='')
	{
		$status_id=$_REQUEST['status_id'];	
	} 
	
	$Program='';
	if(isset($_REQUEST['Program']) && $_REQUEST['Program']!='')
	{
		$Program=$_REQUEST['Program'];	
	} 
	
	$Graduation_Date='';
	if(isset($_REQUEST['Graduation_Date']) && $_REQUEST['Graduation_Date']!='')
	{
		$Graduation_Date=$_REQUEST['Graduation_Date'];	
	}
	
	$Graduation_Month='';
	if(isset($_REQUEST['Graduation_Month']) && $_REQUEST['Graduation_Month']!='')
	{
		$Graduation_Month=$_REQUEST['Graduation_Month'];	
	} 
	
	$Graduation_Year='';
	if(isset($_REQUEST['Graduation_Year']) && $_REQUEST['Graduation_Year']!='')
	{
		$Graduation_Year=$_REQUEST['Graduation_Year'];	
	} 
	
	$login_id='';
	if(isset($_REQUEST['login_id']) && $_REQUEST['login_id']!='')
	{
		$login_id=$_REQUEST['login_id'];	
	} 				 			 
	
	if(!empty($FirstName) && !empty($Username) && !empty($Email))
	{
	
	if(empty($login_id)){
			// check if exists then run update
			$query=$this->db->query("SELECT * FROM Accounts WHERE Email = '".$Email."' or ScreenName = '".$ScreenName."' ");
		   if($query->num_rows()>0)
		   {
		   		$result=array("Success"=>false,"Result"=>"Email or UserName already exists");
		   }else{
			$info=array(
						'ScreenName'=>$Username,
						'Password'=>$Password,
						'FirstName'=>$FirstName,
						  'LastName'=>$LastName,
						  'Email'=>$Email,
						  'RN_No'=>$RN_No,
						  'status_id'=>$status_id,
						  'Program'=>$Program,
						  'Graduation_Date'=>$Graduation_Date,
						  'Graduation_Month'=>$Graduation_Month,
						  'Graduation_Year'=>$Graduation_Year				  
						  );
					$query=$this->db->insert('Accounts',$info);
					if($this->db->insert_id())
					{ 
						$insert_id = $this->db->insert_id();
						$result=array("Success"=>true,"Result"=>$insert_id);
                        
                        // also save the device data over here.
                        $info=array(
						'AccountID'=>$insert_id,
						'deviceToken'=>$_REQUEST['DeviceToken'],
						'deviceId'=>$_REQUEST['DeviceID'],
						'deviceType'=>$_REQUEST['DeviceType'],
						'isActive'=>'1',
						'createdDate'=>date('Y-m-d h:i:s'),
						'modifiedDate'=>date('Y-m-d h:i:s'),
                        'GUID'=>$_REQUEST['GUID']
					);
                        
			        $query=$this->db->insert('Account_Devices',$info);
                        //Device GUID saved till here.
                        
						$query=$this->db->query("SELECT * FROM Accounts WHERE ID = ".$insert_id." ");
						   if($query->num_rows()>0){
								if(isset($_REQUEST['User_photo']) && !empty($_REQUEST['User_photo'])){
									$User_photo_name = ($_REQUEST['User_photo']);
									//$query=$this->db->query("update Accounts set User_image_URL='".$User_photo_name."'  WHERE ID = '".$insert_id."' "); 
										$info=array('User_image_URL'=>$User_photo_name);															
										$this->db->where('ID', $insert_id);
										$this->db->update('Accounts',$info);									
								}				   		
						   		
						   }	
					}
					else
					{ 
						$result=array("Success"=>false,"Result"=>"Insert error");
					}
				}
			}else{
				$info=array('ScreenName'=>$Username,
							'FirstName'=>$FirstName,
						  'LastName'=>$LastName,
						  'Email'=>$Email,
						  'RN_No'=>$RN_No,
						  'status_id'=>$status_id,
						  'Program'=>$Program,
						  'Graduation_Date'=>$Graduation_Date,
						  'Graduation_Month'=>$Graduation_Month,
						  'Graduation_Year'=>$Graduation_Year				  
						  );
				
				$this->db->trans_start();		  				
				$this->db->where('ID', $login_id);
				$this->db->update('Accounts',$info);
				$this->db->trans_complete();
				if($this->db->trans_status() === FALSE)
				{ 
					$result=array("Success"=>false,"Result"=>"Update error");
				}
				else
				{ 		
					$result=array("Success"=>true,"Result"=>$this->db->affected_rows());
					if(isset($_REQUEST['User_photo']) && !empty($_REQUEST['User_photo'])){
						$User_photo_name = ($_REQUEST['User_photo']);
						//$query=$this->db->query("update Accounts set User_image_URL='".$User_photo_name."'  WHERE ID = '".$login_id."' "); 
						
							$info=array('User_image_URL'=>$User_photo_name);															
							$this->db->where('ID', $login_id);
							$this->db->update('Accounts',$info);									
					}
					
					if(isset($_REQUEST['Password']) && !empty($_REQUEST['Password'])){
							$Password = ($_REQUEST['Password']);
							$info=array('Password'=>$Password);															
							$this->db->where('ID', $login_id);
							$this->db->update('Accounts',$info);									
					}											
				}			
			}
						   
	
		} 
		else 
		{
			$result=array("Success"=>false,"Result"=>"Some fields are blank"); 
		}
		
		return $result;

  }
  
     public function get_status_types(){
        $result=$this->db->get('status_types');
        return $result->result_array();
    }
	
     public function get_status_types_by_id(){
        $result=$this->db->get('status_types');
		$data = array();
        $result_array =  $result->result_array();
		if($result_array>0){
			foreach($result_array as $types){
				$data[$types['status_id']] = $types['status_type'];
			}
		}
		
		return $data;
    }	
	 
  
    public function get_profile_details(){
		$_REQUEST['login_id'] = $_GET['login_id']?$_GET['login_id']:$_POST['login_id'];
		$login_id=$_REQUEST['login_id'];	
		$result=$this->db->query("SELECT A.*, st.status_type as status_type FROM Accounts as A Left JOIN status_types as st ON A.status_id=st.status_id where ID='".$login_id."'");
        return $result->result_array();
    }  
	
	public function upload_user_image(){
		$randnumber = rand();
		if(isset($_FILES['User_photo']['tmp_name']) && !empty($_FILES['User_photo']['tmp_name'])){
			$upload2="uploads/users/".$randnumber.$_FILES['User_photo']['name'];
			
			if (move_uploaded_file($_FILES['User_photo']['tmp_name'], FCPATH.$upload2)) { 
				$update['User_photo']=$upload2;
				$result=array("Success"=>true,"Result"=>$upload2);
			}else{
				$result=array("Success"=>false,"Result"=>"Upload error");
			}
		}else{
				$result=array("Success"=>false,"Result"=>"File is empty");
			}	
			
			return $result;
    } 
	
 public function save_UserDevice_Model()
{
	
	$login_id='';
	if(isset($_REQUEST['login_id']) && $_REQUEST['login_id']!='')
	{
	$login_id=$_REQUEST['login_id'];	
	}  
	$deviceToken='';
	if(isset($_REQUEST['deviceToken']) && $_REQUEST['deviceToken']!='')
	{
	$deviceToken=$_REQUEST['deviceToken'];	
	}  
	$deviceId='';
	if(isset($_REQUEST['deviceId']) && $_REQUEST['deviceId']!='')
	{
	$deviceId=$_REQUEST['deviceId'];	
	}  
	$deviceType='';
	if(isset($_REQUEST['deviceType']) && $_REQUEST['deviceType']!='')
	{
	$deviceType=$_REQUEST['deviceType'];	
	}  
	
	if($login_id!='' &&  $deviceToken!='' &&  $deviceType!='')
	{ 
		// check if exists then run update
		$query=$this->db->query("SELECT * FROM Account_Devices WHERE AccountID = ".$login_id." AND deviceToken = '".$deviceToken."' ");
	   if($query->num_rows()>0)
	   {
			$result=array("Success"=>true,"Result"=>"Device Already Registered"); 
	   }
	   else
	   {
			$info=array(
						'AccountID'=>$login_id,
						'deviceToken'=>$deviceToken,
						'deviceId'=>$deviceId,
						'deviceType'=>$deviceType,
						'isActive'=>'1',
						'createdDate'=>date('Y-m-d h:i:s'),
						'modifiedDate'=>date('Y-m-d h:i:s'),
                        'GUID'=>$_REQUEST['GUID']
					);
			$query=$this->db->insert('Account_Devices',$info);
			if($this->db->insert_id())
			{ 
				$result=array("Success"=>true,"Result"=>$this->db->insert_id());
			}
			else
			{ 
				$result=array("Success"=>false,"Result"=>"Insert error");
			}
		}
	}
	else
	{ 
		$result=array("Success"=>false,"Result"=>"Some fields are blank"); 
	}
    return $result;
}	

public function savePushMsg($userId,$message,$pushFor,$pushId,$time)
{
	if(!empty($userId)){
		$data=array(
					'pushMessage'=>$message,
					'userId'=>$userId,
					'pushFor'=>$pushFor,
					'pushId'=>$pushId,
					'createDate'=>date('Y-m-d h:i:s'),
					'timer'=>$time
			);
		$query=$this->db->insert('push_messages',$data);
		if($this->db->insert_id())
		return true;
	}else{
		return false;
	}
}

public function getdeviceId($userId,$status_id,$pushId)
{


	$query ="SELECT  AD.deviceToken, AD.deviceId, AD.deviceType from Account_Devices AD
	left join Accounts A on A.ID= AD.AccountID  
	 where A.ID= AD.AccountID and A.Active=1";
	 if(!empty($status_id)){
		$query .= " and A.status_id = '".$status_id."'  ";
	 }else if(!empty($pushId)){
		$query .= " and A.ID = '".$pushId."'  ";
	 }	 
 
	 $query=$this->db->query($query);

	if($query->num_rows()>0)
	return $query->result_array();

}

//This is used to send push notification to IOS
public function sendpush($dvtoken,$message)
{
	$fk_device=0;
	$urltopost = "http://appddiction.org/safetyplus2/simple.php";
	$datatopost = array(
							"tocken"=>trim($dvtoken),
							"msg" =>$message
						);
	$ch = curl_init ($urltopost);
	curl_setopt ($ch, CURLOPT_POST, true);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $datatopost);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$returndata = curl_exec ($ch);
	if($returndata==1) 
	return $returndata; 
	curl_close($ch);
}

//This is used to send push notification to andriod
function sendpush_andriod($registatoin_ids, $message) {
    //Google cloud messaging GCM-API url
    $url = 'https://android.googleapis.com/gcm/send';
    $fields = array(
        'registration_ids' => $registatoin_ids,
        'data' => $message,
    );
    // Google Cloud Messaging GCM API Key    
    $headers = array(
        'Authorization: key=AIzaSyCL-j6565kqRNUxz0oT97s6OlDBjN3rTE0',
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);             
    if ($result === FALSE) {
        die('Curl failed: ' . curl_error($ch));
    }
    curl_close($ch);
  
}


 public function getGUIDByDeviceParams_Model($deviceId,$deviceToken,$deviceType){
	 if($deviceType and $deviceId and $deviceToken) {
		 $sql = "SELECT * FROM Account_Devices where deviceToken='$deviceToken' AND deviceId='$deviceId' AND deviceType='$deviceType'";
		 $result = $this->db->query($sql);
		 return $result->result_array();
	 }
	 else
		 return false;
 }

	public function getUserDetailsFromGUID_Model($guid){

		if($guid) {
			$sql = "SELECT A.* FROM Account_Devices as AD INNER JOIN Accounts as A ON A.ID=AD.AccountID where AD.GUID='$guid'";
			$result = $this->db->query($sql);
			return $result->result_array();
		}
		else
			return false;

	}
    
    public function saveEventSurveyDataByQrCode_Model(){
        error_reporting(~E_NOTICE);
        
        $event_id=$_REQUEST['EventID'];
        $guid=$_REQUEST['GUID'];
        $userData=$this->db->query("select * from Accounts as a INNER JOIN Account_Devices as ad ON a.ID=ad.AccountID WHERE ad.GUID='$guid'");
        $userDetails=$userData->result_array();
        $user=$userDetails[0];
        
        $event_survey_data=array();
        $seasonArray=array(1=>'spring',2=>'summer',3=>'fall');    
        
        if($user['FirstName']){
        $event_survey_data['first_name']=$user['FirstName'];
        $event_survey_data['last_name']=$user['LastName'];
        $event_survey_data['email']=$user['Email'];
        $event_survey_data['role']=$user['status_id'];
        $event_survey_data['event_id']=$event_id;
        $event_survey_data['program']=$user['Program'];
        $event_survey_data['graduation_mm']=$seasonArray[$user['Graduation_Month']];
        $event_survey_data['graduation_yy']=$user['Graduation_Year'];
        $event_survey_data['GUID']=$guid;    
        return $this->db->insert('eventsurveydata',$event_survey_data); // it will return 1, if success.
        }
        else{
            return 0;
        }
    }
	

//---------End of model-----------//
}
?>