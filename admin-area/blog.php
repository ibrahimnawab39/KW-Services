<?php
$pagename = "Blog";
include_once "header.php";
if (isset($_GET["edit"])) {
    $edit = base64_decode($_GET["edit"]);
    $query = mysqli_query($con, "SELECT * FROM `blog` where `id`='$edit'");
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
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4> <?= isset($_GET["edit"]) ? "Edit" : "Add" ?> <?= $pagename ?></h4>
                </div>
                 </div>
            </div>
        <div class="widget-content widget-content-area ">
            <div id="alert"></div>
            <form method="post" class="p-5" id="<?= isset($_GET["edit"]) ? "update" : "add" ?>" enctype="multipart/form-data">
                <input type="hidden"  id="page" value="blog">
                <input type="hidden" name="type" value="blog">
                <input type="hidden" name="id" value="<?=@$fetch['id']?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="">Title</label>
                            <input id="title" type="text" name="title" value="<?=@$fetch['title']?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="link" class="">link</label>
                            <input id="link" type="text" name="link" value="<?=@$fetch['page_link']?>" readonly class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image" class="">Image</label>
                            <input id="image" type="file" type="image/*" name="image" class="form-control">
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="date" class="">Date</label>
                            <input id="date" type="date" name="date" value="<?=@$fetch['date']?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="">Description</label>
                            <textarea name="description" id="mytextareaa" cols="10" rows="5" class="form-control"><?=base64_decode(@$fetch['description'])?></textarea>
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
        value = value.replace(/[^a-zA-Z0-9-]/g, "");
        value = value.toLowerCase();
        $("#link").val(value);
    });
</script>