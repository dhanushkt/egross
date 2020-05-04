<?php
include '../access/shopaccesscontrol.php';

$getorders = mysqli_query($con, "SELECT * FROM orders WHERE ostatus='0' AND osid=$globalshopid");

$getconfirmedorders = mysqli_query($con, "SELECT * FROM orders WHERE (ostatus='1' OR ostatus='2') AND osid=$globalshopid");

$getcanceledorder = mysqli_query($con, "SELECT * FROM orders WHERE ostatus='4' AND osid=$globalshopid");

$getshippedorder = mysqli_query($con, "SELECT * FROM orders WHERE ostatus='3' AND osid=$globalshopid");


//SELECT * FROM order_items JOIN itemmaster ON order_items.oitmid = itemmaster.itmid WHERE orderno='$orderno' AND itemmaster.isid='$globalshopid'

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'assets/csslink.php'; ?>
    <style>
    .cardColor{
        background-color: #0f111d !important;
    }
    .alert{
        padding: 5px 10px 5px 10px;
    }
    .card-text{
        padding-top: 10px;
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
                                                    <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab" aria-selected="true"> <i class="fa fa-truck" aria-hidden="true"></i> ORDERS</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab" aria-selected="false"><i class="fa fa-check" aria-hidden="true"></i> CONFIRMED</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-toggle="tab" href="#settings-1" role="tab" aria-selected="false"><i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                                        DELIVERED</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-toggle="tab" href="#home-2" role="tab" aria-selected="true"><i class="fa fa-ban" aria-hidden="true"></i>
                                                        CANCELED</a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane p-3 active" id="home-1" role="tabpanel">
                                                    <p class="text-muted mb-0">
                                                        <div class="row">
                                            <?php foreach ($getorders as $key => $getorders) { ?>

                                                                <?php
                                                                $orderno = $getorders['orderno'];
                                                                $getitems = mysqli_query($con, "SELECT * FROM order_items WHERE orderno='$orderno'");

                                                                if($getorders['otype']=='online'){
                                                                    $ctype = 'bg-success';
                                                                    $btntype = 'btn-success';
                                                                    $atype = 'alert-outline-success';
                                                                } else {
                                                                    $ctype = 'bg-warning';
                                                                    $btntype = 'btn-warning';
                                                                    $atype = 'alert-outline-warning';
                                                                }
                                                                ?>
                                                                <div class="col-md-3 col-lg-3">
                                                                    <h5 class="card-header <?php echo $ctype; ?> text-white mt-0 text-center">
                                                                        #<?php echo $orderno; ?>
                                                                    </h5>

                                                                    <div class="card-body cardColor">
                                                                        <!-- <h4 class="card-title mt-0">1</h4> -->
                                                                        <span class="alert <?php echo $atype; ?> alert-success-shadow">
                                                                            <?php echo $getorders['otype']; ?>
                                                                        </span>

                                                                        <p class="card-text">
                                                                            <?php echo mysqli_num_rows($getitems); ?> Items
                                                                            <br>
                                                                            <i class="fa fa-rupee-sign"></i> <?php echo $getorders['ototalamt']; ?>
                                                                            <br>
                                                                            <i class="fa fa-calendar"></i>
                                                                            <?php $date = strtotime($getorders['otimestamp']);
                                                                            echo date("d-m-Y", $date); ?>
                                                                            
                                                                        </p>
                                                                        <a href="manage-order.php?order=<?php echo $orderno ?>">
                                                                            <button type="button" class="btn <?php echo $btntype; ?>">
                                                                                View order
                                                                            </button>
                                                                        </a>
                                                                    </div>
                                                                    <!--end card-body-->
                                                                </div>
                                                            <?php } ?>

                                                        </div>
                                                    </p>
                                                </div>


                                                <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                                    <p class="text-muted mb-0">
                                                        <div class="row">
                                                            <?php foreach ($getconfirmedorders as $key => $getconfirmedorders) { ?>
                                                                <?php
                                                                $orderno = $getconfirmedorders['orderno'];
                                                                $getitems = mysqli_query($con, "SELECT * FROM order_items WHERE orderno='$orderno'");
                                                                ?>
                                                                <div class="div class=col-md-3 col-lg-3">
                                                                    <h5 class="card-header bg-info text-white mt-0 text-center">#<?php echo $orderno; ?></h5>
                                                                    <div class="card-body" style="background-color: #1b1e2b">
                                                                        <!-- <h4 class="card-title mt-0">1</h4> -->
                                                                        <p class="card-text">
                                                                            <?php echo mysqli_num_rows($getitems); ?> Items
                                                                            <br>
                                                                            <i class="fa fa-rupee-sign"></i> <?php echo $getconfirmedorders['ototalamt']; ?>
                                                                            <br>
                                                                            <i class="fa fa-calendar"></i>
                                                                            <?php $date = strtotime($getconfirmedorders['otimestamp']);
                                                                            echo date("d-m-Y", $date); ?>
                                                                        </p>
                                                                        <a href="manage-order.php?order=<?php echo $orderno ?>">
                                                                            <button type="button" class="btn btn-info">View order</button></a>
                                                                    </div>
                                                                    <!--end card-body-->
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </p>
                                                </div>
                                                <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                                                    <p class="text-muted mb-0">
                                                        <div class="row">
                                                            <?php foreach ($getshippedorder as $key => $getshippedorder) { ?>
                                                                <?php
                                                                $orderno = $getshippedorder['orderno'];
                                                                $getitems = mysqli_query($con, "SELECT * FROM order_items WHERE orderno='$orderno'");
                                                                ?>
                                                                <div class="div class=col-md-3 col-lg-3">
                                                                    <h5 class="card-header bg-info text-white mt-0 text-center">#<?php echo $orderno; ?></h5>
                                                                    <div class="card-body" style="background-color: #1b1e2b">
                                                                        <!-- <h4 class="card-title mt-0">1</h4> -->
                                                                        <p class="card-text">
                                                                            <?php echo mysqli_num_rows($getitems); ?> Items
                                                                            <br>
                                                                            <i class="fa fa-rupee-sign"></i> <?php echo $getshippedorder['ototalamt']; ?>
                                                                            <br>
                                                                            <i class="fa fa-calendar"></i>
                                                                            <?php $date = strtotime($getshippedorder['otimestamp']);
                                                                            echo date("d-m-Y", $date); ?>
                                                                        </p>
                                                                        <a href="manage-order.php?order=<?php echo $orderno ?>">
                                                                            <button type="button" class="btn btn-info">View order</button></a>
                                                                    </div>
                                                                    <!--end card-body-->
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </p>
                                                </div>
                                                <div class="tab-pane p-3" id="home-2" role="tabpanel">
                                                    <p class="text-muted mb-0">
                                                        <div class="row">
                                                            <?php foreach ($getcanceledorder as $key => $getcanceledorder) { ?>
                                                                <?php
                                                                $orderno = $getcanceledorder['orderno'];
                                                                $getitems = mysqli_query($con, "SELECT * FROM order_items WHERE orderno='$orderno'");
                                                                ?>
                                                                <div class="div class=col-md-3 col-lg-3">
                                                                    <h5 class="card-header bg-info text-white mt-0 text-center" style="background: #c01627 !important;">#<?php echo $orderno; ?></h5>
                                                                    <div class="card-body" style="background-color: #1b1e2b">
                                                                        <!-- <h4 class="card-title mt-0">1</h4> -->
                                                                        <p class="card-text">
                                                                            <?php echo mysqli_num_rows($getitems); ?> Items
                                                                            <br>
                                                                            <i class="fa fa-rupee-sign"></i> <?php echo $getcanceledorder['ototalamt']; ?>
                                                                            <br>
                                                                            <i class="fa fa-calendar"></i>
                                                                            <?php $date = strtotime($getcanceledorder['otimestamp']);
                                                                            echo date("d-m-Y", $date); ?>
                                                                            <br>
                                                                            <?php echo $getcanceledorder['oreason']; ?>
                                                                        </p>
                                                                        <a href="manage-order.php?order=<?php echo $orderno ?>">
                                                                            <button style="background: #c01627 !important; box-shadow: none; border: none" type="button" class="btn btn-info">View order</button></a>
                                                                    </div>
                                                                    <!--end card-body-->
                                                                </div>
                                                            <?php } ?>
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