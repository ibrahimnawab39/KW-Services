<?php
include "../../include/connection.php";
extract($_POST);
ob_start();
switch ($_GET['page']) {
  case 'musician_price_show':
    $musician_id = $_POST['musician_id'];
    $select = mysqli_query($con, "SELECT * FROM `musician_service` WHERE user_id = '$musician_id'");
    $fetch = mysqli_fetch_array($select);
    echo json_encode(array("res" => $fetch['price']));
    break;
  case 'addional_services':
    $price_per_hours = $_POST['price_per_hours'];
    $fetch_hour_inp = $_POST['fetch_hour_inp'];
    $price_per = ($price_per_hours * $fetch_hour_inp);
    $sub_total1 = 0;
    $mu_total = 0;
    $mixing_service_inp = 0;
    $other_service_inp = 0;
    if ($_POST['music_inp'] != '') {
      $music_inp = $_POST['music_inp'];
      $mu_total = $music_inp;
    }
    if ($_POST['audio_eng_inp'] != '') {
      $audio_eng_inp = $_POST['audio_eng_inp'];
      $sub_total1 = $audio_eng_inp;
    }
    if ($_POST['mixing_service_inp'] != '') {
      $mixing_service_inp = $_POST['mixing_service_inp'];
    }
    if ($_POST['other_service_inp'] != '') {
      $other_service_inp = $_POST['other_service_inp'];
    }
    $sub_total = $sub_total1 + $mixing_service_inp + $other_service_inp + $price_per + $mu_total;
    echo json_encode(array("res" => $sub_total));
    break;
  case 'studio_id_time_slot_table':
    $userid = $_SESSION['user_id'];
    $studio_id = $_POST['studio_id'];
    $selectcate = mysqli_query($con, "SELECT time_slot.status as time_status,time_slot.*,add_studio.name FROM `time_slot` JOIN add_studio on time_slot.studio_id = add_studio.id where time_slot.user_id = '$userid' and studio_id = '$studio_id'");
    $sno = 1;
    while ($fetchcate = mysqli_fetch_array($selectcate)) {
?>
      <tr>
        <td><?= $sno++ ?></td>
        <td><?= $fetchcate['date'] ?></td>
        <td><?php
            if ($fetchcate['status'] == 1) {
              echo '<i class="btn btn-primary btn-xs">You Are Not Available  In This Date</i>';
            } else {
              echo '-';
            }
            ?></td>
        <td><?= $fetchcate['name'] ?></td>
      </tr>
    <?php  }
    break;
  case 'studio_id_time_slot':
    $studio_id = $_POST['studio_id'];
    $month = date("m");
    $year = date("Y");
    $start_date = "01-" . $month . "-" . $year;
    $start_time = strtotime($start_date);
    $end_time = strtotime("+1 month", $start_time);
    for ($i = $start_time; $i < $end_time; $i += 86400) {
      $list[] = date('Y-m-d', $i) . '<br>';
    }
    $i = 1;
    foreach ($list as $key => $value) {
      $updateselect1 =  mysqli_query($con, "SELECT * FROM `time_slot` WHERE date='$value'  and  status=1 and `studio_id`='$studio_id'");
    ?>
      <div class="col-md-3">
        <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="dates[]" id="checkbox<?= $i++ ?>" <?= (mysqli_num_rows($updateselect1) == 1) ? "checked=''" : "" ?> data-bs-original-title="" title="" style=" transform: scale(1.5);" value="<?= $value ?>">
            <?= $value ?>
            <input type="text" class="" hidden name="datesss[]" id="checkboxx<?= $i++ ?>" value="<?= $value ?>">
          </label>
        </div>
      </div>
    <?php
    }
    break;
  case 'other_p_service':
    $other_p_service_rate = $_POST['other_p_service_rate'];
    echo json_encode(array("res" => $other_p_service_rate));
    break;
  case 'mixings_m_servicec':
    $mixings_m_servicec_rate = $_POST['mixings_m_servicec_rate'];
    echo json_encode(array("res" => $mixings_m_servicec_rate));
    break;
  case 'audio_check':
    $audio_engineer = $_POST['audio_engineer'];
    $studio_hour_to = $_POST['studio_hour_to'];
    $studio_hour_from = $_POST['studio_hour_from'];
    $start_time = $studio_hour_from;
    $end_time = $studio_hour_to;
    $v =  strtotime($end_time) - strtotime($start_time);
    $total_hours =  date("h", $v);
    $total_engineer_price = $total_hours * $audio_engineer;
    echo json_encode(array("res" => $total_engineer_price));
    break;
  case 'music_check':
    $mus_price_inp = $_POST['mus_price_inp'];
    $studio_hour_to = $_POST['studio_hour_to'];
    $studio_hour_from = $_POST['studio_hour_from'];
    $start_time = $studio_hour_from;
    $end_time = $studio_hour_to;
    $v =  strtotime($end_time) - strtotime($start_time);
    $total_hours =  date("h", $v);
    $total_engineer_price = $total_hours * $mus_price_inp;
    echo json_encode(array("res" => $total_engineer_price));
    break;
  case 'booking_date':
    $booking_date = $_POST['booking_date'];
    if ($booking_date != '') {
      $both = $booking_date;
      $mysqldate = date('F j, Y', strtotime($both));
    } else {
      echo json_encode(array("res" => "invalid"));
    }
    break;
  case 'time_check':
    $studio_hour_to = $_POST['studio_hour_to'];
    $studio_hour_from = $_POST['studio_hour_from'];
    $price_per_hours = $_POST['price_per_hours'];
    $start_time = $studio_hour_from;
    $end_time = $studio_hour_to;
    $v =  strtotime($end_time) - strtotime($start_time);
    $total_hours =  date("h", $v); //Only hour
    // echo date("h:i", $v); Hour and minutes
    $mini_booking = $_POST['mini_booking'];
    if ($total_hours > $mini_booking) {
      $total_price = $price_per_hours * $total_hours;
      echo json_encode(array("res" => "success", "total_hour" => $total_hours, "total_price" => $total_price));
    } else {
      echo json_encode(array("res" => "invalid"));
    }
    break;
  case 'status1':
    $count_status1 = mysqli_query($con, "SELECT count(messages.status) as status1 FROM `messages` JOIN users on messages.sender_id = users.id where messages.status = 1 and messages.receiver_id='$globaluserid'");
    $fetch_status1 = mysqli_fetch_assoc($count_status1);
    echo $fetch_status1['status1'];
    break;
  case 'status0':
    $count_status0 = mysqli_query($con, "SELECT count(messages.status) as status0 FROM `messages` JOIN users on messages.sender_id = users.id where messages.status = 0 and messages.receiver_id='$globaluserid'");
    $fetch_status0 = mysqli_fetch_assoc($count_status0);
    echo $fetch_status0['status0'];
    break;
  case 'countries':
    $id = htmlspecialchars($_POST['id']);
    $select_city = mysqli_query($con, "select * from cities where country_id='$id'");
    ?>
    <option value="" selected disabled>--Select City--</option>
    <?php
    while ($fetch_city = mysqli_fetch_array($select_city)) {
    ?>
      <option value="<?= $fetch_city["ctname"] ?>"><?= $fetch_city["ctname"] ?> </option>
    <?php
    }
    break;
  case 'coupon_form':
    $total_promo = $_POST['total_promo'];
    $coupon = $_POST['coupon'];
    $select_coupon = mysqli_query($con, "SELECT * FROM `coupons` WHERE code = '$coupon' and status =1");
    if (mysqli_num_rows($select_coupon) > 0) {
      $today = date("Y-m-d");
      $fetch_coupon = mysqli_fetch_array($select_coupon);
      $end_date = $fetch_coupon['end_date'];
      if ($today <= $end_date) {
        $calculate = $fetch_coupon['discount'] / 100;
        $sub_total = $calculate * $total_promo;
        $total_price = $total_promo - $sub_total;
        echo json_encode(array("res" => "success", "price" => $total_price));
      } else {
        echo json_encode(array("res" => "expired"));
      }
    } else {
      echo json_encode(array("res" => "invalid"));
    }
    break;
  case 'select':
    $id = $_POST["iid"];
    // echo $id;
    $queryd = mysqli_query($con, "SELECT * FROM `users` where id='$id'");
    if (mysqli_num_rows($queryd) > 0) {
      $response = array();
      while ($fet = mysqli_fetch_array($queryd)) {
        array_push($response, array("email" => $fet["email"], "pswd" => "123"));
      }
      echo json_encode($response);
    }
    break;
  case 'comments':
    $post = $_REQUEST['post'];
    $queryd = mysqli_query($con, "SELECT p.* , u.fname , u.lname , u.profile FROM `post_comments` p INNER JOIN `users` u ON p.user_id = u.id WHERE `post_id` = '$post' AND `parent` = 0");
    while ($res_com = mysqli_fetch_array($queryd)) {
      $rat = $res_com['star'];
    ?>
      <li class="mt-4">
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-center">
            <a class="pe-3" href="#">
              <img src="<?= $url ?>uploads/users/<?php if ($res_com['profile']) {
                                                  echo $res_com['profile'];
                                                } else {
                                                  echo "default.png";
                                                } ?>" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
            </a>
            <div class="commentor-detail">
              <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading"><?= $res_com['fname'] ?> <?= $res_com['lname'] ?></a></h6>
              <small class="text-muted">
                <?php for ($star = 1; $star <= $rat; $star++) { ?>
                  <span class="fa fa-star" style="color: orange;"></span>
                <?php } ?>
              </small>
            </div>
          </div>
          <a href="javascript:void(0)" class="text-muted click hh" value="<?= $res_com['id'] ?>" onclick="parent(<?= $res_com['id'] ?>)"><i class="mdi mdi-reply"></i> Reply</a>
        </div>
        <div class="mt-3">
          <div class="form-group display_none" id="show_<?= $res_com['id'] ?>_com" style="display: none;">
            <form method="post" enctype="multipart/form-data" id="post_comment">
              <div id="alertsignup"></div>
              <input type="hidden" value="rat_com" id="page">
              <input type="hidden" id="post" name="post_id">
              <input type="hidden" value="<?= $_SESSION['user_id'] ?>" name="user_id">
              <input type="hidden" class="form-control" value="<?= $res_com['id'] ?>" name="parent">
              <textarea class="form-control" name="message" placeholder="Comment Here"></textarea>
              <br>
              <button type="submit" class="btn btn-success btn-lg">Submit</button>
            </form>
          </div>
        </div>
        <div class="mt-3">
          <p class="text-muted fst-italic p-3 bg-light rounded"><?= base64_decode($res_com['comments']) ?></p>
        </div>
        <?php
        $query = mysqli_query($con, "SELECT p.* , u.fname , u.lname , u.profile FROM `post_comments` p INNER JOIN `users` u ON p.user_id = u.id WHERE parent = '$res_com[id]'");
        while ($res_coms = mysqli_fetch_array($query)) {
        ?>
          <ul class="list-unstyled ps-4 ps-md-5 sub-comment">
            <li class="mt-4">
              <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <a class="pe-3" href="#">
                    <img src="<?= $url ?>uploads/users/<?php if ($res_coms['profile']) {
                                                        echo $res_coms['profile'];
                                                      } else {
                                                        echo "default.png";
                                                      } ?>" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                  </a>
                  <div class="commentor-detail">
                    <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading"><?= $res_coms['fname'] ?> <?= $res_coms['lname'] ?></a></h6>
                    <!--<small class="text-muted">17th August, 2021 at 01:25 pm</small>-->
                  </div>
                </div>
              </div>
              <div class="mt-3">
                <p class="text-muted fst-italic p-3 bg-light rounded"><?= base64_decode($res_coms['comments']) ?></p>
              </div>
            </li>
          </ul>
      </li>
    <?php
        }
      }
      break;
    case 'forgot':
      ob_start();
      $user_email = htmlspecialchars($_POST['frgtemail']);
      if ($user_email == "") {
        $data = array("result" => "req");
        echo json_encode($data);
        exit();
      }
      $check_email = mysqli_query($con, "SELECT * FROM users  where email='$user_email'");
      $fetchEmail = mysqli_fetch_array($check_email);
      $useremailfetch = utf8_encode($fetchEmail['email']);
      $u_id = $fetchEmail['id'];
      $code = rand();
      mysqli_query($con, "update users set code='$code' where id='$u_id'");
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
                      <h6 style="font-weight: 600">Password Reset</h6>
                      <h6>Dear <?= ucwords(utf8_encode($fetchEmail['fname'])) ?></h6>
                      <p>you forgot your password for <?= $settinginfo['website_name'] ?>. If this is true, click below to reset your password.</p>
                      <p style="text-align: center"><a href="<?= $url ?>reset-password.php?user=<?= $u_id ?>&code=<?= $code ?>" style="padding: 10px; background-color: #7366ff; color: #fff; display: inline-block; border-radius: 4px">Reset Password</a></p>
                      <p>If you have remember your password you can safely ignore this email.</p>
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
        $subject = "Reset Password";
        $headers = 'From: ' . CONNECT_EMAIL_CLIENT . "\r\n" .
          'Reply-To: ' . CONNECT_EMAIL_CLIENT . "\r\n" .
          "MIME-Version: 1.0" . "\r\n" .
          "Content-type:text/html;charset=UTF-8" . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
        $to = $user_email;
        if (mail($to, $subject, $message, $headers)) {
          echo  json_encode(array("result" => "true"));
        } else {
          echo   json_encode(array("result" => "error", "msg" => "Message Could Not Be Sent <br> Mailer Error: $mail->ErrorInfo"));
        }
      } else {
        echo  json_encode(array("result" => "notfound"));
      }
      // echo json_encode($data);
      break;
    case 'gallery-category-all':
      $id = $_POST["iid"];
      $select = mysqli_query($con, "SELECT * FROM `gallery_category` WHERE parent ='$id'");
      if (mysqli_num_rows($select) > 0) { ?>
    <option value="0" selected>Select Sub Category</option>
    <?php
        while ($fet = mysqli_fetch_array($select)) {
          if ($fet["id"] == $_POST["subid"]) {
    ?>
        <option value="<?= $fet["id"] ?>" selected><?= $fet["category"] ?> </option>
      <?php
          } else {
      ?>
        <option value="<?= $fet["id"] ?>"><?= $fet["category"] ?> </option>
    <?php
          }
        }
      } else {
    ?>
    <option value="0">This Category Have No Sub Category</option>
<?php
      }
      break;
    case 'login':
      $user_email = htmlspecialchars($_POST['email']);
      $password = md5(htmlspecialchars($_POST['password']));
      $check_email = mysqli_query($con, "SELECT * FROM users  where email='$user_email' and `password` ='$password'");
      $fetch = mysqli_fetch_array($check_email);
      if (mysqli_num_rows($check_email) > 0) {
        if ($fetch['status'] == 1) {
          $_SESSION['user_id'] = $fetch['id'];
          $_SESSION['user_role'] = $fetch['role'];
          $_SESSION['idsss'] = $fetch['id'];
          $_SESSION['roless'] = $fetch['role'];
        }
        // echo $_SESSION['user_role'].'zaid';
        switch ($fetch['role']) {
          case '1':
            echo json_encode(array("res" => (($fetch["status"] == 1) ? "success" : "") . (($fetch["status"] == 0) ? "warning" : ""), "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $url . "admin/index"));
            break;
          case '2':
            echo json_encode(array("res" => (($fetch["status"] == 1) ? "success" : "") . (($fetch["status"] == 0) ? "warning" : ""), "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => (($gmail_urls != '') ? $gmail_urls : $url . "dashboard")));
            break;
          case '3':
            echo json_encode(array("res" => (($fetch["status"] == 1) ? "success" : "") . (($fetch["status"] == 0) ? "warning" : ""), "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => (($gmail_urls != '') ? $gmail_urls : $url . "expert/index")));
            break;
          case '4':
            echo json_encode(array("res" => (($fetch["status"] == 1) ? "success" : "") . (($fetch["status"] == 0) ? "warning" : ""), "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $url . "index"));
            break;
          case '5':
            echo json_encode(array("res" => (($fetch["status"] == 1) ? "success" : "") . (($fetch["status"] == 0) ? "warning" : ""), "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $url . "index"));
            break;
          default:
            break;
        }
      } else {
        echo json_encode(array("res" => "warning", "msg" => "Your Email And Password Is Not Correct!"));
      }
      break;
    case 'sb-login':
      $user_email = htmlspecialchars($_POST['sbemail']);
      $password = md5(htmlspecialchars($_POST['sbpassword']));
      $current_page = $_POST['url-id'];
      if ($user_email == "" || $password == "") {
        echo json_encode(array("res" => "warning", "msg" => "Please Enter Your " . (($user_email == "" && $password != "") ? "Email!" : "") . (($user_email != "" && $password == "") ? "Password !" : "") . (($user_email == "" && $password == "") ? "Email And Password !" : "")));
        exit();
      }
      $check_email = mysqli_query($con, "SELECT * FROM users  where email='$user_email' and pswd='$password'");
      $fetch = mysqli_fetch_array($check_email);
      if (mysqli_num_rows($check_email) > 0) {
        $_SESSION['user_id'] = $fetch['id'];
        $_SESSION['user_role'] = $fetch['role_id'];
        switch ($fetch['role_id']) {
          case '1':
            echo json_encode(array("res" => "success", "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $current_page));
            break;
          case '2':
            echo json_encode(array("res" => "success", "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $current_page));
            break;
          case '3':
            echo json_encode(array("res" => "success", "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $current_page));
            break;
          case '4':
            echo json_encode(array("res" => "success", "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $current_page));
            break;
          case '5':
            echo json_encode(array("res" => "success", "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $current_page));
            break;
          default:
            break;
        }
      } else {
        echo json_encode(array("res" => "warning", "msg" => "Your Email And Password Is Not Correct!"));
      }
      break;
    case 'cate-login':
      $user_email = htmlspecialchars($_POST['cateemail']);
      $password = md5(htmlspecialchars($_POST['catepassword']));
      $current_page = $_POST['url-id-cate'];
      if ($user_email == "" || $password == "") {
        echo json_encode(array("res" => "warning", "msg" => "Please Enter Your " . (($user_email == "" && $password != "") ? "Email!" : "") . (($user_email != "" && $password == "") ? "Password !" : "") . (($user_email == "" && $password == "") ? "Email And Password !" : "")));
        exit();
      }
      $check_email = mysqli_query($con, "SELECT * FROM users  where email='$user_email' and pswd='$password'");
      $fetch = mysqli_fetch_array($check_email);
      if (mysqli_num_rows($check_email) > 0) {
        $_SESSION['user_id'] = $fetch['id'];
        $_SESSION['user_role'] = $fetch['role_id'];
        switch ($fetch['role_id']) {
          case '1':
            echo json_encode(array("res" => "success", "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $current_page));
            break;
          case '2':
            echo json_encode(array("res" => "success", "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $current_page));
            break;
          case '3':
            echo json_encode(array("res" => "success", "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $current_page));
            break;
          case '4':
            echo json_encode(array("res" => "success", "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $current_page));
            break;
          case '5':
            echo json_encode(array("res" => "success", "status" => $fetch["status"], "msg" => (($fetch["status"] == 1) ? "Login Successfully!" : "") . (($fetch["status"] == 0) ? "You Can't Login Right Now Wait For Admin Approval!" : ""), "redirect" => $current_page));
            break;
          default:
            break;
        }
      } else {
        echo json_encode(array("res" => "warning", "msg" => "Your Email And Password Is Not Correct!"));
      }
      break;
    case 'get-appointment-time-slot':
      $userid = $_POST["expert_id"];
      $service = $_POST["serviceid"];
      $date = date_format(date_create($_POST["dates"]), "Y-m-d");
      $time_slot = array();
      $query = mysqli_query($con, "SELECT * FROM `time_slots` where `date`='$date' and user_id='$userid' and status = 1");
      if (mysqli_num_rows($query) > 0) {
        while ($fetch = mysqli_fetch_array($query)) {
          $queryy = mysqli_query($con, "SELECT invoices.*,appointments.start_time,appointments.end_time FROM `payments`,invoices,appointments,services where invoices.payment_id = payments.id and payments.service_id ='$service' and invoices.appointment_id = appointments.id and services.id = payments.service_id and appointments.date='$date' and appointments.start_time = '" . $fetch["start_time"] . "' and appointments.end_time = '" . $fetch["end_time"] . "' and invoices.status= '0'");
          if (mysqli_num_rows($queryy) > 0) {
            array_push($time_slot, array("start_time" => $fetch["start_time"], "end_time" => $fetch["end_time"], "option" => date_format(date_create($fetch["start_time"]), "h:i a") . " - " . date_format(date_create($fetch["end_time"]), "h:i a"), "status" => "already"));
          } else {
            array_push($time_slot, array("start_time" => $fetch["start_time"], "end_time" => $fetch["end_time"], "option" => date_format(date_create($fetch["start_time"]), "h:i a") . " - " . date_format(date_create($fetch["end_time"]), "h:i a"), "status" => ""));
          }
        }
      }
      echo json_encode(array("res" => "success", "time_slot" => $time_slot));
      break;
  }
