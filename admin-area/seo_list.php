<?php
$pagename = "Seo List";
include_once "header.php";
?>

<div id="content" class="main-content">
    <div class="layout-px-spacing">
         <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
           
            <div class="widget-content widget-content-area">
            <div class="row m-3">
                <div class="align-items-center col-12 col-md-12 col-sm-12 col-xl-12 d-flex justify-content-between flex_columns">
                    <h4><?= $pagename ?> List</h4>
                </div>
              
            </div>
        <table id="zero-config" class="table dt-table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>Sr no</th>
                    <th>Actions</th>
                    <th>Title</th>
                    <th>Page Link</th>
                    <th>Description</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                $count=1;
                $query=mysqli_query($con,"SELECT * FROM `website_seo`");
                while ($row=mysqli_fetch_array($query)) {
                 ?>
                 <tr>
                     <td><?=$count++?></td>
                    <td><a href="seo?edit=<?=base64_encode($row["id"])?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></td>
                     
                     <td><?= @$row["title"]?></td>
                     <td><?= @$row["link"]?></td>
                     <td><?= base64_decode(@$row["description"]) ?></td>
                     
                 </tr>
                 <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<?php
include_once "footer.php";
?>