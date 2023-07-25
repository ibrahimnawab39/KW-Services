<?php
function content($id)
{
    include "connection.php";
    $selectContent = mysqli_query($con, "SELECT * FROM contents where id='$id'");
    $fetchContent = mysqli_fetch_array($selectContent);
    if (isset($_SESSION['user_id'])) {
        return "<span class='content$id'>" .  base64_decode($fetchContent['content']). "</span>" . "<label class='topcorner fa fa-edit content-x cursor ml-2' style='z-index:100;font-size: 14px; '  title='Edit' id='content$id'></label>";
    } else {
        return base64_decode($fetchContent['content']);
    }
}
function img($id)
{
    include "connection.php";
    $selectImg = mysqli_query($con, "SELECT * FROM page_image where id='$id'");
    $fetchContent = mysqli_fetch_array($selectImg);
    if (isset($_SESSION['user_id'])) {
        return array($fetchContent['image'], " image-x cursor", " id='img$id' style=' position:relative; '", "id='img$id'", "image-x cursor");
    } else {
        return array($fetchContent['image'], '', '');
    }
}
