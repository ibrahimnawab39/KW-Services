<?php
$pagename = "Services";
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
                            <a href="service" class="btn btn-primary float-left">Add New</a>
                            
                        </div>
                    </div>
                    
                    <table id="zero-config" class="table dt-table-hover menu-list" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr no</th>
                                <th>Action</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Heading</th>
                                <th>Banner Title</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            $query = mysqli_query($con, "SELECT * FROM `services` order by sorting asc");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr data-index="<?= $row["id"] ?>" data-position="<?= $row["sorting"] ?>">
                                    <td><span class="fa fa-align-right mr-2 sort-icon"></span><?= $count++ ?></td>
                                    <td>
                                        <a href="service?edit=<?= base64_encode($row["id"]) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg></a> |
                                        <a href="javascript:void(0)" onclick="del('<?= $row['id'] ?>')" data-bs-toggle="modal" data-bs-target="#deletemodal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg></a>
                                    </td>
                                    <td><img src='<?= $url ?>uploads/service/<?= $row['image'] ?>' width='50px'></td>
                                    <td><?= (@$row['title']) ?></td>
                                    <td><?= base64_decode(@$row['heading']) ?></td>
                                    <td><?= base64_decode(@$row['banner_title']) ?></td>
                                    <td>
                                        <?= substr(strip_tags(base64_decode(@$row['description'])), 0, 30); ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary float-right" onclick="saveNewPositions()">Save Sorting Position</button>
                </div>
                <?php
                include_once "footer.php";
                ?>
                <script>
                    $(document).ready(function() {
                        $('.menu-list tbody').sortable({
                            axis: 'y',
                            update: function(event, ui) {
                                $(this).children().each(function(index) {
                                    if ($(this).attr('data-position') != (index + 1)) {
                                        $(this).attr('data-position', (index + 1)).addClass('updated');
                                    }
                                });
                            }
                        });
                    });

                    function saveNewPositions() {
                        var positions = [];
                        $('.updated').each(function() {
                            positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
                            $(this).removeClass('updated');
                        });
                        $.ajax({
                            url: "include/update.php",
                            method: 'POST',
                            data: {
                                sortable: "btn",
                                pagename: "<?= basename($_SERVER['PHP_SELF'], ".php") ?>",
                                positions: positions
                            },
                            success: function(response) {
                                window.open("<?= basename($_SERVER['PHP_SELF'], ".php") ?>", "_self");
                            }
                        });
                    }
                </script>