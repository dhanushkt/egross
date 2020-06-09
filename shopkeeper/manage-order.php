<?php
include '../access/shopaccesscontrol.php';

if (isset($_GET['order'])) {
    $orderno = $_GET['order'];
    $getorderinfo = mysqli_query($con, "SELECT * FROM orders JOIN user_address ON orders.oaddrid=user_address.uaddrid JOIN user ON orders.ouid=user.uid WHERE orderno=$orderno");
    $orderinfo = mysqli_fetch_assoc($getorderinfo);
    $otype = $orderinfo['otype'];
    if ($orderinfo['osid'] != $globalshopid) {
        echo "<script>window.location.href='view-order.php'; </script>";
    }
} else {
    echo "<script>window.location.href='view-order.php'; </script>";
}

if (isset($_POST['cstatus'])) {
    $ostatus = $_POST['ostatus'];
    if ($ostatus == '4') {
        $oreason = $_POST['ocreason'];
    } else {
        $oreason = "Order Confirmed";
    }

    $updateorder = mysqli_query($con, "UPDATE orders SET ostatus='$ostatus', oreason='$oreason' WHERE orderno='$orderno'");
    if ($updateorder) {
        $getorderinfo = mysqli_query($con, "SELECT * FROM orders JOIN user_address ON orders.oaddrid=user_address.uaddrid JOIN user ON orders.ouid=user.uid WHERE orderno=$orderno");
        $smsg = "Updated order info";
    } else {
        $fmsg = "Cannot update order";
    }
}

if (isset($_POST['updateorder'])) {
    $nstatus = $_POST['nstate'];
    $nmsg = $_POST['nmsg'];
    $ntlink = (empty($_POST['ntlink']) ? "0" : $_POST['ntlink']);

    $updateorder = mysqli_query($con, "UPDATE orders SET ostatus='$nstatus', oreason='$nmsg', otrackingid='$ntlink' WHERE orderno='$orderno'");
    if ($updateorder) {
        $getorderinfo = mysqli_query($con, "SELECT * FROM orders JOIN user_address ON orders.oaddrid=user_address.uaddrid JOIN user ON orders.ouid=user.uid WHERE orderno=$orderno");
        $smsg = "Updated order info";
    } else {
        $fmsg = "Cannot update order";
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
                    <div class="row">
                        <div class="col-lg-12">
                            <!--error msg-->
                            <?php if (isset($smsg)) { ?>
                                <div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
                                    <i class="mdi mdi-check-all alert-icon"></i>
                                    <div class="alert-text">
                                        <?php echo $smsg ?>
                                    </div>
                                </div>
                            <?php  } ?>
                            <?php if (isset($fmsg)) { ?>
                                <div class="alert alert-outline-warning alert-warning-shadow mb-0 alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                    </button>
                                    <strong>Oh snap! </strong> <?php echo $fmsg; ?>
                                </div>
                            <?php } ?>
                            <!--end of error msg-->
                            <div class="card">
                                <div class="card-body">
                                <?php if($otype=='offline'){ ?>
                                <h4 class="mt-0 header-title text-center">Order #<?php echo $orderno; ?> <span class="alert <?php echo $otype; ?> alert-outline-warning alert-success-shadow">
                                            <?php echo $orderinfo['otype']; ?>
                                        </span></h4>
                            <?php }else{ ?>
                                <h4 class="mt-0 header-title text-center">Order #<?php echo $orderno; ?> <span class="alert <?php echo $otype; ?> alert-outline-success alert-success-shadow">
                                            <?php echo $orderinfo['otype']; ?>
                                        </span></h4>
                            <?php } ?>
                                    <hr>
                                    <!-- 1 -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-4 col-form-label text-left">Order Total</label>
                                                <div class="col-sm-12">
                                                    <input class="form-control" type="text" value="<?php echo '₹ ' . $orderinfo['ototalamt']; ?>" id="example-text-input" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="mt-0 header-title">Items</h4>
                                    <!-- 2 -->
                                    <div class="row">
                                        <?php $orderitems = mysqli_query($con, "SELECT * FROM order_items JOIN itemmaster ON order_items.oitmid=itemmaster.itmid WHERE order_items.orderno=$orderno");
                                        foreach ($orderitems as $key => $orderitems) {
                                        ?>
                                            <div class="col-lg-3">
                                                <div class="card e-co-product">
                                                    <a href="">
                                                        <img width="420" height="420" src="../uploads/item/<?php echo $orderitems['iimg']; ?>" alt="itm-img" class="img-fluid">
                                                    </a>
                                                    <div class="card-body text-center product-info">
                                                        <a href="" class="product-title"><?php echo $orderitems['iname']; ?></a>
                                                        <p style="margin-bottom: 2px"><?php echo $orderitems['ibrand']; ?></p>
                                                        <p style="margin-bottom: 2px">Qty: <?php echo $orderitems['oqty']; ?></p>
                                                        <p style="margin-bottom: 2px"><?php echo '₹ ' . $orderitems['iprice']; ?></p>

                                                        <p class="product-price"><?php echo '₹ ' . $orderitems['iprice'] * $orderitems['oqty']; ?></p>

                                                        <!-- <button class="btn btn-cart btn-sm waves-effect waves-light"><i class="mdi mdi-cart mr-1"></i> Add To Cart</button> -->

                                                    </div>
                                                    <!--end card-body-->
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                        <?php } ?>
                                    </div>

                                    <?php if (false) { ?>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label text-left">Item Name</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="Tomato" id="example-text-input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label text-left">Item Rate</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="1000" id="example-text-input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-5 col-form-label text-left">Item Quantity</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="1" id="example-text-input">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 3 -->
                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label text-left">Item Total</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="60" id="example-text-input">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    <?php } ?>
                                    <!-- 4 -->

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-6 col-form-label text-left">Coustomer Name</label>
                                                <div class="col-sm-10">
                                                    <input disabled class="form-control" type="text" value="<?php echo $orderinfo['uname']; ?>" id="example-text-input">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-6 col-form-label text-left">Coustomer Mobile</label>
                                                <div class="col-sm-10">
                                                    <input disabled class="form-control" type="text" value="<?php echo $orderinfo['umobile']; ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-6 col-form-label text-left">Coustomer Email</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" value="<?php echo $orderinfo['uemail']; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- 5 -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-8  col-form-label text-left">Address</label>
                                                <div class="col-sm-10">
                                                    <p>
                                                        <?php echo $orderinfo['afullname']; ?>
                                                        <br>
                                                        <?php echo $orderinfo['addrline1']; ?>
                                                        <br>
                                                        <?php echo $orderinfo['addrline2']; ?>
                                                        <br>
                                                        <?php echo $orderinfo['acity']; ?>, <?php echo $orderinfo['adistrict']; ?>
                                                        <br>
                                                        <?php echo $orderinfo['astate']; ?> - <?php echo $orderinfo['apin']; ?>
                                                    </p>
                                                    <p>
                                                        Contact details: <?php echo $orderinfo['arphone']; ?>

                                                        <?php echo ($orderinfo['aaphone'] != '0' ? ', ' . $orderinfo['aaphone'] : " "); ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($orderinfo['ostatus'] == 0) { ?>
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-10 my-2 control-label text-left">Status</label>
                                                        <div class="col-sm-2 form-check-inline my-1">
                                                            <div class="custom-control custom-radio">
                                                                <input onclick="ShowHideDiv()" type="radio" name="ostatus" class="custom-control-input" id="customRadio7" value="1">
                                                                <label class="custom-control-label" for="customRadio7">Confirm</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 form-check-inline my-1">
                                                            <div class="custom-control custom-radio">
                                                                <input onclick="ShowHideDiv()" id="customRadio9" type="radio" name="ostatus" class="custom-control-input" value="4">
                                                                <label class="custom-control-label" for="customRadio9">Cancel</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="canceled" style="display: none">
                                                        <label for="example-text-input" class="col-sm-5 col-form-label text-left">Canceled due to</label>
                                                        <div class="col-sm-12">
                                                            <input name="ocreason" class="form-control" type="text" placeholder="Enter cancel reason">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" name="cstatus" class="col-sm-3 btn btn-primary">Update Order</button>
                                            </div>
                                        </form>
                                    <?php } ?>
                                    <!-- </div> -->

                                    <!-- 6 -->


                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php if ($orderinfo['ostatus'] >= '1' && $orderinfo['ostatus'] < '4') { ?>
                                                <h4 class="mt-0 header-title">This Order is <span style="color: #1cf303">confermed</span></h4>
                                            <?php } ?>
                                            <?php if ($orderinfo['ostatus'] == '4') { ?>
                                                <h4 class="mt-0 header-title">This Order is <span style="color: #dc291b">Canceled</span></h4>
                                                <p>Reason: <?php echo $orderinfo['oreason']; ?></p>
                                            <?php } ?>

                                            <?php if ($orderinfo['ostatus'] >= '1' && $orderinfo['ostatus'] < '4') { ?>
                                                <form method="post">
                                                    <?php if ($orderinfo['otype'] == 'online') { ?>
                                                        <!-- check condition here -->
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-5 col-form-label text-left">Order Status</label>
                                                            <div class="col-sm-12">
                                                                <select name="nstate" class="form-control form-control-lg mb-1">

                                                                    <option <?php if ($orderinfo['ostatus'] == '1') echo "selected"; ?> value="1"> 1. Confirmed</option>

                                                                    <option <?php if ($orderinfo['ostatus'] == '2') echo "selected"; ?> value="2">2. Shipped</option>
                                                                    <option <?php if ($orderinfo['ostatus'] == '3') echo "selected"; ?> value="3">3. Deliverd</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <!-- close condition here -->
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-5 col-form-label text-left">Update Order Status Message</label>
                                                        <div class="col-sm-12">
                                                            <input name="nmsg" class="form-control" type="text" value="<?php echo $orderinfo['oreason']; ?>">
                                                        </div>
                                                    </div>
                                                    <?php if ($orderinfo['otype'] == 'online') { ?>
                                                        <!-- check cnodition for online here -->
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-sm-5 col-form-label text-left">Tracking Link</label>
                                                            <div class="col-sm-12">
                                                                <input class="form-control" type="text" value="<?php echo ($orderinfo['otrackingid'] != '0' ? $orderinfo['otrackingid'] : ""); ?>" name="ntlink">
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <!-- end it here -->
                                                <?php } ?>
                                        </div>
                                    </div>
                                    <?php if ($orderinfo['ostatus'] >= '1' && $orderinfo['ostatus'] < '4') { ?>
                                        <div class="text-center">
                                            <button type="submit" name="updateorder" class="col-sm-3 btn btn-primary">Update</button>
                                        </div>
                                        </form>
                                    <?php } ?>
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
    <?php include 'assets/jslink.php'; ?>
    <script>
        function ShowHideDiv() {
            var chkYes = document.getElementById("customRadio9");
            var dvPassport = document.getElementById("canceled");
            dvPassport.style.display = chkYes.checked ? "block" : "none";
        }
    </script>

    <!-- < App js >
        <script src="assets/js/app.js"></script>-->

</body>

</html>