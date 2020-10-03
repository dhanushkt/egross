<?php
include 'access/useraccesscontrol.php';
$adbanner = false;
$wishlist = false;
$cartlist = false;
$scat = false;

//custom item
$custom = false;

//initilize it to zero for jquery
$scatid = 0;

if (isset($_GET['scat'])) {

	if ($_GET['scat'] == 0) {
		echo "<script>window.location.href='view-product.php'; </script>";
	}

	$scatid = $_GET['scat'];
	$getalldata = mysqli_query($con, "SELECT * FROM itemmaster WHERE iscid=$scatid AND itype='default' ORDER BY itmid DESC limit 3");
	if(mysqli_num_rows($getalldata)==true){
		$scat = true;
	}
} else if (isset($_GET['type'])) {
	if (!$userlogin) {
		echo "<script>window.location.href='user-login.php'; </script>";
	}
	//display all custom items
	$custom = true;
	$getalldata = mysqli_query($con, "SELECT * FROM itemmaster WHERE itype='custom' AND iuid=$globaluserid");
} else {
	$getalldata = mysqli_query($con, "SELECT * FROM itemmaster WHERE itype='default' ORDER BY itmid DESC limit 3");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<?php include 'lander-pages/csslink.php'; ?>
	<style>
		.show_more_main {
			margin: 15px 350px;
			width: 20%;
		}

		.show_more {
			background-color: red;
			border: 1px solid;
			border-color: #d3d3d3;
			color: #fff;
			font-size: 15px;
			outline: 0;
		}

		.show_more {
			cursor: pointer;
			display: block;
			padding: 10px 0;
			text-align: center;
			font-weight: bold;
		}

		.loding {
			background-color: red;
			border: 1px solid;
			border-color: #c6c6c6;
			color: #fff;
			font-size: 15px;
			display: block;
			text-align: center;
			padding: 10px 0;
			outline: 0;
			font-weight: bold;
		}

		.loding_txt {
			background-image: url(loading.gif);
			background-position: left;
			background-repeat: no-repeat;
			border: 0;
			display: inline-block;
			height: 16px;
			padding-left: 20px;
		}

		.not-allowed {
			pointer-events: none;
			cursor: not-allowed;
		}

		@media(max-width:786px) {
			.show_more_main {
				margin: 20px 20px;
				width: 90%;
			}

		}

		@media only screen and (max-width: 420px) {
			.calign {
				margin-left: 15% !important;
			}
		}

		@media only screen and (max-width: 350px) {
			.calign {
				margin-right: 10% !important;
			}
		}

		@media only screen and (max-width: 700px) {
			.calign {
				margin-left: 10% !important;
			}
		}
	</style>
	<link rel="stylesheet" href="clist_style.css">
</head>

<body onload="myFunction()">

	<input type="hidden" id="scat" name="scat" value="<?php echo $scatid; ?>">
	<div id="loading"></div>
	<script src="lander_plugins/js/toast.js"></script>
	<!-- <script>
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
	</script> -->
	<!-- <script>
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
				var shopid = $(this).attr('data-sid');
				var getqty = 1;
				$.ajax({
					url: 'add-list.php',
					type: 'POST',
					data: {
						id: getid,
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
	</script> -->
	<?php if ($custom) { ?>
		<script>
			$(document).ready(function() {
				$('.addCart').click(function() {
					var options = {
						style: {
							main: {
								background: "#e3171b",
								color: "white",
								'box-shadow': '0 0 0px rgba(0, 0, 0, .9)',
								'width': '250px'
							}
						}
					};

					iqwerty.toast.Toast('Custom Items can only be added to Custom List', options);

					$(this).addClass("not-allowed");
				});
			});
		</script>
	<?php } else { ?>
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
					var itmid = $(this).attr('data-id');
					var getqty = 1;
					var shopid = $(this).attr('data-sid');
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
					$(this).addClass("not-allowed");
				});
			});
		</script>
	<?php } ?>
	<!-- push menu-->
	<?php include 'lander-pages/pushmenu.php'; ?>
	<!-- end push menu-->
	<!-- Menu Mobile -->
	<?php include 'lander-pages/mobilemenu.php'; ?>
	<!-- Header Box -->
	<div class="wrappage">
		<?php include 'lander-pages/header.php'; ?>
		<?php include 'mobile-search.php'; ?>
		<?php include 'clist_popup.php'; ?>


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
								<li class="animate-default title-hover-red"><a href="#">All Products</a></li>
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

							<?php if ($custom) { ?>
								<div class="col-md-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
									<a class="btn btn-primary btn-lg button-hover-red full-width top-margin-15-default hvr-shrink" style="background: #DC141B" href="add-citem.php">
										Add a Custom Item
									</a>
								</div>
							<?php } ?>


							<?php if ($adbanner) { ?>
								<div class="bottom-margin-default banner-siderbar col-md-12 col-sm-12 col-xs-12 clear-padding clearfix">
									<div class="overfollow-hidden banners-effect5 relative center-vertical-image">
										<img src="lander_plugins/img/banner_siderbar-min.png" alt="Siderbar" />
										<a href="#"></a>
									</div>
								</div>
							<?php } ?>
						</div>
						<!-- End Sider Bar Box -->
						<!-- Content Category -->
						<div class="col-md-9 relative clear-padding">
							<div class="col-sm-12 col-xs-12 relative overfollow-hidden clear-padding button-show-sidebar">
								<p onclick="showSideBar()"><span class="ti-filter"></span> Sidebar</p>
							</div>

							<?php if ($adbanner) { ?>
								<div class="banner-top-category-page bottom-margin-default effect-bubba zoom-image-hover overfollow-hidden relative full-width">
									<img src="lander_plugins/img/image_banner_category_1-min.png" alt="" />
									<a href="#"></a>
								</div>
							<?php } ?>

							<div class="bar-category bottom-margin-default border no-border-r no-border-l no-border-t">
								<div class="row">
									<div class="col-md-5 col-sm-5 col-xs-4">
										<p class="title-category-page clear-margin">Products</p>
									</div>
									<!--<div class="col-md-5 col-sm-5 col-xs-8 right-category-bar float-right relative">
										<p class=" float-left">Showing 1–20 of 75 results</p>
										<a href="#" class=" float-left active-view-bar"><span class="icon-bar-category border ti-layout-grid3"></span></a>
										<a href="#" class=" float-left"><span class="icon-bar-category border ti-layout-list-thumb"></span></a>
									</div>-->
								</div>
							</div>
							<!-- Product Content Category -->
							<div class="postList" style="padding-bottom: 30px;">
								<div class="row">
									<?php
									if ($getalldata->num_rows > 0) {
										while ($itemdata = mysqli_fetch_assoc($getalldata)) {
											$itmid = $itemdata['itmid'];
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
											}
									?>
											<div class="col-md-4 col-sm-4 col-xs-12 product-category relative effect-hover-boxshadow animate-default">
												<div class="image-product relative overfollow-hidden calign">
													<div class="center-vertical-image">
														<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" onerror="this.onerror=null; this.src='uploads/item/default_egross.png'">
													</div>
													<a href="#"></a>
													<ul class="option-product animate-default">
														<?php if ($userlogin) { ?>

															<?php if ($cartlist) { ?>
																<li class="relative">
																	<a href="javascript:void(0)">
																		<i style="color: red" class="fa fa-list"></i>
																	</a>
																</li>
															<?php } else { ?>
																<li class="relative"><a class="addCart" data-id="<?php echo $itemdata['itmid']; ?>" data-sid="<?php echo $itemdata['isid']; ?>" href="javascript:void(0)"><i class="fa fa-list"></i></a></li>
															<?php } ?>


															<?php if ($wishlist) { ?>
																<li class="relative"><a href="javascript:void(0)">
																		<i style="color: red" class="Click-here fa fa-plus" aria-hidden="true" data-id="<?php echo $itemdata['itmid']; ?>" data-item="<?php echo $itemdata['iname']; ?>"></i>
																	</a></li>
															<?php } else { ?>
																<li class="relative"><a class="wishlistItem"><i class="fa fa-plus Click-here" data-id="<?php echo $itemdata['itmid']; ?>" data-item="<?php echo $itemdata['iname']; ?>" aria-hidden="true"></i></a></li>
															<?php } ?>

															<?php if ($custom) { ?>
																<li class="relative"><a href="javascript:void(0)">
																		<i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i>
																	</a></li>
															<?php } else { ?>
																<li class="relative"><a href="product.php?product=<?php echo $itemdata['itmid']; ?>"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
															<?php } ?>

														<?php } else { ?>
															<li class="relative"><a href="user-login.php"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>

															<li class="relative"><a href="user-login.php"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>

															<li class="relative"><a href="product.php?product=<?php echo $itemdata['itmid']; ?>"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
														<?php } ?>

													</ul>
												</div>
												<h3 class="title-product clearfix full-width title-hover-black"><a href="product.php?product=<?php echo $itemdata['itmid']; ?>"><?php echo $itemdata['iname']; ?></a></h3>
												<p class="clearfix price-product">
													₹ <?php echo $itemdata['iprice']; ?></p>
												<div style="float: right; padding-right: 10px;">
													<?php if ($cartlist) { ?>
														<i class="fa fa-list"></i>
													<?php }
													if ($wishlist) { ?>
														<i class="fa fa-heart"></i>
													<?php } ?>
												</div>
												<!-- <div class="clearfix ranking-product-category ranking-color">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star-half" aria-hidden="true"></i>
											<i class="fa fa-star-o" aria-hidden="true"></i>
										</div> -->
											</div>

										<?php } ?>
								</div>
							</div>

							<?php if (!$custom) { ?>
								<div class="show_more_main" id="show_more_main<?php echo $itmid; ?>">
									<span id="<?php echo $itmid; ?>" class="show_more" title="Load more posts">Show more</span>
									<span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
								</div>
							<?php } ?>
						<?php } ?>
						<!-- <div class="row">
								<div class="pagging relative">
									<ul>
										<li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i> First</a></li>
										<li class="active-pagging"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li class="dots-pagging">. . .</li>
										<li><a href="#">102</a></li>
										<li><a href="#">Last <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
									</ul>
								</div>
							</div> -->
						<!-- End Product Content Category -->
						<?php if (!$scat) {?>
						<div style="background-color: white;" class="full-width relative col-md-12 mol-lg-12">
									<div class="text-center" style="padding: 110px; line-height: 5;">
										<i style="font-size: 100px;" class="fa fa-search"></i>
										<h2>Product Not Available</h2>
										<a href="view-category.php" style="background-color: #eb1a21; color: white;" class="btn">CONTINUE SHOPPING</a>
									</div>
						</div>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- End Sider Bar -->
		</div>
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
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '.show_more', function() {
			var ID = $(this).attr('id');
			var scatid = $('#scat').attr('value');

			$('.show_more').hide();
			$('.loding').show();
			$.ajax({
				type: 'POST',
				url: 'loadproduct.php',
				data: {
					itmid: ID,
					scat: scatid
				},
				success: function(html) {
					$('#show_more_main' + ID).remove();
					$('.postList').append(html);
				}
			});
		});
	});
</script>
<script src="clist_script.js"></script>


</html>