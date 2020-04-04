<?php
include_once('access/useraccesscontrol.php');
$header_subtot = 0;
$header_getcart = mysqli_query($con, "SELECT * FROM user_cart JOIN itemmaster ON user_cart.citmid = itemmaster.itmid WHERE user_cart.cuid = '$globaluserid'");
if (mysqli_num_rows($header_getcart) >= 1) {
?>
    <div class="relative">
        <?php while ($header_cart = mysqli_fetch_assoc($header_getcart)) { ?>
            <div class="product-cart-son clearfix">
                <div class="image-product-cart float-left center-vertical-image ">
                    <a href="#"><img src="uploads/item/<?php echo $header_cart['iimg']; ?>" alt="" /></a>
                </div>
                <div class="info-product-cart float-left">
                    <p class="title-product title-hover-black"><a class="animate-default" href="#"><?php echo $header_cart['iname']; ?></a></p>
                    <p class="clearfix price-product">₹ <?php echo $header_cart['ctotal']; ?> <span class="total-product-cart-son">(x<?php echo $header_cart['cqty']; ?>)</span></p>
                </div>
            </div>
        <?php $header_subtot = $header_subtot + $header_cart['ctotal'];
        } ?>
    </div>
    <div class="relative border no-border-l no-border-r total-cart-header">
        <p class="bold clear-margin">Subtotal:</p>
        <p class=" clear-margin bold">₹ <?php echo $header_subtot; ?></p>
    </div>
    <div class="relative btn-cart-header" style="float: right !important;">
        <a href="cart.php" class="uppercase bold animate-default">view cart</a>
        <!-- <a href="#" class="uppercase bold button-hover-red animate-default">checkout</a> -->
    </div>
<?php } else { ?>
    <div class="relative text-center">
        <i style="font-size: 100px;" class="fa fa-shopping-cart"></i>
        <h4>Your cart is empty</h4>
    </div>
<?php } ?>