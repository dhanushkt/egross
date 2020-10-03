<?php

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

$getcartitem = mysqli_query($con, "SELECT * FROM custom_list WHERE custom_list.cl_uid='$globaluserid' ORDER BY sortnumber");

if ($listcount = mysqli_num_rows($getcartitem) >= 1)
    $cart = true;
else
    $cart = false;


$subtot = 0;

//hide custom list on open list
if (isset($_GET['list'])) {
    $openclist = false;
} else {
    $openclist = true;
}

?>

<?php if ($openclist) { ?>
    <div class="row relative">
        <?php if ($cart) { ?>
            <!-- Content Shoping Cart -->

            <div class="col-md-12 col-sm-12 col-xs-12 relative left-content-shoping clear-padding-left">
                <p class="title-shoping-cart">Custom Lists</p>


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

                            <button onclick="event.cancelBubble=true;if(event.stopPropagation) event.stopPropagation();return false;" data-id="<?php echo $getcartitem['clistno']; ?>" class="mycButton clistDelall" id="Delallbtn" type="submit">
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
                            <button onclick="event.cancelBubble=true;if(event.stopPropagation) event.stopPropagation();return false;" data-id="<?php echo $getcartitem['clistno']; ?>" class="mycButton clistDelall" id="Delallbtn" type="submit">
                                <i class="fa fa-trash" style="font-size: 15px"></i>
                            </button>
                        </div>
                        <!--End Mobile-->
                    </div>
                <?php } ?>

                <!--NEW LIST-->
                <form method="POST">
                    <div class="relative full-width product-in-cart border no-border-l no-border-r overfollow-hidden customHoverRow" id="addList" style="display: none;">

                        <div class="col-md-12 product-in-cart-col-4">
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

                        <!-- <div class="col-md-6" style="padding-top: 10px;">
                                            <p style="text-align: center;"> <i style="padding-right: 10px; font-size:20px;" class="fa fa-plus"></i>
                                                <a class="animate-default">
                                                    <label style="font-size: 25px;">Add List</label>
                                                </a>
                                            </p>
                                            <hr>
                                            <input required type="text" placeholder="Enter List Name" value="" name="clistMob" class="form-text" />
                                            <input type="submit" class="savebtnalist" name="btnsaveList" value="SAVE" />
                                            <input type="button" style="background:red;" class="savebtnalist cancelList" value="CANCEL" />

                                        </div> -->

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


    <script src="lander_plugins/js/toast.js"></script>
    <script>
        $(document).ready(function() {
            $('.clistDelall').click(function() {

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
                            location.href = 'list.php'
                        }, 1000);
                    }
                });
            });
        });
    </script>
    <script>
        // $(document).ready(function() {
        //     var table = $('#example').DataTable({
        //         lengthChange: false,
        //         buttons: ['pdf']
        //     });

        //     // table.buttons().container()
        //     //     .appendTo('#example_wrapper .col-md-6:eq(0)');
        //     $("#pdf").on("click", function() {
        //         table.button('.buttons-pdf').trigger();
        //     });
        // });
        //copy link  
        var $temp = $("<input>");
        var $url = $(location).attr('href');

        $('#AddnList').on('click', function() {
            $('#addList').show();
        });
        $('.cancelList').on('click', function() {
            $('#addList').hide();
        });
        // $('.clipboard').on('click', function() {
        //     $("body").append($temp);
        //     $temp.val($url).select();
        //     document.execCommand("copy");
        //     $temp.remove();
        //     $("label").text("URL copied!");
        // })
    </script>
<?php } ?>