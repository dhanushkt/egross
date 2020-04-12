<?php 
include 'access/useraccesscontrol.php';
$menuslide = false;
$qry=mysqli_query($con,"SELECT * FROM mcat");
$getmaincat=mysqli_fetch_assoc($qry);
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
        <div class="relative clearfix full-width">
            <!-- Menu & Slide -->
            <?php if($menuslide) { ?>
            <div class="clearfix container-web relative">
                <div class=" container relative">
                    <div class="row">
                        <div class="clearfix relative menu-slide clear-padding bottom-margin-default">
                            <!-- Menu -->
                            <div class="clearfix menu-web relative">
                                <ul>
                                    <li><a href="#"><img src="lander_plugins/img/icon_hot.png" alt="Icon Hot Deals" />
                                            <p>Hot Deals</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_food.png" alt="Icon Food" />
                                            <p>Food</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_mobile.png" alt="Icon Mobile & Tablet" />
                                            <p>Mobile & Tablet</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_electric.png" alt="Icon Electric Appliances" />
                                            <p>Electric Appliances</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_computer.png" alt="Icon Electronics & Technology" />
                                            <p>Electronics & Technology</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_fashion.png" alt="Icon Fashion" />
                                            <p>Fashion</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_health.png" alt="Icon Health & Beauty" />
                                            <p>Health & Beauty</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_mother.png" alt="Icon Mother & Baby" />
                                            <p>Mother & Baby</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_book.png" alt="Icon Books & Stationery" />
                                            <p>Books & Stationery</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_tablet.png" alt="Icon Home & Life" />
                                            <p>Home & Life</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_sport.png" alt="Icon Sports & Outdoors" />
                                            <p>Sports & Outdoors</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_auto.png" alt="Icon Auto & Moto" />
                                            <p>Auto & Moto</p>
                                        </a></li>
                                    <li><a href="#"><img src="lander_plugins/img/icon_voucher.png" alt="Icon Voucher Service" />
                                            <p>Voucher Service</p>
                                        </a></li>
                                </ul>
                            </div>
                            <!-- Slide -->
                            <div class="clearfix slide-box-home slide-v1 relative">
                                <div class="clearfix slide-home owl-carousel owl-theme">
                                    <div class="item"><img src="lander_plugins/img/banner.png" alt="Banner Header 1"></div>
                                    <div class="item"><img src="lander_plugins/img/slide_2.png" alt="Banner Header 2"></div>
                                </div>
                            </div>
                            <div class=" box-banner-small-v1 box-banner-small">
                                <div class="effect-layla relative clear-padding col-md-4 col-sm-4 col-xs-4 float-left zoom-image-hover">
                                    <img src="lander_plugins/img/banner_small.png" alt="">
                                    <a href="#" class="relative"></a>
                                </div>
                                <div class="effect-layla relative clear-padding col-md-4 col-sm-4 col-xs-4 float-left zoom-image-hover">
                                    <img src="lander_plugins/img/banner_small_1.png" alt="">
                                    <a href="#" class="relative"></a>
                                </div>
                                <div class="effect-layla relative clear-padding col-md-4 col-sm-4 col-xs-4 float-left zoom-image-hover">
                                    <img src="lander_plugins/img/banner_small_2.png" alt="">
                                    <a href="#" class="relative"></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Menu & Slide -->
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- Content Product -->
            <div class="clearfix box-product full-width top-padding-default bg-gray">
                <div class="clearfix container-web">
                    <div class=" container">
                        <div class="row">
                            <!-- Title Product -->
                            <div class="clearfix title-box full-width bottom-margin-default border bg-white">
                                <div class="clearfix name-title-box title-hot-bg relative">
                                    <img src="lander_plugins/img/icon_percent.png" class="absolute" alt="Icon Hot Deals" />
                                    <p><?php echo $getmaincat['mcname'];?></p>
                                </div>
                                <div class="clearfix menu-title-box bold uppercase">
                                    <ul>
                                    <?php
                                    $scat =  mysqli_query($con,"SELECT scname FROM scat where smcid=1");
                                    while($getscat = mysqli_fetch_assoc($scat))
                                    {?>
                                    <li><a onclick="showBoxCateHomeByID('#mobile-tablet','.good-deal-product')" href="javascript:;"><?php echo $getscat['scname'];?></a></li>
                                    <?php
                                    }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix content-product-box bottom-margin-default full-width">
                            <div class="row">
                                <div class="relative">
                                    <div class="good-deal-product animate-default active-box-category hidden-content-box" id="mobile-tablet">
                                        <!-- Product Son -->
                                        <div class="owl-carousel owl-theme">
                                            <div class=" product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/img_product.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Eos cu utroque inermis</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class=" product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_1.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Vel regione discere ut</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class="clearfix product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_2.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Praesent vel</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class="clearfix product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_3.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Fermentum velit</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <!-- End Product Son -->
                                        </div>
                                    </div>
                                    <div class="good-deal-product animate-default hidden-content-box" id="food">
                                        <!-- Product Son -->
                                        <div class="owl-carousel owl-theme">
                                            <div class=" product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_8-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Has eu idque similique</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class=" product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_9-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Est cu nibh clita</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class="clearfix product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_15-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Beatvs Solo2 On-Ear</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class="clearfix product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_10-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Lorem ipsum dolor sit amet</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <!-- End Product Son -->
                                        </div>
                                    </div>
                                    <div class="good-deal-product animate-default hidden-content-box" id="home-life">
                                        <!-- Product Son -->
                                        <div class="owl-carousel owl-theme">
                                            <div class=" product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_13-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Pro at nostrud</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class=" product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_14-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Pro at definitiones</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class="clearfix product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_6-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Nostrud percipit definitiones</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class="clearfix product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_7-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Sea accusata voluptatibus</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <!-- End Product Son -->
                                        </div>
                                    </div>
                                    <div class="good-deal-product animate-default hidden-content-box" id="fashion">
                                        <!-- Product Son -->
                                        <div class="owl-carousel owl-theme">
                                            <div class=" product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_11-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Ne cum falli voluptua</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class=" product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_12-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Ne dolor voluptua</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class="clearfix product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_14-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Vel regione discere ut</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class="clearfix product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_6-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Sed an nominavi</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <!-- End Product Son -->
                                        </div>
                                    </div>
                                    <div class="good-deal-product animate-default hidden-content-box" id="auto-moto">
                                        <!-- Product Son -->
                                        <div class="owl-carousel owl-theme">
                                            <div class=" product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_4-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Te eam iisque deseruisse</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class=" product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_6-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Mauris varius</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class="clearfix product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_13-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Nullam vel lectus maximus</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <div class="clearfix product-son ">
                                                <div class="clearfix image-product relative animate-default">
                                                    <div class="center-vertical-image">
                                                        <img src="lander_plugins/img/product_home_14-min.png" alt="Product . . ." />
                                                    </div>
                                                    <ul class="option-product animate-default">
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                        <li class="relative"><a href="#"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix ranking">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star-half" aria-hidden="true"></i>
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                </div>
                                                <p class="title-product clearfix full-width title-hover-black animate-default"><a class="animate-default" href="#">Maecenas justo ex</a></p>
                                                <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                            </div>
                                            <!-- End Product Son -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content Product -->
            <!-- Product Box -->
            <div class="top-margin-default container-web">
                <div class=" container">
                    <div class="row">
                        <div class="clearfix title-box full-width border">
                            <div class="clearfix name-title-box title-category title-green-bg relative">
                                <img alt="Icon Food" src="lander_plugins/img/icon_food.png" class="absolute" />
                                <p>Snacks & Beverages</p>
                            </div>
                            <div class="clearfix menu-title-box bold uppercase">
                                <ul>
                                    <li><a href="javascript:;" onclick="showBoxCateHomeByID('#confectionery','.box-food-content')">Confectionery</a></li>
                                    <li><a href="javascript:;" onclick="showBoxCateHomeByID('#milk-cream','.box-food-content')">Milk & Cream</a></li>
                                    <li><a href="javascript:;" onclick="showBoxCateHomeByID('#dry-food','.box-food-content')">Dry Food</a></li>
                                    <li><a href="javascript:;" onclick="showBoxCateHomeByID('#vegetables','.box-food-content')">Vegetables</a></li>
                                    <li><a href="javascript:;" onclick="showBoxCateHomeByID('#drinks','.box-food-content')">Drinks</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="display-table bottom-margin-default full-width">
                            <div class="clearfix clear-padding list-logo-category border no-border-t no-border-r list-logo-category-v1 float-left">
                                <ul>
                                    <li><a href="#"><img src="lander_plugins/img/logo_3.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_4.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_5.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_6.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_1.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_2.png" alt="Logo"></a></li>
                                </ul>
                            </div>
                            <div class=" banner-category banner-category-v1 float-left relative effect-bubba zoom-image-hover">
                                <img src="lander_plugins/img/banner1.png" alt="Banner">
                                <a href="#"></a>
                            </div>
                            <div class="clearfix list-products-category list-products-category-v1 float-left relative">
                                <div class="box-food-content relative animate-default active-box-category hidden-content-box border-collapsed-box" id="confectionery">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Wayfarer Messenger Bag5</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$650</span> $450</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_1-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Voyage Yoga Bag</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$450</span> $150</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_2-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">MH02-Black09</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$560</span> $250</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_3-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Impulse Duffle2</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$356</span> $784</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-food-content relative animate-default hidden-content-box border-collapsed-box" id="milk-cream">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Wayfarer Messenger Bag</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$450</span> $550</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_3-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Rival Field Messenger</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$520</span> $360</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_1-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">MH01-Black</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$590</span> $360</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_2-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Impulse Duffle</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$840</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-food-content relative animate-default hidden-content-box border-collapsed-box" id="dry-food">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_1-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Endeavor Daytrip Backpack</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Emile Henry Braiserr21</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$600</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_2-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Diam Special1</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$500</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_3-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Diam Special08</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$400</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-food-content relative animate-default hidden-content-box border-collapsed-box" id="vegetables">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_2-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Voyage Yoga Bag</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$320</span> $300</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_3-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">MH02-Black09</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$450</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Rival Field Messenger</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$480</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_1-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Impulse Duffle</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$800</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-food-content relative animate-default hidden-content-box border-collapsed-box" id="drinks">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_1-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">MH01-Black</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$780</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_2-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Diam Special1</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$630</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Diam Special08</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$560</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_3-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Emile Henry Braiserr21</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$550</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Box -->
            <!-- Banner Full With -->
            <div class="clearfix relative full-width bottom-margin-default">
                <div class="clearfix container-web">
                    <div class=" container banner_full_width">
                        <div class="row overfollow-hidden banners-effect5 relative">
                            <img src="lander_plugins/img/banner_full_w.png" alt="Banner Full Width . . .">
                            <a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Full With -->
            <!-- Product Box -->
            <div class=" container-web">
                <div class=" container">
                    <div class="row">
                        <div class="clearfix title-box full-width border">
                            <div class="clearfix name-title-box title-category title-jungle-green-bg relative">
                                <img alt="Icon Mobile & Tablet" src="lander_plugins/img/icon_mobile.png" class="absolute" />
                                <p>Packaged Foods</p>
                            </div>
                            <div class="clearfix menu-title-box bold uppercase">
                                <ul>
                                    <li><a onclick="showBoxCateHomeByID('#smart-phone','.box-mobile-content')" href="javascript:;">Smart phone</a></li>
                                    <li><a onclick="showBoxCateHomeByID('#tablet','.box-mobile-content')" href="javascript:;">Tablet</a></li>
                                    <li><a onclick="showBoxCateHomeByID('#smart-watch','.box-mobile-content')" href="javascript:;">Smart Watch</a></li>
                                    <li><a onclick="showBoxCateHomeByID('#case','.box-mobile-content')" href="javascript:;">Case</a></li>
                                    <li><a onclick="showBoxCateHomeByID('#gadget','.box-mobile-content')" href="javascript:;">Gadget</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="display-table bottom-margin-default full-width">
                            <div class="clearfix clear-padding list-logo-category list-logo-category-v1 float-left border no-border-t no-border-r">
                                <ul>
                                    <li><a href="#"><img src="lander_plugins/img/logo_3.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_4.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_5.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_6.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_1.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_2.png" alt="Logo"></a></li>
                                </ul>
                            </div>
                            <div class=" banner-category float-left relative effect-bubba zoom-image-hover">
                                <img src="lander_plugins/img/banner_category_1-min.png" alt="Banner">
                                <a href="#"></a>
                            </div>
                            <div class="clearfix list-products-category list-products-category-v1 float-left relative">
                                <div class="box-mobile-content border-collapsed-box animate-default hidden-content-box active-box-category" id="smart-phone">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_4-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Cras sed quam vehicula</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$600</span> $250</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_5-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Mauris varius</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$500</span> $450</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_6-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Maecenas justo ex</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$500</span> $400</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_7-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Est cu nibh clita</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$600</span> $300</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-mobile-content border-collapsed-box animate-default hidden-content-box" id="tablet">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_6-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Beatvs Solo2 On-Ear</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$540</span> $360</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_7-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Has eu idque similique</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$500</span> $400</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_4-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Vel regione discere ut</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$500</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_5-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Beatvs Solo2 On-Ear</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$607</span> $530</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-mobile-content border-collapsed-box animate-default hidden-content-box" id="smart-watch">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_5-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">MH02-Black09</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$350</span> $100</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_6-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Voyage Yoga Bag</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$500</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_4-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Wayfarer Messenger Bag</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_7-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Rival Field Messenger</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-mobile-content border-collapsed-box animate-default hidden-content-box" id="case">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_4-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Impulse Duffle</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_6-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">MH01-Black</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_7-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Diam Special1</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_5-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Diam Special08</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-mobile-content border-collapsed-box animate-default hidden-content-box" id="gadget">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_6-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Emile Henry Braiserr21</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_4-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">MH02-Black09</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$500</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_5-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Rival Field Messenger</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$320</span> $206</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_7-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Impulse Duffle2</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$802</span> $523</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Box -->
            <!-- Banner Full With -->
            <div class="clearfix relative full-width bottom-margin-default">
                <div class="clearfix container-web">
                    <div class=" container banner_full_width">
                        <div class="row relative banners-effect5">
                            <img src="lander_plugins/img/banner_full_w_1.png" alt="Banner Full Width . . ." class="img-responsive">
                            <a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Full With -->
            <!-- Product Box -->
            <div class=" container-web">
                <div class=" container">
                    <div class="row">
                        <div class="clearfix title-box full-width border">
                            <div class="clearfix name-title-box title-category title-turquoise-bg relative">
                                <img alt="Icon Electric" src="lander_plugins/img/icon_electric.png" class="absolute" />
                                <p>Household & Pets</p>
                            </div>
                            <div class="clearfix menu-title-box bold uppercase">
                                <ul>
                                    <li><a onclick="showBoxCateHomeByID('#television','.box-electric-content')" href="javascript:;">television</a></li>
                                    <li><a onclick="showBoxCateHomeByID('#laptop','.box-electric-content')" href="javascript:;">laptop</a></li>
                                    <li><a onclick="showBoxCateHomeByID('#camera','.box-electric-content')" href="javascript:;">camera</a></li>
                                    <li><a onclick="showBoxCateHomeByID('#audio','.box-electric-content')" href="javascript:;">audio</a></li>
                                    <li><a onclick="showBoxCateHomeByID('#accessories','.box-electric-content')" href="javascript:;">Accessories</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="display-table bottom-margin-default full-width">
                            <div class="clearfix clear-padding list-logo-category border no-border-t no-border-r list-logo-category-v1 float-left">
                                <ul>
                                    <li><a href="#"><img src="lander_plugins/img/logo_3.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_4.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_5.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_6.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_1.png" alt="Logo"></a></li>
                                    <li><a href="#"><img src="lander_plugins/img/logo_2.png" alt="Logo"></a></li>
                                </ul>
                            </div>
                            <div class=" banner-category float-left relative zoom-image-hover effect-bubba">
                                <img src="lander_plugins/img/banner_category_1.png" alt="Banner">
                                <a href="#"></a>
                            </div>
                            <div class="clearfix list-products-category list-products-category-v1 float-left relative">
                                <div class="border-collapsed-box active-box-category hidden-content-box box-electric-content animate-default" id="television">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_8-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Mauris varius</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_9-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Maecenas justo ex</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_10-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Nullam vel lectus maximus</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_11-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Aenean ultrices tincidunt</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-collapsed-box hidden-content-box box-electric-content animate-default" id="laptop">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_8-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Praesent vel fermentum velit</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_11-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Vel regione discere ut</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_9-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Est cu nibh clita</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_10-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Has eu idque similique</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-collapsed-box hidden-content-box box-electric-content animate-default" id="camera">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_10-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Vel regione discere ut</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_11-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Ne cum falli dolor voluptua</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_8-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Te eam iisque deseruisse</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_9-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Voyage Yoga Bag</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-collapsed-box hidden-content-box box-electric-content animate-default" id="audio">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_8-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Cras sed quam vehicula</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_10-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Diam Special08</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_11-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Diam Special1</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_9-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Endeavor Daytrip Backpack</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-collapsed-box hidden-content-box box-electric-content animate-default" id="accessories">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_9-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">MH01-Black</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_10-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Elements Hyperion</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_11-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">molestias excepturi sinte</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-2">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_category_8-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">corrupti quosny dolores</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Box -->
            <!-- Banner Half Website -->
            <div class=" relative banner-half-web full-width bottom-margin-default">
                <div class="clearfix container-web">
                    <div class=" container">
                        <div class="row">
                            <div class="clearfix content-left col-md-6 col-sm-6 col-xs-12 zoom-image-hover overfollow-hidden">
                                <div class="overfollow-hidden effect-oscar relative">
                                    <img class="max-width" src="lander_plugins/img/banner_halt.png" alt="Banner . . ." />
                                    <a href="#"></a>
                                </div>
                            </div>
                            <div class="clearfix content-right col-md-6 col-sm-6 col-xs-12 zoom-image-hover overfollow-hidden">
                                <div class="overfollow-hidden effect-oscar relative">
                                    <img class="max-width" src="lander_plugins/img/banner_percent_2.png" alt="Banner . . ." />
                                    <a href="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Half Website -->
            <!-- Product Category Percent 2 -->
            <div class=" full-width category-percent-two bottom-margin-default">
                <div class="clearfix container-web">
                    <div class=" container">
                        <div class="row">
                            <div class=" clearfix content-left col-md-6 col-sm-6">
                                <!-- Title Product -->
                                <div class="clearfix title-box full-width border">
                                    <div class="clearfix name-title-box title-category title-gold-bg relative">
                                        <img src="lander_plugins/img/icon_fashion.png" alt="Icon Fashion" class="absolute" />
                                        <p>Personal Care & Baby</p>
                                    </div>
                                    <div class="clearfix menu-title-box">
                                        <p class="view-all-product-category title-hover-red"><a href="#" class="animate-default">view all</a></p>
                                    </div>
                                </div>
                                <div class=" banner-percent-product zoom-image-hover overfollow-hidden effect-oscar relative">
                                    <img src="lander_plugins/img/banner_product_percent.png" class="max-width" alt="Image . . ." />
                                    <a href="#"></a>
                                </div>
                                <!-- Content Product Box -->
                                <div class="clearfix product-percent-content border-collapsed-box full-width">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_1-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Voyage Yoga Bag</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_2-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">MH02-Black09</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_3-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Impulse Duffle2</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_4-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Rival Field Messenger</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_5-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Impulse Duffle</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_6-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Rival Field Messenger</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" clearfix content-right col-md-6 col-sm-6">
                                <!-- Title Product -->
                                <div class="clearfix title-box full-width border">
                                    <div class="clearfix name-title-box title-category title-violet-bg relative">
                                        <img src="lander_plugins/img/icon_health.png" alt="Icon Health & Beauty" class="absolute" />
                                        <p>Skin Care</p>
                                    </div>
                                    <div class="clearfix menu-title-box">
                                        <p class="view-all-product-category title-hover-red"><a href="#" class="animate-default">view all</a></p>
                                    </div>
                                </div>
                                <div class=" banner-percent-product zoom-image-hover overfollow-hidden effect-oscar relative">
                                    <img src="lander_plugins/img/banner_p_2_1.png" class="max-width" alt="Image . . ." />
                                    <a href="#"></a>
                                </div>
                                <!-- Content Product Box -->
                                <div class="clearfix product-percent-content border-collapsed-box full-width">
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_7-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Cras sed quam</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_8-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Cras tempus molestie</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_9-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">Nullam lectus</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_10-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">expedita lirope</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_11-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">corrupti</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                    <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                        <div class="effect-hover-zoom center-vertical-image">
                                            <img src="lander_plugins/img/img_product_small_12-min.png" alt="Product Image . . .">
                                            <a href="#"></a>
                                        </div>
                                        <div class="clearfix absolute name-product-no-ranking">
                                            <p class="title-product clearfix full-width title-hover-black"><a href="#">accusamus odiote</a></p>
                                            <p class="clearfix price-product"><span class="price-old">$700</span> $350</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Category Percent 2 -->
            <!-- Banner Full With -->
            <div class=" relative full-width bottom-margin-default">
                <div class="clearfix container-web">
                    <div class=" container banner_full_width">
                        <div class="row relative banners-effect5 overfollow-hidden">
                            <img src="lander_plugins/img/banner_full_w_2.png" alt="Banner Full Width . . .">
                            <a href="#"></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Full With -->
            <!-- Support -->
            <div class=" support-box full-width clear-padding bottom-margin-default">
                <div class="container-web clearfix">
                    <div class=" container border top-padding-default bottom-padding-default">
                        <div class="row">
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="lander_plugins/img/icon_free_ship.png" alt="Icon Free Ship" class="absolute" />
                                <p>free shipping</p>
                                <p>on order over ₹ 500</p>
                            </div>
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="lander_plugins/img/icon_support.png" alt="Icon Supports" class="absolute">
                                <p>support</p>
                                <p>life time support 24/7</p>
                            </div>
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="lander_plugins/img/icon_patner.png" alt="Icon partner" class="absolute">
                                <p>help partner</p>
                                <p>help all aspects</p>
                            </div>
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="lander_plugins/img/icon_phone_big.png" alt="Icon Phone Tablet" class="absolute">
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