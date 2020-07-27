<?php
  include './../access/connection.php';  
  $query ="select * FROM shopkeeper";  
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
                            <button class="btn btn-info" onClick="window.location.reload();">Refresh
                            </button>
                            </div>
                            <h4 class="page-title mb-2"><i class="mdi mdi-table-large mr-2"></i>Shop Details</h4>  
                            <div class="">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                                    <li class="breadcrumb-item active">Shop Details</li>
                                </ol>
                            </div>                                      
                        </div><!--end page title box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->
            </div><!--end page-wrapper-img-inner-->
        </div><!--end page-wrapper-img-->
        
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
        
                                        <h4 class="mt-0 header-title">View Shop Details</h4>
                                    
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Owner Name</th>
                                                <th>Shop Name</th>
                                                <th>Shop Address</th>
                                                <th>E-mail</th>
                                                <th>Mobile</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php  
                                             while($row = mysqli_fetch_assoc($result))  
                                            {  
                                            echo '  
                                            <tr>  
                                            <td>'.$row["soname"].'</td> 
                                            <td>'.$row["sname"].'</td>
                                            <td>'.$row["saddress"].'</td> 
                                            <td>'.$row["soemail"].'</td>  
                                            <td>'.$row["somobile"].'</td>  
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
            </div><!--end page-wrapper-inner -->
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