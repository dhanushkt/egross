<?php 
include 'access/useraccesscontrol.php';

$menuslide = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'lander-pages/csslink.php'; ?>

    <style>
    table {
        border-collapse: collapse;
        width: 100%;

    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-size: 14px;
    }

    tr:hover {
        background-color: #f5f5f5;
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
                                <li class="animate-default title-hover-red"><a href="#">Home</a></li>
                                <li class="animate-default title-hover-red"><a href="#">View Order</a></li>
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

                        <div class="col-md-12 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
                            <div>
                                <table>
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>100</td>
                                        <td>10</td>
                                        <td>1000</td>

                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div>
                            <a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                Continue shopping</a>
                            <a href="#" style="float:right"><i class="fa fa-comment-o" aria-hidden="true"></i>
                                Feedback</a>
                        </div>


                        <!-- Content Shoping Cart -->
                        <div class="col-sm-6" style=" height:250px; margin-bottom:5%; margin-top:5%">
                            <div style="border:1px solid black; height:100%; text-align: center; ">
                                <h4 style="margin-top: 15px; margin-left:15px; text-align:left">Address</h4>
                                <textarea style=" height:75%; width:75%"></textarea>
                            </div>
                        </div>


                        <div class="col-sm-6" style="height: 250px; margin-bottom:5%; margin-top:5% ">
                            <div style="border:1px solid black; height:100% ">
                                <h4 style="margin-top: 30px; margin-left:15px; text-align:left">Shipping Charges:</h4>

                                <h4 style="margin-top: 30px; margin-left:15px; text-align:left">GRAND TOTAL:</h4>
                                <div style="text-align: center;margin-top:15%">
                                    <button type="button" class="btn btn-danger" style="width: 65%">Track Order</button>
                                </div>

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