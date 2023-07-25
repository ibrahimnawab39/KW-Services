<?php
include "../../include/connection.php";
// use PHPMailer\PHPMailer\PHPMailer;
// include_once "connect.php";
// require '../../PHPMailer/src/Exception.php';
// require '../../PHPMailer/src/PHPMailer.php';
// require '../../PHPMailer/src/SMTP.php';
extract($_POST);
ob_start();
function compressImage($source, $destination, $quality)
{
  $info = getimagesize($source);
  if ($info['mime'] == 'image/jpeg') {
    $image = imagecreatefromjpeg($source);
  } elseif ($info['mime'] == 'image/gif') {
    $image = imagecreatefromgif($source);
  } elseif ($info['mime'] == 'image/png') {
    $image = imagecreatefrompng($source);
  }
  imagejpeg($image, $destination, $quality);
}
function imagecheck($imagetype)
{
  if ($imagetype == "JPG" || $imagetype == "jpg" || $imagetype == "PNG" || $imagetype == "png" || $imagetype == "jpeg" || $imagetype == "JPEG" || $imagetype == "") {
    return true;
  } else {
    return false;
  }
}
function generateRandomString($length)
{
  return substr(str_shuffle(str_repeat($x = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}
switch ($_GET['page']) {
  case 'contact':
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $phone = $_POST["phone"];
    $msg = $_POST["msg"];
    $isert = mysqli_query($con, "INSERT INTO `contact`(`name`, `email`, `phone`, `subject`, `msg`) VALUES ('$name','$email','$phone','$subject','$msg')");
    ob_start();
?>
    <!DOCTYPE html>
    <html>

    <head>
      <!-- <title>Please Verify Your Email</title> -->
      <link href='https://fonts.googleapis.com/css?family=Roboto:400,600' rel='stylesheet' type='text/css'>
      <style>
        html,
        body {
          margin: 0 auto !important;
          padding: 0 !important;
          height: 100% !important;
          width: 100% !important;
          font-family: 'Roboto', sans-serif !important;
          font-size: 14px;
          margin-bottom: 10px;
          line-height: 24px;
          color: #8094ae;
          font-weight: 400;
        }

        * {
          -ms-text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
          margin: 0;
          padding: 0;
        }

        table,
        td {
          mso-table-lspace: 0pt !important;
          mso-table-rspace: 0pt !important;
        }

        table {
          border-spacing: 0 !important;
          border-collapse: collapse !important;
          table-layout: fixed !important;
          margin: 0 auto !important;
        }

        table table table {
          table-layout: auto;
        }

        a {
          text-decoration: none;
        }

        img {
          -ms-interpolation-mode: bicubic;
        }

        th {
          padding-left: 17px;
        }
      </style>
    </head>

    <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;'>
      <center style='width: 100%; background-color: #f5f6fa;'>
        <table width='100%' border='0' cellpadding='0' cellspacing='0' bgcolor='#f5f6fa'>
          <tr>
            <td style='padding: 40px 0;'>
              <table style='width:100%;max-width:620px;margin:0 auto;text-align: left;background-color:#ffffff;'>
                <tbody>
                  <tr>
                    <td style='padding: 50px 12px;width: 100%;text-align:center;'>
                      <h1 style='font-size: 18px; color: #f4bd0e; font-weight: 400; margin-bottom: 8px;'>Hi Admin,</h1>
                      <h2 style='font-size: 18px; color: black; font-weight: 400; margin-bottom: 8px;'>You have receive message</h2>
                    </td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <td><?= $name ?></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td><?= $email ?></td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td><?= $phone ?></td>
                  </tr>
                  <tr>
                    <th>Subject</th>
                    <td><?= $subject ?></td>
                  </tr>
                  <tr>
                    <th>Message</th>
                    <td><?= $msg ?></td>
                  </tr>
                </tbody>
              </table>
              <table style='width:100%;max-width:620px;margin:0 auto;'>
                <tbody>
                  <tr>
                    <td style='text-align: center; padding:25px 20px 0;'>
                      <p style='font-size: 13px;'>Copyright © 2023 <a href='<?= $url ?>' target='_blank'> Secure Your lifw</a>. All Rights Reserved. </p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </table>
      </center>
    </body>

    </html>
    <?php
    $message = ob_get_contents();
    ob_end_clean();
    $subject = "Contact Support";
    $headers = 'From: ' . CONNECT_EMAIL_CLIENT . "\r\n" .
      'Reply-To: ' . CONNECT_EMAIL_CLIENT . "\r\n" .
      "MIME-Version: 1.0" . "\r\n" .
      "Content-type:text/html;charset=UTF-8" . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
    $to = CONNECT_EMAIL_CLIENT;
    if (mail($to, $subject, $message, $headers)) {
      echo  json_encode(array("res" => "success"));
    } else {
      echo   json_encode(array("res" => "error", "msg" => "Message Could Not Be Sent <br> Mailer Error: $mail->ErrorInfo"));
    }
    break;
  case 'checkout':
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $file = "";
    $msg = base64_encode($_POST["msg"]);
    $package_id = $_POST["package_id"];
    $transaction_id = $_POST["transaction_id"];
    $picture_type = str_replace("", "", basename($_FILES["file"]["type"]));
    if ($picture_type != "") {
      $file = date('dmYHis') . str_replace(" ", "", basename($_FILES["file"]["name"]));
      $location = "../../uploads/requremint/" . $file;
      move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    }
    $insert = mysqli_query($con, "INSERT INTO `requ_orders`( `package_id`, `transaction_id`, `payment_method`, `c_name`, `c_email`, `c_phone`, `requrement`, `message`) VALUES ('$package_id','$transaction_id','Paypal','$name','$email','$phone','$file','$msg')");
    if ($insert) {
      echo  json_encode(array("res" => "success"));
    } else {
      echo  json_encode(array("res" => "danger"));
    }
    break;
  case 'blog':
    $title = $_POST["title"];
    $link = $_POST["link"];
    $file = "";
    $description = base64_encode($_POST["description"]);
    $date = date("Y-m-d");
    $picture_type = str_replace("", "", basename($_FILES["image"]["type"]));
    if ($picture_type != "") {
      $file = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
      $location = "../../uploads/blog/" . $file;
      move_uploaded_file($_FILES["image"]["tmp_name"], $location);
    }
    $insert = mysqli_query($con, "INSERT INTO `blog`( `title`, `date`, `description`, `link`, `image`) VALUES ('$title','$date','$description','$link','$file')");
    if ($insert) {
      echo  json_encode(array("res" => "success"));
    } else {
      echo  json_encode(array("res" => "danger"));
    }
    break;
  case 'manual_orders':
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $price = $_POST["price"];
    $status = $_POST["status"];
    $end_date = $_POST["end_date"];
    $file = "";
    $msg = base64_encode($_POST["description"]);
    $package_id = $_POST["package_id"];
    $transaction_id = $_POST["transaction_id"];
    $picture_type = str_replace("", "", basename($_FILES["file"]["type"]));
    if ($picture_type != "") {
      $file = date('dmYHis') . str_replace(" ", "", basename($_FILES["file"]["name"]));
      $location = "../../uploads/requremint/" . $file;
      move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    }
    $insert = mysqli_query($con, "INSERT INTO `manual_orders`(`name`, `email`, `phone`, `requirements`, `price`, `description`,`status`,`end_date`) VALUES('$name','$email','$phone','$file','$price','$msg','$status','$end_date')");
    if ($insert) {
      echo  json_encode(array("res" => "success"));
    } else {
      echo  json_encode(array("res" => "danger"));
    }
    break;
  case 'filter_sort_by':
    $sort_by = $_POST['sort_by'];
    if ($sort_by == 'Recommended') {
      $select_studio = mysqli_query($con, "SELECT * FROM `add_studio` where  status = 1 and verified = 1 order by id desc");
      while ($fetch_studio = mysqli_fetch_array($select_studio)) {
        $usids = $fetch_studio['user_id'];
        $check_order = mysqli_query($con, "SELECT * FROM `orders` where user_id = '$usids' and (item_name = 'Premium' || item_name = 'Premium (Yearly)')");
        if (mysqli_num_rows($check_order) > 0) {
    ?>
          <div class="col-xl-6 col-lg-12 ">
            <div class="trending-place-item">
              <div class="trending-img">
                <?php
                $stdid = $fetch_studio['id'];
                $usid = $fetch_studio['user_id'];
                $select_studio_img = mysqli_query($con, "SELECT * FROM `studio_images` where studio_id = '$stdid' and user_id ='$usid' order by id desc");
                $fetch_studio_img = mysqli_fetch_array($select_studio_img);
                ?>
                <img src="<?= $url ?>uploads/studio/<?= $fetch_studio_img['image'] ?>" alt="#" style="height: 250px;width: 100%;object-fit: cover;">
                <!-- <span class="trending-rating-green">7</span>
                                                    <span class="save-btn"><i class="icofont-heart"></i></span> -->
              </div>
              <div class="trending-title-box">
                <h4><a href="<?= $url ?>studio-detail/<?= $fetch_studio['name_link'] ?>"><?= $fetch_studio['name'] ?></a></h4>
                <div class="customer-review d-none">
                  <div class="rating-summary float-left">
                    <div class="rating-result" title="60%">
                      <ul class="product-rating">
                        <li class="prem">Premium</li>
                      </ul>
                    </div>
                  </div>
                  <div class="review-summury float-right">
                    <p><a href="javascript:void(0)" style="color: #ffc728;font-size: small;">Verified</a></p>
                  </div>
                </div>
                <ul class="trending-address">
                  <li><i class="ion-ios-location"></i>
                    <p><?= $fetch_studio['address'] ?></p>
                  </li>
                  <li><i class="ion-ios-telephone"></i>
                    <p><?= $fetch_studio['studio_phone'] ?></p>
                  </li>
                  <li><i class="ion-android-globe"></i>
                    <p><?= $fetch_studio['studio_email'] ?></p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php
          // print_r($fetch_cat["name"]);
        } else {
          echo '<h3>Studio Not Found</h3>';
        }
      }
    } elseif ($sort_by == 'Newest') {
      $select_studio = mysqli_query($con, "SELECT * FROM `add_studio` order by id desc limit 20");
      if (mysqli_num_rows($select_studio)) {
        while ($fetch_studio = mysqli_fetch_array($select_studio)) {
        ?>
          <div class="col-xl-6 col-lg-12 ">
            <div class="trending-place-item">
              <div class="trending-img">
                <?php
                $stdid = $fetch_studio['id'];
                $usid = $fetch_studio['user_id'];
                $select_studio_img = mysqli_query($con, "SELECT * FROM `studio_images` where studio_id = '$stdid' and user_id ='$usid' order by id desc");
                $fetch_studio_img = mysqli_fetch_array($select_studio_img);
                ?>
                <img src="<?= $url ?>uploads/studio/<?= $fetch_studio_img['image'] ?>" alt="#" style="height: 250px;width: 100%;object-fit: cover;">
                <!-- <span class="trending-rating-green">7</span>
                                                    <span class="save-btn"><i class="icofont-heart"></i></span> -->
              </div>
              <div class="trending-title-box">
                <h4><a href="<?= $url ?>studio-detail/<?= $fetch_studio['name_link'] ?>"><?= $fetch_studio['name'] ?></a></h4>
                <div class="customer-review d-none">
                  <div class="rating-summary float-left">
                    <div class="rating-result" title="60%">
                      <ul class="product-rating">
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star-half"></i></li>
                        <li><i class="ion-android-star-half"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="review-summury float-right">
                    <p><a href="#">3 Reviews</a></p>
                  </div>
                </div>
                <ul class="trending-address">
                  <li><i class="ion-ios-location"></i>
                    <p><?= $fetch_studio['address'] ?></p>
                  </li>
                  <li><i class="ion-ios-telephone"></i>
                    <p><?= $fetch_studio['studio_phone'] ?></p>
                  </li>
                  <li><i class="ion-android-globe"></i>
                    <p><?= $fetch_studio['studio_email'] ?></p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php
          // print_r($fetch_cat["name"]);
        }
      } else {
        echo '<h3>Studio Not Found</h3>';
      }
    } elseif ($sort_by == 'Lowest Price') {
      $select_studio = mysqli_query($con, "SELECT * FROM `add_studio` ORDER by price_per_hour ASC");
      if (mysqli_num_rows($select_studio)) {
        while ($fetch_studio = mysqli_fetch_array($select_studio)) {
        ?>
          <div class="col-xl-6 col-lg-12 ">
            <div class="trending-place-item">
              <div class="trending-img">
                <?php
                $stdid = $fetch_studio['id'];
                $usid = $fetch_studio['user_id'];
                $select_studio_img = mysqli_query($con, "SELECT * FROM `studio_images` where studio_id = '$stdid' and user_id ='$usid' order by id desc");
                $fetch_studio_img = mysqli_fetch_array($select_studio_img);
                ?>
                <img src="<?= $url ?>uploads/studio/<?= $fetch_studio_img['image'] ?>" alt="#" style="height: 250px;width: 100%;object-fit: cover;">
                <!-- <span class="trending-rating-green">7</span>
                                                      <span class="save-btn"><i class="icofont-heart"></i></span> -->
              </div>
              <div class="trending-title-box">
                <h4><a href="<?= $url ?>studio-detail/<?= $fetch_studio['name_link'] ?>"><?= $fetch_studio['name'] ?></a></h4>
                <div class="customer-review d-none">
                  <div class="rating-summary float-left">
                    <div class="rating-result" title="60%">
                      <ul class="product-rating">
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star-half"></i></li>
                        <li><i class="ion-android-star-half"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="review-summury float-right">
                    <p><a href="#">3 Reviews</a></p>
                  </div>
                </div>
                <ul class="trending-address">
                  <li><i class="ion-ios-location"></i>
                    <p><?= $fetch_studio['address'] ?></p>
                  </li>
                  <li><i class="ion-ios-telephone"></i>
                    <p><?= $fetch_studio['studio_phone'] ?></p>
                  </li>
                  <li><i class="ion-android-globe"></i>
                    <p><?= $fetch_studio['studio_email'] ?></p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php
          // print_r($fetch_cat["name"]);
        }
      } else {
        echo '<h3>Studio Not Found</h3>';
      }
    } elseif ($sort_by == 'Highest Price') {
      $select_studio = mysqli_query($con, "SELECT * FROM `add_studio` ORDER by price_per_hour desc");
      if (mysqli_num_rows($select_studio)) {
        while ($fetch_studio = mysqli_fetch_array($select_studio)) {
        ?>
          <div class="col-xl-6 col-lg-12 ">
            <div class="trending-place-item">
              <div class="trending-img">
                <?php
                $stdid = $fetch_studio['id'];
                $usid = $fetch_studio['user_id'];
                $select_studio_img = mysqli_query($con, "SELECT * FROM `studio_images` where studio_id = '$stdid' and user_id ='$usid' order by id desc");
                $fetch_studio_img = mysqli_fetch_array($select_studio_img);
                ?>
                <img src="<?= $url ?>uploads/studio/<?= $fetch_studio_img['image'] ?>" alt="#" style="height: 250px;width: 100%;object-fit: cover;">
                <!-- <span class="trending-rating-green">7</span>
                                                      <span class="save-btn"><i class="icofont-heart"></i></span> -->
              </div>
              <div class="trending-title-box">
                <h4><a href="<?= $url ?>studio-detail/<?= $fetch_studio['name_link'] ?>"><?= $fetch_studio['name'] ?></a></h4>
                <div class="customer-review d-none">
                  <div class="rating-summary float-left">
                    <div class="rating-result" title="60%">
                      <ul class="product-rating">
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star"></i></li>
                        <li><i class="ion-android-star-half"></i></li>
                        <li><i class="ion-android-star-half"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="review-summury float-right">
                    <p><a href="#">3 Reviews</a></p>
                  </div>
                </div>
                <ul class="trending-address">
                  <li><i class="ion-ios-location"></i>
                    <p><?= $fetch_studio['address'] ?></p>
                  </li>
                  <li><i class="ion-ios-telephone"></i>
                    <p><?= $fetch_studio['studio_phone'] ?></p>
                  </li>
                  <li><i class="ion-android-globe"></i>
                    <p><?= $fetch_studio['studio_email'] ?></p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php
          // print_r($fetch_cat["name"]);
        }
      } else {
        echo '<h3>Studio Not Found</h3>';
      }
    }
    break;
  case 'filter_audio_rate':
    $select_studio = mysqli_query($con, "SELECT * FROM `add_studio` WHERE audio_engineer_rate = 'Yes'");
    if (mysqli_num_rows($select_studio)) {
      while ($fetch_studio = mysqli_fetch_array($select_studio)) {
        ?>
        <div class="col-xl-6 col-lg-12 ">
          <div class="trending-place-item">
            <div class="trending-img">
              <?php
              $stdid = $fetch_studio['id'];
              $usid = $fetch_studio['user_id'];
              $select_studio_img = mysqli_query($con, "SELECT * FROM `studio_images` where studio_id = '$stdid' and user_id ='$usid' order by id desc");
              $fetch_studio_img = mysqli_fetch_array($select_studio_img);
              ?>
              <img src="<?= $url ?>uploads/studio/<?= $fetch_studio_img['image'] ?>" alt="#" style="height: 250px;width: 100%;object-fit: cover;">
              <!-- <span class="trending-rating-green">7</span>
                                                    <span class="save-btn"><i class="icofont-heart"></i></span> -->
            </div>
            <div class="trending-title-box">
              <h4><a href="<?= $url ?>studio-detail/<?= $fetch_studio['name_link'] ?>"><?= $fetch_studio['name'] ?></a></h4>
              <div class="customer-review d-none">
                <div class="rating-summary float-left">
                  <div class="rating-result" title="60%">
                    <ul class="product-rating">
                      <li><i class="ion-android-star"></i></li>
                      <li><i class="ion-android-star"></i></li>
                      <li><i class="ion-android-star"></i></li>
                      <li><i class="ion-android-star-half"></i></li>
                      <li><i class="ion-android-star-half"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="review-summury float-right">
                  <p><a href="#">3 Reviews</a></p>
                </div>
              </div>
              <ul class="trending-address">
                <li><i class="ion-ios-location"></i>
                  <p><?= $fetch_studio['address'] ?></p>
                </li>
                <li><i class="ion-ios-telephone"></i>
                  <p><?= $fetch_studio['studio_phone'] ?></p>
                </li>
                <li><i class="ion-android-globe"></i>
                  <p><?= $fetch_studio['studio_email'] ?></p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php
        // print_r($fetch_cat["name"]);
      }
    } else {
      echo '<h3>Studio Not Found</h3>';
    }
    break;
  case 'search':
    $studio_type = $_POST['value'];
    $select_studio = mysqli_query($con, "SELECT * FROM `add_studio` WHERE name like '%$studio_type%'");
    if (mysqli_num_rows($select_studio)) {
      while ($fetch_studio = mysqli_fetch_array($select_studio)) {
      ?>
        <div class="col-xl-6 col-lg-12 ">
          <div class="trending-place-item">
            <div class="trending-img">
              <?php
              $stdid = $fetch_studio['id'];
              $usid = $fetch_studio['user_id'];
              $select_studio_img = mysqli_query($con, "SELECT * FROM `studio_images` where studio_id = '$stdid' and user_id ='$usid' order by id desc");
              $fetch_studio_img = mysqli_fetch_array($select_studio_img);
              ?>
              <img src="<?= $url ?>uploads/studio/<?= $fetch_studio_img['image'] ?>" alt="#" style="height: 250px;width: 100%;object-fit: cover;">
              <!-- <span class="trending-rating-green">7</span>
                                                    <span class="save-btn"><i class="icofont-heart"></i></span> -->
            </div>
            <div class="trending-title-box">
              <h4><a href="<?= $url ?>studio-detail/<?= $fetch_studio['name_link'] ?>"><?= $fetch_studio['name'] ?></a></h4>
              <div class="customer-review d-none">
                <div class="rating-summary float-left">
                  <div class="rating-result" title="60%">
                    <ul class="product-rating">
                      <li><i class="ion-android-star"></i></li>
                      <li><i class="ion-android-star"></i></li>
                      <li><i class="ion-android-star"></i></li>
                      <li><i class="ion-android-star-half"></i></li>
                      <li><i class="ion-android-star-half"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="review-summury float-right">
                  <p><a href="#">3 Reviews</a></p>
                </div>
              </div>
              <ul class="trending-address">
                <li><i class="ion-ios-location"></i>
                  <p><?= $fetch_studio['address'] ?></p>
                </li>
                <li><i class="ion-ios-telephone"></i>
                  <p><?= $fetch_studio['studio_phone'] ?></p>
                </li>
                <li><i class="ion-android-globe"></i>
                  <p><?= $fetch_studio['studio_email'] ?></p>
                </li>
              </ul>
            </div>
          </div>
        </div>
    <?php
        // print_r($fetch_cat["name"]);
      }
    } else {
      echo '<h3>Studio Not Found</h3>';
    }
    break;
  case 'add-studio':
    $studio_name = htmlspecialchars($_POST['studio_name']);
    $description = base64_encode(mysqli_real_escape_string($con, $_POST['description']));
    $studio_type = @implode(',', $_POST['studio_type']);
    $mini_booking = htmlspecialchars($_POST['mini_booking']);
    $max_std_occupancy = htmlspecialchars($_POST['max_std_occupancy']);
    $advance_requiremt_request = htmlspecialchars($_POST['advance_requiremt_request']);
    $past_client = htmlspecialchars($_POST['past_client']);
    $audio_sample = htmlspecialchars($_POST['audio_sample']);
    $amenities = htmlspecialchars($_POST['amenities']);
    $equipment = htmlspecialchars($_POST['equipment']);
    $studio_rule = htmlspecialchars($_POST['studio_rule']);
    $cancel_policy = htmlspecialchars($_POST['cancel_policy']);
    $adr = htmlspecialchars($_POST['adr']);
    $longitude = htmlspecialchars($_POST['longitude']);
    $latitude = htmlspecialchars($_POST['latitude']);
    $apt_suite = htmlspecialchars($_POST['apt_suite']);
    $price_per_hour = htmlspecialchars($_POST['price_per_hour']);
    if (@$_POST['audio_rate'] != '') {
      $audio_rate = htmlspecialchars($_POST['audio_rate']);
    }
    if (@$_POST['disc_checkbox'] != '') {
      $disc_price = htmlspecialchars($_POST['disc_price']);
    }
    if (@$_POST['additional_check1'] != '') {
      $additional_audio_session = htmlspecialchars($_POST['additional_audio_session']);
    }
    if (@$_POST['additional_check2'] != '') {
      $additional_check2 = "Enable Discount For Session Engineer's Rate on Bookings Longer Than 8 Hours";
      $additional_check2 = mysqli_real_escape_string($con, $additional_check2);
    }
    if (@$_POST['additional_check3'] != '') {
      $additional_mixing = htmlspecialchars($_POST['additional_mixing']);
    }
    if (@$_POST['additional_check4'] != '') {
      $additional_other_service = htmlspecialchars($_POST['additional_other_service']);
    }
    $name_link = htmlspecialchars($_POST['name_link']);
    $country = htmlspecialchars($_POST['country']);
    $city = htmlspecialchars($_POST['city']);
    $city_link = htmlspecialchars($_POST['city_link']);
    // $air_conditioned = htmlspecialchars($_POST['city_image']);
    $studio_email = htmlspecialchars($_POST['studio_email']);
    $studio_phone = htmlspecialchars($_POST['studio_phone']);
    $city_image = date('dmYHis') . rand() . "." . str_replace("", "", basename($_FILES["city_image"]["type"]));
    $profile_type = str_replace("", "", basename($_FILES["city_image"]["type"]));
    $path_picture = "../../uploads/studio/" . $city_image;
    move_uploaded_file($_FILES["city_image"]["tmp_name"], $path_picture);
    if (@$_POST['studio_hour_from'] != '' && @$_POST['studio_hour_to'] != '') {
      $studio_hour_from = htmlspecialchars($_POST['studio_hour_from']);
      $studio_hour_to = htmlspecialchars($_POST['studio_hour_to']);
      $insert = mysqli_query($con, "INSERT INTO `add_studio`(`name`, `description`, `max_booking`, `max_occupacy`,  `hour_daily_from`, `hour_daily_to`, `advance_time_req`, `past_client`, `audio_sample`, `amenities`, `main_equipment`, `studio_rules`, `cancellation_policy`, `address`, `apt_suite`, `price_per_hour`, `studio_types`,`user_id`,`name_link`,`country`,`city`,`city_link`,`city_image`,`studio_email`,`studio_phone`,`status`,`verified`,`longitude`,`latitude`) VALUES ('$studio_name','$description','$mini_booking','$max_std_occupancy','$studio_hour_from','$studio_hour_to','$advance_requiremt_request','$past_client','$audio_sample','$amenities','$equipment','$studio_rule','$cancel_policy','$adr','$apt_suite','$price_per_hour','$studio_type','$globaluserid','$name_link','$country','$city','$city_link','$city_image','$studio_email','$studio_phone',1,1,'$longitude','$latitude')");
    } else {
      $studio_hour = htmlspecialchars($_POST['studio_hour']);
      $insert = mysqli_query($con, "INSERT INTO `add_studio`(`name`, `description`, `max_booking`, `max_occupacy`, `studio_hour`, `advance_time_req`, `past_client`, `audio_sample`, `amenities`, `main_equipment`, `studio_rules`, `cancellation_policy`, `address`, `apt_suite`, `price_per_hour`,  `studio_types`,`user_id`,`name_link`,`country`,`city`,`city_link`,`city_image`,`studio_email`,`studio_phone`,`status`,`verified`,`longitude`,`latitude`) VALUES ('$studio_name','$description','$mini_booking','$max_std_occupancy','$studio_hour','$advance_requiremt_request','$past_client','$audio_sample','$amenities','$equipment','$studio_rule','$cancel_policy','$adr','$apt_suite','$price_per_hour','$studio_type','$globaluserid','$name_link','$country','$city','$city_link','$city_image','$studio_email','$studio_phone',1,1,'$longitude','$latitude')");
    }
    $select_studio = mysqli_query($con, "SELECT * FROM `add_studio` ORDER by id DESC limit 1");
    $fetch_studio = mysqli_fetch_array($select_studio);
    $studio_id = $fetch_studio['id'];
    if (@$audio_rate != '') {
      $update = mysqli_query($con, "UPDATE `add_studio` SET `audio_engineer_rate`='Yes' where id='$studio_id'");
    }
    if (@$disc_price != '') {
      $update = mysqli_query($con, "UPDATE `add_studio` SET `discounts_rate`='$disc_price' where id='$studio_id'");
    }
    if (@$additional_audio_session != '') {
      $update = mysqli_query($con, "UPDATE `add_studio` SET `additional_check1`='$additional_audio_session' where id='$studio_id'");
    }
    if (@$_POST['additional_check2'] != '') {
      $update = mysqli_query($con, "UPDATE `add_studio` SET `additional_check2`='$additional_check2' where id='$studio_id'");
    }
    if (@$additional_mixing != '') {
      $update = mysqli_query($con, "UPDATE `add_studio` SET `additional_check3`='$additional_mixing' where id='$studio_id'");
    }
    if (@$additional_other_service != '') {
      $update = mysqli_query($con, "UPDATE `add_studio` SET `additional_check4`='$additional_other_service' where id='$studio_id'");
    }
    $videocount = count($_FILES["image"]["name"]);
    $limit =  8;
    if ($limit >= $videocount) {
      $queryyy = mysqli_query($con, "SELECT count(*) as total FROM `studio_images` WHERE `studio_id`='$studio_id'");
      if (mysqli_num_rows($queryyy) > 0) {
        $fetchh = mysqli_fetch_array($queryyy);
        if ($limit >= $fetchh["total"]) {
          $totalremaing = $limit - $fetchh["total"];
          if ($totalremaing >= $videocount) {
          } else {
            echo json_encode(array("res" => "limitexit"));
            exit();
          }
        } else {
          echo json_encode(array("res" => "limitexit"));
          exit();
        }
      }
    } else {
      echo json_encode(array("res" => "limitexit"));
      exit();
    }
    for ($j = 0; $j < $videocount; $j++) {
      $image = date('dmYHis') . rand() . "." . str_replace("", "", basename($_FILES["image"]["type"][$j]));
      $profile_type = str_replace("", "", basename($_FILES["image"]["type"][$j]));
      $path_picture = "../../uploads/studio/" . $image;
      move_uploaded_file($_FILES["image"]["tmp_name"][$j], $path_picture);
      //  isert image
      $insert = mysqli_query($con, "INSERT INTO `studio_images`(`image`, `studio_id`, `user_id`) VALUES ('$image','$studio_id','$globaluserid')");
    }
    if ($insert) {
      echo json_encode(array("res" => "success"));
    } else {
      echo json_encode(array("res" => "databasewrong"));
    }
    break;
  case 'testimonials':
    $name = htmlentities(@mysqli_real_escape_string($con, $_POST['name']));
    $designation = htmlentities(@mysqli_real_escape_string($con, $_POST['designation']));
    $picture = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
    $picture_type = str_replace("", "", basename($_FILES["image"]["type"]));
    $path_picture = "../../uploads/testimonials/" . $picture;
    $short_description = base64_encode($_POST['short_description']);
    if (!imagecheck($picture_type)) {
      echo json_encode(array("res" => "format"));
      exit();
    }
    move_uploaded_file($_FILES["image"]["tmp_name"], $path_picture);
    $insert = mysqli_query($con, "INSERT INTO `testimonials`(`image`, `name`, `description`, `designation`) VALUES ('$picture','$name','$short_description','$designation')");
    if ($insert) {
      echo json_encode(array("res" => "success"));
    } else {
      echo json_encode(array("res" => "databasewrong"));
    }
    break;
  case 'rat_com':
    $star = $_POST['rate'];
    $comment = base64_encode($_POST['message']);
    $parent = $_POST['parent'];
    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];
    if ($user_id != "") {
      $insert = mysqli_query($con, "INSERT INTO `post_comments`(`post_id`, `star`, `user_id`, `comments` , `parent`) VALUES ('$post_id','$star','$user_id','$comment','$parent')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "not_login"));
      exit();
    }
    break;
  case 'cnt':
    ob_start();
    $cname = htmlspecialchars($_POST['name']);
    $cemail = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $subject1 = htmlspecialchars($_POST['subject']);
    $msg = htmlspecialchars($_POST['message']);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <style type="text/css">
        body {
          width: 650px;
          font-family: work-Sans, sans-serif;
          background-color: #f6f7fb;
          display: block;
        }

        a {
          text-decoration: none;
        }

        span {
          font-size: 14px;
        }

        p {
          font-size: 13px;
          line-height: 1.7;
          letter-spacing: 0.7px;
          margin-top: 0;
        }

        .text-center {
          text-align: center
        }

        h6 {
          font-size: 16px;
          margin: 0 0 18px 0;
        }
      </style>
    </head>

    <body style="margin: 30px auto;">
      <table style="width: 100%;background: #f6f7fb;">
        <tbody>
          <tr>
            <td>
              <table style="background-color: #f6f7fb; width: 100%">
                <tbody>
                  <tr>
                    <td>
                      <table style="width: 650px; margin: 0 auto; margin-bottom: 30px">
                        <tbody>
                          <tr>
                            <td><img src="../assets/images/cuba-logo1.png" alt=""><?= $settinginfo['website_name'] ?></td>
                            <!-- <td style="text-align: right; color:#999"><span>Some Description</span></td> -->
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">
                <tbody>
                  <tr>
                    <td style="padding: 30px">
                      <h6 style="font-weight: 600">Contact</h6>
                      <h6>Name : <?php echo $cname ?></h6>
                      <h6>Email : <?php echo $cemail ?></h6>
                      <h6>Phone : <?php echo $phone
                                  ?></h6>
                      <h6>Subject : <?php echo $subject1 ?></h6>
                      <p><b>Message</b> : <?php echo $msg ?></p>
                      <p style="margin-bottom: 0">
                        Regards,<br><?= $settinginfo['website_name'] ?></p>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table style="width: 650px; margin: 0 auto; margin-top: 30px">
                <tbody>
                  <tr style="text-align: center">
                    <td>
                      <p style="color: #999; margin-bottom: 0"><?= $settinginfo['website_address'] ?></p>
                      <p style="color: #999; margin-bottom: 0">Powered By <?= $settinginfo['website_name'] ?></p>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </body>

    </html>
    <?php
    $message = ob_get_contents();
    ob_end_clean();
    $subject = "Edyogis | Contact ";
    $headers = 'From: ' . CONNECT_EMAIL_CLIENT . "\r\n" .
      'Reply-To: ' . CONNECT_EMAIL_CLIENT . "\r\n" .
      "MIME-Version: 1.0" . "\r\n" .
      "Content-type:text/html;charset=UTF-8" . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
    $to = CONNECT_EMAIL_CLIENT;
    mail($to, $subject, $message, $headers);
    $insert = mysqli_query($con, "INSERT INTO `contact`( `name`, `email`, `subject`, `msg`,`phone`) VALUES ('$cname','$cemail','$subject1','$msg','$phone')");
    if ($insert) {
      echo json_encode(array("res" => "success"));
    } else {
      echo json_encode(array("res" => "databasewrong"));
    }
    break;
  case 'service-cate':
    $cate = htmlspecialchars($_POST['cat']);
    $catlink = htmlspecialchars($_POST['cat_link']);
    $parent = htmlspecialchars($_POST['parent']);
    // $title = htmlspecialchars($_POST['title']);
    // $description = base64_encode($_POST['description']);
    // $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
    if ($cate != "") {
      // Valid extension
      // $valid_ext = array('png', 'jpeg', 'jpg');
      // // Location
      // $location = "../../assets/img/" . $image;
      // // file extension
      // $file_extension = pathinfo($location, PATHINFO_EXTENSION);
      // $file_extension = strtolower($file_extension);
      // Check extension
      // if ($file_extension == "png") {
      //     $path_image = "../../assets/img/" . $image;
      //     $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
      // } else {
      //     if (in_array($file_extension, $valid_ext)) {
      //         // Compress Image
      //         compressImage($_FILES['image']['tmp_name'], $location, 25);
      //     } else {
      //         echo json_encode(array("res"=>"format"));
      //         exit();
      //     }
      // }
      $insert = mysqli_query($con, "INSERT INTO `service_category`(`parent`,`link`,`category`) VALUES ('$parent','$catlink','$cate')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'user_insert':
    $fname = htmlspecialchars($_POST['fname']);
    // $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $pswd = htmlspecialchars(md5($_POST['password']));
    $phone = htmlspecialchars($_POST['phone']);
    // $gender = htmlspecialchars($_POST['gender']);
    // $dob = htmlspecialchars($_POST['dob']);
    // $adr = htmlspecialchars($_POST['address']);
    // $country = htmlspecialchars($_POST['country']);
    $referal = htmlspecialchars($_POST['referal']);
    $role = $_POST['role'];
    $picture = date('dmYHis') . str_replace(" ", "", basename($_FILES["file"]["name"]));
    $picture_type = str_replace("", "", basename($_FILES["file"]["type"]));
    $path_picture = "../../uploads/users/" . $picture;
    $refferal_code = generateRandomString(5) . date('dmyhis');
    if (!imagecheck($picture_type)) {
      echo json_encode(array("res" => "format"));
      exit();
    }
    move_uploaded_file($_FILES["file"]["tmp_name"], $path_picture);
    $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["file"]["name"]));
    if ($fname != "" && $email != "" && $phone != "") {
      $selecta = mysqli_query($con, "SELECT * FROM `users` where refferal_code='$referal'");
      $fetcha = mysqli_fetch_array($selecta);
      $uid = $fetcha['id'];
      $selectb = mysqli_query($con, "SELECT * FROM `share_earn` where user_id='$uid'");
      $fetchb = mysqli_fetch_array($selectb);
      $newpoint = $fetchb['point'] + 1;
      $rowb = mysqli_num_rows($selectb);
      if ($rowb == 0) {
        mysqli_query($con, "INSERT INTO `share_earn`(`user_id`, `point`) VALUES ('$uid','1')");
      } else {
        mysqli_query($con, "UPDATE `share_earn` SET `point`='$newpoint' where user_id='$uid'");
      }
      $insert = mysqli_query($con, "INSERT INTO `users`(`refferal_code_sign_up`,`fname`, `email`, `password`, `phone`, `profile` , `role_id`, `status`, `refferal_code`) VALUES ('$referal','$fname','$email','$pswd','$phone','$picture','$role',0,'$refferal_code')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
        $check_email = mysqli_query($con, "SELECT * FROM `users` ORDER BY `id` DESC LIMIT 1");
        $fetchEmail = mysqli_fetch_array($check_email);
        $u_id = $fetchEmail['id'];
        foreach ($_POST['experties'] as $val) {
          $insert = mysqli_query($con, "INSERT INTO `user_category`(`user_id`, `category_id`) VALUES ('$u_id' , '$val')");
        }
        $useremailfetch = utf8_encode($fetchEmail['email']);
        $u_id = base64_encode($u_id);
        $rowEmail = mysqli_num_rows($check_email);
        if ($rowEmail > 0) {
    ?>
          <!DOCTYPE html>
          <html lang="en">

          <head>
            <style type="text/css">
              body {
                width: 650px;
                font-family: work-Sans, sans-serif;
                background-color: #f6f7fb;
                display: block;
              }

              a {
                text-decoration: none;
              }

              span {
                font-size: 14px;
              }

              p {
                font-size: 13px;
                line-height: 1.7;
                letter-spacing: 0.7px;
                margin-top: 0;
              }

              .text-center {
                text-align: center
              }

              h6 {
                font-size: 16px;
                margin: 0 0 18px 0;
              }
            </style>
          </head>

          <body style="margin: 30px auto;">
            <table style="width: 100%;background: #f6f7fb;">
              <tbody>
                <tr>
                  <td>
                    <table style="background-color: #f6f7fb; width: 100%">
                      <tbody>
                        <tr>
                          <td>
                            <table style="width: 650px; margin: 0 auto; margin-bottom: 30px">
                              <tbody>
                                <tr>
                                  <td><img src="../assets/images/cuba-logo1.png" alt=""><?= $settinginfo['website_name'] ?></td>
                                  <!-- <td style="text-align: right; color:#999"><span>Some Description</span></td> -->
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">
                      <tbody>
                        <tr>
                          <td style="padding: 30px">
                            <h6 style="font-weight: 600">Verify Email</h6>
                            <h6>Dear <?= ucwords(utf8_encode($fetchEmail['fname'])) ?></h6>
                            <p>please verify your email for <?= $settinginfo['website_name'] ?>. If this is true, click below to verify email.</p>
                            <p style="text-align: center"><a href="<?= $url ?>index.php?id=<?= $u_id ?>" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">Verify Email</a></p>
                            <p>If you don't want to verify you can safely ignore this email.</p>
                            <p>Good luck! Hope it works.</p>
                            <p style="margin-bottom: 0">
                              Regards,<br><?= $settinginfo['website_name'] ?></p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table style="width: 650px; margin: 0 auto; margin-top: 30px">
                      <tbody>
                        <tr style="text-align: center">
                          <td>
                            <p style="color: #999; margin-bottom: 0"><?= $settinginfo['website_address'] ?></p>
                            <p style="color: #999; margin-bottom: 0">Powered By <?= $settinginfo['website_name'] ?></p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </body>

          </html>
          <?php
          $message = ob_get_contents();
          ob_end_clean();
          $subject = "Verify Email";
          $headers = 'From: ' . CONNECT_EMAIL_CLIENT . "\r\n" .
            'Reply-To: ' . CONNECT_EMAIL_CLIENT . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type:text/html;charset=UTF-8" . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          $to = $useremailfetch;
          if (mail($to, $subject, $message, $headers)) {
            echo json_encode(array("res" => "success"));
          } else {
            echo   json_encode(array("result" => "error", "msg" => "Message Could Not Be Sent <br> Mailer Error: $mail->ErrorInfo"));
          }
        }
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'expert_insert':
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $pswd = htmlspecialchars(md5($_POST['password']));
    $phone = htmlspecialchars($_POST['phone']);
    $gender = htmlspecialchars($_POST['gender']);
    $dob = htmlspecialchars($_POST['dob']);
    $adr = htmlspecialchars($_POST['address']);
    $achieve = base64_encode($_POST['achievement']);
    $education = htmlspecialchars($_POST['education']);
    $country = htmlspecialchars($_POST['country']);
    $picture = date('dmYHis') . str_replace(" ", "", basename($_FILES["file"]["name"]));
    $picture_type = str_replace("", "", basename($_FILES["file"]["type"]));
    $path_picture = "../../uploads/users/" . $picture;
    if (!imagecheck($picture_type)) {
      echo json_encode(array("res" => "format"));
      exit();
    }
    move_uploaded_file($_FILES["file"]["tmp_name"], $path_picture);
    foreach ($_POST['experties'] as $experties) {
      $expert .= $experties . ',';
    }
    $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["file"]["name"]));
    if ($fname != "" && $lname != "" && $email != "" && $dob != "" && $phone != "" && $adr != "" && $country != "") {
      $insert = mysqli_query($con, "INSERT INTO `users`(`fname`, `lname`, `email`, `pswd`, `phone`, `gender`, `dob`,`adress`,`country`, `profile`, `role_id`,`status`,`experties`,`education`,`acheivements`) VALUES ('$fname','$lname','$email','$pswd','$phone','$gender','$dob','$adr','$country','$picture',3,0,'$expert','$education','$achieve')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
        $check_email = mysqli_query($con, "SELECT * FROM `users` ORDER BY `uid` DESC LIMIT 1");
        $fetchEmail = mysqli_fetch_array($check_email);
        $useremailfetch = utf8_encode($fetchEmail['email']);
        $u_id = $fetchEmail['uid'];
        $u_id = base64_encode($u_id);
        $rowEmail = mysqli_num_rows($check_email);
        if ($rowEmail > 0) {
          ?>
          <!DOCTYPE html>
          <html lang="en">

          <head>
            <style type="text/css">
              body {
                width: 650px;
                font-family: work-Sans, sans-serif;
                background-color: #f6f7fb;
                display: block;
              }

              a {
                text-decoration: none;
              }

              span {
                font-size: 14px;
              }

              p {
                font-size: 13px;
                line-height: 1.7;
                letter-spacing: 0.7px;
                margin-top: 0;
              }

              .text-center {
                text-align: center
              }

              h6 {
                font-size: 16px;
                margin: 0 0 18px 0;
              }
            </style>
          </head>

          <body style="margin: 30px auto;">
            <table style="width: 100%;background: #f6f7fb;">
              <tbody>
                <tr>
                  <td>
                    <table style="background-color: #f6f7fb; width: 100%">
                      <tbody>
                        <tr>
                          <td>
                            <table style="width: 650px; margin: 0 auto; margin-bottom: 30px">
                              <tbody>
                                <tr>
                                  <td><img src="../assets/images/cuba-logo1.png" alt=""><?= $settinginfo['website_name'] ?></td>
                                  <!-- <td style="text-align: right; color:#999"><span>Some Description</span></td> -->
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table style="width: 650px; margin: 0 auto; background-color: #fff; border-radius: 8px">
                      <tbody>
                        <tr>
                          <td style="padding: 30px">
                            <h6 style="font-weight: 600">Verify Email</h6>
                            <h6>Dear <?= ucwords(utf8_encode($fetchEmail['fname'])) ?></h6>
                            <p>please verify your email for <?= $settinginfo['website_name'] ?>. If this is true, click below to verify email.</p>
                            <p style="text-align: center"><a href="<?= $url ?>index.php?id=<?= $u_id ?>" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">Verify Email</a></p>
                            <p>If you don't want to verify you can safely ignore this email.</p>
                            <p>Good luck! Hope it works.</p>
                            <p style="margin-bottom: 0">
                              Regards,<br><?= $settinginfo['website_name'] ?></p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table style="width: 650px; margin: 0 auto; margin-top: 30px">
                      <tbody>
                        <tr style="text-align: center">
                          <td>
                            <p style="color: #999; margin-bottom: 0"><?= $settinginfo['website_address'] ?></p>
                            <p style="color: #999; margin-bottom: 0">Powered By <?= $settinginfo['website_name'] ?></p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </body>

          </html>
<?php
          $message = ob_get_contents();
          ob_end_clean();
          $subject = "Verify Email";
          $headers = 'From: ' . CONNECT_EMAIL_CLIENT . "\r\n" .
            'Reply-To: ' . CONNECT_EMAIL_CLIENT . "\r\n" .
            "MIME-Version: 1.0" . "\r\n" .
            "Content-type:text/html;charset=UTF-8" . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
          $to = $useremailfetch;
          if (mail($to, $subject, $message, $headers)) {
            echo json_encode(array("res" => "success"));
          } else {
            echo   json_encode(array("result" => "error", "msg" => "Message Could Not Be Sent <br> Mailer Error: $mail->ErrorInfo"));
          }
        }
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'plan-cate':
    $cate = htmlspecialchars($_POST['cat']);
    $link = htmlspecialchars($_POST['link']);
    $short_desc = base64_encode($_POST['short-desc']);
    if ($cate != "" && $short_desc != "" && $link != "") {
      $insert = mysqli_query($con, "INSERT INTO `plan_category_name`(`category_name`, `link`, `shor_description`) VALUES ('$cate','$link','$short_desc')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'featured':
    $title = htmlspecialchars($_POST['title']);
    $description = base64_encode($_POST['description']);
    $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
    if ($title != "" && $description != "" && $image != "") {
      // Valid extension
      $valid_ext = array('png', 'jpeg', 'jpg');
      // Location
      $location = "../../assets/img/" . $image;
      // file extension
      $file_extension_image = pathinfo($location, PATHINFO_EXTENSION);
      $file_extension_image = strtolower($file_extension);
      // Check extension
      if ($file_extension == "png") {
        $path_image = "../../assets/img/" . $image;
        $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
      } else {
        if (in_array($file_extension, $valid_ext)) {
          // Compress Image
          compressImage($_FILES['image']['tmp_name'], $location, 25);
        } else {
          echo json_encode(array("res" => "format"));
          exit();
        }
      }
      $insert = mysqli_query($con, "INSERT INTO `featured_work`(`title`, `img`,`description`) VALUES ('$title','$image','$description')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'port-cate':
    $cate = htmlspecialchars($_POST['cat']);
    $subcate = htmlspecialchars($_POST['subcat']);
    $link = htmlspecialchars(strtolower(str_replace(" ", "-", $_POST['cat'])));
    $insert = mysqli_query($con, "INSERT INTO `portfolio_category`( `cate_name`,`parent`,`link`) VALUES ('$cate','$subcate','$link')");
    if ($insert) {
      echo json_encode(array("res" => "success"));
    } else {
      echo json_encode(array("res" => "databasewrong"));
    }
    break;
  case 'about':
    $heading = htmlspecialchars($_POST['heading']);
    $description = base64_encode($_POST['description']);
    $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
    // Valid extension
    $valid_ext = array('png', 'jpeg', 'jpg');
    // Location
    $location = "../../assets/img/" . $image;
    // file extension
    $file_extension = pathinfo($location, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    // Check extension
    if ($file_extension == "png") {
      $path_image = "../../assets/img/" . $image;
      $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
    } else {
      if (in_array($file_extension, $valid_ext)) {
        // Compress Image
        compressImage($_FILES['image']['tmp_name'], $location, 25);
      } else {
        echo json_encode(array("res" => "format"));
        exit();
      }
    }
    $insert = mysqli_query($con, "INSERT INTO `about`( `img`, `heading`,  `description`) VALUES('$image','$heading','$description')");
    if ($insert) {
      echo json_encode(array("res" => "success"));
    } else {
      echo json_encode(array("res" => "databasewrong"));
    }
    break;
  case 'team':
    $name = htmlspecialchars($_POST['name']);
    $designation = htmlspecialchars($_POST['designation']);
    $fb = $_POST['fb'];
    $insta = $_POST['insta'];
    $twitter = $_POST['twitter'];
    $linkid = $_POST['linkid'];
    $picture = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
    if ($name != "" && $designation != "" && $picture != "") {
      $picture_type = str_replace("", "", basename($_FILES["image"]["type"]));
      $path_picture = "../../uploads/team/" . $picture;
      if (!imagecheck($picture_type)) {
        echo json_encode(array("res" => "format"));
        exit();
      }
      move_uploaded_file($_FILES["image"]["tmp_name"], $path_picture);
      $insert = mysqli_query($con, "INSERT INTO `team`(`img`, `name`, `designation`, `fb`, `insta`, `twitter`, `linkid`) VALUES  ('$picture','$name','$designation','$fb','$insta','$twitter','$linkid')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'what-we-do':
    $name = htmlspecialchars($_POST['title']);
    $description = base64_encode($_POST['description']);
    $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
    if ($name != "" && $description != "" && $image != "") {
      // Valid extension
      $valid_ext = array('png', 'jpeg', 'jpg');
      // Location
      $location = "../../uploads/" . $image;
      // file extension
      $file_extension = pathinfo($location, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);
      // Check extension
      if ($file_extension == "png") {
        $path_image = "../../uploads/" . $image;
        $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
      } else {
        if (in_array($file_extension, $valid_ext)) {
          // Compress Image
          compressImage($_FILES['image']['tmp_name'], $location, 25);
        } else {
          echo json_encode(array("res" => "format"));
          exit();
        }
      }
      $insert = mysqli_query($con, "INSERT INTO `what_we_do`(`image`, `title`, `description`) VALUES  ('$image','$title','$description')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'why-choose-us':
    $name = htmlspecialchars($_POST['title']);
    $description = base64_encode($_POST['description']);
    $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
    if ($name != "" && $description != "" && $image != "") {
      // Valid extension
      $valid_ext = array('png', 'jpeg', 'jpg');
      // Location
      $location = "../../uploads/" . $image;
      // file extension
      $file_extension = pathinfo($location, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);
      // Check extension
      if ($file_extension == "png") {
        $path_image = "../../uploads/" . $image;
        $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
      } else {
        if (in_array($file_extension, $valid_ext)) {
          // Compress Image
          compressImage($_FILES['image']['tmp_name'], $location, 25);
        } else {
          echo json_encode(array("res" => "format"));
          exit();
        }
      }
      $insert = mysqli_query($con, "INSERT INTO `why_choose_us`(`image`, `title`, `description`) VALUES  ('$image','$title','$description')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'service':
    $title = htmlspecialchars($_POST['title']);
    $link = htmlspecialchars($_POST['link']);
    $banner_tittle = htmlspecialchars(base64_encode($_POST['banner_tittle']));
    $heading = htmlspecialchars(base64_encode($_POST['heading']));
    $duration = $_POST["duration"];
    $duration_price = $_POST["duration_price"];
    $professional = $_POST["professional"];
    $professional_price = $_POST["professional_price"];
    $material = $_POST["material"];
    $material_price = $_POST["material_price"];
    $description = base64_encode($_POST['description']);
    $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
    $banner_image = date('dmYHis') . str_replace(" ", "", basename($_FILES["banner_image"]["name"]));
    $icon = date('dmYHis') . str_replace(" ", "", basename($_FILES["icon"]["name"]));
    if ($title != "" && $link != "" && $banner_tittle != "" && $heading != "" && $banner_tittle != "" && $heading != "") {
      // Valid extension
      $valid_ext = array('png', 'jpeg', 'jpg');
      // Location
      $image_detail_location = "../../uploads/service/" . $image;
      // file extension
      $file_extension_image = pathinfo($image_detail_location, PATHINFO_EXTENSION);
      $file_extension_image = strtolower($file_extension_image);
      // Check extension
      if (in_array($file_extension_image, $valid_ext)) {
        $path_image = "../../uploads/service/" . $image;
        $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
      } else {
        echo json_encode(array("res" => "format"));
        exit();
      }
      // Location
      $icon_detail_location = "../../uploads/service/icon/" . $icon;
      // file extension
      $file_extension_icon = pathinfo($icon_detail_location, PATHINFO_EXTENSION);
      $file_extension_icon = strtolower($file_extension_icon);
      // Check extension
      if (in_array($file_extension_icon, $valid_ext)) {
        $path_image = "../../uploads/service/icon/" . $icon;
        $fileupload = move_uploaded_file($_FILES["icon"]["tmp_name"], $path_image);
      } else {
        echo json_encode(array("res" => "format"));
        exit();
      }
      // Location
      $banner_detail_location = "../../uploads/service/banner/" . $banner_image;
      // file extension
      $file_extension_banner = pathinfo($banner_detail_location, PATHINFO_EXTENSION);
      $file_extension_banner = strtolower($file_extension_banner);
      // Check extenbanner
      if (in_array($file_extension_banner, $valid_ext)) {
        $path_image = "../../uploads/service/banner/" . $banner_image;
        $fileupload = move_uploaded_file($_FILES["banner_image"]["tmp_name"], $path_image);
      } else {
        echo json_encode(array("res" => "format"));
        exit();
      }
      $insert = mysqli_query($con, "INSERT INTO `services`( `title`, `link`,`icon`, `banner_title`,`banner_image`, `image`, `heading`, `description`,`duration`, `number_of_professionl`, `materials`, `duration_price`, `professional_price`, `material_price`) VALUES ('$title','$link','$icon','$banner_tittle','$banner_image','$image','$heading','$description','$duration','$professional','$material','$duration_price','$professional_price','$material_price')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'pkg':
    $title = mysqli_real_escape_string($con, htmlspecialchars($_POST['title']));
    $link = htmlspecialchars($_POST['link']);
    $r_price = htmlspecialchars($_POST['r_price']);
    $d_price = htmlspecialchars($_POST['d_price']);
    $most_popular = $_POST["most_popular"];
    $service = htmlspecialchars($_POST['service']);
    $description = base64_encode($_POST['description']);
    if ($title != "" && $link != "" && $r_price != "" && $r_price != "" && $service != "" && $description != "") {
      if ($d_price > 0 && $d_price != "") {
        $percent = (($r_price - $d_price) * 100) / $r_price;
      } else {
        $percent = 0;
      }
      $insert = mysqli_query($con, "INSERT INTO `packages`(`title`, `link`, `regular_price`, `discount_price`,`discount_persentage`, `service_id`, `description`,`most_popular`) VALUES ('$title','$link','$r_price','$d_price','$percent','$service','$description','$most_popular')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'pkgcate':
    $title = htmlspecialchars($_POST['title']);
    $link = htmlspecialchars($_POST['link']);
    if ($title != "") {
      $insert = mysqli_query($con, "INSERT INTO `package_category`(`title`,`link`) VALUES ('$title','$link')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'portcate':
    $title = htmlspecialchars($_POST['title']);
    $link = htmlspecialchars($_POST['link']);
    if ($title != "" && $link != "") {
      $insert = mysqli_query($con, "INSERT INTO `portfolio_category`(`title`,`link`) VALUES ('$title','$link')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    break;
  case 'portfolio':
    $type = $_POST["type"];
    $service_id = @$_POST["service"];
    $category = $_POST["category"];
    $image_type = $_POST["image_type"];
    $url = "";
    $gallery = "";
    if ($image_type == "multiple") {
      for ($i = 0; $i < count($_FILES["image"]["name"]); $i++) {
        $gallery = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"][$i]));
        // Location
        $gallery_detail_location = "../../uploads/portfolio/image/" . $gallery;
        // Location
        $thumbnail_detail_location = "../../uploads/portfolio/thumbnail/" . $gallery;
        // file extension
        $file_extension_gallery = pathinfo($gallery_detail_location, PATHINFO_EXTENSION);
        $file_extension_gallery = strtolower($file_extension_gallery);
        // Check extension
        $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"][$i], $gallery_detail_location);
        copy($gallery_detail_location, $thumbnail_detail_location);
        $insert = mysqli_query($con, "INSERT INTO `protfolios`(`protfolio_type`, `portfolio_thumbnail`, `portfolio_gallery`, `portfolio_url`, `service_id`, `portfolio_category_id`) VALUES ('$type','$gallery','$gallery','$url','$service_id','$category')");
      }
      echo json_encode(array("res" => "success"));
      exit();
    } else {
      $thumbnail = date('dmYHis') . str_replace(" ", "", basename($_FILES["thumbnail"]["name"]));
      // Valid extension
      $valid_ext = array('png', 'jpeg', 'jpg');
      // Location
      $thumbnail_detail_location = "../../uploads/portfolio/thumbnail/" . $thumbnail;
      // file extension
      $file_extension_thumbnail = pathinfo($thumbnail_detail_location, PATHINFO_EXTENSION);
      $file_extension_thumbnail = strtolower($file_extension_thumbnail);
      // Check extension
      $path_thumbnail = "../../uploads/portfolio/thumbnail/" . $thumbnail;
      $fileupload = move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $path_thumbnail);
      if ($type == "Youtube") {
        $url = $_POST["url"];
        $gallery = "";
      } else {
        $url = "";
        $gallery = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        // Location
        $gallery_detail_location = "../../uploads/portfolio/image/" . $gallery;
        // file extension
        $file_extension_gallery = pathinfo($gallery_detail_location, PATHINFO_EXTENSION);
        $file_extension_gallery = strtolower($file_extension_gallery);
        // Check extension
        $path_gallery = "../../uploads/portfolio/image/" . $gallery;
        $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $path_gallery);
      }
      $insert = mysqli_query($con, "INSERT INTO `protfolios`(`protfolio_type`, `portfolio_thumbnail`, `portfolio_gallery`, `portfolio_url`, `service_id`, `portfolio_category_id`) VALUES ('$type','$thumbnail','$gallery','$url','$service_id','$category')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    }
    break;
  case 'service-checkout':
    $package = (isset($_POST["package"])) ? implode(",", $_POST["package"]) : null;
    $duration = @$_POST["duration"];
    $professional = @$_POST["professional"];
    $material = @$_POST["material"];
    $address = $_POST["address"];
    $instruction = $_POST["instruction"];
    $total = $_POST["total"];
    $service_id = $_POST["service_id"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    if ($address != "") {
      $insert = mysqli_query($con, "INSERT INTO `orders`(`service_id`, `address`, `instructions`, `duration`, `number_of_professional`, `material`, `total`, `package_id`,`phone`, `full_name`, `email`) VALUES ('$service_id','$address','$instruction','$duration','$professional','$material','$total','$package','$phone','$full_name','$email')");
      if ($insert) {
        echo json_encode(array("res" => "success"));
      } else {
        echo json_encode(array("res" => "databasewrong"));
      }
    } else {
      echo json_encode(array("res" => "fillform"));
    }
    # code...
    break;
  default:
    // code...
    break;
}
function invoice_num($input, $pad_len = 7, $prefix = null)
{
  if ($pad_len <= strlen($input))
    trigger_error('<strong>$pad_len</strong> cannot be less than or equal to the length of <strong>$input</strong> to generate invoice number', E_USER_ERROR);
  if (is_string($prefix))
    return sprintf("%s%s", $prefix, str_pad($input, $pad_len, "0", STR_PAD_LEFT));
  return str_pad($input, $pad_len, "0", STR_PAD_LEFT);
}
