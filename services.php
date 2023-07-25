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
                        <h3>Services</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li>All Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<!-- service area start -->
<div class="welcome-area welcome-area-4 area-padding">
    <div class="container">
        <div class="row">
            <?php
            $query = mysqli_query($con, "SELECT * FROM `services` order by sorting asc");
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
                $query = mysqli_query($con, "SELECT * FROM `packages` ORDER BY rand() ASC");
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
<?php
include_once "footer.php";
?>