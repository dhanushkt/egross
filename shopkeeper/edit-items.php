<?php
include '../access/shopaccesscontrol.php';

$t_id = $_GET['id'];

//get selected item info
$getallitem = mysqli_query($con, "SELECT * FROM itemmaster where itmid='$t_id' ");
$itemdata = mysqli_fetch_assoc($getallitem);

if (isset($_POST['additem'])) {
    
    $iscid = $_POST['iscid'];
    $iname = $_POST['iname'];
    $ibrand = $_POST['ibrand'];
    $idesc = $_POST['idesc'];
    $istatus = $_POST['istatus'];
    $iimg = 2;
    $iprice = $_POST['iprice'];
    $isearch = 3;

    $qry = mysqli_query($con, "UPDATE itemmaster SET iscid='$iscid',iname='$iname',ibrand='$ibrand',idesc='$idesc',istatus='$istatus',iimg='$iimg',iprice='$iprice',isearch='$isearch' WHERE itmid=$t_id");
    if ($qry) {
        $ismsg = "Item Updated successfully";
        $getallitem = mysqli_query($con, "SELECT * FROM itemmaster where itmid='$t_id'");
        $itemdata = mysqli_fetch_assoc($getallitem);
    } else {
        echo mysqli_error($con);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'assets/csslink.php'; ?>
</head>

<body>
    <!-- Top Bar Start -->
    <?php include 'assets/topbar.php'; ?>
    <!-- Top Bar End -->
    <div class="page-wrapper-img">
        <div class="page-wrapper-img-inner">
            <?php include 'assets/usermedia.php'; ?>
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right align-item-center mt-2">
                            <a href=edit-items.php><button class="btn btn-info px-4 align-self-center report-btn"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                            </button>
                        </div>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Items</a></li>
                                <li class="breadcrumb-item active">Edit Items</li>
                            </ol>
                        </div>
                    </div>
                    <!--end page title box-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <!-- end page title end breadcrumb -->
        </div>
        <!--end page-wrapper-img-inner-->
    </div>
    <!--end page-wrapper-img-->
    <div class="page-wrapper">
        <div class="page-wrapper-inner">

            <!-- Left Sidenav -->
            <?php include 'assets/leftnav.php'; ?>
            <!-- end left-sidenav-->

            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!--error msg-->
                    <?php if (isset($ismsg)) { ?>
                    <div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
                        <i class="mdi mdi-check-all alert-icon"></i>
                        <div class="alert-text">
                            <strong>Well done!</strong><?php echo $ismsg ?>
                        </div>
                    </div>
                    <?php  } ?>
                    <?php if (isset($emsg)) { ?>
                    <div class="alert alert-outline-warning alert-warning-shadow mb-0 alert-dismissible fade show"
                        role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                        </button>
                        <strong>Oh snap!</strong><?php echo $emsg; ?>
                    </div>
                    <?php } ?>
                    <!--end of error msg-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Update Item</h4>
                                    <hr>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Item Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" placeholder="Enter Item Name" name="iname"
                                                value="<?php echo $itemdata['iname']; ?>">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6 class="input-title mt-0">Select Category</h6>
                                                <select
                                                    class="select2 form-control mb-3 custom-select select2-hidden-accessible" name="iscid"
                                                    aria-hidden="true">
                                                    <?php
                                                    $main = mysqli_query($con, "select * from mcat");
                                                    while ($row = mysqli_fetch_assoc($main)) {
                                                        $id = $row["mcid"];
                                                    ?>
                                                    <optgroup label="<?php echo $row["mcname"]; ?>">
                                                        <?php
                                                            $sub = mysqli_query($con, "select * from scat where smcid='$id'");
                                                            while ($row2 = mysqli_fetch_assoc($sub)) {
                                                            ?>
                                                        <option <?php if($itemdata['iscid']==$row2["scid"]) echo "selected" ?> value="<?php echo $row2["scid"]; ?>">
                                                            <?php echo $row2["scname"]; ?></option>
                                                        <?php } ?>
                                                    </optgroup>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand</label>
                                            <input type="text" class="form-control" name="ibrand"
                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                placeholder="Enter Item Brand"
                                                value="<?php echo $itemdata['ibrand']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Description</label>
                                            <textarea class="form-control" name="idesc" id="exampleFormControlTextarea1"
                                                rows="3"><?php echo $itemdata['idesc']; ?></textarea>
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <label class="col-md-2 control-label">State of item: </label>
                                            <div class="col-md-9" style="margin-top:-5px">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        
                                                        <input value="1" type="radio" id="customRadio7" name="istatus"
                                                        <?php if($itemdata['istatus']=='1') echo "checked"; ?> class="custom-control-input">
                                                        <label class="custom-control-label"
                                                            for="customRadio7">Visible</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input value="0" type="radio" id="customRadio8" name="istatus"
                                                        <?php if($itemdata['istatus']=='0') echo "checked"; ?> class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio8">Not
                                                            visible</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Price</label>
                                            <input type="number" class="form-control" id="exampleInputPassword1"
                                                name="iprice" placeholder="Enter price in ₹"
                                                value="<?php echo $itemdata['iprice']; ?>">
                                        </div>


                                        <button type="submit" name="additem" class="btn btn-primary">Update</button>
                                        <a href="view-items.php">
                                        <button type="button" class="btn btn-danger">Go Back</button>
                                        </a>
                                    </form>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <!--end row-->

                </div><!-- container -->
                <?php include 'assets/footer.php'; ?>
            </div>
            <!-- end page content -->
        </div>
        <!--end page-wrapper-inner -->
    </div>
    <!-- end page-wrapper -->

    <!-- jQuery  -->
    <?php include 'assets/jslink.php'; ?>

</body>

</html>