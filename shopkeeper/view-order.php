<?php
include '../access/shopaccesscontrol.php';
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

                        <h4 class="page-title mb-2"><i class="mdi mdi-format-list-checkbox mr-2"></i>Product List</h4>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Items</a></li>
                                <li class="breadcrumb-item active">View Orders</li>
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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">View Orders</h4>
                                    <!-- <p class="text-muted mb-4 font-13">
                                            Available all products.
                                        </p> -->
                                    <hr>
                                    <div class="card">
                                        <div class="card-body">

                                            <!-- Nav tabs -->
                                            <ul class="nav nav-pills nav-justified" role="tablist">
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link active" data-toggle="tab" href="#home-1"
                                                        role="tab" aria-selected="true"><i class="fa fa-check"
                                                            aria-hidden="true"></i> CONFIRMED</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab"
                                                        aria-selected="false"><i class="fa fa-truck"
                                                            aria-hidden="true"></i> SHIPPED</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-toggle="tab" href="#settings-1" role="tab"
                                                        aria-selected="false"><i class="fa fa-thumbs-up"
                                                            aria-hidden="true"></i>
                                                        DELIVERED</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-toggle="tab" href="#home-2" role="tab"
                                                        aria-selected="true"><i class="fa fa-ban"
                                                            aria-hidden="true"></i>
                                                        CANCELED</a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane p-3 active" id="home-1" role="tabpanel">
                                                    <p class="text-muted mb-0">
                                                        <div class="row">
                                                            <div class="div class=col-md-3 col-lg-3">
                                                                <h5 class="card-header bg-info text-white mt-0">Confirmed
                                                                </h5>
                                                                <div class="card-body">
                                                                    <h4 class="card-title mt-0">1</h4>
                                                                    <p class="card-text">

                                                                    </p>
                                                                    <button type="button"
                                                                        class="btn btn-info">View order</button>
                                                                </div>
                                                                <!--end card-body-->
                                                            </div>
                                                            <div class="div class=col-md-3 col-lg-3">
                                                                <h5 class="card-header bg-info text-white mt-0">Confirmed
                                                                </h5>
                                                                <div class="card-body">
                                                                    <h4 class="card-title mt-0">1</h4>
                                                                    <p class="card-text">

                                                                    </p>
                                                                    <button type="button"
                                                                        class="btn btn-info">View order</button>
                                                                </div>
                                                                <!--end card-body-->
                                                            </div>
                                                            
                                                        </div>
                                                    </p>
                                                </div>


                                                <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                                    <p class="text-muted mb-0">
                                                        <div class="row">
                                                            <div class="div class=col-md-3 col-lg-3">
                                                                <h5 class="card-header bg-info text-white mt-0">Shipped
                                                                </h5>
                                                                <div class="card-body">
                                                                    <h4 class="card-title mt-0">2</h4>
                                                                    <p class="card-text">

                                                                    </p>
                                                                    <button type="button"
                                                                        class="btn btn-info">View order</button>
                                                                </div>
                                                                <!--end card-body-->
                                                            </div>
                                                            <div class="div class=col-md-3 col-lg-3">
                                                                <h5 class="card-header bg-info text-white mt-0">Shipped
                                                                </h5>
                                                                <div class="card-body">
                                                                    <h4 class="card-title mt-0">2</h4>
                                                                    <p class="card-text">

                                                                    </p>
                                                                    <button type="button"
                                                                        class="btn btn-info">View order</button>
                                                                </div>
                                                                <!--end card-body-->
                                                            </div>
                                                        </div>
                                                    </p>
                                                </div>
                                                <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                                                    <p class="text-muted mb-0">
                                                        <div class="row">
                                                            <div class="div class=col-md-3 col-lg-3">
                                                                <h5 class="card-header bg-info text-white mt-0">Delivered
                                                                </h5>
                                                                <div class="card-body">
                                                                    <h4 class="card-title mt-0">3</h4>
                                                                    <p class="card-text">

                                                                    </p>
                                                                    <button type="button"
                                                                        class="btn btn-info">View order</button>
                                                                </div>
                                                                <!--end card-body-->
                                                            </div>
                                                            <div class="div class=col-md-3 col-lg-3">
                                                                <h5 class="card-header bg-info text-white mt-0">Delivered
                                                                </h5>
                                                                <div class="card-body">
                                                                    <h4 class="card-title mt-0">3</h4>
                                                                    <p class="card-text">

                                                                    </p>
                                                                    <button type="button"
                                                                        class="btn btn-info">View order</button>
                                                                </div>
                                                                <!--end card-body-->
                                                            </div>
                                                        </div>
                                                    </p>
                                                </div>
                                                <div class="tab-pane p-3" id="home-2" role="tabpanel">
                                                    <p class="text-muted mb-0">
                                                        <div class="row">
                                                            <div class="div class=col-md-3 col-lg-3">
                                                                <h5 class="card-header bg-info text-white mt-0">Cancelled
                                                                </h5>
                                                                <div class="card-body">
                                                                    <h4 class="card-title mt-0">4</h4>
                                                                    <p class="card-text">

                                                                    </p>
                                                                    <button type="button"
                                                                        class="btn btn-info">View order</button>
                                                                </div>
                                                                <!--end card-body-->
                                                            </div>
                                                            <div class="div class=col-md-3 col-lg-3">
                                                                <h5 class="card-header bg-info text-white mt-0">Cancelled
                                                                </h5>
                                                                <div class="card-body">
                                                                    <h4 class="card-title mt-0">4</h4>
                                                                    <p class="card-text">

                                                                    </p>
                                                                    <button type="button"
                                                                        class="btn btn-info">View order</button>
                                                                </div>
                                                                <!--end card-body-->
                                                            </div>
                                                        </div>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div><!-- container -->

                <?php include 'assets/footer.php'; ?>
            </div>
            <!-- end page content -->
        </div>
        <!--end page-wrapper-inner -->
    </div>
    <!-- end page-wrapper -->

    <?php include 'assets/jslink.php'; ?>

    <!-- Required datatable js -->
    <script src="../admin_plugins/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../admin_plugins/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- App js -->
    <script src="../admin_plugins/js/app.js"></script>
    <script>
    $('#datatable').DataTable();
    </script>

</body>

</html>