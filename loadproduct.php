<?php
$wishlist = false;
$cartlist = false;

if (!empty($_POST["itmid"])) {

    // Include the database configuration file
    include 'access/useraccesscontrol.php';
    // Count all records except already displayed
    $query = $con->query("SELECT COUNT(*) as num_rows FROM itemmaster WHERE itmid < " . $_POST['itmid'] . " ORDER BY itmid DESC");
    $row = $query->fetch_assoc();
    $totalRowCount = $row['num_rows'];

    $showLimit = 3;

    // Get records from the database
    $query = $con->query("SELECT * FROM itemmaster WHERE itmid < " . $_POST['itmid'] . " ORDER BY itmid DESC LIMIT $showLimit");
?>
    <div class="row">
        <?php
        if ($query->num_rows > 0) {
            while ($itemdata = $query->fetch_assoc()) {
                $itmid = $itemdata['itmid'];
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
                <div class="col-md-4 col-sm-4 col-xs-12 product-category relative effect-hover-boxshadow animate-default">
                    <div class="image-product relative overfollow-hidden">
                        <div class="center-vertical-image">
                            <img src="uploads/item/<?php echo $itemdata['iimg']; ?>" alt="Product">
                        </div>
                        <a href="#"></a>
                        <ul class="option-product animate-default">
                            <?php if ($userlogin) { ?>

                                <?php if ($cartlist) { ?>
                                    <li class="relative">
                                        <a href="javascript:void(0)">
                                            <i style="color: red" class="fa fa-list"></i>
                                        </a>
                                    </li>
                                <?php } else { ?>
                                    <li class="relative"><a class="addCart" data-id="<?php echo $itemdata['itmid']; ?>" href="javascript:void(0)"><i class="fa fa-list"></i></a></li>
                                <?php } ?>


                                <?php if ($wishlist) { ?>
                                    <li class="relative"><a href="javascript:void(0)">
                                            <i style="color: red" class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i>
                                        </a></li>
                                <?php } else { ?>
                                    <li class="relative"><a class="wishlistItem" data-id="<?php echo $itemdata['itmid']; ?>" href="javascript:void(0)"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>
                                <?php } ?>

                                <li class="relative"><a href="javascript:;"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                            <?php } else { ?>
                                <li class="relative"><a href="user-login.php"><i class="data-icon data-icon-ecommerce icon-ecommerce-bag"></i></a></li>

                                <li class="relative"><a href="user-login.php"><i class="data-icondata-icon-basic icon-basic-heart" aria-hidden="true"></i></a></li>

                                <li class="relative"><a href="javascript:;"><i class="data-icon data-icon-basic icon-basic-magnifier" aria-hidden="true"></i></a></li>
                            <?php } ?>

                        </ul>
                    </div>
                    <h3 class="title-product clearfix full-width title-hover-black"><a href="product.php?product=<?php echo $itemdata['itmid']; ?>"><?php echo $itemdata['iname']; ?></a></h3>
                    <p class="clearfix price-product">
                        ₹ <?php echo $itemdata['iprice']; ?></p>
                    <div style="float: right; padding-right: 10px;">
                        <?php if ($cartlist) { ?>
                            <i class="fa fa-list"></i>
                        <?php }
                        if ($wishlist) { ?>
                            <i class="fa fa-heart"></i>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
    </div>
    <?php if ($totalRowCount > $showLimit) { ?>
        <div class="show_more_main" id="show_more_main<?php echo $itmid; ?>">
            <span id="<?php echo $itmid; ?>" class="show_more" title="Load more posts">Show more</span>
            <span class="loding" style="display: none;"><span class="loding_txt">Loading...</span></span>
        </div>
    <?php } ?>
<?php
        }
    }
?>