<?php
include 'access/useraccesscontrol.php';

if (!$userlogin) {
    echo "<script>window.location.href='user-login.php'; </script>";
}

$getcartitem = mysqli_query($con, "SELECT * FROM user_cart JOIN itemmaster ON user_cart.citmid = itemmaster.itmid WHERE user_cart.cuid = '$globaluserid'");

if (mysqli_num_rows($getcartitem) >= 1)
    $cart = true;
else
    $cart = false;

$subtot = 0;

//update care
if (isset($_POST['updatecart'])) {
    $cartid = $_POST['cartid'];
    $nqty = $_POST['nqty'];
    $itmid = $_POST['itmid'];

    //get item info
    $getitminfo = mysqli_query($con, "SELECT * FROM itemmaster WHERE itmid=$itmid");
    $itminfo = mysqli_fetch_assoc($getitminfo);

    $total = $itminfo['iprice'] * $nqty;

    $updatecart = mysqli_query($con, "UPDATE user_cart SET cqty=$nqty, ctotal=$total WHERE cartid=$cartid");

    if ($updatecart) {
        $getcartitem = mysqli_query($con, "SELECT * FROM user_cart JOIN itemmaster ON user_cart.citmid = itemmaster.itmid WHERE user_cart.cuid = '$globaluserid'");
    }
}

//delete cart item
if (isset($_POST['delcart'])) {
    $cartid = $_POST['cartid'];

    $deletecart = mysqli_query($con, "DELETE FROM user_cart WHERE cartid=$cartid");

    if ($deletecart) {
        $getcartitem = mysqli_query($con, "SELECT * FROM user_cart JOIN itemmaster ON user_cart.citmid = itemmaster.itmid WHERE user_cart.cuid = '$globaluserid'");
        if (mysqli_num_rows($getcartitem) >= 1)
            $cart = true;
        else
            $cart = false;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'lander-pages/csslink.php'; ?>
    <style>
        .qty-input {
            /* border: 1px solid black; */
            height: 35px;
            position: relative;
            width: 100px;
        }

        .qty-input p {
            display: inline-block;
            text-align: center;
            height: 30px;
            margin: 0px;
            position: relative;
        }

        .qty-input i {
            cursor: pointer;
            font-family: serif;
            height: 30px;
            float: left;
            line-height: 29px;
            text-align: center;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-transition: all 150ms ease-out;
            transition: all 150ms ease-out;
            width: 22px;
        }

        .qty-input i:active {
            background-color: #F1F1F1;
            -webkit-transition: none;
            transition: none;
        }

        .qty-input input {
            /* border: 0px solid; */
            /* float: left; */
            float: right;
            font-size: 15px;
            height: 35px;
            /* height: 30px; */
            text-align: center;
            outline: none;
            width: 40px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .mycButton {
            padding: 10px;
            background: white;
            box-shadow: 0px 0px 0px transparent;
            border: 0px solid transparent;
            text-shadow: 0px 0px 0px transparent;
        }

        .mycButton:hover {
            color: #eb1a21;
            box-shadow: 0px 0px 0px transparent;
            border: 0px solid transparent;
            text-shadow: 0px 0px 0px transparent;
        }

        .mycartButton {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            font-family: 'Roboto', sans-serif;
            box-sizing: border-box;
            padding: 0;
            background-color: transparent;
            outline: none;
            text-decoration: none;
            margin: 0 !important;
            -webkit-transition: 0.5s all ease;
            width: calc(100% / 2 - 20px);
            line-height: 40px;
            font-size: 18px;
            text-align: center;
            border: 1px solid #dedede;
            color: #333;
        }

        .mycartButton:hover {
            background-color: #333;
            color: #dedede;
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
                                <li class="animate-default title-hover-red"><a href="cart.php">Shoping Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <!-- Content Shoping Cart -->
            <div class="relative container-web">
                <div class="container">
                    <div class="row relative">
                        <?php if ($cart) { ?>
                            <!-- Content Shoping Cart -->
                            <form method="post">
                                <div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
                                    <p class="title-shoping-cart">Shopping Cart</p>
                                    <?php

                                    foreach ($getcartitem as $key => $getcartitem) {
                                    ?>
                                        <div class="relative full-width product-in-cart border no-border-l no-border-r overfollow-hidden">
                                            <div class="relative product-in-cart-col-1 center-vertical-image">
                                                <img src="uploads/item/<?php echo $getcartitem['iimg']; ?>" alt="">
                                            </div>
                                            <div class="relative product-in-cart-col-2">
                                                <p class="title-hover-black"><a href="product.php?id=<?php echo $getcartitem['itmid']; ?>" class="animate-default"><?php echo $getcartitem['iname']; ?></a></p>
                                            </div>
                                            <div class="relative product-in-cart-col-4" style="text-align: right; line-height: 3;">

                                                <input type="hidden" value="<?php echo $getcartitem['cartid']; ?>" name="cartid">
                                                <input type="hidden" value="<?php echo $getcartitem['itmid']; ?>" name="itmid">
                                                <!-- <span class="ti-close relative remove-product"></span> -->
                                                <button class="mycButton" name="delcart" type="submit"><i class="fa fa-trash" style="font-size: 20px"></i></button>


                                                <div class="qty-input">
                                                    <!-- <i class="less">-</i> -->
                                                    <p style="padding-right: 10px;">Qty: </p>
                                                    <input name="nqty" type="number" value="<?php echo $getcartitem['cqty']; ?>" />
                                                    <!-- <i class="more">+</i> -->
                                                </div>

                                                <p style="font-size: 23px !important;" class="text-red price-shoping-cart">₹ <?php echo $getcartitem['ctotal']; ?></p>
                                            </div>
                                        </div>
                                        <?php 
                                            //calculate subtotal
                                            $subtot = $subtot + $getcartitem['ctotal'];
                                        ?>
                                    <?php } ?>

                                    <aside class="btn-shoping-cart justify-content top-margin-default bottom-margin-default">
                                        <a href="index.php" class="clear-margin animate-default">Continue Shopping</a>
                                        <button type="submit" name="updatecart" class="mycartButton">Update Cart</button>
                                    </aside>
                                </div>
                            </form>
                            <!-- End Content Shoping Cart -->
                            <!-- Content Right -->
                            <div class="col-md-4 col-sm-12 col-xs-12 right-content-shoping relative clear-padding-right">

                                <?php if (false) { ?>
                                    <p class="title-shoping-cart">Coupon</p>
                                    <div class="full-width relative coupon-code bg-gray  clearfix">
                                        <input type="text" class="full-width" name="coupon_code" placeholder="Coupon Code">
                                        <button class="full-width top-margin-15-default">APPLY COUPON</button>
                                    </div>
                                <?php } ?>

                                <p class="title-shoping-cart">Cart Total</p>
                                <div class="full-width relative cart-total bg-gray  clearfix">
                                    <div class="relative justify-content bottom-padding-15-default border no-border-t no-border-r no-border-l">
                                        <p>Subtotal</p>
                                        <p class="text-red price-shoping-cart">₹ <?php echo $subtot; ?></p>
                                    </div>
                                    <div class="relative border top-margin-15-default bottom-padding-15-default no-border-t no-border-r no-border-l">
                                        <p class="bottom-margin-15-default">Shipping</p>
                                        <div class="relative justify-content">
                                            <ul class="check-box-custom title-check-box-black clear-margin clear-margin">
                                                <li>
                                                    <label>Free Shipping
                                                        <input type="radio" name="shipping" checked="">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>Standard
                                                        <input type="radio" name="shipping">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>Local Pickup
                                                        <input type="radio" name="shipping">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </li>
                                            </ul>
                                            <p class="price-gray-sidebar">$20.00</p>
                                        </div>
                                        <div onclick="optionShiping(this)" class="relative full-width select-ship-option justify-content top-margin-15-default">
                                            <p class="border no-border-r no-border-l no-border-t">Calculate Shipping</p>
                                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            <ul class="clear-margin absolute full-width">
                                                <li onclick="selectOptionShoping(this)">Calculate Shipping 1</li>
                                                <li onclick="selectOptionShoping(this)">Calculate Shipping 2</li>
                                                <li onclick="selectOptionShoping(this)">Calculate Shipping 3</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="relative justify-content top-margin-15-default">
                                        <p class="bold">Total</p>
                                        <p class="text-red price-shoping-cart">$700.00</p>
                                    </div>
                                </div>
                                <button class="btn-proceed-checkout button-hover-red full-width top-margin-15-default">Proceed to Checkout</button>
                            </div>
                            <!-- End Content Right -->
                        <?php } else { ?>
                            <div class="full-width relative col-md-12 mol-lg-12">
                                <div class="container text-center" style="padding: 110px; line-height: 5;">
                                    <i style="font-size: 100px;" class="fa fa-shopping-cart"></i>
                                    <h2>Your cart is empty</h2>
                                    <a href="index.php" style="background-color: #eb1a21; color: white;" class="btn">CONTINUE SHOPPING</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- End Content Shoping Cart -->
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
        </div>
        <!-- End Content Box -->
        <!-- Footer Box -->
        <?php include 'lander-pages/footer.php'; ?>
    </div>
    <!-- End Footer Box -->
    <?php include 'lander-pages/jslinks.php'; ?>
</body>

</html>