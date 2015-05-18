<?php
$this->load->view('common/header');
?>
<?php
//debug($results);
?>
<a href="javascript:void(0)" class="add-new" onclick="createResourceModal()">Add New</a>
<table class="table table-stripped redbar" style="margin-top:20px" width="'100%">
    <tr>
        <th class="tb-left">Member Id</th>
        <th>Family Name</th>
        <th>Member Name</th>
        <th>Age</th>
        <th class="tb-right" >Action</th>
    </tr>
    <?php foreach($results as $key):  ?>
        <?php $key=array_map('addslashes',$key); $json_data=htmlentities(json_encode($key)); ?>
        <tr>
            <td><?php echo stripslashes($key['member_id']); ?>.</td>
            <td><?php echo $key['family_name']; ?></td>
            <td><?php echo $key['member_name']; ?></td>
            <td><?php echo $key['age']; ?> Year(s)</td>
            <td align="center"><i class="glyphicon glyphicon-pencil btn btn-default" onclick="editSplashScreen('<?php echo $json_data; ?>')"></i>&nbsp;<i class="glyphicon glyphicon-trash btn btn-danger" onclick="deleteSplashScreen('<?php echo $key['member_id']; ?>')"></i></td>
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
                    <p>Are you sure you want to delete this family member ?</p>

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
                    <h4 class="modal-title" id="exampleModalLabel">Edit Family Member's Details</h4>
                </div>

                <div class="modal-body">
                    <label>Family</label>
                    <select class="form-control" required="" name="family_id" id="family_id">
                        <option value="">--SELECT--</option>
                        <?php
                        foreach($families as $key):
                            echo"<option value=\"{$key['ID']}\">{$key['Name']}</option>";
                        endforeach;
                        ?>
                    </select>
                    <label>Member Name</label>
                    <input type="text" name="member_name" id="member_name" class="form-control">
                    <label>Age</label>
                    <input type="text" name="member_age" id="member_age" class="form-control">

                </div>

                <input type="hidden" name="member_id" id="member_id" value="213123">
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
                    <h4 class="modal-title" id="exampleModalLabel">Add New Family Member's Details</h4>
                </div>

                <div class="modal-body">
                    <label>Family</label>
                    <select class="form-control" required="" name="family_id" id="family_id">
                        <option value="">--SELECT--</option>
                        <?php
                        foreach($families as $key):
                            echo"<option value=\"{$key['ID']}\">{$key['Name']}</option>";
                        endforeach;
                        ?>
                    </select>
                    <label>Member Name</label>
                    <input type="text" name="member_name"  class="form-control">
                    <label>Age</label>
                    <input type="text" name="member_age"  class="form-control">

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
        $('#family_id').val(data.family_id);
        $('#member_name').val(data.member_name);
        $('#member_id').val(data.member_id);
        $('#member_age').val(data.age);
        $('#editModal').modal(options);
    }


    function flushAll(){
        $("form input[type='hidden'],select").val('');

    }
</script>