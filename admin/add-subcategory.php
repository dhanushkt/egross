<?php
include '../access/adminaccesscontrol.php';

if (isset($_POST['addsubcat'])) {
    $smcid = $_POST['smcid'];
    $scname = $_POST['scname'];
    $scactive = $_POST['scactive'];
    $scdesc = $_POST['scdesc'];
    $scimg = 2;
    $scimgdesc = 1;
    $qry = mysqli_query($con, "SELECT * FROM scat where scname='$scname'");
    $count = mysqli_num_rows($qry);
    if ($count > 0) {
        $emsg = mysqli_error($con);
    } else {
        $query = mysqli_query($con, "INSERT INTO scat (smcid,scname,scactive,scdesc,scimg,scimgdesc) VALUES ('$smcid','$scname','$scactive','$scdesc','$scimg','$scimgdesc')");
        if ($query) {
            $msg = "Category inserted";
        } else {
            $emsg = mysqli_error($con);
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
                                <li class="breadcrumb-item active">Add Sub Category</li>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Add Sub Category</h4>
                                    <hr>
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
                                            <?php echo $emsg; ?>
                                        </div>
                                    <?php } ?>
                                    <form method="POST">

                                        <div class="form-group">
                                            <label for="example-text-input">Select Main Category</label>
                                            <select class="form-control form-control-lg mb-0" name="smcid">
                                                <option hidden selected>Select Main Category</option>
                                                <?php
                                                $query = mysqli_query($con, "SELECT * from mcat");
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <option value="<?php echo $row["mcid"]; ?>"><?php echo $row["mcname"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="example-text-input">Sub Category Name</label>
                                            <input class="form-control" type="text" placeholder="Enter Sub Category Name " id="example-text-input" name="scname">
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <label class="col-md-2 control-label">States </label>
                                            <div class="col-md-9" style="margin-top:-5px">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input value="1" type="radio" id="customRadio7" name="scactive" value="1" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio7">Active</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input value="0" type="radio" id="customRadio8" name="scactive" value="0" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio8">Inactive</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input">Category description</label>
                                            <textarea class="form-control" rows="5" id="message" name="scdesc"></textarea>
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


                                        <button type="submit" name="addsubcat" class="btn btn-primary">Add</button>
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