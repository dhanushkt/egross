<?php
include_once '../access/connection.php';

//button name: register
if (isset($_POST['register'])) {
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $cmobile = $_POST['cmobile'];
    $cpassword = $_POST['cpassword'];

    $query = mysqli_query($con, "INSERT INTO customer (custid,cname,cemail,cmobile,cpassword) VALUES '$cusid','$cname','$cemail','$cmobile','$cpassword'");
    if ($query) 
    { 
        echo "Record inserted";
    }
    else
    {
        echo(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="lander_plugins/" >
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
        <header class="relative full-width">
            <div class=" container-web relative">
                <div class=" container">
                    <div class="row">
                        <div class=" header-top">
                            <p class="contact_us_header col-md-4 col-xs-12 col-sm-3 clear-margin">
                                <img src="img/icon_phone_top.png" alt="Icon Phone Top Header" /> Call us <span class="text-red bold">070-7782-7137</span>
                            </p>
                            <div class="menu-header-top text-right col-md-8 col-xs-12 col-sm-6 clear-padding">
                                <ul class="clear-margin">
                                    <li class="relative"><a href="#">My Account</a></li>
                                    <li class="relative"><a href="#">Wishlist</a></li>
                                    <li class="relative">
                                        <a href="#">EN</a>
                                        <ul>
                                            <li class="relative"><a href="#">JP</a></li>
                                            <li class="relative"><a href="#">EN</a></li>
                                            <li class="relative"><a href="#">CN</a></li>
                                        </ul>
                                    </li>
                                    <li class="relative">
                                        <a href="#">USD</a>
                                        <ul>
                                            <li class="relative"><a href="#">AUD</a></li>
                                            <li class="relative"><a href="#">USD</a></li>
                                            <li class="relative"><a href="#">CAD</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="clearfix header-content full-width relative">
                            <div class="clearfix icon-menu-bar">
                                <i class="data-icon data-icon-arrows icon-arrows-hamburger-2 icon-pushmenu js-push-menu"></i>
                            </div>
                            <div class="clearfix logo">
                                <a href="#"><img alt="Logo" src="img/logo.png" /></a>
                            </div>
                            <div class="clearfix search-box relative float-left">
                                <form method="GET" action="/" class="">
                                    <div class="clearfix category-box relative">
                                        <select name="cate_search">
                                            <option>All Category</option>
                                            <option>Food</option>
                                            <option>Mobile & Tablet</option>
                                            <option>Electric Appliances</option>
                                            <option>Electronics & Technology</option>
                                            <option>Fashion</option>
                                            <option>Health & Beauty</option>
                                            <option>Mother & Baby</option>
                                            <option>Books & Stationery</option>
                                            <option>Home & Life</option>
                                            <option>Sports & Outdoors</option>
                                            <option>Auto & Moto</option>
                                            <option>Voucher Service</option>
                                        </select>
                                    </div>
                                    <input type="text" name="s" placeholder="Enter keyword here . . .">
                                    <button type="submit" class="animate-default button-hover-red">Search</button>
                                </form>
                            </div>
                            <div class="clearfix icon-search-mobile absolute">
                                <i onclick="showBoxSearchMobile()" class="data-icon data-icon-basic icon-basic-magnifier"></i>
                            </div>
                            <div class="clearfix cart-website absolute" onclick="showCartBoxDetail()">
                                <img alt="Icon Cart" src="img/icon_cart.png" />
                                <p class="count-total-shopping absolute">2</p>
                            </div>
                            <div class="clearfix cart-website absolute" onclick="showCartBoxDetail()">
                                <img alt="Icon Cart" src="img/icon_cart.png" />
                                <p class="count-total-shopping absolute">2</p>
                            </div>
                            <div class="cart-detail-header border">
                                <div class="relative">
                                    <div class="product-cart-son clearfix">
                                        <div class="image-product-cart float-left center-vertical-image ">
                                            <a href="#"><img src="img/product_image_6-min.png" alt="" /></a>
                                        </div>
                                        <div class="info-product-cart float-left">
                                            <p class="title-product title-hover-black"><a class="animate-default" href="#">MH02-Black09</a></p>
                                            <p class="clearfix price-product">$350 <span class="total-product-cart-son">(x1)</span></p>
                                        </div>
                                    </div>
                                    <div class="product-cart-son">
                                        <div class="image-product-cart float-left center-vertical-image">
                                            <a href="#"><img src="img/product_image_7-min.png" alt="" /></a>
                                        </div>
                                        <div class="info-product-cart float-left">
                                            <p class="title-product title-hover-black"><a class="animate-default" href="#">Voyage Yoga Bag</a></p>
                                            <p class="clearfix price-product">$350 <span class="total-product-cart-son">(x1)</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative border no-border-l no-border-r total-cart-header">
                                    <p class="bold clear-margin">Subtotal:</p>
                                    <p class=" clear-margin bold">$700</p>
                                </div>
                                <div class="relative btn-cart-header">
                                    <a href="#" class="uppercase bold animate-default">view cart</a>
                                    <a href="#" class="uppercase bold button-hover-red animate-default">checkout</a>
                                </div>
                            </div>
                            <div class="mask-search absolute clearfix" onclick="hiddenBoxSearchMobile()"></div>
                            <div class="clearfix box-search-mobile">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <a class="menu-vertical hidden-md hidden-lg" onclick="showMenuMobie()">
							<span class="animate-default"><i class="fa fa-list" aria-hidden="true"></i> all categories</span>
						</a>
                    </div>
                </div>
            </div>
            <div class="menu-header-v3 hidden-ipx">
                <div class="container">
                    <div class="row">
                        <!-- Menu Page -->
                        <div class="menu-header full-width">
                            <ul class="clear-margin">
                                <li onclick="showMenuHomeV3()"><a class="animate-default" href="#"><i class="fa fa-list" aria-hidden="true"></i> all categories</a></li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">home</a>
                                    <ul class="sub-menu mega-menu">
                                        <li class="relative">
                                            <a class="animate-default center-vertical-image" href="home_v1.html"><img src="img/home_1_menu-min.png" alt=""></a>
                                            <p><a href="home_v1.html">Home 1</a></p>
                                        </li>
                                        <li class="relative">
                                            <a class="animate-default center-vertical-image" href="home_v2.html"><img src="img/home_2_menu-min.png" alt=""></a>
                                            <p><a href="home_v2.html">Home 2</a></p>
                                        </li>
                                        <li class="relative">
                                            <a class="animate-default center-vertical-image" href="home_v3.html"><img src="img/home_3_menu-min.png" alt=""></a>
                                            <p><a href="home_v3.html">Home 3</a></p>
                                        </li>
                                    </ul>
                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">shop</a>
                                    <div class="sub-menu mega-menu-v2">
                                        <ul>
                                            <li>Catgory Type</li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v1.html">Category v1</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v1_2.html">Category v1.2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v2.html">Category v2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v2_2.html">Category v2.2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v3.html">Category v3</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v3_2.html">Category v3.2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v4.html">Category v4</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v4_2.html">Category v4.2</a></li>
                                        </ul>
                                        <ul>
                                            <li>Single Product Type</li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v1.html">Product Single 1</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v2.html">Product Single 2</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v3.html">Product Single 3</a></li>
                                        </ul>
                                        <ul>
                                            <li>Order Page</li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="cartpage.html">Cart Page</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="checkout.html">Checkout</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="compare.html">Compare</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="quickview.html">QuickView</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="trackyourorder.html">Track Order</a></li>
                                            <li class="title-hover-red"><a class="animate-default clear-padding" href="wishlist.html">WishList</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">pages</a>
                                    <ul>
                                        <li class="title-hover-red"><a class="animate-default" href="about.html">About Us</a></li>
                                        <li class="title-hover-red"><a class="animate-default" href="contact.html">Contact</a></li>
                                        <li class="title-hover-red"><a class="animate-default" href="404.html">404</a></li>
                                    </ul>
                                </li>
                                <li class="title-hover-red">
                                    <a class="animate-default" href="#">Blog</a>
                                    <ul>
                                        <li class="title-hover-red"><a class="animate-default" href="blog.html">Blog Category</a></li>
                                        <li class="title-hover-red"><a class="animate-default" href="blogdetail.html">Blog Detail</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- End Menu Page -->
                    </div>
                </div>
            </div>
            <div class="clearfix menu_more_header menu-web menu-bg-white">
                <ul>
                    <li><a href="#"><img src="img/icon_hot_gray.png" alt="Icon Hot Deals" /> <p>Hot Deals</p></a></li>
                    <li><a href="#"><img src="img/icon_food_gray.png" alt="Icon Food" /> <p>Food</p></a></li>
                    <li><a href="#"><img src="img/icon_mobile_gray.png" alt="Icon Mobile & Tablet" /> <p>Mobile & Tablet</p></a></li>
                    <li><a href="#"><img src="img/icon_electric_gray.png" alt="Icon Electric Appliances" /> <p>Electric Appliances</p></a></li>
                    <li><a href="#"><img src="img/icon_computer_gray.png" alt="Icon Electronics & Technology" /> <p>Electronics & Technology</p></a></li>
                    <li><a href="#"><img src="img/icon_fashion_gray.png" alt="Icon Fashion" /> <p>Fashion</p></a></li>
                    <li><a href="#"><img src="img/icon_health_gray.png" alt="Icon Health & Beauty" /> <p>Health & Beauty</p></a></li>
                    <li><a href="#"><img src="img/icon_mother_gray.png" alt="Icon Mother & Baby" /> <p>Mother & Baby</p></a></li>
                    <li><a href="#"><img src="img/icon_book_gray.png" alt="Icon Books & Stationery" /> <p>Books & Stationery</p></a></li>
                    <li><a href="#"><img src="img/icon_home_gray.png" alt="Icon Home & Life" /> <p>Home & Life</p></a></li>
                    <li><a href="#"><img src="img/icon_sport_gray.png" alt="Icon Sports & Outdoors" /> <p>Sports & Outdoors</p></a></li>
                    <li><a href="#"><img src="img/icon_auto_gray.png" alt="Icon Auto & Moto" /> <p>Auto & Moto</p></a></li>
                    <li><a href="#"><img src="img/icon_voucher_gray.png" alt="Icon Voucher Service" /> <p>Voucher Service</p></a></li>
                </ul>
            </div>
            <div class="header-ontop">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="clearfix logo">
                                <a href="#"><img alt="Logo" src="img/logo.png" /></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="menu-header">
                                <ul class="main__menu clear-margin">
                                    <li class="title-hover-red">
                                        <a class="animate-default" href="#">home</a>
                                        <ul class="sub-menu mega-menu">
                                            <li class="relative">
                                                <a class="animate-default center-vertical-image" href="home_v1.html"><img src="img/home_1_menu-min.png" alt=""></a>
                                                <p><a href="home_v1.html">Home 1</a></p>
                                            </li>
                                            <li class="relative">
                                                <a class="animate-default center-vertical-image" href="home_v2.html"><img src="img/home_2_menu-min.png" alt=""></a>
                                                <p><a href="home_v2.html">Home 2</a></p>
                                            </li>
                                            <li class="relative">
                                                <a class="animate-default center-vertical-image" href="home_v3.html"><img src="img/home_3_menu-min.png" alt=""></a>
                                                <p><a href="home_v3.html">Home 3</a></p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="title-hover-red">
                                        <a class="animate-default" href="#">shop</a>
                                        <div class="sub-menu mega-menu-v2">
                                            <ul>
                                                <li>Catgory Type</li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v1.html">Category v1</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v1_2.html">Category v1.2</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v2.html">Category v2</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v2_2.html">Category v2.2</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v3.html">Category v3</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v3_2.html">Category v3.2</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v4.html">Category v4</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v4_2.html">Category v4.2</a></li>
                                            </ul>
                                            <ul>
                                                <li>Single Product Type</li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v1.html">Product Single 1</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v2.html">Product Single 2</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="product_v3.html">Product Single 3</a></li>
                                            </ul>
                                            <ul>
                                                <li>Order Page</li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="cartpage.html">Cart Page</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="checkout.html">Checkout</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="compare.html">Compare</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="quickview.html">QuickView</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="trackyourorder.html">Track Order</a></li>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="wishlist.html">WishList</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="title-hover-red">
                                        <a class="animate-default" href="#">pages</a>
                                        <ul>
                                            <li class="title-hover-red"><a class="animate-default" href="about.html">About Us</a></li>
                                            <li class="title-hover-red"><a class="animate-default" href="contact.html">Contact</a></li>
                                            <li class="title-hover-red"><a class="animate-default" href="404.html">404</a></li>
                                        </ul>
                                    </li>
                                    <li class="title-hover-red">
                                        <a class="animate-default" href="#">Blog</a>
                                        <ul>
                                            <li class="title-hover-red"><a class="animate-default" href="blog.html">Blog Category</a></li>
                                            <li class="title-hover-red"><a class="animate-default" href="blogdetail.html">Blog Detail</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
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
					<div class="full-width relative top-checkout-box overfollow-hidden top-margin-default">
						<div class="col-md-6 col-sm-12 col-xs-12 clear-padding-left left-top-checkout">
							<!--login-->
						</div>
						<!--coupon code-->
					</div>
					<!-- Content Shoping Cart -->
					<div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
						<!--<p class="title-shoping-cart">Billing Details</p>-->
						<div class="relative clearfix full-width">
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
								<label>Enter the Name *</label>
								<input class="full-width" type="text" name="cname">
							</div>
						</div>
						<div class="relative clearfix full-width">
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
								<label>Email Address *</label>
								<input class="full-width" type="text" name="cemail">
							</div>
                        </div>
                        <div>
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
								<label>Phone *</label>
								<input class="full-width" type="text" name="cmobile">
							</div><br>
						</div>
						
						
						<div class="relative full-width clearfix">
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
								<label>Enter new Password *</label>
								<input class="full-width" type="text" name="apassword">
							</div>
                        </div>
                        <div>
							<div class="col-md-6 col-sm-6 col-xs-12 clearfix clear-padding-left clear-padding-480 relative form-input">
								<label>Check Password *</label>
								<input class="full-width" type="text" name="cpassword">
							</div>
						</div><br><br><br><br><br><br>
						<!--creating account-->
						<!--shipping details-->
						<!--order note-->
					</div>
					<!-- End Content Shoping Cart -->
					<!-- Content Right -->
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
		<!-- End Support Box -->
	</div>
	<!-- End Content Box -->
	<!-- Footer Box -->
	<?php include 'lander-pages/footer.php'; ?>
</div>
	<!-- End Footer Box -->
	<?php include 'lander-pages/jslinks.php'; ?>
</body>
</html>