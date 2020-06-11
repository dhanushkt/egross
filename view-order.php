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
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <style>
        .card {
            z-index: 0;
            background-color: #ECEFF1;
            padding-bottom: 20px;
            margin-top: 90px;
            margin-bottom: 90px;
            border-radius: 10px
        }

        .top {
            padding-top: 40px;
            padding-left: 13% !important;
            padding-right: 13% !important
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: red;
            padding-left: 0px;
            margin-top: 30px
        }

        #progressbar li {
            list-style-type: none;
            font-size: 13px;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar .step0:before {
            font-family: FontAwesome;
            content: "\f10c";
            color: #fff
        }

        #progressbar li:before {
            width: 40px;
            height: 40px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            background: #C5CAE9;
            border-radius: 50%;
            margin: auto;
            padding: 0px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 12px;
            background: #C5CAE9;
            position: absolute;
            left: 0;
            top: 16px;
            z-index: -1
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            position: absolute;
            left: -50%
        }

        #progressbar li:nth-child(2):after,
        #progressbar li:nth-child(3):after {
            left: -50%
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            position: absolute;
            left: 50%
        }

        #progressbar li:last-child:after {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px
        }

        #progressbar li:first-child:after {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #651FFF
        }

        #progressbar li.active:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        .icon {
            width: 50px;
            height: 50px;
            margin-right: 25px
        }

        .icon-content {
            padding-bottom: 40px
        }

        @media screen and (max-width: 902px) {
            .icon-content {
                width: 28%;
                padding-left: 15px;
            }

            .none {
                font-size: 12px;
            }
        }
    </style>
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
                            <a href="view-product.php"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                                Continue shopping</a>
                        </div>
                    </div>
                </div>
                <div class="card">

                    <div class="d-flex flex-column text-sm-left" style="margin-left:20px; margin-top:20px;">
                        <?php
                        if ($orderinfo['ostatus'] >= 4) { ?>
                            <div>

                            </div>
                        <?php
                        } else { ?>
                            <h5 class="font-weight-bold">Track your order:<a href="#"><span class="text-primary font-weight-bold" style="margin-right:10px" ;>#<?php echo $orderinfo['orderno']; ?></span></h5></a>
                            <div class="d-flex flex-column text-sm-right" style="margin-right:10px;margin-right:10px;">
                                <p class="mb-0"><b>Address :</b><span><?php echo $orderinfo['addrline1'];
                                                                        echo "<br>";
                                                                        echo $orderinfo['addrline2'];
                                                                        echo "<br>";
                                                                        echo $orderinfo['acity'];
                                                                        echo ",";
                                                                        echo $orderinfo['apin'];
                                                                        "</b>" ?></span>
                                </p>
                                <p><span class="font-weight-bold">Date of Order:</span><?php echo $orderinfo['otimestamp']; ?></p>
                            </div>
                        <?php
                        } ?>
                    </div>

                    <div class="row justify-content-between px-3 top">


                    </div> <!-- Add class 'active' to progress -->
                    <div class="row d-flex justify-content-center">
                        <div class="col-12">
                            <?php
                            if ($orderinfo['ostatus'] >= 4) { ?>

                                <style>
                                    .center {
                                        margin: auto;
                                        width: 50%;
                                        padding: 10px;
                                        text-align: center;
                                    }
                                </style>
                                <div class="center">
                                    <i class="fa fa-close" style="font-size:50px;color:red"></i>
                                    <h3>YOUR ORDER IS CANCELLED</h3>
                                    <h5>Reason:<?php echo $orderinfo['oreason']; ?>
                                </div>
                            <?php } else { ?>
                                <ul id="progressbar" class="text-center">
                                    <?php
                                    if ($orderinfo['ostatus'] >= 0) { ?>
                                        <li class="active step0"></li>
                                    <?php } else { ?>
                                        <li class="step0"></li>
                                    <?php }
                                    ?>
                                    <?php
                                    if ($orderinfo['ostatus'] >= 1) { ?>
                                        <li class="active step0"></li>
                                    <?php } else { ?>
                                        <li class="step0"></li>
                                    <?php }
                                    ?>
                                    <?php
                                    if ($orderinfo['ostatus'] >= 2) { ?>
                                        <li class="active step0"></li>
                                    <?php } else { ?>
                                        <li class="step0"></li>
                                    <?php }
                                    ?>
                                    <?php
                                    if ($orderinfo['ostatus'] >= 3) { ?>
                                        <li class="active step0"></li>
                                    <?php } else { ?>
                                        <li class="step0"></li>
                                    <?php }
                                    ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row justify-content-between top">
                        <?php
                        if ($orderinfo['ostatus'] >= 4) { ?>
                            <div> </div>
                        <?php
                        } else { ?>
                            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/9nnc9Et.png">
                                <div class="d-flex flex-column">
                                    <p class="font-weight-bold none">Order<br>Placed </p>
                                </div>
                            </div>
                            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                                <div class="d-flex flex-column">
                                    <p class="font-weight-bold none">Order<br>Confirmed </p>
                                </div>
                            </div>
                            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                                <div class="d-flex flex-column">
                                    <p class="font-weight-bold none">Order<br>Shipping </p>
                                </div>
                            </div>
                            <div class="row d-flex icon-content"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                                <div class="d-flex flex-column">
                                    <p class="font-weight-bold none">Order<br>Delivered </p>
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
        <!-- </div> -->
        <!-- End Content Box -->
        <!-- Footer Box -->
        <?php include 'lander-pages/footer.php'; ?>
    </div>
    <!-- End Footer Box -->
    <?php include 'lander-pages/jslinks.php'; ?>
</body>

</html>