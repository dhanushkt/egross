<?php
include '../access/adminaccesscontrol.php';
$query = "select * FROM user ORDER BY uid DESC";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'assets/csslink.php'; ?>
    <!-- DataTables -->
    <link href="../admin_plugins/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin_plugins/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="../admin_plugins/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
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
                            <button class="btn btn-info" onClick="window.location.reload();">Refresh
                            </button>
                        </div>
                        <h4 class="page-title mb-2"><i class="mdi mdi-table-large mr-2"></i>User Details</h4>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                                <li class="breadcrumb-item active">User Details</li>
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

                                    <h4 class="mt-0 header-title">View User Details</h4>

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '  
                                            <tr>  
                                            <td>' . $row["uname"] . '</td>  
                                            <td>' . $row["uemail"] . '</td>  
                                            <td>' . $row["umobile"] . '</td>  
                                            </tr>  
                                            ';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div><!-- container -->
                <?php include 'assets/footer.php'; ?>
            </div><!-- end page content -->
        </div>
        <!--end page-wrapper-inner -->
    </div><!-- end page-wrapper -->

    <!-- jQuery  -->
    <?php include 'assets/jslink.php'; ?>

    <!-- Required datatable js -->
    <script src="../admin_plugins/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../admin_plugins/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Responsive examples -->
    <script src="../admin_plugins/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="../admin_plugins/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="../admin_plugins/pages/jquery.datatable.init.js"></script>
</body>

</html>