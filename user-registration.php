<?php
include 'access/useraccesscontrol.php';

if($userlogin)
{
    echo "<script>window.location.href='index.php'; </script>";
}

//button name: register
if (isset($_POST['register'])) {
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $cmobile = $_POST['cmobile'];
    $apassword = md5($_POST['apassword']);
    $cpassword = md5($_POST['cpassword']);

    if ($apassword != $cpassword) {
        $fmsg = "Passwords do not match";
    } else {

        $check = mysqli_query($con, "SELECT * from user WHERE uemail='$cemail' OR umobile='$cmobile'");
        $count = mysqli_num_rows($check);
        if ($count > 0) {
            $fmsg = "User already Exists";
        } else {
            $query = mysqli_query($con, "INSERT INTO user (uname,uemail,umobile,upassword) VALUES ('$cname','$cemail','$cmobile','$apassword')");
            if ($query) {
                $smsg = "User Registered";
            } else {
                echo $fmsg = "Registration Falied";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'lander-pages/csslink.php'; ?>
</head>

<body>
    <!-- push menu-->
    <?php include 'lander-pages/pushmenu.php'; ?>
    <!-- end push menu-->
    <!-- Menu Mobile -->
    <?php include 'lander-pages/mobilemenu.php'; ?>
    <!-- Header Box -->
    <div class="wrappage">
        <?php include 'lander-pages/header.php'; ?>
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
                                <li class="animate-default title-hover-red"><a href="user-registration.php">Register</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <!-- Content Checkout -->
            <form method="POST">
                <?php $msg ?>
                <div class="relative container-web">
                    <div class="container">
                        <div class="row relative cmargin-login">
                            <!-- Content Shoping Cart -->
                            <div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left ">

                                <?php if (isset($fmsg)) { ?>
                                    <!-- custom alert -->
                                    <div class="alert" style="background-color: #eb1a21; color: white;">
                                        <div class="alert-text">
                                            <?php echo $fmsg; ?>
                                        </div>
                                    </div>
                                <?php } else if (isset($smsg)) { ?>
                                    <div class="alert" style="background-color: #3cb878">
                                        <div class="alert-text">
                                            <?php echo $smsg; ?> , Proceed to <a href="user-login.php">login</a>
                                        </div>
                                    </div>
                                <?php } ?>

                                
                                <div class="relative clearfix full-width">
                                    <div class="col-md-10 col-sm-10 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Enter the Name *</label>
                                        <input required class="full-width" type="text" name="cname">
                                    </div>
                                </div>
                                <div class="relative clearfix full-width">
                                    <div class="col-md-10 col-sm-10 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Email Address *</label>
                                        <input required class="full-width" type="text" name="cemail">
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-10 col-sm-10 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Phone *</label>
                                        <input required class="full-width" type="text" name="cmobile">
                                    </div><br>
                                </div>


                                <div class="relative full-width clearfix">
                                    <div class="col-md-10 col-sm-10 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Enter Password *</label>
                                        <input required class="full-width" type="password" name="apassword">
                                    </div>
                                </div>
                                <div>
                                    <div class="col-md-10 col-sm-10 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Re-Enter Password *</label>
                                        <input required class="full-width" type="password" name="cpassword">
                                    </div>
                                </div>
                                <!--creating account-->
                                <!--shipping details-->
                                <!--order note-->
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input" style="padding-bottom: 25px">
                                <div class="relative justify-content form-login-checkout">
                                    <button type="submit" class="animate-default button-hover-red" name="register">REGISTER</button>
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
            <div class=" support-box full-width bg-red support_box_v2">
                <div class="container-web">
                    <div class=" container">
                        <div class="row">
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
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
                            </div>
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

</html>