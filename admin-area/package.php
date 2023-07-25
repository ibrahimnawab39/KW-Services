<?php
$pagename = "Package";
include_once "header.php";
if (isset($_GET["edit"])) {
    $edit = base64_decode($_GET["edit"]);
    $query = mysqli_query($con, "SELECT * FROM `packages` where `id`='$edit'");
    $fetch = mysqli_fetch_array($query);
}
?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                            <h4><?= $pagename ?> <?= isset($_GET["edit"]) ? "Edit" : "Add" ?></h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area p-5">
                    <div id="alert"></div>
                    <form method="post" id="<?= isset($_GET["edit"]) ? "update" : "add" ?>" enctype="multipart/form-data">
                        <input type="hidden" id="page" value="pkg">
                        <input type="hidden" name="id" value="<?= @$fetch["id"] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="">Title</label>
                                    <input id="title" type="text" name="title" value="<?= @$fetch['title'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link" class="">link</label>
                                    <input id="link" type="text" name="link" readonly value="<?= @$fetch['link'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="r_price" class="">Regular Price</label>
                                    <input id="r_price" type="text" name="r_price" value="<?= @$fetch['regular_price'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="d_price" class="">Discount Price</label>
                                    <input id="d_price" type="text" name="d_price" value="<?= @$fetch['discount_price'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service" class="">Service</label>
                                    <select name="service" id="service" class="form-control">
                                        <option value="0" selected>--Select Service--</option>
                                        <?php
                                        $s = mysqli_query($con, "SELECT * FROM `services`");
                                        while ($f = mysqli_fetch_array($s)) {
                                        ?>
                                            <option value="<?= $f['id'] ?>" <?= (@$fetch['service_id'] == $f["id"]) ? "selected" : "" ?>><?= $f['title'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="most_popular" class="">Most Popluar</label>
                                    <select name="most_popular" id="most_popular" class="form-control">
                                        <option value="0" selected>--Select Most Popluar--</option>
                                        <option value="0" >No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="">Description</label>
                                    <textarea name="description" id="mytextareaa" cols="10" rows="5" class="form-control"><?= @base64_decode($fetch['description']) ?></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="mt-4 btn btn-primary" onclick="tinyMCE.triggerSave(true,true);" value="<?= isset($_GET["edit"]) ? "Update" : "Add" ?>">
                    </form>
                </div>
            </div>
        </div>
        <?php
        include_once "footer.php"
        ?>
        <script>
            $("#title").on("input", function() {
                value = $(this).val();
                value = value.replace(/\s+/g, '-').toLowerCase();
                value = value.replace(/[^a-zA-Z-]/g, "");
                value = value.toLowerCase();
                $("#link").val(value);
            });
        </script>