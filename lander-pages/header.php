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
                            /* width: 791px; */
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

                        .sbtn {
                            color: red;
                            outline: none;
                            border: none;
                            margin-top: 1px;
                            margin-left: 100px;
                            padding-left: 30px;
                            padding-right: 30px;
                            font-size: 20px;
                        }
                        .smbtn {
                            color: red;
                            outline: black;
                            margin-top: 1px;
                            margin-left: 100px;
                            padding-left: 10px;
                            padding-right: 30px;
                            font-size: 20px;
                        }

                        .overlay {
                            background: rgba(0, 0, 0, 0.8);
                            opacity: 0.8;
                            filter: alpha(opacity=80);
                            position: absolute;
                            top: 0px;
                            bottom: 0px;
                            left: 0px;
                            right: 0px;
                            z-index: 100;
                        }

                        /* Popup */
                        .popup {
                            background: white;
                            position: absolute;
                            top: 100;
                            border-radius: 5px;
                            box-shadow: black;
                            left: 0;
                            bottom: 0;
                            right: 0;
                            z-index: 101;
                            margin-top: 10px;
                            width: 300px;
                            /*Change your width here*/
                            height: 200px;
                            /*Change your height here*/
                            margin: auto;
                        }
                            @media(max-width:768px) {
                                .popup{
                                width: 90%;
                                box-shadow: 5px 10px #888888;
                                margin: auto 5%;
                            }
                        }

                            /* Popup Inner */
                            .popup-inner {
                                position: relative;
                                padding: 1em;
                            }
                                input .s3-btn-close {
                                    position: absolute;
                                    top: -0.5em;
                                    right: -0.5em;

                                    background: black;
                                    border: solid 2px white;
                                    color: white;
                                    cursor: pointer;

                                    border-radius: 15px;

                                    outline: none;
                                }
                            
                        input.s3-btn {
                            background: #f1f1f1;
                            border: none;
                            width: 200px;
                            height: 50px;
                            cursor: pointer;

                            position: absolute;
                            top: 0;
                            right: 0;
                            bottom: 0;
                            left: 0;
                            margin: auto;
                        }

                        .s3-center {
                            text-align: center;
                        }

                        @media screen and (max-width: 700px) {
                            .mobile {
                                display: none;
                            }

                            .typeahead,
                            .tt-query,
                            .tt-hint {
                                font-size: 20px;
                                height: 20px;
                                outline: black;
                                border: black;
                                outline: red;
                                margin-top: -10px;
                                border-bottom: red;
                                line-height: 28px;
                                padding: 0px 2px;
                                padding-left: 12px;
                                width: 250px;
                            }

                            .typeahead {
                                background-color: #FFFFFF;
                                border-bottom: red;
                            }

                            .marg {
                                margin-top: -8px;
                                margin-left: 10px;
                                color: red;
                            }

                            .tt-dropdown-menu {
                                background-color: #FFFFFF;
                                border: none;
                                margin-top: 0px;
                                padding: 0px 0;
                                width: 250px;
                            }

                            .tt-suggestion {
                                font-size: 20px;
                                line-height: 20px;
                                padding: 20px 20px;
                            }

                            .tt-suggestion.tt-is-under-cursor {
                                background-color: #0097CF;
                                color: #FFFFFF;
                            }

                            .tt-suggestion p {
                                margin: 0;
                            }

                        }

                        * {
                            margin: 0;
                            padding: 0;
                        }
                    </style>
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
                                <a class="animate-default" href="about.php">ABOUT</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
                        <div class="popup" id="popup" style="display:none;">
                            <div class="popup-inner">
                                <i class= "fa fa-close" onclick="popupClose();" value="&times;"></i>

                                <h3>Search Products</h3>
                                <hr style="margin-top:-10px; background-color:black; width:52%;" >
                                <br>
                                <form method="POST">
                                    <input type="text"name="typeahead" class="typeahead tt-query tb" autocomplete="off" spellcheck="false" placeholder="Enter keyword here . . ."/>
                                    <hr style="margin-top:-10px; background-color:red;" >
                                    <button type="submit" name="submit" class="smbtn"><i class="fa fa-search">  Search</i></button> 
                                </form>
                            </div>
                        </div>
    <!--   < script type="text/javascript">
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
    <script>
        // Popup Open
        function popupOpen() {
            document.getElementById("popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }
        // Popup Close
        function popupClose() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</header>