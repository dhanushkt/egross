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
        
                                        <h4 class="mt-0 header-title">Category Table</h4>
                                        <!--<p class="text-muted mb-4 font-13">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p>-->
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Discription</th>
                                                <th>Image</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <tr>
                                                <td>Bottle</td>
                                                <td>Active</td>
                                                <td>Used to store any liquid</td>
                                                <td>image</td>
                                                <td style="white-space: nowrap; width: 15%;"><div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                <div class="btn-group btn-group-sm" style="float: none;"><button type="button" class="tabledit-edit-button btn btn-sm btn-success" style="float: none; margin: 4px;"><span class="ti-pencil"></span></button><button type="button" class="tabledit-delete-button btn btn-sm btn-danger" style="float: none; margin: 4px;"><span class="ti-trash"></span></button></div>
                                                <button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none; margin: 4px;">Save</button>
                                                <button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; margin: 4px; float: none;">Confirm</button>
                                                <button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none; margin: 4px;">Restore</button>
                                                </div></td>
                                            </tr>
                                           
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
        
        <!-- Required datatable js -->
        <!-- Buttons examples -->
        <!-- Responsive examples -->
        <!-- App js -->

       

    </body>
</html>