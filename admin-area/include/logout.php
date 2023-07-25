<?php 
include_once "../../include/connection.php";
session_destroy();
header("location: ".$url."admin-area/login");
?>