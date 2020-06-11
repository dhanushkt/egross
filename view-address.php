<?php
include 'access/useraccesscontrol.php';

if (!$userlogin) {
    echo "<script>window.location.href='user-login.php'; </script>";
}

$getalladdress = mysqli_query($con, "SELECT * FROM user_address WHERE auid=$globaluserid");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'lander-pages/csslink.php'; ?>
    <style>
        .mycButton {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 30px;
            padding-right: 30px;
            border-radius: 0%;
            background: #e3171b !important;
            text-transform: capitalize;
            outline: none;
            border: none;
            color: white;
        }

        .mycButton:hover {
            background: #333 !important;
            color: white;
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
            float: left;
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
            width: 320px;
            border-width: 1px;
            box-sizing: border-box;
            border-color: #C7C7C7;
            box-shadow: 0 2px 1px 0 rgba(0, 0, 0, .16);
            border-style: solid;
        }

        .addrbox {
            font-size: 13px;
            line-height: 19px;
            color: #111;
            font-family: "Amazon Ember", Arial, sans-serif;
            text-align: left !important;
            box-sizing: border-box;
            padding: 0 !important;
            border-radius: 4px;
            position: relative;
        }

        .addaddrbox {
            font-size: 20px;
            color: #908d88;
            font-family: "Amazon Ember", Arial, sans-serif;
            text-align: center !important;
            display: block;
            border-radius: 4px;
            border: 1px dashed #ddd;
            background-color: #fff;
            margin-right: 0 !important;
            height: 266px;
            width: 320px;
            border-width: 5px;
            box-sizing: border-box;
            border-color: #C7C7C7;
            /* box-shadow: 0 2px 1px 0 rgba(0, 0, 0, .16); */
            border-style: dashed;
        }

        .addsignmiddle {
            display: inline-block;
            padding-top: 25%;
        }

        .addaddrbox:hover {
            border-color: #535353;
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
                                <li class="animate-default title-hover-red"><a href="index.php">Home</a></li>
                                <li class="animate-default title-hover-red"><a href="address.php">Address</a></li>
                                <li class="animate-default title-hover-red"><a href="#">View Address</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <!-- Content Checkout -->
            <div class="relative container-web">
                <div class="container">
                    <div class="row relative">

                        <!-- Content Shoping Cart -->
                        <div class="col-md-12 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
                            <p class="title-shoping-cart">View Address</p>

                            <div class="col-md-4 col-lg-4 outerbox" onclick="window.location.href='address.php';">
                                <div class="addaddrbox">
                                    <div class="addsignmiddle">
                                        <i class="fa fa-plus" style="font-size: 60px; color: #dddd;"></i>
                                        <p>Add address</p>
                                    </div>
                                </div>
                            </div>
                            <?php
                            while ($getaddresss = mysqli_fetch_assoc($getalladdress)) {
                            ?>
                                <div class="col-md-4 outerbox">
                                    <div class="innerbox">
                                        <div style="margin-top: 20px; margin-bottom: 10px; margin-right: 25px;margin-left: 25px;">
                                            <h4><?php echo $getaddresss['afullname'] ?> </h4>

                                            <b>Email</b> : <?php echo $getaddresss['aemail'] ?>
                                            </br>
                                            <b>Number : </b><?php echo $getaddresss['arphone'] ?> |<span><b> Alt No:</b><?php echo $getaddresss['aaphone'] ?></span>
                                            </br>
                                            <div>
                                                <b>Address Line 1: </b><?php echo $getaddresss['addrline1'] ?>
                                                </br>
                                                <b>Address Line 2: </b><?php echo $getaddresss['addrline2'] ?>
                                                </br>
                                                <b>City : </b><?php echo $getaddresss['acity'] ?>
                                                </br>   
                                                <b>Pincode: </b><?php echo $getaddresss['apin'] ?>
                                                </br>
                                                <div style="margin-top: 10px; position: absolute; bottom: 0; margin-bottom: 20px;">
                                                    <a href="address.php?addrid=<?php echo $getaddresss['uaddrid']; ?>"><button class="mycButton">EDIT</button></a>
                                                    <a class="deleteAdd mycButton" style="padding-right: 8px; padding-left: 10px; padding-top: 12px; padding-bottom: 12px" data-id="<?php echo $getaddresss['uaddrid']; ?>" href="javascript:void(0)">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <?php if ($getaddresss['adefault'] == 0) { ?>
                                                        <a class="defaultAddr" style="padding-right: 10px; padding-left: 10px; padding-top: 12px; padding-bottom: 12px" data-id="<?php echo $getaddresss['uaddrid']; ?>" href="javascript:void(0)">
                                                            <b> Set as Default </b>
                                                        </a>
                                                    <?php } else { ?>
                                                        <p style="display: inline-block; padding-left: 10px;"> <b> Default address </b> </p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content Checkout -->
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
        </footer>
    </div>
    <!-- End Footer Box -->
    <?php include 'lander-pages/jslinks.php'; ?>
</body>
<script src="lander_plugins/js/toast.js"></script>
<script>
    $(document).ready(function() {
        var options = {
            style: {
                main: {
                    background: "#e3171b",
                    color: "white",
                    'box-shadow': '0 0 0px rgba(0, 0, 0, .9)',
                    'width': '200px'

                }
            }
        };
        $('.deleteAdd').click(function() {
            var getid = $(this).attr('data-id');
            $.ajax({
                url: 'delete-address.php',
                type: 'POST',
                data: {
                    id: getid,
                },
                success: function() {
                    iqwerty.toast.Toast('Adresss Deleted', options);
                    window.setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        var options = {
            style: {
                main: {
                    background: "#e3171b",
                    color: "white",
                    'box-shadow': '0 0 0px rgba(0, 0, 0, .9)',
                    'width': '200px'

                }
            }
        };
        $('.defaultAddr').click(function() {
            var getid = $(this).attr('data-id');
            $.ajax({
                url: 'default-address.php',
                type: 'POST',
                data: {
                    id: getid,
                },
                success: function() {
                    iqwerty.toast.Toast('Default address changed', options);
                    window.setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            });
        });
    });
</script>

</html>