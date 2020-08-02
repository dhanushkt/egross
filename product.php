<?php
include 'access/useraccesscontrol.php';

$sidebars = false;

if (!isset($_GET['product'])) {
	echo "<script>window.location.href='view-product.php'; </script>";
} else {
	$t_id = $_GET['product'];

	$getallitem = mysqli_query($con, "SELECT * FROM itemmaster JOIN shopkeeper ON itemmaster.isid = shopkeeper.sid WHERE itemmaster.itmid='$t_id'");
	$itemdata = mysqli_fetch_assoc($getallitem);

	$getallitems = mysqli_query($con, "SELECT * FROM itemmaster");
	//for Product side bar
	$getprod = mysqli_query($con, "SELECT * FROM itemmaster ORDER BY itmid DESC LIMIT 3");
	//all DBdata
	$getalldata = mysqli_query($con, "SELECT * FROM itemmaster");
}

//check user list and wishlist
$itmid = $t_id;

if ($userlogin) {
	$getwishlist = mysqli_query($con, "SELECT * FROM user_wishlist WHERE wuid='$globaluserid' AND witmid='$itmid'");
	if (mysqli_num_rows($getwishlist) == 1)
		$wishlist = true;
	else
		$wishlist = false;

	$getcartlist = mysqli_query($con, "SELECT * FROM user_listitems JOIN user_list ON user_listitems.listno=user_list.listno WHERE user_listitems.litmid='$itmid' AND user_list.luid='$globaluserid'");
	if (mysqli_num_rows($getcartlist) == 1)
		$cartlist = true;
	else
		$cartlist = false;
} else {
	$cartlist = false;
}


?>
<!DOCTYPE html>

<html lang="en">

<head>
	<?php include 'lander-pages/csslink.php'; ?>
	<link rel="stylesheet" type="text/css" href="lander_plugins/css/product.css">
	<link rel="stylesheet" type="text/css" href="lander_plugins/css/slick.css">
	<link rel="stylesheet" type="text/css" href="lander_plugins/css/slick-theme.css">
	<style>
		.slick-prev,
		.slick-next,
		.title-tabs,
		.button-slide-related {
			z-index: 0 !important;
		}
		.hvr-grow {
            display: inline-block;
            vertical-align: middle;
            -webkit-transform: perspective(1px) translateZ(0);
            transform: perspective(1px) translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: transform;
            transition-property: transform;
        }

        .hvr-grow:hover,
        .hvr-grow:focus,
        .hvr-grow:active {
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
        }
	</style>

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
			$('.addList').click(function() {
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
				var itmid = $(this).attr('data-id');
				var getqty = document.getElementById("itmQty").value;
				var shopid = document.getElementById("shopId").value;
				$.ajax({
					url: 'add-list.php',
					type: 'POST',
					data: {
						itmid: itmid,
						shopid: shopid,
						qty: getqty
					},
					success: function() {
						iqwerty.toast.Toast('Item added to list', options);
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
									<li class="animate-default title-hover-red"><a href="view-product.php">All Products</a></li>
									<li class="animate-default title-hover-red"><a href="#"><?php echo $itemdata['iname']; ?></a></li>
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
										<?php
										$query = mysqli_query($con, "SELECT * FROM mcat");
										while ($row = mysqli_fetch_assoc($query)) {
										?>
											<li><a href="view-category.php?id=<?php echo $row['mcid']; ?>"><?php echo $row['mcname']; ?></a></li>
										<?php } ?>
									</ul>
								</div>

								<?php if ($sidebars) { ?>
									<!-- Element Best Sellers -->
									<div class="col-sm-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
										<p class="title-siderbar bold bottom-margin-15-default">BEST SELLERS</p>
										<div class="clearfix relative best-sellers-product">
											<div class="image-product-sellers-sidebar float-left">
												<a href="#"><img src="img/product_image_6-min.png" alt="" /></a>
											</div>
											<div class="info-product-sellers-sidebar float-left">
												<p class="title-product-sellers-sidebar title-hover-black"><a class="animate-default" href="#">MH02-Black09</a></p>
												<?php if (false) { ?>
													<div class="clearfix ranking-product-sidebar ranking-color">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star-half" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
													</div>
												<?php } ?>
												<p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
											</div>
										</div>
										<div class="clearfix relative best-sellers-product">
											<div class="image-product-sellers-sidebar float-left">
												<a href="#"><img src="img/product_image_7-min.png" alt="" /></a>
											</div>
											<div class="info-product-sellers-sidebar float-left">
												<p class="title-product-sellers-sidebar title-hover-black"><a class="animate-default" href="#">Voyage Bag</a></p>
												<div class="clearfix ranking-product-sidebar ranking-color">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star-half" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
												</div>
												<p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
											</div>
										</div>
										<div class="clearfix relative best-sellers-product">
											<div class="image-product-sellers-sidebar float-left">
												<a href="#"><img src="img/product_image_8-min.png" alt="" /></a>
											</div>
											<div class="info-product-sellers-sidebar float-left">
												<p class="title-product-sellers-sidebar title-hover-black"><a class="animate-default" href="#">Impulse</a></p>
												<div class="clearfix ranking-product-sidebar ranking-color">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star-half" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
												</div>
												<p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
											</div>
										</div>
									</div>
									<!-- End Element Best Sale -->

									<!-- Element On Sale -->
									<div class="col-sm-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
										<p class="title-siderbar bold bottom-margin-default">ON SALE</p>
										<div class="slide-on-sale-sidebar relative">
											<div class="owl-theme owl-carousel">
												<div class="items">
													<div class="product-category relative">
														<p class="absolute label-on-sale">-50%<br>off</p>
														<div class="image-product relative overfollow-hidden">
															<img src="img/product_image_4-min.png" alt="Product">
															<a href="#"></a>
															<ul class="option-product animate-default">
																<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
																<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
																<li class="relative"><a href="javascript:;"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
															</ul>
														</div>
														<p class="title-product clearfix full-width animate-default title-hover-black"><a href="#">MH01-Black</a></p>
														<p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
														<div class="clearfix ranking-product-category ranking-color">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-half" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</div>
														<a href="javascript:;" class="button-add-cart-on-sale button-hover-red animate-default">Add to Cart</a>
													</div>
												</div>
												<div class="items">
													<div class="product-category relative">
														<p class="absolute label-on-sale">-42%<br>off</p>
														<div class="image-product relative overfollow-hidden">
															<img src="img/product_home_26-min.png" alt="Product">
															<a href="#"></a>
															<ul class="option-product animate-default">
																<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
																<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
																<li class="relative"><a href="javascript:;"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
															</ul>
														</div>
														<p class="title-product clearfix full-width animate-default title-hover-black"><a href="#">Impulse Duffle</a></p>
														<p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
														<div class="clearfix ranking-product-category ranking-color">
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star" aria-hidden="true"></i>
															<i class="fa fa-star-half" aria-hidden="true"></i>
															<i class="fa fa-star-o" aria-hidden="true"></i>
														</div>
														<a href="javascript:;" class="button-add-cart-on-sale button-hover-red animate-default">Add to Cart</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
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
												<?php if (false) { ?>
													<div class="item center-vertical-image">
														<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Big Slide">
													</div>
													<div class="item center-vertical-image">
														<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Big Slide">
													</div>
													<div class="item center-vertical-image">
														<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Image Big Slide">
													</div>
												<?php } ?>
											</div>
											<?php if (false) { ?>
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
											<?php } ?>
										</div>
										<!-- Info Top Product -->
										<div class="col-md-5 col-sm-12 col-xs-12">
											<div class="name-ranking-product relative bottom-padding-15-default bottom-margin-15-default border no-border-r no-border-t no-border-l">
												<h1 class="name-product"><?php echo $itemdata['iname']; ?></h1>
												<?php if (false) { ?>
													<div class=" ranking-color ">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star-half" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
													</div>
												<?php } ?>
												<p class="clearfix price-product">₹<?php echo $itemdata['iprice']; ?></p>
												<!-- removed class product-code -->
												<div class=" clearfix full-width">
													<!-- removed class float-left relative -->
													<p>Sold by: <?php echo $itemdata['sname']; ?></p>
													<br>
													<p class="float-left clear-margin">Availability: <span class="text-green">In stock</span></p>
												</div>
											</div>
											<div class="relative intro-product-detail bottom-margin-15-default bottom-padding-15-default border no-border-r no-border-t no-border-l">
												<p class="clear-margin">Description :<?php echo $itemdata['idesc']; ?></p>
											</div>

											<?php if (!$cartlist) { ?>
												<div class="relative option-product-detail bottom-padding-15-default border no-border-r no-border-t no-border-l">

													<div class="relative option-product-2 clearfix">
														<div class="option-product-son float-left right-margin-default">
															<p class="float-left">Qty:</p>
															<input id="itmQty" type="number" class="left-margin-15-default" min="01" step="1" max="10" value="1" name="num">
														</div>
													</div>
													<input type="hidden" id="shopId" value="<?php echo $itemdata['sid']; ?>">
												</div>
											<?php }  ?>

											<div class="relative button-product-list clearfix full-width clear-margin">
												<ul class="clear-margin top-margin-default clearfix bottom-margin-default">
													<?php if (!$userlogin) { ?>
														<li class="button-hover-red hvr-grow"><a href="user-login.php" class="animate-default">Add to list</a></li>

														<li><a href="user-login.php" class="animate-default hvr-grow"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
													<?php } else { ?>
														<?php if ($cartlist) { ?>
															<li class="button-hover-bla hvr-grow"><a href="list.php" style="background: black !important;" class="animate-default">View List</a></li>
														<?php } else { ?>
															<li class="button-hover-red hvr-grow"><a href="javascript:void(0)" class="animate-default addList" data-id="<?php echo $itemdata['itmid']; ?>">
																	Add to List</a></li>
														<?php } ?>

														<?php if ($wishlist) { ?>
															<li class="hvr-grow"><a style="background: red !important;" href="wishlist.php" class="animate-default"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
														<?php } else {  ?>
															<li class="hvr-grow"><a class="animate-default wishlistItem" data-id="<?php echo $itemdata['itmid']; ?>" href="javascript:void(0)"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
														<?php } ?>
													<?php } ?>
												</ul>
												<div class="btn-print clearfix">
													<a href="javascript:;" class="right-margin-default animate-default title-hover-black" onclick="printWebsite()"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
													<a href="mailto:" class=" animate-default title-hover-black"><i class="fa fa-envelope" aria-hidden="true"></i> Send to a Friend</a>
												</div>
											</div>

										</div>
									</div>
								</div>

								<!-- bottom info -->
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

								<!-- related product box -->

								<div class="slide-product-bottom relative">
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12 relative bottom slide-related-product">
											<p class="bold title-slide-product-bottom">RELATED PRODUCTS</p>
											<div class="button-slide-related" id="btn-slide-1"></div>
											<div class="owl-theme owl-carousel" data-items="1,2,3">
												<?php

												while ($row = mysqli_fetch_assoc($getallitems)) {
													$itmid = $row['itmid'];
													if ($userlogin) {
														$getwish = mysqli_query($con, "SELECT * FROM user_wishlist WHERE wuid='$globaluserid' AND witmid='$itmid'");
														if (mysqli_num_rows($getwish) == 1)
															$wish1 = true;
														else
															$wish1 = false;
														//$getcart = mysqli_query($con, "SELECT * FROM user_cart WHERE cuid='$globaluserid' AND citmid='$itmid'");
														$getcartlist = mysqli_query($con, "SELECT * FROM user_listitems JOIN user_list ON user_listitems.listno=user_list.listno WHERE user_listitems.litmid='$itmid' AND user_list.luid='$globaluserid'");
														if (mysqli_num_rows($getcartlist) == 1)
															$cart1 = true;
														else
															$cart1 = false;
													}
												?>
													<div class="items">
														<div class="full-width product-category relative">
															<div class="image-product  relative overfollow-hidden">
																<div class="center-vertical-image">
																	<img src="uploads/item/<?php echo $row['iimg']; ?>" alt="Product">
																</div>
																<a href="#"></a>
																<ul class="option-product animate-default">
																	<?php if ($userlogin) { ?>
																		<?php if ($cart1) { ?>
																			<li class="relative">
																				<a href="javascript:void(0)">
																					<i style="color: red" class="fa fa-list"></i>
																				</a>
																			</li>
																		<?php } else { ?>
																			<li class="relative"><a class="addList" data-id="<?php echo $row['itmid']; ?>" href="javascript:void(0)"><i class="fa fa-list"></i></a></li>
																			<input type="hidden" id="shopId" value="<?php echo $itemdata['sid']; ?>">
																		<?php } ?>
																		<?php if ($wish1) { ?>
																			<li class="relative"><a href="javascript:void(0)">
																					<i style="color: red" class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i>
																				</a></li>
																		<?php } else { ?>
																			<li class="relative"><a class="addList" data-id="<?php echo $row['itmid']; ?>" href="javascript:void(0)"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
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
																if ($userlogin) {
																	if ($cart1) { ?>
																		<i class="fa fa-list"></i>
																	<?php }
																	if ($wish1) { ?>
																		<i class="fa fa-heart"></i>
																<?php }
																} ?>
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
								<?php if (false) { ?>
									<div class="col-md-12 col-sm-12 col-xs-12 relative slide-related-product">
										<p class="bold title-slide-product-bottom">YOU MIGHT ALSO LIKE</p>
										<div class="button-slide-related" id="btn-slide-2"></div>
										<div class="owl-theme owl-carousel" data-items="1,2,3">
											<div class="items">
												<div class="full-width product-category relative">
													<div class="image-product  relative overfollow-hidden">
														<div class="center-vertical-image">
															<img src="img/product_home_14-min.png" alt="Product">
														</div>
														<a href="#"></a>
														<ul class="option-product animate-default">
															<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
															<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
															<li class="relative"><a href="javascript:;"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
														</ul>
													</div>
													<h3 class="title-product animate-default title-hover-black clearfix full-width"><a href="#">Rival Field Messenger</a></h3>
													<p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
													<div class="clearfix ranking-product-category ranking-color">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star-half" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
													</div>
												</div>
											</div>
											<div class="items">
												<div class="full-width product-category relative">
													<div class="image-product  relative overfollow-hidden">
														<div class="center-vertical-image">
															<img src="img/product_home_23-min.png" alt="Product">
														</div>
														<a href="#"></a>
														<ul class="option-product animate-default">
															<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
															<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
															<li class="relative"><a href="javascript:;"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
														</ul>
													</div>
													<h3 class="title-product animate-default title-hover-black clearfix full-width"><a href="#">Endeavor Daytrip Backpack</a></h3>
													<p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
													<div class="clearfix ranking-product-category ranking-color">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star-half" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
													</div>
												</div>
											</div>
											<div class="items">
												<div class="full-width product-category relative">
													<div class="image-product  relative overfollow-hidden">
														<div class="center-vertical-image">
															<img src="img/product_home_24-min.png" alt="Product">
														</div>
														<a href="#"></a>
														<ul class="option-product animate-default">
															<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
															<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
															<li class="relative"><a href="javascript:;"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
														</ul>
													</div>
													<h3 class="title-product animate-default title-hover-black clearfix full-width"><a href="#">Diam Special1</a></h3>
													<p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
													<div class="clearfix ranking-product-category ranking-color">
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star" aria-hidden="true"></i>
														<i class="fa fa-star-half" aria-hidden="true"></i>
														<i class="fa fa-star-o" aria-hidden="true"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>

						</div>
						<!-- End Product Content Category -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Sider Bar -->
		<!-- Support -->

		<!-- FREE SHIPPING, SUPPORT, HELP PARTNER, CONTACT US
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
		</div> -->
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