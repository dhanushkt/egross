<?php
include 'access/useraccesscontrol.php';


if(isset($_POST['addItem']))
{
    date_default_timezone_set('Asia/Kolkata');
    $iadate=date("l, d-m-Y  h:i A");
    $isid=0;
    $iscid=0;
    $iname=$_POST['iname'];
    $ibrand=$_POST['ibrand'];
    if($_POST['idesc']=="")
    {
        $idesc="";
    }
    else{
        $idesc=$_POST['idesc'];
    }
    
    $istatus=0;
    $iimg="default_citem_egross.png";
    $iprice=$_POST['iprice'];
    $itype="custom";
    $query=mysqli_query($con,"insert into itemmaster (isid,iscid,iname,ibrand,idesc,istatus,iadate,iimg,iprice,itype) values ('$isid','$iscid','$iname','$ibrand','$idesc','$istatus','$iadate','$iimg','$iprice','$itype')");
    if($query)
    {
        $sucMsg="Item Added";
    }
    else{
        $errMsg="Error!!!";
    }
}

//button name: register
// if (isset($_POST['register'])) {
//     $cname = $_POST['cname'];
//     $cemail = $_POST['cemail'];
//     $cmobile = $_POST['cmobile'];
//     $apassword = md5($_POST['apassword']);
//     $cpassword = md5($_POST['cpassword']);

//     if ($apassword != $cpassword) {
//         $fmsg = "Passwords do not match";
//     } else {

//         $check = mysqli_query($con, "SELECT * from user WHERE uemail='$cemail' OR umobile='$cmobile'");
//         $count = mysqli_num_rows($check);
//         if ($count > 0) {
//             $fmsg = "User already Exists";
//         } else {
//             $query = mysqli_query($con, "INSERT INTO user (uname,uemail,umobile,upassword) VALUES ('$cname','$cemail','$cmobile','$apassword')");
//             if ($query) {
//                 $user_id = mysqli_insert_id($con);
//                 $smsg = "User Registered";
//                 $getlistno = mysqli_query($con, "SELECT clistno FROM custom_list");
//                 $getlistnofetch = mysqli_fetch_assoc($getlistno);
//                 do {
//                     $generatedlistno = random_int(10000, 99999);
//                 } while ($getlistnofetch['clistno'] == $generatedlistno);
//                 date_default_timezone_set('Asia/Kolkata');
//                 $date = date("l, d-m-Y  h:i A");
//                 $cl_name="wishlist";
//                 $createnewlist = mysqli_query($con, "INSERT INTO custom_list (clistno,cl_name,cl_uid,cl_timestamp) VALUES ('$generatedlistno','$cl_name','$user_id','$date')");
//             } else {
//                 echo $fmsg = "Registration Falied";
//             }
//         }
//     }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'lander-pages/csslink.php'; ?>
</head>

<body onload="myFunction()">


    <div id="loading"></div>
    <!-- push menu-->
    <?php include 'lander-pages/pushmenu.php'; ?>
    <!-- end push menu-->
    <!-- Menu Mobile -->
    <?php include 'lander-pages/mobilemenu.php'; ?>
    <!-- Header Box -->
    <div class="wrappage">
        <?php include 'lander-pages/header.php'; ?>
        <?php include 'mobile-search.php'; ?>

        <!-- End Header Box -->
        <!-- Content Box -->
        <div class="relative full-width">
            <!-- Breadcrumb -->
            <div class="container-web relative">
                <div class="container">
                    <div class="row">
                        <div class="breadcrumb-web">
                            <ul class="clear-margin">
                                <li class="animate-default title-hover-red"><a href="index.php">Home</a></li>
                                <li class="animate-default title-hover-red"><a href="user-registration.php">Add-custom-item</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <!-- Content Checkout -->
            <form method="POST">
                <div class="relative container-web">
                    <div class="container">
                        <div class="row relative cmargin-login">
                            <!-- Content Shoping Cart -->
                            <div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left ">

                               

                                <?php if (isset($errMsg)) { ?>
                                    <!-- custom alert -->
                                    <div class="alert" style="background-color: #eb1a21; color: white;">
                                        <div class="alert-text">
                                            <?php echo $errMsg; ?>
                                        </div>
                                    </div>
                                <?php } else if (isset($sucMsg)) { ?>
                                    <div class="alert" style="background-color: #3cb878">
                                        <div class="alert-text">
                                            <?php echo $sucMsg; ?> 
                                        </div>
                                    </div>
                                <?php } ?>

                                <div class="relative clearfix full-width">
                                    <div class="col-md-10 col-sm-10 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Item Name *</label>
                                        <input required class="full-width" type="text" name="iname">
                                    </div>
                                </div>
                                <div class="relative clearfix full-width">
                                    <div class="col-md-10 col-sm-10 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Brand *</label>
                                        <input required class="full-width" type="text" name="ibrand">
                                    </div>
                                </div>
                                <div class="relative clearfix full-width">
                                    <div class="col-md-10 col-sm-10 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Discription</label>
                                        <textarea class="form-control" rows="3" name="idesc"></textarea>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-10 col-sm-10 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Price</label>
                                        <input required class="full-width" type="number" name="iprice">
                                    </div><br>
                                </div>

                                <!--creating account-->
                                <!--shipping details-->
                                <!--order note-->
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input" style="padding-bottom: 25px">
                                <div class="relative justify-content form-login-checkout">
                                    <button type="submit" class="animate-default button-hover-red" name="addItem">ADD ITEM</button>
                                </div>
                            </div>
                            <!-- End Content Shoping Cart -->
                            <!-- Content Right -->
                            <!-- End Content Right -->
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Content Checkout -->
            <!-- Support -->
            <div class=" support-box full-width clear-padding bottom-margin-default">
                <div class="container-web">
                    <div class=" container">
                        <div class="row">
                            <!--<div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="img/icon_free_ship_white-min.png" alt="Icon Free Ship" class="absolute" />
                                <p>free shipping</p>
                                <p>on order over $500</p>
                            </div>
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="img/icon_support_white-min.png" alt="Icon Supports" class="absolute">
                                <p>support</p>
                                <p>life time support 24/7</p>
                            </div>
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="img/icon_patner_white-min.png" alt="Icon partner" class="absolute">
                                <p>help partner</p>
                                <p>help all aspects</p>
                            </div>
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="img/icon_phone_table_white-min.png" alt="Icon Phone Tablet" class="absolute">
                                <p>contact with us</p>
                                <p>+07 (0) 7782 9137</p>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Support Box -->
        </div>
        <!-- End Content Box -->
        <!-- Footer Box -->
        <?php include 'lander-pages/footer.php'; ?>
    </div>
    <!-- End Footer Box -->
    <?php include 'lander-pages/jslinks.php'; ?>
</body>
<script>
    var preloader = document.getElementById("loading");

    function myFunction() {
        preloader.style.display = 'none';
    };
</script>

</html>