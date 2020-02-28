<?php
include './../access/connection.php';
if(isset($_POST['addmain']))
{
    $mcname=$_POST['mcname'];
    $mcactive=$_POST['mcactive'];
    $mcdesc=$_POST['mcdesc'];
    $mcimg=1;
    $mcimgdesc=$_POST['mcimgdesc'];
    $qry=mysqli_query($con,"SELECT mcname FROM mcat where mcname='$mcname'");
    $count=mysqli_num_rows($qry);
    if($count>0)
    {
        $emsg="Item already Exists";
    }
    else
    {
        $query=mysqli_query($con,"INSERT into mcat (mcname,mcactive,mcdesc,mcimg,mcimgdesc) VALUES ('$mcname','$mcactive','$mcdesc','$mcimg','$mcimgdesc')");
        if($query)
        {
            $msg="Category inserted";
        }
        else
        {
            echo mysqli_error($con);
        }
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
                <form method="POST">
                <div class="page-content">
                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Add Item</h4>
                                    <hr>
<<<<<<< HEAD
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
=======

                                    <?php if (isset($msg)) { ?>
                                    <div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
                                        <i class="mdi mdi-check-all alert-icon"></i>
                                        <div class="alert-text">
                                            <strong>Well done!</strong><?php echo $msg ?>
                                        </div>
                                    </div>
                                    <?php  } ?>

                                    <?php if (isset($emsg)) { ?>
                                    <div class="alert alert-outline-warning alert-warning-shadow mb-0 alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                        </button>
                                        <strong>Oh snap!</strong> <?php echo $emsg ?>
                                    </div>
                                    <?php } ?>

                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-10 col-form-label text-right">Main category name</label>
                                                    <div class="col-sm-30">
                                                        <input class="form-control" type="text" placeholder="Enter Category name here" id="example-text-input" name="mcname">
                                                    </div>
                                                </div>

                                                <div class="form-group mb-0 row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label text-right">State of Item :</label>
                                                    <div class="col-md-9" style="margin-top:3px">
                                                        <div class="form-check-inline my-1">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio7" name="mcactive" class="custom-control-input">
                                                                <label class="custom-control-label"  for="customRadio7" value="1">Visible</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-check-inline my-1">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio8" name="mcactive" class="custom-control-input">
                                                                <label class="custom-control-label"  for="customRadio8" value="0">Not visible</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-10">                            
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-sm-5 col-form-label text-right" >Category description</label>
                                                            <textarea class="form-control" name="mcdesc" rows="5" id="message"></textarea>
                                                        </div>
>>>>>>> b6ee4ab8473cacd08cb7e469e3788494586707e3
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" >Category description</label>
                                            <textarea class="form-control" rows="5" id="message"></textarea>
                                        </div>

<<<<<<< HEAD
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
=======
                                                <div class="row">
                                                    <div class="col-md-10">                            
                                                        <div class="form-group">
                                                            <label for="example-text-input" class="col-sm-5 col-form-label text-right" >Image description</label>
                                                            <textarea class="form-control" name="mcimgdesc" rows="5" id="message"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                <div class="row" style="float:left">
                                                    <div class="col-sm-10 text-right">
                                                        <button type="submit" class="btn btn-primary px-5 py-1" name="addmain">SUBMIT</button>
                                                    </div>
                                                </div>                               
                                            </div>
                                        </div>                                                                      
                                    </div><!--end card-body-->
                                </div><!--end card-->
                            </div><!--end col-->
                        </div><!--end row-->
                        
                    </div><!-- container -->
                    </form>
>>>>>>> b6ee4ab8473cacd08cb7e469e3788494586707e3
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