<?php
$pagename = "Setting";
include_once "header.php";
    $query=mysqli_query($con,"SELECT * FROM `settings`");
    $fetch=mysqli_fetch_array($query);
?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
         <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4><?= $pagename ?></h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area p-5">
            <div id="alert"></div>
            <form method="post" id="update"  enctype="multipart/form-data">
                <input type="hidden" name="page" id="page" value="setting">
                <input type="hidden" name="id" value="<?= @$fetch["id"] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="website_name" class="">Website Name</label>
                            <input id="website_name" type="text" name="website_name" value="<?= @$fetch["webiste_name"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="website_phone" class="">Website Phone</label>
                            <input id="website_phone" type="text" name="website_phone" value="<?= @$fetch["website_phone"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="website_domain" class="">Website Domain</label>
                            <input id="website_domain" type="text" name="website_domain" value="<?= @$fetch["website_domain"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="website_email" class="">Website Email</label>
                            <input id="website_email" type="email" name="website_email" value="<?= @$fetch["website_email"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="website_address" class="">Website Address</label>
                            <input id="website_address" type="text" name="website_address" value="<?= @$fetch["website_address"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="website_favicon" class="">Website Favicon</label>
                            <input id="website_favicon" type="file" name="website_favicon" value="<?= @$fetch["website_favicon"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="website_logo" class="">Website Header Logo</label>
                            <input id="website_logo" type="file" name="website_header_logo" value="<?= @$fetch["website_header_logo"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="website_logo" class="">Website Footer Logo</label>
                            <input id="website_logo" type="file" name="website_footer_logo" value="<?= @$fetch["website_footer_logo"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="website_short_desc" class="">Short Description</label>
                            <textarea name="website_short_desc" cols="10" rows="3" class="form-control"><?=base64_decode(@$fetch["website_short_desc"]) ?></textarea>
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="form-group">
                        <label for="website_long_desc" class="">Long Description</label>
                            <textarea name="website_long_desc" id="mytextareaa" cols="10" rows="10" class="form-control"><?=base64_decode(@$fetch["website_long_desc"]) ?></textarea>
                        </div>
                    </div> -->
                </div>
                <input type="submit" class="mt-4 btn btn-primary" onclick="tinyMCE.triggerSave(true,true);" value="Update">
            </form>
        </div>
            </div>
 <?php
    include_once "footer.php";
?>