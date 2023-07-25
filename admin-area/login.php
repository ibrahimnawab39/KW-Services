<?php
include_once "../include/connection.php";
if(isset($_SESSION["userid"]))
{
 header("location:index");
}
$message = '';

if(isset($_POST["login"]))
{
 if(empty($_POST["email"]) || empty($_POST["password"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
     $user_email = htmlspecialchars($_POST['email']);
    $password = md5(htmlspecialchars($_POST['password']));
   $check_email = mysqli_query($con, "SELECT * FROM users  where email='$user_email' and `password` ='$password'");
    $fetch = mysqli_fetch_array($check_email);
      if (mysqli_num_rows($check_email) > 0) {
        $_SESSION["userid"] = $fetch["id"]; 
     header("location:index");
  }
  else
  {
   $message = "<div class='alert alert-danger'>Invalid Email or Password</div>";
  }
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?= $settinginfo["webiste_name"] ?> | Login</title>
    <link rel="icon" type="image/x-icon" href="<?= $url ?>uploads/settings/<?= $settinginfo["website_favicon"] ?>" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?= $url ?>backassets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $url ?>backassets/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?= $url ?>backassets/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= $url ?>backassets/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="<?= $url ?>backassets/assets/css/forms/switches.css">
</head>
<body class="form">
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">Log In to <a href="<?= $url ?>"><?= $settinginfo["webiste_name"] ?></a> </h1>
                        <form class="text-left" method="post">
                        
                        <div id="alert"><?=$message?></div>
                            <div class="form">
                                <div id="username-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <input id="username" name="email" type="text" class="form-control" placeholder="Email Address">
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" name="login" value="">Log In</button>
                                    </div>
                                </div>
                                <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="checkbox" class="new-control-input">
                                            <span class="new-control-indicator"></span>Keep me logged in
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="terms-conditions">© 2022 All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image" style="background-image: url(<?= $url ?>uploads/settings/<?= $settinginfo["website_footer_logo"] ?>);">
            </div>
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= $url ?>backassets/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?= $url ?>backassets/bootstrap/js/popper.min.js"></script>
    <script src="<?= $url ?>backassets/bootstrap/js/bootstrap.min.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= $url ?>backassets/assets/js/authentication/form-1.js"></script>
    <script src="<?=$url?>backassets/assets/js/customize.js"></script>
</body>
</html>
