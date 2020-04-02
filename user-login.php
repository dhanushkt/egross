<!DOCTYPE html>
<html lang="en">

<head>

    <?php include 'lander-pages/csslink.php'; ?>
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
                                <li class="animate-default title-hover-red"><a href="#">Login</a></li>
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
                        <div class="cmargin-login full-width relative top-checkout-box overfollow-hidden top-margin-default">
                            <div class="col-md-6 col-sm-12 col-xs-12 clear-padding-left left-top-checkout">
                                <div class="full-width box-btn-top-click">
                                    <p>Don't have an account? <a href="user-registration.php" class="animate-default title-hover-red">Click here to register</a></p>
                                    <p class="intro-top-click top-margin-default bottom-margin-default">If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping div.</p>
                                    <div class="relative">
                                        <form method="POST" action="/" class="form-placeholde-animate">
                                            <div class="field-wrap">
                                                <label>
                                                    Username or Email<span class="req">*</span>
                                                </label>
                                                <input type="text" name="name" required autocomplete="off" />
                                            </div>
                                            <div class="field-wrap">
                                                <label>
                                                    Password<span class="req">*</span>
                                                </label>
                                                <input type="text" name="name" required autocomplete="off" />
                                            </div>
                                            <div class="relative justify-content form-login-checkout">
                                                <button type="submit" class="animate-default button-hover-red">LOGIN</button>
                                                <ul class="check-box-custom list-radius clear-margin clear-margin">
                                                    <li>
                                                        <label class="clear-margin">Remember me
                                                            <input type="checkbox">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </li>
                                                </ul>
                                                <a href="#" class="animate-default title-hover-red">Lost your password?</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Shoping Cart -->

                        <!-- End Content Shoping Cart -->
                        <!-- Content Right -->
                        <!-- End Content Right -->
                    </div>
                </div>
            </div>
            <!-- End Content Checkout -->
            <!-- Support -->
            <div class="support-box full-width bg-red support_box_v2" style="margin-top: 20px;">
                <div class="container-web">
                    <div class=" container">
                        <div class="row">
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="lander_plugins/img/icon_free_ship_white-min.png" alt="Icon Free Ship" class="absolute" />
                                <p>free shipping</p>
                                <p>on order over $500</p>
                            </div>
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="lander_plugins/img/icon_support_white-min.png" alt="Icon Supports" class="absolute">
                                <p>support</p>
                                <p>life time support 24/7</p>
                            </div>
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="lander_plugins/img/icon_patner_white-min.png" alt="Icon partner" class="absolute">
                                <p>help partner</p>
                                <p>help all aspects</p>
                            </div>
                            <div class=" support-box-info relative col-md-3 col-sm-3 col-xs-6">
                                <img src="lander_plugins/img/icon_phone_table_white-min.png" alt="Icon Phone Tablet" class="absolute">
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