<?php
$this->load->view('common/header');
?>
<?php
//debug($results);
?>
<br>
<table class="table table-stripped redbar" style="margin-top:20px" width="'100%">
    <tr>
        <th class="tb-left">Family Id</th>
        <th>Name</th>
        <th class="tb-right" >Action</th>
    </tr>
    <?php foreach($results as $key):  ?>
        <?php $key=array_map('addslashes',$key); $json_data=htmlentities(json_encode($key)); ?>
        <tr>
            <td><?php echo stripslashes($key['ID']); ?>.</td>
            <td><?php echo $key['Name']; ?></td>
            <td align="center"><a href="<?php echo site_url()."admin/view_post_survey/".$key['ID']; ?>" class="btn btn-primary"><i class='glyphicon glyphicon-eye-open'></i> View Post Survey</a></td>
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


