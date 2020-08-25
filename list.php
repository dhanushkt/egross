<?php
include 'access/useraccesscontrol.php';

if (isset($_GET['list'])) {
    $openlist = true;
    $listno = $_GET['list'];
} else {
    $openlist = false;
}

$grantlist = false;

if ($openlist) {
    //when listno is set
    $checkuserlist = mysqli_query($con, "SELECT * FROM user_list JOIN shopkeeper ON user_list.lsid=shopkeeper.sid WHERE user_list.listno='$listno'");
    //AND user_list.luid='$globaluserid'

    $getlistinfo = mysqli_fetch_assoc($checkuserlist);
    $storename = $getlistinfo['sname'];

    $userid = $getlistinfo['luid'];
    if ($userlogin && ($userid == $globaluserid)) {
        $grantlist = true;
    }

    if (mysqli_num_rows($checkuserlist) == 0) {
        echo "<script>window.location.href='index.php'; </script>";
    } else {
        $cart = true;
    }

    $getallitems = mysqli_query($con, "SELECT * FROM user_listitems JOIN itemmaster ON user_listitems.litmid=itemmaster.itmid WHERE user_listitems.listno='$listno'");
    $getall = mysqli_query($con, "SELECT * FROM user_listitems JOIN itemmaster ON user_listitems.litmid=itemmaster.itmid WHERE user_listitems.listno='$listno'");
    if (mysqli_num_rows($getallitems) == 0) {
        echo "<script>window.location.href='list.php'; </script>";
    }
} else {
    //when listno is not set
    if (!$userlogin) {
        echo "<script>window.location.href='user-login.php'; </script>";
    }

    $getcartitem = mysqli_query($con, "SELECT * FROM user_list JOIN shopkeeper ON user_list.lsid=shopkeeper.sid WHERE user_list.luid='$globaluserid'");

    if ($listcount = mysqli_num_rows($getcartitem) >= 1)
        $cart = true;
    else
        $cart = false;
}

$subtot = 0;



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <?php include 'lander-pages/csslink.php'; ?>
    <style>
        .box {
            width: 40%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 35px;
            border: 2px solid #fff;
            border-radius: 20px/50px;
            background-clip: padding-box;
            text-align: center;
        }

        .button11 {
            font-size: 1em;
            padding: 10px;
            color: #fff;
            border: 2px solid #06D85F;

            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-out;
        }

        .button11:hover {
            background: #06D85F;
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup11 {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 60%;
            position: relative;
        }

        .popup11 h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup11 .close {
            position: absolute;
            top: 5px;
            right: 30px;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .popup11 .close:hover {
            color: #06D85F;
        }

        .popup11 .content {
            max-height: 30%;
            overflow: auto;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 100%;
            }

            .popup11 {
                width: 100%;
            }
        }

        .qty-input {
            /* border: 1px solid black; */
            height: 35px;
            padding-right: 10px;
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
            background-color: #eb1a21;
            color: white;
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
            line-height: 30px;
            font-size: 15px;
            text-align: center;
            border: 1px solid #dedede;
            color: #333;
        }

        .mycartButton:hover {
            background-color: #333;
            color: white;
        }

        .customHoverRow:hover .mycButton {
            background-color: #ebebeb;
        }

        .customHoverRow:hover {
            background-color: #ebebeb;
        }

        .saveBtn {
            padding-right: 10px;
        }

        .saveBtn:hover {
            background-color: #333;
            color: #dedede;
        }
    </style>
    <!-- for overlay -->
    <style>
        .addborder {
            cursor: pointer;
            border: solid red;
            border-radius: 25px;
            font-size: 15px;
            padding-right: 10px;

        }

        .inputcustom {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .buttoncustom {
            background-color: none;
            border-radius: 25px;
            background: none;
            border: none;
            color: black;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            margin: 2px 2px;
            cursor: pointer;
        }

        .overlay {
            opacity: 0.8;
            background-color: rgba(0.7, 0.7, 0.7, 0.7);
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            z-index: 1000;
            visibility: hidden;

        }

        .overlay:target {
            visibility: visible;
            opacity: 100;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            margin-top: 230px;
            background: #fff;
            border-radius: 5px;
            width: 30%;
            position: relative;
        }

        .popup h2 {
            margin-top: 0;
            color: #000;
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #000;

        }

        .popup .close:hover {
            color: #000;
        }

        .popup .content {
            max-height: 0%;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .mobile {
                display: none;
            }

            .popup {
                width: 70%;
            }
        }
    </style>
</head>

<body>
    <script src="lander_plugins/js/toast.js"></script>
    <script>
        $(document).ready(function() {
            $('.listDelall').click(function() {

                var options = {
                    style: {
                        main: {
                            background: "#00ff00",
                            color: "white",
                            'box-shadow': '0 0 0px rgba(0, 0, 0, .9)',
                            'width': '200px'

                        }
                    }
                };
                var getid = $(this).attr('data-id');
                $.ajax({
                    url: 'delete-list.php',
                    type: 'POST',
                    data: {
                        id: getid
                    },
                    success: function() {
                        iqwerty.toast.Toast('List Deleted', options);
                        window.setTimeout(function() {
                            location.href = 'list.php'
                        }, 1000);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.saveBtn').click(function() {

                var options = {
                    style: {
                        main: {
                            background: "#00ff00",
                            color: "white",
                            'box-shadow': '0 0 0px rgba(0, 0, 0, .9)',
                            'width': '200px'

                        }
                    }
                };
                var getid = $(this).attr('data-id');
                var qtyName = 'nqty' + getid;
                var qty = document.getElementById(qtyName).value;
                $.ajax({
                    url: 'update-list.php',
                    type: 'POST',
                    data: {
                        listitem: getid,
                        nqty: qty
                    },
                    success: function(data) {
                        iqwerty.toast.Toast('List Deleted', options);

                        var item = JSON.parse(data);
                        if (item.listno != 0) {
                            location.href = 'list.php?list=' + item.listno;
                        } else {
                            location.href = 'list.php';
                        }
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.itmDelbtn').click(function() {

                var options = {
                    style: {
                        main: {
                            background: "#00ff00",
                            color: "white",
                            'box-shadow': '0 0 0px rgba(0, 0, 0, .9)',
                            'width': '200px'

                        }
                    }
                };
                var getid = $(this).attr('data-id');
                $.ajax({
                    url: 'delete-listitem.php',
                    type: 'POST',
                    data: {
                        id: getid
                    },
                    success: function(data) {
                        iqwerty.toast.Toast('List Deleted', options);

                        var item = JSON.parse(data);
                        if (item.listno != 0) {
                            location.href = 'list.php?list=' + item.listno;
                        } else {
                            location.href = 'list.php';
                        }
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
                                <li class="animate-default title-hover-red"><a href="list.php">Shoping List</a></li>
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
                            <?php if ($openlist) { ?>
                                <!-- Content Shoping Cart -->
                                <!-- <form method="post"> -->
                                <div class="col-md-8 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
                                    <p class="title-shoping-cart"><i class="fa fa-list"></i> <?php echo $storename; ?>
                                        <!-- <a id="custlist" class="addborder pull-right"> <button onclick="getData(); return false;" type="button"class="buttoncustom "><i class="fa fa-plus"></i></button>Custom List</a>-->
                                    </p>
                                    
                                    <?php foreach ($getallitems as $key => $getallitems) { ?>
                                        <div class="relative full-width product-in-cart border no-border-l no-border-r overfollow-hidden">
                                            <div class="relative product-in-cart-col-1 center-vertical-image">
                                                <img src="uploads/item/<?php echo $getallitems['iimg']; ?>" alt="">
                                            </div>
                                            <div class="relative product-in-cart-col-2">
                                                <p class="title-hover-black"><a href="product.php?id=<?php echo $getallitems['itmid']; ?>" class="animate-default"><?php echo $getallitems['iname']; ?></a></p>
                                            </div>
                                            <div class="relative product-in-cart-col-4" style="text-align: right; line-height: 3;">


                                                <!-- <span class="ti-close relative remove-product"></span> -->
                                                <?php if ($grantlist) { ?>
                                                    <button data-id="<?php echo $getallitems['listitem']; ?>" class="mycButton itmDelbtn"><i class="fa fa-trash" style="font-size: 20px"></i></button>
                                                <?php } ?>

                                                <?php if ($grantlist) { ?>
                                                    <div class="qty-input">
                                                        <!-- <i class="less">-</i> -->
                                                        <p style="padding-right: 10px;">Qty: </p>

                                                        <input id="nqty<?php echo $getallitems['listitem']; ?>" type="number" value="<?php echo $getallitems['lqty']; ?>" />
                                                        <!-- <i class="more">+</i> -->
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="qty-input" style="margin-top: 20px">
                                                        <!-- <i class="less">-</i> -->
                                                        <p style="padding-right: 10px;">Qty: </p>

                                                        <input readonly id="nqty<?php echo $getallitems['listitem']; ?>" type="number" value="<?php echo $getallitems['lqty']; ?>" />
                                                        <!-- <i class="more">+</i> -->
                                                    </div>
                                                <?php } ?>

                                                <p style="font-size: 23px !important; margin-right: 10px;s margin-bottom: 10px;" class="text-red price-shoping-cart">₹ <?php echo ($getallitems['iprice'] * $getallitems['lqty']); ?></p>

                                                <?php if ($grantlist) { ?>
                                                    <button data-id="<?php echo $getallitems['listitem']; ?>" style="margin-bottom: 10px; margin-right: 10px;" class="btn saveBtn">Save</button>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                        //calculate subtotal
                                        $subtot = $subtot + ($getallitems['iprice'] * $getallitems['lqty']);
                                        ?>
                                    <?php } ?>
                                    
                                    <aside class="btn-shoping-cart justify-content top-margin-default bottom-margin-default">

                                        <a target="_blank" href="share-list.php?list=<?php echo $listno; ?>" class="button11 mycartButton" id="pdf"> Export as PDF</a>
                                        <a class="mycartButton clipboard"  style="height: 42px; font-size: 140%;">Share</a>
                                    </aside>
                                   
                                </div>
                                
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

                                    <p class="title-shoping-cart">List Total</p>
                                    <div class="full-width relative cart-total bg-gray  clearfix">
                                        <div class="relative justify-content bottom-padding-15-default">
                                            <p>Subtotal</p>
                                            <p class="text-red price-shoping-cart">₹ <?php echo $subtot; ?></p>
                                        </div>
                                        <?php if (false) { ?>
                                            <div class="relative border top-margin-15-default bottom-padding-15-default no-border-t no-border-r no-border-l">
                                                <p class="bottom-margin-15-default">Shipping</p>
                                                <div class="relative justify-content">
                                                    <ul class="check-box-custom title-check-box-black clear-margin clear-margin">
                                                        <li>
                                                            <p>Free Shipping
                                                                <input type="radio" name="shipping" checked="">
                                                                <span class="checkmark"></span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p>Standard
                                                                <input type="radio" name="shipping">
                                                                <span class="checkmark"></span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p>Local Pickup
                                                                <input type="radio" name="shipping">
                                                                <span class="checkmark"></span>
                                                            </p>
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
                                        <?php } ?>
                                    </div>
                                    <!--popup-->

                                    <div id="popup1" class="overlay">
                                        <div class="popup">
                                            <h2>PLACE ORDER</h2>
                                            <a class="close" onclick="enableScroll()" href="#">&times;</a>
                                            <div class="content">

                                                <a href="checkout.php?list=<?php echo $getlistinfo['listno']; ?>&type=online" data-id="<?php echo $getaddresss['uaddrid']; ?>" class="btn btn-primary btn-lg btn-proceed-checkout full-width top-margin-15-default" style="background:green" ;>ONLINE</a>

                                                <a href="checkout.php?list=<?php echo $getlistinfo['listno']; ?>&type=offline" data-id="<?php echo $getaddresss['uaddrid']; ?>" class="btn btn-primary btn-lg btn-proceed-checkout full-width top-margin-15-default" style="background:Red" ;>OFFLINE</a>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function disableScroll() {
                                            scrollTop =
                                                window.pageYOffset || document.documentElement.scrollTop;
                                            scrollLeft =
                                                window.pageXOffset || document.documentElement.scrollLeft,
                                                window.onscroll = function() {
                                                    window.scrollTo(scrollLeft, scrollTop);
                                                };
                                        }

                                        function enableScroll() {
                                            window.onscroll = function() {};
                                        }
                                    </script>
                                    <!--popup-->
                                    <?php if ($grantlist) { ?>
                                        <a class="btn btn-primary btn-lg btn-proceed-checkout button-hover-red full-width top-margin-15-default" onclick="disableScroll()" class="a" href="#popup1">
                                            Proceed to Checkout </a>
                                    <?php } ?>
                                </div>
                                <!-- End Content Right -->
                            <?php } else { ?>
                                <!-- Content Shoping Cart -->

                                <div class="col-md-12 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
                                    <p class="title-shoping-cart">Shopping List</p>
                                    <?php foreach ($getcartitem as $key => $getcartitem) { ?>

                                        <?php
                                        $listno = $getcartitem['listno'];
                                        $subtot = 0;

                                        $getlistitems = mysqli_query($con, "SELECT * FROM user_listitems JOIN itemmaster ON user_listitems.litmid=itemmaster.itmid WHERE user_listitems.listno='$listno'");
                                        $itemcount = mysqli_num_rows($getlistitems);

                                        while ($listitm = mysqli_fetch_assoc($getlistitems)) {
                                            $subtot = $subtot + ($listitm['iprice'] * $listitm['lqty']);
                                        }
                                        ?>
                                        <div class="relative full-width product-in-cart border no-border-l no-border-r overfollow-hidden customHoverRow" onclick="location.href='list.php?list=<?php echo $listno; ?>'">


                                            <div class=" mobile col-md-6 product-in-cart-col-2">
                                                <p class="title-hover-black">
                                                    <i style="padding-right: 10px; font-size:20px;" class="fa fa-list"></i>
                                                    <a href="product.php?id=<?php echo $getcartitem['itmid']; ?>" class="animate-default">
                                                        <?php echo $getcartitem['sname']; ?>
                                                    </a>
                                                </p>
                                            </div>

                                            <div class="mobile col-md-3 product-in-cart-col-2">
                                                <p>Items in list: <?php echo $itemcount; ?> </p>
                                            </div>



                                            <div class="mobile col-md-3" style="text-align: right; line-height: 3;">
                                                <input type="hidden" value="" name="listno">
                                                <button onclick="event.cancelBubble=true;if(event.stopPropagation) event.stopPropagation();return false;" data-id="<?php echo $getcartitem['listno']; ?>" class="mycButton listDelall" id="Delallbtn" type="submit"><i class="fa fa-trash" style="font-size: 20px"></i></button>
                                                <p style="font-size: 23px !important;" class="text-red price-shoping-cart">₹ <?php echo $subtot; ?></p>
                                            </div>
                                            <!--Mobile-->
                                            <div class="col-md-6" style="padding-top: 10px;">
                                                <p style="text-align: center;"> <i style="padding-right: 10px; font-size:20px;" class="fa fa-list"></i>
                                                    <a href="product.php?id=<?php echo $getcartitem['itmid']; ?>" class="animate-default">
                                                        <?php echo $getcartitem['sname']; ?>
                                                    </a></p>
                                                <hr>
                                                <p style="text-align: center;">Items in list: <?php echo $itemcount; ?> </p>
                                                <p style="text-align: center;" class="text-red price-shoping-cart">₹ <?php echo $subtot; ?></p>
                                            </div>
                                            <div>
                                                <input type="hidden" value="" name="listno">
                                                <button onclick="event.cancelBubble=true;if(event.stopPropagation) event.stopPropagation();return false;" data-id="<?php echo $getcartitem['listno']; ?>" class="mycButton listDelall" id="Delallbtn" type="submit">
                                                    <i class="fa fa-trash" style="font-size: 15px"></i>
                                                </button>
                                            </div>
                                            <!--End Mobile-->
                                        </div>
                                    <?php } ?>

                                    <aside style="text-align:left;" class="justify-content top-margin-default bottom-margin-default">
                                        <a href="custom-list.php" style="padding-top:10px; padding-bottom:10px; border-color: black;" class="clear-margin mycartButton animate-default">My List</a>
                                        <a target="_blank" href="share-list.php?alist=<?php echo $globaluserid ?>" style="padding-top:10px; padding-bottom:10px; border-color: black;" class="clear-margin mycartButton animate-default">Export as pdf</a>
                                    </aside>
                                </div>
                                <!-- End Content Shoping Cart -->
                            <?php } ?>
                        <?php } else { ?>
                            <div class="full-width relative col-md-12 mol-lg-12">
                                <div class="container text-center" style="padding: 110px; line-height: 5;">
                                    <i style="font-size: 100px;" class="fa fa-list-alt"></i>
                                    <h2>Your list is empty</h2>
                                    <a href="index.php" style="background-color: #eb1a21; color: white;" class="btn">CONTINUE SHOPPING</a>
                                </div>
                            </div>
                        <?php } ?>
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
    // $(document).ready(function() {
    //     var table = $('#example').DataTable({
    //         lengthChange: false,
    //         buttons: ['pdf']
    //     });

    //     // table.buttons().container()
    //     //     .appendTo('#example_wrapper .col-md-6:eq(0)');
    //     $("#pdf").on("click", function() {
    //         table.button('.buttons-pdf').trigger();
    //     });
    // });
    //copy link  
    var $temp = $("<a>");
    var urls = window.location.origin;
    var $url = " "+urls+"/share-list.php?list=<?php echo $listno; ?>";
   
    $('.clipboard').on('click', function() {
        $("body").append($temp);
        $temp.val($url).select();
        document.execCommand("copy");
        $temp.remove();
        $(".clipboard").text("URL copied!");
    })
    // $('#custlist').on('click', function() {
    //     $("#list").show();
    // });
    // $('#cancellist').on('click', function() {
    //     $("#list").hide();
    // });
</script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer=""></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js" defer=""></script>

</html>