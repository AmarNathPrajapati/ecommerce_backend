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
    <title>Manage Order Details</title>

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

        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Order Details</h1>
                            </div>
                            <div class="mb-3">


        <!-- <label for="category_name" class="form-label">Order Status</label><br> -->
        <!-- dynamic categories -->
        <!-- <select required name="category" id="category_name"> -->
            <!-- <option disabled selected>Select Order Status</option> -->
            <?php
            $stmt = "SELECT id,order_status FROM `order_status` WHERE order_status.deleted_at IS NULL ORDER BY created_at DESC";
            $sql = mysqli_prepare($conn, $stmt);
            $result = mysqli_stmt_execute($sql);
            if ($result) {
                $data = mysqli_stmt_get_result($sql);
                $status_arr=array();
                $i = 0;
                while ($row = mysqli_fetch_array($data)) {
                $status_arr[$i] = $row['order_status'];
            ?>
                   
            <?php
            $i++;
                }
            }
            ?>
        <!-- </select> -->
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
                    <div class="row g-6 mb-6">

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0 overflow_style" style="height: 130px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Order Details</span>
                                            <?php

                                            $stmt = "SELECT count(order_id) FROM `order_details` WHERE deleted_at IS NULL";
                                            $sql = mysqli_prepare($conn, $stmt);

                                            // $is_admin=2;
                                            // mysqli_stmt_bind_param($sql,'i',$is_admin);

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
                                            <!-- <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">Order Details</h5>
                        </div>
                        <div class="table-responsive" style="padding: 30px 18px;">
                            <table class="table table-hover table-nowrap" id="myTable" style="padding: 30px 2px; border: 0px solid black !important;">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="font-size: 16px;">Sno</th>
                                        <th style="font-size: 16px;">
                                            Customer <br> Name</th>
                                        <th style="font-size: 16px;">
                                            Product <br> Name</th>
                                        <th style="font-size: 16px;">
                                            Order <br> Quantity</th>
                                        <th style="font-size: 16px;">
                                            Order <br> Status</th>
                                        <th style="font-size: 16px;">Order time</th>
                                        <th style="font-size: 16px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="border: 0px solid black !important;">
                                    <?php

                                    $stmt = "SELECT order_id,user_name,product_name,quantity,order_status,created_at FROM `order_details` WHERE order_details.deleted_at IS NULL ORDER BY created_at DESC";
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
                                                <td style="font-size: 14px;">
                                                    <?php echo $sno; ?>
                                                </td>

                                                <td style="font-size: 14px;">
                                                    <?php echo $row["user_name"]; ?>
                                                </td>
                                                <td style="font-size: 14px;">
                                                    <?php echo $row["product_name"]; ?>
                                                </td>
                                                <td style="font-size: 14px;">
                                                    <?php echo $row["quantity"]; ?>
                                                </td>
                                                <td style="font-size: 14px;">
                                                    <?php echo $row["order_status"]; ?>
                                                </td>

                                                <td class="overflow_style2" style="font-size: 14px;">
                                                    <?php echo $row["created_at"]; ?>
                                                </td>

                                                <td class="d-flex p-1">



                                                    <button type="submit" class="btn btn-outline-primary text-danger-hover p-2" onclick="setId(<?php echo $row['order_id']; ?>)" style="font-size: 14px; margin-left: 10px;">
                                                        <span style="font-size: 14px;">Change Order Status</span>
                                                    </button>


                                                    <form action="../../backend/user/delete_order_details.php" onsubmit="return confirm_delete()" method="post">
                                                        <input type="number" hidden name="service_id" value="<?php echo $row['order_id']; ?>">
                                                        <button type="submit" class="btn btn-outline-danger text-danger-hover p-2" style="font-size: 14px; margin-left: 10px;">

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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Order Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../..//backend/user/edit_order_details.php" method="post">
                    <div class="modal-body">
                        <div class="mb-2 d-none">
                            <input type="number" name="service_id" class="form-control service_id" hidden readonly required>
                        </div>
                        <label class="my-2" for="">Change Order status</label> <br>
                        <select  class="form-control edit service_name"   name="service_name" id="">
                           <?php
                            foreach ($status_arr as $value) { 
                           ?>
                            <option value="<?php
                                echo $value;
                            ?>"><?php
                                echo $value;
                            ?></option>
                           <?php
                                }
                           ?>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




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


    <?php require('./user_components/scripts.php'); ?>


    <script>
        function setId(id) {

            if (id == "" || id == null) {
                alert("Something went wrong");
                window.location.reload();
            }

            document.getElementsByClassName('service_id')[0].value = id;
            $('#editModal').modal('show');


        }
    </script>

</body>

</html>