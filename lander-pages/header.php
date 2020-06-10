<?php
if(isset($_POST['submit']))
{
    $prod=$_POST['typeahead'];
    $query=mysqli_query($con,"SELECT * FROM itemmaster WHERE iname='$prod'");
    $getprod=mysqli_fetch_assoc($query);
    $count=mysqli_num_rows($query);
    if($count<0){
        echo "<script>alert('Not Found!'); location.href='index.php';</script>";    
    }
    $productid=$getprod['itmid'];
    echo "<script>window.location.href='product.php?product=$productid'; </script>";
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
                            <?php if ($userlogin) { ?>
                                <li class="relative"><a href="account.php">My Account</a></li>
                            <?php } else { ?>
                                <li class="relative"><a href="user-login.php">Login</a></li>
                            <?php } ?>
                            <?php if ($userlogin) { ?>
                                <li class="relative"><a href="wishlist.php">Wishlist</a></li>
                            <?php } ?>
                            <li id="language" class="relative">
                                <a href="#">Language</a>
                                <ul>
                                    <li>
                                        <a href="#googtrans(kn)" class="lang-kn lang-select" data-lang="kn">ಕನ್ನಡ</a>
                                        <a href="#googtrans(en)" class="lang-en lang-select" data-lang="en">English</a>

                                    </li>
                            </li>
                        </ul>
                        </li>
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
                    <style>
                        .search {
                            border: 2px solid #eb1a21;
                            width: 791px;
                            margin: 0 0 0 60px;
                        }

                        .tb {
                            outline: none;
                            border: none;
                            padding: 8px 15px;
                            width: 250%;
                        }

                        .typeahead,
                        .tt-query,
                        .tt-hint {
                            font-size: 20px;
                            height: 20px;
                            outline: none;
                            border: none;
                            line-height: 30px;
                            padding: 1px 2px;
                            padding-left: 12px;
                            width: 600px;
                        }

                        .typeahead {
                            background-color: #FFFFFF;
                        }

                        .tt-query {
                        }

                        .tt-hint {
                            color: #999999;
                        }

                        .tt-dropdown-menu {
                            background-color: #FFFFFF;
                            border: none;
                            margin-top: 2px;
                            padding: 8px 0;
                            width: 678px;
                        }

                        .tt-suggestion {
                            font-size: 20px;
                            line-height: 20px;
                            padding: 3px 20px;
                        }

                        .tt-suggestion.tt-is-under-cursor {
                            background-color: #0097CF;
                            color: #FFFFFF;
                        }

                        .tt-suggestion p {
                            margin: 0;
                        }
                        .sbtn{
                            color: red;
                            outline: none;
                            border: none;
                            margin-top: 4px;
                            padding-left: 20px;
                            padding-right: 20px;
                            font-size: 20px;
                        }

                    </style>
                    <div class="clearfix search relative float-left">
                        <form method="POST" class="">
                            <div class="clearfix category-box relative">
                                <select name="mcat">
                                    <option selected value="all">All Category</option>
                                    <?php
                                    $header_getmcat = mysqli_query($con, "SELECT * FROM mcat");
                                    while ($header_mcat = mysqli_fetch_assoc($header_getmcat)) {
                                    ?>
                                        <option><?php echo $header_mcat['mcname']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <input type="text" name="typeahead" class="typeahead tt-query tb" autocomplete="off" spellcheck="false" placeholder="Enter keyword here . . ." />
                            <button type="submit" name="submit" class="sbtn"><i class="fa fa-search"></i></button></a>
                        </form>
                    </div>
                    <div class="clearfix icon-search-mobile absolute">
                        <i onclick="showBoxSearchMobile()" class="data-icon data-icon-basic icon-basic-magnifier"></i>
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
                                <a class="animate-default" href="about.php">ABOUT</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'kn',autoDisplay: false}, 'google_translate_element');
        }

        function triggerHtmlEvent(element, eventName) {
        var event;
        if (document.createEvent) {
        event = document.createEvent('HTMLEvents');
        event.initEvent(eventName, true, true);
        element.dispatchEvent(event);
        } else {
        event = document.createEventObject();
        event.eventType = eventName;
        element.fireEvent('on' + event.eventType, event);
        }
        }

        jQuery('.lang-select').click(function() {
        var theLang = jQuery(this).attr('data-lang');
        jQuery('.goog-te-combo').val(theLang);

        window.location = jQuery(this).attr('href');
        location.reload();
        });
        </script>
        <style>
        .goog-te-banner-frame {
            display: none !important;
        }

        body {
            top: 0px !important;
        }
        </style>
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->
</header>