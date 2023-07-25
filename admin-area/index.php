<?php
$pagename = "Home";
include_once "header.php";
?>
<style>
    .net-card h2 {
        border-bottom: 3px solid;
        padding-bottom: 5px;
    }
    .net-card {
        padding: 20px;
        border-radius: 16px;
        color: #fff;
        height: 150px;
        display: flex;
        background-image: linear-gradient(209deg, #9eb1f3, #115974);
        flex-direction: column;
        justify-content: space-between;
        margin: 20px 0;
        box-shadow: 0px 2px 20px #d5d5d5;
    }
    h4.count {
        color: #ffffff;
        filter: drop-shadow(2px 4px 13px #000);
        font-weight: 900;
        font-size: 30px;
    }
    .chart_data_left .card-body .chart-main .media .media-body .right-chart-content {
        margin-left: 0px;
    }
    .pl-navs-inline {
        padding-left: 0px !important;
    }
    .net-card h2 {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        /* number of lines to show */
        -webkit-box-orient: vertical
    }
</style>
<!--  BEGIN MAIN CONTAINER  -->
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <a href="orders">
                    <div class="net-card">
                        <h2 class="text-white d-flex justify-content-between" style="font-size: 20px;">
                           Welcome Back Admin
                        </h2>
                    </div>
                </a>
            </div>
        
<?php
include_once "footer.php";
?>