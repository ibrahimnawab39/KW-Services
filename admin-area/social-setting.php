<?php
$pagename = "Setting";
include_once "header.php";
    $query=mysqli_query($con,"SELECT * FROM `social_media`");
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
                <input type="hidden" name="page" id="page" value="social_media">
                <input type="hidden" name="id" value="<?= @$fetch["id"] ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fb_link" class="">Facebook Link</label>
                            <input id="fb_link" type="text" name="fb_link" value="<?= @$fetch["fb_link"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ins_link" class="">Instagran Link</label>
                            <input id="ins_link" type="text" name="instagram_link" value="<?= @$fetch["instagram_link"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="twitter_link" class="">Twitter Link</label>
                            <input id="twitter_link" type="text" name="twitter_link" value="<?= @$fetch["twitter_link"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="linkedin_link" class="">Linkedin Link</label>
                            <input id="linkedin_link" type="text" name="linkedin_link" value="<?= @$fetch["linkedin_link"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="youtube_link" class="">Youtube Link</label>
                            <input id="youtube_link" type="text" name="youtube_link" value="<?= @$fetch["youtube_link"] ?>" class="form-control">
                        </div>
                    </div>
                </div>
                <input type="submit" class="mt-4 btn btn-primary" onclick="tinyMCE.triggerSave(true,true);" value="Update">
            </form>
        </div>
            </div>
 <?php
    include_once "footer.php";
?>