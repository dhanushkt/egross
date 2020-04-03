<header class="relative full-width box-shadow" id="myHeader">
    <div class="clearfix container-web relative">
        <div class=" container">
            <div class="row">
                <div class=" header-top">
                    <p class="contact_us_header col-md-4 col-xs-12 col-sm-3 clear-margin hidden-mobile">
                        <!-- <img src="lander_plugins/img/icon_phone_top.png" alt="Icon Phone Top Header" />  -->
                        <?php if($userlogin) { ?> Welcome, <?php echo $globaluname; ?> <?php } ?>
                    </p>
                    <div class="clear-padding menu-header-top text-right col-md-8 col-xs-12 col-sm-6">
                        <ul class="clear-margin">
                            <?php if($userlogin) { ?>
                            <li class="relative"><a href="user-account.php">My Account</a></li>
                            <?php } else { ?>
                            <li class="relative"><a href="user-login.php">Login</a></li>
                            <?php } ?>
                            <?php if($userlogin) { ?>
                            <li class="relative"><a href="#">Wishlist</a></li>
                            <?php } ?>
                            <li class="relative">
                                <a href="#">English</a>
                                <ul>
                                    <li class="relative"><a href="#">ಕನ್ನಡ</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="clearfix header-content full-width relative">
                    <div class="clearfix icon-menu-bar">
                        <i class="data-icon data-icon-arrows icon-arrows-hamburger-2 icon-pushmenu js-push-menu" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix logo">
                        <a href="#"><img alt="Logo" src="lander_plugins/img/logo.png" /></a>
                    </div>
                    <div class="clearfix search-box relative float-left">
                        <form method="GET" action="search.php" class="">
                            <div class="clearfix category-box relative">
                                <select name="mcat">
                                    <option selected value="all">All Category</option>
                                    <?php 
                                    $header_getmcat = mysqli_query($con, "SELECT * FROM mcat");
                                    while($header_mcat = mysqli_fetch_assoc($header_getmcat))
                                    {
                                    ?>
                                    <option><?php echo $header_mcat['mcname']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <input type="text" name="search" placeholder="Enter keyword here . . .">
                            <button type="submit" class="animate-default button-hover-red">Search</button>
                        </form>
                    </div>
                    <div class="clearfix icon-search-mobile absolute">
                        <i onclick="showBoxSearchMobile()" class="data-icon data-icon-basic icon-basic-magnifier"></i>
                    </div>
                    <div class="clearfix cart-website absolute" onclick="showCartBoxDetail()">
                        <img alt="Icon Cart" src="lander_plugins/img/icon_cart.png" />
                        <p class="count-total-shopping absolute">2</p>
                    </div>
                    <div class="cart-detail-header border">
                        <div class="relative">
                            <div class="product-cart-son clearfix">
                                <div class="image-product-cart float-left center-vertical-image ">
                                    <a href="#"><img src="lander_plugins/img/product_image_6-min.png" alt="" /></a>
                                </div>
                                <div class="info-product-cart float-left">
                                    <p class="title-product title-hover-black"><a class="animate-default" href="#">MH02-Black09</a></p>
                                    <p class="clearfix price-product">$350 <span class="total-product-cart-son">(x1)</span></p>
                                </div>
                            </div>
                            <div class="product-cart-son">
                                <div class="image-product-cart float-left center-vertical-image">
                                    <a href="#"><img src="lander_plugins/img/product_image_7-min.png" alt="" /></a>
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
    <div class="header-ontop">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-3">
                    <div class="clearfix logo">
                        <a href="#"><img alt="Logo" src="lander_plugins/img/logo.png" /></a>
                    </div>
                </div> -->
                <div class="col-md-9">
                    <div class="menu-header">
                        <ul class="main__menu clear-margin">
                            <li class="title-hover-red">
                                <a class="animate-default" href="index.php">HOME</a>
                            </li>
                            <li class="title-hover-red">
                                <a class="animate-default" href="javascript:void(0)">SHOP</a>
                                <div class="sub-menu mega-menu-v2" style="min-width: 800px !important">
                                    <?php 
                                    $header_getmcat2 = mysqli_query($con, "SELECT * FROM mcat");
                                    while($header_mcat2 = mysqli_fetch_assoc($header_getmcat2))
                                    {
                                        $header_mcatid = $header_mcat2['mcid'];
                                    ?> 
                                    <ul>
                                        <li><?php echo $header_mcat2['mcname'] ?></li>
                                        <?php 
                                        $header_getscat = mysqli_query($con, "SELECT * FROM scat WHERE smcid='$header_mcatid' LIMIT 5");
                                        while($header_scat = mysqli_fetch_assoc($header_getscat)) {
                                        ?>
                                        <li class="title-hover-red"><a class="animate-default clear-padding" href="category_v1.html"><?php echo $header_scat['scname']; ?></a></li>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="title-hover-red">
                                <a class="animate-default" href="about.php">ABOUT</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>