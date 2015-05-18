<?php
$this->load->view('common/header');
?>
<?php
//debug($results);
?>
<a href="<?php echo site_url()."admin/family_checkins"; ?>" class="btn btn-primary"  style="float:right;top: 3px;position:relative;right: 10px;">Back</a>
<br>
<table class="table table-stripped redbar" style="margin-top:20px" width="'100%">
    <tr>
        <th class="tb-left">Checkin Id</th>
        <th>Family Name</th>
        <th>Location Name</th>
        <th>Date</th>
        <th class="tb-right" >Members Visited</th>
    </tr>
    <?php foreach($results as $key):  ?>
        <?php $key=array_map('addslashes',$key); $json_data=htmlentities(json_encode($key)); ?>
        <tr>
            <td><?php echo stripslashes($key['ID']); ?>.</td>
            <td><?php echo $key['family_name']; ?></td>
            <td><?php echo $key['location_name']; ?></td>
            <td><?php echo date("M dS, Y",strtotime($key['Date'])); ?></td>
            <td><?php echo getFamilyMembersById($key['Family_MembersID']); ?></td>


<!--            <td align="center"><a href="--><?php //echo site_url()."admin/view_post_survey/".$key['ID']; ?><!--" class="btn btn-primary"><i class='glyphicon glyphicon-eye-open'></i> View Post Survey</a></td>-->
        </tr>
    <?php endforeach; ?>
    <?php
    if(!sizeof($results))
        echo "<tr><td colspan='8'><font color='red'>Sorry, No records found !</font></td></tr>"
    ?>
</table>
<?php
$this->load->view('common/footer.php');
?>

<script>
    $('.family_checkins').addClass('active');
</script>


