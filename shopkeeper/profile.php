<?php
include '../access/shopaccesscontrol.php';

//get profile details
$getprofile = mysqli_query($con, "SELECT * FROM shopkeeper WHERE sid='$globalshopid'");
$profileinfo = mysqli_fetch_assoc($getprofile);

if (isset($_POST['change'])) {
    $oldPass = md5($_POST['oldPass']);
    $newPass = md5($_POST['newPass']);
    $conPass = md5($_POST['conPass']);
    if ($oldPass != $profileinfo['spassword']) {
        $errMsg = "Invalid Old Password";
    }
    else if($newPass!=$conPass){
        $errMsg="New Password and Confirm Password not matching!!!";
    } 
    else {
        $upPass = mysqli_query($con, "UPDATE shopkeeper SET spassword='$newPass' WHERE sid='$globalshopid'");
        $upMsg = "Password Changed";
    }
}
if (isset($_POST['update'])) {
    $sname = $_POST['sname'];
    $soname = $_POST['soname'];
    $soemail = $_POST['soemail'];
    $somobile = $_POST['somobile'];
    $saddress = $_POST['saddress'];
    $sstate = $_POST['sstate'];
    $scity = $_POST['scity'];
    $spin = $_POST['spin'];
    $scontact = $_POST['scontact'];
    $sgstno = $_POST['sname'];
    $scategory = $_POST['scategory'];
    $upsetQuery = mysqli_query($con, "UPDATE shopkeeper SET sname='$sname',soname='$soname',soemail='$soemail',somobile='$somobile',saddress='$saddress',sstate='$sstate',scity='$scity',spin='$spin',scontact='$scontact',sgstno='$sgstno',scategory='$scategory' WHERE sid='$globalshopid'");
    if ($upsetQuery) {
        $getprofile = mysqli_query($con, "SELECT * FROM shopkeeper WHERE sid='$globalshopid'");
        $profileinfo = mysqli_fetch_assoc($getprofile);
        $upsMsg = "Setting Updated";
    } else {
        $upeMsg = "Cannot Update!!";
    }
}

//calculating total payment and total orders
$getorders = mysqli_query($con, "SELECT * FROM orders WHERE osid='$globalshopid'");
$itemscount = mysqli_num_rows($getorders);
$totalamt = 0;
while($orderinfo = mysqli_fetch_assoc($getorders)){
    $totalamt = $totalamt + $orderinfo['ototalamt'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../admin_plugins/plugins/ticker/jquery.jConveyorTicker.css" rel="stylesheet" type="text/css" />
    <link href="../admin_plugins/plugins/dropify/css/dropify.min.css" rel="stylesheet">
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

                        <h4 class="page-title mb-2"><i class="mdi mdi-account mr-2"></i>Profile</h4>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Frogetor</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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
                    <?php if (isset($upMsg)) { ?>
                        <div class="alert icon-custom-alert alert-outline-success alert-success-shadow mb-3" role="alert">
                            <i class="mdi mdi-check-all alert-icon"></i>
                            <div class="alert-text">
                                <?php echo $upMsg ?>
                                <!-- <a href="index.php">Click Here to login</a> -->
                            </div>
                        </div>
                        <script>
                            highlight()
                        </script>
                    <?php } ?>
                    <?php if (isset($errMsg)) { ?>
                    <div class="alert icon-custom-alert alert-outline-danger alert-danger-shadow fade show mb-3" role="alert">
                        <i class="mdi mdi-alert-outline alert-icon"></i>
                        <div class="alert-text">
                            <?php echo $errMsg ?>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if (isset($upsMsg)) { ?>
                        <div class="alert icon-custom-alert alert-outline-success alert-success-shadow mb-3" role="alert">
                            <i class="mdi mdi-check-all alert-icon"></i>
                            <div class="alert-text">
                                <?php echo $upsMsg ?>
                                <!-- <a href="index.php">Click Here to login</a> -->
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($upeMsg)) { ?>
                        <div class="alert icon-custom-alert alert-outline-danger alert-danger-shadow mb-3 fade show" role="alert">
                            <i class="mdi mdi-alert-outline alert-icon"></i>
                            <div class="alert-text">
                                <?php echo $upeMsg ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <div class="fro_profile">
                                        <div class="row">
                                            <div class="col-lg-7 mb-3 mb-lg-0">
                                                <div class="fro_profile-main">
                                                    <div class="fro_profile-main-pic">
                                                        <img src="../uploads/slogo/<?php echo $global_shoplogo; ?>" width="120" class="rounded-circle">

                                                        <span class="fro-profile_main-pic-change">
                                                            <i class="fas fa-camera"></i>
                                                        </span>
                                                    </div>
                                                    <div class="fro_profile_user-detail">
                                                        <h5 class="fro_user-name"> <?php echo $globalshopname; ?> </h5>

                                                        <p class="mb-0 fro_user-name-post"><?php echo $profileinfo['soname']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-5 mb-3 mb-lg-0">
                                                <div class="header-title">Information</div>
                                                <div class="row">
                                                    <div class="col-7">
                                                        <div class="seling-report">
                                                            <p>
                                                                <?php echo $profileinfo['saddress']; ?>, <?php echo $profileinfo['scity']; ?> - <?php echo $profileinfo['spin']; ?>
                                                            </p>
                                                            <ul class="list-inline mb-0">
                                                                <li class="mb-2 list-inline-item text-muted font-13">
                                                                    <!-- <i class="mdi mdi-label text-success mr-2"></i> -->
                                                                    <?php echo $profileinfo['soemail']; ?>
                                                                </li>
                                                                <li class="mb-2 list-inline-item text-muted font-13">
                                                                    <!-- <i class="mdi mdi-label text-danger mr-2"></i> -->
                                                                    <?php echo $profileinfo['somobile']; ?>
                                                                </li>
                                                                <li class="mb-2 list-inline-item text-muted font-13">
                                                                    <!-- <i class="mdi mdi-label text-warning mr-2"></i> -->
                                                                    GST No:
                                                                    <?php echo $profileinfo['sgstno']; ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end f_profile-->
                                </div>
                                <!--end card-body-->

                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-lg-3">

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title mb-3">Shop Contact</h4>
                                    <ul class="list-unstyled mb-0">
                                        <li class=""><i class="mdi mdi-phone mr-2 text-success font-18"></i> <?php echo $profileinfo['scontact']; ?> </li>
                                        <li class="mt-2"><i class="mdi mdi-map-marker  text-success font-18 mt-2 mr-2"></i> <?php echo $profileinfo['sstate']; ?></li>

                                    </ul>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                            <div class="card">
                                <div class="card-body profile-nav">
                                    <div class="nav flex-column nav-pills" id="profile-tab" aria-orientation="vertical">
                                        <a class="nav-link active" id="profile-dash-tab" data-toggle="pill" href="#profile-dash" aria-selected="true">Overview</a>

                                        <a class="nav-link" id="profile-activities-tab" data-toggle="pill" href="#profile-activities" aria-selected="false">Change Password</a>
                                        <!-- <a class="nav-link d-flex justify-content-between align-items-center" id="profile-pro-stock-tab" data-toggle="pill" href="#profile-pro-stock" aria-selected="false">
                                            Products Stock
                                            <span class="badge badge-warning">8</span>
                                        </a> -->
                                        <a class="nav-link mb-0" id="profile-settings-tab" data-toggle="pill" href="#profile-settings" aria-selected="false">Settings</a>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->

                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content" id="profile-tabContent">
                                        <div class="tab-pane fade show active" id="profile-dash">
                                            <h4 class="header-title mt-0">Overview</h4>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card shadow-none  overflow-hidden">
                                                        <div class="card-body bg-gradient2">
                                                            <div class="">
                                                                <div class="card-icon">
                                                                    <i class="fas fa-coins"></i>
                                                                </div>
                                                                <h2 class="font-weight-bold text-white">
                                                                    ₹<?php echo $totalamt; ?>
                                                                </h2>
                                                                <p class="text-white mb-0 font-16">Total payments</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <div class="card shadow-none overflow-hidden">
                                                        <div class="card-body bg-gradient1">
                                                            <div class="">
                                                                <div class="card-icon">
                                                                    <i class="far fa-star"></i>
                                                                </div>
                                                                <h2 class="font-weight-bold text-white">
                                                                    
                                                                    <?php echo $itemscount; ?>
                                                                </h2>
                                                                <p class="text-white mb-0 font-16">Orders Received</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--end card-->
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end tab-pane-->

                                        <div class="tab-pane fade" id="profile-activities">
                                            <h4 class="mt-0 header-title mb-3">Password</h4>

                                            <form method="POST">

                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="form-group">
                                                            <label>Old Password</label>

                                                            <input type="password" class="form-control" id="Category" name="oldPass" placeholder="Enter Old Password">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>New Password</label>

                                                            <input required id="pass" type="password" class="form-control" name="newPass" id="password" placeholder="Enter New Password">

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input required data-parsley-equalto="#pass" type="password" class="form-control" name="conPass" id="password" placeholder="Confirm New Password">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group mb-0 row">
                                                    <div class="col-12 mt-2 text-center">
                                                        <button style="padding-right: 30px; padding-left: 30px" name="change" class="btn btn-primary waves-effect waves-light" type="submit" style="width: 50%;"> Change Password </button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <!--end tab-pane-->
                                        <?php if (false) { ?>
                                            <div class="tab-pane fade" id="profile-pro-stock">
                                                <h4 class="mt-0 header-title mb-3">Stock Products</h4>
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr class="align-self-center">
                                                                <th>No</th>
                                                                <th>Product Name</th>
                                                                <th>Company</th>
                                                                <th>Sku</th>
                                                                <th>Color</th>
                                                                <th>Size</th>
                                                                <th>Pics</th>
                                                                <th>Rating</th>
                                                            </tr>
                                                            <!--end tr-->
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td><img src="assets/images/products/img-2.png" alt="" class="thumb-sm rounded-circle mr-2">Watch</td>
                                                                <td>Rado</td>
                                                                <td>F500</td>
                                                                <td>White, <del>Blue</del></td>
                                                                <td>3,<del>4</del>,5</td>
                                                                <td>55</td>
                                                                <td>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star-half text-warning"></i>
                                                                    <i class="mdi mdi-star-outline  text-warning"></i>
                                                                </td>
                                                            </tr>
                                                            <!--end tr-->
                                                            <tr>
                                                                <td>2</td>
                                                                <td><img src="assets/images/products/img-4.png" alt="" class="thumb-sm rounded-circle mr-2">Purse</td>
                                                                <td>Lavie</td>
                                                                <td>P500</td>
                                                                <td>Green,Blue <del>Red</del></td>
                                                                <td>Medium ,<del>Long</del></td>
                                                                <td>14</td>
                                                                <td>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star-half text-warning"></i>
                                                                    <i class="mdi mdi-star-outline  text-warning"></i>
                                                                </td>
                                                            </tr>
                                                            <!--end tr-->

                                                            <tr>
                                                                <td>3</td>
                                                                <td><img src="assets/images/products/img-5.png" alt="" class="thumb-sm rounded-circle mr-2">Shoes</td>
                                                                <td>Reebok</td>
                                                                <td>R400</td>
                                                                <td>White,Gray <del>Red</del></td>
                                                                <td>5 to 10 <del>11, 12</del></td>
                                                                <td>10</td>
                                                                <td>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star-half text-warning"></i>
                                                                    <i class="mdi mdi-star-outline  text-warning"></i>
                                                                </td>
                                                            </tr>
                                                            <!--end tr-->

                                                            <tr>
                                                                <td>4</td>
                                                                <td><img src="assets/images/products/img-3.png" alt="" class="thumb-sm rounded-circle mr-2">Headphone</td>
                                                                <td>MI</td>
                                                                <td>Mi450</td>
                                                                <td>Black, Blue <del>white</del></td>
                                                                <td>-</td>
                                                                <td>4</td>
                                                                <td>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star text-warning"></i>
                                                                    <i class="mdi mdi-star-half text-warning"></i>
                                                                    <i class="mdi mdi-star-outline  text-warning"></i>
                                                                </td>
                                                            </tr>
                                                            <!--end tr-->
                                                        </tbody>
                                                        <!--end tbody-->
                                                    </table>
                                                    <!--end table-->
                                                </div>
                                                <!--end table-responsive-->
                                                <div class="pt-3 border-top text-right">
                                                    <a href="#" class="text-primary">View all <i class="mdi mdi-arrow-right"></i></a>
                                                </div>

                                                <div class="new-product mt-5">
                                                    <h4 class="mt-0 header-title">Coming Soon Products</h4>
                                                    <p class="text-muted">There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected. </p>
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="new-product-img">
                                                                <div class="card-body text-center">
                                                                    <img src="assets/images/products/img-1.png" alt="" height="220" class="">
                                                                    <h4 class="mb-0">Nike Bag</h4>
                                                                    <small class="text-muted">New Modal Nike Bag</small>
                                                                    <h6>MRP: $99.00</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-4">
                                                            <div class="new-product-img">
                                                                <div class="card-body text-center">
                                                                    <img src="assets/images/products/img-5.png" alt="" height="220" class="">
                                                                    <h4 class="mb-0">Nike Shoes</h4>
                                                                    <small class="text-muted">PU Leather Pasted 20</small>
                                                                    <h6>MRP: $12.00</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-lg-4">
                                                            <div class="new-product-img">
                                                                <div class="card-body text-center">
                                                                    <img src="assets/images/products/img-3.png" alt="" height="220" class="">
                                                                    <h4 class="mb-0">Headphone F2019</h4>
                                                                    <small class="text-muted">Wired Connectivity</small>
                                                                    <h6>MRP: $199.00</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </div>
                                                <!--end new-product-->
                                            </div>
                                            <!--end tab-pen-->
                                        <?php } ?>
                                        <div class="tab-pane fade" id="profile-settings">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h4 class="mt-0 header-title mb-3">Profile Settings</h4>

                                                    <form enctype="multipart/form-data" method="POST">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label for="username">Shop name</label>

                                                                    <input required type="text" class="form-control" name="sname" value="<?php echo $profileinfo['sname']; ?>" id="ShopName" placeholder="Enter Shop name">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label for="username">Ownername</label>

                                                                    <input required type="text" class="form-control" value="<?php echo $profileinfo['soname']; ?>" name="soname" id="Ownername" placeholder="Enter Shop Ownername">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="username">E-mail (used for login)</label>

                                                                    <input required type="text" class="form-control" value="<?php echo $profileinfo['soemail']; ?>" name="soemail" id="E-mail" placeholder="Enter Shop e-mail">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label for="username">Mobile</label>

                                                                    <input required type="number" class="form-control" value="<?php echo $profileinfo['somobile']; ?>" name=somobile id="Mobile" placeholder="Enter Shop Mobile Number">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label for="username">Address</label>
                                                                    <textarea required class="form-control" id="Address" name="saddress" placeholder="Enter Shop Address" rows="4" cols="50"><?php echo $profileinfo['saddress']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label for="username">State</label>

                                                                    <input required type="text" class="form-control" value="<?php echo $profileinfo['sstate']; ?>" name="sstate" id="State" placeholder="Enter State">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label>City</label>

                                                                    <input required type="text" class="form-control" value="<?php echo $profileinfo['scity']; ?>" name="scity" id="City" placeholder="Enter City">

                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4">
                                                                <div class="form-group">
                                                                    <label>Pincode</label>

                                                                    <input required type="number" class="form-control" value="<?php echo $profileinfo['spin']; ?>" id="PinCode" name="spin" placeholder="Enter Pincode">

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>Personal Contact</label>

                                                                    <input type="number" class="form-control" name="scontact" value="<?php echo $profileinfo['scontact']; ?>" id="Contact" placeholder="Enter Owners Contact Number">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>GST Number of shop</label>

                                                                    <input required type="text" class="form-control" value="<?php echo $profileinfo['sgstno']; ?>" name="sgstno" placeholder="Enter shop GST Number">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>Category</label>

                                                                    <input type="text" class="form-control" value="<?php echo $profileinfo['scategory']; ?>" id="Category" name="scategory" placeholder="Category">

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group mb-0 row">
                                                            <div class="col-12 mt-2 text-center">
                                                                <button style="padding-right: 30px; padding-left: 30px" name="update" class="btn btn-primary waves-effect waves-light" type="submit" style="width: 50%;">Update</button>
                                                            </div>
                                                        </div>

                                                    </form>

                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                        <!--end tab-pane-->
                                    </div>
                                    <!--end tab-content-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
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
    <!-- jQuery  -->
    <script src="../admin_plugins/js/jquery.min.js"></script>
    <script src="../admin_plugins/js/bootstrap.bundle.min.js"></script>
    <script src="../admin_plugins/js/metisMenu.min.js"></script>
    <script src="../admin_plugins/js/waves.min.js"></script>
    <script src="../admin_plugins/js/jquery.slimscroll.min.js"></script>

    <script src="../admin_plugins/plugins/moment/moment.js"></script>
    <script src="../admin_plugins/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    <script src="https://apexcharts.com/samples/assets/series1000.js"></script>
    <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
    <script src="../admin_plugins/plugins/dropify/js/dropify.min.js"></script>
    <script src="../admin_plugins/plugins/ticker/jquery.jConveyorTicker.min.js"></script>
    <script src="../admin_plugins/plugins/peity-chart/jquery.peity.min.js"></script>
    <script src="../admin_plugins/plugins/chartjs/chart.min.js"></script>
    <script src="../admin_plugins/pages/jquery.profile.init.js"></script>

    <!-- App js -->
    <script src="../admin_plugins/js/app.js"></script>
    
    <script>
        function activeTag(tagname, tagname1) {
            document.getElementById('profile-dash-tab').classList.remove("active");
            document.getElementById('profile-dash').classList.remove("show", "active");

            document.getElementById(tagname).classList.add("active");
            document.getElementById(tagname1).classList.add("show", "active");
        }
    </script>

    <?php if (isset($errMsg)) { ?>
    <script>
        activeTag("profile-activities-tab", "profile-activities");
    </script>
    <?php } if (isset($upeMsg)) { ?>
    <script>
        activeTag("profile-settings-tab", "profile-settings");
    </script>
    <?php } ?>

</body>

</html>