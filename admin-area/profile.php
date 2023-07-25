<?php
$pagename = "Profile";
include_once "header.php";
$user_id = $_SESSION['userid'];
$query = mysqli_query($con, "SELECT * FROM `users` where `id`='$user_id'");
$fetch = mysqli_fetch_array($query);
?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4> Edit <?= $pagename ?> </h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area p-3">
                    <div id="alert"></div>
                    <form method="post" id="update" enctype="multipart/form-data">
                        <input type="hidden" id="page" value="profile">
                        <input type="hidden" name="id" value="<?= @$fetch["id"] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname" class="">First Name</label>
                                    <input id="fname" type="text" name="fname" value="<?= @$fetch["fname"] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lname" class="">Last Name</label>
                                    <input id="lname" type="text" name="lname" value="<?= @$fetch["lname"] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="">Email</label>
                                    <input id="email" type="email" name="email" value="<?= @$fetch["email"] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="">Contact</label>
                                    <input id="phone" type="text" name="phone" value="<?= @$fetch["phone"] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <label class="form-label">Gender</label>
                                <br>
                                <input type="radio" id="m" name="gender" <?php if (@$fetch['gender'] == "Male") {
                                                                                echo "checked";
                                                                            } ?> value="Male">&nbsp;
                                <label for="m">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="f" name="gender" <?php if (@$fetch['gender'] == "Female") {
                                                                                echo "checked";
                                                                            } ?> value="Female"> &nbsp;
                                <label for="f">Female</label>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob" class="">Date of Brith</label>
                                    <input id="dob" type="date" name="dob" value="<?= @$fetch["dob"] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="adress" class="">Address</label>
                                    <input id="adress" type="text" name="adress" value="<?= @$fetch["adress"] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country" class="">Country</label>
                                    <input id="country" type="text" name="country" value="<?= @$fetch["country"] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cover" class="">Cover Photo</label>
                                    <input id="cover" type="file" name="cover" value="<?= @$fetch["cover"] ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile" class="">Profile Picture</label>
                                    <input id="profile" type="file" name="profile" value="<?= @$fetch["profile"] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="mt-4 btn btn-primary" value="Update">
                    </form>
                </div>
            </div>
        </div>
        <?php
        include_once "footer.php"
        ?>