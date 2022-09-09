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
                                <h1 class="h2 mb-0 ls-tight">Manage Shipping Charges on Products</h1>
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
                                    <a href="./new_shipping_product.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Add Shipping charge on Product</span>
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
                                        <th class="text-center" style="font-size: 12px;">Sno</th>
                                        <th class="text-center" style="font-size: 12px;">Product Name</th>
                                        <th class="text-center" style="font-size: 12px;">Currency</th>
                                        <th class="text-center" style="font-size: 12px;">Fixed Charge</th>
                                        <th class="text-center" style="font-size: 12px;">Pincode</th>
                                        <th class="text-center" style="font-size: 12px;">Charge based <br> on pincode</th>
                                        <th class="text-center" style="font-size: 12px;">Range in <br> Km </th>
                                        <th class="text-center" style="font-size: 12px;">Charge based <br> on Range</th>
                                        <th class="text-center" style="font-size: 12px;">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // echo $_GET['document_id12'];

                                    $stmt = "SELECT id,category,currency,fixed_value,pincode,pin_value,range_km,range_value FROM `shipping_product` WHERE shipping_product.deleted_at IS NULL ORDER BY created_at DESC";
                                    $sql = mysqli_prepare($conn, $stmt);

                                    $result = mysqli_stmt_execute($sql);

                                    if ($result) {
                                        $data = mysqli_stmt_get_result($sql);
                                        $sno = 1;
                                        while ($row = mysqli_fetch_array($data)) {
                                    ?>
                                            <tr class="text-center">
                                                <td>
                                                    <?php
                                                    echo $sno;
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $row['category'];
                                                    ?>
                                                </td>
                                               
                                                <td>
                                                    <?php
                                                    echo $row['currency'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $row['fixed_value'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $row['pincode'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $row['pin_value'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $row['range_km'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $row['range_value'];
                                                    ?>
                                                 <td>
                                                    <form onsubmit="return confirm_delete()" action="../../backend/user/delete_shipping_product.php" method="post">
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