<?php
include '../access/shopaccesscontrol.php';
if (isset($_POST['additem'])) {
    $isid = $globalshopid;
    $iname = $_POST['iname'];
    $ibrand = $_POST['ibrand'];
    $idesc = $_POST['idesc'];
    $istatus = 1;
    date_default_timezone_set('Asia/Kolkata');
    $iadate = date('m/d/Y h:i a');
    $iimg = 2;
    $iprice = $_POST['iprice'];
    $isearch = 3;
    date_default_timezone_set('Asia/Kolkata');
    $date = date('m/d/Y h:i a');
    $query = mysqli_query($con, "select * from itemmaster where iname='$iname' and ibrand='$ibrand'");
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        $emsg = "Item already Exists";
    } else {
        $qry = mysqli_query($con, "insert into itemmaster (isid,iname,ibrand,idesc,istatus,iadate,iimg,iprice,isearch) values ('$isid','$iname','$ibrand','$idesc','$istatus','$iadate','$iimg','$iprice','$isearch')");
        if ($qry) {
            $ismsg = "Item Inserted successfully";
        } else {
            echo mysqli_error($con);
        }
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
                            <button class="btn btn-info px-4 align-self-center report-btn">Create Report</button>
                        </div>
                        <h4 class="page-title mb-2"><i class="mdi mdi-monitor-dashboard mr-2"></i>Dashboard</h4>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Frogetor</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">App</a></li>
                                <li class="breadcrumb-item active">Dashboard-3</li>
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
                        <div class="alert alert-outline-warning alert-warning-shadow mb-0 alert-dismissible fade show" role="alert">
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
                                    <h4 class="mt-0 header-title">Add Item</h4>
                                    <hr>

                                


                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Item Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Item Name" name="iname">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand</label>
                                            <input type="text" class="form-control" name="ibrand" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Item Brand">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Description</label>
                                            <textarea class="form-control" name="idesc" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <label class="col-md-2 control-label">State of item: </label>
                                            <div class="col-md-9" style="margin-top:-5px">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio7" name="istatus" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio7">Visible</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio8" name="istatus" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio8">Not visible</label>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>

                                      

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Price</label>
                                            <input type="number" class="form-control" id="exampleInputPassword1" name="iprice" placeholder="Enter price in ₹">
                                        </div>
                                       
                                       
                                        <button type="submit" name="additem" class="btn btn-primary">Submit</button>
                                        <button type="button" class="btn btn-danger">Cancel</button>
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