<?php
$pagename = "Service Detail";
include_once "header.php";
if (isset($_GET["link"])) {
    $link = $_GET["link"];
    $query = mysqli_query($con, "SELECT * FROM `services` where link ='$link'");
    $fetch = mysqli_fetch_array($query);
}
function service_active($page)
{
    return ($_GET["link"] == $page) ? "active" : "";
}
?>
<!-- Start Bottom Header -->
<div class="page-area" style="background-image: url('<?= $url ?>uploads/service/banner/<?= $fetch["banner_image"] ?>');">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb">
                    <div class="section-headline white-headline text-center">
                        <h3><?= base64_decode($fetch["heading"]) ?></h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li class="home-bread">Services</li>
                        <li><?= $fetch["title"] ?></li>

                    </ul>
                    <div class="text-center">
                        <a href="<?= $url ?>service-checkout/<?= $fetch["link"] ?>" class="btn btn-primary">Book now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<!-- End services Area -->
<div class="single-services-page area-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="page-head-left">
                    <!-- strat single area -->
                    <div class="single-page-head">
                        <div class="left-menu">
                            <ul>
                                <?php
                                $query1 = mysqli_query($con, "SELECT * FROM `services` order by id asc");
                                while ($fetch1 = mysqli_fetch_array($query1)) {
                                ?>
                                    <li class="<?= service_active($fetch1["link"]) ?>"><a href="<?= ($fetch1["link"] != $_GET["link"]) ? $url . "service-detail/" . $fetch1["link"] : "#" ?>"><?= $fetch1["title"] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End left sidebar -->
            <!-- Start service page -->
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-page">
                            <div class="page-img elec-page">
                                <img src="<?= $url ?>uploads/service/<?= $fetch["image"] ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- strat single page -->
                    <!-- single-well end-->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="single-well">
                            <?= base64_decode($fetch["description"]) ?>
                        </div>
                    </div>
                </div>
                <!-- end Row -->
            </div>
        </div>
    </div>
</div>
<!-- End page Area -->
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
                $query = mysqli_query($con, "SELECT * FROM `packages` where service_id ='" . $fetch["id"] . "' ORDER BY id ASC");
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
                                <a href="<?= $url ?>service-checkout/<?=$fetch1["link"]?>/<?= $row["link"] ?>" class="btn btn-primary">Book now</a>
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