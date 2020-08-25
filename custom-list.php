<?php
include 'access/useraccesscontrol.php';
date_default_timezone_set('Asia/Kolkata');
$date = date("l, d-m-Y  h:i A");

/* Add List code here*/
if (isset($_POST['btnsaveList'])) {

    $cl_name = !empty($_POST['clist']) ? $_POST['clist'] : $_POST['clistMob'];

    $user_id = $globaluserid;

    $getlistno = mysqli_query($con, "SELECT clistno FROM custom_list");
    $getlistnofetch = mysqli_fetch_assoc($getlistno);
    do {
        $generatedlistno = random_int(10000, 99999);
    } while ($getlistnofetch['clistno'] == $generatedlistno);

    $createnewlist = mysqli_query($con, "INSERT INTO custom_list (clistno,cl_name,cl_uid,cl_timestamp) VALUES ('$generatedlistno','$cl_name','$user_id','$date')");

    if ($createnewlist) {
        $getcartitem = mysqli_query($con, "SELECT * FROM custom_list WHERE custom_list.cl_uid='$globaluserid' ORDER BY sortnumber");
    }
}

// separate add lislt for mobile since value is not accessible from same name
// if (isset($_POST['btnsaveMob'])) {
//     $cl_name = $_POST['clistMob'];

//     $user_id = $globaluserid;

//     $getlistno = mysqli_query($con, "SELECT clistno FROM custom_list");
//     $getlistnofetch = mysqli_fetch_assoc($getlistno);
//     do {
//         $generatedlistno = random_int(10000, 99999);
//     } while ($getlistnofetch['clistno'] == $generatedlistno);

//     $createnewlist = mysqli_query($con, "INSERT INTO custom_list (clistno,cl_name,cl_uid,cl_timestamp) VALUES ('$generatedlistno','$cl_name','$user_id','$date')");
// }

//when listno is not set
if (!$userlogin) {
    echo "<script>window.location.href='user-login.php'; </script>";
}

$getcartitem = mysqli_query($con, "SELECT * FROM custom_list WHERE custom_list.cl_uid='$globaluserid' ORDER BY sortnumber");

if ($listcount = mysqli_num_rows($getcartitem) >= 1)
    $cart = true;
else
    $cart = false;


$subtot = 0;



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <?php include 'lander-pages/csslink.php'; ?>
    <style>
        .box {
            width: 40%;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 35px;
            border: 2px solid #fff;
            border-radius: 20px/50px;
            background-clip: padding-box;
            text-align: center;
        }

        .button11 {
            font-size: 1em;
            padding: 10px;
            color: #fff;
            border: 2px solid #06D85F;

            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease-out;
        }

        .button11:hover {
            background: #06D85F;
        }

        .overlay {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            transition: opacity 500ms;
            visibility: hidden;
            opacity: 0;
        }

        .overlay:target {
            visibility: visible;
            opacity: 1;
        }

        .popup11 {
            margin: 70px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            width: 60%;
            position: relative;
        }

        .popup11 h2 {
            margin-top: 0;
            color: #333;
            font-family: Tahoma, Arial, sans-serif;
        }

        .popup11 .close {
            position: absolute;
            top: 5px;
            right: 30px;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }

        .popup11 .close:hover {
            color: #06D85F;
        }

        .popup11 .content {
            max-height: 30%;
            overflow: auto;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 100%;
            }

            .popup11 {
                width: 100%;
            }
        }

        .qty-input {
            /* border: 1px solid black; */
            height: 35px;
            padding-right: 10px;
            position: relative;
            width: 100px;
        }

        .qty-input p {
            display: inline-block;
            text-align: center;
            height: 30px;
            margin: 0px;
            position: relative;
        }

        .qty-input i {
            cursor: pointer;
            font-family: serif;
            height: 30px;
            float: left;
            line-height: 29px;
            text-align: center;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-transition: all 150ms ease-out;
            transition: all 150ms ease-out;
            width: 22px;
        }

        .qty-input i:active {
            background-color: #F1F1F1;
            -webkit-transition: none;
            transition: none;
        }

        .savebtnalist {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .qty-input input {
            /* border: 0px solid; */
            /* float: left; */
            float: right;
            font-size: 15px;
            height: 35px;
            /* height: 30px; */
            text-align: center;
            outline: none;
            width: 40px;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .mycButton {
            padding: 10px;
            background: white;
            box-shadow: 0px 0px 0px transparent;
            border: 0px solid transparent;
            text-shadow: 0px 0px 0px transparent;
        }

        .mycButton:hover {
            color: #eb1a21;
            box-shadow: 0px 0px 0px transparent;
            border: 0px solid transparent;
            text-shadow: 0px 0px 0px transparent;
        }

        .mycartButton {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            font-family: 'Roboto', sans-serif;
            box-sizing: border-box;
            padding: 0;
            background-color: transparent;
            outline: none;
            text-decoration: none;
            margin: 0 !important;
            -webkit-transition: 0.5s all ease;
            width: calc(100% / 2 - 20px);
            line-height: 30px;
            font-size: 15px;
            text-align: center;
            border: 1px solid #dedede;
            color: #333;
        }

        .mycartButton:hover {
            background-color: #333;
            color: #dedede !important;
        }

        .customHoverRow:hover .mycButton {
            background-color: #ebebeb;
        }

        .customHoverRow:hover {
            background-color: #ebebeb;
        }

        .saveBtn {
            padding-right: 10px;
        }

        .saveBtn:hover {
            background-color: #333;
            color: #dedede;
        }
    </style>
    <!-- for overlay -->
    <style>
        .overlay {
            opacity: 0.8;
            background-color: rgba(0.7, 0.7, 0.7, 0.7);
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            z-index: 1000;
            visibility: hidden;

        }

        .overlay:target {
            visibility: visible;
            opacity: 100;
        }

        .popup {
            margin: 70px auto;
            padding: 20px;
            margin-top: 230px;
            background: #fff;
            border-radius: 5px;
            width: 30%;
            position: relative;
        }

        .popup h2 {
            margin-top: 0;
            color: #000;
            font-family: Tahoma, Arial, sans-serif;
        }

        .form-text {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .popup .close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            color: #000;

        }

        .popup .close:hover {
            color: #000;
        }

        .popup .content {
            max-height: 0%;
        }

        @media screen and (max-width: 700px) {
            .box {
                width: 70%;
            }

            .mobile {
                display: none;
            }

            .popup {
                width: 70%;
            }
        }
    </style>
</head>

<body>
    <script src="lander_plugins/js/toast.js"></script>
    <script>
        $(document).ready(function() {
            $('.listDelall').click(function() {

                var options = {
                    style: {
                        main: {
                            background: "#EB1A21",
                            color: "white",
                            'box-shadow': '0 0 0px rgba(0, 0, 0, .9)',
                            'width': '200px'

                        }
                    }
                };
                var getid = $(this).attr('data-id');
                $.ajax({
                    url: 'clist_dellist.php',
                    type: 'POST',
                    data: {
                        id: getid
                    },
                    success: function() {
                        iqwerty.toast.Toast('List Deleted', options);
                        window.setTimeout(function() {
                            location.href = 'custom-list.php'
                        }, 1000);
                    }
                });
            });
        });
    </script>

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
                                <li class="animate-default title-hover-red"><a href="custom-list.php">My Lists</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
            <!-- Content Shoping Cart -->

            <div class="relative container-web">
                <div class="container">
                    <div class="row relative">
                        <?php if ($cart) { ?>
                            <!-- Content Shoping Cart -->

                            <div class="col-md-12 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
                                <p class="title-shoping-cart">My Lists</p>


                                <?php foreach ($getcartitem as $key => $getcartitem) { ?>

                                    <?php
                                    $listno = $getcartitem['clistno'];
                                    $subtot = 0;

                                    $getlistitems = mysqli_query($con, "SELECT * FROM custom_listitems JOIN itemmaster ON custom_listitems.cl_itemid=itemmaster.itmid WHERE custom_listitems.clistno='$listno'");
                                    $itemcount = mysqli_num_rows($getlistitems);

                                    while ($listitm = mysqli_fetch_assoc($getlistitems)) {
                                        $subtot = $subtot + ($listitm['iprice'] * $listitm['cl_qty']);
                                    }
                                    ?>
                                    <div class="relative full-width product-in-cart border no-border-l no-border-r overfollow-hidden customHoverRow" onclick="location.href='clist-items.php?list=<?php echo $listno; ?>'">


                                        <div class=" mobile col-md-6 product-in-cart-col-2">
                                            <p class="title-hover-black">
                                                <i style="padding-right: 10px; font-size:20px;" class="fa fa-list"></i>
                                                <a href="#" class="animate-default">
                                                    <?php echo $getcartitem['cl_name']; ?>
                                                </a>
                                            </p>
                                        </div>

                                        <div class="mobile col-md-3 product-in-cart-col-2">
                                            <p>Items in list: <?php echo $itemcount; ?> </p>
                                        </div>



                                        <div class="mobile col-md-3" style="text-align: right; line-height: 3;">

                                            <button onclick="event.cancelBubble=true;if(event.stopPropagation) event.stopPropagation();return false;" data-id="<?php echo $getcartitem['clistno']; ?>" class="mycButton listDelall" id="Delallbtn" type="submit">
                                                <i class="fa fa-trash" style="font-size: 20px"></i>
                                            </button>

                                            <p style="font-size: 23px !important;" class="text-red price-shoping-cart">₹
                                                <?php echo $subtot; ?>
                                            </p>
                                        </div>
                                        <!--Mobile-->
                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <p style="text-align: center;"> <i style="padding-right: 10px; font-size:20px;" class="fa fa-list"></i>
                                                <a href="#" class="animate-default">
                                                    <?php echo $getcartitem['cl_name']; ?>
                                                </a></p>
                                            <hr>
                                            <p style="text-align: center;">Items in list:
                                                <?php echo $itemcount; ?>
                                            </p>
                                            <p style="text-align: center;" class="text-red price-shoping-cart">₹ <?php echo $subtot; ?></p>
                                        </div>
                                        <div>
                                            <input type="hidden" value="" name="listno">
                                            <button onclick="event.cancelBubble=true;if(event.stopPropagation) event.stopPropagation();return false;" data-id="<?php echo $getcartitem['clistno']; ?>" class="mycButton listDelall" id="Delallbtn" type="submit">
                                                <i class="fa fa-trash" style="font-size: 15px"></i>
                                            </button>
                                        </div>
                                        <!--End Mobile-->
                                    </div>
                                <?php } ?>

                                <!--NEW LIST-->
                                <form method="POST">
                                    <div class="relative full-width product-in-cart border no-border-l no-border-r overfollow-hidden customHoverRow" id="addList" style="display: none;">

                                        <div class=" mobile col-md-12 product-in-cart-col-2">
                                            <p></p>
                                            <i style="padding-right: 10px; font-size:20px;" class="fa fa-plus"></i>
                                            <label style="font-size: 20px;">Add List</label>
                                            <hr>
                                            <input required type="text" value="" placeholder="Enter List Name" name="clist" class="form-text" />
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="submit" class="savebtnalist" name="btnsaveList" value="SAVE" />
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="button" style="background:red;" class="savebtnalist cancelList" value="CANCEL" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mobile col-md-3 product-in-cart-col-2">
                                            <p> </p>
                                        </div>
                                        <div class="mobile col-md-3" style="text-align: right; line-height: 3;">
                                            <input type="hidden" value="" name="listno">
                                            <button onclick="event.cancelBubble=true;if(event.stopPropagation) event.stopPropagation();return false;" class="mycButton" id="Delallbtn" type="submit"><i class="fa fa-trash" style="font-size: 20px"></i></button>
                                            <p style="font-size: 23px !important;" class="text-red price-shoping-cart">₹</p>
                                        </div>

                                        <!--Mobile-->

                                        <div class="col-md-6" style="padding-top: 10px;">
                                            <p style="text-align: center;"> <i style="padding-right: 10px; font-size:20px;" class="fa fa-plus"></i>
                                                <a class="animate-default">
                                                    <label style="font-size: 25px;">Add List</label>
                                                </a>
                                            </p>
                                            <hr>
                                            <input required type="text" placeholder="Enter List Name" value="" name="clistMob" class="form-text" />
                                            <input type="submit" class="savebtnalist" name="btnsaveList" value="SAVE" />
                                            <input type="button" style="background:red;" class="savebtnalist cancelList" value="CANCEL" />

                                        </div>

                                        <!--End Mobile-->
                                    </div>
                                </form>

                                <!--END NEW LIST-->

                                <aside style="text-align:left;" class="justify-content top-margin-default bottom-margin-default">
                                    <a style="padding-top:10px; padding-bottom:10px; border-color: black;" class="clear-margin mycartButton animate-default" id="AddnList">
                                        Create a New List
                                    </a>
                                    <a target="_blank" href="share-list.php?aclist=<?php echo "$globaluserid"; ?>" style="padding-top:10px; padding-bottom:10px; border-color: black;" class="clear-margin mycartButton animate-default">Export as PDF</a>

                                </aside>
                            </div>

                            <!-- End Content Shoping Cart -->

                        <?php } else { ?>
                            <div class="full-width relative col-md-12 mol-lg-12">
                                <div class="container text-center" style="padding: 110px; line-height: 5;">
                                    <i style="font-size: 100px;" class="fa fa-list-alt"></i>
                                    <h2>Your list is empty</h2>
                                    <a href="index.php" style="background-color: #eb1a21; color: white;" class="btn">CONTINUE SHOPPING</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!-- End Content Shoping Cart -->
        </div>
        <!-- End Content Box -->
        <!-- Footer Box -->
        <?php include 'lander-pages/footer.php'; ?>
    </div>
    <!-- End Footer Box -->
    <?php include 'lander-pages/jslinks.php'; ?>

</body>

<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            lengthChange: false,
            buttons: ['pdf']
        });

        // table.buttons().container()
        //     .appendTo('#example_wrapper .col-md-6:eq(0)');
        $("#pdf").on("click", function() {
            table.button('.buttons-pdf').trigger();
        });
    });
    //copy link  
    var $temp = $("<input>");
    var $url = $(location).attr('href');

    $('#AddnList').on('click', function() {
        $('#addList').show();
    });
    $('.cancelList').on('click', function() {
        $('#addList').hide();
    });
    $('.clipboard').on('click', function() {
        $("body").append($temp);
        $temp.val($url).select();
        document.execCommand("copy");
        $temp.remove();
        $("label").text("URL copied!");
    })
</script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer=""></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" defer=""></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js" defer=""></script>

</html>