<?php
include_once "header.php";
?>
<!-- Start Bottom Header -->
<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb">
                    <div class="section-headline white-headline text-center">
                        <h3>About Us</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<!-- about-area start -->
<div class="about-page-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="about-image">
                    <img src="<?= $url ?>assets/img/about/ab.jpg" alt="">
                </div>
            </div>
            <!-- column end -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="about-content">
                    <h4>Welcome to <span class="color">KW Services</span></h4>
                    <p>Welcome to KW Services, a trusted provider of top-notch solutions for all your service needs.</p>
                    <p>At KW Services, we take pride in offering a comprehensive range of professional services to individuals, businesses, and organizations. With our commitment to excellence and customer satisfaction, we strive to deliver exceptional results that exceed expectations.</p>
                    <p>Our team of highly skilled and experienced professionals is dedicated to providing personalized and reliable services tailored to meet your specific requirements. We understand that each client is unique, and we take the time to listen and understand your needs, ensuring that our solutions are customized to address your concerns effectively.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- about-area end -->
<!-- Start-About-feature-area -->
<div class="about-feature area-padding">
    <div class="container">
        <div class="row">
            <div class="about-feature">
                <!-- Start column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <i class="icon icon-layers"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Our <span class="color">Mission</span></h4>
                            <p>Our mission at KW Services is to provide exceptional solutions, exceeding expectations with professionalism and dedication.</p>
                        </div>
                    </div>
                </div>
                <!-- Start column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <i class="icon icon-leaf"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Our <span class="color">Vision</span></h4>
                            <p>At KW Services, our vision is to be the leading provider of exceptional service solutions, setting new standards of excellence and innovation in the industry.</p>
                        </div>
                    </div>
                </div>
                <!-- Start column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-feature">
                        <div class="feature-icon">
                            <i class="icon icon-diamond"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Our <span class="color">Experience</span></h4>
                            <p>With over 20 years of industry experience, KW Services brings unparalleled expertise and knowledge to every project we undertake.</p>
                        </div>
                    </div>
                </div>
                <!-- End column -->
            </div>
        </div>
    </div>
</div>
<!-- End-About-feature-area -->
<!-- Start About Area -->
<div class="video-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h3>More About Cleaning Services</h3>
                    <p>The world's Latest at clean cleaning service company we can clean your residential space including homes.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="video-text">
                    <h4>Watch our video for details about cleaning services.</h4>
                    <p>
                        Redug Lares dolor sit amet, consectetur adipisicing elit. Animi vero excepturi magnam ducimus adipisci voluptas, praesentium maxime necessitatibus.ducimus adipisci voluptas, praesentium maxime necessitatibus.
                    </p>
                    <ul class="marker-list">
                        <li>Lares dolor sit amet.</li>
                        <li>Animi vero excepturi magnam.</li>
                        <li>ducimus adipisci voluptas.</li>
                        <li>consectetur adipisicing elit.</li>
                        <li>praesentium maxime necessitatibus.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="about-image">
                    <img src="<?= $url ?>assets/img/about/about.jpeg" alt="">
                </div>
            </div>
        </div>
        <!-- end Row -->
    </div>
</div>
<!-- End About Area -->
<!-- Start testimonials Area -->
<div class="testimonial-area area-padding">
    <div class="test-overly"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    <h3>Testimonial</h3>
                    <p>The world's Latest at clean cleaning service company we can clean your residential space including homes.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="Reviews-content">

                    <!-- start testimonial carousel -->
                    <div class="testimonial-carousel item-indicator">
                        <?php
                        $query = mysqli_query($con, "SELECT * FROM `testimonials`");
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <div class="single-testi text-center">
                                <div class="testi-img ">
                                    <img src="<?=$url?>uploads/testimonials/<?=$row["image"]?>" alt="">
                                </div>
                                <div class="testi-text">
                                    <p><?=base64_decode($row["description"])?></p>
                                    <h4><?=$row["name"]?></h4>
                                    <span class="guest-rev"><a href="#"><?=$row["designation"]?></a></span>
                                </div>
                            </div>
                            <!-- End single item -->
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End testimonials end -->
<?php
include_once "footer.php";
?>