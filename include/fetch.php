<?php
include_once "connection.php";
switch ($_GET['page']) {
  case 'content':
    $id = htmlspecialchars($_POST['id']);
    $selectContent = mysqli_query($con, "SELECT * FROM contents where id='$id'");
    $fetchContent = mysqli_fetch_array($selectContent);
    $eng = base64_decode($fetchContent['content']);
    echo " 
       <input type='hidden' id='$id' class='contentid' name='id' >
       <div class='form-group mb-3'>
       <label class='text-dark' style='font-size:17px'>Content</label>
       <textarea name='eng_content'  id='eng_content' class='form-control' rows='3' cols='30'>$eng</textarea>
       </div>";
    break;
  case 'image':
    $id = htmlspecialchars($_POST['id']);
    $check_email = mysqli_query($con, "SELECT * from page_image where id='$id'");
    $fetch = mysqli_fetch_array($check_email);
    if (mysqli_num_rows($check_email) > 0) {
      $data = array("img" => "uploads/front/" . $fetch['image']);
    } else {
      $data = array("result" => "wrong");
    }
    echo json_encode($data);
    break;
  default:
    // code...
    break;
}
?>