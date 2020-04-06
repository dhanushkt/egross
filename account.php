<?php
include 'access/useraccesscontrol.php';
if (!$userlogin) {
    echo "<script>window.location.href='user-login.php'; </script>";
}
$uquery = mysqli_query($con, "SELECT * FROM user WHERE uid='$globaluserid'");
$userinfo = mysqli_fetch_assoc($uquery);

if (isset($_POST['changepsw'])) {
    $password = $userinfo['upassword'];
    $oldpass = md5($_POST['oldpsw']);
    $newpsw1 = md5($_POST['newpsw1']);
    $newpsw2 = md5($_POST['newpsw2']);
    if ($oldpass != $password) {
        $fmsg = "Old password does not match";
    } else {
        if ($newpsw1 != $newpsw2) {
            $fmsg = "Password does not match";
        } else {
            $updatepass = mysqli_query($con, "UPDATE user SET upassword='$npsw' WHERE uid='$globaluserid'");
            if ($updatepass) {
                $smsg = "Password Changed";
            } else {
                $fmsg = "Error";
            }
        }
    }
}
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phno = $_POST['phno'];
    $updatequery = mysqli_query($con, "UPDATE user SET uname='$name',uemail='$email',umobile='$phno'");
    if ($updatequery) {
        $uquery = mysqli_query($con, "SELECT * FROM user WHERE uid='$globaluserid'");
        $userinfo = mysqli_fetch_assoc($uquery);
        $_SESSION['uname'] = $userinfo['uname'];
        $smsg = "Record Updated Successfully";
    } else {
        $fmsg = "Error!!..";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'lander-pages/csslink.php'; ?>
    <style>
        .but {
            background-color: red;
            border: none;
            color: white;
            padding: 6px 6px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            margin-top: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;

        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        TD:nth-child(1) {
            font-weight: bold
        }

        .mycButton {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            font-family: 'Roboto', sans-serif;
            box-sizing: border-box;
            padding: 0;
            background-color: #333;
            outline: none;
            text-decoration: none;
            margin-top: 30px;
            -webkit-transition: 0.5s all ease;
            width: 100px;
            line-height: 40px;
            font-size: 18px;
            text-align: center;
            border: 1px solid #dedede;
            color: #dedede;
        }

        .mycButton:hover {
            background-color: transparent;
            color: #333;
        }

        .mycButtonaddr {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            font-family: 'Roboto', sans-serif;
            box-sizing: border-box;
            padding: 0;
            background-color: #333;
            outline: none;
            text-decoration: none;
            margin-top: 30px;
            -webkit-transition: 0.5s all ease;
            width: 200px;
            line-height: 40px;
            font-size: 18px;
            text-align: center;
            border: 1px solid #dedede;
            color: #dedede;
        }

        .mycButtonaddr:hover {
            background-color: transparent;
            color: #333;
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
        <script>
            function undisableField() {
                document.getElementById("myFieldset").disabled = false;
                document.getElementById("savebtn").removeAttribute("hidden");
                document.getElementById("editbtn").setAttribute("hidden", true);
                document.getElementById("tempdiv").setAttribute("hidden", true);
            }
        </script>
        <div class="relative full-width">
            <!-- Breadcrumb -->
            <div class="container-web relative">
                <div class="container">
                    <div class="row">
                        <div class="breadcrumb-web">
                            <ul class="clear-margin">
                                <li class="animate-default title-hover-red"><a href="index.php">Home</a></li>
                                <li class="animate-default title-hover-red"><a href="#">Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <!-- Content Checkout -->
            <div class="relative container-web">
                <div class="container">
                    <div class="row relative">

                        <!-- Content Shoping Cart -->
                        <div class="col-md-12 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">

                            <?php if (isset($fmsg)) { ?>
                                <!-- custom alert -->
                                <div class="alert" style="background-color: #eb1a21; color: white; border-radius: 0%;">
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

                            <div class="col-md-12 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left text-center">
                                <h1>ACCOUNT</h1>
                            </div>

                            <h3>MY ACCOUNT</h3>
                            <hr>
                            <div style="margin-top: 5px">
                                <h4>Account Details</h4>
                                <form method="POST">
                                    <fieldset id="myFieldset" disabled="true">
                                        <div class="form-input full-width clearfix relative">
                                            <label>User Name</label>
                                            <input class="full-width" type="text" name="name" value="<?php echo $userinfo['uname']; ?>">
                                        </div>
                                        <div class="form-input full-width clearfix relative">
                                            <label>E-mail</label>
                                            <input class="full-width" type="text" name="email" value="<?php echo $userinfo['uemail']; ?>">
                                        </div>
                                        <div class="form-input full-width clearfix relative">
                                            <label>Phone Number</label>
                                            <input class="full-width" type="text" name="phone" value="<?php echo $userinfo['umobile']; ?>">
                                        </div>
                                    </fieldset>
                                    <div class="form-input full-width clearfix relative">
                                        <div id="tempdiv" style="margin-top: 30px;"></div>
                                        <a href="JavaScript:Void(0);" style="padding-right: 25px; padding-left: 25px; padding-top: 10px; padding-bottom: 10px;" id="editbtn" onClick="undisableField()" class="mycButton"> <i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

                                        <button id="savebtn" hidden class="mycButton" name="update" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Update</button>
                                    </div>
                                </form>
                            </div>

                            <div>
                                <div style="margin-top: 7%">
                                    <h4>Primary Address</h4>

                                    <table>
                                        <tr>
                                            <td>FULL NAME:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>ADDRESS LINE1:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>ADDRESS LINE2:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>CITY:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>DISTRICT:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>STATE:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>PINCODE:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>E-MAIL:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>PHONE:</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>ALT-PHONE:</td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <div class="form-input full-width clearfix relative">
                                        <button class="mycButtonaddr"><i class="fa fa-pencil" aria-hidden="true"></i> Manage Address</button>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div style="margin-top: 7%">
                                    <h4>Order History</h4>
                                    <hr>
                                    <table>
                                        <tr>
                                            <th>ORDER</th>
                                            <th>DATE</th>
                                            <th>PAYMENT STATUS</th>
                                            <th>FULFILMENT STATUS</th>
                                            <th>TOTAL</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                            <div>
                                <div style="margin-top: 7%">
                                    <h4>Change Password</h4>
                                    <form method="POST">
                                        <div class="form-input full-width clearfix relative">
                                            <label>Old password</label>
                                            <input class="full-width" type="password" name="oldpsw">
                                        </div>
                                        <div class="form-input full-width clearfix relative">
                                            <label>New password</label>
                                            <input class="full-width" type="password" name="newpsw1">
                                        </div>
                                        <div class="form-input full-width clearfix relative">
                                            <label>Confirm new password</label>
                                            <input class="full-width" type="password" name="newpsw2">
                                        </div>
                                        <div class="form-input full-width clearfix relative">
                                            <button class="mycButton" name="changepsw"><i class="fa fa-refresh" aria-hidden="true"></i> Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                    </div>
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
        </footer>
    </div>
    <!-- End Footer Box -->
    <?php include 'lander-pages/jslinks.php'; ?>
</body>

</html>