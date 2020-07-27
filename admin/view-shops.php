<?php
include './../access/connection.php';
$query = "select * FROM shopkeeper";
$result = mysqli_query($con, $query);
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
            <div class="sidebar-user media">
                <img src="assets/images/users/user-1.jpg" alt="user" class="rounded-circle img-thumbnail mb-1">
                <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                <div class="media-body align-item-center">
                    <h5>Mr. Michael Hill </h5>
                    <ul class="list-unstyled list-inline mb-0 mt-2">
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class=""><i class="mdi mdi-account"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class=""><i class="mdi mdi-settings"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class=""><i class="mdi mdi-power"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right align-item-center mt-2">
                            <button class="btn btn-info px-4 align-self-center report-btn">Create Report</button>
                        </div>
                        <h4 class="page-title mb-2"><i class="mdi mdi-table-large mr-2"></i>Datatable</h4>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Shop</a></li>
                                <li class="breadcrumb-item active">Shop Details</li>
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

                                    <h4 class="mt-0 header-title">View Shops</h4>
                                    <!--<p class="text-muted mb-4 font-13">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p>-->

                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Owner Name</th>
                                                <th>Shop Name</th>
                                                <th>Address</th>
                                                <th>E-mail</th>
                                                <th>Contact no</th>
                                                <th>Category</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {?>                                         
                                            <tr>
                                                <td><?php echo $row['soname']; ?></td>
                                                <td><?php echo $row['sname']; ?></td>
                                                <td><?php echo $row['saddress']; ?></td>
                                                <td><?php echo $row['soemail']; ?></td>
                                                <td><?php echo $row['somobile']; ?></td>
                                                <td><?php echo $row['scategory']; ?></td>
                                            </tr>
                                            <?php
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