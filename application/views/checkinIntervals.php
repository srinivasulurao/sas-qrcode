<?php
$this->load->view('common/header');
?>
<?php
//debug($results);
?>
<a href="javascript:void(0)" class="add-new"  style="padding:10px 0 31px 44px" onclick="createResourceModal()">Add Intervals</a>
<a href="<?php echo site_url()."admin/family_checkins"; ?>" class="btn btn-primary"  style="float:right;top: 3px;position:relative;right: 10px;">Back</a>

<table class="table table-stripped redbar" style="margin-top:20px" width="'100%">
    <tr>
        <th class="tb-left">SL NO</th>
        <th>Date From </th>
        <th>Date Till </th>
        <th class="tb-right" >Action</th>
    </tr>
    <?php $i=1; foreach($results as $key):  ?>
        <?php $key=array_map('addslashes',$key); $json_data=htmlentities(json_encode($key)); ?>
        <tr>
            <td> <?php echo $i; ?> .</td>
            <td><?php echo date("M dS, Y",strtotime($key['date_from'])); ?></td>
            <td><?php echo date("M dS, Y",strtotime($key['date_till'])); ?></td>
            <td align="center"><i class="glyphicon glyphicon-pencil btn btn-default" onclick="editSplashScreen('<?php echo $json_data; ?>')"></i>&nbsp;<i class="glyphicon glyphicon-trash btn btn-danger" onclick="deleteSplashScreen('<?php echo $key['interval_id']; ?>')"></i></td>
        </tr>
    <?php $i++; endforeach; ?>
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
                    <p>Are you sure you want to delete this checkin interval ?</p>

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
                    <h4 class="modal-title" id="exampleModalLabel">Edit Checkin Quater Interval</h4>
                </div>

                <div class="modal-body">
                    <label>Date From:</label>
                    <input type="text" class='form-control' name="date_from" id="date_from">
                    <br>
                    <label>Date Till:</label>
                    <input type="text" class='form-control' name="date_till" id="date_till">
                    <br>

                </div>

                <input type="hidden" name="interval_id" id="interval_id" value="213123">
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
                    <h4 class="modal-title" id="exampleModalLabel">Add New Checkin Quarter Interval</h4>
                </div>

                <div class="modal-body">
                    <label>Date From:</label>
                    <input type="text" class='form-control' name="date_from" >
                    <br>
                    <label>Date Till:</label>
                    <input type="text" class='form-control' name="date_till" >
                    <br>

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
        $('#interval_id').val(data.interval_id);
        $('#date_from').val(data.date_from);
        $('#date_till').val(data.date_till);

        $('#editModal').modal(options);
    }


    function flushAll(){
        $("form input[type='hidden'],select").val('');

    }
</script>

<script>
    $('.family_checkins').addClass('active');
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function() {
        $("[name='date_from'],[name='date_till']").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>