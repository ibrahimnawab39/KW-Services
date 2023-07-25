<?php
include "../../include/connection.php";
switch ($_GET['page']) {
    case 'manual-orders':
        $id = htmlentities(@mysqli_real_escape_string($con, $_POST['id']));
        $selectUser = mysqli_query($con, "SELECT * FROM manual_orders where id='$id'");
        $fetch_check = mysqli_fetch_array($selectUser);
        $scan_pix = $fetch_check['requirements'];

        $file_path = "../../uploads/requremint/" . $scan_pix;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $delete = mysqli_query($con, "DELETE FROM `manual_orders` WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'testimonial':
        $id = htmlentities(@mysqli_real_escape_string($con, $_POST['id']));
        $selectUser = mysqli_query($con, "SELECT * FROM testimonials where id='$id'");
        $fetch_check = mysqli_fetch_array($selectUser);
        $scan_pix = $fetch_check['image'];

        $file_path = "../../uploads/testimonials/" . $scan_pix;
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $delete = mysqli_query($con, "DELETE FROM `testimonials` WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'user':
        $id = htmlspecialchars($_POST['id']);
        // $check_img = mysqli_query($con, "SELECT * FROM users where id='$id'");
        // $fetch_check = mysqli_fetch_array($check_img);
        // $scan_image = $fetch_check['img'];
        // $file_path = "../../uploads/users/";
        // $image_handle = opendir($file_path);
        // while ($image_file = readdir($image_handle)) {
        //     if ($image_file == $scan_image) {
        //         unlink($file_path . "/" . $image_file);
        //     }
        // }
        // closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `users`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'slider-categories':
        $id = htmlspecialchars($_POST['id']);
        $delete = mysqli_query($con, "DELETE FROM `slider_cate`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'countries':
        $id = htmlspecialchars($_POST['id']);

        $delete = mysqli_query($con, "DELETE FROM `countries`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'expert':
        $id = htmlspecialchars($_POST['id']);
        // $check_img = mysqli_query($con, "SELECT * FROM users where id='$id'");
        // $fetch_check = mysqli_fetch_array($check_img);
        // $scan_image = $fetch_check['img'];
        // $file_path = "../../uploads/users/";
        // $image_handle = opendir($file_path);
        // while ($image_file = readdir($image_handle)) {
        //     if ($image_file == $scan_image) {
        //         unlink($file_path . "/" . $image_file);
        //     }
        // }
        // closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `users`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'musicians':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM users where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $file_path = "../../uploads/users/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `users`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'artists':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM users where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $file_path = "../../assets/img/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `users`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'creaters':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM users where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $file_path = "../../assets/img/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `users`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'creater-plans':
        $id = htmlspecialchars($_POST['id']);

        $delete = mysqli_query($con, "DELETE FROM `creater_pkg`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'featured-works':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM featured_work where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $file_path = "../../assets/img/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `featured_work`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'tutorials':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM tutorials where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $scan_video = $fetch_check['video'];
        $file_path = "../../uploads/tutorials/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
            if ($image_file == $scan_video) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `tutorials`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'blogs':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM blog where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['image'];
        $file_path = "../../uploads/blog/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `blog`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'about':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM about where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $file_path = "../../assets/img/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `about`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'gallery-detail':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM gallery where gid='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $file_path = "../../uploads/gallery/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `gallery`  WHERE gid='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'services':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM services where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['image'];
        $icon = $fetch_check['icon'];
        $banner_image = $fetch_check['banner_image'];
        $file_path = "../../uploads/service/";
        $file_path_icon = "../../uploads/service/icon/";
        $file_path_banner = "../../uploads/service/banner/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);

        $image_handle_icon = opendir($file_path_icon);
        while ($image_file_icon = readdir($image_handle_icon)) {
            if ($image_file_icon == $icon) {
                unlink($file_path_icon . "/" . $image_file_icon);
            }
        }
        closedir($image_handle_icon);
        $image_handle_banner = opendir($file_path_banner);
        while ($image_file_banner = readdir($image_handle_banner)) {
            if ($image_file_banner == $banner_image) {
                unlink($file_path_banner . "/" . $image_file_banner);
            }
        }
        closedir($image_handle_banner);
        $delete = mysqli_query($con, "DELETE FROM `services`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
        case 'portfolios':
            $id = htmlspecialchars($_POST['id']);
            $check_img = mysqli_query($con, "SELECT * FROM protfolios where id='$id'");
            $fetch_check = mysqli_fetch_array($check_img);
            $scan_portfolio_gallery = $fetch_check['portfolio_gallery'];
            $portfolio_thumbnail = $fetch_check['portfolio_thumbnail'];
            $file_path = "../../uploads/portfolio/image/";
            $file_path_icon = "../../uploads/portfolio/thumbnail/";
            $image_handle = opendir($file_path);
            while ($image_file = readdir($image_handle)) {
                if ($image_file == $scan_portfolio_gallery) {
                    unlink($file_path . "/" . $image_file);
                }
            }
            closedir($image_handle);
    
            $image_handle_icon = opendir($file_path_icon);
            while ($image_file_icon = readdir($image_handle_icon)) {
                if ($image_file_icon == $portfolio_thumbnail) {
                    unlink($file_path_icon . "/" . $image_file_icon);
                }
            }
            closedir($image_handle_icon);
            $delete = mysqli_query($con, "DELETE FROM `protfolios`  WHERE id='$id'");
            if ($delete) {
                echo json_encode(array("res" => "success"));
            } else {
                echo json_encode(array("res" => "databasewrong"));
            }
            break;
    case 'packages':
        $id = htmlspecialchars($_POST['id']);

        $delete = mysqli_query($con, "DELETE FROM `packages`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'packages-category-list':
        $id = htmlspecialchars($_POST['id']);

        $delete = mysqli_query($con, "DELETE FROM `package_category`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'portfolio-category-list':
        $id = htmlspecialchars($_POST['id']);

        $delete = mysqli_query($con, "DELETE FROM `portfolio_category`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'gallery-categories':
        $id = htmlspecialchars($_POST['id']);
        $delete = mysqli_query($con, "DELETE FROM `gallery_category`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'cate':
        $id = htmlspecialchars($_POST['id']);
        $delete = mysqli_query($con, "DELETE FROM `studio_category`  WHERE cate_id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'reviews':
        $id = htmlspecialchars($_POST['id']);
        $delete = mysqli_query($con, "DELETE FROM `review`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'teams':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM team where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $file_path = "../../uploads/team/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `team`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'what-we-do':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM what_we_do where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['image'];
        $file_path = "../../uploads/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `what_we_do`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'why-choose-us':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM why_choose_us where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['image'];
        $file_path = "../../uploads/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `why_choose_us`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'upcomoing-videos':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM upcoming_videos where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        if ($fetch_check['type'] == 'video') {
            $scan_video = $fetch_check['video'];
        }
        $file_path = "../../uploads/upcoming/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
            if ($fetch_check['type'] == 'video') {
                if ($image_file == $scan_video) {
                    unlink($file_path . "/" . $image_file);
                }
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `why_choose_us`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'service-categories':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM service_category where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['image'];
        $file_path = "../../assets/img/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `service_category`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'plan-categories':
        $id = htmlspecialchars($_POST['id']);


        $delete = mysqli_query($con, "DELETE FROM `plan_category_name`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'students':
        $id = htmlspecialchars($_POST['id']);

        $check_img = mysqli_query($con, "SELECT * FROM student_plan where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_video = $fetch_check['video'];
        $scan_image = $fetch_check['thumbnail'];
        $file_path = "../../uploads/plan/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
            if ($image_file == $scan_video) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);

        $delete = mysqli_query($con, "DELETE FROM `student_plan`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
            mysqli_query($con, "DELETE FROM `student_plan_package`  WHERE student_plan_id='$id'");
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;

    case 'portfolio':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM portfolio where pid='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $file_path = "../../assets/img/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `portfolio`  WHERE pid='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'plans':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM plans where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['image'];
        $scan_video = $fetch_check['video'];
        $file_path = "../../uploads/plan/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
            if ($image_file == $scan_video) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `plans`  WHERE id='$id'");
        $delete = mysqli_query($con, "DELETE FROM `service_package`  WHERE plan_id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;

    case 'categories':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM category where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $file_path = "../../uploads/category/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $delete = mysqli_query($con, "DELETE FROM `category`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;

    case 'navigations':
        $id = htmlspecialchars($_POST['id']);
        $delete = mysqli_query($con, "DELETE FROM `navigation`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;
    case 'seo_list':
        $id = htmlspecialchars($_POST['id']);
        $delete = mysqli_query($con, "DELETE FROM `seo`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;

    case 'most_popular_topics':
        $id = htmlspecialchars($_POST['id']);
        $check_img = mysqli_query($con, "SELECT * FROM blog where id='$id'");
        $fetch_check = mysqli_fetch_array($check_img);
        $scan_image = $fetch_check['img'];
        $file_path = "../../uploads/topics/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        mysqli_query($con, "DELETE FROM `tags` WHERE topic_id = '$id'");
        $delete = mysqli_query($con, "DELETE FROM `blog`  WHERE id='$id'");
        if ($delete) {
            echo json_encode(array("res" => "success"));
        } else {
            echo json_encode(array("res" => "databasewrong"));
        }
        break;

    default:
        // code...
        break;
}
