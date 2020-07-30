<?php
include '../access/shopaccesscontrol.php';

//get user info
$getuserinfo_query = mysqli_query($con, "SELECT * FROM shopkeeper WHERE sid=$globalshopid");
$getuserinfo = mysqli_fetch_assoc($getuserinfo_query);

//get all orders
$getorders = mysqli_query($con, "SELECT * FROM orders WHERE osid=$globalshopid");

//get total orders
$orderscount = mysqli_num_rows($getorders);

//get new orders
$totalamt = 0;
$neworders = 0;
$confirmedorders = 0;
$deliverd = 0;

foreach($getorders as $key => $getorders){
    if($getorders['ostatus'] == 0){
        $neworders++;
    } else if($getorders['ostatus'] == 1 || $getorders['ostatus'] == 2){
        $confirmedorders++;
    } else if($getorders['ostatus'] == 3) {
        $deliverd++;
    }

    //get total revenue
    $totalamt = $totalamt + $getorders['ototalamt'];
}

//get items in store
$totalitems = mysqli_query($con, "SELECT * FROM itemmaster WHERE isid=$globalshopid");
$itemcount = mysqli_num_rows($totalitems);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'assets/csslink.php'; ?>
    <style>
        /* hover animation */
        .hvr-grow {
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: perspective(1px) translateZ(0);
            transform: perspective(1px) translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: transform;
            transition-property: transform;
        }

        .hvr-grow:hover,
        .hvr-grow:focus,
        .hvr-grow:active {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }

        .hvr-icon-spin {
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: perspective(1px) translateZ(0);
            transform: perspective(1px) translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        }

        .hvr-icon-spin .hvr-icon {
            -webkit-transition-duration: 1s;
            transition-duration: 1s;
            -webkit-transition-property: transform;
            transition-property: transform;
            -webkit-transition-timing-function: ease-in-out;
            transition-timing-function: ease-in-out;
        }

        .hvr-icon-spin:hover .hvr-icon,
        .hvr-icon-spin:focus .hvr-icon,
        .hvr-icon-spin:active .hvr-icon {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    </style>
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

                        <h4 class="page-title mb-2"><i class="mdi mdi-monitor-dashboard mr-2"></i>Dashboard</h4>

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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h4 class="mt-0">Hello <?php echo $getuserinfo['soname']; ?>, </h4>
                                            <p id="greetText" class="text-muted">Good morning ! Have a nice day.</p>
                                            <div class="row justify-content-center">

                                                <div class="col-md-4 hvr-icon-spin">
                                                    <div class="card card-second">
                                                        <div class="card-body mb-0">
                                                            <div class="row">
                                                                <div class="col-8 align-self-center">
                                                                    <div class="">
                                                                        <h4 class="mt-0 header-title text-danger">New Orders</h4>
                                                                        <h2 class="mt-0 font-weight-bold">
                                                                            <?php echo $neworders; ?>
                                                                        </h2>

                                                                        <!-- <p class="mb-0 text-muted">
                                                                            <span class="text-success">
                                                                                <i class="mdi mdi-arrow-up"></i>
                                                                                14.5%
                                                                            </span>
                                                                            Up From Last Week
                                                                        </p> -->
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-4 align-self-center">
                                                                    <div class="icon-info text-right">
                                                                        <i class="dripicons-cart bg-soft-danger hvr-icon"></i>
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                        <!--end card-body-->
                                                    </div>
                                                    <!--end card-->
                                                </div>

                                                <div class="col-md-4 hvr-icon-spin">
                                                    <div class="card card-second ">
                                                        <div class="card-body mb-0">
                                                            <div class="row">
                                                                <div class="col-8 align-self-center">
                                                                    <div class="">
                                                                        <h4 class="mt-0 header-title text-info">TOTAL REVENUE</h4>
                                                                        <h2 class="mt-0 font-weight-bold">
                                                                            ₹<?php echo $totalamt; ?>
                                                                        </h2>

                                                                        <!-- <p class="mb-0 text-muted">
                                                                            <span class="text-success">
                                                                                <i class="mdi mdi-arrow-up"></i>
                                                                                14.5%
                                                                            </span>
                                                                            Up From Last Week
                                                                        </p> -->
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-4 align-self-center">
                                                                    <div class="icon-info text-right">
                                                                        <i class="dripicons-wallet bg-soft-info hvr-icon"></i>
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                        <!--end card-body-->
                                                    </div>
                                                    <!--end card-->
                                                </div>

                                                <div class="col-md-4 hvr-icon-spin">
                                                    <div class="card card-second ">
                                                        <div class="card-body mb-0">
                                                            <div class="row">
                                                                <div class="col-8 align-self-center">
                                                                    <div class="">
                                                                        <h4 class="mt-0 header-title text-warning">Items in store</h4>
                                                                        <h2 class="mt-0 font-weight-bold">
                                                                            <?php echo $itemcount; ?>
                                                                        </h2>

                                                                        <!-- <p class="mb-0 text-muted">
                                                                            <span class="text-success">
                                                                                <i class="mdi mdi-arrow-up"></i>
                                                                                14.5%
                                                                            </span>
                                                                            Up From Last Week
                                                                        </p> -->
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-4 align-self-center">
                                                                    <div class="icon-info text-right">
                                                                        <i class="dripicons-archive bg-soft-warning hvr-icon"></i>
                                                                    </div>
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                        <!--end card-body-->
                                                    </div>
                                                    <!--end card-->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-3 align-self-center">
                                            <img src="../admin_plugins/images/dash.svg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <!--end card-body-->
                                <!-- <div class="card-body report-data">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="media">
                                                <img src="../admin_plugins/images/egross_sm.png" height="50" class="mr-4" alt="...">
                                                <div class="media-body align-self-center">
                                                    <p class="mb-0 text-muted">There are many variations of passages
                                                        of Lorem Ipsum available, but the majority
                                                        have suffered alteration in some form, by injected
                                                        humour, or randomised words.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 align-self-center text-center">
                                            <button class="btn btn-sm btn-warning">Download Report</button>
                                        </div>
                                    </div>
                                </div> -->
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-0">Total Orders Reports</h4>
                                </div>
                                <div class="card-body track-report">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="icon-info">
                                                <i class="dripicons-cart bg-soft-success"></i>
                                            </div>
                                            <h3><?php echo $orderscount; ?></h3>
                                            <p class="mb-0 font-13 text-muted">Total Orders</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="icon-info">
                                                <i class="dripicons-box bg-soft-warning"></i>
                                            </div>
                                            <h3><?php echo $confirmedorders?></h3>
                                            <p class="mb-0 font-13 text-muted">Shipping</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="icon-info">
                                                <i class="dripicons-checkmark bg-soft-pink"></i>
                                            </div>
                                            <h3><?php echo $deliverd; ?></h3>
                                            <p class="mb-0 font-13 text-muted">Delivered</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <!-- <ol class="c-progress-steps">
                                        <li class="c-progress-steps__step  done">Packing</li>
                                        <li class="c-progress-steps__step  done">Shipping</li>
                                        <li class="c-progress-steps__step  current">On the Way</li>
                                        <li class="c-progress-steps__step">Delivered</li>
                                    </ol> -->
                                </div>

                            </div>
                        </div>
                        <?php
                        //get products
                        $getproducts = mysqli_query($con, "SELECT * FROM itemmaster WHERE isid=$globalshopid LIMIT 3");
                        $getprod=mysqli_num_rows($getproducts);
                        ?>
                        <?php if($getprod==0){?>
                        <div class="col-lg-4">
                            <div class="card carousel-bg-img">
                                <div class="card-body dash-info-carousel">
                                    <h4 class="mt-0 header-title">Populer Products</h4>
                                            <div id="carousel_2" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="media">
                                                            <div class="media-body align-self-center">    
                                                            <h3 class="text-center " style="padding-top: 80px;padding-bottom: 70px;">No Products Added</h3>                                  </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                </div>            
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <?php }?>
                        <?php if($getprod!=0){?>
                        <div class="col-lg-4">
                            <div class="card carousel-bg-img">
                                <div class="card-body dash-info-carousel">
                                    <h4 class="mt-0 header-title">Populer Products</h4>
                                    <div id="carousel_2" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php foreach ($getproducts as $key => $getproducts) { ?>
                                                <?php if ($key == 0) { ?>
                                                    <div class="carousel-item active">
                                                        <div class="media">
                                                            <img src="../uploads/item/<?php echo $getproducts['iimg']; ?>" height="200" width="170" class="mr-4" alt="...">
                                                            <div class="media-body align-self-center">
                                                                <!-- <span class="badge badge-primary mb-2">354 sold</span> -->
                                                                <h4 class="mt-0"><?php echo $getproducts['iname'] ?></h4>
                                                                <p class="text-muted mb-0">₹<?php echo $getproducts['iprice'] ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php continue; } ?>
                                                <div class="carousel-item">
                                                    <div class="media">
                                                        <img src="../uploads/item/<?php echo $getproducts['iimg']; ?>" height="200" width="170" class="mr-4" alt="...">
                                                        <div class="media-body align-self-center">
                                                            <!-- <span class="badge badge-primary mb-2">354 sold</span> -->
                                                            <h4 class="mt-0"><?php echo $getproducts['iname'] ?></h4>
                                                            <p class="text-muted mb-0">₹<?php echo $getproducts['iprice'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>

                                        <a class="carousel-control-prev" href="#carousel_2" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel_2" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <?php } ?>
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

    <script type="text/javascript">
        var greetEle = document.getElementById('greetText');
        var day = new Date();
        var hr = day.getHours();

        if (hr >= 0 && hr < 12) {
            greetEle.innerHTML = "Good Morning!";
        } else if (hr == 12) {
            greetEle.innerHTML = "Good Noon!";
        } else if (hr >= 12 && hr <= 17) {
            greetEle.innerHTML = "Good Afternoon!";
        } else {
            greetEle.innerHTML = "Good Evening!";
        }
    </script>

</body>
</html>