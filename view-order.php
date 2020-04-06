<?php 
include 'access/useraccesscontrol.php';

$menuslide = false;

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
        <div class="relative full-width">
            <!-- Breadcrumb -->
            <div class="container-web relative">
                <div class="container">
                    <div class="row">
                        <div class="breadcrumb-web">
                            <ul class="clear-margin">
                                <li class="animate-default title-hover-red"><a href="#">Home</a></li>
                                <li class="animate-default title-hover-red"><a href="#">Wishlist</a></li>
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

                        <div class="full-width relative table-wish-list">
                            <table class="full-width">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product name</th>
                                        <th>price</th>
                                        <th>stock status</th>
                                        <th>add to cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="img/image_big_product-min.png" alt="" />
                                        </td>
                                        <td>
                                            <p>MH02-Black09</p>
                                        </td>
                                        <td>
                                            <p class="text-red">$350.00</p>
                                        </td>
                                        <td>
                                            <p class="text-red"><i class="fa fa-check-circle" aria-hidden="true"></i> In
                                                Stock</p>
                                        </td>
                                        <td>
                                            <a href="#" class="animate-default">shop now</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <!-- Content Shoping Cart -->
                        <div class="col-md-6 col-lg-6 relative left-content-shoping clear-padding-left">
                            <div class="row">
                                <div class="col-md-6" style="height: 250px; padding:15px; word-wrap: break-word;">
                                    <p><label>Adress </label></p>
                                    <textarea required="" name="message" rows="6"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" style="height: 250px; padding:15px; word-wrap: break-word;">
                                <p><label></label></p>
                                <textarea required="" name="message" rows="6"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 relative justify-content form-login-checkout">
                                <button type="submit" class="animate-default button-hover-red" style="margin-bottom:10%"
                                    name="register">TRACK ORDER</button>
                            </div>
                        </div>

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
    <!-- End Footer Box -->
    <?php include 'lander-pages/jslinks.php'; ?>
</body>

</html>