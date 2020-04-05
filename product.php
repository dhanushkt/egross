<?php
include 'access/useraccesscontrol.php';
$t_id = $_GET['id'];
$getallitem = mysqli_query($con, "SELECT * FROM itemmaster where itmid='$t_id' ");
$itemdata = mysqli_fetch_assoc($getallitem);
$getallitems = mysqli_query($con, "SELECT * FROM itemmaster");
//for Product side bar
$getprod = mysqli_query($con,"SELECT * FROM itemmaster ORDER BY itmid DESC LIMIT 3");
//all DBdata
$getalldata = mysqli_query($con, "SELECT * FROM itemmaster");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<?php include 'lander-pages/csslink.php'; ?>
	<link rel="stylesheet" type="text/css" href="lander_plugins/css/product.css">
	<link rel="stylesheet" type="text/css" href="lander_plugins/css/slick.css">
	<link rel="stylesheet" type="text/css" href="lander_plugins/css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="lander_plugins/css/category.css">
</head>
<body>
	<!--Script fot wishlist and add to cart-->
	<script src="lander_plugins/js/toast.js"></script>
	<script>
		$(document).ready(function() {
			$('.wishlistItem').click(function() {
				var options = {
					style: {
						main: {
							background: "#e3171b",
							color: "white",
							'box-shadow': '0 0 0px rgba(0, 0, 0, .9)',
							'width': '200px'

						}
					}
				};
				var getid = $(this).attr('data-id');
				$.ajax({
					url: 'add-wishlistitem.php',
					type: 'POST',
					data: {
						id: getid
					},
					success: function() {
						iqwerty.toast.Toast('Item added to wishlist', options);
						window.setTimeout(function() {
							window.location.reload();
						}, 1000);
					}
				});
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			$('.addCart').click(function() {
				var options = {
					style: {
						main: {
							background: "#e3171b",
							color: "white",
							'box-shadow': '0 0 0px rgba(0, 0, 0, .9)',
							'width': '200px'

						}
					}
				};
				var getid = $(this).attr('data-id');
				var getqty = 1;
				$.ajax({
					url: 'add-cart.php',
					type: 'POST',
					data: {
						id: getid,
						qty: getqty
					},
					success: function() {
						iqwerty.toast.Toast('Item added to cart', options);
						window.setTimeout(function() {
							window.location.reload();
						}, 1000);
					}
				});
			});
		});
	</script>
	<!--endscript-->

	<!-- push menu-->
		<?php include 'lander-pages/pushmenu.php'; ?>
    <!-- end push menu-->
	<!-- Menu Mobile -->
		<?php include 'lander-pages/mobilemenu.php'; ?>
	<!-- Header Box -->
	<div class="wrappage">
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
								<li class="animate-default title-hover-red"><a href="view-product.php">All Products</a></li>
								<li class="animate-default title-hover-red"><a href="#"><?php echo $itemdata['iname'];?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- End Breadcrumb -->
			<!-- Content Category -->
			<div class="relative container-web">
				<div class="container">
					<div class="row ">
						
						<!-- Sider Bar -->
						<div class="col-md-3 relative right-padding-default clear-padding" id="slide-bar-category">
							<div class="col-md-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
								<p class="title-siderbar bold">CATEGORIES</p>
								<ul class="clear-margin list-siderbar">
									<li><a href="#">Food</a></li>
									<li><a href="#">Mobile & Tablet</a></li>
									<li><a href="#">Electric Appliances</a></li>
									<li><a href="#">Electronics & Technology</a></li>
									<li><a href="#">Fashion</a></li>
									<li><a href="#">Health & Beauty</a></li>
									<li><a href="#">Mother & Baby</a></li>
									<li><a href="#">Books & Stationery</a></li>
									<li><a href="#">Home & Life</a></li>
									<li><a href="#">Sports & Outdoors</a></li>
									<li><a href="#">Auto & Moto</a></li>
								</ul>
							</div>
							
							<!-- Element Best Sellers -->
							<div class="col-sm-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
								<p class="title-siderbar bold bottom-margin-15-default">PRODUCTS</p>
								<?php
								while($prod=mysqli_fetch_assoc($getprod))
								{?>
								<div class="clearfix relative best-sellers-product">
									<div class="image-product-sellers-sidebar float-left">
										<a href="#"><img src="uploads/item/<?php echo $prod['iimg']; ?>" alt="" /></a>
									</div>
									<div class="info-product-sellers-sidebar float-left">
										<p class="title-product-sellers-sidebar title-hover-black"><a class="animate-default" href="product.php?id=<?php echo $prod['itmid']; ?>">
										<?php echo $prod['iname']; ?>
										</a></p>

										<p class="clearfix price-product">₹ <?php echo $prod['iprice']; ?></p>
									</div>
								</div>
								<?php
								}
								?>
								<div class="button-product-list clearfix full-width clear-margin" >
									<ul class="bottom-margin-default">	
									<li class="button-hover-red">
									<a href="view-product.php" class="animate-default">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									View Products
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
									</li>	
									</ul>
								</div>	
							</div>
						</div>
						<!-- End Sider Bar Box -->
						<!-- Content Category -->
						<div class="col-md-9 relative clear-padding">
							<div class="col-sm-12 col-xs-12 col-md-1 relative overfollow-hidden clear-padding button-show-sidebar clearfix">
							<p onclick="showSideBar()"><span class="ti-filter"></span> Sidebar</p>
							</div>
							<!-- Product Content Detail -->
							<div class="top-product-detail relative ">
								<div class="row">
									<!-- Slide Product Detail -->
									<div class="col-md-7 relative col-sm-12 col-xs-12">
										<div id="owl-big-slide" class="relative sync-owl-big-image">
											<div class="item center-vertical-image">
										  	  <img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Big Slide">
										  	</div>
										  	<div class="item center-vertical-image">
										  		<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Big Slide">
										 	</div>
										 	<div class="item center-vertical-image">
										    	<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Big Slide">
											</div>
											<div class="item center-vertical-image">
										    	<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Big Slide">
											</div>
										</div>
										<div class="relative thumbnail-slide-detail">
											<div id="owl-thumbnail-slide" class="sync-owl-thumbnail-image" data-items="3,4,3,2">
												<div class="item center-vertical-image">
											    	<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Thumbnail Slide">
												</div>
												<div class="item center-vertical-image">
											    	<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Thumbnail Slide">
												</div>
												<div class="item center-vertical-image">
											    	<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Thumbnail Slide">
												</div>
												<div class="item center-vertical-image">
												    <img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Thumbnail Slide">
												</div>
											</div>
											<div class="relative nav-prev-detail btn-slide-detail">
											</div>
											<div class="relative nav-next-detail btn-slide-detail">
											</div>
										</div>
									</div>
									<!-- Info Top Product -->
									<div class="col-md-5 col-sm-12 col-xs-12">
										<div class="name-ranking-product relative bottom-padding-15-default bottom-margin-15-default border no-border-r no-border-t no-border-l">
											<h1 class="name-product"><?php echo $itemdata['iname']; ?></h1>
											<div class=" ranking-color ">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-half" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</div>
											<p class="clearfix price-product">₹<?php echo $itemdata['iprice']; ?></p>
											<div class="product-code clearfix full-width">
											<p class="float-left clear-margin">Availability: <span class="text-green">In stock</span></p>
										</div>
									</div>
									<div class="relative intro-product-detail bottom-margin-15-default bottom-padding-15-default border no-border-r no-border-t no-border-l">
											<p class="clear-margin">Description :<?php echo $itemdata['idesc']; ?></p>
									</div>
									<div class="relative button-product-list clearfix full-width clear-margin">
										<?php
										$itmid = $itemdata['itmid'];
										if($userlogin)
										{
											$getwishlist = mysqli_query($con, "SELECT * FROM user_wishlist WHERE wuid='$globaluserid' AND witmid='$itmid'");
											if(mysqli_num_rows($getwishlist) == 1)
												$wishlist = true;
											else
												$wishlist = false;
											$getcartlist = mysqli_query($con, "SELECT * FROM user_cart WHERE cuid='$globaluserid' AND citmid='$itmid'");
											if(mysqli_num_rows($getcartlist) == 1)
												$cartlist = true;
											else
												$cartlist = false;
										}
										?>
											<ul class="clear-margin top-margin-default clearfix bottom-margin-default">
											<?php if ($userlogin) { ?>
												<?php if($cartlist) { ?>	
											<li class="button-hover-red"><a href="cart.php">Go to Cart</a></li>
											<?php } else { ?>
											<div class="relative option-product-detail bottom-padding-15-default border no-border-r no-border-t no-border-l">
												<div class="relative option-product-2 clearfix">
													<div class="option-product-son float-left right-margin-default">
														<p class="float-left">Qty:</p>
														<input type="number" class="left-margin-15-default" min="01" step="1" 	max="10" value="1" name="num">
													</div>
												</div>
											</div>
												<li class="button-hover-red"><a class="addCart" data-id="<?php echo $itemdata['itmid']; ?>" href="javascript:void(0)">Add to Cart</a></li>
											<?php } ?>
											<?php if($wishlist) { ?>
												<li class="relative"><a href="javascript:void(0)">
												<i style="color: red" class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i>
												</a></li>
												<li class="relative"><a href="#">
												<i style="color: red" class="data-icondata-icon-basic icon-basic-share" value="Copy Url" onclick="Copy();" aria-hidden="true"></i>
											</a></li>
											</ul>
											<?php } else { ?>
												<li><a class="wishlistItem" data-id="<?php echo $itemdata['itmid']; ?>" href="javascript:void(0)"><i class="fa fa-heart" aria-hidden="true"></i></a>
												</li>
											<?php } ?>
										<?php } else { ?>
											<li class="button-hover-red"><a href="user-login.php">Add to Cart</a></li>
											<li class="relative"><a href="user-login.php">
											<i style="color: red" class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i>
											</a></li>
											<li class="relative"><a href="#">
											<i style="color: red" class="data-icondata-icon-basic icon-basic-share" value="Copy Url" onclick="Copy();" aria-hidden="true"></i>
											</a></li>
							<?php } ?>
						</div>
<!--for copy-->
<style>
input{
  border: 0px;
  border-bottom: 2px solid black;
  outline: none;
  background: transparent;
  color: black;
  width: 8cm;
}
input:focus{
  border-bottom: 2px solid blue;
}
</style>
<script type="text/javascript">
        function Copy() 
        {
            var Url = document.getElementById("paste-box");
            Url.value = window.location.href;
            Url.focus();
            Url.select();  
            document.execCommand("Copy");
        }
</script>
									<div >
    									<input type=text class="" id="paste-box" rows="1" cols="30"></input>
									</div>
								</div>
							</div>
	</div>
							<div class="info-product-detail bottom-margin-default relative">
								<div class="row">
									<div class="col-md-12 relative overfollow-hidden">
										<ul class="title-tabs clearfix relative">
											<li onclick="changeTabsProductDetail(1)" class="title-tabs-product-detail title-tabs-1 border no-border-b active-title-tabs bold uppercase">Product Details</li>
										</ul>
										<div class="content-tabs-product-detail relative content-tab-1 border active-tabs-product-detail bottom-padding-default top-padding-default left-padding-default right-padding-default">
											<p><?php echo $itemdata['idesc']; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="slide-product-bottom relative">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12 relative bottom slide-related-product">
										<p class="bold title-slide-product-bottom">OUR PRODUCTS</p>
									<div class="button-slide-related" id="btn-slide-1"></div>
										<div class="owl-theme owl-carousel" data-items="1,2,3">
										<?php
										
										while($row=mysqli_fetch_assoc($getallitems))
										{
											$itmid = $row['itmid'];
											if($userlogin)
										{
											$getwish = mysqli_query($con, "SELECT * FROM user_wishlist WHERE wuid='$globaluserid' AND witmid='$itmid'");
											if(mysqli_num_rows($getwish) == 1)
												$wish1 = true;
											else
												$wish1 = false;
											$getcart = mysqli_query($con, "SELECT * FROM user_cart WHERE cuid='$globaluserid' AND citmid='$itmid'");
											if(mysqli_num_rows($getcart) == 1)
												$cart1 = true;
											else
												$cart1 = false;
										}
											?>
											<div class="items">
												<div class="full-width product-category relative">
													<div class="image-product  relative overfollow-hidden">
														<div class="center-vertical-image">
															<img src="lander_plugins/img/product_home_31-min.png" alt="Product">
														</div>
														<a href="#"></a>
														<ul class="option-product animate-default">
												<?php if ($userlogin) { ?>
												<?php if($cart1) { ?>
													<li class="relative">
														<a href="javascript:void(0)">
														<i style="color: red" class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i>
														</a>
													</li>
												<?php } else { ?>
													<li class="relative"><a class="addCart" data-id="<?php echo $row['itmid']; ?>" href="javascript:void(0)"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
												<?php } ?>
												<?php if($wish1) { ?>
													<li class="relative"><a href="javascript:void(0)">
													<i style="color: red" class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i>
													</a></li>
												<?php } else { ?>
													<li class="relative"><a class="wishlistItem" data-id="<?php echo $row['itmid']; ?>" href="javascript:void(0)"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
												<?php } ?>
													<li class="relative"><a href="index.php"><i class="data-icon data-icon-basic icon-basic-home" aria-hidden="true"></i></a></li>
												<?php } else { ?>
													<li class="relative"><a href="user-login.php"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
													<li class="relative"><a href="user-login.php"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
													<li class="relative"><a href="javascript:;"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
												<?php } ?>
												</ul>
													</div>
													<h3 class="title-product animate-default title-hover-black clearfix full-width"><a href="product.php?id=<?php echo $row['itmid']; ?>"><?php echo $row['iname']; ?></a></h3>
													<p class="clearfix price-product">₹<?php echo $row['iprice']; ?></p>
													<div style="float: right; padding-right: 10px;">
													<?php 
													if($userlogin){
													if($cart1){ ?>
													<i class="fa fa-shopping-cart"></i>
													<?php } if($wish1) { ?>
													<i class="fa fa-heart"></i>
													<?php } } ?>
													</div>
												</div>
											</div>
											<?php
									 }
									?>
										</div>
									</div>
								</div>
							</div>
							<!-- End Product Content Category -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Sider Bar -->
			<!-- Support -->
			<div class=" support-box full-width bg-red support_box_v2">
				<div class="container-web">
					<div class=" container">
						<div class="row">
							<div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
								<img src="lander_plugins/img/icon_free_ship_white-min.png" alt="Icon Free Ship" class="absolute" />
								<p>free shipping</p>
								<p>on order over $500</p>
							</div>
							<div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
								<img src="lander_plugins/img/icon_support_white-min.png" alt="Icon Supports" class="absolute">
								<p>support</p>
								<p>life time support 24/7</p>
							</div>
							<div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
								<img src="lander_plugins/img/icon_patner_white-min.png" alt="Icon partner" class="absolute">
								<p>help partner</p>
								<p>help all aspects</p>
							</div>
							<div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
								<img src="lander_plugins/img/icon_phone_table_white-min.png" alt="Icon Phone Tablet" class="absolute">
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
	</div>
	<!-- End Footer Box -->
	<?php include 'lander-pages/jslinks.php'; ?>
</body>
</html>