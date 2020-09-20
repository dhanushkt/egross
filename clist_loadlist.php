<?php
include 'access/useraccesscontrol.php';

$getalllistitems = mysqli_query($con, "SELECT * FROM custom_list WHERE custom_list.cl_uid='$globaluserid' ORDER BY sortnumber");

$selitemid = $_POST['selitemid'];
?>

<table class="table table-hover table-bordered results">
    <thead>
        <tr>
            <th class="col-md-5 col-xs-5 bg-danger text-white">List name</th>
            <th class="col-md-3 col-xs-3 bg-danger text-white">Action</th>
        </tr>
        <tr class="warning no-result">
            <td colspan="2" class="bg-warning"><i class=" fa fa-warning"></i> No result</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($getalllistitems as $key => $getalllistitems) { ?>

            <?php 
                $cListno = $getalllistitems['clistno'];
                
                //check if item is already in list
                $inList = false;

                $getallcitems_query = mysqli_query($con, "SELECT cl_itemid FROM custom_listitems WHERE clistno='$cListno'");

                while($getallcitems = mysqli_fetch_assoc($getallcitems_query)){
    
                    if($getallcitems['cl_itemid'] == $selitemid){
                        $inList = true;
                    }
                }
                
            ?>

            <tr>
            <td><?php echo $getalllistitems['cl_name']; ?><a class="btn btn-sm btn-light pull-right" style="text-decoration:none;" href="clist-items.php?list=<?php echo $getalllistitems['clistno']; ?>"><i class="fa fa-external-link" aria-hidden="true"></i></a></td>
                <td>
                    <?php if($inList) { ?>

                        <button class="btnSwicth btn btn-danger mview-btn" data-list="<?php echo $cListno ?>"><i class="fa fa-times"></i></button>

                    <?php } else { ?>
 
                        <button class="btnSwicth btn btn-success mview-btn" data-list="<?php echo $cListno ?>"><i class="fa fa-save"></i></button>

                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div style="background-color: white; height:50px;">

</div>