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
</head>

<body onload="myFunction()">


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
							<div class="col-sm-12 col-sm-12 col-xs-12 sider-bar-category border bottom-margin-default">
								<p class="title-siderbar bold">BRANDS</p>
								<ul class="check-box-custom clear-margin clear-margin">
									<li>
										<label>Apple (465)
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label>Asus (344)
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label>Audio-Technica (136)
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label>Belkin (121)
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label>BlueStone (258)
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label>Brother (119)
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label>Canon (205)
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label>China OEM (113)
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</li>
									<li>
										<label>Comet (330)
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</li>
								</ul>
							</div>
							<!-- <div class="col-md-12 col-sm-12 col-xs-12 relative border bottom-margin-default sider-bar-category">
								<div class="relative border no-border-t no-border-l no-border-r bottom-padding-default">
									<p class="title-siderbar bold">price</p>
									<div class="range-slider">
										<input value="50" min="0" max="1000" class="multi-range" type="range">
										<p class="text-range">Range: <span class="number-range"></span></p>
									</div>
								</div>
								<div class="relative border no-border-t no-border-l no-border-r bottom-padding-default">
									<p class="title-siderbar bold top-padding-default">color</p>
									<ul class="check-box-custom list-color clearfix clear-margin">
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
									</ul>
								</div>
								<div class="relative">
									<p class="title-siderbar bold top-padding-default">size</p>
									<ul class="check-box-custom clear-margin">
										<li>
											<label>S
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>M
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>L
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>XL
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>XXL
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
										<li>
											<label>XXXL
												<input type="checkbox">
												<span class="checkmark"></span>
											</label>
										</li>
									</ul>
								</div>
							</div> -->
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
							<div class="row postList">
								<?php
								if($getalldata->num_rows > 0){ 
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
												<img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Product">
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
							<style>
								.show_more_main {
									margin: 15px 25px;
								}

								.show_more {
									background-color: #f8f8f8;
									background-image: -webkit-linear-gradient(top, #fcfcfc 0, #f8f8f8 100%);
									background-image: linear-gradient(top, #fcfcfc 0, #f8f8f8 100%);
									border: 1px solid;
									border-color: #d3d3d3;
									color: #333;
									font-size: 12px;
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
									background-color: #e9e9e9;
									border: 1px solid;
									border-color: #c6c6c6;
									color: #333;
									font-size: 12px;
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
							</style>
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
$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
        $.ajax({
            type:'POST',
            url:'loadproduct.php',
            data:'itmid='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.postList').append(html);
            }
        });
    });
});
</script>


</html>