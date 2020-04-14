<?php
include 'access/useraccesscontrol.php';

if (!$userlogin) {
    echo "<script>window.location.href='user-login.php'; </script>";
}

$getwishlistitem = mysqli_query($con, "SELECT * FROM user_wishlist JOIN itemmaster ON user_wishlist.witmid = itemmaster.itmid WHERE user_wishlist.wuid = '$globaluserid'");

if(mysqli_num_rows($getwishlistitem) >= 1)
    $wlitms = true;
else
    $wlitms = false;

if (isset($_POST['addcart'])) {
    $itmid = $_POST['itemid'];
    $rate =  $_POST['rate'];
    $wid = $_POST['wlid'];
    $addtocart = mysqli_query($con, "INSERT INTO user_cart (cuid,citmid,ctotal) VALUES ($globaluserid, $itmid, $rate)");
    if ($addtocart) {
        $delwlitem = mysqli_query($con, "DELETE FROM user_wishlist WHERE wid=$wid");
        if($delwlitem)
        {
            $smsg = "Item added to Cart";
            $getwishlistitem = mysqli_query($con, "SELECT * FROM user_wishlist JOIN itemmaster ON user_wishlist.witmid = itemmaster.itmid WHERE user_wishlist.wuid = '$globaluserid'");
            if(mysqli_num_rows($getwishlistitem) >= 1)
                $wlitms = true;
            else
                $wlitms = false;
        }
    }
}

if (isset($_POST['delwl'])) {
    $wid = $_POST['wlid'];
    $delwlitem = mysqli_query($con, "DELETE FROM user_wishlist WHERE wid=$wid");
    if($delwlitem)
    {
        $smsg = "Item removed from wishlist";
        $getwishlistitem = mysqli_query($con, "SELECT * FROM user_wishlist JOIN itemmaster ON user_wishlist.witmid = itemmaster.itmid WHERE user_wishlist.wuid = '$globaluserid'");
        if(mysqli_num_rows($getwishlistitem) >= 1)
            $wlitms = true;
        else
            $wlitms = false;
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'lander-pages/csslink.php'; ?>
</head>

<body onload="myFunction()">


<div id="loading"></div>    <!-- push menu-->
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
                                <li class="animate-default title-hover-red"><a href="wishlist.php">Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <!-- Content Wishlist -->
            <div class="relative container-web">
                <div class="container">
                    <div class="row relative">
                        <?php if (isset($fmsg)) { ?>
                            <!-- custom alert -->
                            <div class="alert" style="background-color: #eb1a21; color: white;">
                                <div class="alert-text">
                                    <?php echo $fmsg; ?>
                                </div>
                            </div>
                        <?php } else if (isset($smsg)) { ?>
                            <div class="alert" style="background-color: #3cb878">
                                <div class="alert-text">
                                    <?php echo $smsg; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($wlitms){ ?>
                        <div class="full-width relative table-wish-list">
                            <table class="full-width">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product name</th>
                                        <th>price</th>
                                        <th>stock status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($getwishlistitem as $key => $getwishlistitem) {
                                    ?>
                                        <tr>
                                            <td>
                                                <img src="uploads/item/<?php echo $getwishlistitem['iimg']; ?>" alt="" />
                                            </td>
                                            <td>
                                                <p><?php echo $getwishlistitem['iname']; ?></p>
                                            </td>
                                            <td>
                                                <p class="text-red">₹ <?php echo $getwishlistitem['iprice']; ?></p>
                                            </td>
                                            <td>
                                                <p class="text-red"><i class="fa fa-check-circle" aria-hidden="true"></i> In Stock</p>
                                            </td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" name="wlid" value="<?php echo $getwishlistitem['wid']; ?>">
                                                    <input type="hidden" name="rate" value="<?php echo $getwishlistitem['iprice']; ?>">
                                                    <input type="hidden" name="itemid" value="<?php echo $getwishlistitem['itmid']; ?>">
                                                    <button name="addcart" type="submit" class="btn btn-primary">ADD TO CART</button>
                                                    <button name="delwl" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } else { ?>
                            <div class="full-width relative col-md-12 mol-lg-12">
                                <div class="container text-center" style="padding: 110px; line-height: 5;">
                                    <i style="font-size: 100px;" class="fa fa-heart-o"></i>
                                    <h2>Your wishlist is empty</h2>
                                    <a href="index.php" style="background-color: #eb1a21; color: white;" class="btn">CONTINUE SHOPPING</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- End Content Wishlist -->
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
    <?php include 'lander-pages/jslinks.php'; ?>
</body>
<script>
        var preloader = document.getElementById("loading");
        function myFunction(){
            preloader.style.display = 'none';
        };
</script>
</html>