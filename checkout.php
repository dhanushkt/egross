<?php 
include 'access/useraccesscontrol.php';

if (!$userlogin) {
    echo "<script>window.location.href='user-login.php'; </script>";
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
							<li class="animate-default title-hover-red"><a href="#">Home</a></li>
							<li class="animate-default title-hover-red"><a href="#">Checkout</a></li>
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
					<div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
						<p class="title-shoping-cart">Shipping Details (Default address is selected)</p>
						<div class="relative clearfix full-width">
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
								<label>First Name *</label>
								<input class="full-width" type="text" name="firstname">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
								<label>Last Name *</label>
								<input class="full-width" type="text" name="lastname">
							</div>
						</div>
						<div class="form-input full-width clearfix relative">
							<label>Company Name</label>
							<input class="full-width" type="text" name="companyname">
						</div>
						<div class="relative clearfix full-width">
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
								<label>Email Address *</label>
								<input class="full-width" type="text" name="firstname">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
								<label>Phone *</label>
								<input class="full-width" type="text" name="lastname">
							</div>
						</div>
						<div class="form-input full-width clearfix relative">
							<label>Country *</label>
							<select class="full-width">
								<option value="1">Vietnamese</option>
								<option value="2">USA</option>
								<option value="3">Thailan</option>
								<option value="4">Russian</option>
							</select>
						</div>
						<div class="form-input full-width clearfix relative">
							<label>Address *</label>
							<input class="full-width" type="text" name="address">
						</div>
						<div class="relative full-width clearfix">
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
								<label>Postcode / ZIP *</label>
								<input class="full-width" type="text" name="firstname">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-right clear-padding-480 relative form-input">
								<label>Town / City *</label>
								<input class="full-width" type="text" name="lastname">
							</div>
						</div>
					
						<!-- <p class="title-shoping-cart">Shipping Details</p> -->
						<a href="view-address.php">
						<ul class="check-box-custom title-check-box-black list-radius clear-margin top-margin-default">
							<li>
								<i class="fa fa-home"></i>
								<label class="">Ship to a different address? </label>
							</li>
						</ul></a>
						<div class="form-input clearfix full-width relative">
							<label>Order Note</label>
							<textarea placeholder="Notes about your order, e.g. special notes for delivery." class="full-width" name="ordernote" rows="4"></textarea>
						</div>
					</div>
					<!-- End Content Shoping Cart -->
					<!-- Content Right -->
					<div class="col-md-4 col-sm-12 col-xs-12 right-content-shoping relative clear-padding-right">
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
									<p class="price-gray-sidebar">$20.00</p>
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
					</div>
					<!-- End Content Right -->
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
</div>
	<!-- End Footer Box -->
	<?php include 'lander-pages/jslinks.php'; ?>
</body>
</html>