<?php
include '../access/shopaccesscontrol.php';

//get todays date
date_default_timezone_set('Asia/Kolkata');
$iadate = date('m/d/Y h:i a');

if (isset($_POST['additem'])) {
    //shop id
    $isid = $globalshopid;
    //subcat id
    $iscid = $_POST['isid'];

    $iname = $_POST['iname'];
    $ibrand = $_POST['ibrand'];
    $idesc = $_POST['idesc'];
    $istatus = $_POST['istatus'];

    $iprice = $_POST['iprice'];

    //search strings
    $isearch = 3;

    $query = mysqli_query($con, "select * from itemmaster where iname='$iname' and ibrand='$ibrand'");
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        $fmsg = "Item already Exists";
    } else {
        //check logo is uploaded or not
        $iimg = $_FILES["fileToUpload"]["name"];
        if (!empty($iimg)) {
            $target_dir = "../uploads/item/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            //check if file already exists
            if (file_exists($target_file)) {
                $fmsg .= "file already exists, ";
                $uploadOk = 0;
            }
            //check file size
            elseif ($_FILES["fileToUpload"]["size"] > 1000000) {
                $fmsg .= "Image size is more then 1Mb, please upload smaller size image  ";
                $uploadOk = 0;
            }

            //allowing certain file formats
            elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
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
        } else {
            $iimg = "default_egross.png";
        }

        $qry = mysqli_query($con, "insert into itemmaster (isid,iscid,iname,ibrand,idesc,istatus,iadate,iimg,iprice,isearch) values ('$isid','$iscid','$iname','$ibrand','$idesc','$istatus','$iadate','$iimg','$iprice','$isearch')");
        if ($qry) {
            $smsg = "Item Inserted successfully";
        } else {
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
                        
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Add Item</li>
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
                                <!--<strong>Well done! </strong>--><?php echo $smsg ?>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Add Item</h4>
                                    <hr>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Item Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Item Name" name="iname" required>
                                        </div>

                                        <div class="form-group">
                                            <!-- <div class="col-md-12"> -->
                                            <h6 class="input-title mt-0">Select Category</h6>
                                            <select class="select2 form-control mb-3 custom-select select2-hidden-accessible" name="isid" aria-hidden="true">
                                                <option selected hidden>Select Category</option>
                                                <?php
                                                $main = mysqli_query($con, "select * from mcat");
                                                while ($row = mysqli_fetch_assoc($main)) {
                                                    $id = $row["mcid"];
                                                ?>
                                                    <optgroup label="<?php echo $row["mcname"]; ?>">
                                                        <?php
                                                        $sub = mysqli_query($con, "select * from scat where smcid='$id'");
                                                        while ($row2 = mysqli_fetch_assoc($sub)) {
                                                        ?>
                                                            <option value="<?php echo $row2["scid"]; ?>"><?php echo $row2["scname"]; ?></option>
                                                        <?php } ?>
                                                    </optgroup>
                                                <?php } ?>
                                            </select>
                                            <!-- </div> -->
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand</label>
                                            <input type="text" class="form-control" name="ibrand" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Item Brand" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Description</label>
                                            <textarea class="form-control" name="idesc" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                        </div>

                                        <div class="form-group mb-0 row">
                                            <label class="col-md-2 control-label">State of item: </label>
                                            <div class="col-md-9" style="margin-top:-5px">
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio7" name="istatus" class="custom-control-input" value="1">
                                                        <label class="custom-control-label" for="customRadio7">Visible</label>
                                                    </div>
                                                </div>
                                                <div class="form-check-inline my-1">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio8" name="istatus" class="custom-control-input" value="0">
                                                        <label class="custom-control-label" for="customRadio8">Not visible</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Price</label>
                                            <input type="number" class="form-control" id="exampleInputPassword1" name="iprice" placeholder="Enter price in ₹">
                                        </div>

                                        <div class="form-group" style="height:250px;">
                                            <label>Upload Item Image [ prefered size: 400x400, format: .png ]</label>
                                            <div class="custom-file mb-4">
                                                <input name="fileToUpload" type="file" id="input-file-now" class="dropify" />
                                            </div>
                                        </div>


                                        <button type="submit" name="additem" class="btn btn-primary">Add</button>
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
    <script src="../admin_plugins/plugins/dropify/js/dropify.min.js"></script>
    <script src="../admin_plugins/pages/jquery.form-upload.init.js"></script>

</body>

</html>