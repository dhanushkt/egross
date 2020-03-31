<?php
include '../access/shopaccesscontrol.php';

//get all items
$getallitem = mysqli_query($con, "SELECT * FROM itemmaster WHERE isid='$globalshopid'");

if (isset($_POST['deleteitm'])) {
    $id = $_POST['hiddenitmid'];
    $sql = "DELETE FROM itemmaster WHERE itmid=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
       $smsg = "Item Deleted";
       $getallitem = mysqli_query($con, "SELECT * FROM itemmaster WHERE isid='$globalshopid'");
    } else {
        $fmsg = "There was an error while deleting item".mysqli_error($con);
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
                        <h4 class="page-title mb-2"><i class="mdi mdi-format-list-checkbox mr-2"></i>Product List</h4>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Frogetor</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">App</a></li>
                                <li class="breadcrumb-item active">Product List</li>
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
                    <!--error msg-->
                    <?php if (isset($smsg)) { ?>
                        <div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
                            <i class="mdi mdi-check-all alert-icon"></i>
                            <div class="alert-text">
                                <strong>Well done! </strong> <?php echo $smsg ?>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="mt-0 header-title">View Items</h4>
                                    <!-- <p class="text-muted mb-4 font-13">
                                            Available all products.
                                        </p> -->
                                    <hr>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Item-Name</th>
                                                <th>Brand</th>
                                                
                                                <th>Price</th>
                                                <th>Status</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php
                                            while ($itemdata = mysqli_fetch_assoc($getallitem)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <img src="assets/images/products/img-2.png" alt="" height="52">
                                                        <p class="d-inline-block align-middle mb-0">
                                                            <a href="" class="d-inline-block align-middle mb-0 product-name"><?php echo $itemdata['iname']; ?></a>
                                                            <br>
                                                            <!-- <span class="text-muted font-13">Size-05 (Model 2019)</span>  -->
                                                        </p>
                                                    </td>
                                                    <td><?php echo $itemdata['ibrand']; ?></td>

                                                    <td>₹<?php echo $itemdata['iprice']; ?></td>
                                                    <td><span class="badge badge-soft-warning">Stock</span></td>

                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-outline-secondary btn-sm">
                                                                <a href="edit-items.php?id=<?php echo $itemdata['itmid']; ?>"><i class="far fa-edit"></a></i></button>
                                                            <form method="post">
                                                                <input type="hidden" name="hiddenitmid" value="<?php echo $itemdata['itmid']; ?>">
                                                                <button name="deleteitm" type="submit" class="btn btn-outline-secondary btn-sm">
                                                                <i class="far fa-trash-alt"></i>
                                                                </button>
                                                             </form>
                                                        </div>
                                                    </td>
                                                <tr>
                                                <?php } ?>
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