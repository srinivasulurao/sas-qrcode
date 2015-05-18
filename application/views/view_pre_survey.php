<?php
$this->load->view('common/header');
?>
<?php
//debug($result);
?>
<a href="<?php echo site_url().'admin/pre_survey'; ?>" class="btn btn-primary"  style="float:right;margin-bottom:10px">Back</a>
<!-- THe Awesome page begins now. -->
<div style="clear: both"></div>
<form method="post" action="" style="padding-left:30px" class="well">
    <div class="col-md-4" style="padding-left:0">
        <Label>Family Name</Label><br><h5><?php echo $result['family_name']; ?></h5>

    </div>

    <div class="col-md-4">
        <Label>Date</Label>
        <input type="text" name='Date' value="<?php echo $result['Date']; ?>" class="form-control" >
    </div>
    <div style="clear: both;"></div><br>
    <label>1.During the past 7 days, how many times did you eat fruit? (Do not count fruit juice.)</label><br>

    <input type="radio" name="Question1"  <?php echo($result['Question1']=='i_did_not_eat_fruit_during_the_past_7_days')?"checked='checked'":""; ?> value="i_did_not_eat_fruit_during_the_past_7_days"> I did not eat fruit during the past 7 days<br>
    <input type="radio" name="Question1"  <?php echo($result['Question1']=='1_to_3_times_during_the_past_7_days')?"checked='checked'":""; ?> value="1_to_3_times_during_the_past_7_days"> 1 to 3 times during the past 7 days<br>
    <input type="radio" name="Question1"  <?php echo($result['Question1']=='4_to_6_times_during_the_past_7_days')?"checked='checked'":""; ?> value="4_to_6_times_during_the_past_7_days"> 4 to 6 times during the past 7 days<br>

    <label>2.During the past 7 days, how many times did you eat green salad?</label><br>
    <input type="radio" name="Question2"  <?php echo($result['Question2']=='i_did_not_eat_fruit_during_the_past_7_days')?"checked='checked'":""; ?> value="i_did_not_eat_fruit_during_the_past_7_days"> I did not eat fruit during the past 7 days<br>
    <input type="radio" name="Question2"  <?php echo($result['Question2']=='1_to_3_times_during_the_past_7_days')?"checked='checked'":""; ?> value="1_to_3_times_during_the_past_7_days"> 1 to 3 times during the past 7 days<br>
    <input type="radio" name="Question2"  <?php echo($result['Question2']=='4_to_6_times_during_the_past_7_days')?"checked='checked'":""; ?> value="4_to_6_times_during_the_past_7_days"> 4 to 6 times during the past 7 days<br>


    <label>3.During the past 7 days, how many times did you eat potatoes? (Do not count french fries, fried potatoes, or

        potato chips.)</label><br>
    <input type="radio" name="Question3"  <?php echo($result['Question3']=='i_did_not_eat_fruit_during_the_past_7_days')?"checked='checked'":""; ?> value="i_did_not_eat_fruit_during_the_past_7_days"> I did not eat fruit during the past 7 days<br>
    <input type="radio" name="Question3"  <?php echo($result['Question3']=='1_to_3_times_during_the_past_7_days')?"checked='checked'":""; ?> value="1_to_3_times_during_the_past_7_days"> 1 to 3 times during the past 7 days<br>
    <input type="radio" name="Question3"  <?php echo($result['Question3']=='4_to_6_times_during_the_past_7_days')?"checked='checked'":""; ?> value="4_to_6_times_during_the_past_7_days"> 4 to 6 times during the past 7 days<br>


    <label>4.During the past 7 days, how many times did you eat carrots?</label><br>
    <input type="radio" name="Question4"  <?php echo($result['Question4']=='i_did_not_eat_fruit_during_the_past_7_days')?"checked='checked'":""; ?> value="i_did_not_eat_fruit_during_the_past_7_days"> I did not eat fruit during the past 7 days<br>
    <input type="radio" name="Question4" <?php echo($result['Question4']=='1_to_3_times_during_the_past_7_days')?"checked='checked'":""; ?> ) value="1_to_3_times_during_the_past_7_days"> 1 to 3 times during the past 7 days<br>
    <input type="radio" name="Question4" <?php echo($result['Question4']=='4_to_6_times_during_the_past_7_days')?"checked='checked'":""; ?> value="4_to_6_times_during_the_past_7_days"> 4 to 6 times during the past 7 days<br>

    <label>5.During the past 7 days, how many times did you eat other vegetables? (Do not count

        green salad, potatoes, or carrots.)</label><br>
    <input type="radio" name="Question5" <?php echo($result['Question5']=='i_did_not_eat_fruit_during_the_past_7_days')?"checked='checked'":""; ?> value="i_did_not_eat_fruit_during_the_past_7_days"> I did not eat fruit during the past 7 days<br>
    <input type="radio" name="Question5" <?php echo($result['Question5']=='1_to_3_times_during_the_past_7_days')?"checked='checked'":""; ?> value="1_to_3_times_during_the_past_7_days"> 1 to 3 times during the past 7 days<br>
    <input type="radio" name="Question5" <?php echo($result['Question5']=='4_to_6_times_during_the_past_7_days')?"checked='checked'":""; ?> value="4_to_6_times_during_the_past_7_days"> 4 to 6 times during the past 7 days<br>

    <label>6.During the past 7 days, on how many days were you physically active for a total of at

        least 60 minutes per day? (Add up all the time you spent in any kind of physical activity

        that increased your heart rate and made you breathe hard some of the time.)</label><br>
    <input type="radio" name="Question6" <?php echo($result['Question6']=='0_days')?"checked='checked'":""; ?>  value="0_days"> 0 days <br>
    <input type="radio" name="Question6" <?php echo($result['Question6']=='1_days')?"checked='checked'":""; ?>  value="1_days"> 1 days <br>
    <input type="radio" name="Question6" <?php echo($result['Question6']=='2_days')?"checked='checked'":""; ?>  value="2_days"> 2 days <br>
    <input type="radio" name="Question6" <?php echo($result['Question6']=='3_days')?"checked='checked'":""; ?>  value="3_days"> 3 days <br>


    <label>7. In joining the program this season, have you set a health goal for yourself?  If yes, please describe below: </label><br>
    <textarea name="Question7" class="form-control" style="width:50%" ><?php echo $result['Question7']; ?></textarea><br>




    <div style="text-align: center;clear: both;"><input type="submit" name='save_entity' value="Save" class="btn btn-info"> </div>

</form>


<script>
    $('.post_survey').addClass('active');
</script>


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function() {
        $("[name='Date']").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>