<?php
include 'access/useraccesscontrol.php';
$adbanner = false;
$wishlist = false;
$cartlist = false;
$getalldata = mysqli_query($con, "SELECT * FROM itemmaster order by itmid DESC limit 3");
if (isset($_GET['scat'])) {
	$scatid = $_GET['scat'];
	$getalldata = mysqli_query($con, "SELECT * FROM itemmaster WHERE iscid=$scatid");
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

		@media(max-width:786px) {
			.show_more_main {
				margin: 20px 20px;
				width: 90%;
			}

		}
	</style>
</head>

<body onload="myFunction()">

	<input type="hidden" id="scat" name="scat" value="<?php echo $scatid; ?>">
	<div id="loading"></div>
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
					url: 'add-list.php',
					type: 'POST',
					data: {
						id: getid,
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
										<li><a href="#"><?php echo $row['mcname']; ?></a></li>
									<?php } ?>
								</ul>
							</div>


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
									<div class="col-md-5 col-sm-5 col-xs-8 right-category-bar float-right relative">
										<p class=" float-left">Showing 1–20 of 75 results</p>
										<a href="#" class=" float-left active-view-bar"><span class="icon-bar-category border ti-layout-grid3"></span></a>
										<a href="#" class=" float-left"><span class="icon-bar-category border ti-layout-list-thumb"></span></a>
									</div>
								</div>
							</div>
							<!-- Product Content Category -->
							<div class="postList">
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
												<div class="image-product relative overfollow-hidden">
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
																<li class="relative"><a class="addCart" data-id="<?php echo $itemdata['itmid']; ?>" href="javascript:void(0)"><i class="fa fa-list"></i></a></li>
															<?php } ?>


															<?php if ($wishlist) { ?>
																<li class="relative"><a href="javascript:void(0)">
																		<i style="color: red" class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i>
																	</a></li>
															<?php } else { ?>
																<li class="relative"><a class="wishlistItem" data-id="<?php echo $itemdata['itmid']; ?>" href="javascript:void(0)"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
															<?php } ?>

															<li class="relative"><a href="javascript:;"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
														<?php } else { ?>
															<li class="relative"><a href="user-login.php"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>

															<li class="relative"><a href="user-login.php"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>

															<li class="relative"><a href="javascript:;"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
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

							<div class="show_more_main" id="show_more_main<?php echo $itmid; ?>">
								<span id="<?php echo $itmid; ?>" class="show_more" title="Load more posts">Show more</span>
								<span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
							</div>
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
			$('.show_more').hide();
			$('.loding').show();
			$.ajax({
				type: 'POST',
				url: 'loadproduct.php',
				data: 'itmid=' + ID,
				success: function(html) {
					$('#show_more_main' + ID).remove();
					$('.postList').append(html);
				}
			});
		});
	});
</script>
<script>
	$(document).ready(function() {
    $( window ).on( "load", function() {
                var scat = $('#scat').attr('value');
                $.ajax({
                    url: 'loadproduct.php',
                    type: 'POST',
                    data: {
                        scat: scat
					},
					success: function() {
                        console.log(scat);
                    }
                });
            });
            });
    </script>
    


</html>