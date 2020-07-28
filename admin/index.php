<?php
include '../access/adminaccesscontrol.php';

//total shops
$getshops = mysqli_query($con, "SELECT * FROM shopkeeper");
$shopscount = mysqli_num_rows($getshops);

//users registered 
$getusers = mysqli_query($con, "SELECT * FROM user");
$userscount = mysqli_num_rows($getusers);

//total items
$getitems = mysqli_query($con, "SELECT * FROM itemmaster");
$itemscount = mysqli_num_rows($getitems);

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
                                            <h4 class="mt-0">Hello Admin, </h4>
                                            <p id="greetText" class="text-muted"> </p>
                                            <div class="row justify-content-center">

                                                <div class="col-md-4 hvr-icon-spin">
                                                    <div class="card card-second">
                                                        <div class="card-body mb-0">
                                                            <div class="row">
                                                                <div class="col-8 align-self-center">
                                                                    <div class="">
                                                                        <h4 class="mt-0 header-title text-danger">Shops</h4>
                                                                        <h2 class="mt-0 font-weight-bold">
                                                                            <?php echo $shopscount; ?>
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
                                                                        <i class="dripicons-store bg-soft-danger hvr-icon"></i>
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
                                                                        <h4 class="mt-0 header-title text-info">Users</h4>
                                                                        <h2 class="mt-0 font-weight-bold">
                                                                            <?php echo $userscount; ?>
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
                                                                        <i class="dripicons-user bg-soft-info hvr-icon"></i>
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
                                                                        <h4 class="mt-0 header-title text-warning">Items Uploaded</h4>
                                                                        <h2 class="mt-0 font-weight-bold">
                                                                            <?php echo $itemscount; ?>
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