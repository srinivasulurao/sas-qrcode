<?php
$this->load->view('common/header');
?>
<?php
//debug($results);
//debug($campusList);
?>
<a href="javascript:void(0)" class="add-new" onclick="createResourceModal()">Add New</a>
<table class="table table-stripped redbar" style="margin-top:20px" width="100%">
    <tr>
        <th class="tb-left">Campus</th>
        <th>Map Title</th>
        <th>Call Us</th>
        <th>Directions</th>
        <th>Email</th>
        <th>Map Link</th>
        <th>GPS</th>
        <th>Map Image</th>
        <th class="tb-right" >Action</th>

    </tr>

    <?php

    $i=1;
    foreach($results as $key):
        ?>
        <?php
        $key=array_map('addslashes',$key);
        //$key=array_map('htmlspecialchars',$key);
        $json_data=htmlentities(json_encode($key));
        ?>
        <tr>
            <td><?php echo $key['campus_name']; ?></td>
            <td><?php echo $key['map_title']; ?></td>
            <td><?php echo $key['call_us']; ?></td>
            <td><?php echo $key['directions']; ?></td>
            <td><?php echo $key['email_id']; ?></td>
            <td><?php echo $key['map_link']; ?></td>
            <td><?php echo "Latitude: ".$key['latitude']."<br> Longitude: ".$key['longitude']; ?></td>
            <td><?php echo ($key['map_image'])?"<a href='".site_url().$key['map_image']."' target='_blank'><img class='thumbnail conf-thumbnail' src='".site_url().$key['map_image']."'></a>":"Image Not Available."; ?></td>

            <td align="center"><i class="glyphicon glyphicon-pencil btn btn-default" onclick="editCampusMap('<?php echo $json_data; ?>')"></i>&nbsp;<i class="glyphicon glyphicon-trash btn btn-danger" onclick="deleteCampusMap('<?php echo $key['map_id']; ?>')"></i></td>
        </tr>
        <?php
        $i++;
    endforeach;

    ?>

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

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="flushAll()" ><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Delete Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this Campus Map ?</p>

                </div>

                <input type="hidden" name="delete_campusmap_id" id="delete_campusmap_id">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="flushAll()" >Close</button>
                    <input type="submit" class="btn btn-danger" name="delete_campusmap" id="delete_campusmap" value="Delete" />
                </div>
        </form>

    </div>
</div>
</div>

<!-- Edit the Contact -->
<div class="modal fade" id='editModal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="" enctype="multipart/form-data" id="editContactForm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="flushAll()" ><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Edit Campus Map Details</h4>
                </div>

                <div class="modal-body">

                    <label>Campus</label>
                    <select name="campus_id" id="campus_id" class="form-control">
                        <option value="">--Select--</option>
                        <?php
                        foreach($campusList as $key):
                            echo "<option  value='{$key['ID']}'>{$key['Name']}</option>";
                        endforeach;
                        ?>
                    </select>
                    <label>Map Title</label>
                    <input type="text"  name="map_title"  id="map_title" class="form-control">
                    <label>Directions</label>
                    <input type="text" name="directions"  id="directions" class="form-control">
                    <label>Call Us</label>
                    <input type="text"  name="call_us"  id="call_us" class="form-control">
                    <label>Email</label>
                    <input type="text"  name="email_id"  id="email_id" class="form-control">
                    <label>Map Link</label>
                    <input type="text"  name="map_link" id="map_link"  class="form-control">
                    <label>Latitude</label>
                    <input type="text"  name="latitude" id="latitude"  class="form-control">
                    <label>Longitude</label>
                    <input type="text"  name="longitude" id="longitude"  class="form-control">
                    <label>Map Image</label>
                    <input type="file" name="map_image" id="map_image" class="form-control">

                </div>

                <input type="hidden" name="edit_campusmap_id" id="edit_campusmap_id" value="">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="flushAll()">Close</button>
                    <input type="submit" class="btn btn-info" name="edit_campusmap" id="edit_campusmap" value="Update" />
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
                    <h4 class="modal-title" id="exampleModalLabel">Add Campus Map Details</h4>
                </div>

                <div class="modal-body">

                    <label>Campus</label>
                    <select name="campus_id" id="campus_id" class="form-control">
                        <option value="">--Select--</option>
                        <?php
                        foreach($campusList as $key):
                            echo "<option  value='{$key['ID']}'>{$key['Name']}</option>";
                        endforeach;
                        ?>
                    </select>
                    <label>Map Title</label>
                    <input type="text"  name="map_title"   class="form-control">
                    <label>Directions</label>
                    <input type="text" name="directions"   class="form-control">
                    <label>Call Us</label>
                    <input type="text"  name="call_us"  class="form-control">
                    <label>Email</label>
                    <input type="text"  name="email_id"  class="form-control">
                    <label>Map Link</label>
                    <input type="text"  name="map_link"  class="form-control">
                    <label>Latitude</label>
                    <input type="text"  name="latitude"  class="form-control">
                    <label>Longitude</label>
                    <input type="text"  name="longitude"   class="form-control">
                    <label>Map Image</label>
                    <input type="file" name="map_image"  class="form-control">


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="flushAll()" >Close</button>
                    <input type="submit" class="btn btn-info" name="create_campusmap" id="create_campusmap" value="Save" />
                </div>
        </form>

    </div>
</div>
</div>


<script>

    function deleteCampusMap(did){

        var options = {
            "backdrop" : "static"
        };
        $('#delete_campusmap_id').val(did);
        $('#myModal').modal(options);
    }



</script>


<script>
    function createResourceModal(){
        var options = {
            "backdrop" : "static"
        };
        $('#createModal').modal(options);
    }

</script>
<script>

    function editCampusMap(data){

        var options = {
            "backdrop" : "static"
        };
        data=JSON.parse(data);

        $('#campus_id').val(data.campus_id);
        $('#map_title').val(data.map_title);
        $('#directions').val(data.directions);
        $('#call_us').val(data.call_us);
        $('#email_id').val(data.email_id);
        $('#map_link').val(data.map_link);
        $('#latitude').val(data.latitude);
        $('#longitude').val(data.longitude);
        $('#edit_campusmap_id').val(data.map_id);
        $('#editModal').modal(options);
    }


    function flushAll(){
        $("#editContactForm input[type='text'], input[type='hidden']").val('');

    }


</script>
