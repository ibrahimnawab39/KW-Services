<?php
include_once "include/connection.php";
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $settinginfo["webiste_name"] ?> | <?= $seoinfo["title"] ?? $pagename  ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= @base64_decode($seoinfo["description"]) ?? " " ?>">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url ?>uploads/settings/<?= $settinginfo["website_favicon"] ?>">
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="<?= $url ?>assets/css/bootstrap.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?= $url ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?= $url ?>assets/css/owl.transitions.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="<?= $url ?>assets/css/meanmenu.min.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="<?= $url ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $url ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= $url ?>assets/css/icon.css">
    <!-- magnific css -->
    <link rel="stylesheet" href="<?= $url ?>assets/css/magnific.min.css">
    <!-- venobox css -->
    <link rel="stylesheet" href="<?= $url ?>assets/css/venobox.css">
    <!-- style css -->
    <link rel="stylesheet" href="<?= $url ?>assets/css/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="<?= $url ?>assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="<?= $url ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <!-- <div id="preloader"></div> -->
    <header class="header-style-3">
        <!-- Start top bar -->
        <div class="topbar-area topbar-3 fix hidden-xs">
            <div class="container">
                <div class="row">
                    <div class=" col-md-8 col-sm-6">
                        <div class="topbar-left">
                            <ul>
                                <li><a href="mailto:<?= $settinginfo["website_email"] ?>"><i class="icon icon-envelope"></i><?= $settinginfo["website_email"] ?></a></li>
                                <li><a href="tel:<?= $settinginfo["website_phone"] ?>"><i class="icon icon-phone"></i><?= $settinginfo["website_phone"] ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="topbar-right">
                            <ul>
                                <?php
                                if ($socialinfo["fb_link"] != "") {
                                ?>
                                    <li><a href="<?= $socialinfo["fb_link"] ?>"><i class="fa fa-facebook"></i></a></li>
                                <?php }
                                if ($socialinfo["instagram_link"] != "") {
                                ?>
                                    <li><a href="<?= $socialinfo["instagram_link"] ?>"><i class="fa fa-instagram"></i></a></li>
                                <?php }
                                if ($socialinfo["twitter_link"] != "") {
                                ?>
                                    <li><a href="<?= $socialinfo["twitter_link"] ?>"><i class="fa fa-twitter"></i></a></li>
                                <?php }
                                if ($socialinfo["linkedin_link"] != "") {
                                ?>
                                    <li><a href="<?= $socialinfo["linkedin_link"] ?>"><i class="fa fa-linkedin"></i></a></li>
                                <?php }
                                if ($socialinfo["youtube_link"] != "") {
                                ?>
                                    <li><a href="<?= $socialinfo["youtube_link"] ?>"><i class="fa fa-youtube"></i></a></li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End top bar -->
        <!-- header-area start -->
        <div id="sticker" class="header-area header-area-3 hidden-xs">
            <div class="container">
                <div class="row">
                    <!-- logo start -->
                    <div class="col-md-3 col-sm-3">
                        <div class="logo">
                            <!-- Brand -->
                            <a class="navbar-brand page-scroll sticky-logo" href="<?= $url ?>">
                                <img src="<?= $url ?>uploads/settings/<?= $settinginfo["website_header_logo"] ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- logo end -->
                    <div class="col-md-9 col-sm-9">
                        <!-- mainmenu start -->
                        <nav class="navbar navbar-default">
                            <div class="collapse navbar-collapse" id="navbar-example">
                                <div class="main-menu">
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a class="pagess" href="<?= $url ?>">Home</a></li>
                                        <li><a class="pagess" href="<?= $url ?>about-us">About us</a></li>
                                        <li><a class="pagess" href="<?= $url ?>services">Services</a></li>
                                        <li><a class="pagess" href="<?= $url ?>blog">Blog</a></li>
                                        <li><a href="<?= $url ?>contact-us">Contact us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!-- mainmenu end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area end -->
        <!-- mobile-menu-area start -->
        <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <div class="logo">
                                <a href="/"><img src="<?= $url ?>uploads/settings/<?= $settinginfo["website_header_logo"] ?>" alt="" /></a>
                            </div>
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="<?= $url ?>">Home</a></li>
                                    <li><a href="<?= $url ?>about-us">About us</a></li>
                                    <li><a href="<?= $url ?>services">Services</a></li>
                                    <li><a href="<?= $url ?>blog">Blog</a></li>
                                    <li><a href="<?= $url ?>contact-us">Contact us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area end -->
    </header>
    <!-- header end -->