<?php
$qry=mysqli_query($con,"SELECT * FROM mcat");
?>
<div class="pushmenu menu-home5">
    <div class="menu-push">
        <span class="close-left js-close"><i class="fa fa-times f-20"></i></span>
        <div class="clearfix"></div>
        <form role="search" method="get" id="searchform" class="searchform" action="/search">
           <!-- <div>
                <label class="screen-reader-text" for="q"></label>
                <input type="text" placeholder="Search for products" value="" name="q" id="q" autocomplete="off">
                <input type="hidden" name="type" value="product">
                <button type="submit" id="searchsubmit"><i class="ion-ios-search-strong"></i></button>
            </div>-->
        </form>
        <ul class="nav-home5 js-menubar">
        <li class="level1 active dropdown">
                <a href="index.php">Home</a>
            </li>
            <li class="level1 active dropdown">
                <a href="view-product.php">View Products</a>
            </li>
            <li class="level1 active dropdown"><a href="javascript:void(0)">Categories</a>
                <span class="icon-sub-menu"></span>
                <div class="menu-level1 js-open-menu">
                    <ul class="level1">
                    <?php
                    while($getmcat=mysqli_fetch_assoc($qry))
                    {
                        $getid=$getmcat['mcid'];
                            
                    ?>
                        <li class="level2">
                            <a href="view-category.php?id=<?php echo $getmcat['mcid']; ?>"><?php echo $getmcat['mcname'];?></a>
                            <ul class="menu-level-2">
                            <?php
                            $qry1=mysqli_query($con,"SELECT * FROM scat where smcid=$getid");
                            while($getscat=mysqli_fetch_assoc($qry1))
                            {
                                
                            ?>
                                <li class="level3"><a href="view-category.php?id=<?php echo $getmcat['mcid']; ?>" title=""><?php echo $getscat['scname'];?></a></li>
                            <?php
                            }
                            ?>
                                <!--<li class="level3"><a href="category_v1_2.html" title="">Category V1.2</a></li>
                                <li class="level3"><a href="category_v2.html" title="">Category V2</a></li>
                                <li class="level3"><a href="category_v2_2.html" title="">Category V2.2</a></li>
                                <li class="level3"><a href="category_v3.html" title="">Category V3</a></li>
                                <li class="level3"><a href="category_v3_2.html" title="">Category V3.2</a></li>
                                <li class="level3"><a href="category_v4.html" title="">Category V4</a></li>
                                <li class="level3"><a href="category_v4_2.html" title="">Category V4.2</a></li>-->
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                   <!--<li class="level2">
                            <a href="view-product.php">View Products</a>
                            <ul class="menu-level-2">
                                <li class="level3"><a href="product_v1.html" title="">Product Single 1</a></li>
                                <li class="level3"><a href="product_v2.html" title="">Product Single 2</a></li>
                                <li class="level3"><a href="product_v3.html" title="">Product Single 3</a></li>
                            </ul>-->
                        </li>
                        <!--<li class="level2">
                            <a href="#">Order Page</a>
                            <ul class="menu-level-2">
                                <li class="level3"><a href="cartpage.html" title="">Cart Page</a></li>
                                <li class="level3"><a href="checkout.html" title="">Checkout</a></li>
                                <li class="level3"><a href="compare.html" title="">Compare</a></li>
                                <li class="level3"><a href="quickview.html" title="">Quickview</a></li>
                                <li class="level3"><a href="trackyourorder.html">Track Order</a></li>
                                <li class="level3"><a href="wishlist.html">WishList</a></li>
                            </ul>
                        </li>-->
                    </ul>
                    <li class="level1 active dropdown">
                    <a href="view-address.php">View address</a>
                    </li>
                    <li class="level1 active dropdown">
                    <a href="list.php">View list</a>
                    </li>
                    <div class="clearfix"></div>
                </div>
            </li>
            <!--<li class="level1">
                <a href="#">Pages</a>
                <span class="icon-sub-menu"></span>
                <ul class="menu-level1 js-open-menu">
                    <li class="level2"><a href="about.html" title="About Us ">About Us </a></li>
                    <li class="level2"><a href="contact.html" title="Contact">Contact</a></li>
                    <li class="level2"><a href="404.html" title="404">404</a></li>
                </ul>
            </li>
            <li class="level1">
                <a href="#">Blog</a>
                <span class="icon-sub-menu"></span>
                <ul class="menu-level1 js-open-menu">
                    <li class="level2"><a href="blog.html" title="Blog Standar">Blog Category</a></li>
                    <li class="level2"><a href="blogdetail.html" title="Blog Gird">Blog Detail</a></li>
                </ul>
            </li>-->
        </ul>
    </div>
</div>