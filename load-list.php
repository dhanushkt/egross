<?php
include_once('access/useraccesscontrol.php');
$header_subtot = 0;
$header_getlist = mysqli_query($con, "SELECT * FROM user_list JOIN shopkeeper ON user_list.lsid=shopkeeper.sid WHERE user_list.luid='$globaluserid'");
$indexlist=0;
if (mysqli_num_rows($header_getlist) >= 1) {
?>
    <div class="relative">
        <?php while ($header_list = mysqli_fetch_assoc($header_getlist)) { ?>
            <?php $header_listno = $header_list['listno']; ?>
            <div class="product-cart-son clearfix" onclick="location.href='list.php?list=<?php echo $header_listno; ?>'">
                <?php $header_getitemcount = mysqli_query($con, "SELECT * FROM user_listitems WHERE listno='$header_listno'"); $header_numberofitems = mysqli_num_rows($header_getitemcount); ?>
                <!-- <div class="image-product-cart float-left center-vertical-image ">
                    <a href="#"><img src="uploads/item/<?php //echo $header_list['iimg']; ?>" alt="" /></a>
                </div> -->
                <?php if($header_list['sid'] > 0) {?>
                <div class="info-product-cart float-left">
                    <p class="title-product title-hover-black"><?php echo $header_list['sname']; ?></p>
                    <p>Items in list: <?php echo $header_numberofitems; ?></p>

                    <!-- <p class="clearfix price-product">₹ <?php //echo $header_list['ctotal'];?> <span class="total-product-cart-son">(x<?php //echo $header_list['cqty'];?>)</span></p> -->
                </div>
                <?php } ?>
            </div>
        <?php //$header_subtot = $header_subtot + $header_list['ctotal'];
        } ?>
    </div>
    <!-- <div class="relative border no-border-l no-border-r total-cart-header">
        <p class="bold clear-margin">Subtotal:</p>
        <p class=" clear-margin bold">₹ <?php //echo $header_subtot; ?></p>
    </div> -->
    <hr style="margin: 5px 0px 5px">
    <div class="relative btn-cart-header" style="float: right !important;">
        <a href="list.php" class="uppercase bold animate-default">view all list</a>
        <!-- <a href="#" class="uppercase bold button-hover-red animate-default">checkout</a> -->
    </div>
<?php } else { ?>
    <div class="relative text-center">
        <i style="font-size: 100px;" class="fa fa-shopping-cart"></i>
        <h4>YOUR LIST IS EMPTY</h4>
    </div>
<?php } ?>