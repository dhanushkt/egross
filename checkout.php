<?php
include 'access/useraccesscontrol.php';

if (!$userlogin) {
	echo "<script>window.location.href='user-login.php'; </script>";
}

if(!isset($_GET['list']) && !isset($_GET['type'])){
	echo "<script>window.location.href='list.php';</script>";
} else {
$method = $_GET['type'];
$listno = $_GET['list'];
}

if($method=="offline"){
	$checkuserlist = mysqli_query($con, "SELECT * FROM user_list JOIN shopkeeper ON user_list.lsid=shopkeeper.sid WHERE user_list.listno='$listno' AND user_list.luid='$globaluserid'");
    if (mysqli_num_rows($checkuserlist) == 0) {
        echo "<script>window.location.href='index.php'; </script>";
    } else {
        $cart = true;
    }

    $getlistinfo = mysqli_fetch_assoc($checkuserlist);
	$storename = $getlistinfo['sname'];
	
	$getallitems = mysqli_query($con, "SELECT * FROM user_listitems JOIN itemmaster ON user_listitems.litmid=itemmaster.itmid WHERE user_listitems.listno='$listno'");
    if (mysqli_num_rows($getallitems) == 0) {
        echo "<script>window.location.href='list.php'; </script>";
    }
}

if ($method == "online") {
	$getaddresssall = mysqli_query($con, "SELECT * FROM user_address WHERE adefault=1 AND auid=$globaluserid");
	//check if user has default address or not
	if (mysqli_num_rows($getaddresssall) <= 0) {
		echo '<script>alert("Please Select Default Address Before Checkout")</script>';
		echo "<script>window.location.href='view-address.php';</script>";
	}

	$getaddresss = mysqli_fetch_assoc($getaddresssall);
	//$getcartitem = mysqli_query($con, "SELECT * FROM user_cart JOIN itemmaster ON user_cart.citmid = itemmaster.itmid WHERE user_cart.cuid = '$globaluserid'");
	$getcartitem = mysqli_query($con, "SELECT * FROM user_listitems JOIN itemmaster ON user_listitems.litmid=itemmaster.itmid WHERE user_listitems.listno='$listno'");
	if (mysqli_num_rows($getcartitem) <= 0) {
		echo "<script>window.location.href='list.php'; </script>";
	}
}

$subtot = 0;
$shipping = 100;
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'lander-pages/csslink.php'; ?>
	<style>
        .qty-input {
            /* border: 1px solid black; */
            height: 35px;
            position: relative;
            width: 100px;
        }

        .qty-input p {
            display: inline-block;
            text-align: center;
            height: 30px;
            margin: 0px;
            position: relative;
        }

        .qty-input i {
            cursor: pointer;
            font-family: serif;
            height: 30px;
            float: left;
            line-height: 29px;
            text-align: center;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-transition: all 150ms ease-out;
            transition: all 150ms ease-out;
            width: 22px;
        }

        .qty-input i:active {
            background-color: #F1F1F1;
            -webkit-transition: none;
            transition: none;
        }

        .qty-input input {
            /* border: 0px solid; */
            /* float: left; */
            float: right;
            font-size: 15px;
            height: 35px;
            /* height: 30px; */
            text-align: center;
            outline: none;
            width: 40px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .mycButton {
            padding: 10px;
            background: white;
            box-shadow: 0px 0px 0px transparent;
            border: 0px solid transparent;
            text-shadow: 0px 0px 0px transparent;
        }

        .mycButton:hover {
            color: #eb1a21;
            box-shadow: 0px 0px 0px transparent;
            border: 0px solid transparent;
            text-shadow: 0px 0px 0px transparent;
        }

        .mycartButton {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            font-family: 'Roboto', sans-serif;
            box-sizing: border-box;
            padding: 0;
            background-color: transparent;
            outline: none;
            text-decoration: none;
            margin: 0 !important;
            -webkit-transition: 0.5s all ease;
            width: calc(100% / 2 - 20px);
            line-height: 40px;
            font-size: 18px;
            text-align: center;
            border: 1px solid #dedede;
            color: #333;
        }

        .mycartButton:hover {
            background-color: #333;
            color: #dedede;
        }

        .customHoverRow:hover .mycButton {
            background-color: #ebebeb;
        }

        .customHoverRow:hover {
            background-color: #ebebeb;
        }

        .saveBtn:hover {
            background-color: #333;
            color: #dedede;
        }
    </style>
</head>

<body>
	<script src="lander_plugins/js/toast.js"></script>
	<script>
		$(document).ready(function() {
			$('.placeOrder').click(function() {
				var options = {
					style: {
						main: {
							background: "#38c21b",
							color: "white",
							'box-shadow': '0 0 0px rgba(0, 0, 0, .9)',
							'width': '400px',
						}
					}
				};
				$(this).button('loading');
				var getid = document.getElementById('listId').value;
				var orderType = document.getElementById('orderType').value;
				var orderNotes = "";
				if(orderType=='online'){
					orderNotes = document.getElementById('orderNotes').value;
				}
				var btn = $(this);
				$.ajax({
					url: 'add-order.php',
					type: 'POST',
					data: {
						id: getid,
						type: orderType,
						notes: orderNotes,
					},
					success: function() {
						iqwerty.toast.Toast('Order is placed', options);
						window.setTimeout(function() {
							window.location.href = 'account.php';
						}, 1000);
					}
				});
			});
		});
	</script>
	
	<!-- push menu-->
	<?php include 'lander-pages/pushmenu.php'; ?>
	<!-- end push menu-->
	<!-- Menu Mobile -->
	<?php include 'lander-pages/mobilemenu.php'; ?>
	<!-- Header Box -->
	<div class="wrappage">
		<?php include 'lander-pages/header.php'; ?>
		<!-- End Header Box -->
		<!-- order placement info for ajax -->
		<input type="hidden" value="<?php echo $_GET['list']; ?>" id="listId">
		<input type="hidden" value="<?php echo $_GET['type']; ?>" id="orderType">
		<!-- info end -->
		<!-- Content Box -->
		<div class="relative full-width">
			<!-- Breadcrumb -->
			<div class="container-web relative">
				<div class="container">
					<div class="row">
						<div class="breadcrumb-web">
							<ul class="clear-margin">
								<li class="animate-default title-hover-red"><a href="#">Home</a></li>
								<li class="animate-default title-hover-red"><a href="#">Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- End Breadcrumb -->
			<!-- Content Checkout -->
			<?php if ($method == "online") { ?>
				<div class="relative container-web">
					<div class="container">
						<div class="row relative">

							<!-- Content Shoping Cart -->
							<div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
								<p class="title-shoping-cart">Shipping Details (Default address is selected)</p>
								<div class="relative clearfix full-width">
									<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
										<label>First Name *</label>
										<input class="full-width" type="text" value="<?php echo $getaddresss['afullname']; ?>" name="firstname" readonly>
									</div>
									<!--<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
								<label>Last Name *</label>
								<input class="full-width" type="text" name="lastname">
							</div>-->
								</div>
								<!--<div class="form-input full-width clearfix relative">
							<label>Company Name</label>
							<input class="full-width" type="text" name="companyname">
						</div>-->
								<div class="relative clearfix full-width">
									<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
										<label>Email Address *</label>
										<input class="full-width" type="text" value="<?php echo $getaddresss['aemail']; ?>" name="firstname" readonly>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
										<label>Phone *</label>
										<input class="full-width" type="text" value="<?php echo $getaddresss['arphone']; ?>" name="lastname" readonly>
									</div>
								</div>
								<div class="form-input full-width clearfix relative">
									<label>Address *</label>
									<input class="full-width" type="text" value="<?php echo $getaddresss['addrline1']; ?>,<?php echo $getaddresss['addrline2']; ?>" name="address" readonly>
								</div>
								<div class="form-input full-width clearfix relative">
									<label>State *</label>
									<!--	<select class="full-width">
								<option value="1">Vietnamese</option>
								<option value="2">USA</option>
								<option value="3">Thailan</option>
								<option value="4">Russian</option>
                            </select>-->
									<input class="full-width" type="text" value="<?php echo $getaddresss['astate']; ?>" name="lastname" readonly>
								</div>
								<div class="relative full-width clearfix">
									<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
										<label>Postcode / ZIP *</label>
										<input class="full-width" type="text" value="<?php echo $getaddresss['apin']; ?>" name="firstname" readonly>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
										<label>Town / City *</label>
										<input class="full-width" type="text" value="<?php echo $getaddresss['acity']; ?>" name="lastname" readonly>
									</div>
								</div>
								<!-- <p class="title-shoping-cart">Shipping Details</p> -->
								<a href="view-address.php">
									<ul class="check-box-custom title-check-box-black list-radius clear-margin top-margin-default">
										<li>
											<i class="fa fa-home"></i>
											<label class="">Ship to a different address? </label>
										</li>
									</ul>
								</a>
								<div class="form-input clearfix full-width relative">
									<label>Order Note</label>
									<textarea id="orderNotes" placeholder="Notes about your order, e.g. special notes for delivery." class="full-width" name="ordernote" rows="4"></textarea>
								</div>
							</div>
							<!-- End Content Shoping Cart -->
							<!-- Content Right -->
							<div class="col-md-4 col-sm-12 col-xs-12 right-content-shoping relative clear-padding-right">
								<p class="title-shoping-cart">Your Order</p>
								<div class="full-width relative overfollow-hidden">
									<?php
									foreach ($getcartitem as $key => $getcartitem) {
									?>
										<div class="relative clearfix full-width product-order-sidebar border no-border-t no-border-r no-border-l">
											<div class="image-product-order-sidebar center-vertical-image">
												<img src="uploads/item/<?php echo $getcartitem['iimg']; ?>" alt="" />
											</div>
											<div class="relative info-product-order-sidebar">
												<p class="title-product top-margin-15-default animate-default title-hover-black"><a href="#"><?php echo $getcartitem['iname']; ?> (x<?php echo $getcartitem['lqty']; ?>)</a></p>
												<p class="price-product">₹<?php echo $getcartitem['iprice']; ?></p>
											</div>
										</div>

									<?php
										$subtot = $subtot + $getcartitem['iprice'];
										$total = $shipping + $subtot;
									} ?>
									<!--<div class="relative clearfix full-width product-order-sidebar border no-border-t no-border-r no-border-l">
								<div class="image-product-order-sidebar center-vertical-image">
									<img src="img/img_product_small_9-min.png" alt="" />
								</div>
								<div class="relative info-product-order-sidebar">
									<p class="title-product top-margin-15-default animate-default title-hover-black"><a href="#">Diam Special08 x1</a></p>
									<p class="price-product">$350.00</p>
							</div>
							</div>-->
								</div>
								<p class="title-shoping-cart">Cart Total</p>
								<div class="full-width relative cart-total bg-gray  clearfix">
									<div class="relative justify-content bottom-padding-15-default border no-border-t no-border-r no-border-l">
										<p>Subtotal</p>
										<p class="text-red price-shoping-cart">₹ <?php echo $subtot; ?></p>
									</div>
									<div class="relative border top-margin-15-default bottom-padding-15-default no-border-t no-border-r no-border-l">
										<p class="bottom-margin-15-default">Shipping</p>
										<div class="relative justify-content">
											<!-- <ul class="check-box-custom title-check-box-black clear-margin clear-margin">
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
									</ul> -->
											<p class="price-gray-sidebar">₹<?php echo $shipping ?></p>
											<p class="price-gray-sidebar">Date :
												<?php echo date('d-m-Y'); ?></p>

										</div>
										<!-- <div onclick="optionShiping(this)" class="relative full-width select-ship-option justify-content top-margin-15-default">
									<p class="border no-border-r no-border-l no-border-t">Calculate Shipping</p>
									<i class="fa fa-caret-down" aria-hidden="true"></i>
									<ul class="clear-margin absolute full-width">
										<li onclick="selectOptionShoping(this)">Calculate Shipping 1</li>
										<li onclick="selectOptionShoping(this)">Calculate Shipping 2</li>
										<li onclick="selectOptionShoping(this)">Calculate Shipping 3</li>
									</ul>
								</div> -->
									</div>
									<div class="relative justify-content top-margin-15-default">
										<p class="bold">Total</p>
										<p class="text-red price-shoping-cart">₹ <span id="newtotal"><?php echo $total; ?></span></p>


									</div>
								</div>
								<div class="full-width relative payment-box bg-gray top-margin-15-default clearfix">
									<ul class="check-box-custom list-radius title-check-box-black clear-margin clear-margin">
										<li>
											<label class="">Check Payment
												<input type="radio" name="payment" checked="">
												<span class="checkmark"></span>
											</label>
											<br>
											<p class="info-payment">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
										</li>
										<!-- <li>
										<label class="">Paypal <img class="left-margin-15-default" src="img/logo_payment-min.png" alt="Logo Paypal" />
											<input type="radio" name="payment">
											<span class="checkmark"></span>
										</label>
									</li> -->
									</ul>
								</div>
								<button data-id="<?php echo $getaddresss['uaddrid']; ?>" class="btn btn-primary btn-lg btn-proceed-checkout full-width top-margin-15-default placeOrder" id="load1" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Order">Place Order</button>
							</div>
							<!-- End Content Right -->
						</div>
					</div>
				</div>
			<?php } else { ?>
				<!-- code from list.php start -->
				<div class="row container-web relative">
					<!-- Content Shoping Cart -->
					<!-- <form method="post"> -->
					<div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
						<p class="title-shoping-cart"><i class="fa fa-list"></i> <?php echo $storename; ?></p>

						<?php foreach ($getallitems as $key => $getallitems) { ?>
							<div class="relative full-width product-in-cart border no-border-l no-border-r overfollow-hidden">
								<div class="relative product-in-cart-col-1 center-vertical-image">
									<img src="uploads/item/<?php echo $getallitems['iimg']; ?>" alt="">
								</div>
								<div class="relative product-in-cart-col-2">
									<p class="title-hover-black"><a href="product.php?id=<?php echo $getallitems['itmid']; ?>" class="animate-default"><?php echo $getallitems['iname']; ?></a></p>
								</div>
								<div class="relative product-in-cart-col-4" style="text-align: right; line-height: 3;">


								<span> <br> </span>

									


									<div class="qty-input">
										<!-- <i class="less">-</i> -->
										<p style="padding-right: 10px;">Qty: </p>
										<input readonly id="nqty<?php echo $getallitems['listitem']; ?>" type="number" value="<?php echo $getallitems['lqty']; ?>" />
										<!-- <i class="more">+</i> -->
									</div>

									<p style="font-size: 23px !important; margin-bottom: 0px;" class="text-red price-shoping-cart">₹ <?php echo ($getallitems['iprice'] * $getallitems['lqty']); ?></p>
								</div>
							</div>
							<?php
							//calculate subtotal
							$subtot = $subtot + ($getallitems['iprice'] * $getallitems['lqty']);
							?>
						<?php } ?>

					</div>
					<!-- </form> -->
					<!-- End Content Shoping Cart -->
					<!-- Content Right -->
					<div class="col-md-4 col-sm-12 col-xs-12 right-content-shoping relative clear-padding-right">

						<?php if (false) { ?>
							<p class="title-shoping-cart">Coupon</p>
							<div class="full-width relative coupon-code bg-gray  clearfix">
								<input type="text" class="full-width" name="coupon_code" placeholder="Coupon Code">
								<button class="full-width top-margin-15-default">APPLY COUPON</button>
							</div>
						<?php } ?>

						<p class="title-shoping-cart">List Total</p>
						<div class="full-width relative cart-total bg-gray  clearfix">
							<div class="relative justify-content bottom-padding-15-default border no-border-t no-border-r no-border-l">
								<p>Subtotal</p>
								<p class="text-red price-shoping-cart">₹ <?php echo $subtot; ?></p>
							</div>
							<button class="btn btn-primary btn-lg btn-proceed-checkout full-width top-margin-5-default">Place Offline Order</button>
							<?php if (false) { ?>
								<div class="relative border top-margin-15-default bottom-padding-15-default no-border-t no-border-r no-border-l">
									<p class="bottom-margin-15-default">Shipping</p>
									<div class="relative justify-content">
										<ul class="check-box-custom title-check-box-black clear-margin clear-margin">
											<li>
												<p>Free Shipping
													<input type="radio" name="shipping" checked="">
													<span class="checkmark"></span>
												</p>
											</li>
											<li>
												<p>Standard
													<input type="radio" name="shipping">
													<span class="checkmark"></span>
												</p>
											</li>
											<li>
												<p>Local Pickup
													<input type="radio" name="shipping">
													<span class="checkmark"></span>
												</p>
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
							<?php } ?>
						</div>
					</div>
				</div>
					<!-- list.php end -->
				<?php } ?>
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