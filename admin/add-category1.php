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
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Add Item</h4>
                                    <hr>
                                    <form method="POST">
                                        <div class="form-group">                                
                                            <label for="example-text-input" >Category name</label>
                                            <input class="form-control" type="text" value="Enter Category name here" id="example-text-input" name=" ">
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <label class="col-md-2 control-label">States </label>
                                            <div class="col-md-9" style="margin-top:-5px">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio7" name="istatus" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio7">Active</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio8" name="istatus" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio8">Inactive</label>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" >Category description</label>
                                            <textarea class="form-control" rows="5" id="message"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" >Category Image</label>
                                            <div class="custom-file mb-4">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                       
                                       
                                        <button type="submit" name="additem" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
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


    </body>
</html>