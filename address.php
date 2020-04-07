<?php
include 'access/useraccesscontrol.php';

if (!$userlogin) {
    echo "<script>window.location.href='user-login.php'; </script>";
}

if (isset($_GET['addrid'])) {
    $addrid = $_GET['addrid'];

    $getaddrinfo = mysqli_query($con, "SELECT * FROM user_address WHERE (uaddrid=$addrid AND auid=$globaluserid)");
    if (mysqli_num_rows($getaddrinfo) >= 1)
        $getaddr = mysqli_fetch_assoc($getaddrinfo);
    else
        echo "<script>window.location.href='account.php'; </script>";
}

//check for default address
$checkaddress = mysqli_query($con, "SELECT * FROM user_address WHERE auid='$globaluserid'");
$getaddresscount = mysqli_num_rows($checkaddress);


if ($getaddresscount >= 1) {
    $getaddressdetail = mysqli_fetch_assoc($checkaddress);
    $addrerssid = $getaddressdetail['uaddrid'];
    $def = 0;
} else {
    $def = 1;
}

if (isset($_POST['addrsubmit'])) {
    //check address
    $checkaddress = mysqli_query($con, "SELECT * FROM user_address WHERE auid='$globaluserid'");
    $getaddresscount = mysqli_num_rows($checkaddress);


    if ($getaddresscount >= 1) {
        $getaddressdetail = mysqli_fetch_assoc($checkaddress);
        $addrerssid = $getaddressdetail['uaddrid'];
        $def = 0;
    } else {
        $def = 1;
    }

    $aphone = 0;
    $remail = 0;

    $fullname = $_POST['fullname'];
    $add1 = $_POST['addr1'];
    $add2 = $_POST['addr2'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $rphone = $_POST['rphone'];

    if (!empty($_POST['aphone']))
        $aphone = $_POST['aphone'];

    if (isset($_POST['remail']))
        $remail = $_POST['remail'];

    $auid = $globaluserid;
    if (isset($_POST['default'])) {
        $updatepervdef = mysqli_query($con, "UPDATE user_address SET adefault='0' WHERE uaddrid='$addrerssid'");
        $def = $_POST['default'];
    }

    $maddress = mysqli_query($con, "INSERT INTO user_address (auid,afullname,addrline1,addrline2,acity,adistrict,astate,apin,arphone,aaphone,aemail,adefault) VALUES ('$auid','$fullname','$add1','$add2','$city','$district','$state','$pin','$rphone','$aphone','$remail','$def')");
    if ($maddress) {
        $smsg = "Address Added Successfully";
        //echo "<script>window.setTimeout(function(){ window.location.replace('account.php'); }, 2000);</script>";
    } else {
        $fmsg = mysqli_error($con);
    }
}

//update addr
if (isset($_POST['updateaddr'])) {
    $aphone = 0;
    $remail = 0;

    $fullname = $_POST['fullname'];
    $rowadd1 = $_POST['addr1'];
    $add1 = str_replace("'", "", $rowadd1);
    $rowadd2 = $_POST['addr2'];
    $add2 = str_replace("'", "", $rowadd2);
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $rphone = $_POST['rphone'];

    if (!empty($_POST['aphone']))
        $aphone = $_POST['aphone'];

    if (isset($_POST['remail']))
        $remail = $_POST['remail'];

    $auid = $globaluid;

    $maddress = mysqli_query($connection, "UPDATE user_address SET afullname='$fullname', addrline1='$add1', addrline2='$add2', acity='$city', adistrict='$district', astate='$state', apin='$pin', arphone='$rphone', aaphone='$aphone', aemail='$remail' WHERE uaddrid = '$addrid'");
    if ($maddress) {
        $smsg = "Address Updated Successfully";
        echo "<script>window.setTimeout(function(){ window.history.back(); }, 2000);</script>";
    } else {
        $fmsg = mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'lander-pages/csslink.php'; ?>
    <style>
        .mycButton {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 35px;
            padding-right: 35px;
            border-radius: 0%;
            background: #e3171b !important;
            text-transform: capitalize;
            outline: none;
            border: none;
            color: white;
        }

        .mycButton:hover {
            background: #333 !important;
            color: white;
        }

        /* custom checkbox */
        .containerchkbox {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .containerchkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .containerchkbox:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a blue background */
        .containerchkbox input:checked~.checkmark {
            background-color: #e3171b;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .containerchkbox input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .containerchkbox .checkmark:after {
            left: 9px;
            top: 6px;
            width: 7px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
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
                                <li class="animate-default title-hover-red"><a href="account.php">Account</a></li>
                                <li class="animate-default title-hover-red"><a href="#">Address</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <!-- Content Checkout -->
            <div class="relative container-web">
                <div class="container">
                    <form method="post">
                        <div class="row relative">
                            <?php if (isset($fmsg)) { ?>
                                <!-- custom alert -->
                                <div class="alert" style="background-color: #eb1a21; color: white;border-radius: 0%;">
                                    <div class="alert-text">
                                        <?php echo $fmsg; ?>
                                    </div>
                                </div>
                            <?php } else if (isset($smsg)) { ?>
                                <div class="alert" style="background-color: #3cb878; border-radius: 0%;">
                                    <div class="alert-text">
                                        <?php echo $smsg; ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <!-- Content Shoping Cart -->
                            <div class="col-md-12 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
                                <?php if (isset($addrid)) { ?>
                                    <p class="title-shoping-cart">Edit address</p>
                                <?php } else { ?>
                                    <p class="title-shoping-cart">Add a new address</p>
                                <?php } ?>
                                <div class="relative clearfix full-width">
                                    <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Full Name*</label>
                                        <input <?php if (isset($addrid)) {
                                                    echo "value=" . $getaddr["afullname"];
                                                } ?> required class="full-width" type="text" name="fullname">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
                                        <label>Email</label>
                                        <input <?php if (isset($addrid)) {
												echo "value=" . $getaddr['aemail'];
											} ?> class="full-width" type="text" name="remail">
                                    </div>
                                </div>

                                <div class="relative clearfix full-width">
                                    <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>Number*</label>
                                        <input <?php if (isset($addrid)) {
												echo "value=" . $getaddr['arphone'];
											} ?> required class="full-width" type="text" name="rphone">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
                                        <label>Alternate Number</label>
                                        <input <?php if (isset($addrid)) {
												echo "value=" . $getaddr['aaphone'];
											} ?> class="full-width" type="text" name="aphone">
                                    </div>
                                </div>


                                <div class="form-input full-width clearfix relative">
                                    <label>House No, Building name*</label>
                                    <input required <?php if (isset($addrid)) {
												echo "value=" . $getaddr['addrline1'];
											} ?> class="full-width" type="text" name="addr1">
                                </div>

                                <div class="form-input full-width clearfix relative">
                                    <label>Road Name,Area,Colony*</label>
                                    <input required <?php if (isset($addrid)) {
												echo "value=" . $getaddr['addrline2'];
											} ?> class="full-width" type="text" name="addr2">
                                </div>

                                <div class="relative clearfix full-width">
                                    <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>City *</label>
                                        <input required <?php if (isset($addrid)) {
												echo "value=" . $getaddr['acity'];
											} ?> class="full-width" type="text" name="city">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
                                        <label>District *</label>
                                        <input <?php if (isset($addrid)) {
												echo "value=" . $getaddr['adistrict'];
											} ?> class="full-width" type="text" name="district">
                                    </div>
                                </div>



                                <div class="relative clearfix full-width">
                                    <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
                                        <label>State *</label>
                                        <input <?php if (isset($addrid)) {
												echo "value=" . $getaddr['astate'];
											} ?> required class="full-width" type="text" name="state">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
                                        <label>Pincode</label>
                                        <input required <?php if (isset($addrid)) {
												echo "value=" . $getaddr['apin'];
											} ?> class="full-width" type="number" name="pin">
                                    </div>
                                </div>
                                <?php if ($def == 0 && !(isset($addrid))) { ?>
                                    <div class="form-input full-width clearfix relative">
                                        <label class="containerchkbox">Set as default address ?
                                            <input name="default" value="1" type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                <?php } ?>
                                <?php if (isset($addrid)) { ?>
                                    <button type="submit" name="updateaddr" style="margin-top: 30px;" class="mycButton">update address</button>
                                <?php } else { ?>
                                    <button type="submit" name="addrsubmit" style="margin-top: 30px;" class="mycButton">add address</button>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
        </div>
        <!-- End Content Box -->
        <!-- Footer Box -->
        <?php include 'lander-pages/footer.php'; ?>
    </div>
    <!-- End Footer Box -->
    <?php include 'lander-pages/jslinks.php'; ?>
</body>

</html>