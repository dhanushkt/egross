<?php 
include 'access/useraccesscontrol.php';
$getalladdress = mysqli_query($con, "SELECT * FROM user_address WHERE auid=$globaluserid");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'lander-pages/csslink.php'; ?>
    <!--table,
    th,
    td,
    tr {
        border: 1px solid black;

    }

    th {
        padding: 35px;
        font-size: 20px;

    }

    td {
        padding: 20px;
        font-size: 15px;
    }

    .colmn {
        column-count: 3;
        column-gap: 40px;
    }-->
    <style>
    .but {
        background-color: red;
        border: none;
        color: white;
        padding: 6px 6px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 13px;
       
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
                            <div class="col-md-4 title-siderbar bold" style="border:2px black; height: 250px; padding:25px; word-wrap: break-word;">
                                <br/> 
                                <a href="address.php" title="ADD NEW ADDRESS
                                "><img src="lander_plugins/plus-solid.svg" height=90% width=100%></i></img></a>
                            </div>
                            <?php
                            while($getaddresss = mysqli_fetch_assoc($getalladdress)){
                            ?>
                            <div class="col-md-4"
                                style="border:1px solid black; height: 280px; padding:25px; word-wrap: break-word;">
                            <h4><?php echo $getaddresss['afullname']?></h4>
                            <b>Email</b>  : <?php echo $getaddresss['aemail']?>
                            </br>
                            <b>Number : </b><?php echo $getaddresss['arphone']?> |<span><b> Alt No:</b><?php echo $getaddresss['aaphone']?></span>
                            </br>
                                <p>
                            <b>Address Line 1: </b><?php echo $getaddresss['addrline1']?>
                            </br>
                            <b>Address Line 2: </b><?php echo $getaddresss['addrline2']?>
                            </br>
                            <b>City : </b><?php echo $getaddresss['acity']?>
                            </br>
                            <b>District : </b><?php echo $getaddresss['adistrict']?>
                            </br>
                            <b>State : </b><?php echo $getaddresss['astate']?>,
                            </br>    
                            <b>Pincode: </b><?php echo $getaddresss['apin']?>
                            </br>
                                <a href="address.php?addrid=<?php echo $getaddresss['uaddrid']; ?>" ><button class="but">EDIT</button></a>
                                <a class="del" data-id="<?php echo $getaddresss['uaddrid']; ?>" href="javascript:void(0)"><button class="but" id="del" type="submit">REMOVE</button></a>
                            </div>
                            <?php } ?>
                            <!--<div class="col-md-4"
                                style="border:1px solid black; height: 250px; padding:15px; word-wrap: break-word;">
                                Address2
                                <button class="but">Edit</button>
                                <button class="but">Delete</button>

                            </div>

                            <div class="col-md-4"
                                style="border:1px solid black; height: 250px; padding:15px; word-wrap: break-word;">
                                Address3
                                <button class="but">Edit</button>
                                <button class="but">Delete</button>
                            </div>
-->
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
            $('.del').click(function() {
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
</html>