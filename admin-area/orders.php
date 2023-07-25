<?php
$pagename = "Orders";
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
                    <div id="alert-contact"></div>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr no</th>
                                <th>Service</th>
                                <th>Package</th>
                                <th>Full Name</th>
                                <th>Email Address</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Total Price</th>
                                <th>Duration</th>
                                <th>Number Of Professional</th>
                                <th>Material</th>
                                <th>Instruction</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            $countid = 1;
                            $query = mysqli_query($con, "SELECT orders.*,services.title FROM `orders`,services WHERE services.id = orders.service_id ORDER BY orders.id DESC");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td><?= $count++ ?></td>
                                    <td><?= $row["title"] ?></td>
                                    <td>
                                        <?php
                                        if ($row["package_id"] != "") {
                                            $packages = explode(",", $row["package_id"]);
                                            foreach ($packages as $package) {
                                                $query1 = mysqli_query($con, "SELECT * FROM `packages` where id ='$package'");
                                                $row1 = mysqli_fetch_array($query1); ?>
                                                <span class="badge badge-primary mr-2"><?= $row1["title"] ?></span>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?= $row["full_name"] ?></td>
                                    <td><?= $row["email"] ?></td>
                                    <td><?= $row["phone"] ?></td>
                                    <td><?= $row["address"] ?></td>
                                    <td>BHD <?= $row["total"] ?></td>
                                    <td><?= $row["duration"] ?></td>
                                    <td><?= $row["number_of_professional"] ?></td>
                                    <td><?= ucwords($row["material"]) ?></td>
                                    <td><?= $row["instructions"] ?></td>
                                </tr>
                            <?php
                                $countid++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <?php
                include_once "footer.php";
                ?>
                <script>
                    function cmplt(id, status) {
                        $.ajax({
                            url: "include/update.php?page=cmplt",
                            type: "POST",
                            data: {
                                id: id,
                                status: status
                            },
                            dataType: "JSON",
                            success: function(res) {
                                if (res["res"] == "success") {
                                    $("#alert-contact").html(`<div class="alert alert-success">Status Successfully Updated!</div>`);
                                    setTimeout(() => {
                                        location.reload();
                                    }, 2500);
                                } else if (res["res"] == "databasewrong") {
                                    $("#alert-contact").html(`<div class="alert alert-danger">Error!</div>`);
                                }
                            }
                        })
                    }
                </script>