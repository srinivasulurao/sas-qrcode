<?php
$this->load->view('common/header');
?>
<?php
//debug($result);
?>
<a href="javascript:void(0)" style='float:right' class="btn btn-primary" onclick="window.history.back();">Back</a>
<div style="clear: both"></div>
<div style="padding-left:15%;margin-bottom: 20px">

<form method="post" action="">
<div class="col-md-5">
<label>First Name</label>
    <input type="text" name="first_name" value="<?php echo $result['first_name']; ?>" class="form-control">
<label>First Name (Mother)</label>
<input type="text" name="first_name_mother" value="<?php echo $result['first_name_mother']; ?>" class="form-control">

<label>First Name (Father)</label>
<input type="text" name="first_name_father" value="<?php echo $result['first_name_father']; ?>" class="form-control">

<label>Gender (Mother)</label>
<select class="form-control" name="gender_mother">
    <option value="">-SELECT--</option>
    <option value="male" <?php echo ($result['gender_mother']=='male')?"selected='selected'":""; ?>>Male</option>
    <option value="female" <?php echo ($result['gender_mother']=='female')?"selected='selected'":""; ?>>Female</option>
</select>

<label>Address</label>
<input type="text" name="address" value="<?php echo $result['address']; ?>" class="form-control">

<label>Home Phone</label>
<input type="text" name="home_phone" value="<?php echo $result['home_phone']; ?>" class="form-control">

    <label>Email Address</label>
    <input type="text" name="email_address" value="<?php echo $result['email_address']; ?>" class="form-control">

    <label>Date of Birth</label>
    <input type="text" name="dob" value="<?php echo $result['dob']; ?>" class="form-control">

    <label>Ethinicity</label>
    <select class="form-control" name="ethinicity">
    <option value="">-SELECT--</option>
    <option value="hispanic" <?php echo ($result['ethinicity']=='hispanic')?"selected='selected'":""; ?>>Hispanic</option>
    <option value="non-hispanic" <?php echo ($result['ethinicity']=='non-hispanic')?"selected='selected'":""; ?>>Non-Hispanic</option>
    </select>

    <label>Race</label>
    <select class="form-control" name="race">
        <option value="">-SELECT--</option>
        <option value="white" <?php echo ($result['race']=='white')?"selected='selected'":""; ?>>White</option>
        <option value="black/african amer" <?php echo ($result['race']=='black/african amer')?"selected='selected'":""; ?>>Black/African Amer.</option>
        <option value="am indian/native" <?php echo ($result['race']=='am indian/native')?"selected='selected'":""; ?>>Am Indian/Native</option>
        <option value="asian/pac" <?php echo ($result['race']=='asian/pac')?"selected='selected'":""; ?>>Asian/Pac</option>
        <option value="islander" <?php echo ($result['race']=='islander')?"selected='selected'":""; ?>>Islander</option>
        <option value="multiple" <?php echo ($result['race']=='multiple')?"selected='selected'":""; ?>>Multiple</option>
        <option value="other" <?php echo ($result['race']=='other')?"selected='selected'":""; ?>>Other</option>
    </select>

    <label>Why do you come to the program?</label>
    <select class="form-control" name='why_do_you_come_to_the_program'>
        <option value="">-SELECT--</option>
        <option value="weight loss" <?php echo ($result['why_do_you_come_to_the_program']=='weight loss')?"selected='selected'":""; ?>>Weight Loss</option>
        <option value="spending time with family" <?php echo ($result['why_do_you_come_to_the_program']=='spending time with family')?"selected='selected'":""; ?>>Spending time with family</option>
        <option value="making friends" <?php echo ($result['why_do_you_come_to_the_program']=='making friends')?"selected='selected'":""; ?>>Making Friends</option>
    </select>


    <label>Addressing a medical need</label>
    <input type="text" name="addressing_a_medical_need" value="<?php echo $result['addressing_a_medical_need']; ?>" class="form-control">

    <label>Did you participate in Family Fitness for the Fall or Spring with Health Collaborative?</label>
    <select class="form-control" name="did_you_participate_in_family_fitness_for_the_fall_or_spring_with_health_collaborative">
        <option value="">-SELECT--</option>
        <option value="yes" <?php echo ($result['did_you_participate_in_family_fitness_for_the_fall_or_spring_with_health_collaborative']=='yes')?"selected='selected'":""; ?>>Yes</option>
        <option value="no" <?php echo ($result['did_you_participate_in_family_fitness_for_the_fall_or_spring_with_health_collaborative']=='no')?"selected='selected'":""; ?>>No</option>
    </select>

    <label>Did you participate in Fit Family Challenge with San Antonio Sports Summer 2013?</label>
    <select class="form-control" name="did_you_participate_in_fit_family_challenge_with_san_antonio_sports_summer_2013">
        <option value="">-SELECT--</option>
        <option value="yes" <?php echo ($result['did_you_participate_in_fit_family_challenge_with_san_antonio_sports_summer_2013']=='yes')?"selected='selected'":""; ?>>Yes</option>
        <option value="no" <?php echo ($result['did_you_participate_in_fit_family_challenge_with_san_antonio_sports_summer_2013']=='no')?"selected='selected'":""; ?>>No</option>
    </select>

    <label>Did you participate in San Antonio Sports iplay! afterschool program?</label>
    <select class="form-control" name="did_you_participate_in_san_antonio_sports_iplay_afterschool_program" >
        <option value="">-SELECT--</option>
        <option value="yes" <?php echo ($result['did_you_participate_in_san_antonio_sports_iplay_afterschool_program']=='yes')?"selected='selected'":""; ?>>Yes</option>
        <option value="no" <?php echo ($result['did_you_participate_in_san_antonio_sports_iplay_afterschool_program']=='no')?"selected='selected'":""; ?>>No</option>
    </select>

</div>

<div class="col-md-5">
    <label>Last Name</label>
    <input type="text" name="last_name" value="<?php echo $result['last_name']; ?>" class="form-control">

    <label>Last Name (Mother)</label>
    <input type="text" name="last_name_mother" value="<?php echo $result['last_name_mother']; ?>" class="form-control">

    <label>Last Name (Father)</label>
    <input type="text" name="last_name_mother" value="<?php echo $result['last_name_mother']; ?>" class="form-control">

    <label>Gender (Father)</label>
    <select class="form-control" name="gender_father">
        <option value="">-SELECT--</option>
        <option value="male" <?php echo ($result['gender_father']=='male')?"selected='selected'":""; ?>>Male</option>
        <option value="female" <?php echo ($result['gender_father']=='female')?"selected='selected'":""; ?>>Female</option>
    </select>

    <label>Zip Code</label>
    <input type="text" name="zip_code" value="<?php echo $result['zip_code']; ?>" class="form-control">

    <label>Cell Phone</label>
    <input type="text" name="cell_phone" value="<?php echo $result['cell_phone']; ?>" class="form-control">

    <label>Preferred Language</label>

    <select class="form-control" name="preferred_language">
        <option value="">-SELECT--</option>
        <option value="english" <?php echo ($result['preferred_language']=='english')?"selected='selected'":""; ?>>English</option>
        <option value="spanish" <?php echo ($result['preferred_language']=='spanish')?"selected='selected'":""; ?>>Spanish</option>
    </select>


    <label>Gender</label>
    <select class="form-control" name="gender">
        <option value="">-SELECT--</option>
        <option value="male" <?php echo ($result['gender']=='male')?"selected='selected'":""; ?>>Male</option>
        <option value="female" <?php echo ($result['gender']=='female')?"selected='selected'":""; ?>>Female</option>
    </select>

    <label>Military Status</label>

    <select class="form-control" name="military_status">
        <option value="">-SELECT--</option>
        <option value="active duty" <?php echo ($result['military_status']=='active duty')?"selected='selected'":""; ?>>Active Duty</option>
        <option value="reserves" <?php echo ($result['military_status']=='reserves')?"selected='selected'":""; ?>>Reserves</option>
        <option value="prior service" <?php echo ($result['military_status']=='prior service')?"selected='selected'":""; ?>>Prior Service</option>
        <option value="retired or veteran" <?php echo ($result['military_status']=='retired or veteran')?"selected='selected'":""; ?>>Retired or Veteran</option>
        <option value="non-military" <?php echo ($result['military_status']=='non-military')?"selected='selected'":""; ?>>Non-Military</option>

    </select>

    <label>Household Type</label>
    <select class="form-control" name="household_type">
        <option value="">-SELECT--</option>
        <option value="single person" <?php echo ($result['household_type']=='single person')?"selected='selected'":""; ?>>Single Person</option>
        <option value="single parent" <?php echo ($result['household_type']=='single parent')?"selected='selected'":""; ?>>Single Parent</option>
        <option value="two parent" <?php echo ($result['household_type']=='two parent')?"selected='selected'":""; ?>>Two Parent</option>
        <option value="other family" <?php echo ($result['household_type']=='other family')?"selected='selected'":""; ?>>Other Family</option>
        <option value="non-family" <?php echo ($result['household_type']=='non-family')?"selected='selected'":""; ?>>Non-Family</option>
    </select>

    <label>Household Income</label>
    <select class="form-control" name="household_income">
        <option value="">-SELECT--</option>
        <option value="0-$10,000" <?php echo ($result['household_income']=='0-$10,000')?"selected='selected'":""; ?>>0-$10,000</option>
        <option value="$10,001-$20,000" <?php echo ($result['household_income']=='$10,001-$20,000')?"selected='selected'":""; ?>>$10,001-$20,000</option>
        <option value="$20,001-$30,00" <?php echo ($result['household_income']=='$20,001-$30,00')?"selected='selected'":""; ?>>$20,001-$30,000</option>
        <option value="$30,001" <?php echo ($result['household_income']=='$30,001')?"selected='selected'":""; ?>>$30,001</option>
        <option value="more" <?php echo ($result['household_income']=='more')?"selected='selected'":""; ?>>More</option>
    </select>

    <label>How did you hear of this activity?</label>
    <select class="form-control" name="how_did_you_hear_of_this_activity">
        <option value="">-SELECT--</option>
        <option value="thc fitness nights" <?php echo ($result['how_did_you_hear_of_this_activity']=='thc fitness nights')?"selected='selected'":""; ?>>THC Fitness Nights</option>
        <option value="facebook" <?php echo ($result['how_did_you_hear_of_this_activity']=='facebook')?"selected='selected'":""; ?>>Facebook</option>
        <option value="website" <?php echo ($result['how_did_you_hear_of_this_activity']=='website')?"selected='selected'":""; ?>>Website</option>
        <option value="school reminder" <?php echo ($result['how_did_you_hear_of_this_activity']=='school reminder')?"selected='selected'":""; ?>>School Reminder</option>
        <option value="newspaper" <?php echo ($result['how_did_you_hear_of_this_activity']=='newspaper')?"selected='selected'":""; ?>>Newspaper</option>
        <option value="radio/tv" <?php echo ($result['how_did_you_hear_of_this_activity']=='radio/tv')?"selected='selected'":""; ?>>Radio/TV</option>

    </select>

    <label>How many people is the household?</label>
    <input type="text" name="how_many_people_is_the_household" value="<?php echo $result['how_many_people_is_the_household']; ?>" class="form-control">

    <label>How many children in each age group living in the household?</label>
    <select class="form-control" name="how_many_children_in_each_age_group_living_in_the_household">
        <option value="">-SELECT--</option>
         <option value="0-5 year old" <?php echo ($result['how_many_children_in_each_age_group_living_in_the_household']=='0-5 year old')?"selected='selected'":""; ?>>0-5 year old</option>
         <option value="6-10 years old" <?php echo ($result['how_many_children_in_each_age_group_living_in_the_household']=='6-10 years old')?"selected='selected'":""; ?>>6-10 years old</option>
         <option value="11-17 years old" <?php echo ($result['how_many_children_in_each_age_group_living_in_the_household']=='11-17 years old')?"selected='selected'":""; ?>>11-17 years old</option>
    </select>

    <label>Where do you your children attend school?</label>
    <select class="form-control" name="where_do_you_your_children_attend_school">
        <option value="">-SELECT--</option>
        <option value="eisd" <?php echo ($result['where_do_you_your_children_attend_school']=='eisd')?"selected='selected'":""; ?>>EISD</option>
        <option value="saisd" <?php echo ($result['where_do_you_your_children_attend_school']=='saisd')?"selected='selected'":""; ?>>SAISD</option>
        <option value="hisd" <?php echo ($result['where_do_you_your_children_attend_school']=='hisd')?"selected='selected'":""; ?>>HISD</option>
        <option value="nisd" <?php echo ($result['where_do_you_your_children_attend_school']=='nisd')?"selected='selected'":""; ?>>NISD</option>
        <option value="swisd southsan isd" <?php echo ($result['where_do_you_your_children_attend_school']=='swisd southsan isd')?"selected='selected'":""; ?>>SWISD  SouthSan ISD</option>
        <option value="southside isd" <?php echo ($result['where_do_you_your_children_attend_school']=='southside isd')?"selected='selected'":""; ?>>SouthSide ISD</option>
        <option value="other" <?php echo ($result['where_do_you_your_children_attend_school']=='other')?"selected='selected'":""; ?>>Other(charter, private, home school)</option>
    </select>


</div>

<div class="col-md-10">
    <h4>Family Member's Details</h4>
    <table class="table table-striped">
     <tr><th>First Name</th>
         <th>Last Name</th>
         <th>Birthday</th>
         <th>Gender M/F</th>
         <th>Heights</th>
         <th>Weight</th>
         <th>Ethnicity</th>
         <th>School</th>
     </tr>
    <?php
    foreach($family_members as $key):
        $nameExplode=explode(" ",$key['Name']);
        $member_id=$key['ID'];
        echo "<tr><td>{$nameExplode[0]}</td><td>{$nameExplode[1]}</td>";
        echo "<td><input type='text' name='birthday_$member_id' value='{$result["birthday_$member_id"]}' class='form-control'></td>";
        echo "<td><input type='text' name='gender_$member_id' value='{$result["gender_$member_id"]}' class='form-control'></td>";
        echo "<td><input type='text' name='height_$member_id' value='{$result["height_$member_id"]}' class='form-control'></td>";
        echo "<td><input type='text' name='weight_$member_id' value='{$result["weight_$member_id"]}' class='form-control'></td>";
        echo "<td><input type='text' name='ethnicity_$member_id' value='{$result["ethnicity_$member_id"]}' class='form-control'></td>";
        echo "<td><input type='text' name='school_$member_id' value='{$result["school_$member_id"]}' class='form-control'></td></tr>";
    endforeach;
    ?>

    </table>

</div>



    <div style="clear:both"></div>

    <div style="text-align: center;width:85%;padding-top:20px;">
    <input type="submit" value="Submit" name="submit_family_info" class="btn btn-info" >
    </div>
</form>
</div>

<div style="clear:both"></div><br><br><hr style="border-top:1px solid blue">
<?php
$this->load->view('common/footer.php');
?>

<style>
    label{
        margin-top:5px;
    }
</style>

<script>

</script>

