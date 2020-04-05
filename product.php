<?php
include 'access/useraccesscontrol.php';

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
								<li class="animate-default title-hover-red"><a href="#">Home</a></li>
								<li class="animate-default title-hover-red"><a href="#">All Products</a></li>
								<li class="animate-default title-hover-red"><a href="#">Mobile & Tablet</a></li>
								<li class="animate-default title-hover-red"><a href="#">Apple iPhone X</a></li>
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
								<p class="title-siderbar bold bottom-margin-15-default">BEST SELLERS</p>
								<div class="clearfix relative best-sellers-product">
									<div class="image-product-sellers-sidebar float-left">
										<a href="#"><img src="lander_plugins/img/product_image_6-min.png" alt="" /></a>
									</div>
									<div class="info-product-sellers-sidebar float-left">
										<p class="title-product-sellers-sidebar title-hover-black"><a class="animate-default" href="#">MH02-Black09</a></p>
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
										<a href="#"><img src="lander_plugins/img/product_image_7-min.png" alt="" /></a>
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
										<a href="#"><img src="lander_plugins/img/product_image_8-min.png" alt="" /></a>
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
													<img src="lander_plugins/img/product_image_4-min.png" alt="Product">
													<a href="#"></a>
													<ul class="option-product animate-default">
														<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
														<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
														<li class="relative"><a href="javascript:;" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
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
													<img src="lander_plugins/img/product_home_26-min.png" alt="Product">
													<a href="#"></a>
													<ul class="option-product animate-default">
														<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
														<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
														<li class="relative"><a href="javascript:;" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
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
							<!-- End ELement On Sale -->
							<div class="bottom-margin-default banner-siderbar col-md-12 col-sm-12 col-xs-12 clear-padding clearfix">
								<div class="overfollow-hidden banners-effect5 relative">
									<img src="lander_plugins/img/banner_siderbar-min.png" alt="Siderbar" />
									<a href="#"></a>
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
										    <img src="lander_plugins/img/slide_quickview_4-min.png" alt="Image Big Slide">
										  </div>
										  <div class="item center-vertical-image">
										    <img src="lander_plugins/img/slide_quickview_1-min.png" alt="Image Big Slide">
										  </div>
										  <div class="item center-vertical-image">
										    <img src="lander_plugins/img/slide_quickview_2-min.png" alt="Image Big Slide">
										  </div>
										  <div class="item center-vertical-image">
										    <img src="lander_plugins/img/slide_quickview_3-min.png" alt="Image Big Slide">
										  </div>
										</div>
										<div class="relative thumbnail-slide-detail">
											<div id="owl-thumbnail-slide" class="sync-owl-thumbnail-image" data-items="3,4,3,2">
											  <div class="item center-vertical-image">
											    <img src="lander_plugins/img/slide_quickview_4-min.png" alt="Image Thumbnail Slide">
											  </div>
											  <div class="item center-vertical-image">
											    <img src="lander_plugins/img/slide_quickview_1-min.png" alt="Image Thumbnail Slide">
											  </div>
											  <div class="item center-vertical-image">
											    <img src="lander_plugins/img/slide_quickview_2-min.png" alt="Image Thumbnail Slide">
											  </div>
											  <div class="item center-vertical-image">
											    <img src="lander_plugins/img/slide_quickview_3-min.png" alt="Image Thumbnail Slide">
											  </div>
											</div>
											<div class="relative nav-prev-detail btn-slide-detail"></div>
											<div class="relative nav-next-detail btn-slide-detail"></div>
										</div>
									</div>
									<!-- Info Top Product -->
									<div class="col-md-5 col-sm-12 col-xs-12">
										<div class="name-ranking-product relative bottom-padding-15-default bottom-margin-15-default border no-border-r no-border-t no-border-l">
											<h1 class="name-product">Apple iPhone X</h1>
											<div class=" ranking-color ">
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star" aria-hidden="true"></i>
												<i class="fa fa-star-half" aria-hidden="true"></i>
												<i class="fa fa-star-o" aria-hidden="true"></i>
											</div>
											<p class="clearfix price-product"><span class="price-old">$700.00</span> $350.00</p>
											<div class="product-code clearfix full-width">
												<p class="float-left relative">Item Code: #453217907</p>
												<p class="float-left clear-margin">Availability: <span class="text-green">In stock</span></p>
											</div>
										</div>
										<div class="relative intro-product-detail bottom-margin-15-default bottom-padding-15-default border no-border-r no-border-t no-border-l">
											<p class="clear-margin">Meet the iPhone X - the device that’s so smart that it responds to a tap, your voice, and even a glance. Elegantly designed with a large 14.73 cm (5.8) Super Retina screen and a durable front-and-back glass, this smartphone is designed to impress. What’s more, you can charge this iPhone wirelessly.</p>
										</div>
										<div class="relative option-product-detail bottom-padding-15-default border no-border-r no-border-t no-border-l">
											<p class="bold clear-margin bottom-margin-15-default">Available Options:</p>
											<div class="relative option-product-1 bottom-margin-15-default">
												<p class="float-left">Color:</p>
												<ul class="check-box-custom list-color clearfix clear-margin">
													<li>
														<label>
															<input type="checkbox" >
					  										<span class="checkmark"></span>
					  									</label>
					  								</li>
					  								<li>
														<label>
															<input type="checkbox" >
					  										<span class="checkmark"></span>
					  									</label>
					  								</li>
					  								<li>
														<label>
															<input type="checkbox" >
					  										<span class="checkmark"></span>
					  									</label>
					  								</li>
					  								<li>
														<label>
															<input type="checkbox" >
					  										<span class="checkmark"></span>
					  									</label>
					  								</li>
					  								<li>
														<label>
															<input type="checkbox" >
					  										<span class="checkmark"></span>
					  									</label>
					  								</li>
					  								<li>
														<label>
															<input type="checkbox" >
					  										<span class="checkmark"></span>
					  									</label>
					  								</li>
												</ul>
											</div>
											<div class="relative option-product-2 clearfix">
												<div class="option-product-son float-left right-margin-default">
													<p class="float-left">Qty:</p>
													<input type="number" class="left-margin-15-default" min="01" step="1" max="10" value="1" name="num">
												</div>
												<div class="option-product-son float-left">
													<p class="float-left">Size:</p>
													<select class="">
														<option value="x">X</option>
														<option value="s">S</option>
														<option value="xl">XL</option>
														<option value="xxl">XXL</option>
													</select>
												</div>
											</div>
										</div>
										<div class="relative button-product-list clearfix full-width clear-margin">
											<ul class="clear-margin top-margin-default clearfix bottom-margin-default">
												<li class="button-hover-red"><a href="#" class="animate-default">Add to Cart</a></li>
												<li><a href="#" class="animate-default"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
												<li><a href="#" class="animate-default"><i class="fa fa-signal" aria-hidden="true"></i></a></li>
												<li><a href="#" class="animate-default"><i class="fa fa-search" aria-hidden="true"></i></a></li>
											</ul>
											<div class="btn-print clearfix">
												<a href="javascript:;" class="right-margin-default animate-default title-hover-black" onclick="printWebsite()"><i class="fa fa-print" aria-hidden="true"></i> Print</a>
												<a href="mailto:" class=" animate-default title-hover-black"><i class="fa fa-envelope" aria-hidden="true"></i> Send to a Friend</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="info-product-detail bottom-margin-default relative">
								<div class="row">
									<div class="col-md-12 relative overfollow-hidden">
										<ul class="title-tabs clearfix relative">
											<li onclick="changeTabsProductDetail(1)" class="title-tabs-product-detail title-tabs-1 border no-border-b active-title-tabs bold uppercase">Product Details</li>
											<li onclick="changeTabsProductDetail(2)" class="title-tabs-product-detail title-tabs-2 border no-border-b bold uppercase">Information</li>
											<li onclick="changeTabsProductDetail(3)" class="title-tabs-product-detail title-tabs-3 border no-border-b bold uppercase">Reviews</li>
										</ul>
										<div class="content-tabs-product-detail relative content-tab-1 border active-tabs-product-detail bottom-padding-default top-padding-default left-padding-default right-padding-default">
											<p>Vestibulum eu odio. Suspendisse potenti. Morbi mollis tellus ac sapien. Praesent egestas tristique nibh. Nullam dictum felis eu pede mollis pretium. Fusce egestas elit eget lorem. In auctor lobortis lacus.</p>
											<p>Morbi mollis tellus ac sapien. Nunc nec neque. Praesent nec nisl a purus blandit viverra. Nunc nec neque. Pellentesque auctor neque nec urna. Curabitur suscipit suscipit tellus. Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu, molestie vel, lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Maecenas vestibulum mollis diam.</p>
											<p>Vestibulum facilisis, purus nec pulvinar iaculis, ligula mi congue nunc, vitae euismod ligula urna in dolor. Sed lectus. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Nam at tortor in tellus interdum sagittis. Pellentesque egestas, neque sit amet convallis pulvinar, justo nulla eleifend augue, ac auctor orci leo non est.</p>
										</div>
										<div class="content-tabs-product-detail relative content-tab-2 border bottom-padding-default top-padding-default left-padding-default right-padding-default">
											<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from divs 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in div 1.10.32.</p>
											<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. divs 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
										</div>
										<div class="content-tabs-product-detail relative content-tab-3 border bottom-padding-default top-padding-default left-padding-default right-padding-default">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id eros in nulla dapibus tempor. Quisque tincidunt, turpis ut ornare placerat, diam quam faucibus turpis, nec gravida turpis neque eu augue. Integer et accumsan leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas tincidunt condimentum tincidunt. Maecenas facilisis nibh eget neque ultrices, eu fringilla ipsum aliquam. Aenean auctor consequat ornare. Aliquam et magna vitae est tempus posuere. Etiam vel ex metus. Aliquam ut rhoncus nisi, lacinia rhoncus sem. Nam non felis turpis. Proin viverra turpis a odio interdum scelerisque.</p>

											<p>Nunc tincidunt magna ut orci vestibulum condimentum. Vivamus sagittis eros tellus, nec volutpat augue pretium ut. Donec commodo ante sit amet cursus ultricies. Donec mollis ligula ac augue ullamcorper malesuada. Integer eros enim, placerat ac erat eget, gravida commodo ligula. Nunc at sem in erat commodo interdum. Mauris vulputate est id mi rhoncus, id ultricies lectus posuere. Mauris aliquet, orci ac laoreet iaculis, velit ligula ultrices mauris, ac volutpat odio ante id erat. Sed sagittis tellus nunc, vitae semper magna euismod vel. Cras pretium feugiat augue, quis gravida neque scelerisque at. Mauris mauris nulla, faucibus ac viverra eu, pretium eget tortor. Nam vel lacus a tortor luctus auctor. Donec eu eleifend justo. In ut lobortis odio. Duis euismod dui enim, a faucibus massa fringilla sed.</p>

											<p>Vestibulum posuere et odio at tempor. Vestibulum eu sodales dolor. Etiam venenatis velit ac sodales vestibulum. Pellentesque tincidunt auctor tellus vitae blandit. Aenean vestibulum ut nisl at aliquet. Nullam viverra ultrices tellus ut molestie. Quisque tristique lobortis elit, eget blandit justo vestibulum vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed accumsan vel magna in egestas. Integer ultrices arcu tellus, nec ullamcorper libero commodo in.</p>

											<p>Morbi tristique sapien eu arcu rutrum, ac suscipit lacus ultricies. Etiam non arcu eros. Vestibulum orci ante, tincidunt id velit tristique, tristique rutrum purus. Ut odio sem, ornare id auctor ut, gravida a nibh. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras odio est, vulputate ac imperdiet eu, sollicitudin vel sem. Integer mollis, tellus tincidunt ultricies pharetra, dolor eros mollis sapien, tristique posuere lacus erat eget dolor. Vivamus id vestibulum erat, nec aliquam sapien. Nunc gravida lacinia sagittis. Suspendisse facilisis metus nec sem sagittis, at rutrum nunc sagittis. In vestibulum sem augue, sed convallis eros vestibulum nec. Aenean eget quam ut eros suscipit ornare eget non diam.</p>

											<p>Phasellus sed accumsan dui. Pellentesque aliquam pharetra mattis. Duis feugiat auctor lorem. Aenean dapibus maximus justo vitae feugiat. Praesent dictum faucibus velit, sit amet feugiat justo luctus eget. Duis ac semper lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mi lacus, elementum a pellentesque et, posuere non felis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc placerat purus velit, quis sollicitudin ex dictum vitae. Maecenas efficitur erat vitae diam elementum semper eget non diam. Integer porta orci sit amet hendrerit efficitur.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="slide-product-bottom relative">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12 relative bottom slide-related-product">
										<p class="bold title-slide-product-bottom">RELATED PRODUCTS</p>
										<div class="button-slide-related" id="btn-slide-1"></div>
										<div class="owl-theme owl-carousel" data-items="1,2,3">
											<div class="items">
												<div class="full-width product-category relative">
													<div class="image-product  relative overfollow-hidden">
														<div class="center-vertical-image">
															<img src="lander_plugins/img/product_home_31-min.png" alt="Product">
														</div>
														<a href="#"></a>
														<ul class="option-product animate-default">
															<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
															<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
															<li class="relative"><a href="javascript:;" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
														</ul>
													</div>
													<h3 class="title-product animate-default title-hover-black clearfix full-width"><a href="#">Voyage Yoga Bag</a></h3>
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
															<img src="lander_plugins/img/product_home_32-min.png" alt="Product">
														</div>
														<a href="#"></a>
														<ul class="option-product animate-default">
															<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
															<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
															<li class="relative"><a href="javascript:;" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
														</ul>
													</div>
													<h3 class="title-product animate-default title-hover-black clearfix full-width"><a href="#">MH02-Black09</a></h3>
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
															<img src="lander_plugins/img/product_home_33-min.png" alt="Product">
														</div>
														<a href="#"></a>
														<ul class="option-product animate-default">
															<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
															<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
															<li class="relative"><a href="javascript:;" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
														</ul>
													</div>
													<h3 class="title-product animate-default title-hover-black clearfix full-width"><a href="#">Wayfarer Messenger Bag</a></h3>
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
									<div class="col-md-12 col-sm-12 col-xs-12 relative slide-related-product">
										<p class="bold title-slide-product-bottom">YOU MIGHT ALSO LIKE</p>
										<div class="button-slide-related" id="btn-slide-2"></div>
										<div class="owl-theme owl-carousel" data-items="1,2,3">
											<div class="items">
												<div class="full-width product-category relative">
													<div class="image-product  relative overfollow-hidden">
														<div class="center-vertical-image">
															<img src="lander_plugins/img/product_home_14-min.png" alt="Product">
														</div>
														<a href="#"></a>
														<ul class="option-product animate-default">
															<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
															<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
															<li class="relative"><a href="javascript:;" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
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
															<img src="lander_plugins/img/product_home_23-min.png" alt="Product">
														</div>
														<a href="#"></a>
														<ul class="option-product animate-default">
															<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
															<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
															<li class="relative"><a href="javascript:;" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
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
															<img src="lander_plugins/img/product_home_24-min.png" alt="Product">
														</div>
														<a href="#"></a>
														<ul class="option-product animate-default">
															<li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
															<li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
															<li class="relative"><a href="javascript:;" ><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
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