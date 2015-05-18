<?php
$this->load->view('common/headerEvent');
$root=site_url();
?>
<div class="container" >
    <div class="row">
        <div class='col-lg-12' style="text-align:center;padding-top:10px">
            <img src='<?php echo $root."images/logo.png"; ?>' style="height:300px;height:130px">
        </div>
    </div>

    <div class="row">
        <div class='col-lg-4'></div>
        <div class='col-lg-4'>
            <br><br>
            <?php if(!$message): ?>
                <form method="post" action="">
                    <h5 class="bg bg-warning" style="padding:10px;text-align:center"><?php echo $family[0]['family_name']; ?></h5>
                    <hr>
                    <div style="padding:10px 20px;border:1px solid #d3d3d3">
                        <?php
                        foreach($family as $member):
                            echo"<input value='{$member['member_id']}' style='display:inline-block;top:2px;position:relative' type='checkbox' name='family_members[]' > {$member['member_name']}"."<br>";
                        endforeach;
                        ?>

                    </div>
                    <hr>
                    <select name="location" class="form-control" required="required">

                        <option value="">--Location--</option>
                        <?php
                        foreach($locations as $loc):
                            echo "<option value='{$loc['ID']}'>{$loc['Title']}</option>";
                        endforeach;
                        ?>
                    </select>

                    <div style="text-align: center;margin-top:20px;">
                        <input type="hidden" name="family_id" value="<?php echo $family[0]['family_id']; ?>">
                        <input type="submit" style='width:100%' class="btn btn-info" value='Submit/Validate' name="storeCheckin" id="storeCheckin">
                    </div>
                </form>
            <?php endif; ?>
            <?php if($message): ?>
                <?php echo "<div class='bg-$messageType' style='padding:20px;text-align: center;box-shadow: 0 0 10px inset;border-radius: 10px;'><h1>$message</h1></div>"; ?>
            <?php endif; ?>
            <br><br>
        </div>
        <div class='col-lg-4'></div>
    </div>

</div><!-- Container Ends here-->

<footer style="width:100%;text-align:center;">
    <?php
    $this->load->view('common/footer.php');
    ?>

</footer>

<style>
    body{
        font-family:lucida sans unicode;
        font-size:13px;
    }
    label{
        margin-top:10px;
    }
</style>

<script>
    function ifStudent(value){
        if(value==1) {
            $('.ifStudent').slideDown();
        }
        else{
            $('.ifStudent').slideUp();
        }

    }
</script>