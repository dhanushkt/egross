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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">        
                                        <h4 class="mt-0 header-title">Textual inputs</h4>
                                        
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Item</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="Enter Item Name hear" id="example-text-input" name="iname">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Brand</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="Enter Brand Name" id="example-email-input" name="ibrand">
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" type="tel" id="example-tel-input" name="idesc"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                <label for="example-password-input" class="col-sm-2 col-form-label text-right">State</label>
                                                    <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio4" checked="" name="customRadio" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio4">Visisble</label>
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio4" checked="" name="customRadio" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio4">Not Visible</label>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Date</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                                    </div>
                                                </div> 
                                                
                                                <div class="form-group row">
                                                    <label for="example-number-input" class="col-sm-2 col-form-label text-right">Price</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="number" name="iprice" id="example-number-input">
                                                    </div>
                                                </div>                                 
                                            </div>


                                            <div class="col-lg-6">

                                                <div class="form-group row">
                                                        <label for="example-email-input" class="col-sm-2 col-form-label text-right">Brand</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" value="Enter Brand Name" id="example-email-input" name="ibrand">
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="form-group mb-0 row" style="width: 110%;">
                                                <div class="col-12 mt-2"  >
                                                     <button  class="btn btn-primary btn-block waves-effect waves-light" type="submit">Add Item </button>
                                                 </div>
                                             </div>                                               
                                            
                                        </div>  
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->

                        </div><!--end row-->
                        
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