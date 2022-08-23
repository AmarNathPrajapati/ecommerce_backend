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
    <title>Manage Products</title>
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
            max-width: 100% !important;
            overflow-x: auto;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .overflow_style2::-webkit-scrollbar {
            display: none;
        }

        .overflow_style_row {
            max-height: 100%;
            overflow-y: auto;

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


        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Manage Products</h1>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">
                                    <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
                                        <span>Edit</span>
                                    </a> -->
                                    <a href="./new_product.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Add New Product</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                            <!-- <li class="nav-item ">
                                <a href="#" class="nav-link active">Uploaded By Agent</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">


                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <!-- <h5 class="mb-0">Documents</h5> -->
                        </div>
                        <div class="table-responsive" style="padding: 30px 18px;">
                            <table class="table table-hover table-nowrap" id="myTable" style="border: 0px solid black !important; padding: 30px 2px;">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Category</th>
                                        <th>Product Name</th>
                                        <th>Actual Price</th>
                                        <th>Sale Price</th>
                                        <!-- <th>Cost Price</th>
                                        <th>SKU Number</th> -->
                                        <th>Quantity</th>
                                        <th class="text-center" colspan="3">Actions</th>
                                        <!-- <th>Weight</th>
                                        <th>Tag</th> -->
                                        <!-- <th style="font-size: 15px;">Activity Type</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // echo $_GET['document_id12'];

                                    $stmt = "SELECT id,category,title,description,file,file_type,active,created_at,category,actual_price,sale_price,cost_price,sku_number,quantity,weight,tag,marketing_angle FROM `product` 
                                    WHERE deleted_at IS NULL AND active=(?) ORDER BY created_at DESC";
                                    $sql = mysqli_prepare($conn, $stmt);

                                    mysqli_stmt_bind_param($sql, 'i', $active);
                                    $active = 1;
                                    $result = mysqli_stmt_execute($sql);

                                    if ($result) {
                                        $data = mysqli_stmt_get_result($sql);
                                        $sno = 1;
                                        while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    echo $row['category']
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $row['title']
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $row['actual_price']
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $row['sale_price']
                                                    ?>
                                                </td>
                                                <!-- <td>
                                                    <?php
                                                    //echo $row['cost_price']
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    //echo $row['sku_number']
                                                    ?>
                                                </td> -->
                                                <td>
                                                    <?php
                                                    echo $row['quantity']
                                                    ?>
                                                </td>
                                                <!-- <td>
                                                    <?php
                                                    //echo $row['weight']
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    //echo $row['tag']
                                                    ?>
                                                </td> -->
                                                <td>
                                                    <form action="./product_details.php" method="post">
                                                        <input type="number" name="id" value="<?php echo $row["id"]; ?>" hidden>
                                                        <input type="number" name="active" value="<?php echo $row["active"]; ?>" hidden>
                                                        <input type="text" name="file" value="<?php echo $row["file"]; ?>" hidden>

                                                        <input type="text" name="category" value="<?php echo $row["category"]; ?>" hidden>

                                                        <input type="text" name="title" value="<?php echo $row["title"]; ?>" hidden>
                                                        <input type="text" name="old_file_type" value="<?php echo $row["file_type"]; ?>" hidden>
                                                        <input type="text" name="description" value="<?php echo $row["description"]; ?>" hidden>
                                                        <input type="text" name="actual_price" value="<?php echo $row["actual_price"]; ?>" hidden>
                                                        <input type="text" name="sale_price" value="<?php echo $row["sale_price"]; ?>" hidden>
                                                        <input type="text" name="cost_price" value="<?php echo $row["cost_price"]; ?>" hidden>
                                                        <input type="text" name="sku_number" value="<?php echo $row["sku_number"]; ?>" hidden>
                                                        <input type="text" name="quantity" value="<?php echo $row["quantity"]; ?>" hidden>
                                                        <input type="text" name="weight" value="<?php echo $row["weight"]; ?>" hidden>
                                                        <input type="text" name="tag" value="<?php echo $row["tag"]; ?>" hidden>
                                                        <input type="text" name="marketing_angle" value="<?php echo $row["marketing_angle"]; ?>" hidden>

                                                        <button class="btn btn-primary p-2" type="submit" style="margin-right:7px; font-size:12px; display:inline-block;">View Details</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="./edit_product.php" method="post"><input type="number" name="id" value="<?php echo $row["id"]; ?>" hidden>
                                                        <input type="number" name="active" value="<?php echo $row["active"]; ?>" hidden> 
                                                        <input type="text" name="file" value="<?php echo $row["file"]; ?>" hidden>

                                                        <input type="text" name="title" value="<?php echo $row["title"]; ?>" hidden> 
                                                        <input type="text" name="category" value="<?php echo $row["category"]; ?>" hidden>
                                                        <input type="text" name="old_file_type" value="<?php echo $row["file_type"]; ?>" hidden>

                                                        <input type="text" name="description" value="<?php echo $row["description"]; ?>" hidden>
                                                        <input type="text" name="actual_price" value="<?php echo $row["actual_price"]; ?>" hidden>
                                                        <input type="text" name="sale_price" value="<?php echo $row["sale_price"]; ?>" hidden>
                                                        <input type="text" name="cost_price" value="<?php echo $row["cost_price"]; ?>" hidden>
                                                        <input type="text" name="sku_number" value="<?php echo $row["sku_number"]; ?>" hidden>
                                                        <input type="text" name="quantity" value="<?php echo $row["quantity"]; ?>" hidden>
                                                        <input type="text" name="weight" value="<?php echo $row["weight"]; ?>" hidden>
                                                        <input type="text" name="tag" value="<?php echo $row["tag"]; ?>" hidden>
                                                        <input type="text" name="marketing_angle" value="<?php echo $row["marketing_angle"]; ?>" hidden>
                                                        <button class="btn btn-warning p-2" type="submit" style="margin-right:7px; font-size:12px; display:inline-block;">Edit</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form onsubmit="return confirm_delete()" action="../../backend/user/remove_product.php" method="post">
                                                        <input type="number" name="id" value="<?php echo $row["id"]; ?>" hidden>
                                                        <button class="btn btn-neutral text-danger p-2 delete" style="font-size:12px;display:inline-block;">
                                                        <i class="bi bi-trash"></i>
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
                        <!-- <div class="card-footer border-0 py-5">
                            <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                        </div> -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function confirm_delete() {
            var confirm_del = confirm("Are you sure ?");
            if (confirm_del == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <script>
        function confirm_delete() {
            var confirm_del = confirm("Are you sure ?");
            if (confirm_del == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <?php require('./user_components/scripts.php'); ?>



</body>

</html>