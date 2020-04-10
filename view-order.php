<?php
include 'access/useraccesscontrol.php';
if (!$userlogin) {
    echo "<script>window.location.href='user-login.php'; </script>";
}
$menuslide = false;
if (isset($_GET['orderno']) && !empty($_GET['orderno'])) {
    $orderno = $_GET['orderno'];
    $orderquery = mysqli_query($con, "SELECT * FROM orders JOIN user_address ON orders.oaddrid=user_address.uaddrid JOIN order_items ON orders.orderno=order_items.orderno JOIN itemmaster ON order_items.oitmid=itemmaster.itmid WHERE orders.orderno=$orderno");
    $orderinfo = mysqli_fetch_assoc($orderquery);
    if ($orderinfo['ouid'] != $globaluserid) {
        echo "<script>window.location.href='account.php'; </script>";
    }
    $total = $orderinfo['iprice'] * $orderinfo['oqty'];
} else {
    echo "<script>window.location.href='account.php'; </script>";
}
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

        .outerbox {
            font-size: 13px;
            line-height: 19px;
            color: #111;
            font-family: "Amazon Ember", Arial, sans-serif;
            text-align: left !important;
            box-sizing: border-box;
            margin-bottom: 0 !important;
            margin-top: 6px !important;
            position: relative;
            /* float: left; */
            min-height: 1px;
            overflow: visible;
            margin-right: 13px;
            width: auto;
        }


        .innerbox {
            font-size: 13px;
            line-height: 19px;
            color: #111;
            font-family: "Amazon Ember", Arial, sans-serif;
            text-align: left !important;
            display: block;
            border-radius: 4px;
            border: 1px #ddd solid;
            background-color: #fff;
            margin-bottom: 0 !important;
            height: 266px;
            /* width: 500px; */
            border-width: 1px;
            box-sizing: border-box;
            border-color: #C7C7C7;
            box-shadow: 0 2px 1px 0 rgba(0, 0, 0, .16);
            border-style: solid;
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
                                        <td><?php echo $orderinfo['iname']; ?></td>
                                        <td><?php echo $orderinfo['iprice']; ?></td>
                                        <td><?php echo $orderinfo['oqty']; ?></td>
                                        <td><?php echo $total ?></td>

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
                    </div>
                    <!-- Content Shoping Cart -->
                    <div class="row relative" style="padding-bottom: 10px;">
                        <div class="col-md-6 outerbox">
                            <div class="innerbox customdwidth">
                                <div style="margin-top: 20px; margin-bottom: 10px; margin-right: 25px;margin-left: 25px;">
                                    <h4 style="margin-top: 5px; margin-left:10px; text-align:left">Address Details</h4>
                                    <hr>
                                    <b>Address Line 1: </b><?php echo $orderinfo['addrline1'];
                                                            echo "</br><b>Address Line 2:</b> ";
                                                            echo $orderinfo['addrline2'];
                                                            echo "</br><b>City: </b>";
                                                            echo $orderinfo['acity'];
                                                            echo "</br><b>District: </b>";
                                                            echo $orderinfo['adistrict'];
                                                            echo "</br><b>State: </b>";
                                                            echo $orderinfo['astate'];
                                                            echo "</br><b>Pin :</b>";
                                                            echo $orderinfo['apin'];
                                                            "</b>" ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 outerbox">
                            <div class="innerbox customdwidth">
                                <div style="margin-top: 20px; margin-bottom: 10px; margin-right: 25px;margin-left: 25px;">
                                    <h4 style="margin-top: 5px; margin-left:10px; text-align:left">Shipping Charges:</h4>
                                    <hr>
                                    <h4 style="margin-top: 5px; margin-left:10px; text-align:left">GRAND TOTAL:</h4>
                                    <h3 style="margin-top: 5px; margin-left:10px; text-align:left" class="bold">₹ <?php echo $total ?></h3>
                                    <div style="text-align: center;margin-top:15%">
                                        <button type="button" class="btn btn-danger" style="width: 65%">Track Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
            <!-- </div> -->
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
        <!-- </div> -->
        <!-- End Content Box -->
        <!-- Footer Box -->
        <?php include 'lander-pages/footer.php'; ?>
    </div>
    <!-- End Footer Box -->
    <?php include 'lander-pages/jslinks.php'; ?>
</body>

</html>