<?php
include './../access/connection.php';
if (isset($_POST['register'])) {
    $cmsg = "";
    $sname = $_POST['sname'];
    $soname = $_POST['soname'];
    $soemail = $_POST['soemail'];
    $somobile = $_POST['somobile'];
    $saddress = $_POST['saddress'];
    $scity = $_POST['scity'];
    $spin = $_POST['spin'];
    $sstate = $_POST['sstate'];
    $scontact = $_POST['scontact'];
    $sgstno = $_POST['sgstno'];
    $scategory = $_POST['scategory'];
    $spassword = md5($_POST['spassword']);
    $cpassword = md5($_POST['cpassword']);
    if ($spassword != $cpassword) {
        $fmsg = "Passwords Do not match";
    } else {
        $qry = mysqli_query($con, "select * from shopkeeper where soemail='$soemail'");
        $count = mysqli_num_rows($qry);
        if ($count > 0) {
            $fmsg = " Shop with this details already Exists";
        } else {
            //check logo is uploaded or not
            $slogo = $_FILES["fileToUpload"]["name"];
            if(!empty($slogo))
            {
                $target_dir = "../uploads/slogo/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                //check if file already exists
                if (file_exists($target_file)) {
                    $fmsg .= "file already exists, ";
                    $uploadOk = 0;
                }
                //check file size
                else if ($_FILES["fileToUpload"]["size"] > 1000000) {
                    $fmsg .= "Image size is more then 1Mb, please upload smaller size image  ";
                    $uploadOk = 0;
                }

                //allowing certain file formats
                else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $fmsg .= "Only JPG,JPEG,PNG & GIF files are allowed";
                    $uploadOk = 0;
                } else {
                    //check if image is in actual size f fake size
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        //brought up the whole image upload code here
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $cmsg .= "The File <small>" . basename($_FILES["fileToUpload"]["name"]) . " </small>has been uploaded.";

                        } else {
                            $fmsg = "Sorry,there was an error  in uploading your file.";
                        }
                    } else {
                        $fmsg .= "File is not an image.";
                        $uploadOk = 0;
                    }
                }
            } else { $slogo = "default.png"; }
            $qury = mysqli_query($con, "insert into `shopkeeper` (sname,soname,soemail,somobile,saddress,scity,spin,sstate,scontact,sgstno,scategory,spassword,slogo) values ('$sname','$soname','$soemail','$somobile','$saddress','$scity','$spin','$sstate','$scontact','$sgstno','$scategory','$spassword','$slogo')");
            if ($qury) {
                $cmsg .= " Shop Registered Successfully";
            } else {
                $fmsg = "Error during registration";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>eGross</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="eCommerce developed by Infinity Systems" name="description" />
    <meta content="Infinity Systems" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../admin_plugins/images/egross_logo_favicon.ico">


    <link href="../admin_plugins/plugins/dropify/css/dropify.min.css" rel="stylesheet">
    <!-- App css -->
    <link href="../admin_plugins/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin_plugins/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="../admin_plugins/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="../admin_plugins/css/style.css" rel="stylesheet" type="text/css" />

</head>

<body class="account-body">

    <!-- Log In page -->
    <div class="row">
        <div class="col-lg-12" style="padding: 20px">
            <div class="card">
                <div class="card-body">
                    <?php if (isset($cmsg)) { ?>
                        <div class="alert icon-custom-alert alert-outline-success alert-success-shadow" role="alert">
                            <i class="mdi mdi-check-all alert-icon"></i>
                            <div class="alert-text">
                                <?php echo $cmsg ?>
                                <a href="index.php">Click Here to login</a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($fmsg)) { ?>
                        <div class="alert icon-custom-alert alert-outline-danger alert-danger-shadow mb-0 fade show" role="alert">
                            <i class="mdi mdi-alert-outline alert-icon"></i>
                            <div class="alert-text">
                                <?php echo $fmsg ?>
                            </div>
                        </div>
                    <?php } ?>

                    <h1 class="mt-0 header-title text-center">Register Your Shop </h1>
                    <form enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="username">Shop name</label>

                                    <input required type="text" class="form-control" name="sname" id="ShopName" placeholder="Enter Shop name">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="username">Ownername</label>

                                    <input required type="text" class="form-control" name="soname" id="Ownername" placeholder="Enter Shop Ownername">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="username">E-mail (used for login)</label>

                                    <input required type="text" class="form-control" name="soemail" id="E-mail" placeholder="Enter Shop e-mail">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="username">Mobile</label>

                                    <input required type="number" class="form-control" name=somobile id="Mobile" placeholder="Enter Shop Mobile Number" autocomplete="off">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="username">Address</label>
                                    <textarea required class="form-control" id="Address" name="saddress" placeholder="Enter Shop Address" rows="4" cols="50"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="username">State</label>

                                    <input required type="text" class="form-control" name="sstate" id="State" placeholder="Enter State">

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>City</label>

                                    <input required type="text" class="form-control" name="scity" id="City" placeholder="Enter City">

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Pincode</label>

                                    <input required type="number" class="form-control" id="PinCode" name="spin" placeholder="Enter Pincode">

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Personal Contact</label>

                                    <input type="number" class="form-control" name="scontact" id="Contact" placeholder="Enter Owners Contact Number">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>GST Number of shop</label>

                                    <input required type="text" class="form-control" name="sgstno" placeholder="Enter shop GST Number">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Category</label>

                                    <input type="text" class="form-control" id="Category" name="scategory" placeholder="Category">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Password</label>

                                    <input required id="pass" type="password" class="form-control" name="spassword" id="password" placeholder="Enter password">

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input required data-parsley-equalto="#pass" type="password" class="form-control" name="cpassword" id="password" placeholder="Enter password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group" style="height:220px;">
                                    <label>Upload Shop Logo (optional) [ prefered size: 100x100, format: .png ]</label>
                                    <div class="custom-file mb-4">
                                        <input name="fileToUpload" type="file" id="input-file-now" class="dropify" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 row">
                            <div class="col-12 mt-2 text-center">
                                <button style="padding-right: 30px; padding-left: 30px" name="register" class="btn btn-primary waves-effect waves-light" type="submit" style="width: 50%;">Register Shop <i class="fas fa-sign-in-alt ml-1"></i></button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->

    </div>
    
    <!--end col-->
    <!-- </div> -->

    <!-- jQuery  -->
    <script src="../admin_plugins/js/jquery.min.js"></script>
    <script src="../admin_plugins/js/bootstrap.bundle.min.js"></script>
    <script src="../admin_plugins/js/metisMenu.min.js"></script>
    <script src="../admin_plugins/js/waves.min.js"></script>
    <script src="../admin_plugins/js/jquery.slimscroll.min.js"></script>
    <!-- Parsley js -->
    <script src="../admin_plugins/plugins/parsleyjs/parsley.min.js"></script>
    <script src="../admin_plugins/pages/jquery.validation.init.js"></script>
    <script src="../admin_plugins/js/jquery.core.js"></script>
    
    <script src="../admin_plugins/plugins/dropify/js/dropify.min.js"></script>
    <script src="../admin_plugins/pages/jquery.form-upload.init.js"></script>

    <!-- App js -->
    <script src="../admin_plugins/js/app.js"></script>

</body>

</html>