<?php
@session_start();
@session_regenerate_id();
// $con = mysqli_connect('localhost', 'root', '', 'secure_your_life') or die('Database Not Connected');
$con = mysqli_connect('localhost', 'u687501660_kw_services', ']PLxYVuc7', 'u687501660_kw_services') or die('Database Not Connected');
// Base Url GET
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . "/";
// IP Address
$ip = $_SERVER['REMOTE_ADDR'];
// PAGE NAME GET
$mypage = basename($_SERVER['PHP_SELF'], ".php");
// SETTING GET
$settingquery = mysqli_query($con, "SELECT * FROM `settings`");
$settinginfo = mysqli_fetch_array($settingquery);
// SEO GET 
$seoquery = mysqli_query($con, "SELECT * FROM `website_seo` WHERE `link`='$mypage'");
$seoinfo = mysqli_fetch_array($seoquery);
// SOCIAL MEDIA GET 
$socialquery = mysqli_query($con, "SELECT * FROM `social_media`");
$socialinfo = mysqli_fetch_array($socialquery);
define("CONNECT_EMAIL_CLIENT","noreply@secureyourlife.com");