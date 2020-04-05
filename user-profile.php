<?php
include 'access/useraccesscontrol.php';
if (!$userlogin) {
    echo "<script>window.location.href='user-login.php'; </script>";
}
$uquery = mysqli_query($con, "SELECT * FROM user WHERE uid='$globaluserid'");
$userinfo = mysqli_fetch_assoc($uquery);
$password = $userinfo['upassword'];
if (isset($_POST['changepsw'])) {
    $oldpass = md5($_POST['oldpsw']);
    $newpsw1 = $_POST['newpsw1'];
    $newpsw2 = $_POST['newpsw2'];
    if ($oldpass != $password) {
        $passemsg = "Old Password not matching";
    } else {
        $npsw = md5($newpsw1);
        $updatepass = mysqli_query($con, "UPDATE user SET upassword='$npsw' WHERE uid='$globaluserid'");
        if ($updatepass) {
            $smsg = "Password Changed";
        } else {
            $emsg = "Error";
        }
    }
    if ($newpsw1 != $newpsw2) {
        $pswemsg = "Password Not Matching";
    }
}
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phno=$_POST['phno'];
    $updatequery=mysqli_query($con,"UPDATE user SET uname='$name',uemail='$email',umobile='$phno'");
    if($updatequery)
    {
        $success="Record Updated Successfully";
    }
    else
    {
        $error="Error!!..";
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

                            <div class="col-md-12 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left text-center">
                                <h1>ACCOUNT</h1>
                            </div>

                            <h3>MY ACCOUNT</h3>
                            <hr>
                            <div style="margin-top: 5px">
                                <h4>Account Details</h4>
                                <form method="POST">
                                    <div class="form-input full-width clearfix relative">
                                        <label>Name</label>
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
                                    <div class="form-input full-width clearfix relative">
                                        <button class="mycButton"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                                        <button class="mycButton" name="update"><i class="fa fa-check" aria-hidden="true"></i> Update</button>
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
                                        <?php if (isset($smsg)) { ?>
                                            <div class="alert" style="background-color: #3cb878">
                                                <div class="alert-text">
                                                    <?php echo $smsg; ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($passemsg)) { ?>
                                            <div class="alert" style="background-color: #eb1a21; color: white;">
                                                <div class="alert-text">
                                                    <?php echo $passemsg; ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($emsg)) { ?>
                                            <div class="alert" style="background-color: #eb1a21; color: white;">
                                                <div class="alert-text">
                                                    <?php echo $emsg; ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if (isset($pswemsg)) { ?>
                                            <div class="alert" style="background-color: #eb1a21; color: white;">
                                                <div class="alert-text">
                                                    <?php echo $pswemsg; ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="form-input full-width clearfix relative">
                                            <label>Old password</label>
                                            <input class="full-width" type="text" name="oldpsw">
                                        </div>
                                        <div class="form-input full-width clearfix relative">
                                            <label>New password</label>
                                            <input class="full-width" type="text" name="newpsw1">
                                        </div>
                                        <div class="form-input full-width clearfix relative">
                                            <label>Confirm new password</label>
                                            <input class="full-width" type="text" name="newpsw2">
                                        </div>
                                        <div class="form-input full-width clearfix relative">
                                            <button class="mycButton" name="changepsw"><i class="fa fa-refresh" aria-hidden="true"></i> Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- End Content Shoping Cart -->
                            <!-- Content Right -->
                            <!--<div class="col-md-4 col-sm-12 col-xs-12 right-content-shoping relative clear-padding-right">
						<p class="title-shoping-cart">Your Order</p>
						<div class="full-width relative overfollow-hidden">
							<div class="relative clearfix full-width product-order-sidebar border no-border-t no-border-r no-border-l">
								<div class="image-product-order-sidebar center-vertical-image">
									<img src="img/product_home_5-min.png" alt="" />
								</div>
								<div class="relative info-product-order-sidebar">
									<p class="title-product top-margin-15-default animate-default title-hover-black"><a href="#">Endeavor Daytrip Backpack x1</a></p>
									<p class="price-product">$350.00</p>
								</div>
							</div>
							<div class="relative clearfix full-width product-order-sidebar border no-border-t no-border-r no-border-l">
								<div class="image-product-order-sidebar center-vertical-image">
									<img src="img/img_product_small_9-min.png" alt="" />
								</div>
								<div class="relative info-product-order-sidebar">
									<p class="title-product top-margin-15-default animate-default title-hover-black"><a href="#">Diam Special08 x1</a></p>
									<p class="price-product">$350.00</p>
								</div>
							</div>
						</div>
						<p class="title-shoping-cart">Cart Total</p>
						<div class="full-width relative cart-total bg-gray  clearfix">
							<div class="relative justify-content bottom-padding-15-default border no-border-t no-border-r no-border-l">
								<p>Subtotal</p>
								<p class="text-red price-shoping-cart">$700.00</p>
							</div>
							<div class="relative border top-margin-15-default bottom-padding-15-default no-border-t no-border-r no-border-l">
								<p class="bottom-margin-15-default">Shipping</p>
								<div class="relative justify-content">
									<ul class="check-box-custom title-check-box-black clear-margin clear-margin">
										<li>
											<label>Free Shipping
												<input type="radio" name="shiping-order" checked="">
			  									<span class="checkmark"></span>
			  								</label>
										</li>
										<li>
											<label>Standard
												<input type="radio" name="shiping-order">
			  									<span class="checkmark"></span>
			  								</label>
										</li>
										<li>
											<label>Local Pickup
												<input type="radio" name="shiping-order">
			  									<span class="checkmark"></span>
			  								</label>
										</li>
									</ul>
									<p class="price-gray-sidebar">$20.00</p>
								</div>
								<div onclick="optionShiping(this)" class="relative full-width select-ship-option justify-content top-margin-15-default">
									<p class="border no-border-r no-border-l no-border-t">Calculate Shipping</p>
									<i class="fa fa-caret-down" aria-hidden="true"></i>
									<ul class="clear-margin absolute full-width">
										<li onclick="selectOptionShoping(this)">Calculate Shipping 1</li>
										<li onclick="selectOptionShoping(this)">Calculate Shipping 2</li>
										<li onclick="selectOptionShoping(this)">Calculate Shipping 3</li>
									</ul>
								</div>
							</div>
							<div class="relative justify-content top-margin-15-default">
								<p class="bold">Total</p>
								<p class="text-red price-shoping-cart">$700.00</p>
							</div>
						</div>
						<div class="full-width relative payment-box bg-gray top-margin-15-default clearfix">
							<ul class="check-box-custom list-radius title-check-box-black clear-margin clear-margin">
								<li>
									<label class="">Check Payment
										<input type="radio" name="payment" checked="">
	  									<span class="checkmark"></span>
	  								</label>
	  								<br><p class="info-payment">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
								</li>
								<li>
									<label class="">Paypal <img class="left-margin-15-default" src="img/logo_payment-min.png" alt="Logo Paypal" />
										<input type="radio" name="payment">
	  									<span class="checkmark"></span>
	  								</label>
								</li>
							</ul>
						</div>
						<button class="btn-proceed-checkout full-width top-margin-15-default">Proceed to Checkout</button>
					    </div>-->
                            <!-- End Content Right -->

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