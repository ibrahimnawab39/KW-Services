<?php
$pagename = "Blog Detail";
include_once "header.php";
if (isset($_GET["link"])) {
    $link = $_GET["link"];
    $query = mysqli_query($con, "SELECT * FROM `blog` where link ='$link'");
    $fetch = mysqli_fetch_array($query);
}
?>
<!-- Start Bottom Header -->
<div class="page-area" style="background: url('<?= $url ?>uploads/blog/<?= $fetch["image"] ?>');background-repeat: no-repeat;background-size: cover;background-position: center center;">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb">
                    <div class="section-headline white-headline text-center">
                        <h3><?=$fetch["title"]?></h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li class="home-bread">Blogs</li>
                        <li><?=$fetch["title"]?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<!--Blog Area Start-->
<div class="blog-page area-padding">
    <div class="container">
        <div class="row">
            <div class=" blog-page-details">
                <!-- Start single blog -->
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <!-- single-blog start -->
                    <article class="blog-post-wrapper">
                        <div class="blog-banner">
                            <a href="#" class="blog-images">
                                <img src="<?= $url ?>uploads/blog/<?= $fetch["image"] ?>" alt="">
                            </a>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <span class="date-type">
                                        <?= date_format(date_create($fetch["date"]), "d M, Y") ?>
                                    </span>
                                </div>
                                <a href="#">
                                    <h4><?= $fetch["title"] ?></h4>
                                </a>
                                <div class="description">
                                    <?= base64_decode($fetch["description"]) ?>
                                </div>
                            </div>

                        </div>
                    </article>
                </div>
                <!-- End main column -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="left-head-blog">
                        <div class="left-blog-page">
                            <!-- recent start -->
                            <div class="left-blog">
                                <h4>recent post</h4>
                                <div class="recent-post">
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM `blog` where link !='$link' order by id desc Limit 0,3");
                                    while ($fetch = mysqli_fetch_array($query)) {
                                    ?>
                                        <!-- start single post -->
                                        <div class="recent-single-post">
                                            <div class="post-img">
                                                <a href="<?= $url ?>blog-detail/<?= $fetch["link"] ?>">
                                                    <img src="<?= $url ?>uploads/blog/<?= $fetch["image"] ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="pst-content">
                                                <a href="<?= $url ?>blog-detail/<?= $fetch["link"] ?>"><h6><?= $fetch["title"] ?></h6></a>
                                            </div>
                                        </div>
                                        <!-- End single post -->
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- recent end -->
                        </div>
                    </div>
                </div>
                <!-- End left sidebar -->
            </div>
        </div>
        <!-- End row -->
    </div>
</div>
<!--End of Blog Area-->
<?php
include_once "footer.php";
?>