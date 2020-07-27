<?php
include '../access/shopaccesscontrol.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'assets/csslink.php'; ?>

    </head>

    <body>
    <!-- Top Bar Start -->
        <?php include 'assets/topbar.php'; ?>
        <!-- Top Bar End -->
        <div class="page-wrapper-img">
            <div class="page-wrapper-img-inner">
                <?php include 'assets/usermedia.php'; ?>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            
                            <h4 class="page-title mb-2"><i class="mdi mdi-monitor-dashboard mr-2"></i>Dashboard</h4>  
                                                                  
                        </div><!--end page title box-->
                    </div><!--end col-->
                </div><!--end row-->
                <!-- end page title end breadcrumb -->
            </div><!--end page-wrapper-img-inner-->
        </div><!--end page-wrapper-img-->
        
        <div class="page-wrapper">
            <div class="page-wrapper-inner">

                <!-- Left Sidenav -->
                <?php include 'assets/leftnav.php'; ?>
                <!-- end left-sidenav-->

                <!-- Page Content-->
                <div class="page-content">
                    <div class="container-fluid"> 
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <i class="dripicons-user-group font-24 text-secondary"></i>
                                        </div> 
                                        <span class="badge badge-danger">Visits</span>
                                        <h3 class="font-weight-bold">24k</h3>
                                        <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span>Up From Yesterday</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <i class="dripicons-cart  font-20 text-secondary"></i>
                                        </div> 
                                        <span class="badge badge-info">New Orders</span>
                                        <h3 class="font-weight-bold">10k</h3>
                                        <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>1.5%</span> Up From Last Week</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <i class="dripicons-jewel font-20 text-secondary"></i>
                                        </div> 
                                        <span class="badge badge-warning">Return Order</span>
                                        <h3 class="font-weight-bold">8400</h3>
                                        <p class="mb-0 text-muted text-truncate"><span class="text-danger"><i class="mdi mdi-trending-down"></i>3%</span> Down From Last Month</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="float-right">
                                            <i class="dripicons-wallet font-20 text-secondary"></i>
                                        </div> 
                                        <span class="badge badge-success">Revenue</span>
                                        <h3 class="font-weight-bold">$85000</h3>
                                        <p class="mb-0 text-muted text-truncate"><span class="text-success"><i class="mdi mdi-trending-up"></i>10.5%</span> Up From Last Week</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">                                        
                                        <h4 class="mt-0 header-title">Revenue</h4>
                                        <div class="apexchart-wrapper chart-demo">
                                            <div id="e-dash1" class="chart-gutters"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-0">Total Orders Reports</h4>
                                    </div>
                                    <div class="card-body track-report">                                        
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="icon-info">
                                                    <i class="dripicons-cart bg-soft-success"></i>
                                                </div>
                                                <h3>1845</h3>
                                                <p class="mb-0 font-13 text-muted">Total Orders</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="icon-info">
                                                    <i class="dripicons-box bg-soft-warning"></i>
                                                </div>
                                                <h3>1545</h3>
                                                <p class="mb-0 font-13 text-muted">Shipping</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="icon-info">
                                                    <i class="dripicons-checkmark bg-soft-pink"></i>
                                                </div>
                                                <h3>300</h3>
                                                <p class="mb-0 font-13 text-muted">Delivered</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">                                        
                                        <ol class="c-progress-steps">
                                            <li class="c-progress-steps__step  done">Packing</li>
                                            <li class="c-progress-steps__step  done">Shipping</li>
                                            <li class="c-progress-steps__step  current">On the Way</li>
                                            <li class="c-progress-steps__step">Delivered</li>
                                        </ol>
                                    </div>
                                    <div class="card-body">
                                        <div class="accordion" id="accordionExample">
                                            <div class="card mb-0 shadow-none">
                                                <div class="" id="headingOne">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-soft-info btn-lg" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Tracking Report<i class="mdi mdi-gesture-double-tap font-20 ml-1"></i>
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="">
                                                        <div class="tracking-timeline">
                                                            <ul class="timeline mt-4">
                                                                <li>
                                                                    <p class="timeline-date">4 March 2019</p>
                                                                    <div class="timeline-content">
                                                                        <div class="track-info">
                                                                            <div class="text-muted float-right">
                                                                                <p class="mb-1">5:15PM</p>
                                                                                <span>T-No:1254326541253</span>
                                                                            </div>
                                                                            <h5 class="mt-0 mb-1">Delivered </h5>
                                                                            <p class="mb-0">San Francisco, California</p>
                                                                        </div>  
                                                                        <div class="track-info">
                                                                            <div class="text-muted float-right">
                                                                                <p class="mb-1">9:10AM</p>
                                                                                <span>T-No:3521486514458</span>
                                                                            </div>
                                                                            <h5 class="mt-0 mb-1">Delivered </h5>
                                                                            <p class="mb-0">Tel Aviv, Israel</p>
                                                                        </div>                                                        
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <p class="timeline-date">3 March 2019</p>
                                                                    <div class="timeline-content">
                                                                        <div class="track-info">
                                                                            <div class="text-muted float-right">
                                                                                <p class="mb-1">4:35PM</p>
                                                                                <span>T-No:6574148212355</span>
                                                                            </div>
                                                                            <h5 class="mt-0 mb-1">Delivered </h5>
                                                                            <p class="mb-0">Gujarat, India</p>
                                                                        </div>                                                         
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card carousel-bg-img">
                                    <div class="card-body dash-info-carousel">
                                        <h4 class="mt-0 header-title">Populer Product</h4>
                                        <div id="carousel_2" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="media">
                                                        <img src="../admin_plugins/images/products/img-2.png" height="200" class="mr-4" alt="...">
                                                        <div class="media-body align-self-center"> 
                                                            <span class="badge badge-primary mb-2">354 sold</span>                                                           
                                                            <h4 class="mt-0">Important Watch</h4>
                                                            <p class="text-muted mb-0">$99.00</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="media">
                                                        <img src="../admin_plugins/images/products/img-3.png" height="200" class="mr-4" alt="...">
                                                        <div class="media-body align-self-center"> 
                                                            <span class="badge badge-primary mb-2">654 sold</span>                                                           
                                                            <h4 class="mt-0">Wireless Headphone</h4>
                                                            <p class="text-muted mb-0">$39.00</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="media">
                                                        <img src="../admin_plugins/images/products/img-1.png" height="200" class="mr-4" alt="...">
                                                        <div class="media-body align-self-center"> 
                                                            <span class="badge badge-primary mb-2">551 sold</span>                                                           
                                                            <h4 class="mt-0">Leather Bag</h4>
                                                            <p class="text-muted mb-0">$49.00</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carousel_2" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel_2" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div><!--end card-body-->
                                </div><!--end card-->
                                

                                <div class="card overflow-hidden">
                                    <div class="card-body bg-gradient3">
                                        <div class="">
                                            <div class="card-icon">
                                                <i class="far fa-smile"></i>
                                            </div>
                                            <h2 class="font-weight-bold text-white">58</h2>
                                            <p class="text-white mb-0 font-16">Stores Very Good Review</p>                                            
                                        </div>
                                    </div><!--end card-body-->
                                    <div class="card-body dash-info-carousel">                                        
                                        <div id="carousel_review" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item">
                                                    <div class="media">
                                                        <img src="../admin_plugins/images/flags/us_flag.jpg" class="mr-2 thumb-xs rounded-circle" alt="...">
                                                        <div class="media-body align-self-center">                                                                                                                       
                                                            <h6 class="m-0">USA Store</h6>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <p class="review-data mb-0">4.8<span>/ 5.0</span></p>
                                                        <p class="px-4 py-1 bg-soft-success d-inline-block rounded">Very Good</p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                        </ul>
                                                        <p class="mb-1 text-muted">There are many variations of passages of Lorem Ipsum available, 
                                                            but the majority have suffered alteration in some form, by injected humour, or randomised.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="media">
                                                        <img src="../admin_plugins/images/flags/spain_flag.jpg" class="mr-2 thumb-xs rounded-circle" alt="...">
                                                        <div class="media-body align-self-center">                                                                                                                       
                                                            <h6 class="m-0">Spain Store</h6>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <p class="review-data mb-0">4.6<span>/ 5.0</span></p>
                                                        <p class="px-4 py-1 bg-soft-success d-inline-block rounded">Very Good</p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                        </ul>
                                                        <p class="mb-1 text-muted">There are many variations of passages of Lorem Ipsum available, 
                                                            but the majority have suffered alteration in some form, by injected humour, or randomised.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item active">
                                                    <div class="media">
                                                        <img src="../admin_plugins/images/flags/russia_flag.jpg" class="mr-2 thumb-xs rounded-circle" alt="...">
                                                        <div class="media-body align-self-center">                                                                                                                       
                                                            <h6 class="m-0">Russia Store</h6>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <p class="review-data mb-0">5.0<span>/ 5.0</span></p>
                                                        <p class="px-4 py-1 bg-soft-success d-inline-block rounded">Exellent</p>
                                                        <ul class="list-inline mb-1">
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                            <li class="list-inline-item mr-0"><i class="mdi mdi-star text-warning font-16"></i></li>
                                                        </ul>
                                                        <p class="mb-1 text-muted">There are many variations of passages of Lorem Ipsum available, 
                                                            but the majority have suffered alteration in some form, by injected humour, or randomised.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carousel_review" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel_review" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div><!--end card-body-->
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!-- container -->

                    <?php include 'assets/footer.php'; ?>
                </div>
                <!-- end page content -->
            </div>
            <!--end page-wrapper-inner -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <?php include 'assets/jslink.php'; ?>
    </body>
</html>