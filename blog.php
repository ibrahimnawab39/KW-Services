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
                        <h3>Blog</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li>Blogs</li>
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
            <div class="blog-grid">
                <?php
                $query = mysqli_query($con, "SELECT * FROM `blog` order by id desc");
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
<?php
include_once "footer.php";
?>