<?php
include 'access/useraccesscontrol.php';
$menuslide = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'lander-pages/csslink.php'; ?>
    <style>
        .title-gold-bg:before {
            border-left-color: red;
        }

        .text {
            width: 100%;
            position: absolute;
            bottom: 0px;
            left: 0px;
            background: white;
            opacity: 90%;
            padding: 4px 8px;
            color: black;
            margin: 0;
        }
    </style>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

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
        <div class="relative clearfix full-width">
            <!-- Menu & Slide -->
            <?php if ($menuslide) { ?>
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
                                        <div class="item"><img src="lander_plugins/img/banner.png" alt="Banner Header 1">
                                        </div>
                                        <div class="item"><img src="lander_plugins/img/slide_2.png" alt="Banner Header 2">
                                        </div>
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
                                    <p>New Products</p>
                                </div>
                                <div class="clearfix menu-title-box bold uppercase">
                                    <ul>
                                        <?php
                                        $getallitem = mysqli_query($con, "SELECT * FROM itemmaster JOIN shopkeeper ON itemmaster.isid = shopkeeper.sid");
                                        $itemdata = mysqli_fetch_assoc($getallitem);
                                        $hp_getcat1 = mysqli_query($con, "SELECT * FROM mcat LIMIT 4");
                                        foreach ($hp_getcat1 as $max => $hp_getcat1) {
                                        ?>
                                            <li><a onclick="showBoxCateHomeByID('#new_product<?php echo $max; ?>','.good-deal-product')" href="javascript:;"><?php echo $hp_getcat1['mcname']; ?></a></li>
                                            <?php $mcatarr[$max] = $hp_getcat1['mcid'];  ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix content-product-box bottom-margin-default full-width">
                            <div class="row">
                                <div class="relative">
                                    <?php for ($n = 0; $n <= $max; $n++) { ?>
                                        <!-- default for only first category -->
                                        <div class="good-deal-product animate-default <?php if ($n == 0) {
                                                                                            echo "active-box-category";
                                                                                        } ?> hidden-content-box" id="new_product<?php echo $n; ?>">
                                            <!-- Product Son -->
                                            <div class="owl-carousel owl-theme">
                                                <?php
                                                $mcid = $mcatarr[$n];
                                                $hp_getitm1 = mysqli_query($con, "SELECT * FROM itemmaster JOIN scat ON itemmaster.iscid=scat.scid WHERE scat.smcid='$mcid'");
                                                foreach ($hp_getitm1 as $itm => $hp_getitm1) {
                                                ?>
                                                    <?php
                                                    $itmid = $hp_getitm1['itmid'];
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
                                                    <div class=" product-son ">
                                                        <div class="clearfix image-product relative animate-default">
                                                            <div class="center-vertical-image">
                                                                <img src="uploads/item/<?php echo $hp_getitm1['iimg']; ?>" alt="Product . . ." />
                                                            </div>
                                                            <ul class="option-product animate-default">
                                                                <?php if ($userlogin) { ?>

                                                                    <?php if ($cartlist) { ?>
                                                                        <li class="relative">
                                                                            <a href="javascript:void(0)">
                                                                                <i style="color: red" class="icon-list icons"></i>
                                                                            </a>
                                                                        </li>
                                                                    <?php } else { ?>

                                                                        <li class="relative">
                                                                            <a class="addCart" data-id="<?php echo $hp_getitm1['itmid']; ?>" data-sid="<?php echo $hp_getitm1['isid']; ?>" href="javascript:void(0)">
                                                                                <i class="icon-list icons"></i>
                                                                            </a>
                                                                        </li>
                                                                    <?php } ?>


                                                                    <?php if ($wishlist) { ?>
                                                                        <li class="relative"><a href="javascript:void(0)">
                                                                                <i style="color: red" class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i>
                                                                            </a></li>
                                                                    <?php } else { ?>
                                                                        <li class="relative"><a class="wishlistItem" data-id="<?php echo $hp_getitm1['itmid']; ?>" href="javascript:void(0)"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                                                    <?php } ?>

                                                                    <li class="relative"><a href="product.php?product=<?php echo $hp_getitm1['itmid']; ?>"><i class="data-icon data-icon-basic icon-basic-info" aria-hidden="true"></i></a></li>
                                                                <?php } else { ?>
                                                                    <li class="relative"><a href="user-login.php"><i class="icon-list icons"></i></a>
                                                                    </li>

                                                                    <li class="relative"><a href="user-login.php"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>

                                                                    <li class="relative"><a href="product.php?product=<?php echo $hp_getitm1['itmid']; ?>"><i class="data-icon data-icon-basic icon-basic-info" aria-hidden="true"></i></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                        <!-- <div class="clearfix ranking">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-half" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    </div> -->
                                                        <p class="title-product clearfix full-width title-hover-black animate-default">
                                                            <a class="animate-default" href="product.php?product=<?php echo $hp_getitm1['itmid']; ?>"><?php echo $hp_getitm1['iname']; ?></a>
                                                        </p>
                                                        <p class="clearfix price-product">₹ <?php echo $hp_getitm1['iprice']; ?>
                                                        </p>
                                                        <div style="float: right; padding-right: 10px;">
                                                            <?php if ($userlogin) { ?>
                                                                <?php if ($cartlist) { ?>
                                                                    <i class="icon-list icons"></i>
                                                                <?php }
                                                                if ($wishlist) { ?>
                                                                    <i class="fa fa-heart"></i>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <!-- End Product Son -->
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content Product -->

            <!-- Product Category Percent 2 -->
            <div class=" full-width category-percent-two bottom-margin-default">
                <div class="clearfix container-web">
                    <div class=" container">
                        <div class="row">
                            <?php $hp_getmcat2 = mysqli_query($con, "SELECT * FROM mcat");
                            foreach ($hp_getmcat2 as $mcat => $hp_getmcat2) {
                            ?>
                                <?php $mcid1 = $hp_getmcat2['mcid'];
                                $hp_getitm2 = mysqli_query($con, "SELECT * FROM itemmaster JOIN scat ON itemmaster.iscid=scat.scid WHERE scat.smcid='$mcid1'");
                                if (mysqli_num_rows($hp_getitm2) > 0) {
                                ?>
                                    <div class=" clearfix content-left col-md-6 col-sm-6" style="padding-top: 20px !important">
                                        <!-- Title Product -->
                                        <div class="clearfix title-box full-width border">
                                            <div class="clearfix name-title-box title-category title-gold-bg relative" style="background: red;">
                                                <!-- <img src="lander_plugins/img/icon_fashion.png" alt="Icon Fashion" class="absolute" /> -->
                                                <p style="padding-left: 10px"><?php echo $hp_getmcat2['mcname']; ?></p>
                                            </div>
                                            <div class="clearfix menu-title-box">
                                                <p class="view-all-product-category title-hover-red"><a href="view-category.php?id=<?php echo $hp_getmcat2['mcid']; ?>" class="animate-default">view all</a></p>
                                            </div>
                                        </div>

                                        <!-- Content Product Box -->
                                        <div class="clearfix product-percent-content border-collapsed-box full-width">

                                            <?php foreach ($hp_getitm2 as $itmm => $hp_getitm2) { ?>
                                                <div class="clearfix relative product-no-ranking border-collapsed-element percent-content-3">
                                                    <div class="effect-hover-zoom center-vertical-image">
                                                        <img src="uploads/item/<?php echo $hp_getitm2['iimg']; ?>" alt="Product Image . . .">
                                                        <a href="product.php?product=<?php echo $hp_getitm2['itmid']; ?>"></a>
                                                    </div>

                                                    <div class="clearfix absolute name-product-no-ranking">
                                                        <div class="text">
                                                            <p class="title-product clearfix full-width title-hover-black"><a href="product.php?product=<?php echo $hp_getitm2['itmid']; ?>"><?php echo $hp_getitm2['iname']; ?></a>
                                                            </p>
                                                            <p class="clearfix price-product">₹ <?php echo $hp_getitm2['iprice']; ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Category Percent 2 -->

            <!-- Support -->
            <div class=" support-box full-width clear-padding bottom-margin-default">
                <div class="container-web clearfix">
                <!--    FREE SHIPPING, SUPPORT, HELP PARTNER, CONTACT US
                    <div class=" container border top-padding-default bottom-padding-default">
                        <div class="row">
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="lander_plugins/img/icon_free_ship.png" alt="Icon Free Ship" class="absolute" />
                                <p>free shipping</p>
                                <p>on order over $500</p>
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
                -->
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
<script>
    var preloader = document.getElementById("loading");

    function myFunction() {
        preloader.style.display = 'none';
    };
</script>

</html>