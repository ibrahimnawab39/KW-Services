<?php
if (!isset($_GET["link"])) {
    header("location:services");
}
$pagename = "Service Checkout";
include_once "header.php";
if (isset($_GET["link"])) {
    $link = $_GET["link"];
    $package_link = @$_GET["package_link"];
    $quesy1 = mysqli_query($con, "SELECT * FROM `services` where link='$link'");
    $fetch1 = mysqli_fetch_array($quesy1);
    if (isset($package_link)) {
        $query = mysqli_query($con, "SELECT * FROM `packages` where link ='$package_link'");
        $row1 = mysqli_fetch_array($query);
    }
}
?>
<!-- Start Bottom Header -->
<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb">
                    <div class="section-headline white-headline text-center">
                        <h3>Service Checkout</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li>Service Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<!-- service area start -->
<div class="bg-color area-padding">
    <div class="container">
        <form id="add" method="post">
            <h3>Service Checkout</h3>
            <div id="alert"></div>
            <div class="row service-checkout">
                <div class="col-md-8">
                    <input type="hidden" id="page" value="service-checkout">
                    <input type="hidden" name="total" id="total-input" value="<?= (($fetch1["duration_price"] != "0"  && $fetch1["material_price"] != "0" && $fetch1["professional_price"] != "0") ? (($fetch1["duration"] != "0" && $fetch1["duration"] != "") ? $fetch1["duration_price"] : 0)  + (($fetch1["number_of_professionl"] != "0" && $fetch1["number_of_professionl"] != "") ? $fetch1["professional_price"] : 0) + (($fetch1["materials"] != "no" && $fetch1["materials"] != "") ?  $fetch1["material_price"] : 0) : 0) ?>">
                    <input type="hidden" name="service_id" value="<?=$fetch1["id"]?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <div class="form-check form-check-inline">
                                    <?php
                                    $query = mysqli_query($con, "SELECT * FROM `packages` where service_id ='" . $fetch1["id"] . "' ORDER BY id ASC");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="package[]" <?= ($row["link"] == $package_link) ? "checked" : "" ?> value="<?= $row["id"] ?>" data-id="<?= $row["id"] ?>" data-price="<?= ($row["discount_price"] != "0") ? $row["discount_price"] : $row["regular_price"] ?>" data-title="<?= $row["title"] ?>"> <?= $row["title"] ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                            if ($fetch1["duration"] != "0" && $fetch1["duration"] != "") {
                            ?>
                                <div class="form-group mb-3">
                                    <label for="">How many hours do you need your professional to stay?</label>
                                    <div class="form-check form-check-inline">
                                        <?php
                                        for ($i = 1; $i <= $fetch1["duration"]; $i++) {  ?>
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="duration" data-price="<?= ($i * $fetch1["duration_price"]) ?>" value="<?= $i ?>" <?= ($i == 1) ? "checked" : "" ?>> <?= $i ?>
                                            </label>
                                        <?php  }
                                        ?>
                                    </div>
                                </div>
                            <?php }
                            if ($fetch1["number_of_professionl"] != "0" && $fetch1["number_of_professionl"] != "") {
                            ?>
                                <div class="form-group mb-3">
                                    <label for="">How many professionals do you need?</label>
                                    <div class="form-check form-check-inline">
                                        <?php
                                        for ($i = 1; $i <= $fetch1["number_of_professionl"]; $i++) {  ?>
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="radio" name="professional" data-price="<?= ($i * $fetch1["professional_price"]) ?>" value="<?= $i ?>" <?= ($i == 1) ? "checked" : "" ?>> <?= $i ?>
                                            </label>
                                        <?php  }
                                        ?>
                                    </div>
                                </div>
                            <?php }
                            if ($fetch1["materials"] != "") {
                            ?>
                                <div class="form-group mb-3">
                                    <label for="">Need cleaning materials?</label>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="material" data-price="0" value="no" <?= (@$fetch1['materials'] == "no") ? "checked" : "" ?>> No, I have them
                                        </label>
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="material" data-price="<?= $fetch1["material_price"] ?>" value="yes" <?= (@$fetch1['materials'] == "yes") ? "checked" : "" ?>> Yes, please
                                        </label>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <div class="form-group mb-3">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="full_name" placeholder="Enter Your Full name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Email Address</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Your Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone Number">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Address Detail</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Your Full Address With postal Code">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Any instructions or special requirements?</label>
                                <textarea name="instruction" id="" cols="30" rows="3" class="form-control" placeholder="Example: Key under the mat, ironing, window cleaning, etc."></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Booking Details</h5>
                            <table class="table table-bordered-0 booking-detail">
                                <tbody>
                                    <tr>
                                        <td>Service</td>
                                        <td class="text-right service-text"><?= $fetch1["title"] ?></td>
                                    </tr>
                                    <?php
                                    if (
                                        $fetch1["duration"] != "0" && $fetch1["duration"] != "" &&
                                        $fetch1["number_of_professionl"] != "0" && $fetch1["number_of_professionl"] != "" && $fetch1["materials"] != ""
                                    ) {
                                    ?>
                                        <tr>
                                            <td>Duration</td>
                                            <td class="text-right duration-text">1</td>
                                        </tr>
                                        <tr>
                                            <td>Number of Professionals</td>
                                            <td class="text-right profssional-text">1</td>
                                        </tr>
                                        <tr>
                                            <td>Material</td>
                                            <td class="text-right material-text">No</td>
                                        </tr>
                                    <?php } ?>
                                    <tr class="package-text <?= (!isset($package_link) ? "d-none" : "") ?>">
                                        <td>Package</td>
                                        <td class="text-right content-text">
                                            <?php if (isset($package_link)) { ?>
                                                <p class="package-name package-<?= $row1["id"] ?> mb-3">1x <?= $row1["title"] ?></p>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5>Payment Summary</h5>
                            <table class="table table-bordered-0 payment-summary">
                                <tbody>
                                    <tr>
                                        <td>Total</td>
                                        <td class="text-right">BHD <span id="total-amount"><?= number_format((($fetch1["duration_price"] != "0"  && $fetch1["material_price"] != "0" && $fetch1["professional_price"] != "0") ? (($fetch1["duration"] != "0" && $fetch1["duration"] != "") ? $fetch1["duration_price"] : 0)  + (($fetch1["number_of_professionl"] != "0" && $fetch1["number_of_professionl"] != "") ? $fetch1["professional_price"] : 0) + (($fetch1["materials"] != "" && $fetch1["materials"] == "yes") ?  $fetch1["material_price"] : 0) : 0), 2) ?></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- service-area end -->
<?php
include_once "footer.php";
?>
<script>
    var total = <?= (($fetch1["duration_price"] != "0"  && $fetch1["material_price"] != "0" && $fetch1["professional_price"] != "0") ? (($fetch1["duration"] != "0" && $fetch1["duration"] != "") ? $fetch1["duration_price"] : 0)  + (($fetch1["number_of_professionl"] != "0" && $fetch1["number_of_professionl"] != "") ? $fetch1["professional_price"] : 0) + (($fetch1["materials"] != "no" && $fetch1["materials"] != "") ?  $fetch1["material_price"] : 0) : 0) ?>;
    $("input[name='duration']").on("click", function() {
        var price = parseInt($(this).attr("data-price"));
        if ($(this).is(":checked")) {
            total = parseInt($("input:radio[name='professional']:checked").attr("data-price")) + price + parseInt($("input:radio[name='material']:checked").attr("data-price"));
            $("#total-input").val(total);
            total = Math.round(total).toFixed(2);
            $("#total-amount").html(total);
            $(".duration-text").html($(this).val());
        } else {
            $(".duration-text").html("1");
        }
    });
    $("input[name='professional']").on("click", function() {
        var price = parseInt($(this).attr("data-price"));
        if ($(this).is(":checked")) {
            total = parseInt($("input:radio[name='duration']:checked").attr("data-price")) + price + parseInt($("input:radio[name='material']:checked").attr("data-price"));
            $("#total-input").val(total);
            total = Math.round(total).toFixed(2);
            $("#total-amount").html(total);
            $(".profssional-text").html($(this).val());
        } else {
            $(".profssional-text").html("1");
        }
    });
    $("input[name='material']").on("click", function() {
        var price = parseInt($(this).attr("data-price"));
        if ($(this).is(":checked")) {
            total = parseInt($("input:radio[name='professional']:checked").attr("data-price")) + price + parseInt($("input:radio[name='duration']:checked").attr("data-price"));
            $("#total-input").val(total);
            total = Math.round(total).toFixed(2);
            $("#total-amount").html(total);
            $(".material-text").html($(this).val());
        } else {
            $(".material-text").html("no");
        }
    });
    $("input[name='package[]']").on("click", function() {
        var id = $(this).attr("data-id");
        var title = $(this).attr("data-title");
        if ($(this).is(":checked")) {
            $(".package-text").removeClass("d-none");
            var content = `<p class="package-name package-${id} mb-3">1x ${title}</p>`;
            $(".package-text .content-text").append(content);
        } else {
            $(`.package-text .content-text .package-${id}`).remove();
            var length = $(".package-text .content-text .package-name").length;
            if (length == 0) {
                $(".package-text").addClass("d-none");
            }
        }
        var package_price = 0;
        $("input:checkbox[name='package[]']").each(function(index) {
            if ($(this).is(":checked")) {
                var price = parseInt($(this).attr("data-price"));
                package_price = parseInt(package_price + price);
            }
        });
        $("#total-input").val((total == 0) ? package_price : parseInt(package_price + total));
        $("#total-amount").html(Math.round((total == 0) ? package_price : parseInt(package_price + total)).toFixed(2));
    });
    $("#add").on("submit", function(e) {
        e.preventDefault();
        var page = $("#page").val();
        $(".btn-sbmit").attr("disabled", "disabled");
        $.ajax({
            url: "<?=$url?>admin-area/include/insert.php?page=" + page,
            type: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(result) {
                if (result['res'] == "success") {
                    $("#alert").html(
                        '<div class="alert alert-success inverse alert-dismissible fade show" role="alert"><p><b> Well done! </b>Thank You For Buying Our Servcies!.</p></div>'
                    );
                    $("#add").trigger("reset");
                    $("html, body").animate({
                            scrollTop: 0,
                        },
                        1000
                    );
                    setTimeout(() => {
                        window.open("https://wa.me/<?=str_replace(" ","",$settinginfo["website_phone"])?>","_self");
                    }, 2500);
                } else if (result['res'] == "databasewrong") {
                    $("#alert").html(
                        '<div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><p>Something Error on Database</p></button></div>'
                    );
                    $("html, body").animate({
                            scrollTop: 0,
                        },
                        1000
                    );
                } else if (result['res'] == "fillform") {
                    $("#alert").html(
                        '<div class="alert alert-info inverse alert-dismissible fade show" role="alert"><p>Required All Fields</p></button></div>'
                    );
                    $("html, body").animate({
                            scrollTop: 0,
                        },
                        1000
                    );
                }
            },
        });
    });
</script>