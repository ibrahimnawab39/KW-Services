<?php
include_once "../include/connection.php";
if (!isset($_SESSION["userid"])) {
    echo "<script>window.open('login','_self')</script>";
}
function link_active($page)
{
    if (basename($_SERVER['PHP_SELF'], ".php") == $page) {
        return "data-active='true'";
    }
}
$proselect  = mysqli_query($con, "SELECT * FROM `users` where `id`='1'");
$profetch = mysqli_fetch_array($proselect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?= $settinginfo["webiste_name"] ?> | Admin</title>
    <link rel="icon" type="image/x-icon" href="<?= $url ?>uploads/settings/<?= @$settinginfo['website_favicon'] ?>" />
    <link href="<?= $url ?>backassets/assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="<?= $url ?>backassets/assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?= $url ?>backassets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $url ?>backassets/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?= $url ?>backassets/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="<?= $url ?>backassets/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?= $url ?>backassets/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?= $url ?>backassets/plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="<?= $url ?>backassets/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .tox-notifications-container {
            display: none !important;
        }

        span.select2.select2-container.mb-4.select2-container--default.select2-container--above.select2-container--focus {
            margin-bottom: 0px !important;
        }

        .select2-container--default .select2-selection--multiple {
            padding: 5px 8px !important;
        }

        .select2-container {
            margin-bottom: 0px !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            justify-content: center;
        }

        .badge {
            cursor: pointer;
        }
    </style>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
</head>

<body>
    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">
            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="<?= $url ?>admin">
                        <img src="<?= $url ?>uploads/settings/<?= @$settinginfo['website_favicon'] ?>" style="width: 35px;" alt="logo">
                    </a>
                </li>
                <li class="nav-item theme-text">
                    <a href="<?= $url ?>index.php" class="nav-link"><?= $settinginfo['webiste_name'] ?></a>
                </li>
            </ul>
            <!--<ul class="navbar-item flex-row ml-md-0 ml-auto">
                <li class="nav-item align-self-center search-animated">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <form class="form-inline search-full form-inline search" role="search">
                        <div class="search-bar">
                            <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                        </div>
                    </form>
                </li>
            </ul>-->
            <ul class="navbar-item flex-row ml-md-auto">
                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="<?= $url ?>uploads/users/<?= $profetch['profile'] ?>" alt="">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a class="" href="<?= $url ?>admin-area/include/logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg> Sign Out</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->
    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg></a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>Admin</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>
        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            <nav id="sidebar">
                <div class="shadow-bottom"></div>
                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="index" <?= link_active('index') ?> aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="setting" <?= link_active('setting') ?> aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="13" r="3"></circle>
                                    <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                    <!-- <polyline points="9 22 9 12 15 12 15 22"></polyline> -->
                                </svg>
                                <span>Setting</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="social-setting" <?= link_active('social-setting') ?> aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="76.609px" height="76.609px" viewBox="0 0 76.609 76.609" style="enable-background:new 0 0 76.609 76.609;fill: #506690;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M57.455,16.575c0,1.12,1.121,2.24,2.688,2.24c2.239,0,2.911-0.896,2.911-2.24c0-0.224,0-0.224,0-0.447
                                                c-0.223-0.672-0.896-1.12-1.566-1.568c-0.225,0-0.672-0.224-1.119-0.224C58.799,14.337,57.455,15.232,57.455,16.575z" />
                                            <path d="M62.16,9.183c-0.226-1.344-1.121-2.464-2.24-2.464c-1.121,0-1.793,1.12-1.567,2.464c0.226,1.344,1.119,2.464,2.239,2.464
                                                C61.488,11.647,62.383,10.527,62.16,9.183z" />
                                            <path d="M52.08,25.983l3.808-3.808c2.239,1.792,4.93,2.912,7.841,2.912c6.943,0,12.544-5.601,12.544-12.544
                                                C76.271,5.599,70.672,0,63.728,0c-6.942,0-12.544,5.6-12.544,12.544c0,3.136,1.119,5.823,2.912,7.84l-3.809,3.809
                                                C50.959,24.864,51.631,25.537,52.08,25.983z M65.744,8.511h2.463V6.048h0.896v2.464h2.465v0.896h-2.465v2.465h-0.896V9.407h-2.463
                                                V8.511L65.744,8.511z M60.144,12.767c0-0.224,0-0.448,0.226-0.672c-0.226,0-0.226,0-0.447,0c-1.793,0-3.137-1.344-3.137-2.912
                                                s1.791-2.912,3.584-2.912H64.4l-0.896,0.672H62.16c0.896,0.225,1.344,1.345,1.344,2.464c0,0.896-0.448,1.568-1.121,2.24
                                                c-0.672,0.448-0.896,0.672-0.896,1.12c0,0.448,0.673,1.12,1.12,1.344c1.119,0.672,1.344,1.568,1.344,2.688
                                                c0,1.567-1.344,2.912-4.031,2.912c-2.239,0-4.256-0.896-4.256-2.464s1.791-2.912,4.031-2.912c0.225,0,0.447,0,0.672,0
                                                C60.367,13.664,60.144,13.216,60.144,12.767z" />
                                            <path d="M63.728,51.52c-2.911,0-5.823,1.119-7.841,2.912l-3.807-3.809c-0.449,0.672-1.121,1.118-1.568,1.566l3.809,3.809
                                                c-1.792,2.238-2.912,4.929-2.912,7.841c0,6.943,5.602,12.544,12.545,12.544c6.942,0,12.545-5.601,12.545-12.544
                                                C76.271,56.895,70.672,51.52,63.728,51.52z M60.144,69.664H57.68v-7.841h2.464V69.664z M59.024,60.705L59.024,60.705
                                                c-0.896,0-1.567-0.673-1.567-1.346c0-0.672,0.672-1.344,1.567-1.344s1.567,0.672,1.567,1.344
                                                C60.367,60.256,59.92,60.705,59.024,60.705z M70.224,69.664h-2.912v-4.031c0-1.119-0.447-1.792-1.345-1.792
                                                c-0.672,0-1.119,0.448-1.344,0.896c0,0.227,0,0.449,0,0.673v4.257h-2.688c0,0,0-7.168,0-7.841h2.688v1.12
                                                c0.225-0.447,1.121-1.344,2.465-1.344c1.791,0,3.136,1.119,3.136,3.584V69.664L70.224,69.664z" />
                                            <path d="M24.304,50.625l-3.808,3.809c-2.24-1.793-4.928-2.912-7.84-2.912c-6.944,0-12.544,5.602-12.544,12.543
                                                c0,6.944,5.6,12.545,12.544,12.545c6.943,0,12.544-5.601,12.544-12.545c0-2.912-1.12-5.823-2.912-7.84l3.808-3.809
                                                C25.424,51.743,24.752,51.07,24.304,50.625z M18.033,62.048c0,3.808-2.912,8.063-8.064,8.063c-1.567,0-3.136-0.448-4.256-1.346
                                                c0.224,0,0.448,0,0.672,0c1.344,0,2.464-0.447,3.584-1.119c-1.12,0-2.24-0.896-2.688-2.017c0.224,0,0.447,0,0.447,0
                                                c0.225,0,0.448,0,0.673,0c-1.345-0.226-2.24-1.344-2.24-2.688l0,0c0.448,0.225,0.896,0.447,1.344,0.447
                                                c-0.672-0.447-1.344-1.344-1.344-2.24c0-0.446,0.224-0.896,0.448-1.344c1.344,1.793,3.359,2.912,5.823,2.912
                                                c0-0.226,0-0.447,0-0.672c0-1.568,1.345-2.912,2.912-2.912c0.896,0,1.568,0.447,2.017,0.896c0.672-0.225,1.344-0.448,1.792-0.672
                                                c-0.225,0.672-0.673,1.119-1.345,1.566c0.672,0,1.12-0.225,1.568-0.447c-0.448,0.672-0.896,1.119-1.344,1.344
                                                C18.033,61.823,18.033,61.823,18.033,62.048z" />
                                            <path d="M12.656,25.088c2.912,0,5.823-1.12,7.84-2.912l3.808,3.808c0.448-0.672,1.12-1.119,1.568-1.567l-3.809-3.808
                                                c1.792-2.24,2.912-4.928,2.912-7.84c0-6.944-5.6-12.544-12.544-12.544c-6.943,0-12.319,5.6-12.319,12.544
                                                C0.112,19.487,5.712,25.088,12.656,25.088z M9.744,10.527h1.344V9.183c0-1.792,0.672-2.912,2.912-2.912h1.792v2.24h-1.12
                                                c-0.896,0-0.896,0.224-0.896,0.896v1.12h2.016l-0.224,2.24H13.55v6.272h-2.688v-6.272H9.519v-2.24H9.744z" />
                                            <g>
                                                <path d="M49.617,44.575c-0.226-0.446-0.673-0.673-0.896-0.673c-2.016-0.672-3.807-1.118-5.823-1.791
                                                    c-0.224,0-0.672-0.447-0.672-1.344c0-0.449,0-0.673-0.447-0.673c-0.226,0,0,0-0.226-0.224c-0.223-0.896-0.223-1.345-0.223-1.568
                                                    c0-0.223,0.223-0.225,0.223-0.448c0.673-0.896,0.896-2.239,0.896-2.688c0,0,0.225,0,0.225-0.225
                                                    c0.224-0.448,0.224-0.448,0.224-1.121c0.226-0.446,0.226-1.118-0.224-1.118c-0.225,0.224-0.225,0-0.225-0.448v-2.688
                                                    c0-0.896-0.673-1.567-1.119-1.791c-0.674-0.449-0.896-0.673-1.121-0.673c-0.225-0.224-0.225-0.448,0-0.672
                                                    c0.224-0.223,0.447-0.223,0.447-0.448c0,0,0,0-0.225,0s-1.567,0.226-2.239,0.448c-1.12,0.224-2.24,0.672-3.137,1.345
                                                    c-0.672,0.447-1.12,1.119-1.12,2.017c0,0.446,0,1.791,0,2.688c0,0.226,0,0.448-0.224,0.226c-0.672,0-0.224,0.896-0.224,1.118
                                                    c0,0.448,0.224,0.673,0.447,1.121c0,0.225,0.225,0.225,0.225,0.225c0.224,0.672,0.448,2.016,0.896,2.688
                                                    c0,0,0.225,0.225,0.225,0.448c0,0.448,0,1.12-0.225,1.568c0,0,0,0.225-0.224,0.225c-0.448,0-0.448,0.224-0.448,0.672
                                                    c0,0.672-0.448,1.345-0.672,1.345c-1.12,0.446-4.479,1.567-5.6,1.791c-0.672,0.226-0.896,0.448-1.12,0.672l-1.12,2.688
                                                    c4.479,0,6.72,2.688,11.424,3.584h2.24c4.704-0.672,8.063-3.584,11.2-3.584L49.617,44.575z" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span>Social Media</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="seo_list" <?= link_active('seo_list') ?> aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" style="fill: #506690;" enable-background="new 0 0 512 512">
                                    <g>
                                        <g>
                                            <circle cx="147.2" cy="147.2" r="21" />
                                            <path d="m495,268.7l-251.7-251.7c-5.3-5.3-13.2-7.3-20.4-5.1l-151.5,46c-6.5,2-11.6,7.1-13.6,13.6l-46,151.4c-2.2,7.2-0.2,15 5.1,20.4l251.8,251.7c12.7,11.3 25,3.8 28.9,0l197.4-197.4c8-8 8-20.9 0-28.9zm-211.9,183l-228.6-228.6 39.3-129.3 129.3-39.3 228.6,228.6-168.6,168.6z" />
                                            <path d="m200,166.1c-9.8,9.8-8.6,22.6-1.3,38 5.8,13 5.8,20.4-0.7,26.9-7,7-17.2,6.5-26.3-2.7-6.2-6.2-10-14.1-11.5-20.6l-9.8,5.2c1.2,6.2 6.6,15.4 13.3,22.1 16.4,16.4 33.6,15 44.3,4.3 10.2-10.2 9.9-21.8 2.7-38.1-5.9-13.3-6.9-20.7-0.4-27.2 4.7-4.7 14-6.8 23.5,2.7 6.3,6.3 8.9,13 9.9,16.5l9.8-4.8c-1.3-4.8-4.8-11.6-11.9-18.7-13.8-13.5-30.8-14.4-41.6-3.6z" />
                                            <polygon points="240.2,309.5 247.7,302 217.7,272 242.7,247 269.6,273.9 277,266.5 250.1,239.6 272,217.7 300.5,246.2 308,238.6     270.5,201.2 201.2,270.5   " />
                                            <path d="m277.8,349.4c17.7,17.7 44.9,19.6 68.7-4.3 20.6-20.6 22.8-47.3 3.9-66.3-18.5-18.5-46.6-17.8-68.6,4.2-21,21-22.3,48.1-4,66.4zm64.9-63.7c14.9,14.9 7.7,36.5-6.1,50.3-15.7,15.7-36.8,20.8-51,6.6-14.1-14.1-8.9-35.4 6-50.2 15.2-15.2 36.3-21.5 51.1-6.7z" />
                                        </g>
                                    </g>
                                </svg>
                                <span>Seo</span>
                            </div>
                        </a>
                    </li>

                    <li class="menu">
                        <a href="blogs" <?= link_active('blogs') ?> <?= link_active('blog') ?> aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-aperture">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
                                    <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
                                    <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
                                    <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
                                    <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
                                    <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
                                </svg>
                                <span>Blogs</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="sliders" <?= link_active('slider') ?> <?= link_active('sliders') ?> aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 502.672 502.672" style="enable-background:new 0 0 502.672 502.672;fill: #506690;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <g>
                                                <path style="fill:#506690;" d="M138.29,168.019h258.806v-16.178c0-13.352-10.936-24.267-24.267-24.267H266.011v-14.129
                                                    c0-20.104-16.351-36.39-36.39-36.39h-62.124c-9.707,0-18.831,3.796-25.734,10.699c-6.903,6.903-10.678,15.962-10.678,25.691
                                                    v14.15H24.267C10.915,127.574,0,138.488,0,151.841v216.722l81.581-165.275C91.482,183.161,115.9,168.019,138.29,168.019z
                                                    M155.353,113.445c0-3.214,1.316-6.256,3.581-8.542c2.265-2.33,5.328-3.602,8.542-3.602h62.124
                                                    c6.709,0,12.123,5.436,12.123,12.144v14.15h-86.369V113.445z" />
                                                <path style="fill:#506690;" d="M486.874,192.243H138.29c-13.331,0-29.099,9.793-34.945,21.743L9.599,403.895
                                                    c-5.91,11.929,0.194,21.722,13.525,21.722h348.584c13.331,0,29.121-9.772,34.988-21.722l93.725-189.909
                                                    C506.309,202.036,500.248,192.243,486.874,192.243z" />
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <span>Slider</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="services" <?= link_active('service') ?> <?= link_active('services') ?> aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                                <span>Service</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="packages" <?= link_active('package') ?> <?= link_active('packages') ?> aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                                <span>Service Package</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="testimonials" <?= link_active('testimonial') ?> <?= link_active('testimonials') ?> aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                                <span>Testimonial</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="orders" <?= link_active('orders') ?> aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                    <circle cx="12" cy="8" r="7"></circle>
                                    <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                                </svg>
                                <span>Orders</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!--  END SIDEBAR  -->