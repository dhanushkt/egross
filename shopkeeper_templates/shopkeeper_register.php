<?php
include './../access/connection.php';
if(isset($_POST['register']))
{
    $sname=$_POST['sname'];
    $soname=$_POST['soname'];
    $soemail=$_POST['soemail'];
    $somobile=$_POST['somobile'];
    $saddress=$_POST['saddress'];
    $scity=$_POST['scity'];
    $spin=$_POST['spin'];
    $sstate=$_POST['sstate'];
    $scontact=$_POST['scontact'];
    $sgstno=$_POST['sgstno'];
    $scategory=$_POST['scategory'];
    $spassword=md5($_POST['spassword']);
    $qry=mysqli_query($con,"select * from shopkeeper where soemail='$soemail' or scontact='$scontact'");
    $count=mysqli_num_rows($qry);
    if($count>0)
    {
        $emsg="User already Exists";
    }
    else
    {
        $qury=mysqli_query($con,"insert into `shopkeeper` (sname,soname,soemail,somobile,saddress,scity,spin,sstate,scontact,sgstno,scategory,spassword) values ('$sname','$soname','$soemail','$somobile','$saddress','$scity','$spin','$sstate','$scontact','$sgstno','$scategory','$spassword')");
        $cmsg="User Registered";
        if(!$qury)
        {
            echo mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>ShopKeeper-Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="admin_plugins/images/favicon.ico">

        <!-- App css -->

<link href="../admin_plugins/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="../admin_plugins/css/icons.css" rel="stylesheet" type="text/css" />
<link href="../admin_plugins/css/metismenu.min.css" rel="stylesheet" type="text/css" />
<link href="../admin_plugins/css/style.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="account-body">

        <!-- Log In page -->
        <form method="POST">
        <div class="row">
            <div class="col-lg-12"  style="padding: 20px">
                <div class="card">
                    <div class="card-body">        
                        <h1 class="mt-0 header-title">Registeration</h1><!--error message start-->
                        <?php if(isset($cmsg)){ ?>
                        <div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
                            <i class="mdi mdi-check-all alert-icon"></i>
                            <div class="alert-text">
                                <strong>Well done!</strong><?php echo $cmsg ?> 
                            </div>                                            
                        </div>
                        <?php }?>
                        <?php if(isset($emsg)){ ?>
                        <div class="alert alert-outline-warning alert-warning-shadow mb-0 alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                            </button>
                            <strong>Oh snap!</strong> <?php echo $emsg ?>
                        </div>
                        <?php }?>

                        <!--
                        <div class="alert alert-outline-warning alert-warning-shadow mb-0 alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                            </button>
                            <strong>Oh snap!</strong>
                        </div>-->
                        <!--Error messages end-->
                        <div class="row">
                            <div class="col-lg-6">
                            
                                

                                <div class="form-group">
                                    <label for="username">ShopName</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="text" class="form-control" name="sname" id="ShopName" placeholder="Enter ShopName">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">Ownername</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="text" class="form-control" name="soname" id="Ownername" placeholder="Enter Ownername">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">E-mail</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="text" class="form-control" name="soemail" id="E-mail" placeholder="Enter E-mail">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">Mobile</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="number" class="form-control" name=somobile id="Mobile" placeholder="Enter Mobile">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">Address</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <textarea class="form-control" id="Address" name="saddress" placeholder="Enter Address" rows="4" cols="50"></textarea>
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">City</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="text" class="form-control" name="scity" id="City" placeholder="Enter City">
                                    </div>                                    
                                </div>

                               </div>


                            <div class="col-lg-6">
                               

                                <div class="form-group">
                                    <label for="username">PinCode</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="number" class="form-control" id="PinCode" name="spin" placeholder="Enter PinCode">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">State</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="text" class="form-control" name="sstate" id="State" placeholder="Enter State">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">Contact</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="number" class="form-control" name="scontact"  id="Contact" placeholder="Enter Contact">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">GST Number</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="text" class="form-control" name="sgstno" placeholder="Enter GST Number">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Category</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"></span>
                                            
                                        </div>

                                        <input type="text" class="form-control" id="Category" name="scategory" placeholder="Category">
                                    </div>                                
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"></span>
                                        </div>
                                        <input type="password" class="form-control" name="spassword" id="password" placeholder="Enter password">
                                    </div>                                
                                </div>
    
                                         


                        </div>                                                                      
                    </div><!--end card-body-->
                </div><!--end card-->
                <div class="form-group mb-0 row">
                    <div class="col-12 mt-2" style="padding-left:35%;">
                        <button name="register" class="btn btn-primary btn-block waves-effect waves-light" type="submit" style="width: 50%;">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                    </div>
                </div>      
            </div><!--end col-->
        </div>
</form>
        
        <!-- <div class="row vh-100">
            <div class="col-lg-3  pr-0" style="padding: 100px;">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">
                        
                        <div class="px-3">
                            <div class="media">
                                <a href="#" class="logo logo-admin"><img src="../admin_plugins/images/logo-sm.png" height="55" alt="logo" class="my-3"></a>
                                <div class="media-body ml-3 align-self-center">                                                                                                                       
                                    <h4 class="mt-0 mb-1">Login on Frogetor</h4>
                                    <p class="text-muted mb-0">Sign in to continue to Frogetor.</p>
                                </div>
                            </div>                            
                            
                            <form class="" action="index.html">
    
                                <div class="form-group">
                                    <label for="username">ShopID</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="Shopid" placeholder="Enter ShopID">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">ShopName</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="ShopName" placeholder="Enter ShopName">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">Ownername</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="Ownername" placeholder="Enter Ownername">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">E-mail</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="E-mail" placeholder="Enter E-mail">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">Mobile</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="Mobile" placeholder="Enter Mobile">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">Address</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <textarea class="form-control" id="Address" placeholder="Enter Address" rows="4" cols="50"></textarea>
                                    </div>                                    
                                </div>
    
                               

                                <div class="form-group">
                                    <label for="username">City</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="City" placeholder="Enter City">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">PinCode</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="PinCode" placeholder="Enter PinCode">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">State</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="State" placeholder="Enter State">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">Contact</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="Contact" placeholder="Enter Contact">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="username">GST Number</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="Sgstno" placeholder="Enter GST Number">
                                    </div>                                    
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Category</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                            
                                        </div>

                                        <input type="text" class="form-control" id="Category" placeholder="Category">
                                    </div>                                
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="password" placeholder="Enter password">
                                    </div>                                
                                </div>
    
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                </div>                            
                            </form>
                        </div>
                        <div class="account-social text-center">
                            <h6 class="my-4">Or Login With</h6>
                            <ul class="list-inline mb-4">
                                <li class="list-inline-item">
                                    <a href="" class="">
                                        <i class="fab fa-facebook-f facebook"></i>
                                    </a>                                    
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="">
                                        <i class="fab fa-twitter twitter"></i>
                                    </a>                                    
                                </li>
                                <li class="list-inline-item">
                                    <a href="" class="">
                                        <i class="fab fa-google google"></i>
                                    </a>                                    
                                </li>
                            </ul>
                        </div>
                                     
                    </div>
                </div>
            </div>
            <div class="col-lg-9 p-0 d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center"> 
                    <div class="account-title text-white text-center">
                        <img src="admin_plugins/images/logo-sm.png" alt="" class="thumb-sm">
                        <h4 class="mt-3">Welcome To Frogetor</h4>
                        <div class="border w-25 mx-auto border-primary"></div>
                        <h1 class="">Let's Get Started</h1>
                        <p class="font-14 mt-3">Don't have an account ? <a href="" class="text-primary">Sign up</a></p>
                       
                    </div>
                </div>
            </div>







            

        </div> -->
        <!-- End Log In page -->


        <!-- jQuery  -->
        <script src="../admin_plugins/js/jquery.min.js"></script>
        <script src="../admin_plugins/js/bootstrap.bundle.min.js"></script>
        <script src="../admin_plugins/js/metisMenu.min.js"></script>
        <script src="../admin_plugins/js/waves.min.js"></script>
        <script src="../admin_plugins/js/jquery.slimscroll.min.js"></script>

        <!-- App js -->
        <script src="../admin_plugins/js/app.js"></script>

    </body>
</html>

