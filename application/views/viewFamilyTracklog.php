<?php
$this->load->view('common/header');
?>
<?php
//debug($track_log);
?>
<a href="<?php echo site_url().'admin/family_checkins'; ?>" class="btn btn-primary"  style="float:right;margin-bottom:10px">Back</a>
<!-- THe Awesome page begins now. -->
<div style="clear: both"></div>
<form method="post" action="">
<?php $i=1;
$grand_fitness_total=0;
$grand_health_total=0;
$grand_big_event_total=0;
$grand_session_total=0;

?>
<?php foreach($results as $interval): ?>
<div class="col-md-2 well" style="text-align: center;width:20%">
<h3 style="color:dodgerblue">Quarter <?php echo $i; ?></h3><h5><?php echo date("M d",strtotime($interval['date_from'])); ?>-<?php echo date("M d",strtotime($interval['date_till'])); ?></h5><hr style="border-bottom:1px solid black">
    <label>Weekly Fitness Activities</label><br>
    <?php
    $checked_ins=getTotalCheckinsBetweenDate($interval['date_from'],$interval['date_till'],$family_id);

    $session_total=0;
    $session_total=($checked_ins*10);
    $grand_fitness_total+=($checked_ins*10);

    for($j=1;$j<13;$j++):
        $tenpoint_checked=($checked_ins >= $j)?"checked='checked'":'';
        echo"<div class='ten_point'><input type='checkbox' $tenpoint_checked disabled='disabled'><br>10</div>";
    endfor;
    ?>
    <hr style="border-bottom:1px solid black">
    <label>Health Screening</label><br>
    <?php
    $hk="health_screen_{$family_id}_{$interval['interval_id']}";
    $health_screen_checked=($track_log[$hk]==20)?"checked='checked'":"";
    $session_total+=($track_log[$hk]==20)?20:0;
    $grand_health_total+=(int)$track_log[$hk];
    ?>
    <?php echo"<div class='twenty_point '><input type='checkbox' value='20' $health_screen_checked name='health_screen_{$family_id}_{$interval['interval_id']}'><br>20</div>"; ?>

    <hr style="border-bottom:1px solid black">
    <?php
    $bk="big_event_{$family_id}_{$interval['interval_id']}";
    $big_event_checked=($track_log[$bk]==50)?"checked='checked'":"";
    $session_total+=($track_log[$bk]==50)?50:0;
    $grand_big_event_total+=(int)$track_log[$bk];
    ?>
    <label>Big Event</label><br>
    <?php echo "<div class='twenty_point '><input type='checkbox' value='50' $big_event_checked name='big_event_{$family_id}_{$interval['interval_id']}'><br>50</div>"; ?>

    <hr style="border-bottom:1px solid black">
    <label>Session Total</label><br>
    <?php
    $grand_session_total+=$session_total;
    ?>
    <div class='bg-primary texture' aria-disabled="true"><?php echo $session_total; ?></div>
</div>
<?php $i++; endforeach; ?>
    <!--- Grand Total Div Starts here -->

    <div class="col-sm-2 well" style="text-align: center;width:20%">

        <h3 style="color:dodgerblue">Grand Total</h3><h5>&nbsp;</h5><hr style="border-bottom:1px solid black">
        <label>Weekly Fitness Activity Total</label><br>

        <div class="texture" style="height:140px;"><span class="texture bg-primary"><?php echo (int)$grand_fitness_total; ?> </span></div>

        <hr style="border-bottom:1px solid black">
        <label>Health Screening Total</label><br>
        <div class="texture" style="height:47px;"><span class="texture bg-primary"><?php echo (int)$grand_health_total; ?> </span></div>

        <hr style="border-bottom:1px solid black">
        <label>Big Event Total</label><br>

        <div class="texture" style="height:50px;"><span class="texture bg-primary"><?php echo (int)$grand_big_event_total; ?></span></div>

        <hr style="border-bottom:1px solid black">
        <label>Grand Total</label><br>

        <div class="texture bg-primary" style="height:40px;"><?php echo (int)$grand_session_total; ?></div>

    </div>


<div style="text-align: center;clear: both;"><input type="submit" name='save_entity' value="Submit" class="btn btn-info"> </div>
</form>
<style>
    .ten_point{
        display: inline-block;
        padding: 5px 8px;
        border: 1px solid lightgrey;
        margin: 2px;

    }

    .twenty_point{
        display: inline-block;
        padding: 3px 12px;
        border: 1px solid lightgrey;
        margin: 2px;

    }

    .texture{
        padding: 10px;
        border-radius: 4px;

    }

</style>

<script>
    $('.family_checkins').addClass('active');
</script>