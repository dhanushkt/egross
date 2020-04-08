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
                                        <h4 class="mt-0 header-title">Manage Order</h4>

                                        <!-- first part -->   

                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label text-right">Order Total</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="1560.00" id="example-text-input">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-7">
                                                        <label for="example-text-input" class="col-sm-2  col-form-label text-right">ITEMS</label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" rows="8" id="message"></textarea>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <!-- second part -->
                                        
                                        <div class="row">
                                            <div class="col-lg-4">

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label text-right">Item Name</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="Tomato" id="example-text-input">
                                                    </div>
                                                </div>

                                            </div>
                                        


                                        
                                            <div class="col-lg-4">

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-4 col-form-label text-right">Item Rate</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="60" id="example-text-input">
                                                    </div>
                                                </div>

                                            </div>
                                        

                                        
                                            <div class="col-lg-4">

                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-5 col-form-label text-right">Item Quantity</label>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="1" id="example-text-input">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    <!--Third Part -->

                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="form-group row">
                                                    <div class="col-sm-5">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label text-right">Item Total</label>
                                                    </div>
                                                     <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="60" id="example-text-input">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                    <!--forth Part -->
                                        <div class="row">
                                            <div class="col-lg-4">

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label for="example-text-input" class="col-sm-6 col-form-label text-right">Customer Name</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="Ann" id="example-text-input">
                                                    </div>
                                                </div>

                                            </div>
                                        


                                        
                                            <div class="col-lg-4">

                                                <div class="form-group row">
                                                    <div class="col-sm-10">
                                                        <label for="example-text-input" class="col-sm-8 col-form-label text-right">Coustomer Mobile</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="9876543215" id="example-text-input">
                                                    </div>
                                                </div>

                                             </div>
                                        

                                        
                                            <div class="col-lg-4">

                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                        <label for="example-text-input" class="col-sm-8 col-form-label text-right">Coustomer Email</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                         <input class="form-control" type="text" value="abc@gmail0com" id="example-text-input">
                                                    </div>
                                                </div>

                                            </div>
                                        </div><!--forth row end-->

                                    <!--fifth row-->
                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="form-group row">
                                                    <div class="col-sm-7">
                                                        <label for="example-text-input" class="col-sm-2  col-form-label">Address</label>
                                                     </div>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" rows="8" id="message"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-7">
                                                        <label class="col-sm-2 my-2 control-label">Status</label>
                                                    </div>
                                                    <div class="col-sm-7">
                                                        <div class="col-sm-3 form-check-inline my-1">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio7" name="customRadio" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio7">Confirm</label>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-check-inline my-1">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio9" name="customRadio" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio9">Cancel</label>
                                                            </div>
                                                        </div>
                                                    </div>   
                                                </div>

                                            </div>
                                        </div>
                                    

                                    <!--sixth part-->

                                        <div class="row">
                                            <div class="col-lg-12">

                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Canceled due to</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="Enter Reason" id="example-text-input">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-7">
                                                        <label for="example-text-input" class="col-sm-3 col-form-label text-right">Order status</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <select class="form-control form-control-lg mb-1">
                                                            <option>Confermed</option>
                                                            <option>2.</option>
                                                            <option>3.</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-8">
                                                        <label for="example-text-input" class="col-sm-5 col-form-label text-right">Update Order Status Message</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="canceled due to out of stock" id="example-text-input">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                        <label for="example-text-input" class="col-sm-6 col-form-label text-right">Tracking Link</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <input class="form-control" type="text" value="canceled due to out of stock" id="example-text-input">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" name="additem" class="col-sm-3 btn btn-primary">Update</button> 
                                        </div>


                                     <!-- contents part -->

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


        <!-- < App js >
        <script src="assets/js/app.js"></script>-->

    </body>
</html>