<?php
$this->load->view('common/header');
?>
<?php
//debug($results);
?>
<a href="<?php echo site_url()."admin/checkin_intervals"; ?>" class="add-new"  style="padding:10px 0 31px 44px">Add Intervals</a>
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
            <td align="center"><a href="<?php echo site_url()."admin/view_family_tracklog/".$key['ID']; ?>" class="btn btn-primary">View Track Log</a> &nbsp;
                <a href="<?php echo site_url()."admin/view_family_checkins/".$key['ID']; ?>" class="btn btn-primary">View Checkins</a>
            </td>
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


<!-- Delete the box -->

<div class="modal fade bs-example-modal-sm" id='myModal' tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form method="post" action="">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('delete_splash_id').value=''" ><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Delete Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this splash screen ?</p>

                </div>

                <input type="hidden" name="delete_entity_id" id="delete_entity_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="document.getElementById('delete_entity_id').value=''">Close</button>
                    <input type="submit" class="btn btn-danger" name="delete_entity" id="delete_entity" value="Delete" />
                </div>
        </form>

    </div>
</div>
</div>

<!-- Edit the SplashScreen -->
<div class="modal fade" id='editModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('delete_splash_id').value=''" ><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Edit Splash Screen</h4>
                </div>

                <div class="modal-body">
                    <label>Family Name :</label>
                    <input type="text" class='form-control' name="family_name" id="family_name">
                    <br>
                    <label>Focus family</label>
                    <select class="form-control" required="" name="focus_family" id="focus_family">
                        <option value="">--SELECT--</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select><br>

                    <label>Waiver</label>
                    <select class="form-control" required="" name="waiver" id="waiver">
                        <option value="">--SELECT--</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>

                    </select><br>
                </div>

                <input type="hidden" name="family_id" id="family_id" value="213123">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="flushAll()">Close</button>
                    <input type="submit" class="btn btn-info" name="update_entity" id="update_entity" value="Update" />
                </div>
        </form>

    </div>
</div>
</div>

<!-- Create a new Resource -->
<div class="modal fade" id='createModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="" enctype="multipart/form-data" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="flushAll()" ><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add New Family Details</h4>
                </div>

                <div class="modal-body">
                    <label>Family Name :</label>
                    <input type="text" class='form-control' name="family_name" >
                    <br>
                    <label>Focus family</label>
                    <select class="form-control" required="" name="focus_family" >
                        <option value="">--SELECT--</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select><br>

                    <label>Waiver</label>
                    <select class="form-control" required="" name="waiver" >
                        <option value="">--SELECT--</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>

                    </select><br>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="flushAll()" >Close</button>
                    <input type="submit" class="btn btn-info" name="insert_entity" id="insert_entity" value="Save" />
                </div>
        </form>

    </div>
</div>
</div>



<script>

    function createResourceModal(){
        var options = {
            "backdrop" : "static"
        };
        $('#createModal').modal(options);
    }

    function deleteSplashScreen(did){

        var options = {
            "backdrop" : "static"
        };
        $('#delete_entity_id').val(did);
        $('#myModal').modal(options);
    }


</script>

<script>

    function editSplashScreen(data){

        var options = {
            "backdrop" : "static"
        };
        data=JSON.parse(data);
        $('#family_id').val(data.ID);
        $('#family_name').val(data.Name);
        $('#waiver').val(data.Waiver);
        $('#focus_family').val(data.FocusFamily);
        $('#editModal').modal(options);
    }


    function flushAll(){
        $("form input[type='hidden'],select").val('');

    }
</script>