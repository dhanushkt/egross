<?php
include './../access/connection.php';
if(isset($_POST['additem']))
{
    $isid=0;
    $iname=$_POST['iname'];
    $ibrand=$_POST['ibrand'];
    $idesc=$_POST['idesc'];
    $istatus=1;
    date_default_timezone_set('Asia/Kolkata');
    $iadate=date('m/d/Y h:i a');
    $iimg=2;
    $iprice=$_POST['iprice'];
    $isearch=3;
    date_default_timezone_set('Asia/Kolkata');
    $date=date('m/d/Y h:i a');
    $query=mysqli_query($con,"select * from itemmaster where iname='$iname' and ibrand='$ibrand'");
    $count=mysqli_num_rows($query);
    if($count>0)
    {
        $emsg="Item already Exists";
    }
    else
    {
        $qry=mysqli_query($con,"insert into itemmaster (isid,iname,ibrand,idesc,istatus,iadate,iimg,iprice,isearch) values ('$isid','$iname','$ibrand','$idesc','$istatus','$iadate','$iimg','$iprice','$isearch')");
        if($qry)
        {
            $ismsg="Item Inserted successfully";
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
                <form method="POST">
                <div class="page-content">
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">        
                                        <h4 class="mt-0 header-title">Textual inputs</h4>
                                        
                                        <!--error msg-->
                                        <?php if(isset($ismsg)){ ?>
                                        <div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
                                            <i class="mdi mdi-check-all alert-icon"></i>
                                            <div class="alert-text">
                                                <strong>Well done!</strong><?php echo $ismsg ?> 
                                            </div>                                            
                                        </div>
                                        <?php }?>
                                        <?php if(isset($emsg)){?>
                                        <div class="alert alert-outline-warning alert-warning-shadow mb-0 alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                                        </button>
                                         <strong>Oh snap!</strong><?php echo $emsg;?>
                                        </div>
                                        <?php }?>
                                        <!--end of error msg-->
                                        <div class="row">
                                            <div class="col-lg-20">
                                                <div class="form-group row">
                                                    <label for="example-text-input" class="col-sm-2 col-form-label text-right">Item</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" placeholder="Enter Item Name hear" id="example-text-input" name="iname">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="example-email-input" class="col-sm-2 col-form-label text-right">Brand</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" placeholder="Enter Brand Name" id="example-email-input" name="ibrand">
                                                    </div>
                                                </div> 
                                                <div class="form-group row">
                                                    <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Description</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" type="tel" placeholder="about product" id="example-tel-input" name="idesc"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                <label for="example-password-input" class="col-sm-2 col-form-label text-right">State</label>
                                                    <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio4" value="visible" checked="false" name="customRadio" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio4">Visible</label>
                                                    </div>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio4" value="notvisible" checked="false" name="customRadio" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio4">Not Visible</label>
                                                    </div>
                                                </div>

                                               <!-- <div class="form-group row">
                                                    <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Date</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="iadate" value="<?php echo $date;?>" id="example-datetime-local-input">
                                                    </div>
                                                </div> -->
                                                
                                                <div class="form-group row">
                                                    <label for="example-number-input" class="col-sm-2 col-form-label text-right">Price</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" placeholder="product price" type="number" name="iprice" id="example-number-input">
                                                    </div>
                                                </div>                                 
                                            </div>


                                           

                                            <div class="form-group mb-0 row" style="width: 110%;">
                                                <div class="col-12 mt-2"  >
                                                     <button  class="btn btn-primary btn-block waves-effect waves-light" name="additem" type="submit">Add Item </button>
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
                </form>
            </div>
            <!--end page-wrapper-inner -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <?php include 'assets/jslink.php'; ?>

    </body>
</html>