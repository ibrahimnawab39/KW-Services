<?php
include_once "header.php";
?>
<!-- Start Slider Area -->
<div class="intro-area intro-area-4 ">
    <div class="main-overly"></div>
    <div class="intro-carousel">
        <?php
        $query = mysqli_query($con, "SELECT * FROM `slider`");
        while ($fetch = mysqli_fetch_array($query)) {
        ?>
            <div class="intro-content">
                <div class="slider-images">
                    <img src="<?= $url ?>uploads/slider/<?= $fetch["image"] ?>" alt="">
                </div>
                <div class="slider-content">
                    <div class="display-table">
                        <div class="display-table-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- layer 1 -->
                                        <div class="layer-1">
                                            <h1 class="title2"><?= $fetch["heading"] ?></h1>
                                        </div>
                                        <!-- layer 2 -->
                                        <div class="layer-2 ">
                                            <p><?= base64_decode($fetch["description"]) ?></p>
                                        </div>
                                        <!-- layer 3 -->
                                        <div class="layer-3">
                                            <a href="<?= $url ?>services" class="ready-btn left-btn">Our Services</a>
                                            <a href="<?= $url ?>contact-us" class="ready-btn right-btn">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  }
        ?>
    </div>
</div>
<!-- End Appointment Area -->
<!-- service area start -->
<div class="welcome-area welcome-area-4 area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h3>Our Services</h3>
                    <p>The world's Latest at clean cleaning service company we can clean your residential space including homes.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $query = mysqli_query($con, "SELECT * FROM `services` order by sorting asc LIMIT 0,6");
            while ($fetch = mysqli_fetch_array($query)) {
            ?>
                <!-- single-well end-->
                <div class="col-md-4 col-sm-6 col-xs-12 mb-3">
                    <div class="well-services text-center" onclick="window.open('<?= $url ?>service-detail/<?= $fetch['link'] ?>','_self')">
                            <div class="services-img">
                                <a href="<?= $url ?>service-detail/<?= $fetch["link"] ?>" class="image"> <img src="<?= $url ?>uploads/service/icon/<?= $fetch["icon"] ?>" alt=""></a>
                            </div>
                            <div class="main-services">
                                <div class="service-content">
                                    <h4><?= $fetch["title"] ?></h4>
                                    <p><?= base64_decode($fetch["banner_title"]) ?></p>
                                </div>
                            </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>
<!-- service-area end -->
<!-- about-area start -->
<div class="about-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="about-content">
                    <h4>Welcome to <span class="color">KW Services</span></h4>
                    <p>Welcome to KW Services, your trusted partner for all your service needs. We offer a wide range of professional services to meet your requirements and exceed your expectations.</p>
                    <div class="about-details text-center hidden-sm">
                        <div class="single-about">
                            <div class="icon-title">
                                <a href="#"><i class="icon icon-home"></i></a>
                                <h5>Home Cleaning</h5>
                            </div>
                            <p>Our expert cleaners will ensure that your home is spotless and fresh.</p>
                        </div>
                        <div class="single-about">
                            <div class="icon-title">
                                <a href="#"><i class="icon icon-drop"></i></a>
                                <h5>Painting Services</h5>
                            </div>
                            <p>Give your property a fresh look with our professional painting services.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="about-image">
                    <img src="<?= $url ?>assets/img/about/ab.jpg" alt="">
                </div>
            </div>
            <!-- column end -->
        </div>
    </div>
</div>
<!-- about-area end -->
<!-- Start Counter area -->
<div class="counter-area area-padding parallax-bg" data-stellar-background-ratio="0.6">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="about-count">
                    <div class="fun-content">
                        <div class="fun_text">
                            <a href="#"><i class="icon icon-diamond"></i></a>
                            <span class="counter">13000</span>
                            <h5>Complete Projects</h5>
                        </div>
                        <!-- fun_text  -->
                        <div class="fun_text">
                            <a href="#"><i class="icon icon-star"></i></a>
                            <span class="counter">4500</span>
                            <h5>Happy Clients</h5>
                        </div>
                        <!-- fun_text  -->
                        <div class="fun_text">
                            <a href="#"><i class="icon icon-layers"></i></a>
                            <span class="counter">104</span>
                            <h5>Present Projects</h5>
                        </div>
                        <!-- fun_text  -->
                        <div class="fun_text">
                            <a href="#"><i class="icon icon-users"></i></a>
                            <span class="counter">4300</span>
                            <h5>Total Employee</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Counter area -->
<!--Blog Area Start-->
<div class="blog-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h3>Latest News</h3>
                    <p>The world's Latest at clean cleaning service company we can clean your residential space including homes.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="blog-grid home-blog">
                <?php
                $query = mysqli_query($con, "SELECT * FROM `blog` order by id desc Limit 0,3");
                while ($fetch = mysqli_fetch_array($query)) {
                ?>
                    <!-- End single blog -->
                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-image">
                                <a class="image-scale" href="#">
                                    <img src="<?= $url ?>uploads/blog/<?= $fetch["image"] ?>" alt="">
                                </a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-title">
                                    <div class="blog-meta">
                                        <span class="date-type">
                                            <?= date_format(date_create($fetch["date"]), "d M, Y") ?>
                                        </span>
                                    </div>
                                    <a href="<?= $url ?>blog-detail/<?= $fetch["link"] ?>">
                                        <h4><?= $fetch["title"] ?></h4>
                                    </a>
                                </div>
                                <div class="blog-text">
                                    <p><?= base64_decode($fetch["description"]) ?></p>
                                    <a class="blog-btn" href="<?= $url ?>blog-detail/<?= $fetch["link"] ?>">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End single blog -->
                <?php } ?>
            </div>
        </div>
        <!-- End row -->
    </div>
</div>
<!--End of Blog Area-->
<!-- service area start -->
<div class="choose-area bg-color area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h3>Why choose us</h3>
                    <p>The world's Latest at clean cleaning service company we can clean your residential space including homes.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single-well end-->
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="well-services text-center">
                    <div class="services-img">
                        <a href="#"><i class="flaticon-cleaning-6"></i></a>
                    </div>
                    <div class="main-services">
                        <div class="service-content">
                            <h4>Expert Employee</h4>
                            <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-well end-->
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="well-services text-center">
                    <div class="services-img">
                        <a href="#"><i class="flaticon-cleaning-8"></i></a>
                    </div>
                    <div class="main-services">
                        <div class="service-content">
                            <h4>Secure Services</h4>
                            <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-well end-->
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="well-services text-center">
                    <div class="services-img">
                        <a href="#"><i class="flaticon-spray"></i></a>
                    </div>
                    <div class="main-services">
                        <div class="service-content">
                            <h4>Low Costing</h4>
                            <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-well end -->
            <div class="col-md-3 hidden-sm col-xs-12">
                <div class="well-services text-center">
                    <div class="services-img">
                        <a href="#"><i class="flaticon-sweeping-3"></i></a>
                    </div>
                    <div class="main-services">
                        <div class="service-content">
                            <h4>On time Finished</h4>
                            <p>Aspernatur sit adipisci quaerat unde at neque Redug Lagre dolor sit amet consectetu.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single-well end -->
        </div>
    </div>
</div>
<!-- service-area end -->
<!-- start pricing area -->
<div class="pricing-area fix area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h3>Our pricing</h3>
                    <p>The world's Latest at clean cleaning service company we can clean your residential space including homes.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="pricing-content">
                <?php
                $query = mysqli_query($con, "SELECT * FROM `packages` ORDER BY rand() ASC LIMIT 0,3");
                while ($row = mysqli_fetch_array($query)) {
                    $quesy1 = mysqli_query($con, "SELECT * FROM `services` Where id='" . $row["service_id"] . "'");
                    $fetch1 = mysqli_fetch_array($quesy1);
                ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="table-list">
                            <?php
                            if ($row["discount_persentage"] != "0" && $row["discount_price"] != "0") {
                            ?>
                                <span class="slugan"><?= $row["discount_persentage"] ?>% <br />off</span>
                            <?php } ?>
                            <div class="top-price-inner">
                                <h4><?= $row["title"] ?></h4>
                                <h6><?= $fetch1["title"] ?></h6>
                                <div class="rates">
                                    <?php
                                    if ($row["discount_persentage"] != "0" && $row["discount_price"] != "0") {
                                    ?>
                                        <span class="prices"><span class="dolar">AED</span><?= $row["discount_price"] ?></span><span class="users" style="text-decoration: line-through;"><?= $row["regular_price"] ?></span>
                                    <?php } else { ?>
                                        <span class="prices"><span class="dolar">AED</span><?= $row["regular_price"] ?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="description">
                                <?= base64_decode($row["description"]) ?>
                            </div>
                            <div class="price-btn">
                                <a href="<?= $url ?>service-checkout/<?= $fetch1["link"] ?>/<?= $row["link"] ?>">Book now</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- End pricing table area -->
<!-- Start Banner Area -->
<div class="banner-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="banner-content">
                    <h4>Are you looking for professional Cleaning Services for your House?</h4>
                    <div class="banner-contact">
                        <span class="call-us"><i class="icon icon-phone-handset"></i>Call us: <?= $settinginfo["website_phone"] ?> </span><span>Or</span>
                        <a class="banner-btn" href="<?= $url ?>contact-us">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area -->
<?php
include_once "footer.php";
?>