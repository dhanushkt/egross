<?php

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
    $getcartitem = mysqli_query($con, "SELECT * FROM user_list JOIN shopkeeper ON user_list.lsid=shopkeeper.sid WHERE user_list.luid='$globaluserid'");

    if ($listcount = mysqli_num_rows($getcartitem) >= 1)
        $cart = true;
    else
        $cart = false;
}

$subtot = 0;

?>

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
                            <p class="title-hover-black"><a href="product.php?product=<?php echo $getallitems['itmid']; ?>" class="animate-default"><?php echo $getallitems['iname']; ?></a></p>
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
                    <a class="mycartButton clipboard" style="height: 42px; font-size: 140%;">Share</a>
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
                    <?php if ($getcartitem['sid'] > 0) { ?>

                        <div class="relative full-width product-in-cart border no-border-l no-border-r overfollow-hidden customHoverRow" onclick="location.href='list.php?list=<?php echo $listno; ?>'">


                            <div class=" mobile col-md-6 product-in-cart-col-2">
                                <p class="title-hover-black">
                                    <i style="padding-right: 10px; font-size:20px;" class="fa fa-list"></i>
                                    <a href="javascript:void(0)" class="animate-default">
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
                                    <a href="product.php?product=<?php echo $getcartitem['itmid']; ?>" class="animate-default">
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