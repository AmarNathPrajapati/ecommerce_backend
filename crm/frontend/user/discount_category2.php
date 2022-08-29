<?php
session_start();
if (!isset($_SESSION["is_admin"])) {
    header("location: ../login.php");
}
include("../../backend/config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('./user_components/header_links.php'); ?>
    <title>Manage Categories</title>

    <style>
        .tags {
            list-style: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
        }

        .tags li {
            float: left;
        }

        .tag {
            background: #eee;
            border-radius: 3px 0 0 3px;
            color: #999;
            display: inline-block;
            height: 26px;
            line-height: 26px;
            padding: 0 20px 0 23px;
            position: relative;
            margin: 0 10px 10px 0;
            text-decoration: none;
            -webkit-transition: color 0.2s;

            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .overflow_style2 {
            max-width: 100px !important;
            overflow-x: auto;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .overflow_style2::-webkit-scrollbar {
            display: none;
        }

        .tag::before {
            background: #fff;
            border-radius: 10px;
            box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
            content: '';
            height: 6px;
            left: 10px;
            position: absolute;
            width: 6px;
            top: 10px;
        }

        .tag::after {
            background: #fff;
            border-bottom: 13px solid transparent;
            border-left: 10px solid #eee;
            border-top: 13px solid transparent;
            content: '';
            position: absolute;
            right: 0;
            top: 0;
        }

        .tag:hover {
            background-color: blue;
            color: white;
        }

        .tag:hover::after {
            border-left-color: blue;
        }
    </style>

</head>

<body>
    <div id="loader" class="center"></div>

    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <?php require('./user_components/side_bar.php'); ?>


        <!-- Add Modaal -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Select Category for Discount</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../../backend/user/new_discount_category.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Product Category</label><br>
                                <!-- dynamic categories -->
                                <select required name="category" id="category_name">
                                    <option disabled selected>Select Categories</option>
                                    <?php
                                    $stmt = "SELECT id,service_name,created_at FROM `services` WHERE services.deleted_at IS NULL ORDER BY created_at DESC";
                                    $sql = mysqli_prepare($conn, $stmt);
                                    $result = mysqli_stmt_execute($sql);
                                    if ($result) {
                                        $data = mysqli_stmt_get_result($sql);
                                        while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                            <option value="<?php echo $row['service_name']; ?>"><?php echo $row['service_name']; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <label for="">Discount in %</label>
                            <input name="dis_per" type="text" class="form-control " required id="" placeholder="Enter Percentage Value">
                            <label for="currency" class="form-label">Select Currency</label><br>
                            <!-- dynamic categories -->
                            <select name="currency" id="currency">
                                <?php
                                $stmt = "SELECT service_name,currency_symbol FROM `currency` WHERE currency.deleted_at IS NULL ORDER BY created_at DESC";
                                $sql = mysqli_prepare($conn, $stmt);
                                $result = mysqli_stmt_execute($sql);
                                if ($result) {
                                    $data = mysqli_stmt_get_result($sql);
                                    while ($row = mysqli_fetch_array($data)) {
                                ?>
                                        <option value="<?php echo $row['service_name'] . " " . $row['currency_symbol']; ?>"><?php echo $row['service_name'] . " " . $row['currency_symbol']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select> <br>
                            <label for="">Discount Value</label>
                            <input name="dis_value" type="text" class="form-control " required id="" placeholder="Add discount Value">
                            <label for="">Above a Total value</label>
                            <input name="total_value" type="text" class="form-control " required id="" placeholder="Enter Total Value">
                            <label for="">Start Date</label>
                            <input name="start_date" type="date" class="form-control " required id="" placeholder="Enter Start Date">
                            <label for="">End Date</label>
                            <input name="end_date" type="date" class="form-control " required id="" placeholder="Enter End Date">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Discount on Category</h1>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">
                                    <a type="button" class="btn d-inline-flex btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Add Disount on Category</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <!-- <div class="row g-6 mb-6">

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0 overflow_style" style="height: 130px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Categories</span>
                                            <?php

                                            $stmt = "SELECT count(id) FROM `services` WHERE deleted_at IS NULL";
                                            $sql = mysqli_prepare($conn, $stmt);
                                            $result = mysqli_stmt_execute($sql);
                                            if ($result) {
                                                $data = mysqli_stmt_get_result($sql);
                                                $sno = 1;
                                                while ($row = mysqli_fetch_array($data)) {
                                            ?>
                                                    <span class="h3 font-bold mb-0">
                                                        <?php echo $row[0]; ?>
                                                    </span>
                                            <?php }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                <i class="bi bi-columns-gap"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> -->


                    <!-- include table -->
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">Categories</h5>
                        </div>
                        <div class="table-responsive" style="padding: 30px 18px;">
                            <table class="table table-hover table-nowrap" id="myTable" style="padding: 30px 2px; border: 0px solid black !important;">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="font-size: 12px;">Sno</th>
                                        <th style="font-size: 12px;">Category Name</th>
                                        <th style="font-size: 12px;">Discount Percentage</th>
                                        <th style="font-size: 12px;">Currency</th>
                                        <th style="font-size: 12px;">Discount Value</th>
                                        <th style="font-size: 12px;">Discount on Tatal Value</th>
                                        <th style="font-size: 12px;">Discount Start date</th>
                                        <th style="font-size: 12px;">Discount End Date</th>
                                        <th style="font-size: 12px;">Created At</th>
                                        <th class="text-center" style="font-size: 12px;">Action</th>
                                        <th class="text-center" style="font-size: 12px;"></th>
                                    </tr>
                                </thead>
                                <tbody style="border: 0px solid black !important;">
                                    <?php

                                    $stmt = "SELECT id,category,dis_per,currency,dis_value,total_value,start_date,end_date,created_at FROM `discount_category` WHERE discount_category.deleted_at IS NULL ORDER BY created_at DESC";
                                    $sql = mysqli_prepare($conn, $stmt);

                                    // mysqli_stmt_bind_param($sql,'i',$is_admin);
                                    $is_admin = 1;

                                    $result = mysqli_stmt_execute($sql);
                                    if ($result) {
                                        $data = mysqli_stmt_get_result($sql);
                                        $sno = 1;
                                        while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                            <tr>
                                                <td class="text-center" style="font-size: 14px;">
                                                    <?php echo $sno; ?>
                                                </td>
                                                <td class="text-center" style="font-size: 14px;">
                                                    <?php echo $row['category']; ?>
                                                </td>
                                                <td class="text-center" style="font-size: 14px;">
                                                    <?php echo $row['dis_per']; ?>
                                                </td>
                                                <td class="text-center" style="font-size: 14px;">
                                                    <?php echo $row['currency']; ?>
                                                </td>
                                                <td class="text-center" style="font-size: 14px;">
                                                    <?php echo $row['dis_value']; ?>
                                                </td>
                                                <td class="text-center" style="font-size: 14px;">
                                                    <?php echo $row['total_value']; ?>
                                                </td>
                                                <td class="text-center" style="font-size: 14px;">
                                                    <?php echo $row['start_date']; ?>
                                                </td>
                                                <td class="text-center" style="font-size: 14px;">
                                                    <?php echo $row['end_date']; ?>
                                                </td>
                                                <td class="text-center" style="font-size: 14px;">
                                                    <?php echo $row['created_at']; ?>
                                                </td>

                                                <td>
                                                    <form action="./product_details.php" method="post">
                                                        <input type="number" name="id" value="<?php echo $row["id"]; ?>" hidden>
                                                        <input type="number" name="active" value="<?php echo $row["category"]; ?>" hidden>
                                                        <input type="text" name="file" value="<?php echo $row["dis_per"]; ?>" hidden>

                                                        <input type="text" name="category" value="<?php echo $row["currency"]; ?>" hidden>

                                                        <input type="text" name="title" value="<?php echo $row["dis_value"]; ?>" hidden>
                                                        <input type="text" name="old_file_type" value="<?php echo $row["total_value"]; ?>" hidden>
                                                        <input type="text" name="description" value="<?php echo $row["start_date"]; ?>" hidden>
                                                        <input type="text" name="actual_price" value="<?php echo $row["end_date"]; ?>" hidden>
                                                        <input type="text" name="sale_price" value="<?php echo $row["created_at"]; ?>" hidden>

                                                        <button class="btn btn-primary p-2" type="submit" style="margin-right:7px; font-size:12px; display:inline-block;">View Details</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <form action="../../backend/user/delete_service.php" onsubmit="return confirm_delete()" method="post">
                                                        <input type="number" hidden name="service_id" value="<?php echo $row['id']; ?>">
                                                        <button type="submit" class="btn btn-outline-danger text-danger-hover p-2" style="font-size: 10px; margin-left: 10px;">

                                                            <span style="font-size: 14px;">Delete</span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php
                                            $sno++;
                                        }
                                        mysqli_stmt_close($sql);
                                        mysqli_close($conn);
                                    } else {
                                        echo mysqli_error($conn);
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit discount on Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../..//backend/user/edit_service.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-2 d-none">
                            <input type="number" name="service_id" class="form-control service_id" hidden readonly required>
                        </div>

                        <div class="mb-2">
                            <input type="text" name="service_name" class="form-control edit service_name" required id="" placeholder="Enter Category Name">
                        </div>
                        <label for="">Discount in %</label>
                        <input name="dis_per" type="text" class="form-control " required id="" placeholder="Enter Percentage Value">
                        <label for="currency" class="form-label">Select Currency</label><br>

                        <select name="currency" id="currency">
                            <?php
                            $stmt1 = "SELECT service_name,currency_symbol FROM `currency` WHERE currency.deleted_at IS NULL ORDER BY created_at DESC";
                            $sql1 = mysqli_prepare($conn, $stmt1);
                            $result1 = mysqli_stmt_execute($sql1);
                            if ($result1) {
                                $data1 = mysqli_stmt_get_result($sql1);
                                while ($row1 = mysqli_fetch_array($data1)) {
                            ?>
                                    <option value="<?php echo $row1['service_name'] . " " . $row1['currency_symbol']; ?>"><?php echo $row1['service_name'] . " " . $row1['currency_symbol']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                        <label for="">Discount Value</label>
                        <input name="dis_value" type="text" class="form-control " required id="" placeholder="Add discount Value">
                        <label for="">Above a Total value</label>
                        <input name="total_value" type="text" class="form-control " required id="" placeholder="Enter Total Value">
                        <label for="">Start Date</label>
                        <input name="start_date" type="date" class="form-control " required id="" placeholder="Enter Start Date">
                        <label for="">End Date</label>
                        <input name="end_date" type="date" class="form-control " required id="" placeholder="Enter End Date">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php require('./user_components/scripts.php'); ?>

    <script>
        function confirm_delete() {
            var confirm_del = confirm("Are you sure ?");
            if (confirm_del == true) {
                document.querySelector(
                    "body").style.visibility = "hidden";
                document.querySelector(
                    "#loader").style.visibility = "visible";
                document.querySelector(
                    "#loader").style.zIndex = "2";
                return true;

            } else {
                return false;
            }
        }
    </script>

    <script>
        function setId(id, service_name) {

            if (id == "" || id == null || service_name == "" || service_name == null) {
                alert("Something went wrong");
                window.location.reload();
            }

            document.getElementsByClassName('service_id')[0].value = id;
            document.getElementsByClassName('edit service_name')[0].value = service_name;
            $('#editModal').modal('show');


        }
    </script>

</body>

</html>