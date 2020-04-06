<?php
include './../access/connection.php';
if (isset($_POST['additem'])) {
    $mcname = $_POST['mcname'];
    $mcactive = $_POST['mcactive'];
    $mcdesc = $_POST['mcdesc'];
    $mcimg = 1;
    $mcimgdesc = 2;
    $qry = mysqli_query($con, "SELECT mcname FROM mcat where mcname='$mcname'");
    $count = mysqli_num_rows($qry);
    if ($count > 0) {
        $emsg = "Item already Exists";
    } else {
        $query = mysqli_query($con, "INSERT INTO mcat (mcname,mcactive,mcdesc,mcimg,mcimgdesc) VALUES ('$mcname','$mcactive','$mcdesc','$mcimg','$mcimgdesc')");
        if ($query) {
            $msg = "Category inserted";
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
    <link href="../admin_plugins/plugins/dropify/css/dropify.min.css" rel="stylesheet">
    <link href="../admin_plugins/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin_plugins/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../admin_plugins/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin_plugins/css/style.css" rel="stylesheet" type="text/css" />
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
                        </div>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Main Category</li>
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

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Add Category</h4>
                                    <?php if (isset($msg)) { ?>
                                        <div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
                                            <i class="mdi mdi-check-all alert-icon"></i>
                                            <div class="alert-text">
                                                <?php echo $msg ?>
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
                                    <hr>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label for="example-text-input">Category name</label>
                                            <input class="form-control" type="text" placeholder="Enter Category name here" id="example-text-input" name="mcname">
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <label class="col-md-2 control-label">States </label>
                                            <div class="col-md-9" style="margin-top:-5px">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio7" name="mcactive" value="1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio7">Active</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio8" name="mcactive" value="0" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio8">Inactive</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input">Category description</label>
                                            <textarea class="form-control" rows="5" id="message" name="mcdesc"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="form-group">
                                                    <label>Upload Category Image (optional) [ prefered size: 100x100, format: .png ]</label>
                                                    <div class="custom-file mb-4">
                                                        <input name="fileToUpload" type="file" id="input-file-now" class="dropify" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="submit" name="additem" class="btn btn-primary">Add</button>
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
    <script src="../admin_plugins/plugins/dropify/js/dropify.min.js"></script>
    <script src="../admin_plugins/pages/jquery.form-upload.init.js"></script>

</body>

</html>