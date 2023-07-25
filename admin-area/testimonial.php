<?php
$pagename = "Testimonials";
include_once "header.php";
if (isset($_GET["edit"])) {
    $edit = base64_decode($_GET["edit"]);
    $query = mysqli_query($con, "SELECT * FROM `testimonials` where `id`='$edit'");
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
        <div class="widget-content widget-content-area p-3">
            <div id="alert"></div>
            <form method="post" id="<?= isset($_GET["edit"]) ? "update" : "add" ?>" enctype="multipart/form-data">
                <input type="hidden"  id="page" value="testimonials">
                <input type="hidden" name="id" value="<?= @$fetch["id"] ?>">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="name" class="">Name</label>
                            <input id="name" type="text" name="name" value="<?= @$fetch["name"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="designation" class="">Designation</label>
                            <input id="designation" type="text" name="designation" value="<?= @$fetch["designation"] ?>" class="form-control">
                        </div>
                    </div>
                      <div class="col-md-12 mb-3">
                          <label class="form-label" for="dob">Image</label>
                          <input class="form-control" type="file" name="image" aria-label="file example" accept="image/*" data-bs-original-title="" title=""> 
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label for="description" class="">Description</label>
                            <textarea name="short_description" id="mytextareaa" cols="10" rows="5" class="form-control"><?=@base64_decode($fetch['description'])?></textarea>
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