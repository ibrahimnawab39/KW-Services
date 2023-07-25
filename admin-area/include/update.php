<?php
include "../../include/connection.php";
// use PHPMailer\PHPMailer\PHPMailer;
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
    if ($imagetype == "JPG" || $imagetype == "jpg" || $imagetype == "PNG" || $imagetype == "png" || $imagetype == "jpeg" || $imagetype == "JPEG" || $imagetype == "" ||  $imagetype == "WEBP" || $imagetype == "webp" || $imagetype == "") {
        return true;
    } else {
        return false;
    }
}
switch ($_GET['page']) {
    case 'cmplt':
        $id = $_POST['id'];
        $status = $_POST['status'];
        $insert = mysqli_query($con, "UPDATE  `requ_orders` SET `status`='$status' WHERE id ='$id'");
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'manual_orders':
        $id = htmlentities(@mysqli_real_escape_string($con, $_POST['id']));
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $price = $_POST["price"];
        $status = $_POST["status"];
        $end_date = $_POST["end_date"];
        $file = "";
        $msg = base64_encode($_POST["description"]);
        $picture = date('dmYHis') . str_replace(" ", "", basename($_FILES["file"]["name"]));
        $picture_type = str_replace("", "", basename($_FILES["file"]["type"]));
        $path_picture = "../../uploads/requremint/" . $picture;
        $check_email = mysqli_query($con, "SELECT * FROM manual_orders where id='$id'");
        $fetch_check = mysqli_fetch_array($check_email);
        if ($picture_type != "") {
            if (!imagecheck($picture_type)) {
                echo "image";
                exit();
            }
            $path_logo = "../../uploads/requremint/" . $picture;
            $scan_logo = $fetch_check['requirements'];
            $file_path = "../../uploads/requremint/" . $scan_logo;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            $updatelogo = mysqli_query($con, "UPDATE `manual_orders` SET `requirements`='$picture' WHERE id ='$id'");
            move_uploaded_file($_FILES["image"]["tmp_name"], $path_picture);
        }
        $insert = mysqli_query($con, "UPDATE  `manual_orders` SET `name`='$name',`email`='$email',`phone`='$phone',`price`='$price',`description`='$msg',`status` = '$status',`end_date` = '$end_date' WHERE id ='$id'");
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'testimonials':
        $id = htmlentities(@mysqli_real_escape_string($con, $_POST['id']));
        $name = htmlentities(@mysqli_real_escape_string($con, $_POST['name']));
        $designation = htmlentities(@mysqli_real_escape_string($con, $_POST['designation']));
        $picture = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        $picture_type = str_replace("", "", basename($_FILES["image"]["type"]));
        $path_picture = "../../uploads/testimonials/" . $picture;
        $short_description = base64_encode($_POST['short_description']);
        $check_email = mysqli_query($con, "SELECT * FROM testimonials where id='$id'");
        $fetch_check = mysqli_fetch_array($check_email);
        if ($picture_type != "") {
            if (!imagecheck($picture_type)) {
                echo "image";
                exit();
            }
            $path_logo = "../../uploads/testimonials/" . $picture;
            $scan_logo = $fetch_check['image'];
            $file_path = "../../uploads/testimonials/" . $scan_logo;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            $updatelogo = mysqli_query($con, "UPDATE `testimonials` SET `image`='$picture' WHERE id ='$id'");
            move_uploaded_file($_FILES["image"]["tmp_name"], $path_picture);
        }
        $insert = mysqli_query($con, "UPDATE  `testimonials` SET `name`='$name',`description`='$short_description',`designation`='$designation' WHERE id ='$id'");
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'updatepassword_reset':
        $newpass = md5($_POST['newpass']);
        $confirmpass = md5($_POST['confirmpass']);
        $user = htmlspecialchars($_POST['user']);
        if ($newpass == "" || $confirmpass == "") {
            $data = array("result" => "req");
            echo json_encode($data);
            exit();
        }
        if ($newpass != $confirmpass) {
            $data = array("result" => "notmatch");
            echo json_encode($data);
            exit();
        }
        $update = mysqli_query($con, "update users set password='$newpass',code='0' where id='$user'");
        if ($update) {
            $data = array("result" => "true");
        } else {
            $data = array("result" => "databasewrong");
        }
        echo json_encode($data);
        break;
    case 'about':
        $id = htmlspecialchars($_POST['id']);
        $description = base64_encode($_POST['description']);
        $heading = htmlspecialchars($_POST['heading']);
        $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        $check_img = mysqli_query($con, "SELECT * FROM  about where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        // Location
        $location = "../../assets/img/" . $image;
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        if ($file_extension != "") {
            if (in_array($file_extension, $valid_ext)) {
                $scan_image = $fetch_check['img'];
                $file_path = "../../assets/img/";
                $image_handle = opendir($file_path);
                while ($image_file = readdir($image_handle)) {
                    if ($image_file == $scan_image) {
                        unlink($file_path . "/" . $image_file);
                    }
                }
                closedir($image_handle);
            }
            if ($file_extension == "png") {
                $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
            } else {
                if (in_array($file_extension, $valid_ext)) {
                    // Compress Image
                    compressImage($_FILES['image']['tmp_name'], $location, 20);
                } else {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
            }
            $updateimage = mysqli_query($con, "UPDATE `about` SET `img`='$image'  where id='$id' ");
        }
        $insert = mysqli_query($con, "UPDATE `about` SET `heading`='$heading',`description`='$description' WHERE id='$id'");
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'sliders':
        $id = htmlspecialchars($_POST['id']);
        $description = base64_encode($_POST['description']);
        $title = htmlspecialchars($_POST['title']);
        $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        $check_img = mysqli_query($con, "SELECT * FROM  slider where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        // Location
        $location = "../../assets/img/" . $image;
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        if ($file_extension != "") {
            if (in_array($file_extension, $valid_ext)) {
                $scan_image = $fetch_check['img'];
                $file_path = "../../assets/img/";
                $image_handle = opendir($file_path);
                while ($image_file = readdir($image_handle)) {
                    if ($image_file == $scan_image) {
                        unlink($file_path . "/" . $image_file);
                    }
                }
                closedir($image_handle);
            }
            if ($file_extension == "png") {
                $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
            } else {
                if (in_array($file_extension, $valid_ext)) {
                    // Compress Image
                    compressImage($_FILES['image']['tmp_name'], $location, 20);
                } else {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
            }
            $updateimage = mysqli_query($con, "UPDATE `slider` SET `img`='$image'  where id='$id' ");
        }
        $insert = mysqli_query($con, "UPDATE `slider` SET `title`='$title',`description`='$description' WHERE id='$id'");
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'featured':
        $id = htmlspecialchars($_POST['id']);
        $description = base64_encode($_POST['description']);
        $title = htmlspecialchars($_POST['title']);
        if ($title != "" && $description != "") {
            $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
            $check_img = mysqli_query($con, "SELECT * FROM  featured_work where id='$id'");
            $fetch_check = mysqli_fetch_array($check_img);
            // Valid extension
            $valid_ext = array('png', 'jpeg', 'jpg');
            // Location
            $location = "../../assets/img/" . $image;
            // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
            if ($file_extension != "") {
                if (in_array($file_extension, $valid_ext)) {
                    $scan_image = $fetch_check['img'];
                    $file_path = "../../assets/img/";
                    $image_handle = opendir($file_path);
                    while ($image_file = readdir($image_handle)) {
                        if ($image_file == $scan_image) {
                            unlink($file_path . "/" . $image_file);
                        }
                    }
                    closedir($image_handle);
                }
                if ($file_extension == "png") {
                    $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
                } else {
                    if (in_array($file_extension, $valid_ext)) {
                        // Compress Image
                        compressImage($_FILES['image']['tmp_name'], $location, 20);
                    } else {
                        echo json_encode(array("res" => "format"));
                        exit();
                    }
                }
                $updateimage = mysqli_query($con, "UPDATE `featured_work` SET `img`='$image'  where id='$id' ");
            }
            $insert = mysqli_query($con, "UPDATE `featured_work` SET `title`='$title',`description`='$description' WHERE id='$id'");
            if ($insert) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        } else {
            echo json_encode(array("res" => "fillform"));
        }
        break;
    case 'service-cate':
        $id = htmlspecialchars($_POST['id']);
        // $description = base64_encode($_POST['description']);
        // $title = htmlspecialchars($_POST['title']);
        $cate = htmlspecialchars($_POST['cat']);
        $cate_link = htmlspecialchars($_POST['cat_link']);
        $parent = htmlspecialchars($_POST['parent']);
        if ($cate != "") {
            // $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
            // $check_img = mysqli_query($con, "SELECT * FROM  featured_work where id='$id'");
            // $fetch_check = mysqli_fetch_array($check_img);
            // // Valid extension
            // $valid_ext = array('png', 'jpeg', 'jpg');
            // // Location
            // $location = "../../assets/img/" . $image;
            // // file extension
            // $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            // $file_extension = strtolower($file_extension);
            // if ($file_extension != "") {
            //     if (in_array($file_extension, $valid_ext)) {
            //         $scan_image = $fetch_check['image'];
            //         $file_path = "../../assets/img/";
            //         $image_handle = opendir($file_path);
            //         while ($image_file = readdir($image_handle)) {
            //             if ($image_file == $scan_image) {
            //                 unlink($file_path . "/" . $image_file);
            //             }
            //         }
            //         closedir($image_handle);
            //     }
            //     if ($file_extension == "png") {
            //         $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
            //     } else {
            //         if (in_array($file_extension, $valid_ext)) {
            //             // Compress Image
            //             compressImage($_FILES['image']['tmp_name'], $location, 20);
            //         } else {
            //            echo json_encode(array("res"=>"format"));
            //             exit();
            //         }
            //     }
            //     $updateimage = mysqli_query($con, "UPDATE `service_category` SET `image`='$image'  where id='$id' ");
            // }
            $insert = mysqli_query($con, "UPDATE `service_category` SET `category`='$cate',`parent`='$parent',`link`='$cate_link' WHERE id='$id'");
            if ($insert) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        } else {
            echo json_encode(array("res" => "fillform"));
        }
        break;
    case 'plan-cate':
        $id = htmlspecialchars($_POST['id']);
        $cate = htmlspecialchars($_POST['cat']);
        $link = htmlspecialchars($_POST['link']);
        $short_desc = base64_encode($_POST['short-desc']);
        $insert = mysqli_query($con, "UPDATE `plan_category_name` SET `category_name`='$cate',`link`='$link',`shor_description`='$short_desc' WHERE id='$id'");
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'upcoming-video':
        $id = htmlspecialchars($_POST['id']);
        if ($_FILES['video']['name'] != '') {
            $url_update = mysqli_query($con, "UPDATE `upcoming_videos` SET `type`=''  where id='$id'");
            $video = $_FILES['video']['name'];
            $imagetmp = $_FILES['video']['tmp_name'];
            $video = date('dmYHis') . str_replace(" ", "", basename($_FILES["video"]["name"]));
            $uploadfile = move_uploaded_file($imagetmp, "../../uploads/upcoming/" . $video);
        } elseif ($_FILES['video']['name'] == '') {
            $url = $_POST['url'];
            if ($url == '') {
                $select_video  = mysqli_query($con, "SELECT * FROM `tutorials` where id = '$id'");
                $fetch = mysqli_fetch_array($select_video);
                $video = $fetch['video'];
            }
        } elseif (@$_POST['url']) {
            $url = $_POST['url'];
        }
        $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        $check_img = mysqli_query($con, "SELECT * FROM  upcoming_videos where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        // Location
        $location = "../../uploads/upcoming/" . $image;
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        if ($file_extension != "") {
            if (in_array($file_extension, $valid_ext)) {
                $scan_image = $fetch_check['img'];
                $file_path = "../../uploads/upcoming/";
                $image_handle = opendir($file_path);
                while ($image_file = readdir($image_handle)) {
                    if ($image_file == $scan_image) {
                        unlink($file_path . "/" . $image_file);
                    }
                }
                closedir($image_handle);
            }
            if ($file_extension == "png") {
                $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
            } else {
                if (in_array($file_extension, $valid_ext)) {
                    // Compress Image
                    compressImage($_FILES['image']['tmp_name'], $location, 20);
                } else {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
            }
            $updateimage = mysqli_query($con, "UPDATE `upcoming_videos` SET `img`='$image'  where id='$id' ");
        }
        if (@$video) {
            $insert = mysqli_query($con, "UPDATE `upcoming_videos` SET `video`='$video',`type`='video' WHERE id='$id'");
        } elseif (@$url) {
            $insert = mysqli_query($con, "UPDATE `upcoming_videos` SET `video`='$url',`type`='url' WHERE id='$id'");
        }
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'tutorial':
        $id = htmlspecialchars($_POST['id']);
        $price = htmlspecialchars($_POST['price']);
        $description = base64_encode($_POST['description']);
        $plan = $_POST['plan'];
        if ($_FILES['video']['name'] != '') {
            $video = $_FILES['video']['name'];
            $imagetmp = $_FILES['video']['tmp_name'];
            $video = date('dmYHis') . str_replace(" ", "", basename($_FILES["video"]["name"]));
            $uploadfile = move_uploaded_file($imagetmp, "../../uploads/tutorials/" . $video);
        } elseif ($_FILES['video']['name'] == '') {
            $select_video  = mysqli_query($con, "SELECT * FROM `tutorials` where id = '$id'");
            $fetch = mysqli_fetch_array($select_video);
            $video = $fetch['video'];
        }
        $title = htmlspecialchars($_POST['title']);
        if ($url != "" && $description != "" && $title  !=  "") {
            $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
            $check_img = mysqli_query($con, "SELECT * FROM  tutorials where id='$id'");
            $fetch_check = mysqli_fetch_array($check_img);
            // Valid extension
            $valid_ext = array('png', 'jpeg', 'jpg');
            // Location
            $location = "../../uploads/tutorials/" . $image;
            // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
            if ($file_extension != "") {
                if (in_array($file_extension, $valid_ext)) {
                    $scan_image = $fetch_check['img'];
                    $file_path = "../../uploads/tutorials/";
                    $image_handle = opendir($file_path);
                    while ($image_file = readdir($image_handle)) {
                        if ($image_file == $scan_image) {
                            unlink($file_path . "/" . $image_file);
                        }
                    }
                    closedir($image_handle);
                }
                if ($file_extension == "png") {
                    $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
                } else {
                    if (in_array($file_extension, $valid_ext)) {
                        // Compress Image
                        compressImage($_FILES['image']['tmp_name'], $location, 20);
                    } else {
                        echo json_encode(array("res" => "format"));
                        exit();
                    }
                }
                $updateimage = mysqli_query($con, "UPDATE `tutorials` SET `img`='$image'  where id='$id' ");
            }
            $insert = mysqli_query($con, "UPDATE `tutorials` SET `video`='$video',`description`='$description',`title`='$title',`plan_id`='$plan',`price`='$price' WHERE id='$id'");
            if ($insert) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        } else {
            echo json_encode(array("res" => "fillform"));
        }
        break;
    case 'blog':
        $id = htmlspecialchars($_POST['id']);
        $description = base64_encode($_POST['description']);
        $title = htmlspecialchars($_POST['title']);
        $page_link = htmlspecialchars($_POST['link']);
        $date = $_POST['date'];
        if ($description != "" && $title  !=  "") {
            $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
            $picture_type = str_replace("", "", basename($_FILES["image"]["type"]));
            $path_picture = "../../uploads/blog/" . $image;
            $selectUser = mysqli_query($con, "SELECT * FROM blog where id='$id'");
            $fetch_check = mysqli_fetch_array($selectUser);
            if ($picture_type != "") {
                $path_pix = "../../uploads/blog/" . $image;
                $scan_pix = $fetch_check['image'];
                $file_path = "../../uploads/blog/";
                $pix_handle = opendir($file_path);
                while ($pix_file = readdir($pix_handle)) {
                    if ($pix_file == $scan_pix) {
                        unlink($file_path . "/" . $pix_file);
                    }
                }
                closedir($pix_handle);
                if (!imagecheck($picture_type)) {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
                mysqli_query($con, "UPDATE `blog` SET `image`='$image'  where id='$id'  ");
                move_uploaded_file($_FILES["image"]["tmp_name"], $path_picture);
            }
            $insert =  mysqli_query($con, "UPDATE `blog` SET `description`='$description',`link`='$page_link',`title`='$title',`date`='$date' WHERE id='$id'");
            if ($insert) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        } else {
            echo json_encode(array("res" => "fillform"));
        }
        break;
    case 'review':
        $id = htmlspecialchars($_POST['id']);
        $description = base64_encode($_POST['description']);
        $name = htmlspecialchars($_POST['name']);
        if ($name != "" && $description != "") {
            $insert = mysqli_query($con, "UPDATE `review` SET `name`='$name',`description`='$description' WHERE id='$id'");
            if ($insert) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        } else {
            echo json_encode(array("res" => "fillform"));
        }
        break;
    case 'team':
        $id = htmlspecialchars($_POST['id']);
        $name = htmlspecialchars($_POST['name']);
        $designation = htmlspecialchars($_POST['designation']);
        $fb = $_POST['fb'];
        $insta = $_POST['insta'];
        $twitter = $_POST['twitter'];
        $linkid = $_POST['linkid'];
        if ($name != "" && $designation != "") {
            $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
            $picture_type = str_replace("", "", basename($_FILES["image"]["type"]));
            $path_picture = "../../uploads/team/" . $image;
            $selectUser = mysqli_query($con, "SELECT * FROM team where id='$id'");
            $fetch_check = mysqli_fetch_array($selectUser);
            if ($picture_type != "") {
                $path_pix = "../../uploads/team/" . $image;
                $scan_pix = $fetch_check['img'];
                $file_path = "../../uploads/team/";
                $pix_handle = opendir($file_path);
                while ($pix_file = readdir($pix_handle)) {
                    if ($pix_file == $scan_pix) {
                        unlink($file_path . "/" . $pix_file);
                    }
                }
                closedir($pix_handle);
                if (!imagecheck($picture_type)) {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
                mysqli_query($con, "UPDATE `team` SET `img`='$image'  where id='$id' ");
                move_uploaded_file($_FILES["image"]["tmp_name"], $path_picture);
            }
            $insert = mysqli_query($con, "UPDATE `team` SET `name`='$name',`designation`='$designation',`fb`='$fb',`insta`='$insta',`twitter` = '$twitter',`linkid` = '$linkid' WHERE id='$id'");
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
        $id = htmlspecialchars($_POST['id']);
        $title = htmlspecialchars($_POST['title']);
        $description = base64_encode($_POST['description']);
        if ($title != "" && $description != "") {
            $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
            $check_img = mysqli_query($con, "SELECT * FROM  what_we_do where id='$id'");
            $fetch_check = mysqli_fetch_array($check_img);
            // Valid extension
            $valid_ext = array('png', 'jpeg', 'jpg');
            // Location
            $location = "../../uploads/" . $image;
            // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
            if ($file_extension != "") {
                if (in_array($file_extension, $valid_ext)) {
                    $scan_image = $fetch_check['image'];
                    $file_path = "../../uploads/";
                    $image_handle = opendir($file_path);
                    while ($image_file = readdir($image_handle)) {
                        if ($image_file == $scan_image) {
                            unlink($file_path . "/" . $image_file);
                        }
                    }
                    closedir($image_handle);
                }
                if ($file_extension == "png") {
                    $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
                } else {
                    if (in_array($file_extension, $valid_ext)) {
                        // Compress Image
                        compressImage($_FILES['image']['tmp_name'], $location, 20);
                    } else {
                        echo json_encode(array("res" => "format"));
                        exit();
                    }
                }
                $updateimage = mysqli_query($con, "UPDATE `what_we_do` SET `image`='$image'  where id='$id' ");
            }
            $insert = mysqli_query($con, "UPDATE `what_we_do` SET `title`='$title',`description`='$description' WHERE id='$id'");
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
        $id = htmlspecialchars($_POST['id']);
        $title = htmlspecialchars($_POST['title']);
        $description = base64_encode($_POST['description']);
        if ($title != "" && $description != "") {
            $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
            $check_img = mysqli_query($con, "SELECT * FROM  why_choose_us where id='$id'");
            $fetch_check = mysqli_fetch_array($check_img);
            // Valid extension
            $valid_ext = array('png', 'jpeg', 'jpg');
            // Location
            $location = "../../uploads/" . $image;
            // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
            if ($file_extension != "") {
                if (in_array($file_extension, $valid_ext)) {
                    $scan_image = $fetch_check['image'];
                    $file_path = "../../uploads/";
                    $image_handle = opendir($file_path);
                    while ($image_file = readdir($image_handle)) {
                        if ($image_file == $scan_image) {
                            unlink($file_path . "/" . $image_file);
                        }
                    }
                    closedir($image_handle);
                }
                if ($file_extension == "png") {
                    $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
                } else {
                    if (in_array($file_extension, $valid_ext)) {
                        // Compress Image
                        compressImage($_FILES['image']['tmp_name'], $location, 20);
                    } else {
                        echo json_encode(array("res" => "format"));
                        exit();
                    }
                }
                $updateimage = mysqli_query($con, "UPDATE `why_choose_us` SET `image`='$image'  where id='$id' ");
            }
            $insert = mysqli_query($con, "UPDATE `why_choose_us` SET `title`='$title',`description`='$description' WHERE id='$id'");
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
        $id = htmlspecialchars($_POST['id']);
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
        $check_img = mysqli_query($con, "SELECT * FROM  services where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        // Location
        $location = "../../uploads/service/" . $image;
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        if ($file_extension != "") {
            if (in_array($file_extension, $valid_ext)) {
                $scan_image = $fetch_check['image'];
                $file_path = "../../uploads/service/";
                $image_handle = opendir($file_path);
                while ($image_file = readdir($image_handle)) {
                    if ($image_file == $scan_image) {
                        unlink($file_path . "/" . $image_file);
                    }
                }
                closedir($image_handle);
            }
            $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
            $updateimage = mysqli_query($con, "UPDATE `services` SET `image`='$image'  where id='$id' ");
        }
        // Location
        $location_icon = "../../uploads/service/icon/" . $icon;
        // file extension
        $file_extension_icon = pathinfo($location_icon, PATHINFO_EXTENSION);
        $file_extension_icon = strtolower($file_extension_icon);
        if ($file_extension_icon != "") {
            if (in_array($file_extension_icon, $valid_ext)) {
                $scan_image = $fetch_check['icon'];
                $file_path = "../../uploads/service/icon/";
                $image_handle = opendir($file_path);
                while ($image_file = readdir($image_handle)) {
                    if ($image_file == $scan_image) {
                        unlink($file_path . "/" . $image_file);
                    }
                }
                closedir($image_handle);
            }
            $fileupload = move_uploaded_file($_FILES["icon"]["tmp_name"], $location_icon);
            $updateimage = mysqli_query($con, "UPDATE `services` SET `icon`='$icon'  where id='$id' ");
        }
        // Location
        $location_banner = "../../uploads/service/banner/" . $banner_image;
        // file extension
        $file_extension_banner = pathinfo($location_banner, PATHINFO_EXTENSION);
        $file_extension_banner = strtolower($file_extension_banner);
        if ($file_extension_banner != "") {
            if (in_array($file_extension_banner, $valid_ext)) {
                $scan_image = $fetch_check['banner_image'];
                $file_path = "../../uploads/service/banner/";
                $image_handle = opendir($file_path);
                while ($image_file = readdir($image_handle)) {
                    if ($image_file == $scan_image) {
                        unlink($file_path . "/" . $image_file);
                    }
                }
                closedir($image_handle);
            }
            $fileupload = move_uploaded_file($_FILES["banner_image"]["tmp_name"], $location_banner);
            $updateimage = mysqli_query($con, "UPDATE `services` SET `banner_image`='$banner_image'  where id='$id' ");
        }
        $insert = mysqli_query($con, "UPDATE `services` SET `title`='$title',`link`='$link',`banner_title`='$banner_tittle',`heading`='$heading',`description`='$description',`duration`='$duration',`number_of_professionl`='$professional',`materials`='$material',`duration_price`='$duration_price',`professional_price`='$professional_price',`material_price`='$material_price' WHERE id='$id'");
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'terms':
        $id = htmlspecialchars($_POST['id']);
        $title = htmlspecialchars($_POST['title']);
        $description = base64_encode($_POST['description']);
        $insert = mysqli_query($con, "UPDATE `trems_conditions` SET `title`='$title',`description`='$description' WHERE id='$id'");
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'pkg':
        $id = htmlspecialchars($_POST['id']);
        $title = mysqli_real_escape_string($con, htmlspecialchars($_POST['title']));
        $link = htmlspecialchars($_POST['link']);
        $r_price = htmlspecialchars($_POST['r_price']);
        $d_price = htmlspecialchars($_POST['d_price']);
        $service = htmlspecialchars($_POST['service']);
        $description = base64_encode($_POST['description']);
        $insert = mysqli_query($con, "UPDATE `packages` SET `title`='$title',`link`='$link',`regular_price`='$r_price',`discount_price`='$d_price',`service_id`='$service',`description`='$description' WHERE id='$id'");
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'pkgcate':
        $id = htmlspecialchars($_POST['id']);
        $title = htmlspecialchars($_POST['title']);
        $link = htmlspecialchars($_POST['link']);
        if ($title != "") {
            $insert = mysqli_query($con, "UPDATE `package_category` SET `title`='$title',`link`='$link' WHERE id='$id'");
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
        $id = htmlspecialchars($_POST['id']);
        $title = htmlspecialchars($_POST['title']);
        $link = htmlspecialchars($_POST['link']);
        if ($title != "") {
            $insert = mysqli_query($con, "UPDATE `portfolio_category` SET `title`='$title',`link`='$link' WHERE id='$id'");
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
        # code...
        break;
    case 'user':
        $id = htmlspecialchars($_POST['id']);
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        // $pswd = htmlspecialchars($_POST['pswd']);
        $phone = htmlspecialchars($_POST['phone']);
        $gender = htmlspecialchars($_POST['gender']);
        $dob = htmlspecialchars($_POST['dob']);
        $adr = htmlspecialchars($_POST['adress']);
        $status = htmlspecialchars($_POST['status']);
        $country = htmlspecialchars($_POST['country']);
        // $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        //     $picture_type = str_replace("", "", basename($_FILES["image"]["type"]));
        //     $path_picture = "../../uploads/users/" . $image;
        // $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        if ($fname != "" && $lname != "" && $email != "" && $dob != "" && $phone != "" && $adr != "" && $status != "" && $country != "") {
            $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["profile"]["name"]));
            $picture_type = str_replace("", "", basename($_FILES["profile"]["type"]));
            $path_picture = "../../uploads/users/" . $image;
            $selectUser = mysqli_query($con, "SELECT * FROM users where id='$id'");
            $fetch_check = mysqli_fetch_array($selectUser);
            if ($picture_type != "") {
                $path_pix = "../../uploads/users/" . $image;
                $scan_pix = $fetch_check['profile'];
                $file_path = "../../uploads/users/";
                $pix_handle = opendir($file_path);
                while ($pix_file = readdir($pix_handle)) {
                    if ($pix_file == $scan_pix) {
                        unlink($file_path . "/" . $pix_file);
                    }
                }
                closedir($pix_handle);
                if (!imagecheck($picture_type)) {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
                mysqli_query($con, "UPDATE `users` SET `profile`='$image'  where id='$id' ");
                move_uploaded_file($_FILES["profile"]["tmp_name"], $path_picture);
            }
            $cover = date('dmYHis') . str_replace(" ", "", basename($_FILES["cover"]["name"]));
            $picture_type = str_replace("", "", basename($_FILES["cover"]["type"]));
            $path_picture = "../../uploads/users/" . $cover;
            $selectUser = mysqli_query($con, "SELECT * FROM users where id='$id'");
            $fetch_check = mysqli_fetch_array($selectUser);
            if ($picture_type != "") {
                $path_pix = "../../uploads/users/" . $cover;
                $scan_pix = $fetch_check['cover'];
                $file_path = "../../uploads/users/";
                $pix_handle = opendir($file_path);
                while ($pix_file = readdir($pix_handle)) {
                    if ($pix_file == $scan_pix) {
                        unlink($file_path . "/" . $pix_file);
                    }
                }
                closedir($pix_handle);
                if (!imagecheck($picture_type)) {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
                mysqli_query($con, "UPDATE `users` SET `cover`='$cover'  where id='$id' ");
                move_uploaded_file($_FILES["cover"]["tmp_name"], $path_picture);
            }
            // if ($pswd != "") {
            //     $password = md5($pswd);
            //     $update = mysqli_query($con, "UPDATE `users` SET `pswd`='$password' WHERE id='$id'");
            // }
            $insert = mysqli_query($con, "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`gender`='$gender',`dob`='$dob',`adress`='$adr',`status`='$status',`country`='$country'WHERE  id='$id'");
            if ($insert) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        } else {
            echo json_encode(array("res" => "fillform"));
        }
        break;
    case 'creater':
        $id = htmlspecialchars($_POST['id']);
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $pswd = htmlspecialchars($_POST['pswd']);
        $phone = htmlspecialchars($_POST['phone']);
        $gender = htmlspecialchars($_POST['gender']);
        $dob = htmlspecialchars($_POST['dob']);
        $adr = htmlspecialchars($_POST['adr']);
        $state = htmlspecialchars($_POST['state']);
        $country = htmlspecialchars($_POST['country']);
        $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        if ($fname != "" && $lname != "" && $email != "" && $dob != "" && $phone != "" && $adr != "" && $state != "" && $country != "") {
            $check_img = mysqli_query($con, "SELECT * FROM users where id='$id'");
            $fetch_check = mysqli_fetch_array($check_img);
            // Valid extension
            $valid_ext = array('png', 'jpeg', 'jpg');
            // Location
            $location = "../../assets/img/" . $image;
            // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
            if ($file_extension != "") {
                if (in_array($file_extension, $valid_ext)) {
                    $scan_image = $fetch_check['img'];
                    $file_path = "../../assets/img/";
                    $image_handle = opendir($file_path);
                    while ($image_file = readdir($image_handle)) {
                        if ($image_file == $scan_image) {
                            unlink($file_path . "/" . $image_file);
                        }
                    }
                    closedir($image_handle);
                }
                if ($file_extension == "png") {
                    $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
                } else {
                    if (in_array($file_extension, $valid_ext)) {
                        // Compress Image
                        compressImage($_FILES['image']['tmp_name'], $location, 20);
                    } else {
                        echo json_encode(array("res" => "format"));
                        exit();
                    }
                }
                $updateimage = mysqli_query($con, "UPDATE `users` SET `img`='$image'  where id='$id' ");
            }
            if ($pswd != "") {
                $password = md5($pswd);
                $update = mysqli_query($con, "UPDATE `users` SET `pswd`='$password' WHERE id='$id'");
            }
            $insert = mysqli_query($con, "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`gender`='$gender',`dob`='$dob',`adress`='$adr',`state`='$state',`country`='$country' WHERE  id='$id'");
            if ($insert) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        } else {
            echo json_encode(array("res" => "fillform"));
        }
        break;
    case 'artist-user':
        $id = htmlspecialchars($_POST['id']);
        $fname = htmlspecialchars($_POST['fname']);
        $lname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $pswd = htmlspecialchars($_POST['pswd']);
        $phone = htmlspecialchars($_POST['phone']);
        $gender = htmlspecialchars($_POST['gender']);
        $dob = htmlspecialchars($_POST['dob']);
        $adr = htmlspecialchars($_POST['adr']);
        $state = htmlspecialchars($_POST['state']);
        $country = htmlspecialchars($_POST['country']);
        $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        if ($fname != "" && $lname != "" && $email != "" && $dob != "" && $phone != "" && $adr != "" && $state != "" && $country != "") {
            $check_img = mysqli_query($con, "SELECT * FROM users where id='$id'");
            $fetch_check = mysqli_fetch_array($check_img);
            // Valid extension
            $valid_ext = array('png', 'jpeg', 'jpg');
            // Location
            $location = "../../assets/img/" . $image;
            // file extension
            $file_extension = pathinfo($location, PATHINFO_EXTENSION);
            $file_extension = strtolower($file_extension);
            if ($file_extension != "") {
                if (in_array($file_extension, $valid_ext)) {
                    $scan_image = $fetch_check['img'];
                    $file_path = "../../assets/img/";
                    $image_handle = opendir($file_path);
                    while ($image_file = readdir($image_handle)) {
                        if ($image_file == $scan_image) {
                            unlink($file_path . "/" . $image_file);
                        }
                    }
                    closedir($image_handle);
                }
                if ($file_extension == "png") {
                    $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
                } else {
                    if (in_array($file_extension, $valid_ext)) {
                        // Compress Image
                        compressImage($_FILES['image']['tmp_name'], $location, 20);
                    } else {
                        echo json_encode(array("res" => "format"));
                        exit();
                    }
                }
                $updateimage = mysqli_query($con, "UPDATE `users` SET `img`='$image'  where id='$id' ");
            }
            if ($pswd != "") {
                $password = md5($pswd);
                $update = mysqli_query($con, "UPDATE `users` SET `pswd`='$password' WHERE id='$id'");
            }
            $insert = mysqli_query($con, "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`email`='$email',`phone`='$phone',`gender`='$gender',`dob`='$dob',`adress`='$adr',`state`='$state',`country`='$country' WHERE  id='$id'");
            if ($insert) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        } else {
            echo json_encode(array("res" => "fillform"));
        }
        break;
    case 'gallery':
        $id = htmlspecialchars($_POST['id']);
        $select = mysqli_query($con, "SELECT * FROM `gallery` WHERE gid='$id'");
        $fetch = mysqli_fetch_array($select);
        $pcat = htmlspecialchars($_POST['cat']);
        $subcat = htmlspecialchars($_POST['subcate']);
        $cate = ($subcat != 0) ? $subcat : $pcat;
        $video = $_FILES['video']['name'];
        $youtube = $_POST['youtube'];
        $type = $_POST["type"];
        $thumbnail = $_FILES['thumbnail']['name'];
        $image = $_FILES['image']['name'];
        $valid_ext = array('png', 'jpeg', 'jpg');
        if ($cate != "") {
            if ($thumbnail == "" && $video == "" && $youtube == "") {
                $image = "";
                $extimg = "";
                if ($_FILES['image']['name'] != "") {
                    if (file_exists("../../uploads/gallery/" . $fetch["video_or_img"])) {
                        unlink("../../uploads/gallery/" . $fetch["video_or_img"]);
                    }
                    $image = $_FILES['image']['name'];
                    $imagetmp2 = $_FILES['image']['tmp_name'];
                    $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
                    $extimg = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $path_image = "../../uploads/gallery/" . $image;
                    if ($extimg == "png") {
                        $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
                    } else {
                        if (in_array($extimg, $valid_ext)) {
                            // Compress Image
                            compressImage($_FILES['image']['tmp_name'], $path_image, 25);
                        } else {
                            echo json_encode(array("res" => "format"));
                            exit();
                        }
                    }
                } else {
                    $image = $fetch["video_or_img"];
                    $extimg = $fetch["type"];
                }
                $insert = mysqli_query($con, "UPDATE `gallery` SET `video_or_img`='$image',`type`='$type',`thumbnail`='',`cate_id`='$cate' WHERE `gid`='$id'");
                if ($insert) {
                    echo json_encode(array("res" => "success"));
                } else {
                    echo json_encode(array("res" => "databasewrong"));
                }
            } elseif ($image == ""  && ($video != "" || $thumbnail != "") && $youtube == "") {
                $video = "";
                $extvideo = "";
                $thumbnail = "";
                if ($_FILES["video"]["name"] != "") {
                    if (file_exists("../../uploads/gallery/" . $fetch["video_or_img"])) {
                        unlink("../../uploads/gallery/" . $fetch["video_or_img"]);
                    }
                    $imagetmp = $_FILES['video']['tmp_name'];
                    $video = date('dmYHis') . str_replace(" ", "", basename($_FILES["video"]["name"]));
                    $uploadfile = move_uploaded_file($imagetmp, "../../uploads/gallery/" . $video);
                    $extvideo = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
                } else {
                    $video = $fetch["video_or_img"];
                    $extvideo = $fetch["type"];
                }
                if ($_FILES['thumbnail']['name'] != "") {
                    if (file_exists("../../uploads/gallery/" . $fetch["thumbnail"])) {
                        unlink("../../uploads/gallery/" . $fetch["thumbnail"]);
                    }
                    $thumbnail = $_FILES['thumbnail']['name'];
                    $imagetmp1 = $_FILES['thumbnail']['tmp_name'];
                    $thumbnail = date('dmYHis') . str_replace(" ", "", basename($_FILES["thumbnail"]["name"]));
                    $exttumb = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
                    $path_image = "../../uploads/gallery/" . $thumbnail;
                    if ($exttumb == "png") {
                        $fileupload = move_uploaded_file($imagetmp1, $path_image);
                    } else {
                        if (in_array($exttumb, $valid_ext)) {
                            // Compress Image
                            compressImage($imagetmp1, $path_image, 25);
                        } else {
                            echo json_encode(array("res" => "format"));
                            exit();
                        }
                    }
                } else {
                    $thumbnail = $fetch["thumbnail"];
                }
                $insert = mysqli_query($con, "UPDATE `gallery` SET `video_or_img`='$video',`type`='$type',`thumbnail`='$thumbnail',`cate_id`='$cate' WHERE `gid`='$id'");
                if ($insert) {
                    echo json_encode(array("res" => "success"));
                } else {
                    echo json_encode(array("res" => "databasewrong"));
                }
            } elseif ($image == "" && $thumbnail == "" && $video == "" && $youtube != "") {
                $youtube = str_replace("https://youtu.be/", "https://www.youtube.com/embed/", $youtube);
                $insert = mysqli_query($con, "UPDATE `gallery` SET `video_or_img`='$youtube',`type`='$type',`cate_id`='$cate' WHERE `gid`='$id'");
                if ($insert) {
                    echo json_encode(array("res" => "success"));
                } else {
                    echo json_encode(array("res" => "databasewrong"));
                }
            } else {
                $insert = mysqli_query($con, "UPDATE `gallery` SET `cate_id`='$cate' WHERE gid='$id'");
                if ($insert) {
                    echo json_encode(array("res" => "success"));
                } else {
                    echo json_encode(array("res" => "databasewrong"));
                }
            }
        }
        break;
    case 'profile':
        $id = htmlspecialchars($_POST['id']);
        $firstname = htmlspecialchars($_POST['fname']);
        $lastname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        // $password = htmlspecialchars($_POST['pswd']);
        $gender = htmlspecialchars($_POST['gender']);
        $phone = htmlspecialchars($_POST['phone']);
        $dob = htmlspecialchars($_POST['dob']);
        $adr = htmlspecialchars($_POST['adress']);
        $country = htmlspecialchars($_POST['country']);
        // $description = base64_encode($_POST['description']);
        if ($firstname != "" && $lastname != "" && $email != "" && $gender != "" && $dob != "" && $phone != "" && $adr != "") {
            $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["profile"]["name"]));
            $picture_type = str_replace("", "", basename($_FILES["profile"]["type"]));
            $path_picture = "../../uploads/users/" . $image;
            $selectUser = mysqli_query($con, "SELECT * FROM users where id='$id'");
            $fetch_check = mysqli_fetch_array($selectUser);
            if ($picture_type != "") {
                $path_pix = "../../uploads/users/" . $image;
                $scan_pix = $fetch_check['profile'];
                $file_path = "../../uploads/users/";
                $pix_handle = opendir($file_path);
                while ($pix_file = readdir($pix_handle)) {
                    if ($pix_file == $scan_pix) {
                        unlink($file_path . "/" . $pix_file);
                    }
                }
                closedir($pix_handle);
                if (!imagecheck($picture_type)) {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
                mysqli_query($con, "UPDATE `users` SET `profile`='$image'  where id='$id' ");
                move_uploaded_file($_FILES["profile"]["tmp_name"], $path_picture);
            }
            $cover = date('dmYHis') . str_replace(" ", "", basename($_FILES["cover"]["name"]));
            $picture_type = str_replace("", "", basename($_FILES["cover"]["type"]));
            $path_picture = "../../uploads/users/" . $cover;
            $selectUser = mysqli_query($con, "SELECT * FROM users where id='$id'");
            $fetch_check = mysqli_fetch_array($selectUser);
            if ($picture_type != "") {
                $path_pix = "../../uploads/users/" . $cover;
                $scan_pix = $fetch_check['cover'];
                $file_path = "../../uploads/users/";
                $pix_handle = opendir($file_path);
                while ($pix_file = readdir($pix_handle)) {
                    if ($pix_file == $scan_pix) {
                        unlink($file_path . "/" . $pix_file);
                    }
                }
                closedir($pix_handle);
                if (!imagecheck($picture_type)) {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
                mysqli_query($con, "UPDATE `users` SET `cover`='$cover'  where id='$id' ");
                move_uploaded_file($_FILES["cover"]["tmp_name"], $path_picture);
            }
            // if ($password != "") {
            //     $password = md5($password);
            //     $update = mysqli_query($con, "UPDATE `users` SET `pswd`='$password' WHERE id='$id'");
            // }
            $update = mysqli_query($con, "UPDATE `users` SET `fname`='$firstname',`lname`='$lastname',`email`='$email',`gender`='$gender',`phone`='$phone',`dob`='$dob',`adress` = '$adr',`country`='$country' WHERE id='$id'");
            if ($update) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        } else {
            echo json_encode(array("res" => "fillform"));
        }
        break;
    case 'gallery-cate':
        $id = htmlspecialchars($_POST['id']);
        $cate = htmlspecialchars($_POST['cat']);
        $cat_link = htmlspecialchars($_POST['cat_link']);
        $cat_parent = htmlspecialchars($_POST['cat_parent']);
        $insert = mysqli_query($con, "UPDATE `gallery_category` SET `category`='$cate',`parent`='$cat_parent',`link`='$cat_link' WHERE id='$id'");
        if ($insert) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'fuserprofile':
        $id = htmlspecialchars($_POST['id']);
        $firstname = htmlspecialchars($_POST['fname']);
        $lastname = htmlspecialchars($_POST['lname']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['pswd']);
        $gender = htmlspecialchars($_POST['gender']);
        $phone = htmlspecialchars($_POST['phone']);
        $dob = htmlspecialchars($_POST['dob']);
        $adr = htmlspecialchars($_POST['adr']);
        $state = htmlspecialchars($_POST['state']);
        $country = htmlspecialchars($_POST['country']);
        $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        $check_img = mysqli_query($con, "SELECT * FROM users where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        // Location
        $location = "../../assets/img/" . $image;
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        if ($file_extension != "") {
            if (in_array($file_extension, $valid_ext)) {
                $scan_image = $fetch_check['img'];
                $file_path = "../../assets/img/";
                $image_handle = opendir($file_path);
                while ($image_file = readdir($image_handle)) {
                    if ($image_file == $scan_image) {
                        unlink($file_path . "/" . $image_file);
                    }
                }
                closedir($image_handle);
            }
            if ($file_extension == "png") {
                $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $location);
            } else {
                if (in_array($file_extension, $valid_ext)) {
                    // Compress Image
                    compressImage($_FILES['image']['tmp_name'], $location, 20);
                } else {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
            }
            $updateimage = mysqli_query($con, "UPDATE `users` SET `img`='$image'  where id='$id' ");
        }
        if ($password != "") {
            $password = md5($password);
            $update = mysqli_query($con, "UPDATE `users` SET `pswd`='$password' WHERE id='$id'");
        }
        $update = mysqli_query($con, "UPDATE `users` SET `fname`='$firstname',`lname`='$lastname',`email`='$email',`gender`='$gender',`phone`='$phone',`dob`='$dob',`adress`='$adr',`state`='$state',`country`='$country' WHERE id='$id'");
        if ($update) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'frontupdate':
        $id = htmlspecialchars($_POST['id']);
        $firstname = htmlspecialchars($_POST['ufname']);
        $lastname = htmlspecialchars($_POST['ulname']);
        $email = htmlspecialchars($_POST['uemail']);
        $password = htmlspecialchars($_POST['upswd']);
        $phone = htmlspecialchars($_POST['uphone']);
        $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["uimage"]["name"]));
        $check_img = mysqli_query($con, "SELECT * FROM users where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        // Location
        $location = "../../uploads/users/" . $image;
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        if ($file_extension != "") {
            if (in_array($file_extension, $valid_ext)) {
                $scan_image = $fetch_check['profile'];
                $file_path = "../../uploads/users/";
                $image_handle = opendir($file_path);
                while ($image_file = readdir($image_handle)) {
                    if ($image_file == $scan_image) {
                        unlink($file_path . "/" . $image_file);
                    }
                }
                closedir($image_handle);
            }
            if ($file_extension == "png") {
                $fileupload = move_uploaded_file($_FILES["uimage"]["tmp_name"], $location);
            } else {
                if (in_array($file_extension, $valid_ext)) {
                    // Compress Image
                    compressImage($_FILES['uimage']['tmp_name'], $location, 20);
                } else {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
            }
            $updateimage = mysqli_query($con, "UPDATE `users` SET `profile`='$image'  where id='$id' ");
        }
        if ($password != "") {
            $password = md5($password);
            $update = mysqli_query($con, "UPDATE `users` SET `pswd`='$password' WHERE id='$id'");
        }
        $update = mysqli_query($con, "UPDATE `users` SET `fname`='$firstname',`lname`='$lastname',`email`='$email',`phone`='$phone' WHERE id='$id'");
        if ($update) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'blockk':
        // echo "sdf";
        $id = htmlspecialchars($_POST['id']);
        $status = htmlspecialchars($_POST['block']);
        if ($status == "0") {
            $q = mysqli_query($con, "UPDATE `plans` SET `block`='1' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Block Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        } elseif ($status == "1") {
            $q = mysqli_query($con, "UPDATE `plans` SET `block`='0' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Unblock Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        }
        break;
    case 'status':
        // echo "sdf";
        $id = htmlspecialchars($_POST['id']);
        $status = htmlspecialchars($_POST['status']);
        if ($status == "0") {
            $q = mysqli_query($con, "UPDATE `plans` SET `status`='1' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Active Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        } elseif ($status == "1") {
            $q = mysqli_query($con, "UPDATE `plans` SET `status`='0' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Unactive Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        }
        break;
    case 'stu-status':
        // echo "sdf";
        $id = htmlspecialchars($_POST['id']);
        $status = htmlspecialchars($_POST['status']);
        if ($status == "0") {
            $q = mysqli_query($con, "UPDATE `student_plan` SET `status`='1' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Active Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        } elseif ($status == "1") {
            $q = mysqli_query($con, "UPDATE `student_plan` SET `status`='0' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Unactive Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        }
        break;
    case 'servicestatus':
        $id = htmlspecialchars($_POST['id']);
        $status = htmlspecialchars($_POST['status']);
        if ($status == "0") {
            $q = mysqli_query($con, "UPDATE `service` SET `status`='1' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Active Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        } elseif ($status == "1") {
            $q = mysqli_query($con, "UPDATE `service` SET `status`='0' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Unactive Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        }
        break;
    case 'userstatus':
        // echo "sdf";
        $id = htmlspecialchars($_POST['id']);
        $status = htmlspecialchars($_POST['status']);
        if ($status == "0") {
            $q = mysqli_query($con, "UPDATE `users` SET `status`='1' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Active Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        } elseif ($status == "1") {
            $q = mysqli_query($con, "UPDATE `users` SET `status`='0' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Deactive Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        }
        break;
    case 'studio-status':
        // echo "sdf";
        $id = htmlspecialchars($_POST['id']);
        $status = htmlspecialchars($_POST['status']);
        if ($status == "0") {
            $q = mysqli_query($con, "UPDATE `add_studio` SET `status`='1' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Active Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        } elseif ($status == "1") {
            $q = mysqli_query($con, "UPDATE `add_studio` SET `status`='0' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Status Deactive Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        }
        break;
    case 'studio-verify':
        // echo "sdf";
        $id = htmlspecialchars($_POST['id']);
        $verify = htmlspecialchars($_POST['verify']);
        if ($verify == "0") {
            $q = mysqli_query($con, "UPDATE `add_studio` SET `verified`='1' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Studio Verified Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        } elseif ($verify == "1") {
            $q = mysqli_query($con, "UPDATE `add_studio` SET `verified`='0' WHERE id='$id'");
            if ($q) {
                echo json_encode(array("res" => "success", "msg" => "Studio Unverify Successfully!"));
            } else {
                echo json_encode(array("res" => "danger", "msg" => "Error In Your Query!"));
            }
        }
        break;
    case 'slider':
        $id = $_POST["id"];
        $name = mysqli_real_escape_string($con, htmlspecialchars($_POST["name"]));
        $description = mysqli_real_escape_string($con, base64_encode($_POST["description"]));
        $cover = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
        $picture_type = str_replace("", "", basename($_FILES["image"]["type"]));
        $path_picture = "../../uploads/slider/" . $cover;
        $selectUser = mysqli_query($con, "SELECT * FROM slider where id='$id'");
        $fetch_check = mysqli_fetch_array($selectUser);
        if ($picture_type != "") {
            $path_pix = "../../uploads/slider/" . $cover;
            $scan_pix = $fetch_check['image'];
            $file_path = "../../uploads/slider/";
            $pix_handle = opendir($file_path);
            while ($pix_file = readdir($pix_handle)) {
                if ($pix_file == $scan_pix) {
                    unlink($file_path . "/" . $pix_file);
                }
            }
            closedir($pix_handle);
            if (!imagecheck($picture_type)) {
                echo json_encode(array("res" => "format"));
                exit();
            }
            mysqli_query($con, "UPDATE `slider` SET `image`='$cover'  where id='$id' ");
            move_uploaded_file($_FILES["image"]["tmp_name"], $path_picture);
        }
        $update = mysqli_query($con, "UPDATE `slider` SET `heading`='$name',`description`='$description' WHERE id='$id'");
        if ($update) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'setting':
        if ($_POST["id"] != "") {
            $id = $_POST["id"];
            $website_header_logo = "";
            $website_footer_logo = "";
            $website_favicon = "";
            $website_short_desc = mysqli_real_escape_string($con, base64_encode($_POST["website_short_desc"]));
            $website_name = mysqli_real_escape_string($con, htmlspecialchars($_POST["website_name"]));
            $website_email = mysqli_real_escape_string($con, htmlspecialchars($_POST["website_email"]));
            $website_phone = mysqli_real_escape_string($con, htmlspecialchars($_POST["website_phone"]));
            $website_domain = mysqli_real_escape_string($con, htmlspecialchars($_POST["website_domain"]));

            $website_address = mysqli_real_escape_string($con, htmlspecialchars($_POST["website_address"]));
            if ($_FILES["website_header_logo"]["name"] != "") {
                $website_header_logo = "header-logo.png";
                move_uploaded_file($_FILES["website_header_logo"]["tmp_name"], "../../uploads/settings/" . $website_header_logo);
            } else {
                $website_header_logo = $settinginfo["website_header_logo"];
            }
            if ($_FILES["website_footer_logo"]["name"] != "") {
                $website_footer_logo = "footer-logo.png";
                move_uploaded_file($_FILES["website_footer_logo"]["tmp_name"], "../../uploads/settings/" . $website_footer_logo);
            } else {
                $website_footer_logo = $settinginfo["website_footer_logo"];
            }
            if ($_FILES["website_favicon"]["name"] != "") {
                $website_favicon = "favicon.png";
                move_uploaded_file($_FILES["website_favicon"]["tmp_name"], "../../uploads/settings/" . $website_favicon);
            } else {
                $website_favicon = $settinginfo["website_favicon"];
            }
            $update = mysqli_query($con, "UPDATE `settings` SET `webiste_name`='$website_name',`website_favicon`='$website_favicon',`website_footer_logo`='$website_footer_logo',`website_header_logo`='$website_header_logo',`website_address`='$website_address',`website_email`='$website_email',`website_phone`='$website_phone',`website_short_desc`='$website_short_desc',`website_domain`='$website_domain' WHERE id='$id'");
            if ($update) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        }
        break;
    case 'social_media':
        if ($_POST["id"] != "") {
            $id = $_POST["id"];
            $fb_link = mysqli_real_escape_string($con, htmlspecialchars($_POST["fb_link"]));
            $instagram_link = mysqli_real_escape_string($con, htmlspecialchars($_POST["instagram_link"]));
            $twitter_link = mysqli_real_escape_string($con, htmlspecialchars($_POST["twitter_link"]));
            $linkedin_link = mysqli_real_escape_string($con, htmlspecialchars($_POST["linkedin_link"]));
            $youtube_link = mysqli_real_escape_string($con, htmlspecialchars($_POST["youtube_link"]));
            $update = mysqli_query($con, "UPDATE `social_media` SET `fb_link`='$fb_link',`instagram_link`='$instagram_link',`twitter_link`='$twitter_link',`linkedin_link`='$linkedin_link',`youtube_link`='$youtube_link' WHERE `id`='$id'");
            if ($update) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        }
        break;
    case 'seo':
        if ($_POST["id"] != "") {
            $id = $_POST["id"];
            $title = mysqli_real_escape_string($con, htmlspecialchars($_POST["title"]));
            $link = mysqli_real_escape_string($con, htmlspecialchars($_POST["page_link"]));
            $descc = base64_encode($_POST["descc"]);
            $update = mysqli_query($con, "UPDATE `website_seo` SET `title`='$title',`link`='$link',`description`='$descc' WHERE `id`='$id'");
            if ($update) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        }
        break;
    case 'category':
        if ($_POST["id"] != "") {
            $id = $_POST["id"];
            $name = mysqli_real_escape_string($con, htmlspecialchars($_POST["name"]));
            $link = mysqli_real_escape_string($con, htmlspecialchars($_POST["link"]));
            $status = htmlspecialchars($_POST['status']);
            $parent = htmlspecialchars($_POST['parent']);
            $description = base64_encode($_POST['description']);
            $image = date('dmYHis') . str_replace(" ", "", basename($_FILES["image"]["name"]));
            $picture_type = str_replace("", "", basename($_FILES["image"]["type"]));
            $path_picture = "../../uploads/category/" . $image;
            $selectUser = mysqli_query($con, "SELECT * FROM category where id='$id'");
            $fetch_check = mysqli_fetch_array($selectUser);
            if ($picture_type != "") {
                $path_pix = "../../uploads/category/" . $image;
                $scan_pix = $fetch_check['img'];
                $file_path = "../../uploads/category/";
                $pix_handle = opendir($file_path);
                while ($pix_file = readdir($pix_handle)) {
                    if ($pix_file == $scan_pix) {
                        unlink($file_path . "/" . $pix_file);
                    }
                }
                closedir($pix_handle);
                if (!imagecheck($picture_type)) {
                    echo json_encode(array("res" => "format"));
                    exit();
                }
                mysqli_query($con, "UPDATE `blog` SET `img`='$image'  where id='$id'  ");
                move_uploaded_file($_FILES["image"]["tmp_name"], $path_picture);
            }
            $update = mysqli_query($con, "UPDATE `category` SET `name`='$name',`link`='$link',`status`='$status',`parent`='$parent',`description` = '$description' ,`img` = '$image' WHERE `id`='$id'");
            if ($update) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        }
        break;
    case 'slider_category':
        $id = $_POST["id"];
        $cate = mysqli_real_escape_string($con, htmlspecialchars($_POST["cate"]));
        $update = mysqli_query($con, "UPDATE `slider_cate` SET `cate_id`='$cate' WHERE `id`='$id'");
        if ($update) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'navigation':
        if ($_POST["id"] != "") {
            $id = $_POST["id"];
            $name = mysqli_real_escape_string($con, htmlspecialchars($_POST["name"]));
            $link = mysqli_real_escape_string($con, htmlspecialchars($_POST["link"]));
            $status = htmlspecialchars($_POST['status']);
            $parent = htmlspecialchars($_POST['parent']);
            $update = mysqli_query($con, "UPDATE `navigation` SET `name`='$name',`link`='$link',`status`='$status',`parent`='$parent' WHERE `id`='$id'");
            if ($update) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
        }
        break;
    case 'blockword':
        $id = $_POST["id"];
        $word = htmlspecialchars($_POST['word']);
        $insert = mysqli_query($con, "UPDATE `blockword` SET `word`='$word' WHERE `id`='$id'");
        if ($insert) {
            $data = array("res" => "success", "msg" => "Block Words Update Successfully!");
        } else {
            $data = array("res" => "danger", "msg" => "Error In Query!");
        }
        echo json_encode($data);
        break;
    case 'feedback':
        $user_id = $_POST["user_id"];
        $invoice_id = $_POST["invoice_id"];
        $star =  htmlspecialchars($_POST["rate"]);
        $comment = htmlspecialchars($_POST['message']);
        $update = mysqli_query($con, "UPDATE `invoices` SET `review` = '$comment',`star`='$star' WHERE `invoice_id` = '$invoice_id'");
        if ($update) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    default:
        // code...
        break;
}
if (isset($_POST['sortable'])) {
    extract($_POST);
    extract($_FILES);
    switch ($pagename) {
        case 'services':
            foreach ($_POST['positions'] as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                mysqli_query($con, "UPDATE services SET sorting = '$newPosition' WHERE id='$index'");
            }
            echo ("success");
            break;
        case 'products-list':
            foreach ($_POST['positions'] as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                mysqli_query($con, "UPDATE products SET sorting = '$newPosition' WHERE id='$index'");
            }
            echo ("success");
            break;
    }
}