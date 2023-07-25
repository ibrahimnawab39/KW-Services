<?php
include_once "connection.php";
switch ($_GET['page']) {
    case 'image':
        $id = htmlspecialchars($_POST['id']);
        $image = strtolower(date('dmYHis') . "-" . str_replace(" ", "-", basename($_FILES["image"]["name"])));
        // Valid extension
        $valid_ext = array('png', 'jpeg', 'jpg');
        // Location
        $location = "../uploads/front/" . $image;
        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        // Check extension
        if ($file_extension == "png") {
            $path_image = "../uploads/front/" . $image;
            $fileupload = move_uploaded_file($_FILES["image"]["tmp_name"], $path_image);
        } else {
            if (in_array($file_extension, $valid_ext)) {
                // Compress Image
                move_uploaded_file($_FILES['image']['tmp_name'], $location);
            } else {
                $data = array("result" => "format");
                echo json_encode($data);
                exit();
            }
        }
        $check_users = mysqli_query($con, "SELECT * FROM page_image where id='$id'");
        $fetch_check = mysqli_fetch_array($check_users);
        $scan_image = $fetch_check['image'];
        $file_path = "../uploads/front/";
        $image_handle = opendir($file_path);
        while ($image_file = readdir($image_handle)) {
            if ($image_file == $scan_image) {
                unlink($file_path . "/" . $image_file);
            }
        }
        closedir($image_handle);
        $updateimage = mysqli_query($con, "UPDATE `page_image` SET `image`='$image'  where id='$id' ");
        $data = array("result" => "true", "img" => $image);
        echo json_encode($data);
        break;
    case 'content':
        $id = htmlspecialchars($_POST['id']);
        $eng_content = base64_encode(($_POST['eng_content']));
        $update = mysqli_query($con, "UPDATE `contents` SET `content`='$eng_content' WHERE id='$id'");
        if ($update) {
            $data = array("result" => "success", "content" => base64_decode($eng_content));
        } else {
            $data = array("result" => "wrong");
        }
        echo json_encode($data);
        break;
    default:
        // code...
        break;
}
