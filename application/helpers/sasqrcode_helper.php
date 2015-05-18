<?php
// All set of widely used functions to be kept here.

function helloHelper(){
    echo "balle balle";

}

function getDashboardHeaderLinks(){

    $links=array();
     $links['Family']="admin/family";
     $links['Family Members']="admin/family_members";
     $links['Locations']="admin/locations";
     $links['Family Checkins']="admin/family_checkins";
     $links['Post Survey']="admin/post_survey";
     $links['Pre Survey']="admin/pre_survey";


        return $links;
}

function getMenuImages(){

    $images=array();
    $images['Family']="splash-screen.png";
    $images['Family']="home-screen.png";
    $images['Family Members']="contacts.png";
    $images['Locations']="campus-map.png";
    $images['Faculty Directory']="contacts.png";
    $images['Family Checkins']="events.png";
    $images['Post Survey']="resources.png";
    $images['Pre Survey']="resources.png";
	

    return $images;
}

function userLoginName($session){
    return $session['firstName']." ".$session['lastName'];
}


function debug($arrayObject){
    echo "<pre>";
    print_r($arrayObject);
    echo"</pre>";
}


function getFamilyMembersName($family_id){
    $CI =& get_instance();
    $result=$CI->db->query("SELECT Name FROM Family_Members WHERE FamilyID='$family_id'");
    $names=array();
    foreach($result->result_array() as $key):
    $names[]=$key['Name'];
    endforeach;
    return implode(", ",$names);
}


function getFamilyMembersById($memberString){

    $memberArray=explode(",",$memberString);
    $names=array();
    foreach($memberArray as $id):
    $CI =& get_instance();
    $result=$CI->db->query("SELECT Name FROM Family_Members WHERE ID='$id'");
    $member=$result->result_array();
    $names[]=$member[0]['Name'];
    endforeach;
    return implode(", ",$names);

}


function getTotalCheckinsBetweenDate($date_from,$date_till,$family_id){

    $CI =& get_instance();
    $sql="SELECT * FROM Family_CheckIns WHERE FamilyID =  '$family_id' AND DATE >=  '$date_from' AND DATE <=  '$date_till'";
    $result=$CI->db->query($sql);
    return sizeof($result->result_array());
}
?>