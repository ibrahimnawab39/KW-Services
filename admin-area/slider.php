<?php
$pagename = "Slider";
include_once "header.php";
if (isset($_GET["edit"])) {
    $edit = base64_decode($_GET["edit"]);
    $query = mysqli_query($con, "SELECT * FROM `slider` where `id`='$edit'");
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
                <input type="hidden"  id="page" value="slider">
                <input type="hidden" name="id" value="<?= @$fetch["id"] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="">Heading</label>
                            <input id="name" type="text" name="name" value="<?=@$fetch['heading']?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="">Image</label>
                            <input id="image" type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="">Description</label>
                            <textarea name="description" cols="10" rows="3" class="form-control"><?=base64_decode(@$fetch['description'])?></textarea>
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