<?php
$pagename = "Services";
include_once "header.php";
if (isset($_GET["edit"])) {
    $edit = base64_decode($_GET["edit"]);
    $query = mysqli_query($con, "SELECT * FROM `services` where `id`='$edit'");
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
                        <input type="hidden" id="page" value="service">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="banner_tittle" class="">Service Icon</label>
                                    <input type="file" name="icon" id="icon" type="image/*" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="banner_tittle" class="">Banner Title</label>
                                    <input id="banner_tittle" type="text" name="banner_tittle" value="<?= @base64_decode($fetch['banner_title']) ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="banner_tittle" class="">Banner Image</label>
                                    <input type="file" name="banner_image" id="banner_image" type="image/*" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="heading" class="">Heading</label>
                                    <input id="heading" type="text" name="heading" value="<?= @base64_decode($fetch['heading']) ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="">Image</label>
                                    <input type="file" name="image" id="image" type="image/*" class="form-control">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration" class="">Duration</label>
                                    <input id="duration" type="number" name="duration" min="1" value="<?= @$fetch['duration'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="duration_price" class="">Duration Per Price</label>
                                    <input id="duration_price" type="number" name="duration_price" min="1" value="<?= @$fetch['duration_price'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="professional" class="">Number Of Professional</label>
                                    <input id="professional" type="number" min="1" name="professional" value="<?= @$fetch['number_of_professionl'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="professional_price" class="">Number Of Professional Per Price</label>
                                    <input id="professional_price" type="number" min="1" name="professional_price" value="<?= $fetch['professional_price'] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="material" class="">Material </label>
                                    <select name="material" class="form-control">
                                        <option value="" <?= (@$fetch['material'] == "") ? "checked" : "" ?>>Select Material</option>
                                        <option value="yes" <?= (@$fetch['material'] == "yes") ? "checked" : "" ?>>Yes</option>
                                        <option value="no" <?= (@$fetch['material'] == "no") ? "checked" : "" ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="material_price" class="">Material Price</label>
                                    <input id="material_price" type="text" name="material_price" value="<?= @$fetch['material_price'] ?>" class="form-control">
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
                value = value.replace(/\s&+/g, '-').toLowerCase();
                value = value.replace(/[^a-zA-Z-]/g, "");
                value = value.toLowerCase();
                $("#link").val(value);
            });
        </script>