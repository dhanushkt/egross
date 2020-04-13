<?php
include 'access/useraccesscontrol.php';
$id = $_GET['id'];
$adbanner = false;
$getalldata = mysqli_query($con, "SELECT * FROM itemmaster");

$getnamecat = mysqli_query($con, "SELECT * FROM mcat where mcid=$id");
$name = mysqli_fetch_assoc($getnamecat);
$photo = mysqli_fetch_assoc($getalldata);

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<?php include 'lander-pages/csslink.php'; ?>
	<style>
		.content {
			opacity: 0;
			font-size: 20px;
			position: absolute;
			top: 0;
			left: 0;
			color: #000;
			background-color: #C0C0C0;
			width: 100%;
			height: 100%;
			-webkit-transition: all 400ms ease-out;
			-moz-transition: all 400ms ease-out;
			-o-transition: all 400ms ease-out;
			-ms-transition: all 400ms ease-out;
			transition: all 400ms ease-out;
			text-align: center;
		}

		.example .content:hover {
			opacity: 1;
		}

		.example .content .text {
			height: 0;
			opacity: 2;
			transition-delay: 0s;
			transition-duration: 0.4s;
		}

		.example .content:hover .text {
			opacity: 2;
			transform: translateY(150px);
			-webkit-transform: translateY(60px);
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
								<li class="animate-default title-hover-red"><a href="#">View Category</a></li>
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
								<p class="title-siderbar bold">Categories</p>
								<ul class="clear-margin list-siderbar">
									<?php
									$query = mysqli_query($con, "SELECT * FROM mcat");
									while ($row = mysqli_fetch_assoc($query)) {
									?>
										<li><a href="view-category.php?id=<?php echo $row['mcid']; ?>"><?php echo $row['mcname']; ?></a></li>
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
							<div class="col-md-12 col-sm-12 col-xs-12 relative border bottom-margin-default sider-bar-category">
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
										<p class="title-category-page clear-margin"><?php echo $name['mcname']; ?></p>
									</div>
									<div class="col-md-5 col-sm-5 col-xs-8 right-category-bar float-right relative">
										<p class=" float-left">Showing 1–20 of 75 results</p>
										<a href="#" class=" float-left active-view-bar"><span class="icon-bar-category border ti-layout-grid3"></span></a>
										<a href="#" class=" float-left"><span class="icon-bar-category border ti-layout-list-thumb"></span></a>
									</div>
								</div>
							</div>
							<!-- Product Content Category -->
							<div class="row">
								<?php
								$getsmid = mysqli_query($con, "SELECT * FROM scat where smcid=$id");
								while ($catdata = mysqli_fetch_assoc($getsmid)) {
								?>
									<a href="view-product.php?scat=<?php echo $catdata['smcid']; ?>">
										<div class="example col-md-4 col-sm-4 col-xs-12 product-category relative effect-hover-boxshadow animate-default" style="padding-bottom: 10px;">
											<div class="example text center-vertical-image">
												<img src="uploads/item/<?php echo $photo['iimg']; ?>" alt="Product">
												<!--dont delete<img src="uploads/item/<?php //echo $catdata['scimg']; 
																						?>" alt="Product">-->
											</div>
											<!-- <div class="example text content">
												<p class="text">
													<?php //echo $catdata['scdesc']; 
													?></p>
											</div> -->
											<h4 class="title-product clearfix full-width title-hover-black text-center"><?php echo $catdata['scname']; ?></h4>
										</div>
									</a>
								<?php } ?>
							</div>
							<?php if(false) { ?>
							<div class="row">
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
							</div>
							<?php } ?>
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

</html>