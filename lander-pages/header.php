<?php
if (isset($_POST['submit'])) {
    $prod = $_POST['typeahead'];
    $query = mysqli_query($con, "SELECT * FROM itemmaster WHERE iname LIKE '%{$prod}%'");
    $getprod = mysqli_fetch_assoc($query);
    $count = mysqli_num_rows($query);
    if ($count != 0) {
        echo "<script>window.location.href='search-product.php?product=$prod'; </script>";
    } else {
        echo "<script>window.location.href='search-product.php?product=item_not_found'; </script>";
    }
}
?>
<script>
    $(document).ready(function() {
        $("#carticon").click(function() {
            $("#cartitems").load("load-list.php");
        });
    });
    $(document).ready(function loadcartnumber() {
        $("#cartitemnumber").load("load-listnumber.php");
    });
</script>

<header class="relative full-width box-shadow" id="myHeader">
<div id="google_translate_element" style="display: none">
</div>

    <div class="clearfix container-web relative">
        <div class=" container">
            <div class="row">
                <div class=" header-top">
                    <p class="contact_us_header col-md-4 col-xs-12 col-sm-3 clear-margin hidden-mobile">
                        <!-- <img src="lander_plugins/img/icon_phone_top.png" alt="Icon Phone Top Header" />  -->
                        <?php if ($userlogin) { ?> Welcome, <?php echo $globaluname; ?> <?php } ?>
                    </p>
                    <div class="clear-padding menu-header-top text-right col-md-8 col-xs-12 col-sm-6">
                        <ul class="clear-margin">
                            <li id="language" class="relative">
                                <a href="#">Language </a>
                                <ul>
                                    <li>
                                        <a href="javascript:;" id="Kannada" onclick="translateLanguage(this.id);">ಕನ್ನಡ</a>
                                        <a href="javascript:;" id="English" onclick="translateLanguage(this.id);">English</a>
                                    </li>
                                    </ul>
                            </li>
                            <?php if ($userlogin) { ?>
                                <li class="relative"><a href="account.php">My Account</a></li>
                            <?php } else { ?>
                                <li class="relative"><a href="user-login.php">Login</a></li>
                            <?php } ?>
                            <?php if ($userlogin) { ?>
                                <li class="relative"><a href="list.php">My List</a></li>
                            <?php } ?>
                            <?php if ($userlogin) { ?>
                                <li class="relative"><a href="access/logoutuser.php">Logout <i class="fa fa-sign-out"></i></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="clearfix header-content full-width relative">
                    <div class="clearfix icon-menu-bar">
                        <i class="data-icon data-icon-arrows icon-arrows-hamburger-2 icon-pushmenu js-push-menu" aria-hidden="true"></i>
                    </div>
                    <div class="clearfix logo">
                        <a href="index.php"><img alt="Logo" src="lander_plugins/img/logo.png" /></a>
                    </div>
                    <!--<div class="clearfix relative float-left">-->
                    <form method="POST" class="">
                        <div class="clearfix mobile search relative float-left">
                            <!--Desktop View -->
                            <input type="text" required name="typeahead" class="typeahead tt-query tb" autocomplete="off" spellcheck="false" placeholder="Enter keyword here . . ." />
                            <button type="submit" name="submit" class="sbtn"><i class="fa fa-search"></i></button>
                        </div>
                    </form>

                    <div class="clearfix icon-search-mobile absolute marg">
                        <a onclick="popupOpen();"><i style="color:red;" class="fa fa-search"></i></a>
                    </div>

                    <?php if ($userlogin) { ?>
                        <div id="carticon" class="clearfix cart-website absolute" onclick="showCartBoxDetail()">
                            <!-- <img alt="Icon Cart" src="lander_plugins/img/icon_cart.png" /> -->
                            <i style="font-size: 40px" class="fa fa-list-alt"></i>
                            <div id="cartitemnumber"></div>
                        </div>
                    <?php } else { ?>
                        <div class="clearfix cart-website absolute" onclick="location.href='user-login.php'">
                            <!-- <img alt="Icon Cart" src="lander_plugins/img/icon_cart.png" /> -->
                            <i style="font-size: 40px" class="fa fa-list-alt"></i>
                        </div>
                    <?php } ?>
                    <div class="cart-detail-header border">
                        <div id="cartitems">
                        </div>
                    </div>
                    <div class="mask-search absolute clearfix" onclick="hiddenBoxSearchMobile()"></div>
                    <div class="clearfix box-search-mobile">
                    </div>
                </div>
            </div>
            <div class="row">
                <a class="menu-vertical hidden-md hidden-lg" onclick="showMenuMobie()">
                    <span class="animate-default"><i class="fa fa-list" aria-hidden="true"></i> all categories</span>
                </a>
            </div>
        </div>
    </div>
    <div class="header-ontop" style="box-shadow: none;">
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-3">
                    <div class="clearfix logo">
                        <a href="#"><img alt="Logo" src="lander_plugins/img/logo.png" /></a>
                    </div>
                </div> -->
                <div class="col-md-9">
                    <div class="menu-header">
                        <ul class="main__menu clear-margin">
                            <li class="title-hover-red">
                                <a class="animate-default" href="index.php">HOME</a>
                            </li>
                            <li class="title-hover-red">
                                <a class="animate-default" href="javascript:void(0)">SHOP</a>
                                <div class="sub-menu mega-menu-v2" style="min-width: 800px !important">
                                    <?php
                                    $header_getmcat2 = mysqli_query($con, "SELECT * FROM mcat");
                                    while ($header_mcat2 = mysqli_fetch_assoc($header_getmcat2)) {
                                        $header_mcatid = $header_mcat2['mcid'];
                                    ?>
                                        <ul>
                                            <li><?php echo $header_mcat2['mcname'] ?></li>
                                            <?php
                                            $header_getscat = mysqli_query($con, "SELECT * FROM scat WHERE smcid='$header_mcatid' LIMIT 5");
                                            while ($header_scat = mysqli_fetch_assoc($header_getscat)) {
                                            ?>
                                                <li class="title-hover-red"><a class="animate-default clear-padding" href="view-product.php?scat=<?php echo $header_scat['scid']; ?>"><?php echo $header_scat['scname']; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="title-hover-red">
                                <a class="animate-default" href="team/meet.php">ABOUT</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="popups" id="popups" style="display:none;">
        <div class="popup-inner">
            <i style="float: right; margin-top: 15px; font-size: 25px;" class="fa fa-close" onclick="popupClose();" value="&times;"></i>

            <h3 class="text-uppercase mb-3" style="font-size: 17px;">Search Products</h3>
            <!-- <hr style="margin-top:-10px; background-color:black; width:52%;"> -->
            <br>
            <form method="POST">
                <input required type="text" name="typeahead" class="typeahead tt-query tb cinput" autocomplete="off" spellcheck="false" placeholder="Enter keyword here " />
                <br>
                <!-- <hr style="margin-top:-10px; background-color:red;"> -->
                <button class="cbutton smbtn" name="submit" type="submit">Search</button>
            </form>
        </div>
    </div>
<script>
        // Popup Open
        function popupOpen() {
            document.getElementById("popups").style.display = "block";
            document.getElementById("overlays").style.display = "block";
        }
        // Popup Close
        function popupClose() {
            document.getElementById("popups").style.display = "none";
            document.getElementById("overlays").style.display = "none";
        }
</script>
</header>
